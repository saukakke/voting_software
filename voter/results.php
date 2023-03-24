<?php
session_start();
if(!isset($_SESSION['voterid']))
{
    header('location: voterlogin.php');
}
?>
<?php include('../connection.php') ?>
<html>
<head>
    <title>results</title>
	<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    </head>
    <body>
	<header>
	<h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
	</header>
    <div class="nav">
	<ul>
        <li><a href="voter-homepage.php">Home</a></li>
        <li><a href="vote.php">Vote</a></li>
        <li><a div class="active" href="results.php">Published Results</a></li>
        <li><a href="../logout.php">Logout</a></li>
		</ul>
        </div>
		<center>
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
               echo "<table border='4' id='table'>";
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