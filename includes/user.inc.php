<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $id_n = $_POST["id_n"];
    $date = new DateTime($_POST["b_day"]);
    $b_day = $date->format('Y-m-d H:i:s');
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    include "../classes/user.classes.php";
    $newUser = new User($fname, $lname, $gender, $id_n, $b_day, $mobile, $address);

    $newUser->addUser();

    header("Location: ../index.php?error=none");
}