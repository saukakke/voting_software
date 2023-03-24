<?php
session_start();
if(!isset($_SESSION['adminname']))
{
header('location: adminlogin.php');
}
?>
<?php include '../connection.php' ?>
<?php include ('admin-server/start-or-stop-election.php')?>
<?php include ('../alertsanderrors/alerts.php') ?>
<?php include ('../alertsanderrors/errors.php') ?>
<html>
<head>
    <title>start/stop election</title>
	<link rel="stylesheet" href="css/common-css-admin.css" type="text/css">
    </head>
    <body>
	<center>
	<header>
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
       <h4>ADMIN PANEL</h4>
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
            <li><a href="add-or-remove-election.php">ADD/REMOVE A ELECTION</a></li>
            <li><a class="active" href="start-stop-election.php">START/STOP A ELECTION</a></li>
			</ul>
        </div>
        <div class="activeElections">
        <h3>ACTIVE ELECTION</h3>
            <h4>CLICK ON ANY ELECTION IN THE BELOW TABLE TO STOP ELECTION</h4>
            <form action="" method="POST">
            <table>
            <tr><th>ELECTION-ID:</th><td><input type="text" id="id" name="id" readonly></td></tr>
                <tr><th>ELECTION-YEAR:</th><td><input type="text" id="year" name="year" readonly></td></tr>
                <tr><th>ELECTION-STATUS:</th><td><input type="text" id="status" name="status" readonly></td></tr>
                <tr><th></th><td><input type="submit" name="submit" value="STOP"></td></tr>
            </table>
            <?php
             $query= "SELECT * FROM election WHERE status='Voting-Active'";
             $result= mysqli_query($con,$query);
             if(mysqli_num_rows($result)>0)
             {
                 echo "<table border='1' id='table1'>";
                 echo "<tr><th>ELECTION-ID</th><th>ELECTION-YEAR</th><th>ELECTION-STATUS</th></tr>";
                 while($data=mysqli_fetch_assoc($result))
                 {
                     echo "<tr><td>".$data['election_id']."</td><td>".$data['election_year']."</td><td>".$data['status']."</td></tr>";
                 }
                 echo "</table>";
             }
            else
            {
                echo "<h4>There are no active elections</h4>";
            }
            ?>
                <script>
                var tabl1= document.getElementById("table1");
                    for(var i=1;i<table1.rows.length;i++)
                        {
                            table1.rows[i].onclick=function()
                            {
                                document.getElementById('id').value=this.cells[0].innerHTML;
                                document.getElementById('year').value=this.cells[1].innerHTML;
                                document.getElementById('status').value=this.cells[2].innerHTML;
                            }
                        }
                </script>
        </div>
        <div class="disabledElections">
            <h3>DISABLED ELECTIONS</h3>
        <h4>CLICK ON ANY ELECTION IN THE BELOW TABLE TO ACTIVATE ELECTION</h4>
            <table>
            <tr><th>ELECTION-ID:</th>
                <td><input type="text" id="election-id" name="id1" readonly></td>
                </tr>
                <tr><th>ELECTION-YEAR:</th>
                <td><input type="text" id="election-year" name="year1" readonly></td>
                </tr>
                <tr><th>ELECTION-STATUS:</th>
                <td><input type="text" id="election-status" name="election-status" readonly></td>
                </tr>
                <tr><th></th><td><input type="submit" name="activate" value="ACTIVATE"></td></tr>
            </table>
            <?php
            $query1= "SELECT * FROM election WHERE status='Voting-Disabled'";
            $result1= mysqli_query($con,$query1);
            if(mysqli_num_rows($result1)>0)
            {
                echo "<table border='1' id='table'>";
                echo "<tr><th>ELECTION-ID</th><th>ELECTION-YEAR</th><th>ELECTION-STATUS</th></tr>";
                while($data= mysqli_fetch_assoc($result1))
                {
                    echo "<tr><td>".$data['election_id']."</td><td>".$data['election_year']."</td><td>".$data['status']."</td></tr>";
                }
            }
            else
            {
                echo "<h4>There are no disabled elections in database.</h4>";
            }
            ?>
        </div>
            </form>
        <script>
        var table= document.getElementById('table');
            for(var i=1;i<table.rows.length;i++)
                {
                    table.rows[i].onclick=function()
                    {
                        document.getElementById("election-id").value= this.cells[0].innerHTML;
                        document.getElementById("election-year").value=this.cells[1].innerHTML;
                        document.getElementById("election-status").value= this.cells[2].innerHTML;
                    }
                }
        </script>
		</center>
    </body>
</html>