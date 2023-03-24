<?php
session_start();
if(!isset($_SESSION['adminname']))
{
    header('location: adminlogin.php');
}
?>
<?php include('admin-server/addcandidate.php') ?>
<?php include('../alertsanderrors/errors.php') ?>
<?php include('../alertsanderrors/alerts.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add-candidates</title>
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
                <li><a href="collegedetails.php">DEPARTMENT</a></li>
                <li><a href="add_student_details.php">VOTERS</a></li>
                <li><a href="election.php">ELECTIONS</a></li>
                <li><a href="add_position.php">POSITIONS</a></li>
                <li><a class="active" href="add_candidate_details.php">CANDIDATES</a>
                </li>
                <li><a href="results.php">RESULT</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <ul>
        <li><a  class="active" href="add_candidate_details.php">ADD CANDIDATES</a></li>
            <li><a href="view-delete-candidate.php">VIEW/DELETE A CANDIDATE</a></li>
        </ul>
     <form action="" method="POST" enctype="multipart/form-data">

            <h3>ADD CANDIDATE DETAILS</h3>
            <table>
                <tr>            
                    <td>NAME:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>CLASS:</td>
                    <td><select name="class">
                        <?php
                        $query= "SELECT * FROM course";
                        $result= mysqli_query($con,$query);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($data=mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$data['course_name']."</option>";
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>SEMESTER:</td>
                    <td><select name="semester">
                        <?php
                           for($i=1;$i<=8;$i++)
                           {
                               echo "<option>".$i."</option>";
                           }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <td>ADMISSION-NO:</td>
                    <td><input type="text" name="admissionnumber"></td>
                </tr>
        <tr>
            <td>POSITION:</td>
            <td><select name="position">
                <?php
                  $query="SELECT position FROM position";
                  $result=mysqli_query($con,$query);
                  if(mysqli_num_rows($result)>0)
                  {
                      while($data=mysqli_fetch_assoc($result))
                      {
                          echo "<option>".$data['position']."</option>";
                      }
                  }
                ?>
                </select>
            </td>
        </tr>
                <tr>
                <td>ELECTION-YEAR:</td>
                    <td>
                    <?php
                        $sql= "SELECT DISTINCT election_year FROM election";
                        $year= mysqli_query($con,$sql);
                        if(mysqli_num_rows($year)>0)
                        {
                            echo "<select name='year'>";
                            while($output=mysqli_fetch_assoc($year))
                            {
                                echo "<option>".$output['election_year']."</option>";
                            }
                            echo "</select>";
                        }
                    else
                    {
                        echo "<h4>Please add a election in START/STOP election</h4>";
                    }
                        ?>
                    </td>
                </tr>
        <tr>
            <td>UPLOAD PHOTO:</td>
            <td><input type="file" name="photo" accept=".jpg" required></td>
        </tr>
       
        <tr> 
            <td><input type="submit" name=" addcandidate" value="ADD CANDIDATE"></td>
                </tr>
            </table> 
        </form>
   </center>
   </body>
</html>

