<?php
include '../connection.php';
$errors= array();
$alerts= array();
if(isset($_POST['submit']))
{
    $position= mysqli_real_escape_string($con,$_POST['position']);
    $positionDescription= mysqli_real_escape_string($con,$_POST['description']);
    if(empty($position)||empty($positionDescription))
    {
        array_push($errors,"Please enter values in all fields");
    }
    $query1= "SELECT * FROM position WHERE position='$position'";
    $result=mysqli_query($con,$query1);
    if(mysqli_num_rows($result)>0)
    {
        array_push($errors,"The position is already added");
    }
    if(count($errors)==0)
    {
        $query="INSERT INTO position (position,description) VALUES ('$position','$positionDescription')";
        $result= mysqli_query($con,$query);
        if($result)
        array_push($alerts,"Position added successfully");
    }
}
    ?>

