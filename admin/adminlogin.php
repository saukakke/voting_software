<?php include('admin-server/adminserver.php') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>COLLEGE UNION ONLINE ELECTION SYSTEM</title>
		<link rel="stylesheet" href="css/login.css" type="text/css">
    </head>
    <body>
    <?php include('../alertsanderrors/errors.php') ?>
	<center>
	<header>
	<h2>COLLEGE UNION ONLINE ELECTION SYSTEM</h2>
	
	</header>
	
	
	
         <form action="adminlogin.php" method="post">
            
              <div class="form">
			  <h3>ADMIN LOGIN<h3>
					  <table border=6 width=200 cellpadding=10>
                <tr>
                    <td>
					
                     ADMIN'S ID <input type="text" name="admin_id">
                    </td>
                </tr>
                  <tr>
                    <td>
                        PASSWORD <input type="password" name="password">
                    </td>
                </tr>
                  </table>
				  </div>
				  
				  <table><tr><td>
				  
				 <input type="submit" name="login" value="LOGIN"><br>
				 
					</tr></td></table><br>
					
                <div class="click">
			
			
             Are you a Voter?<a href="../voter/voterlogin.php">CLICK HERE</a><br>
			 <br><a href="../index.html">HOME</a>
			 </div>
									

        </form>
		</center>
    </body>
	 
</html>
