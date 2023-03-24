<?php
include '../connection.php';
$errors=array();
$alerts= array();
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $year=$_POST['year'];
    $status=$_POST['status'];
    if(empty($id))
    {
        array_push($errors,"Please select a election from the table");
    }
    if(count($errors)==0)
    {
        $query= "UPDATE election SET status='Voting-Disabled' WHERE election_id='$id'";
        $result= mysqli_query($con,$query);
        if($result)
        {
            array_push($alerts,"Election Stopped");
        }
    }
}
if(isset($_POST['activate']))
{
    $id1=$_POST['id1'];
    $yr1=$_POST['year1'];
    $status1=$_POST['election-status'];
    if(empty($id1))
    {
        array_push($errors,"Please selece an election from the table to activate it");
    }
    if(count($errors)==0)
    {
        $query1= "UPDATE election SET status='Voting-Active' WHERE election_id='$id1'";
        $result1= mysqli_query($con,$query1);
        if($result1)
        {
        array_push($alerts,"Election Started");
        }
    }
}
?>