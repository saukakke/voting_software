<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('admin-server/addposition.php') ?>
<?php include('../alertsanderrors/alerts.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add-position</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body>	<center>
	<header>
    <h2> COLLEGE UNION ONLINE ELECTION SYSTEM</h2><h4>ADMIN PANEL</h4>
	</header>
       
         <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a class="active" href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a>
                </li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <ul>
        <li><a class="active" href="add_position.php">ADD POSITION</li></a>
         <li>   <a href="view-or-deletepositions.php">VIEW POSITIONS</li></a>
        </ul>
<table>
<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>

<tr>
    <td>ADD POSITION:</td>
    <form action="" method="POST">
    <td><input type="text" name="position" /></td> </tr>
    <tr><td>POSITION-DESCRIPTION:</td>    <td><input type="text" name="description"></td> </tr>
<tr>  <th></th>  <td><input type="submit" name="submit" value="ADD" /></td> 
    </form>
</tr>
</table>
</center>
    </body>
</html>