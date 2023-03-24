<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('admin-server/editcollegedetails.php') ?>
<?php include('../alertsanderrors/alerts.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
<html>
<head>
    <title>college-details</title>
	<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
<body>
<center>
<header>
     <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
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
                </li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    <div class="nav2">
	<ul>
    <li><a  href="collegedetails.php">DEPARTMENT</a></li>
        <li><a class="active" href="addcourse.php">ADD DEPARTMENT</a></li>
        <li><a href="deletecourse.php">DELETE DEPARTMENT</a></li>
        <li><a href="updatebatch.php">UPDATE BATCH</a></li>
        <li><a href="deletebatch.php">DELETE BATCH</a></li>
		</ul>
    </div>
    <div class="addcourse">
        <form action="" method="POST">
        <table cellpadding=20>
        <tr><th>Course-Name:</th><td><input type="text" name="coursename" required></td></tr>
            <tr>
            <td><input type="submit" name="submit1" value="SUBMIT"></td>
            </tr>
        </table>
        </form>
    </div></center>
    </body>
</html>