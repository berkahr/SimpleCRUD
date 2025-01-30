<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['name']);

$remember=time()-3600;
setcookie('nama',"",$remember);
setcookie('username',"",$remember);
setcookie('active',"",$remember);
header("location: index.html");
exit();
?>