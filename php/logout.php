<?php

session_start(); //comienza una nueva o toma la anterior.
session_destroy();
header("location:index.php");

?>