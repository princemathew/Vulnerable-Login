<?php
session_start();
?>


<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php
echo $_SESSION["login_user"];
session_destroy(); 
?></h1> 
      <h2><a href = "login.php">Sign Out</a></h2>
   </body>
   
</html>
