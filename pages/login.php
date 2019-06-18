
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bus Management System University Of Phayao</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <h1><center>Bus Management System</center></h1>
    <h2><center>University Of Phayao</center></h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login For Bus Management System</h3>
                    </div>
                    <div class="panel-body">
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
                                    <label>
                                     
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                      
                                        
                                       
      
                                    </label>
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
                                <button class="btn btn-lg btn-success btn-block" type="submit" value="Login"  >Login</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <
</body>



</html>
<?php 
unset($_SESSION["errormsg"]);
unset($_SESSION['username']);
?>