<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['userstaff'])){
    session_start(); 
    
}

else{
    
    header( "location: index.php" );
    exit();
}





?>

  <head>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bus Support Management System - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
  <h1 style="color:white;"><center>Bus Support Management System</center></h1>
    <h2 style="color:white;"><center>University Of Phayao</center></h2>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
        <form role="form" method="POST" action="loginscript.php" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username"   name="username"  type="text"   value="<?php if(isset($_SESSION['username'])){
                                                $username = $_SESSION["username"];
                                                echo "$username" ;}?>" required> 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="checkbox">
                  
                                </div>
                                <div class="fail" style="color:red;">
                                <?php 
                                            if(isset($_SESSION["errormsg"])){
                                                $errormsg = $_SESSION["errormsg"];
                                                echo "$errormsg" ;
                                            }
                                            
                                        ?>

                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-primary btn-block" type="submit" value="Login"  >Login</button>
                                
                            </fieldset>
                        </form>
          <div class="text-center">
           
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>


  <?php 
unset($_SESSION["errormsg"]);
unset($_SESSION['username']);
?>

</html>
