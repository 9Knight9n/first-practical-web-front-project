<?php
session_start();


$Error = '';


// File upload path
$targetDir = getenv("BASE_DIR")."server/static/image/";
$fileName = basename($_FILES["poster"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$uploadOk = 0;

if(!empty($_FILES["poster"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
//        echo __DIR__;
        if(move_uploaded_file($_FILES["poster"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            require_once "../../models/Media.php";
            $result = Media::getInstance()->where("file_name",$fileName)->addRecord();
//            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($result){
                $Error = "";
                $uploadOk = 1;
            }else{
                $Error = "File upload failed, please try again.";
            }
        }else{
            $Error = "Sorry, there was an error uploading your file.";
        }
    }else{
        $Error = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
    }
}else{
    $Error = 'Please select a file to upload.';
}

$_SESSION["addMedia"] = $Error;
require_once '../../helper/utils.php';
header('location: '.base_url(true).$base_path.'pages/panel/manageMedia.php');