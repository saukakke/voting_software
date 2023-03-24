<?php
include '../connection.php';
$id= $_GET['id'];
$query= "DELETE FROM candidate WHERE id='$id'";
$result= mysqli_query($con,$query);
if($result){
    echo "<script>alert('The candidate have been removed successfully');</script>";
    echo "<script>window.location.href='view-delete-candidate.php';</script>";
}
else{
    echo "<script>alert('The candidate is active in some election first remove the election to continue');</script>";
    echo "<script>window.location.href='view-delete-candidate.php';</script>";
}
?>