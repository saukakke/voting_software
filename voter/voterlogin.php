<?php include('voter-server/login-server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>COLLEGE UNION ONLINE ELECTION SYSTEM</title>
		<link rel="stylesheet" href="voter-login.css" type="text/css">
    </head>
    <body>
        <?php include('../alertsanderrors/errors.php') ?>
    <center>
	<header>
        <h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
     </header> 
        
        <form action="voterlogin.php" method="post">
		<div class="form">
		 <h3>VOTER LOGIN</h3>
            <table border=6 width=200 cellpadding=10>
                <tr>
                    <td>
                     ADMISSION NUMBER<input type="text" name="admission_no">
                    </td>
                </tr>
                  <tr>
                    <td>
                     PASSWORD     <input type="password" name="password">
                    </td>
                </tr>
				</table>
				 </div>
				 
				<table cellpadding=20>
                  <tr>
                    <td>
                        <input type="submit" name="login" value="LOGIN">
                    </td>
                  </tr>
				  </table>
				 
				
                        Not registered yet?<a href="registration.php">REGISTER HERE</a></br>
					
						<br><a href="../index.html">HOME</a>

        </form>
    </center>
    </body>
</html>
