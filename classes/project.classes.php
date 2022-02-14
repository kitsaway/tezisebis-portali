<?php

include_once "Dbh.classes.php";

class Project extends Dbh{
    private $pname;
    private $status_id = 1;

    public function __construct($pname)
    {
        $this->pname = $pname;
    }

    public function addProject(){
        $this->setProject();
    }

    static public function getProjects(){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT projects.id, projects.pr_name, status.status_name, projects.points FROM projects RIGHT JOIN status ON projects.status_id = status.id WHERE projects.status_id IS NOT NULL");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./projects.php?error=stmtfailed73");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    static public function getStudentProject($stud_id){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT projects.pr_name, status.status_name, projects.points FROM projects RIGHT JOIN status ON projects.status_id = status.id WHERE student_id='$stud_id'");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./uploadFile.php?error=stmtfailed25");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public static function addPoints($pname, $stud_id, $points){
        $db = new Dbh;

        $stmt1 = $db->connect()->prepare("UPDATE projects SET points='$points', status_id='5' WHERE student_id='$stud_id' AND pr_name='$pname'");
        $stmt2 = $db->connect()->prepare("UPDATE users SET status_id='5' WHERE id='$stud_id'");


        if (!$stmt1->execute() || !$stmt2->execute()) {
            $stmt1 = null;
            $stmt2 = null;

            header("Location: ./addData.php?error=stmtfailed44");
            exit();
        }
    }

    public static function addProjectToStud($pname, $stud_id){
        $db = new Dbh;

        $stmt1 = $db->connect()->prepare("UPDATE projects SET student_id='$stud_id', status_id='2' WHERE pr_name='$pname'");
        $stmt2 = $db->connect()->prepare("UPDATE users SET status_id='2' WHERE id='$stud_id'");

        if (!$stmt1->execute() || !$stmt2->execute()) {
            $stmt1 = null;
            $stmt2 = null;

            header("Location: ./addData.php?error=stmtfailed61");
            exit();
        }
    }

    static public function getPrNoPoints(){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT pr_name FROM projects WHERE status_id=4");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./addData.php?error=stmtfailed72");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    static public function availableProjects(){
        $db = new Dbh();

        $stmt = $db->connect()->prepare("SELECT pr_name FROM projects WHERE status_id=1");

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./addData.php?error=stmtfailed73");
            exit();
        }

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    private function setProject(){
        $stmt = $this->connect()->prepare("INSERT INTO projects (pr_name, status_id) VALUES (?, ?)");

        $this->connect()->exec('SET NAMES utf8');
        if (!$stmt->execute(array($this->pname, $this->status_id))) {
            $stmt = null;
            header("Location: ../addData.php?error=stmtfailed87");
            exit();
        }

        $stmt = null;
    }

}