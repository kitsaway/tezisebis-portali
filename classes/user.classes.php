<?php

include_once "Dbh.classes.php";
include "Validator.trait.php";


class User extends Dbh{

    use Validator;

    private $fname;
    private $lname;
    private $gender;
    private $id_n;
    private $b_day;
    private $mobile;
    private $address;
    private $level = 1;

    public function __construct($fname, $lname, $gender, $id_n, $b_day, $mobile, $address)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->id_n = $id_n;
        $this->b_day = $b_day;
        $this->mobile = $mobile;
        $this->address = $address;
    }

    public function addUser(){
        if ($this->emptyInput($this->fname, $this->lname, $this->gender, $this->id_n, $this->mobile, $this->address) == false) {
            // "Empty Input";
            header("Location: ../addData.php?error=emptyInput");
            exit();
        }

        if ($this->idTakenCheck($this->id_n) == false) {
            // "ID number already taken";
            header("Location: ../addData.php?error=idTaken");
            exit();
        }

        if ($this->invalidId($this->id_n) == false) {
            // "Invalid ID";
            header("Location: ../addData.php?error=id");
            exit();
        }

        if ($this->invalidMobile($this->mobile) == false) {
            // "Invalid Mobile";
            header("Location: ../addData.php?error=mobile");
            exit();
        }

        $this->setUser();

    }

    private function setUser()
    {
       
        $stmt = $this->connect()->prepare('INSERT INTO users (level, status_id, name, surname, gender, id_number, date_of_birth, mobile, address, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($this->id_n, PASSWORD_BCRYPT);
        $this->connect()->exec('SET NAMES utf8');
        if (!$stmt->execute(array($this->level, "1", $this->fname, $this->lname, $this->gender, $this->id_n, $this->b_day, $this->mobile, $this->address, $hashedPwd))) {
            $stmt = null;
            header("Location: ../addData.php?error=stmtfailed33");
            exit();
        }

        $stmt = null;
    }

    static public function getUsers(){

        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT users.id, users.id_number, users.name, users.surname, status.status_name FROM users INNER JOIN status ON users.status_id  = status.id WHERE users.level=1");
        
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./index.php?error=stmtfailed84");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    static public function getUser($id){

        $db = new Dbh();
        
        $stmt = $db->connect()->prepare("SELECT id, name, surname, gender, id_number, date_of_birth, mobile, address FROM users WHERE level=1 AND id = $id");


        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./index.php?error=stmtfailed101");
            exit();
        }

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;

    }
    static public function getStNoPoints(){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT id, name, surname FROM users WHERE status_id=4");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./addData.php?error=stmtfailed116");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    static public function availableStudents(){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT id, name, surname FROM users WHERE status_id=1");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./addData.php?error=stmtfailed103");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
}