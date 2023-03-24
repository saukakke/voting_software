<html>
<head>
    <title>view-result</title>
    <link rel="stylesheet" href="view-result.css" type="text/css">
    </head>
<body>
<center>
<header>
<h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>

</header><h3>RESULTS<h3>

<?php
include '../connection.php';
        $errors=array();
    $alerts=array();
if(isset($_POST['submit']))
{
    $year=$_POST['year'];
    if(empty($year))
    {
        array_push($errors,"Please select a year to view result");
    }
    if(count($errors)==0)
    {
        echo "<h4>SELECT A POSITION FROM BELOW TO VIEW RESULT</h4>";
        $query= "SELECT DISTINCT position FROM candidate WHERE election_year='$year'";
        $result= mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "<form action='' method='POST'>";
            echo "<label for='year'>Election-Year</label>";
            echo "<input type='text' name='year1' value=$year readonly>";
			echo "&nbsp";echo "&nbsp";
            echo "<label for='position'>POSITION:</lablel>";
            echo "<select name='position'>";
            while($data= mysqli_fetch_assoc($result))
            {
                echo "<option>".$data['position']."</option>";
            }
            echo "</option>";
			
            echo "<input type='submit' name='submit1' value='VIEW RESULT'>";
            echo "</form>";
        }
        else
        {
            echo "<h4>No positions found</h4>";
        }
    }
}
       if(isset($_POST['submit1']))
    {
        $year=$_POST['year1'];
        $position= $_POST['position'];
        $query1= "SELECT * FROM candidate WHERE position='$position' AND election_year='$year'";
        $result1= mysqli_query($con,$query1);
        if(mysqli_num_rows($result1)>0)
        {
            echo "<table border='4' id='table'>";
            echo "<tr><th>Candidate-Id</th><th>Name</th><th>Class</th><th>Semester</th><th>Image</th><th>Election-Year</th><th>Position</th><th>Votes</th></tr>";
            while($data1= mysqli_fetch_assoc($result1))
            {
                $id=$data1['id'];
                $sql= "SELECT * FROM vote WHERE id='$id' AND election_year='$year'";
                $output=mysqli_query($con,$sql);
                $vote= mysqli_num_rows($output);
                $src= $data1['image'];
                echo "<tr><td>".$data1['id']."</td><td>".$data1['name']."</td><td>".$data1['course_name']."</td><td>".$data1['sem']."</td><td><img src='$src' width=150px height=150px></td><td>".$data1['election_year']."</td><td>".$data1['position']."</td><td>".$vote."</td></tr>";
            }
        }
    }
   
 include '../alertsanderrors/errors.php';
    include '../alertsanderrors/alerts.php';
?>
<footer>
    <div id="printwinner"></div>
   <div class="winners" display:inline-flex> <div id="candidate"></div><div id="heading"></div>
    </div>
	</footer>
        
   
    <script>
    var table= document.getElementById("table"),maxVote;
        for(var i=0;i<table.rows.length;i++)
            {
                if(i===1){
                    maxVote= table.rows[i].cells[7].innerHTML;
                }
                else if(maxVote < table.rows[i].cells[7].innerHTML){
                    maxVote= table.rows[i].cells[7].innerHTML;
                }
            }
        var c=0;
        for(var i=0;i<table.rows.length;i++){
            for(var j=0;j<table.rows.length;j++){
                var vote= table.rows[j].cells[7].innerHTML;
                if(vote==maxVote){
                    if(c===0)
                        {
                            document.getElementById("printwinner").innerHTML="WINNER";
                        }
                    document.getElementById("candidate").innerHTML= "- CANDIDATE -";
                  document.getElementById("heading").innerHTML= table.rows[j].cells[0].innerHTML;  
                    c++;
                }
            }
        }
    </script>
    </center>
    </body>
</html>