<?php include('../connection.php') ?>
<?php
$errors = array();
if(isset($_POST['addstudent']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $class = mysqli_real_escape_string($con,$_POST['class']);
    $rollno = mysqli_real_escape_string($con,$_POST['rollnumber']);
    $semester = mysqli_real_escape_string($con,$_POST['semester']);
    $gender = $_POST["gender"];
    $admissionnumber = mysqli_real_escape_string($con,$_POST['admissionnumber']);
    $mailid = mysqli_real_escape_string($con,$_POST['mailid']);
     if(empty($name)||empty($class)||empty($semester)||empty($gender)||empty($admissionnumber)||empty($mailid))
    {
        array_push($errors,"Please enter values in all the fields");
    }
    if($rollno==0)
    {
        array_push($errors,"Please enter a valid roll number");
    }
    if(strlen($rollno)>2)
    {
        array_push($errors,"Please enter a valid roll number");
    }
    $query1 = "SELECT admission_no, e_mail FROM students_details WHERE admission_no='$admissionnumber' or e_mail ='$mailid'";
    $result= mysqli_query($con,$query1);
    $student=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
        if($student['admission_no'] === $admissionnumber){array_push($errors,"Admission Number already added");}
        if($student['e_mail'] === $mailid){array_push($errors,"E-mail id already exists");}
    }
    $query2= "SELECT * FROM students_details WHERE course_name='$class' AND sem='$semester'AND roll='$rollno'";
    $result1= mysqli_query($con,$query2);
    if(mysqli_num_rows($result1)>0)
    {
        array_push($errors,"The student already exists");
    }
    if(count($errors)==0)
    {
      $query = "INSERT INTO students_details(name,course_name,roll,sem,gender,admission_no,e_mail) VALUES ('$name','$class','$rollno','$semester','$gender','$admissionnumber','$mailid')";
      mysqli_query($con,$query);
      array_push($errors,"Student added successfully.");
    }
}
?>