<?php include('../connection.php') ?>
<?php
$errors = array();
if(isset($_POST['check']))
{
    $min_age = mysqli_real_escape_string($con,$_POST['min_age']);
    $max_age = mysqli_real_escape_string($con,$_POST['max_age']);
    $gender = $_POST["gender"];
     if(empty($max_age)||empty($min_age)||empty($gender))
    {
        array_push($errors,"Please enter values in all the fields");
    }
    echo "<script>";
    echo "var table= document.getElementById('table1');";
    echo "table.style.display='block';";
    echo "</script>";
    echo "<table id='table1' border='1'>";
    echo "<tr><th>Name</th><th>Course</th><th>Gender</th><th>Age</th>
<th>E-mail</th></tr>";
    $query1 = "SELECT `name`, `course_name`, `gender`, `age`, `e_mail` FROM `student_details` WHERE `gender` = 'Male' and `age` BETWEEN '$min_age' and '$max_age'";
    $result1= mysqli_query($con,$query1);
    if(mysqli_num_rows($result1)>0){
        while($data2= mysqli_fetch_assoc($result1)){
         echo "<tr><td>".$data2['name']."</td><td>".$data2['course_name']."</td><td>".$data2['gender']."</td><td>".$data2['age']."</td><td>".$data2['e_mail']."</td><tr>";       
        }
    }
}
?>