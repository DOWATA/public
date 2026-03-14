<?php
// （1）名前空間の指定
use PHPMake\SerialPort as SerialPort;

// （2）初期化
$port = new SerialPort('COM8');

// （3）ボーレート設定
$port->setBaudRate(SerialPort::BAUD_RATE_9600);

// （4）フロー制御設定
$port->setFlowControl(SerialPort::FLOW_CONTROL_NONE);

// （5）ストップビット（1ビット）
$port->setNumOfStopBits(10);

// （6）タイムアウト設定
$port->setCanonical(false)->setVTime(0)->setVMin(0);

// （7）データを受信すればOKを返す
while (true) {
    $data = $port->read(256);
    $dataSize = strlen($data);
    if (0 < $dataSize) {
        echo $data."\n";
        $written = $port->write('OK');
    }
}
// （8）終了処理
$port->close();
