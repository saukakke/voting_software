<?php
session_start();
if(!isset($_SESSION['voterid']))
{
    header('location: voterlogin.php');
}
?>
<html>
<head>
    <title>voter-homepage</title>
	<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    </head>
    <body>
	<header>
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
    </header>
      
        <ul>
          <li><a class="active" href="voter-homepage.php">Home</a></li>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="results.php">Published Results</a></li>
            <li><a  href="../logout.php">Logout</a></li>
          </ul>
      
        <center>
        <h3>YOUR PROFILE</h3>
		<div class="yourprofile">
         <table border=4 width=200 cellpadding=2>
         <?php
             include '../connection.php';
             $admno=$_SESSION['voterid'];
             $query= "SELECT * FROM student_details WHERE admission_no='$admno'";
             $result=mysqli_query($con,$query);
             $details=mysqli_fetch_assoc($result);
             echo "<tr><th>Name</th><td>".$details['name']."</td></tr>";
              echo "<tr><th>Class</th><td>".$details['course_name']."</td></tr>";
              echo "<tr><th>Roll. No</th><td>".$details['roll']."</td></tr>";
              echo "<tr><th>Semester</th><td>".$details['sem']."</td></tr>";
              echo "<tr><th>Admission. No</th><td>".$details['admission_no']."</td></tr>";
              echo "<tr><th>E-mail ID</th><td>".$details['e_mail']."</td></tr>";
            ?>
            </table>
			</div>
            <div class="updateProfile">
             <h4>CHANGE E-MAIL ID</h4>
                <table border=4 width=100 cellpadding=1>
                    <form action="voter-homepage.php" method="POST">
                <tr><th>E-mail ID</th>
                    <td><input type="email" name="mailid" required></td>
                    <td><input type="submit" name="updatemail"></td>
                    </tr>
                    </form>
					</table>
                    
					<h4>CHANGE PASSWORD<h4>
					<table border=4 width=200 cellpadding=1>
                    <tr><th>Current password</th>
                        <form action="voter-homepage.php" method="POST">
                    <td><input type="password" name="password" required></td>
                    </tr>
                    <tr><th>New Password</th>
                        <td><input type="password" name="newpassword" required></td>
                    <td><input type="submit" name="submit"></td></tr>
                    </form>
                </table>
            </div>
        </center>
    </body>
</html>
<?php
$admno=$_SESSION['voterid'];
$errors=array();
if(isset($_POST['updatemail']))
{
    $newMail= mysqli_real_escape_string($con,$_POST['mailid']);
    if(empty($newMail))
    {
        array_push($errors,"Please enter value in the E-mail Field");
    }
    $query= "UPDATE students_details SET e_mail='$newMail' WHERE admission_no='$admno'";
    $result= mysqli_query($con,$query);
    if($result){
        echo "<script>alert('Email updated successfully');</script>";
        echo "<script>window.location.href='voter-homepage.php';</script>";
    }
}
?>
<?php
    $admno= $_SESSION['voterid'];
    $errors=array();
if(isset($_POST['submit']))
{
    $newPassword= mysqli_real_escape_string($con,$_POST['newpassword']);
    $currentPassword = mysqli_real_escape_string($con,$_POST['password']);
    $query="SELECT * FROM student_reg WHERE password='$currentPassword'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)<1)
    {
        array_push($errors,"The current password is wrong.");
    }
    if(count($errors)==0){
        $query1="UPDATE student_reg SET password='$newPassword' WHERE admission_no='$admno'";
        $result1= mysqli_query($con,$query1);
        if($result1){
            echo "<script>alert('Password change successfull');</script>";
            echo "<script>window.location.href='voter-homepage.php';</script>";
        }
    }
}
?>
    <?php include('../alertsanderrors/errors.php') ?>