<?php
session_start();
if(!isset($_SESSION['adminname'])){
    echo "<script>alert('You must login to view this page');</script>";
    echo "<script>window.location.href='adminlogin.php';</script>";
}
?>
<?php
include '../connection.php';
$id= $_GET['admno'];
$q1="SELECT * FROM student_reg WHERE admission_no='$id'";
$r1=mysqli_query($con,$q1);
if($r1){
    $q2= "DELETE FROM student_reg WHERE admission_no='$id'";
    $r2= mysqli_query($con,$q2);
    $query="DELETE FROM students_details WHERE admission_no='$id'";
    $result= mysqli_query($con,$query);
    if($result){
    echo "<script>alert('The voter have been deleted successfully');</script>";
    echo "<script>window.location.href='add_student_details.php';</script>";
}
}
?>