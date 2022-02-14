<?php

if (isset($_POST["submit"])) {

    $pr_name = $_POST["p_name"];
    $stud_id = $_POST["st_id"];
    $points = $_POST["points"];

    include("../classes/project.classes.php");

    Project::addPoints($pr_name, $stud_id, $points);

    header("Location: ../addData.php?error=none");
}