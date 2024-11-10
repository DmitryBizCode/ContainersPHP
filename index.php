<?php
require 'vendor/autoload.php';
//use App\Services\IotService;
//use App\Services\SQLService;
//$sql = new SQLService();
//$iotService = new IotService($sql->getPdo());
//dump($iotService->getAllTemperatures());
function hashString($string) {
    return hash('sha256', $string);
}

$input1 = "example";
$input2 = "example";

$hash1 = hashString($input1);
$hash2 = hashString($input2);

echo "Хеш для input1: $hash1\n";
echo "Хеш для input2: $hash2\n";

if ($hash1 === $hash2) {
    echo "Хеші однакові!\n";
} else {
    echo "Хеші різні!\n";
}



