<?php
session_start();
$errors= array();
if(isset($_SESSION['voterid']))
{
    header('location: voter-homepage.php');
}
if(isset($_POST['login']))
{
    include '../connection.php';
    $admno= mysqli_real_escape_string($con,$_POST['admission_no']);
    $password= mysqli_real_escape_string($con,$_POST['password']);
    if(empty($admno)||empty($password))
    {
        array_push($errors,"Please fill in all fields");
    }
    if(count($errors)==0)
    {
    $query= "SELECT * FROM student_reg WHERE admission_no='$admno' AND password='$password'";
    $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
        {
        $_SESSION['voterid']=$admno;
        header('location: voter-homepage.php');
        }
        else
        {
            array_push($errors,"Invalid username or password");
        }
    }
}

?>