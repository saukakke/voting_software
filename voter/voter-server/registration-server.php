<?php
include '../../connection.php';
session_start();
$errors= array();
if(isset($_POST['validateOtp'])){
    $otp= $_POST['otp'];
    $mail= $_POST['mailid'];
    $admno =$_POST['admissionnumber'];
    $password= $_POST['password'];
    $q5= "SELECT * FROM otp WHERE e_mail='$mail' AND otp='$otp'";
    $r5= mysqli_query($con,$q5);
    if(mysqli_num_rows($r5)>0){
        $q6= "INSERT INTO student_reg(admission_no,password)VALUES('$admno','$password')";
        $r6= mysqli_query($con,$q6);
        if($r6){
            $_SESSION['voterid']= $admno;
            echo "<script>alert('You have successfully registered');</script>";
            echo "<script>window.location.href='../voter-homepage.php';</script>";
        }
        else{
            echo "<script>alert('Registration failed');</script>";
            echo "<script>window.location.href='../registration.php';</script>";
        }
    }
    else{
        echo "<script>alert('Invalid otp');</script>";
        echo "<script>window.location.href='../registration.php';</script>";
    }
}
?>
