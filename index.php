<?php 
    include("./partials/header.php"); 
    include("./classes/user.classes.php");

    if(!isset($_SESSION["user"])){
        include("login.php");
    }else{
        $user_id = $_SESSION["user"];
        $user = User::getUser($user_id);

        switch ($_SESSION['user_lvl']) {
            case "0": // Admin
                include('adminpg.php');
                break;
            case "1": // Reg User
                include("userpg.php");
                break;
            default:
                header("Location: https://http.cat/451");
                break;
        }   
    }
?>

<?php include("./partials/footer.php"); ?>