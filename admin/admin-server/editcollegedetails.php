<?php
include '../connection.php';
$errors= array();
$alerts= array();
if(isset($_POST['submit1']))
{
  $courseName="";
    $courseName= mysqli_real_escape_string($con,$_POST['coursename']);
    $query= "SELECT * FROM course WHERE course_name='$courseName'";
    $result= mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        array_push($errors,"The course has been already added.");
    }
    $type=is_numeric($courseName);
    if($type==1)
    {
        array_push($errors,"Please enter a valid course name");
    }
    if(count($errors)==0)
    {
        $query="INSERT INTO course (course_name) VALUES ('$courseName')";
        $result=mysqli_query($con,$query);
        array_push($alerts,"Course added successfully");
    }
}
if(isset($_POST['submit2']))
{
    $courseName1="";
    $courseName1=mysqli_real_escape_string($con,$_POST['batch1']);
    $sql="SELECT * FROM candidate WHERE course_name='$courseName1'";
    $data=mysqli_query($con,$sql);
    if(mysqli_num_rows($data)>0)
    {
        array_push($errors,"There are candidates with this course name. First remove them");
    }
    $sql1="SELECT * FROM students_details WHERE course_name='$courseName1'";
    $data1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($data1))
    {
        array_push($errors,"There are students with this course name. First remove them.");
    }
    if(count($errors)==0)
    {
    $query= "DELETE FROM course WHERE course_name='$courseName1'";
    $result=mysqli_query($con,$query);
    if($result)
    {
    array_push($alerts,"The course ".$courseName1." deleted successfully");
    }
    }
}
if(isset($_POST['submit3']))
{
    $course= mysqli_real_escape_string($con,$_POST['batch']);
    $oldSem= mysqli_real_escape_string($con,$_POST['oldSemester']);
    $newSem= mysqli_real_escape_string($con,$_POST['newSemester']);
     if($oldSem==$newSem)
    {
        array_push($errors,"The semester you entered are the same");
    }
    $sql="SELECT * FROM students_details WHERE course_name='$course' AND sem='$oldSem'";
    $data=mysqli_query($con,$sql);
    if(mysqli_num_rows($data)>0)
    {
    if(count($errors)==0)
    {
        $query= "UPDATE students_details SET sem='$newSem' WHERE sem='$oldSem' AND course_name='$course'";
        $result= mysqli_query($con,$query);
        array_push($alerts,"Updated successfully");
    }
    }
    else
    {
        array_push($errors,"There are no batch of ".$course." and semester ".$oldSem);
    }
}

//remove a batch
if(isset($_POST['submit4']))
{
    $batch= $_POST['class'];
    $semester= $_POST['sem'];
    $sql="SELECT * FROM students_details WHERE course_name='$batch' AND sem='$semester'";
    $data= mysqli_query($con,$sql);
    if(mysqli_num_rows($data)>0)
    {
    $query= "DELETE * FROM students_details WHERE course_name='$batch' AND sem='$semester'";
    $result= mysqli_query($con,$query);
    if($result)
    {
        array_push($alert,"The batch deleted successfully");
    }
    }
    else
    {
        array_push($errors,"There is no batch of ".$batch." and semester ".$semester);
    }
}
?>