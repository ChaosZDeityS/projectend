<!DOCTYPE html>
<html lang="en">

    <head>
             <!-- Google Chart JS-->
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   
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
    <li class="breadcrumb-item active">สถานีรถโดยสารประจำทาง</li>
  </ol>

  
    
      <div class="card mb-3">
            <div class="card-header">
           
            

         <i class="fas fa-table"></i>
         รถโดยสารประจำทาง</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="assessbus_data" width="100%" cellspacing="">
                  <thead>
                  <tr>
                                        
                                      
                                        <th>รถเมล์หมายเลขที่</th>
                                        <th>วันที่ประเมิน</th>
                                        <th>ช่วงเวลาที่ประเมิน</th>
                                        <th>หัวข้อการประเมินด้าน</th>
                                        <th>คะแนน</th>
                                        <th>หมายเหตุ</th>
                      
                    </tr>
                  </thead>
                 
                </table>
              </div>
            </div>
            <!-- <br><br>ชื่อสายรถเมล์ :  <input type="textbox" id="buslinename" name="buslinename"> </input> -->
            <!-- <br><br><button  align type="button" id="add_button" class="btn btn-info btn-lg">เพิ่มสายรถเมล์</button> -->
          
           
           
            </div>
             
            <div class="card-footer small text-muted">Support By CSUP</div>
          </div>

          
          <div id="wrapper">
        </div>
        <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
          <?php
     // 1. Connect
     require("connect.php");
     // 2. Select SQL
     $sql = "SELECT busno  FROM busreal";
     // 3. Execute SQL
     $result = mysqli_query($connection, $sql);
     // Create Select Box / Dropdown Box of Department
     echo "<select name='busno' id='busno' onchange='show()'>";
     echo "<option value='0'>".กรุณาเลือกรถเมล์ที่ต้องการ."</option>";
     while($row = mysqli_fetch_assoc($result)) {
       echo "<option value='".$row['busno']."'>".รถเมล์หมายเลขที่." : ".$row['busno']." </option>";
     }
     echo '</select><br>  ';

   ?>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              รถโดยสารประจำทาง <label2 id='label2'></label2></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="assessbuscal_data" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                                        
                                      
                                        <th>หัวข้อการประเมิน</th>
                                        <!-- <th>คะแนนเฉลี่ยด้านมารยาท</th>  -->
                                        <th>คะแนนเฉลี่ย</th>
                                       
                   </tr>
                  </thead>
                                    
                 
                </table>
              </div>
            </div>

            
            <div class="card-footer small text-muted"></div>
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
 

    
    <script>
    $(document).ready(function(){
               
      var dataTable = $('#assessbuscal_data').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"assessbuscalfirst_fetch.php",
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
                        "orderable":true,
                    },
                    
               

              
             
         
                ],
        
            });
   
          
        $('#busno').change(function(){
           
         
            
            var busno = document.getElementById("busno");
            
            document.getElementById("label2").innerHTML= busno.value ;
            
           

         
         var dataTable = $('#assessbuscal_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bDestroy": true,
                "searching": false,
                "order":[],
                
                "ajax":{
                    url:"assessbuscal_fetch.php",
                    type:"POST" ,
                    "data":{
                     dropdownvalue :   busno.value
                 },
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
                        "orderable":true,
                    },
                
              
             
         
                ],
        
            });
        
     
            
            
        });




    
    

         

            
           
           

        }

        );
        
        
         
      

    
    
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("เพิ่มข้อมูลพนักงานขับรถเมล์");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            
            var dataTablebusline = $('#assessbus_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "order":[],
                "ajax":{
                    url:"assess_fetch.php",
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
                    {
                        //"targets":[0,3],
                        "targets": [2], 
                        "className": "text-center",
                        "orderable":false,
                    },
                    {
                        //"targets":[0,3],
                        "targets": [3], 
                        "className": "text-center",
                        "orderable":false,
                    },
                    {
                        //"targets":[0,3],
                        "targets": [4], 
                        "className": "text-center",
                        "orderable":false,
                    },
                    {
                        //"targets":[0,3],
                        "targets": [5], 
                        "className": "text-center",
                        "orderable":false,
                    },
               
                ],
        
            });
        

          


            
  
            
        });


        
        </script>
        
            <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
          
   
        
     
            
            
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
