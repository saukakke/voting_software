<?php
include ('../connection.php');
$errors= array();
$alerts= array();
if(isset($_POST['add']))
{
    $year=$_POST['year'];
    $status=$_POST['status1'];
    if(empty($year)||empty($status))
    {
        array_push($errors,"Please fill in all fields");
    }
    $query1="SELECT * FROM election where election_year='$year'";
    $result1= mysqli_query($con,$query1);
    if(mysqli_num_rows($result1)>0)
    {
        array_push($errors,"There is already a election year");
    }
    if(count($errors)==0)
    {
    $query= "INSERT INTO election (election_year,status) VALUES ('$year','$status')";
    $result= mysqli_query($con,$query);
    if($result)
    {
        array_push($alerts,"Election added successfully");
    }
    }
}
if(isset($_POST['remove']))
{
    $id=$_POST['id'];
    $yr=$_POST['year1'];
    if(empty($id))
    {
        array_push($errors,"please select an election from table");
    }
    $query= "DELETE FROM candidate WHERE election_year='$yr'";
    $result= mysqli_query($con,$query);
    if(count($errors)==0)
    {
        $query2= "DELETE  FROM election WHERE election_year='$yr'";
        $result2= mysqli_query($con,$query2);
        if($result2)
        {
            array_push($alerts,"Election removed successfully");
        }
    }
}
?>