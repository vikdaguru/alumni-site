<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Change Password</h1>
   <form method="POST" action="password_change.php">
    <table>
    <tr>
   <td>Enter your UserName</td>
    <td><input type="username" size="10" name="username"></td>
    </tr>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" size="10" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="Update Password">
    </form>
   <p><a href="home.php">Home</a>
   <p><a href="logout.php">Logout</a>
     
   <?php
   
   session_start();
include 'connect.php';

        $email = $_POST['emaiil'];
        $password = md5$_POST['password'];
        $newpassword = md5$_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = mysql_query("SELECT password FROM members_login WHERE 
email ='$email'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($newpassword == $confirmnewpassword)
        $sql=mysql_query("UPDATE members_login SET password='$newpassword' where 

 email ='$email'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
   
   ?>
</body>
</html>




