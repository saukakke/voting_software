<?php include('admin-server/addstudent.php') ?>
<?php include('../connection.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add student details</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body>
		<center>
	
        <?php include('../alertsanderrors/errors.php') ?>
		<header>
    <h2> COLLEGE UNION ONLINE ELECTION SYSTEM</h2><h4>ADMIN PANEL</h4>
	</header>
       
          <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a class="active" href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a>
                </li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    <nav>
        <ul>
            <li><a class="active" href="add_student_details.php">ADD VOTER DETAILS</a></li>
        <li><a href="update-student-details.php">VIEW/DELETE VOTER DETAILS</a></li>
        <li><a href="check_votes.php">CASTED VOTES</a></li>
        </ul>
        </nav>
     <form action="" method="POST">
            <h3>ADD STUDENT DETAILS</h3>
            <table>
                <tr>            
                    <td>NAME:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>CLASS:</td>
                    <td><?php
                        $query="SELECT course_name FROM course";
                        $result= mysqli_query($con,$query);
                        if(mysqli_num_rows($result)>0)
                        {
                            echo "<select name='class'>";
                            while($data= mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$data['course_name']."</option>";
                            }
                        }
                       else
                       {
                           echo "<h4>There are no courses in database</h4>";
                       }
                         ?>
                    </td>
                </tr>
                <tr>
                    <td>ROLL NO:</td>
                    <td><input type="number" name="rollnumber" required></td>
                </tr>
                <tr>
                    <td>SEMESTER:</td>
                    <td>
                        <select name="semester" required>
                        <?php
                        for($i=1;$i<9;$i++)
                        {
                            echo "<option>".$i."</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>GENDER:</td>
                    <td>
        
        <input type="radio" name="gender" value="Male" required>
                        <label>Male</label>
        
        <input type="radio" name="gender" value="Female">
                        <label>Female</label>
       
        <input type="radio" name="gender" value="Others">
                        <Label>Others</Label>
                    </td>
        </tr>
        <tr>
            <td>ADMISSION NUMBER:</td>
            <td><input type="number" name="admissionnumber" required></td>
        </tr>
        <tr>
            <td>EMAIL ID:</td>
            <td><input type="email" name="mailid" required></td>
        </tr>
       
        <tr> 
            <td><input type="submit" name="addstudent" value="SUBMIT"></td>
            
        </tr>
        <tr>
            </table> 
        </form>
		</center>
    </body>
</html>
