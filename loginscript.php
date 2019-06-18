<?php  //Start the Session

session_start();
require('connect.php');

$username = $_POST['username'];
$fmsg = "กรุณาตรวจสอบ Username และ Password ให้ถูกต้อง" ;
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `staff` WHERE userstaff='$username' and pass='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['userstaff'] = $username;
}else{
    
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$_SESSION['errormsg']= $fmsg;
$_SESSION['username']= $username;
header( "location: login.php" );
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['userstaff'])){
$username = $_SESSION['userstaff'];
header( "location: index.php" );
 
}else{
    
//3.2 When the user visits the page first time, simple login form will be displayed.
}
?>