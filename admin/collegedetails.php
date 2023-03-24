<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('../connection.php') ?>
<html>
<head>
    <title>college-details</title>
	<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
<body><center>
<header>

     <h2> COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
       <h4>ADMIN PANEL</h4>
	   </header>
             <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a class="active" href="collegedetails.php">DEPARTMENT</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a>
                
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    <div class="nav2">
	<ul>
    <li><a class="active" href="collegedetails.php">DEPARTMENT</a></li>
        <li><a href="addcourse.php">ADD DEPARTMENT</a></li>
        <li><a href="deletecourse.php">DELETE DEPARTMENT</a></li>
        <li><a href="updatebatch.php">UPDATE BATCH</a></li>
        <li><a href="deletebatch.php">DELETE BATCH</a></li>
		</ul>
    </div>
    <div class="collegeDetails">
      <h4>THE DEPARTMENTS ADDED ARE:</h4>
        <?php
     $query="SELECT course_name FROM course";
     $result= mysqli_query($con,$query);
     if(mysqli_num_rows($result)>0)
     {
         echo "<table><tr><th>DEPARTMENTS</th></tr>";
         while($data=mysqli_fetch_assoc($result))
         {
             echo "<tr><td>".$data['course_name']."</td></tr>";
         }
     }
else
{
    echo "<h6>No courses added</h6>";
}
    ?>
    </div>
	</center>
   </body>
</html>