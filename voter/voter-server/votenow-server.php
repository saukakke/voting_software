<?php
session_start();
if(!isset($_SESSION['voterid'])){
    echo "<script>alert('You must login to view this page');</script>";
    echo "<script>window.location.href='voterlogin.php';</script>";
}
include '../../connection.php';
    $id=$_GET['id'];
    $position=$_GET['position'];
    $year=$_GET['year'];
     
    if(empty($id)||empty($position)||empty($year))
    {
       echo "<script>alert('You must start voting again');</script>";
        echo "<script>window.location.hreaf='vote.php';</script>";
    }
    else
    {
        $admno=$_SESSION['voterid'];
        $query= "INSERT INTO vote(admission_no,id,position,election_year) VALUES ('$admno','$id','$position','$year')";
        $result= mysqli_query($con,$query);
        if($result)
        {
           echo "<script>alert('You have voted successffully');</script>";
            echo "<script>window.location.href='../voter-homepage.php';</script>";
        }
    }
?>