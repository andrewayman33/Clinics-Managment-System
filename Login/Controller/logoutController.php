<?php

include_once ('../Model/Account.php');
session_start();
$data=$_SESSION["user"];
$data->logout();
echo '<script>alert("loggoed out successfully... \' ")</script>';
echo '<script>location.href="../View/login.php";</script>';
