<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
       
        <title>admin-homepage</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body><header>
	<center>
	
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
        <h4>ADMIN PANEL</h4>    
		</header>
    <div class="nav">
            <ul>
                <li><a class="active "href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a>
                </li>
			
				
                <li><a href="results.php">RESULT</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
		</center>
    </body>
</html>

