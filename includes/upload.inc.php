<?php
session_start();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = $_FILES["fileToUpload"]["name"];
$tname = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$studid = $_SESSION["user"];

include "../classes/uploadFile.classes.php";
UploadFile::upload($target_file, $imageFileType, $tname, $filename, $uploadOk, $studid);
header("Location: ../uploadFile.php?error=none");
