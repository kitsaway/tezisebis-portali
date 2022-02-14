<?php

include "../classes/Dbh.classes.php";

class LogIn extends Dbh {
    private $id_n;
    private $pwd;

    public function __construct($id_n, $pwd)
    {
        $this->id_n = $id_n;
        $this->pwd = $pwd; 
    }

    public function logInUser(){
        $this->getUser($this->id_n, $this->pwd);
    }

    protected function getUser(){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE id_number = ?');

        if (!$stmt->execute(array($this->id_n))) {
            $stmt = null;
            header("Location: ../index.php?error=24");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($this->pwd, $pwdHashed[0]["password"]);

        if ($checkPwd == false) {

            $stmt = null;
            header("Location: ../index.php?error=34");
            exit();

        }else if($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE id_number = ?');

            if (!$stmt->execute(array($this->id_n))) {
                $stmt = null;
                header("Location: ../index.php?error=42");
                exit();
            }
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../index.php?error=48");
                exit();
            } 
            
            session_start();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["user"] = $user[0]["id"];
            $_SESSION["user_lvl"] = $user[0]["level"];

        }

        $stmt = null;
    }
}