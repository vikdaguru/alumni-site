<?php
session_start();

$servername = "localhost";
$username = "root";
$pass = "1234";
$dbname = "alumnidb";

// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>


<?php
//phoneno, firstname, lastname, yearofgrad, dob, email, password

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phoneno = $_POST['phoneno'];
$yearofgrad = $_POST['yearofgrad'];
$dob = $_POST['dob'];
$email = trim($_POST['email']);
$password = md5trim($_POST['password']);
$password2 = $_POST['password2'];

if($password==$password2){
$sql = "INSERT INTO members_biodata (phoneno, firstname, lastname, yearofgrad, dob, email, `password`)
VALUES ('$phoneno', '$firstname', '$lastname', '$yearofgrad', '$dob', '$email', '$password')"; 

$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($query=1)
{
  $ins="INSERT INTO members_login (email, `password`) VALUES ('$email', '$password')";
  $query = mysqli_query($conn, $ins) or die(mysqli_error($conn));
  if($query=1)
  {
    echo"<script> alert ('login sucessful') </script>";
  } 
  else
  {
    echo"<script> alert ('invalid username or password') </script>";
  }
}
}
else{
  echo"<script> alert ('password mismatched') </script>";
}


?>