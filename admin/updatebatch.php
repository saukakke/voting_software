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
<body><center>
<header>
     <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
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
        <li><a href="deletecourse.php">DELETE COURSE</a></li>
        <li><a class="active" href="updatebatch.php">UPDATE BATCH</a></li>
        <li><a href="deletebatch.php">DELETE BATCH</a></li>
		</ul>
    </div>
    <div class="updatebatch">
    <form action="" method="POST">
        <h3>UPDATE A BATCH</h3>
            <table>
                <tr>
            <th>COURSE-NAME:</th>
                <td><select name="batch">
                    <?php
                    $query="SELECT * FROM course";
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
                        echo "<option>There are no courses.</option>";
                    }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                <th>OLD-SEMESTER:</th>
                    <td>
                    <select name="oldSemester">
                        <?php
                        $i=0;
                        for($i=1;$i<=8;$i++)
                        {
                            echo "<option>".$i."</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <th>NEW-SEMESTER</th>
                    <td>
                    <select name="newSemester">
                    <?php
                        $i=0;
                        for($i=1;$i<=8;$i++)
                        {
                            echo "<option>".$i."</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr><td><input type="submit" name="submit3" value="SUBMIT"></td></tr>
            </table>
        </form>
    </div>
    <div class="viewbatch">
        <form action="" method="POST">
    <h3>VIEW A BATCH</h3>
        <table>
        <tr>
            <th>COURSE-NAME:</th>
            <td>
            <?php
                $query="SELECT course_name FROM course";
                $data= mysqli_query($con,$query);
                if(mysqli_num_rows($data)>0)
                {
                    echo "<select name='class'>";
                    while($output=mysqli_fetch_assoc($data))
                    {
                        echo "<option>".$output['course_name']."</option>";
                    }
                }
                ?>
            </td>
            </tr>
            <tr>
            <th>SEMESTER:</th>
                <td>
                    <select name="semester">
                <?php
                    for($i=1;$i<9;$i++)
                    {
                        echo "<option>".$i."</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr><th></th><td><input type="submit" name="viewBatch" value="SUBMIT"></td></tr>
        </table>
        </form>
    </div>
    <div class="classes">
    <?php
if(isset($_POST['viewBatch']))
{
    $course=$_POST['class'];
    $sem=$_POST['semester'];
    $query= "SELECT * FROM students_details WHERE course_name='$course' AND sem='$sem'";
    $sql=mysqli_query($con,$query);
    if(mysqli_num_rows($sql)>0)
    {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Class</th><th>Roll.No</th><th>Sem</th><th>Admission_no</th><th>E-mail</th></tr>";
        while($data=mysqli_fetch_assoc($sql))
        {
           echo "<tr><td>".$data['name']."</td><td>".$data['course_name']."</td><td>".$data['roll']."</td><td>".$data['sem']."</td><td>".$data['admission_no']."</td><td>".$data['e_mail']."</td></tr>"; 
        }
    }
    else
        echo "<h4>There are no students in database of ".$course." and semester ".$sem;
}
?>
    </div>
	</center>
    </body>
</html>
