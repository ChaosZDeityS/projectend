<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'check.php'
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>ข้อมูลพนักงานขับรถประจำทาง</title>


    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
   
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    
  


   

</head>

<body>

      <div id="wrapper">
      
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">UPBUS&M</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <name  >Hi ! <?php 
                       echo $_SESSION['userstaff'];
                                            
                 ?> </name>
                 
                <!-- /.dropdown -->
                <li class="dropdown">

                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Assessment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                     


                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Registered Driving
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> สถิติ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flotuseapp.php">จำนวนผู้ใช้แอพพลิเคชั่น</a>
                                </li>
                                <li>
                                    <a href="flotassessment.php">การประเมินการให้บริการ</a>
                                </li>
                                <li>
                                    <a href="flotrequestbus.php">การร้องขอรถ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> การจัดการข้อมูล<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tables.php">จัดการข้อมูลพนักงานขับรถ</a>
                                </li>
                                <li>
                                    <a href="bustable.php">จัดการข้อมูลรถเมล์</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw "></i> ตรวจสอบ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="regislog.php">บันทึกเวลาการขับรถเมล์</a>
                                </li>

                                <li>
                                    <a href="requestbus.php">การร้องขอรถเมล์</a>
                                </li>
                                <li>
                                    <a href="assessment.php">การประเมินการให้บริการ</a>
                                </li>
                                <li>
                                    <a href="emergency.php">การแจ้งเหตุฉุกเฉิน</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อมูลพนักงานขับรถ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align = right>
                            <!-- Trigger/Open The Modal -->


                            



                            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="driver_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th >UserDriver</th>
                                        <th >ชื่อ</th>
                                        <th >นามสกุล</th>
                                        <th >จัดการข้อมูล</th>
            
                                    
                                    </tr>
                                </thead>
                            </table>
                           
                        
                            <!-- /.table-responsive -->
                         
                            </tbody>
                            
                            </table>
                            
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
        <!-- /#page-wrapper -->
 </div>
    <!-- /#wrapper -->
    
    <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">เพิ่มข้อมูลคนขับ</h4>
                    </div>
                    <div class="modal-body">
                        <label>ชื่อ</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" />
                        <br />
                        <label>นามสกุล</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                        <br />
                        <br />
                        <label>รหัสบัตรประชาชน</label>
                        <input type="text" name="idpeople" id="idpeople"  maxlength="13" class="form-control" />
                        <br />
                        <br />
                        <label>UserDriver</label>
                        <input type="text" name="userdriver" id="userdriver" maxlength="10"class="form-control" />
                        <br />
                        <br />
                        <label>Pass</label>
                        <input type="password" name="pass" id="pass" class="form-control" />
                        <br />
                        <br />
                        <label>Birth Date</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control" />
                        <br />
                        <br />
                        <label>Moblie Phone</label>
                        <input type="text" name="mphone" id="mphone"   min = "0" max = "9999999999" maxlength="10" class="form-control" />
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

    <!-- Trigger/Open The Modal -->





   
   <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
        
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("Add User");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTable = $('#driver_data').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0, 3],
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
            
                if(firstName != '' && lastName != '')
                {
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
                        $('.modal-title').text("Edit User");
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

</body>
    
</html>
