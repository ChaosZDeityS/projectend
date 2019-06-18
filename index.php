<!DOCTYPE html>
<html lang="en">

    <head>
    
          <!-- Google Chart JS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
  

     var data =google.visualization.arrayToDataTable([
          ['groupbusstatus', 'COUNT '],
          <?php 
          require_once 'connect.php' ;
          $query = "SELECT groupbusstatus,COUNT(groupbusstatus) as C FROM busreal  GROUP BY groupbusstatus ";

          $exec = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($exec)){
        
          if($row['groupbusstatus'] == 1){
            $row['groupbusstatus'] = "สามารถให้บริการได้" ; 
          }else if($row['groupbusstatus'] == 2){
            $row['groupbusstatus'] = "ไม่สามารถให้บริการได้" ; 
          }
          echo "['".$row['groupbusstatus']."',".$row['C']."],";
          }
          ?>
          ]);
          var formatMS = new google.visualization.NumberFormat({
               pattern: '# คัน'
               });
          for (var colIndex = 1; colIndex < data.getNumberOfColumns(); colIndex++) {
               formatMS.format(data, colIndex);
          }
          var options = {
              title: 'สถานะการให้บริการ',
    
               pieHole: 0.4,
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

          chart.draw(data, options);
          }
          </script>


    <?php
    require_once 'check.php'
    ?>
      
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
    <li class="breadcrumb-item active">Bus Status</li>
  </ol>

      
          <div class="card mb-3">
            <div class="card-header">
            <div id="donutchart" style="width: 900px; height: 500px;"></div>
                <?php  require 'busnow.php' ; ?>
              <br>
              <?php 
              
              ?>
            </div>
             
            <div class="card-footer small text-muted">Support By CSUP</div>
          </div>

        </div>
        <!-- /.container-fluid -->
                    
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
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
 

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            var dataTable = $('#busstatus').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"busstatus_fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0,3],
                        "orderable":false,
                    },
                ],
        
            });
      });
        
        </script> -->
        
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
