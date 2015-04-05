<?php
require __DIR__ . "/Autoload.php";
Autoload::addNamespace("Qiniu", dirname(__DIR__) . "/src/Qiniu");
Autoload::register();

$accessKey = "5SbM8sXs0p4ndYaAw-tW9gqw6wSE_BLXieVbwvHU";
$secretKey = "YB3XRPwOYTBf8F7O5UC9WIHw0DiwMwdqpRZIA6Mq";
$qiniu = new \Qiniu\Qiniu($accessKey, $secretKey);

$bucket = $qiniu->getBucket("ludis");
//$response = $bucket->put($_FILES["file"]["tmp_name"], "test.png");
//echo $response->getContent();

//uploadify
$targetFolder = '/admin/uploads'; // Relative to the root

if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $targetFile = rtrim($targetPath,'/') . '/' .date('YmdHis').'-'. $_FILES['Filedata']['name'];
    $uploadname = date('YmdHis').'-'. $_FILES['Filedata']['name'];

    // Validate the file type
    $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    if (in_array($fileParts['extension'],$fileTypes)) {

        $response = $bucket->put($_FILES["file"]["tmp_name"], $uploadname);
        move_uploaded_file($tempFile,$targetFile);
        //echo $targetFolder . '/' . $_FILES['Filedata']['name'];
        //http://ludis.qiniudn.com/test.png
        echo $response->getContent();
        //echo $targetFile;
    } else {
        echo 'Invalid file type.';
    }
} 
?>