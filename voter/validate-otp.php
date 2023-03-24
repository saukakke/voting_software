
<!DOCTYPE html>
<html>
    <head>
        <title>COLLEGE UNION ONLINE ELECTION</title>
        <script src="jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    </head>
    <body>
	<CENTER>
      <header> 
    <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
	</header>
        <form action="voter-server/registration-server.php" method="POST">
            <label for="admission_no">Admission No:</label>
            <input type="number" name="admissionnumber" value="<?php echo $_POST['admissionnumber']?>"/><br/>
            <label for="mail">E-Mail:</label>
            <input type="email" name="mailid" value="<?php echo $_POST['mailid']?>"/><br/>
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $_POST['password']?>"/><br/>
        <label for="otp">Enter OTP:</label>
        <input type="number" name="otp"/><br/>
            <input type="submit" name="validateOtp"/>
        </form>
		</center>
    </body>
</html>
<?php
include '../connection.php';
$errors= array();
if(isset($_POST['register']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $admno = mysqli_real_escape_string($con,$_POST['admissionnumber']);
    $mailid= mysqli_real_escape_string($con,$_POST['mailid']);
    $password= mysqli_real_escape_string($con,$_POST['password']);
    $password1= mysqli_real_escape_string($con,$_POST['password1']);
  if(empty($name)||empty($admno)||empty($mailid)||empty($password)||empty($password1))
    {
        array_push($errors,"Please fill in all the elements.");
    }
    if($password!=$password1)
    {array_push($errors,"Passwords mis-match");
    }
    $q7= "SELECT * FROM student_reg WHERE admission_no='$admno'";
    $r7=mysqli_query($con,$q7);
    if(mysqli_num_rows($r7)>0){
        array_push($errors,"You are already registered");
        header('location: registration.php');
    }
    if(count($errors)==0)
    {
    $query = "SELECT * FROM students_details WHERE  admission_no='$admno' AND e_mail='$mailid' LIMIT 1";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $digits=4;
        $otp= rand(pow(10, $digits-1), pow(10,$digits)-1);
        $q2= "SELECT * FROM otp WHERE e_mail='$mailid'";
        $r2= mysqli_query($con,$q2);
        if(mysqli_num_rows($r2)>0){
            $q4= "UPDATE otp SET otp='$otp' WHERE e_mail='$mailid'";
            $r4= mysqli_query($con,$q4);
        }
        else{
        $q1= "INSERT INTO otp(e_mail,otp)VALUES('$mailid','$otp')";
        $r1=mysqli_query($con,$q1);
        }
        $subject= "Otp for college union online election system";
        $body= "Otp: ".$otp;
        $mail=mail($mailid,$subject,$body);
    }
    else
    {
         array_push($errors,"User informations not found in the database");
        header('location: registration.php');
    }
    }  
}   
?>
 <?php include('../alertsanderrors/errors.php') ?>