<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php
include '../connection.php';
$position=$_GET['position'];
$query= "DELETE FROM position WHERE position='$position'";
$result= mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    echo "<script>alert('The position deleted successfully');</script>";
    echo "<script>window.location.href='add_position.php';</script>";
}
else{
    echo "<script>alert('There are several candidates in this position. First remove them.');</script>";
    echo "<script>window.location.href='add_position.php';</script>";
}
?>