<?php
session_start();
if(!isset($_SESSION['adminname']))
{
header('location: adminlogin.php');
}
?>
<?php include ('../connection.php') ?>
<?php include('admin-server/add-or-remove-election-server.php') ?>
<?php include('../alertsanderrors/alerts.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
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
             <div class="nav">
            <ul>
                <li><a href="admin-homepage.php">HOME</a></li>
                <li><a href="collegedetails.php">COLLEGE</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a class="active" href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a></li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="nav2">
		<ul>
        <li><a href="election.php">ALL ELECTIONS</a></li>
            <li><a class="active" href="add-or-remove-election.php">ADD/REMOVE A ELECTION</a></li>
            <li><a href="start-stop-election.php">START/STOP A ELECTION</a></li>
			</ul>
        </div>
        <div class="add-election">
        <h3>ADD AN ELECTION YEAR</h3>
            <form action="" method="POST">
            <label for="election">ELECTION YEAR:</label>
            <input type="text" name="year" placeholder="YYYY-YYYY"><br>
            <label for="status">ELECTION-STATUS:</label>
            <select name="status1">
            <option>Voting-Disabled</option>
                <option>Voting-Active</option>
            </select><br>
            <input type="submit" name="add" value="ADD">
        </div>
        <div class="remove-election">
        <h3>CLICK ON ELECTION FROM BELOW TABLE TO REMOVE IT</h3>
            <table>
            <tr><th>ELECTION-ID:</th>
                <td><input type="text" id="id" name="id" readonly></td>
                </tr>
                <tr>
                <th>ELECTION-YEAR:</th>
                    <td><input type="text" id="year" name="year1" readonly></td>
                </tr>
                <tr><th></th><td><input type="submit" name="remove"
                                        value="REMOVE"></td></tr>
            </table>
            <?php
              $query="SELECT * FROM election";
              $result= mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0)
              {
                  echo "<table border='1' id='table'>";
                  echo "<tr><th>ELECTION-ID</th><th>ELECTION-YEAR</th><th>ELECTION-STATUS</th></tr>";
                  while($data= mysqli_fetch_assoc($result))
                  {
                      echo "<tr><td>".$data['election_id']."</td><td>".$data['election_year']."</td><td>".$data['status']."</td></tr>";
                  }
              }
             ?>
            <script>
            var table= document.getElementById("table");
                for(var i=1;i<table.rows.length;i++)
                    {
                        table.rows[i].onclick= function()
                        {
                        document.getElementById("id").value=this.cells[0].innerHTML;
                            document.getElementById("year").value=this.cells[1].innerHTML;
                        }
                    }
            </script>
            
        </div>
            </form>
			</center>
    </body>
</html>