<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('../connection.php') ?>
<html>
<head>
    <title>publish-results</title>
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
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a href="add_candidate_details.php">CANDIDATES</a></li>
                <li><a class="active" href="results.php">RESULT</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="nav2">
		<ul>
        <li><a class="active" href="results.php">PUBLISH RESULT</a></li>
            <li><a href="published-results.php">PUBLISHED RESULT</a></li>
			</ul>
        </div>
        <div class="publishresult">
            <h3>SELECT AN ELECTION FROM BELOW TABLE TO PUBLISH RESULT</h3>
            <form action="" method="POST">
            <label for="election">Election-Id:</label>
            <input type="text" name="electionid" id="electionid" required>
            <label for="electionyear">Election-Year:</label>
            <input type="text" name="electionyear" id="electionyear" required>
            <input type="submit" name="submit" value="PUBLISH">
            </form>
        </div>
        <?php
        $query= "SELECT * FROM election WHERE status='Voting-Disabled'";
        $result= mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "<table border='1' id='table'>";
            echo "<tr><th>Election-ID</th><th>Election-Year</th><th>Status</th></tr>";
            while($data=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>".$data['election_id']."</td><td>".$data['election_year']."</td><td>".$data['status']."</td></tr>";
            }
            echo "</table>";
        }
            else
            {
                echo "<h4>There are no election's that is disabled</h4>";
            }
         ?>
        <script>
        var table= document.getElementById('table');
            for(var i=1;i<table.rows.length;i++)
                {
                    table.rows[i].onclick= function(){
                        document.getElementById('electionid').value=this.cells[0].innerHTML;
                        document.getElementById('electionyear').value=this.cells[1].innerHTML;
                    }
                }
        </script>
        <?php
        if(isset($_POST['submit']))
        {
            $alerts= array();
            $errors=array();
            $year= $_POST['electionyear'];
            if(empty($year))
            {
                array_push($errors,"Please select an election from the table");
            }
            $query1= "UPDATE election SET status='result-published' WHERE election_year='$year'";
            $result1= mysqli_query($con,$query1);
            if($result1)
            {
                array_push($alerts,"Result Published successfully");
            }
            include'../alertsanderrors/alerts.php'; include'../alertsanderrors/errors.php';
        }
        ?>
		</center>
    </body>
</html>