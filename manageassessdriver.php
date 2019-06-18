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
    /*  var jsonData = $.ajax({
          url: "busnow.php",
          dataType: "json",
          async: false
          }).responseText;*/



   
          
      // Create our data table out of JSON data loaded from server.
     /* var data = new google.visualization.DataTable(jsonData);*/
     var data =google.visualization.arrayToDataTable([
          ['Busstatus', 'COUNT '],
          <?php 
          require_once 'connect.php' ;
          $query = "SELECT busstatus,COUNT(busstatus) as C FROM busreal GROUP BY busstatus";

          $exec = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($exec)){
          if($row['busstatus'] == 0){
            $row['busstatus'] = "พร้อมให้บริการ" ; 
          }else if($row['busstatus'] == 1){
            $row['busstatus'] = "กำลังให้บริการ" ; 
          }else if($row['busstatus'] == 2){
            $row['busstatus'] = "ไม่สามารถให้บริการได้" ; 
          }else if($row['busstatus'] == 3){
            $row['busstatus'] = "สิ้นสุดการให้บริการ" ; 
          }
          echo "['".$row['busstatus']."',".$row['C']."],";
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

        <div id="wrapper">
        


     

<div class="container-fluid">


  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> จัดการประเมินของพนักงานขับรถเมล์</li>
  </ol>

  
    
      <div class="card mb-3">
            <div class="card-header">
           
            

         <i class="fas fa-table"></i>
         จัดการประเมินของพนักงานขับรถเมล์</div>
            <div class="card-body">
            <form method ="GET" action = "addassessdriver.php"><Br>
            <div class="col-12 text-center">
            <button  style="float: center" align type="submit"  class="btn btn-info btn-lg">เพิ่มหัวข้อการประเมิน</button> 
          
            </form>
            <form method ="GET" action = "editdriver.php"> <br>
            <button  id ='edit' style="float: center" align type="submit"  class="btn btn-warning btn-lg">สร้างชุดการประเมิน</button> 
            </form>

             <form method ="GET" action = "selectassessdriver.php"> <br>
            <button  id ='select' style="float: center" align type="submit"  class="btn btn-danger btn-lg">เลือกชุดการประเมิน</button> 
            </form>
            </div>
            <!-- <br><br>ชื่อสายรถเมล์ :  <input type="textbox" id="buslinename" name="buslinename"> </input> -->
            <!-- <br><br><button  align type="button" id="add_button" class="btn btn-info btn-lg">เพิ่มสายรถเมล์</button> -->
          
           
           
            </div>
             
            <div class="card-footer small text-muted">Support By CSUP</div>
          </div>
          </div>
  
          
          
        </div>
        
     <div id="content-wrapper">

        <div id="wrapper">
        
        <div class="container-fluid">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              ชุดการประเมินที่กำลังใช้งานอยู่ : <?php require 'connect.php' ;
                $sql = "SELECT * FROM selectassessdriver WHERE statusselectassess = 1 LIMIT 1";
                $result = mysqli_query($connection,$sql);
                
                while($row = mysqli_fetch_assoc($result)) {
                  echo $row['noq'] ; 


                }



              
              ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="selectassess_data" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                                        
                                        <th>รหัสหัวข้อการประเมิน</th>
                                        <th>ชื่อหัวข้อการประเมิน</th>
                                   
                                       
                   </tr>
                  </thead>
                                    
                 
                </table>
              </div>
            </div>
            

            
            <div class="card-footer small text-muted">เก็บไว้ก่อน</div>
          </div>
          

        

        </div>  
   
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
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("ไม่มี");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTableSelectAssessBusNow = $('#selectassess_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": false ,
                "order":[],
                "ajax":{
                    url:"selectassessdrivernow_fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        //"targets":[0,3],
                        "targets": [0], 
                        "className": "text-center",
                        "orderable":false,
                    },
                  
                    {
                        //"targets":[0,3],
                        "targets": [1], 
                        "className": "text-center",
                        "orderable":false,
                    },
                   
                
                ],
        
            });
        

          


            
  
            
        });


        
        </script>
        
            
        
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
