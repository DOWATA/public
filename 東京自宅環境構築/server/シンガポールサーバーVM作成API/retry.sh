#!/bin/bash

# タイムアウト設定を長めにする（180秒などに調整可）
export OCI_CLI_TIMEOUTS='{"connect": 20, "read": 180}'

AD_NAME="BPFu:AP-SINGAPORE-1-AD-1"
COMPARTMENT_ID="ocid1.tenancy.oc1..aaaaaaaabnj55vxtpim2c27hdqdiz6rg4zs5yzzxt7iniu7odeiw7ecql7eq"
SUBNET_ID="ocid1.subnet.oc1.ap-singapore-1.aaaaaaaavjte3q5yq7cpiaxs4acpsd3jgqchm2gzgtljnsmhd3febg3ifcfq"
IMAGE_ID="ocid1.image.oc1.ap-singapore-1.aaaaaaaa3rjnbq273x5kzisyx6os5r57735jnhytwkmwx7c5gm4ybkvzi2ua"

while true; do
  #echo "--- 試行中: $(date) ---"
  echo "--- 試行中 [$AD_NAME]: $(date -d '9 hours' '+%Y-%m-%d %H:%M:%S JST') ---"

  # --- 1. 接続レイテンシ（TCP接続時間）をmsで測定 ---
  # time_total ではなく time_connect を使うのがコツです
  NETWORK_LATENCY_SEC=$(curl -o /dev/null -s -w '%{time_connect}\n' https://iaas.ap-singapore-1.oraclecloud.com)
  NETWORK_LATENCY_MS=$(echo "$NETWORK_LATENCY_SEC" | awk '{print int($1 * 1000)}')
  echo "📡 接続レイテンシ: ${NETWORK_LATENCY_MS}ms"

  # --- API計測開始 ---
  SECONDS=0

  RESULT=$(oci compute instance launch \
    --availability-domain "$AD_NAME" \
    --compartment-id "$COMPARTMENT_ID" \
    --shape "VM.Standard.A1.Flex" \
    --shape-config '{"ocpus":2,"memoryInGBs":12}' \
    --subnet-id "$SUBNET_ID" \
    --image-id "$IMAGE_ID" \
    --assign-public-ip true \
    --ssh-authorized-keys-file "/root/.ssh/id_rsa.pub" \
    --boot-volume-size-in-gbs 100 2>&1)

  # --- API計測終了 ---
  DURATION=$SECONDS
  echo "⏱  処理応答時間: ${DURATION}秒"

  # 判定ロジックの整理版
  if [[ $RESULT == *"ocid1.instance"* ]]; then
    echo "🎉 成功しました！"
    echo "$RESULT"
    break
  elif [[ $RESULT == *"Out of capacity"* ]] || [[ $RESULT == *"Out of host capacity"* ]]; then
    echo "【在庫なし】リソース不足のため再試行します（3分待機）"
    sleep 180
  elif [[ $RESULT == *"timed out"* ]] || [[ $RESULT == *"InternalError"* ]]; then
    echo "【内部エラー/タイムアウト】OCI側の不調です。5分休みます..."
    echo "詳細: $(echo "$RESULT" | head -n 1)"
    sleep 300
  elif [[ $RESULT == *"TooManyRequests"* ]]; then
    echo "【制限中】リクエスト過多。5分休みます..."
    sleep 300
  elif [[ $RESULT == *"LimitExceeded"* ]]; then
    echo "【制限超過】既に作成済みか無料枠上限です。終了します。"
    echo "$RESULT"
    break
  else
    echo "【未知のエラー】内容を確認してください。10分後に再試行します..."
    echo "$RESULT"
    sleep 600
  fi


done