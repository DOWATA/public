<?php
// 名前空間の指定
use PHPMake\SerialPort as SerialPort;

// 初期化
$port = new SerialPort('COM7');

// ボーレート設定
$port->setBaudRate(SerialPort::BAUD_RATE_9600);

// フロー制御設定
$port->setFlowControl(SerialPort::FLOW_CONTROL_NONE);

// ストップビット（1ビット）
$port->setNumOfStopBits(10);

// （10）タイムアウト設定(3秒受信待ち)
$port->setCanonical(false)->setVTime(30)->setVMin(0);

// データ送信
$written = $port->write('hello');

// データ受信
echo $port->read(256)."\n";

$written = $port->write('bye');
echo $port->read(256)."\n";

$port->close();
