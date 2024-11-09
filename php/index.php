<?php

require_once "config.php"; //antes de mirar nada conectar la db.

session_start();

if( isset($_SESSION["username"])) {
    header("location:home.php");
}

//Esto se ejecuta al ejecutar el index.
    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0 ){
            $_SESSION["username"] = $username;
            header("location:home.php");
        }else {
            echo '<script> alert("Login incorrecto!") </script>';
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

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <input type="submit" class="btn btn-primary btn-block mb-4" value="Login" id="login" name="login"/>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                </div>
            </form>
        </div>

    </body>  
</html> 