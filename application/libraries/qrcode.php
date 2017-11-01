<?php
error_reporting(E_ERROR);
require_once 'phpqrcode/QRcode.php';
$url = urldecode($_GET["data"]);
QRcode::png($url);
