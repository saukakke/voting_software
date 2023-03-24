<?php include('admin-server/check.php') ?>
<?php include('../connection.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>check for casted votes</title>
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
                <li><a href="collegedetails.php">DEPARTMENT</a></li>
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
            <li><a href="add_student_details.php">ADD VOTER DETAILS</a></li>
        <li><a href="update-student-details.php">VIEW/DELETE VOTER DETAILS</a></li>
        <li><a class="active" href="check_votes.php">CASTED VOTES</a></li>
        </ul>
        </nav>
     <form action="" method="POST">
            <h3>CHECK FOR CASTED VOTES</h3>
            <table>
                <tr>            
                    <td>GENDER:</td>
                    <td><select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select></td>
                </tr>            
                <tr>
                    <td>MINIMUM AGE:</td>
                    <td><input type="number" name="min_age" required></td>
                </tr>
                <tr>
                    <td>MAXIMUM AGE:</td>
                    <td>
                        <input type="number" name="max_age" required>
                    </td>
                </tr>
        <tr> 
            <td><input type="submit" name="check" value="SUBMIT"></td>
            
        </tr>
        <tr>
            </table> 
            <table id="table1">

            </table>
        </form>
		</center>
    </body>
</html>
