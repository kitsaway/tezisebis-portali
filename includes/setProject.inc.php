<?php

if (isset($_POST["submit"])) {

    $pr_name = $_POST["p_name"];
    $stud_id = $_POST["st_id"];

    include("../classes/project.classes.php");

    Project::addProjectToStud($pr_name, $stud_id);

    // return 0;
    header("Location: ../addData.php?error=none");
}