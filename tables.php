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

   <!-- <body id="page-top"> -->




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
            <li class="breadcrumb-item active">พนักงานขับรถ</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
               พนักงานขับรถ  <button style="float: right" align type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="driver_data" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>UserDriver</th>
                      <th>ชื่อ - นามสกุล</th>
                      <th>หมายเลขรถเมล์ที่ให้บริการ</th>
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
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>


  <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">เพิ่มข้อมูลคนขับ</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>ชื่อ</label>
                        <input type="text" name="first_name" id="first_name" maxlength="20"  class="form-control" size = "30" />
                        <br />
                        <label>นามสกุล</label>
                        <input  type="text" name="last_name" id="last_name" maxlength="20"  class="form-control" size = "30" />
                        <br />
                        <br />
                        <label>รหัสบัตรประชาชน</label>
                        <input style="width:45%" type="text" name="idpeople" id="idpeople"  maxlength="13" class="form-control" />
                        <br />
                        <br />
                        <label>หมายเลขรถเมล์ที่ขับ</label>
                        <input style="width:20%" type="text" name="busno" id="busno"   min = "0" max = "100" maxlength="3" class="form-control"  size = "3"/>
                        <br />
                        <br />
                        <label>ชื่อบัญชีพนักงานขับรถ</label>
                        <input style="width:40%"type="text" name="userdriver" id="userdriver" maxlength="10"class="form-control" />
                        <br />
                        <br />
                        <label>รหัสผ่านพนักงานขับรถ</label>
                        <input style="width:40%"type="password" name="pass" id="pass" class="form-control" />
                        <br />
                        <br />
                        
                        <label>วันเดือนปีเกิด</label>
                        <input style="width:40%"type="date" name="birthdate" id="birthdate" class="form-control" />
                        <br />
                        <br />
                        <label>เบอร์โทรศัพท์</label>
                        <input style="width:40%"type="text"  name="mphone" id="mphone"   min = "0" max = "9999999999" maxlength="10" class="form-control" />
                        <br />
                    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="driver_id" id="driver_id" />
                        <input type="hidden" name="operation" id="operation" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>

   
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Scipt Datatable-->
    
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("เพิ่มข้อมูลพนักงานขับรถเมล์");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTabledriver = $('#driver_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "order":[],
                "ajax":{
                    url:"fetch.php",
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
                        "targets": [2], 
                        "className": "text-center",
                        "orderable":true,
                    },
                    {
                        //"targets":[0,3],
                        "targets": [1], 
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
                var firstName = $('#first_name').val();
                var lastName = $('#last_name').val();   
                var mobliephone = $('mphone').val();
                var usernamedriver = $('userdriver').val();
                var pwd = $('pass').val();
                var birthdate = $('birthdate').val();
                var idpeople = $('idpeople').val();
                var busno = $('busno').val();
            
                if(firstName != '' && lastName != '' && busno != ''){
                  if(mobliephone != '' && usernamedriver != ''){
                    if(pwd != '' && birthdate != ''){
                      if(idpeople != ''){{
                    $.ajax({
                        url:"insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTabledriver.ajax.reload();
                        }
                    });
                }}}
                     

                    } }
              
               
               
                
                else
                {
                    alert("กรอกข้อมูลให้ครบ");
                }
            });
            
          

              $(document).on('click', '.update', function(){
                var driver_id = $(this).attr("id");
                $.ajax({
                    url:"fetch_single.php",
                    method:"POST",
                    data:{driver_id:driver_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#mphone').val(data.mphone);
                        $('#userdriver').val(data.userdriver);
                        $('#idpeople').val(data.idpeople);
                        $('#pass').val(data.pass);
                        $('#birthdate').val(data.birthdate);
                        $('.modal-title').text("");
                        $('#driver_id').val(driver_id);
                        $('#action').val("Edit"); //ปุ่ม 
                        $('#operation').val("Edit"); //จัดการ
                    }
                })
            });
            
            $(document).on('click', '.delete', function(){
                var driver_id = $(this).attr("id");
                if(confirm("ต้องการจะลบข้อมูลนี้หรือไม่ ? " ))
                {
                    $.ajax({
                        url:"delete.php",
                        method:"POST",
                        data:{driver_id:driver_id},
                        success:function(data)
                        {
                            alert(data);
                            dataTabledriver.ajax.reload();
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
