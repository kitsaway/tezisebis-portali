<?php

include "Dbh.classes.php";

class UploadFile extends Dbh {

    public static function upload($tf, $ift, $tname, $filename, $uploadOk, $studid){

        if (file_exists($tf)) {
            echo "ასეთი ფაილი უკვე არსებობს.";
            $uploadOk = 0;
            exit();
        }

        if ($ift != "pdf" && $ift != "docx") {
            echo "დაშვებულია მხოლოდ .pdf და .doc ტიპის ფაილები!";
            $uploadOk = 0;
            exit();
        }

        if ($uploadOk == 0) {
            echo "თქვენი ფაილი არ აიტვირთა.";
            exit();
            // if everything is ok, try to upload file
        } else {
            $db = new Dbh();

            $stmt = $db->connect()->prepare("UPDATE projects SET file_src='$filename' WHERE student_id=$studid");

            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ./uploadFile.php?error=stmtfailed31");
                exit();
            }
            if (move_uploaded_file($tname, $tf)) {
                $stmtProjectSt= $db->connect()->prepare("UPDATE projects SET status_id='4' WHERE student_id=$studid");
                $stmtStudSt = $db->connect()->prepare("UPDATE users SET status_id='4' WHERE id=$studid");

                if (!$stmtProjectSt->execute() || !$stmtStudSt->execute()) {
                    $stmtProjectSt = null;
                    $stmtStudSt = null;
                    header("Location: ./uploadFile.php?error=stmtfailed31");
                    exit();
                }

                session_start();
                $_SESSION["fileUploaded"] = true;
                return true;
            } else {
                return false;
            }
        }
    }
}