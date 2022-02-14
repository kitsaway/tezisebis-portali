<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>თეზისების პორტალი</title>
</head>

<body>
    <header>
        <div class="header-logo">
            <img src="./images/Avalance College.png">
        </div>
    </header>
    <?php
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user_lvl"] == "1") {
    ?>
            <nav id="nav">
                <ul class="nav-menu">
                    <li><a class="nav-link" href="index.php">სტუდენტის პროფილი</a></li>
                    <li><a class="nav-link" href="uploadFile.php">თეზისის ატვირთვა</a></li>
                </ul>
            </nav>
        <?php } else if ($_SESSION["user_lvl"] == "0") {
        ?>
            <nav id="nav">
                <ul class="nav-menu">
                    <li><a class="nav-link" href="index.php">სტუდენტები</a></li>
                    <li><a class="nav-link" href="projects.php">თეზისები</a></li>
                    <li><a class="nav-link" href="addData.php">მონაცემების დამატება</a></li>
                </ul>
            </nav>
    <?php
        }
    }
    ?>