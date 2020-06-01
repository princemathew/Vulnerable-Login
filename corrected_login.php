<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      //$myusername = $_POST['username'];
      //$mypassword = $_POST['password']; 

     $myusername = mysqli_real_escape_string($db,$_POST['username']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
          
    $stmt = $db->prepare("SELECT * FROM login WHERE username = ? and password =?");
    $stmt->bind_param("ss", $myusername,$mypassword);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();      
     
     
      $count = mysqli_num_rows($result);
      if($count==1) {
           $res = mysqli_fetch_assoc($result);
              $usr = $res['username'];
                 
              $_SESSION['login_user'] = $usr;
           
              header("Location: welcome.php");
           }
     else {
         $error = "Your Username or Password is invalid";
      }
    
}
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
