<?php

require __DIR__ . "/Autoload.php";
Autoload::addNamespace("Qiniu", dirname(__DIR__) . "/src/Qiniu");
Autoload::register();

$accessKey = "5SbM8sXs0p4ndYaAw-tW9gqw6wSE_BLXieVbwvHU";
$secretKey = "YB3XRPwOYTBf8F7O5UC9WIHw0DiwMwdqpRZIA6Mq";
$qiniu = new \Qiniu\Qiniu($accessKey, $secretKey);

$bucket = $qiniu->getBucket("ludis");
$response = $bucket->put($_FILES["file"]["tmp_name"], "test.png");
echo $response->getContent();
