<?php

    require_once "config.php"; //antes de mirar nada conectar la db.

    session_start();

    if(!isset($_SESSION["username"])) {
        header("location:index.php");
    }

?>



<!DOCTYPE html>

<html>
    <head>


    </head>

    <body>

        <div class="container align-middle">
            <span> Welcome HOME </span>
            <a href="logout.php">Logout</a>
        </div>

    </body>



</html>
