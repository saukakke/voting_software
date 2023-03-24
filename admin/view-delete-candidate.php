<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('admin-server/addcandidate.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
<?php include('../alertsanderrors/alerts.php') ?>
<!DOCTYPE html>
<html>
    <head>
       <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
        <title>add-candidates</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body>
	<center>
	<header>
    <h2>COLLEGE UNION ONLINE  ELECTION SYSTEM</h2>
	 <h4>ADMIN PANEL</h4>
	</header>
      
     <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a class="active" href="add_candidate_details.php">CANDIDATES</a>
                </li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <ul>
        <li><a href="add_candidate_details.php">ADD CANDIDATES</a></li>
            <li><a class="active" href="view-delete-candidate.php">VIEW/DELETE A CANDIDATE</a></li>
        </ul>
        <main>
        <h4>ALL CANDIDATES</h4>
            <?php
     $query="SELECT * FROM election";
$result= mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    echo "<form action='' method='POST'>";
echo "<label for='year'>Election-Year</label>";
echo "<select class='year' name='year'>";
    while($data= mysqli_fetch_assoc($result)){
        echo "<option>".$data['election_year']."</option>";
    }
	
    echo "<input type='submit' name='submit' value='SUBMIT'>";
    echo "</form>";
}
    ?>
        </main>
		<br>
        <?php
        if(isset($_POST['submit'])){
            $year= $_POST['year'];
            $q1= "SELECT * FROM candidate WHERE election_year='$year'";
            $r1= mysqli_query($con,$q1);
            if(mysqli_num_rows($r1)>0){
                echo "<table border='1'>";
                echo "<tr><th>Id</th><th>Name</th><th>Course<th>Semester</th><th>Position</th><th>Election Year</th><th>Image</th><th>Action</th></tr>";
                while($data1=mysqli_fetch_assoc($r1)){
                    $img=$data1['image'];
                    echo "<tr><td class='id'>".$data1['id']."</td><td>".$data1['name']."</td><td>".$data1['course_name']."</td><td>".$data1['sem']."</td><td>".$data1['position']."</td><td>".$data1['election_year']."</td><td><img src=$img height=120 width=120></td><td><button class='remove-candidate'>Delete Candidate</button></tr>";
                }
                echo "</table>";
            }
        }
        ?>
		</center>
        <script>
        $(".remove-candidate").click(function(){
           var id= $(this).closest('tr').find('.id').text();
            var action= confirm("Do you want to delete this candidate?");
            if(action==true){
                window.location.replace("remove-candidate-server.php?id="+id);
            }
        });
        </script>
    </body>
</html>