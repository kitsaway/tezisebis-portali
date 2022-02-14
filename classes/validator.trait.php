<?php

trait Validator{

    private function emptyInput($fname, $lname, $gender, $id_n, $mobile, $address){
        $result = false;
        if (
            empty($fname) || empty($lname) ||
            empty($gender) || empty($id_n) ||
            empty($mobile) || empty($address) 
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidId($id_n){
        $result = false;
        if (!preg_match("/^(\d{11})$/", $id_n)) { 
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function idTakenCheck($id_n){
        $result = false;
        if (!$this->checkId($id_n)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;

    }
    
    private function checkId($id_n){
        $stmt = $this->connect()->prepare('SELECT name FROM users WHERE id_number = ?');

        if (!$stmt->execute(array($id_n))) {
            $stmt = null;
            header("Location: ../adminUser.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    private function invalidMobile($mobile){
        $result = false;
        if (!preg_match("/^\+(?:[9955]?)\d{11}/",$mobile)) { // რეჯექსი ?????
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
}