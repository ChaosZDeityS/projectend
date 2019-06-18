<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'check.php';
    require 'connect.php' ; 
    $sql =" TRUNCATE TABLE temp_linkdriverlineanddriverstop ";
    $result = mysqli_query($connection,$sql);
    //require_once 'countround.php';
    
?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bus Management System</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

  </head>

  <body id="page-top">

    <?php 
      require_once 'menu.php' ; 
    ?>

      <div id="content-wrapper">
     
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">สรุปผล</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              สร้างชุดการประเมิน ขั้นตอนที่ 2</div>
            <div class="card-body">
            <div class="flot-chart">
                <div class="flot-chart-content" id="flot-bar-chart"></div>
            </div>
            <form method="GET" action = "temp_evaservicedriver_insert.php" > 
            ชุดประเมินชื่อ : <input type='textbox' id='noq' name='noq'></input><br><br>

        <?php
                        // 1. Connect
                        require("connect.php");
                        // 2. Select SQL
                        $count = 1; 
                        $sql = "SELECT * FROM evaservicedriver";

                        // 3. Execute SQL
                        $result = mysqli_query($connection, $sql);
                      
                  
                        while($row = mysqli_fetch_assoc($result)) {
                         // $driverlineid = $row['driverlineid'];
                          $questiondriver = $row['questiondriver'];
                          $id = $row['id'];
                        
                          echo "<input type='checkbox' name='link[]' value='$id' id='$id' >";
                          echo "<label for='$id'> &nbsp &nbsp &nbsp $count :&nbsp&nbsp$questiondriver</label><br/>";
                          $count++;


                        }
         

                      ?>

                       

       
             <button class="btn btn-info btn-lg" type="submit" name="submit" value="Submit">ตั้งค่า</button>
    
             
            </form>
            
            </div>

         
            <div class="card-footer small text-muted">เก็บไว้ก่อน</div>
          </div>

        

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © SoviaZ Sofina CS58</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php 
      require_once 'logoutmenu.php' ; 
    ?>

          

    <!-- Trigger/Open The Modal -->


    <!-- Bootstrap core JavaScript-->
      <!-- jQuery -->
      <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Scipt Datatable-->

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
