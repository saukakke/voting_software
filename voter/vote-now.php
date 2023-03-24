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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="common-css-voter.css" type="text/css">
    </head>
    <body>
	<center>
	<header>
	<h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
	</header>
	
      <div class="nav">
        <ul>
          <li><a href="voter-homepage.php">Home</a></li>
            <li><a class="active" href="vote.php">Vote</a></li>
            <li><a href="results.php">Published Results</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
      </div>
	  <h3>CAST YOUR VOTE</h3>
   <?php
        include '../connection.php';
        $year=$_POST['year'];
        $position= $_POST['position'];
        $voterid= $_SESSION['voterid'];
        $q="SELECT * FROM vote WHERE admission_no='$voterid' AND position='$position' AND election_year='$year'";
        $r=mysqli_query($con,$q);
        if(mysqli_num_rows($r)>0){
            echo "<script>alert('You have already voted in this position');</script>";
            echo "<script>window.location.href='vote.php';</script>";
        }
        $query= "SELECT * FROM candidate WHERE election_year='$year' AND position='$position'";
        $result= mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            echo "<table id='table' border='4' cellpadding=20>";
            echo "<tr><th>Id</th><th>Name</th><th>Course</th><th>Semester</th><th>Position</th><th>Image</th><th>Year</th><th>Action</th></tr>";
            while($data= mysqli_fetch_assoc($result)){
                $img= $data['image'];
                echo "<tr><td class='id'>".$data['id']."</td><td class='name'>".$data['name']."</td><td>".$data['course_name']."</td><td>".$data['sem']."</td><td class='position'>".$data['position']."</td><td><img src=$img height=120px width=120px></td><td class='year'>".$data['election_year']."</td><td><button class='vote'>Vote</button></td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "<p>No candidates in this position and year</p>";
        }
        ?>
        <script>
        $(".vote").click(function(){
           var id= $(this).closest('tr').find(".id").text();
            var year= $(this).closest('tr').find(".year").text();
             var position= $(this).closest('tr').find(".position").text();
            var name= $(this).closest('tr').find(".name").text();
            var action= confirm("You are about to vote for "+name+" Confirm?");
            if(action==true){
                window.location.replace("voter-server/votenow-server.php?id="+id+"&year="+year+"&position="+position);
            }
        });
        </script>
		</center>
    </body>
</html>