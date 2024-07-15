<?php

require "vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$text = $_POST["text"];

$qr_code = QRCode::create($text);

$writer = new PngWriter;

header('Content-Type: image/png');
$result = $writer->write($qr_code);

echo $result->getString();

?>

