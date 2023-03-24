<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('admin-server/editcollegedetails.php')?>
<?php include('../alertsanderrors/alerts.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
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
                <li><a class="active" href="collegedetails.php">COLLEGE</a></li>
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
    <li><a  href="collegedetails.php">COURSES</a></li>
        <li><a  href="addcourse.php">ADD COURSE</a></li>
        <li><a class="active" href="deletecourse.php">DELETE COURSE</a></li>
        <li><a href="updatebatch.php">UPDATE BATCH</a></li>
        <li><a href="deletebatch.php">DELETE BATCH</a></li>
		</ul>
    </div>
 
        <div class="deleteBatch">
            <form action="" method="POST">
        <h3>DELETE A COURSE</h3>
                <h5>SELECT A COURSE FROM BELOW TO REMOVE IT</h5>
            <table>
            <tr><th>COURSE-NAME</th><td>
                <select name="batch1" required>
                <?php
                $query= "SELECT course_name FROM course";
                $result= mysqli_query($con,$query);
                if(mysqli_num_rows($result)>0)
                {
                    while($data=mysqli_fetch_assoc($result))
                    {
                        echo "<option>".$data['course_name']."</option>";
                    }
                }
               else
               {
                   echo "<h4>There are no courses in database.<\h4>";
               }
                ?>
                </select>
                </td></tr>
                <tr><td><input type="submit" name="submit2" value="SUBMIT"></td></tr>
            </table>
            </form>
    </div>
    </body>
</html>