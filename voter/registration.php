<?php include('../connection.php') ?>
<?php include('voter-server/registration-server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>COLLEGE UNION ONLINE ELECTION</title>
        <script src="jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" href="registration.css" type="text/css">
    </head>
    <body>
       <center> 
	   <header>
    <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
	</header>
    <form action="" method="POST">
            <h3>REGISTRATION FORM</h3>
			
                <div id="reg">
				<table border=5 width=200 cellpadding=5>
				<tr><td>
                    <label for="name">NAME</label>
                    <input type="text" name="name"><br/>
       </tr></td>
	   <tr><td>
                    <label for="admno">ADMISSION NUMBER</label>
            <input type="text" required name="admissionnumber"/>
			</tr></td>
        <tr><td>
            <label>EMAIL ID</label>
            <input type="email" name="mailid">
			</tr></td>
        
 <tr><td>
            <label>PASSWORD</label>
            <input type="password" required name="password">
			</tr></td>
        
        <tr><td>
            <label> CONFIRM PASSWORD</label>
            <input type="password" required name="password1">
			</tr></td>
			</table>
                </div>
          <br>
        
           <div id="register"><input type="submit" name="check" value="REGISTER"></div>
             </form>
        <p>Already have an account?<a href="voterlogin.php">Login Here</a></p>

        
      </center>         
    </body>
</html>
