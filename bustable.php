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
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">รถเมล์</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
               รถเมล์  <button style="float: right" align type="button" id="add_button" data-toggle="modal" data-target="#busModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="bus_data" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>หมายเลขรถเมล์</th>
                      <th>ทะเบียนรถเมล์</th>
                      <th>สายรถเมล์</th>
                      <th>จำนวนที่นั่ง</th>
                      <th>จัดการข้อมูล</th>
                      
                    </tr>
                  </thead>
                 
                </table>
              </div>
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


  <div id="busModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="bus_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                       
                        <h4 class="modal-title">เพิ่มข้อมูลรถเมล์</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>หมายเลขรถเมล์</label>
                        <input style="width:40%" type="text" name="busno" id="busno" maxlength="3"class="form-control" />
                        <br />
                        <label>ทะเบียนรถเมล์</label>
                        <input style="width:40%" type="text" name="busid" id="busid"  maxlength="7" class="form-control" />
                        <br />
                        <br />
                        <label>สายรถเมล์</label>
                        <input style="width:40%" type="text" name="busline" id="busline"  maxlength="1" class="form-control" />
                        <br />
                        สายรถเมล์<br> 1 = หน้ามอ - ตึก ICT  <br>2 = หน้ามอ - ตึกวิศวะ  <br> 3 = หอใน
                        <br />
                        <br>
                        <label>จำนวนที่นั่ง</label>
                        <input  text-align: center style="width:40%" type="text" name="seat" id="seat" maxlength="2"class="form-control" />
                        <br />
                        <br />
                     
                    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="bus_id" id="bus_id" />
                        <input type="hidden" name="operation" id="operation" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->

    <!-- Bootstrap core JavaScript-->
  
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Scipt Datatable-->
    
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#bus_form')[0].reset();
                $('.modal-title').text("เพิ่มข้อมูลรถเมล์");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTablebus = $('#bus_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "order":[],
                "ajax":{
                    url:"bus_fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0,1,2,3,4],
                        "orderable":false,
                        "className": "text-center",
                    },
                ],
        
            });
        
            $(document).on('submit', '#bus_form', function(event){
                event.preventDefault();
                var busno = $('#busno').val();
                var busid = $('#busid').val();   
                var busline = $('busline').val();
                var seat = $('seat').val();
            
            
                if(busno != '' && busid != '' && busline != '' && seat != '')
                {
                    $.ajax({
                        url:"bus_insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#bus_form')[0].reset();
                            $('#busModal').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    alert("กรอกข้อมูลให้ครบ");
                }
            });
            
          

              $(document).on('click', '.update', function(){
                var bus_id = $(this).attr("id");
                $.ajax({
                    url:"bus_fetch_single.php",
                    method:"POST",
                    data:{bus_id:bus_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#busModal').modal('show');
                        $('#busno').val(data.busno);
                        $('#busid').val(data.busid);
                        $('#busline').val(data.busline);
                        $('#seat').val(data.seat);
                        $('.modal-title').text("");
                        $('#bus_id').val(bus_id);
                        $('#action').val("Edit"); //ปุ่ม 
                        $('#operation').val("Edit"); //จัดการ
                    }
                })
            });
            
            $(document).on('click', '.delete', function(){
                var bus_id = $(this).attr("id");
                if(confirm("ต้องการจะลบข้อมูลนี้หรือไม่ ? " ))
                {
                    $.ajax({
                        url:"bus_delete.php",
                        method:"POST",
                        data:{bus_id:bus_id},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
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
