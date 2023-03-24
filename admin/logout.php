<?php
session_start();
session_destroy();
unset($_SESSION['adminname']);
header('location: ../index.html');
?>