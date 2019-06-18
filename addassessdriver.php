.<!DOCTYPE html>
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
              หัวข้อประเมินพนักงานขับรถเมล์ <button style="float: right" align type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="addassessdriver_data" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                                        
                                        <th>รหัสหัวข้อการประเมิน</th>
                                        <th>คำถามการประเมิน</th>
                                        <th>วันที่สร้างคำถาม</th>
                                        <th>จัดการ</th> 
                                       
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
 
 <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">เพิ่มหัวข้อการประเมิน</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>คำถามการประเมิน</label>
                        <input type="text" name="questiondriver" id="questiondriver" maxlength="30"  class="form-control" size = "30" />
                        <br />
                        
                        
                    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="qassessdriver_id" id="qassessdriver_id" />
                        <input type="hidden" name="operation" id="operation" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("เพิ่มหัวข้อการประเมินพนักงานขับรถเมล์");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTablequestiondriver = $('#addassessdriver_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "order":[],
                "ajax":{
                    url:"addassessdriver_fetch.php",
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
                   
                
                ],
        
            });
        
            $(document).on('submit', '#user_form', function(event){
                event.preventDefault();
                var questionassessdriver = $('#questiondriver').val();
                
            
                if(questionassessdriver != '' ){
                  
                    $.ajax({
                        url:"addassessdriver_insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTablequestiondriver.ajax.reload();
                        }
                    });
                 } else
                {
                    alert("ไม่ได้กรอกข้อมูล");
                }
                     

                   
               
               
                
            
            });
            
          

            $(document).on('click', '.update', function(){
                var qassessdriver_id = $(this).attr("id");
                $.ajax({
                    url:"addassessdriver_fetch_single.php",
                    method:"POST",
                    data:{qassessdriver_id:qassessdriver_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('#questiondriver').val(data.questiondriver);
                        $('.modal-title').text("");
                        $('#qassessdriver_id').val(qassessdriver_id);
                        $('#action').val("Edit"); //ปุ่ม 
                        $('#operation').val("Edit"); //จัดการ
                    }
                })
            });
            
            $(document).on('click', '.delete', function(){
                var qassessdriver_id = $(this).attr("id");
                if(confirm("ต้องการจะลบข้อมูลนี้หรือไม่ ? " ))
                {
                    $.ajax({
                        url:"addassessdriver_delete.php",
                        method:"POST",
                        data:{qassessdriver_id:qassessdriver_id},
                        success:function(data)
                        {
                            alert(data);
                            dataTablequestiondriver.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });
          


            
  
            
        });


        
        </script>
        
            <script type="text/javascript" language="javascript" >
 
          
            
     
        
     
            
            
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
