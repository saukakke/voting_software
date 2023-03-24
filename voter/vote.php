<?php
session_start();
if(!isset($_SESSION['voterid']))
{
    header('location: voterlogin.php');
}
?>
<html>
<head>
    <title>vote</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    <style>
        .select{
            background: Lightgreen;
            padding: 4px;
        }
    </style>
    </head>
    <body>
	<center>
	<header>
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
		</header>
      <div class="nav">
        <ul>
          <li><a href="voter-homepage.php">Home</a></li>
            <li><a div class="active" href="vote.php">Vote</a></li>
            <li><a href="results.php">Published Results</a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
      </div>
        <?php
        include '../connection.php';
        $query= "SELECT * FROM election WHERE status='Voting-Active'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "<h3>SELECT ELECTION-YEAR FROM THE BELOW TABLE</h3>";
            echo "<table border='2' id='table' width=5 cellpadding=20><tr><th>Election-Year</th><th>Action</th></tr>";
            while($data= mysqli_fetch_assoc($result))
            {
                echo "<tr><td class='year'>".$data['election_year']."</td><td><button class='select'>Select</button></td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "</h3>Admin hasn't started the voting</h3>";
        }
        ?>
        <br>
        <script>
        $(".select").click(function(){ 
            var year=$(this).closest("tr").find(".year").text();
            var action= confirm("Year "+year+"?");
            if(action==true){
                window.location.replace("votenow.php?year="+year);
            }
        });
        </script> 
      
       </center>
    </body>
</html>