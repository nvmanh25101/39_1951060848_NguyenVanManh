<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['image']);

setcookie('remember', null, -1);

header('location:signin.php');