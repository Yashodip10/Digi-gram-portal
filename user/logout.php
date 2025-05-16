<?php 
session_name("user_page");
session_start();
session_unset();
session_destroy();
header('Location:../index.php');
?>