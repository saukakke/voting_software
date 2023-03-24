<?php
include '../connection.php';
$errors = array();
$alerts= array();
$types=array("image/jpeg","image/jpg");
if(isset($_POST['addcandidate']))
{
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $class= mysqli_real_escape_string($con,$_POST['class']);
    $sem= mysqli_real_escape_string($con,$_POST['semester']);
    $admno=mysqli_real_escape_string($con,$_POST['admissionnumber']);
    $position= mysqli_real_escape_string($con,$_POST['position']);
    $year= mysqli_real_escape_string($con,$_POST['year']);
    if(empty($name)||empty($class)||empty($sem)||empty($admno)||empty($position)||empty($year))
    {
        array_push($errors,"Please fill in all fields");
    }
    $filename= $_FILES['photo']['name'];
    $filetmpname = $_FILES['photo']['tmp_name'];
    $filetype= $_FILES['photo']['type'];
    if(!in_array($filetype,$types))
    {
        array_push($errors,"Only .jpg and .jpeg files accepted");
    }
    $query= "SELECT * FROM candidate WHERE admission_no='$admno' AND election_year='$year' LIMIT 1";
    $results= mysqli_query($con,$query);
    if(mysqli_num_rows($results)>0)
    {
        array_push($errors,"The candidate already exists");
    }
    if(count($errors)==0)
    {
    $folder = '../imagesupload/';
    move_uploaded_file($filetmpname,$folder.$filename);
    $file=$folder.$filename;
    $sql= "INSERT INTO candidate (name,course_name,sem,admission_no,position,election_year,image) VALUES('$name','$class','$sem','$admno','$position','$year','$file')";
    $result= mysqli_query($con,$sql);
    if($result)
    {
        array_push($alerts,"Candidate added successfully");
    }
    }
}
?>