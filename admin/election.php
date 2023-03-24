<?php
session_start();
if(!isset($_SESSION['adminname']))
{
header('location: adminlogin.php');
}
?>
<?php include '../connection.php' ?>
<html>
<head>
    <title>start/stop election</title>
	<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body>
	<center>
	<header>
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
		<h4>ADMIN PANEL<h4>
		</header>
      
             
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a class=active href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a></li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
      
        <div class="nav2">
		<ul>
        <li>
		<a class="active" href="election.php">ALL ELECTIONS</a></li>
            <li><a href="add-or-remove-election.php">ADD/REMOVE A ELECTION</a></li>
            <li><a href="start-stop-election.php">START/STOP A ELECTION</a></li>
			</ul>
        </div>
        <div class="startOrStopElection">
            
            <h3>ELECTIONS</h3>
         <table border="1">
            <tr>
             <th>ELECTION-ID</th>
                <th>ELECTION-YEAR</th>
                <th>STATUS</th>
             </tr>
             <?php
             $query= "SELECT * FROM election";
             $result= mysqli_query($con,$query);
             if(mysqli_num_rows($result)>0)
             {
                 while($data=mysqli_fetch_assoc($result))
                 {
                     echo "<tr><td>".$data['election_id']."</td><td>".$data['election_year']."</td><td>".$data['status']."</td></tr>";
                 }
             }
             ?>
            </table>
        </div>
    </center>
    </body>

</html>