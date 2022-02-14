<?php

if (isset($_POST["submit"])) {

    $id_n = $_POST["id_n"];
    $pwd = $_POST["pwd"];

    include "../classes/login.classes.php";
    $login = new LogIn($id_n, $pwd);

    $login->logInUser();

    header("Location: ../index.php?error=none");
}
