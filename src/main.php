<?php
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('\Calculator\\', __DIR__ . '/../src/');

$calculator = new \Calculator\WxCalculator(new \Calculator\Calculator());
$calculator->Show();

wxEntry();

