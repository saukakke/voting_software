<?php
session_start();
if(!isset($_SESSION['voterid']))
{
    header('location: voterlogin.php');
}
?>

<html>
<head>
    <title></title>
	<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    </head>
    <body>
	<center>
	<header>
	 <h3>COLLEGE UNION ONLINE ELECTION SYSTEM</h3>
	 </header>
      <div class="nav">
        <ul>
          <li><a href="voter-homepage.php">Home</a></li>
            <li><a class="active" href="vote.php">Vote</a></li>
            <li><a href="results.php">Published Results</a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
          
      </div>
       
        <?php 
        include '../connection.php';
        $year=$_GET['year'];
        $query= "SELECT * FROM position";
        $result= mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
        echo "<h4>SELECT POSITION FROM BELOW</h4>";
        echo "<form action='vote-now.php' method='POST'>";
        echo "<label for='year'>Election Year</label>";
		
        echo "<input readonly type='number' name='year' value=".$year.">";
		
        echo "<select name='position'>";
         while($data=mysqli_fetch_assoc($result)){
             echo "<option>".$data['position']."</option>";
         }
        echo "</select><br/></br>";
        echo "<input type='submit' name='submit' value='SUBMIT'>";
        echo "</form>";  
          }
        else{
           echo "<p>No positions in this year</p>";
        }
         ?>
		 </center>
    </body>
</html>