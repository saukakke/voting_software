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
        <title>view/delete positions</title>
		<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
	<center><header>
    <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
       <h4>ADMIN PANEL</h4>
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
      <LI>  <a href="add_position.php">ADD POSITION</li></a>
          <LI>  <a class="active" href="view-or-deletepositions.php">VIEW/DELETE POSITION</li></a>
        </ul>
        <main>
          <h3>ALL POSITIONS:</h3>
            <?php
              $query= "SELECT * FROM position";
              $result= mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0){
                  echo "<table id='table' border='1'>";
                      echo "<tr><th>Position</th><th>Description</th><th>Action</th></tr>";
                  while($data= mysqli_fetch_assoc($result)){
                      echo "<tr><td class='position'>".$data['position']."</td><td>".$data['description']."</td><td><button class='delete'>DELETE</button>";
                  }
              }
              ?>
        </main>
        <script>
        $(".delete").click(function(){
           var position= $(this).closest('tr').find('.position').text();
            var action= confirm("Do you want to delete position "+position+"?");
            if(action==true){
                window.location.replace("deleteposition.php?position="+position);
            }
        });
        </script>
    </body>
</html>