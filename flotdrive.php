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
              สรุปผลการขับรถเมล์</div>
            <div class="card-body">
            <div class="flot-chart">
                <div class="flot-chart-content" id="flot-bar-chart"></div>
            </div>
            <form method="POST" action = "?action=countrou" name="count1"> 
             สรุปยอดขับรถประจำ :
             <select onchange="this.form.submit();" name = "counttype" id="counttype" >
             <option ></option>
             <option value="D">วันนี้</option>
             <option value="W">สัปดาห์นี้</option>
             <option value="M">เดือนนี้</option></select>
             <button type="submit" name="submit" value="Submit">แสดง</button>
             </select>
             
            </form>
            <?php 
              if(isset($_REQUEST['submit'])) {
                countround();
            }else
            
            ?>
            <?php 
            function countround(){
            require_once 'connect.php' ;

            date_default_timezone_set("Asia/Bangkok");
            $counttype= $_POST['counttype'];
            $currentdate = date("Y-m-d");
            $currentmonth = date("m");


            if($counttype == "D"){
          
                $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE datereg = CURDATE()AND timestatus = 2 GROUP BY busno  " ;
                $result = mysqli_query($connection,$sql);
                echo "สรุปยอดขับรถประจำวันนี้ " ;
                while($row = mysqli_fetch_array($result)){
                  
                    echo "<br>หมายเลขรถเมล์คันที่  " .$row['busno'];
                    echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']. "<br>";
                }
              /*if($row = mysqli_fetch_array($result) > 0) {
                    echo "สรุปยอดขับรถประจำวันที่ " .$currentdate ;
                    while($row = mysqli_fetch_array($result)){
                    echo "หมายเลขรถเมล์คันที่  " .$row['busno'];
                    echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']. "<br>";
              }
              }else{
                
                  echo "สรุปยอดขับรถประจำวันที่ " .$currentdate ;
                  echo "<br>ไม่มียอดขับรถประจำวันนี้ วันที่ " .$currentdate ;
              }*/
              
            }else if($counttype == "W"){
                $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE YEARWEEK(datereg) = YEARWEEK(CURDATE()) AND timestatus = 2 GROUP BY busno  " ;
                $result = mysqli_query($connection,$sql);
                echo "สรุปยอดขับรถประจำสัปดาห์นี้ " ;
                while($row = mysqli_fetch_array($result)){
                  
                    echo "<br>หมายเลขรถเมล์คันที่  " .$row['busno'];
                    echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum'];
                }
            }else if($counttype == "M"){

                $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE MONTH(datereg) = MONTH(CURDATE()) AND timestatus = 2 GROUP BY busno  " ;
                $result = mysqli_query($connection,$sql);
                if($currentmonth == "1"){
                  echo " สรุปยอดขับรถประจำเดือน มกราคม <br>" ; 
                }else if($currentmonth == "2"){
                  echo " สรุปยอดขับรถประจำเดือน กุมภาพันธ์ <br>" ;
                }else if($currentmonth == "3"){
                  echo " สรุปยอดขับรถประจำเดือน มีนาคม <br>" ;
                }else if($currentmonth == "4"){
                  echo " สรุปยอดขับรถประจำเดือน เมษายน <br>" ;
                }else if($currentmonth == "5"){
                  echo " สรุปยอดขับรถประจำเดือน พฤษภาคม <br>" ;
                }else if($currentmonth == "6"){
                  echo " สรุปยอดขับรถประจำเดือน มิถุนายน <br>" ;
                }else if($currentmonth == "7"){
                  echo " สรุปยอดขับรถประจำเดือน กรกฎาคม <br>" ;
                }else if($currentmonth == "8"){
                  echo " สรุปยอดขับรถประจำเดือน สิงหาคม <br>" ;
                }else if($currentmonth == "9"){
                  echo " สรุปยอดขับรถประจำเดือน กันยายน <br>" ;
                }else if($currentmonth == "10"){
                  echo " สรุปยอดขับรถประจำเดือน ตุลาคม <br>" ;
                }else if($currentmonth == "11"){
                  echo " สรุปยอดขับรถประจำเดือน พฤศจิกายน <br>" ;
                }else if($currentmonth == "12"){
                  echo " สรุปยอดขับรถประจำเดือน ธันวาคม <br>" ;
                }
               
                while($row = mysqli_fetch_array($result)){
                    
                    echo "หมายเลขรถเมล์คันที่  " .$row['busno'];
                    echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']. "<br>";
            }
            }
          }
            ?>
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

          
   <script type="text/javascript" language="javascript" >
     $(function() {
    $('#counttype').change(function() {
        this.form.submit();
    });
});
   </script>
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
