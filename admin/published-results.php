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
        <li><a href="results.php">PUBLISH RESULT</a></li>
            <li><a class="active" href="published-results.php">PUBLISHED RESULTS</a></li>
			</ul>
        </div>
        <div class="publishedresults">
            <h3>SELECT AN ELECTION FROM BELOW TABLE TO VIEW RESULT</h3>
        <table>
            <form action="../servers/view-result.php" target="_blank" method="POST">
                <tr>
            <th>Election-Year:</th>
                <td><input type="text" name="year" id="year" readonly></td>
            </tr>
                <tr>
                <th></th>
                    <td><input type="submit" name="submit" value="VIEW RESULTS"></td>
                </tr>
            </form>
            </table>
        </div>
		<br>
        <?php
           $query= "SELECT * FROM election WHERE status='result-published'";
           $result= mysqli_query($con,$query);
           if(mysqli_num_rows($result)>0)
           {
               echo "<table border='2' id='table'>";
               echo "<tr><th>Election-Year</th></tr>";
               while($data= mysqli_fetch_assoc($result))
               {
                   echo "<tr><td>".$data['election_year']."</td></tr>";
               }
               echo "</table>";
           }
          else
          {
              echo "<h4>No results published</h4>";
          }
        ?>
        <script>
        var table= document.getElementById('table');
            for(var i=1;i<table.rows.length;i++)
                {
                    table.rows[i].onclick=function(){
                        document.getElementById('year').value=this.cells[0].innerHTML;
                    }
                }
        </script>
		</center>
    </body>
</html>