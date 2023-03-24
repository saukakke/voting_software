<?php include('../connection.php') ?>
<?php
    session_start();
    if(!isset($_SESSION['adminname'])){
        echo "<script>alert('You have to login to view this page');</script>";
        echo "<script>window.location.href='adminlogin.php';</script>";
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add student details</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
         <script src = 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
    </script>
    </head>
    <body>
	<center>
	<header>
    <h2> COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
       <h4>ADMIN PANEL</h4>
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
            <li><a href="add_student_details.php">ADD VOTER DETAILS</a></li>
        <li><a class="active" href="update-student-details.php">VIEW/DELETE VOTER DETAILS</a></li>
        <li><a href="check_votes.php">CASTED VOTES</a></li>
        </ul>
        </nav>
  
<main>
    <H3>VIEW VOTER DETAILS</H3>
    <form action="" method="POST">
    <div class="searchbar">
    <input type="text" name="name" placeholder="Student's name or admission number"/>
    <input type="submit" value="SEARCH" class="search" name="search" />
    </div>
    <div class="view">
        <H4>SEARCH VOTER BY CLASS</H4>
        <label for="course">Course:</label>
        <select name="course">
    <?php
    $query= "SELECT * FROM course";
    $result= mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        while($data=mysqli_fetch_assoc($result)){
            echo "<option>".$data['course_name']."</option>";
        }
    }
    ?>
        </select>
        <label for="semester">Semester</label>
        <select name="semester">
        <?php
            $i=1;
            for($i=1;$i<9;$i++){
                echo "<option>".$i."</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="SUBMIT">
    </div>
    </form>
    <div class="all-students">
        <h4>All Voters</h4>
        <table id="table1" border="1">
        <tr><th>Name</th><th>Course</th><th>Roll No</th><th>Semester</th><th>Gender</th><th>Admission Number</th>
            <th>E-mail</th><th>Action</th></tr>
    <?php
        $query1= "SELECT * FROM students_details";
        $result1= mysqli_query($con,$query1);
        if(mysqli_num_rows($result)>0){
            while($data1=mysqli_fetch_assoc($result1)){
                echo "<tr><td>".$data1['name']."</td><td>".$data1['course_name']."</td><td>".$data1['roll']."</td><td>".$data1['sem']."</td><td>".$data1['gender']."</td><td class='admno'>".$data1['admission_no']."</td><td>".$data1['e_mail']."</td><td><button class='delete'>Delete</button><tr>";
            }
        }
            else{
                echo "<p>No students found</p>";
            }
        ?>
        </table>
            <?php
            if(isset($_POST['search'])){
                echo "<script>";
                echo "var table= document.getElementById('table1');";
                echo "table.style.display='none';";
                echo "</script>";
                echo "<table id='table1' border='1'>";
                echo "<tr><th>Name</th><th>Course</th><th>Roll No</th><th>Semester</th><th>Gender</th><th>Admission Number</th>
            <th>E-mail</th><th>Action</th></tr>";
                $name=$_POST['name'];
                $query2= "SELECT * FROM students_details WHERE name='$name' or admission_no='$name'";
                $result2= mysqli_query($con,$query2);
                if(mysqli_num_rows($result2)>0){
                    while($data2= mysqli_fetch_assoc($result2)){
                     echo "<tr><td>".$data2['name']."</td><td>".$data2['course_name']."</td><td>".$data2['roll']."</td><td>".$data2['sem']."</td><td>".$data2['gender']."</td><td class='admno'>".$data2['admission_no']."</td><td>".$data2['e_mail']."</td><td><button class='delete'>Delete</button><tr>";       
                    }
                }
                else{
                    echo "<tr><td>no results found</td></tr>";
                }
                echo "</table>";
            }
            ?>  
                <?php
                if(isset($_POST['submit'])){
                echo "<script>";
                echo "var table= document.getElementById('table1');";
                echo "table.style.display='none';";
                echo "</script>";
                echo "<table id='table1' border='1'>";
                echo "<tr><th>Name</th><th>Course</th><th>Roll No</th><th>Semester</th><th>Gender</th><th>Admission Number</th>
                <th>E-mail</th><th>Action</th></tr>";
                $course=$_POST['course'];
                $sem=$_POST['semester'];
                $query3= "SELECT * FROM students_details WHERE course_name='$course' AND sem='$sem'";
                $result3= mysqli_query($con,$query3);
                if(mysqli_num_rows($result3)>0){
                    while($data3= mysqli_fetch_assoc($result3)){
                     echo "<tr><td>".$data3['name']."</td><td>".$data3['course_name']."</td><td>".$data3['roll']."</td><td>".$data3['sem']."</td><td>".$data3['gender']."</td><td class='admno'>".$data3['admission_no']."</td><td>".$data3['e_mail']."</td><td><button class='delete'>Delete</button><tr>";       
                    }
                }
                else{
                    echo "<tr><td>no reusults found</td></tr>";
                }
                echo "</table>";
            }
            ?>
        
        <script>
        $(".delete").click(function(){
            var id1= $(this).closest('tr').find('.admno').text();
            var action= confirm("You are about to delete this voter. Do you want to continue?");
            if(action == true){
                window.location.replace("delete.php?admno="+id1);
            }
        });
        </script>
    </div>
        </main>
		</center>
    </body>
</html>