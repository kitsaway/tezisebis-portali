<?php

if (isset($_POST["submit"])) {

    $pname = $_POST["pname"];

    include "../classes/project.classes.php";
    $newProject = new Project($pname);

    $newProject->addProject();

    header("Location: ../addData.php?error=none");
}