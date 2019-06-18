<!DOCTYPE html>
<html lang="en">

<?php
    require_once 'check.php'
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

  </head>

  <body id="page-top">

      <?php 
      require_once 'menu.php' ; 
    ?>
          <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">ร้องขอรถเมล์</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              ร้องขอรถเมล์โดยพนักงานขับรถ</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="requestbus_data" width="100%" cellspacing="0">
                  <thead>
                  <tr>

                                        <th>ผู้ร้องขอ</th>
                                        <th>จุดจอดรถที่ต้องการ</th>
                                        <th>สายรถเมล์</th>
                                        <th>วันที่ร้องขอ</th>
                                        <th>เวลาที่ร้องขอ</th>
                  </tr>

                                   
                                
                  </thead>
                 
                </table>
              </div>
            </div>

            
            <div class="card-footer small text-muted"></div>
          </div>

        

        </div>
        <!-- /.container-fluid -->


  <div id="wrapper">
  </div>
  </div>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">ร้องขอรถเมล์</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        ร้องขอรถเมล์โดยผู้ใช้บริการ</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="requestbususer_data" width="100%" cellspacing="0">
            <thead>
            <tr>

                                  <th>ผู้ร้องขอ</th>
                                  <th>จุดจอดรถที่ต้องการ</th>
                                  <th>สายรถเมล์</th>
                                  <th>วันที่ร้องขอ</th>
                                  <th>เวลาที่ร้องขอ</th>
            </tr>

                             
                          
            </thead>
           
          </table>
        </div>
      </div>

      
      <div class="card-footer small text-muted"></div>
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


 

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Scipt Datatable-->
    
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
          
            
            var dataTable = $('#requestbus_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "language": {
                "infoFiltered": ""
                 },
                "order":[],
                "ajax":{
                    url:"requestbus_fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0,4],
                        "orderable":false,
                    },
                ],
        
            });
        
     
            
            
        });


        
        </script>

          <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
          
            
            var dataTable = $('#requestbususer_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "language": {
                "infoFiltered": ""
                 },
                "order":[],
                "ajax":{
                    url:"requestbususer_fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0,4],
                        "orderable":false,
                    },
                ],
        
            });
        
     
            
            
        });


        
        </script>
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
