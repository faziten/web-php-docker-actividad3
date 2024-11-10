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
        <title>Introduction to PHP</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles.css">  

    </head>

    <body>

        <div class="container align-middle">
            <span> Welcome HOME </span>

            <div class="row">

            <?php
            $query= "SELECT * FROM users";
            $result = mysqli_query($connection, $query);

            if( mysqli_num_rows ($result) > 0 ){
                while($row= mysqli_fetch_assoc($result)){
                    echo
                    '
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> USUARIO: '.$row["username"].'</h5>
                                <h6 class="card-subtitle mb-2 text-muted"> ID: '.$row["id"].'</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            ?>
            </div>


            <a class="row" href="logout.php">Logout</a>
        </div>

    </body>



</html>
