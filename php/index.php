<?php

require_once "config.php"; //antes de mirar nada conectar la db.

session_start();

if( isset($_SESSION["username"])) {
    header("location:home.php");
}

//Esto se ejecuta al ejecutar el index.
if(isset($_POST["login"])){

    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query); //retorna objeto de db.

    if(mysqli_num_rows($result) > 0 ){
        $row = mysqli_fetch_array($result);
        if(password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("location:home.php");
        } else {
            echo '<script> alert("Login incorrecto!")</script>';
        }
    } else {
        echo '<script> alert("Wrong user details")</script>';
    }
}


if(isset($_POST["register"])){
    if( empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["rpassword"]) ){
        echo '<script> alert("All fields are mandatory")</script>';
    }
    if( $_POST["password"] != $_POST["rpassword"] ){
        echo '<script> alert("Passwords are not equal")</script>';
    }else{
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        //VER QUE LOS HASHES COINCIDAN
        $aux= password_hash($_POST["username"]);
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        

        $query = "INSERT INTO users(username,password) VALUES ('$username', '$password')";
        if (mysqli_query($connection, $query)){
            echo '<script> alert("Registration complete")</script>';
            //header("location:index.php");
        }
    } 
       
}

?>

<!DOCTYPE html>  
<html>  
      <head>  
           <title>Introduction to PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  


      <body>
        <div class="container align-middle">
            <span> Welcome to my app!</span>
            
            <?php
            if (isset ($_GET["action"]) == "register"){
            ?>

            <form method="post">
                <h3 class="text-center"> Register</h3>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control" />
                    <label class="form-label" for="username">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="rpassword" name="rpassword" class="form-control" />
                    <label class="form-label" for="rpassword">Repeat password</label>
                </div>

                <!-- Submit button -->
                <input type="submit" class="btn btn-primary btn-block mb-4" value="Register" id="register" name="register"/>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already a member? <a href="index.php">Login</a></p>
                </div>
            </form>
            <?php
            }
            else
            {
            ?>
            <form method="post">
                <h3 class="text-center"> Login</h3>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control" />
                    <label class="form-label" for="username">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Submit button -->
                <input type="submit" class="btn btn-primary btn-block mb-4" value="Login" id="login" name="login"/>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="index.php?action=register">Register</a></p>
                </div>
            </form>

            <?php
            }
            ?>

        </div>

    </body>  
</html> 