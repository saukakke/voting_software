<?php include('admin-server/updatestudent.php') ?>
<?php include('../connection.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add student details</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
         <script src = 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
    </script>
    </head>
    <body><center>
        <?php include('../alertsanderrors/errors.php') ?>
		<header>
    <h2> COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
       <h4>ADMIN PANEL</h4>
	   </header>
          <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
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
        <li><a href="update-student-details.php">VIEW/UPDATE VOTER DETAILS</a></li>
        </ul>
        </nav>
        <main>
              <div class="current-details">
                  <table id='table1' border="1">
                      <thead><th colspan="3">Current Details</th></thead>
                      <tbody>
                      <?php
    $admno= $_GET['admno'];
    $query= "SELECT * FROM students_details WHERE admission_no='$admno'";
    $result= mysqli_query($con,$query);
    $data= mysqli_fetch_assoc($result);
    echo "<tr><th>Name</th><td>".$data['name']."</td></tr>";
    echo "<tr><th>Course</th><td>".$data['course_name']."</td></tr>";
    echo "<tr><th>Roll. No:</th><td>".$data['roll']."</td></tr>";
    echo "<tr><th>Semester:</th><td>".$data['sem']."</td></tr>";
    echo "<tr><th>Gender:</th><td>".$data['gender']."</td></tr>";
    echo "<tr><th>Admission No:</th><td>".$data['admission_no']."</td></tr>";
    echo "<tr><th>E-mail:</th><td>".$data['e_mail']."</td></tr>";
    echo "</table>";
    ?>
                      </tbody>
                  </table>
               </div>
            <div class="update details">
                <h4>Update Details</h4>
            <label for="name">Name:</label>
                <input type="text" name="name" class="name" required/><br/>
                <label for="course">Course:</label>
                <select name="course">
                <?php
                    $query1= "SELECT * FROM course";
                    $result1= mysqli_query($con,$query1);
                    while($data1= mysqli_fetch_assoc($result1)){
                        echo "<option>".$data1['course_name']."</option>";
                    }
                    ?>
                </select>
                <br/>
                <label for="roll">Roll. No:</label>
                <input type="number" name="roll" class="roll" required/>
                <br/>
                <label for="semester">Semester:</label>
                <select name="sem">
                <?php
                    $i=1;
                    for($i=1;$i<9;$i++){
                        echo "<option>".$i."</option>";
                    }
                    ?>
                </select><br/>
                <label for="gender">Gender:</label>
                <input type="radio" name="male"/>
                <label for="male">Male</label>
                <input type="radio" name="female">
                <label for="female">Female</label>
                <br/>
                <label for="admissionnumber">Admission No:</label>
                <input type="number" name="admissionnumber" required/>
                <br/>
                <label for="mail">E-mail:</label>
                <input type="email" name="mail" required></br>
            <input type="submit" name="update"/>
            </div>
        </main>
    </body>
</html>