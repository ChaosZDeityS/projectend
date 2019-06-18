<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'check.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <!-- <script>
        $(document).ready(function(){
            $("#show").click(function(){
                $(".A").toggle();
            });
        });
    </script> -->


    <script>
    $(document).ready(function(){

        $('#buslineid').change(function(){
           
         
            
            var buslineid = document.getElementById("buslineid");
            document.getElementById("label2").innerHTML= buslineid.value ;
            document.getElementById("label1").innerHTML= buslineid.value ;
           

         
            

            var linkdataTable = $('#linkbus_data').DataTable({
            
            "processing":true,
            "serverSide":true,
            "bDestroy": true,
            "searching": false,
           
            "order":[],
            "ajax":{
                url:"linkbus_fetch.php",
                type:"POST" ,
                
                 "data":{
                     dropdownvalue :   buslineid.value
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
            


 
        
        
        
    } );

    
    

         

            
           
           

        }

        )
        
        
         
      
    
  
    }

    )
    
    
    </script>
    
    <!-- <script>


    function show(){
        
        var buslineid = document.getElementById("buslineid").value;
        document.getElementById("p").innerHTML = "You selected: " + buslineid;
        
        
        
    }

    </script> -->

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
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">สรุปผล</li>
          </ol>
            สายรถเมล์ :
           
           <!-- <option selected="selected">Choose one</option> -->
          
   <form action="addlink.php" action ="GET" >
   <?php
     // 1. Connect
     require("connect.php");
     // 2. Select SQL
     $sql = "SELECT buslineid,buslinename  FROM busline";
     // 3. Execute SQL
     $result = mysqli_query($connection, $sql);
     // Create Select Box / Dropdown Box of Department
     echo "<select name='buslineid' id='buslineid' onchange='show()'>";
     echo "<option value='0'>".กรุณาเลือกสายรถเมล์."</option>";
     while($row = mysqli_fetch_assoc($result)) {
       echo "<option value='".$row['buslineid']."'>".$row['buslineid']." : ".$row['buslinename']."</option>";
     }
     echo '</select><br>  ';

   ?>
     
     <button style="float: right" align type="submit"  class="btn btn-info btn-lg">จัดการสาย</button> </form><br>
           <p id="p">   <br>  </P>



             <!-- DataTables Example -->
             <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              สถานีแต่ละจุดตามสายของรถเมล์&nbsp&nbsp&nbsp </div>
              

               </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="linkbus_data" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                                        
                                        <th>ลำดับ </th>
                                        <th>สถานีจอดรถเมล์</th>

                                       
                   </tr>
                  </thead>
                                    
                 
                </table>
              </div>
            </div>

        
            
          

        <!-- <div class="A">A1 ALLTERNATIVE VICTORY </div>
        <div class="B">B1 BAABAB VICTORY </div>
        <div class="C">C1 CASCASDA VICTORY </div>
        <div class="D">D1 WREASFASF VICTORY </div> -->





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

 <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">จัดการสถานี  <?php
                    echo "    สายรถเมล์ :   <label id='label1'>  </label> ";
                    echo "    สายรถเมล์ :   <label id='label2'>  </label><br> ";
                    ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
              
                    <label>ชื่อจุดจอดรถโดยสารภาษาไทย</label>
                        <input type="text" name="buslineidin" id="buslineidin" maxlength="3"  class="form-control" size = "3" />
                        <br/>

                       

                   
                      
                        <br />
                       

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="buslineidin" id="buslineidin" />
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
      <!-- jQuery -->
      
      <!-- <script src="../vendor/jquery/jquery.min.js"></script> -->

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
    <script type="text/javascript" language="javascript" >
  $(document).ready(function(){
        $(document).on('submit', '#user_form', function(event){
                event.preventDefault();
                var buslineidin = $('#buslineidin').val();
                //var busstopid = $('#busstopid').val();
                if(buslineidin != ''  ){
              //  if(buslineid != '' && busstopid != '' ){
                
                 
                    $.ajax({
                        url:"managebuslineandbusstop_insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                           // linkdataTable.ajax.reload();
                           
                        }
                    });
                }

                else
                {
                    alert("กรอกข้อมูลให้ครบ");
                }
            });

          });


    </script>
  </body>

</html>
