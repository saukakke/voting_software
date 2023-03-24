<?php
session_start();
include '../connection.php';
$errors = array();
        if(isset($_SESSION['adminname']))
        {
            header('location: admin-homepage.php');
        }
        else
        {
        if(isset($_POST['login']))
        {
         $username = mysqli_real_escape_string($con,$_POST['admin_id']); 
         $password = mysqli_real_escape_string($con,$_POST['password']);
         if(empty($username))
         {
            array_push($errors,"Please Enter username");
         }
         if(empty($password))
         {
             array_push($errors,"Please enter password");
         }
         if(count($errors)==0)
         {
         $query = "SELECT * FROM admin WHERE admin_name='$username' AND password='$password'";
         $result = mysqli_query($con,$query);
         if(mysqli_num_rows($result)==1)
         {
             $_SESSION['adminname']= $username;
             header('location: admin-homepage.php');
         } 
         else
         {
             array_push($errors,"Wrong username or password");
         }
        }
        }
        }
mysqli_close($con);
?>