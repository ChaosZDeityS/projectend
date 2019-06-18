<!DOCTYPE html>
<html lang="en">

    <head>
             <!-- Google Chart JS-->
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 30%;
        width: 30%
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

   
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
               แสดงสถานีรถโดยสารประจำทางปัจจุบัน  <button style="float: right" align type="button" id="add_button" onclick="redirect()" class="btn btn-info btn-lg">เพิ่มข้อมูล</button></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="station_data" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>รหัสจุดจอดรถเมล์</th>
                      <th>ชื่อจุดจอดรถเมล์ภาษาอังกฤษ</th>
                      <th>ชื่อจุดจอดรถเมล์ภาษาไทย</th>
                      <th>จัดการข้อมูล</th>
                      
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
    <li class="breadcrumb-item active">แสดงตำแหน่งของสถานีจุดจอดรถเมล์</li>
  </ol>

      
          <div class="card mb-3">
            <div class="card-header">
            <div id="map" style="width: 900px; height: 500px;"></div>
            
              
            </div>
             
            <div class="card-footer small text-muted">Support By CSUP</div>
          </div>

        </div>
        <!-- /.container-fluid -->
                    
        <!-- Sticky Footer -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
     

   
        <!-- Sticky Footer -->
  
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
  <?php 
    require_once 'logoutmenu.php' ;
  ?>
 

    

    <!-- Bootstrap core JavaScript-->
    <script>
function redirect() {
  location.replace("addmaptrue.php")
}
</script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("เพิ่มจุดจอดรถเมล์");
                $('#action').val("Add");
                $('#operation').val("Add");
                
                
            });
            
            var dataTablebusline = $('#station_data').DataTable({
                "processing":true,
                "serverSide":true,
                "bInfo" : true,
                "bFilter": true ,
                "order":[],
                "ajax":{
                    url:"station_fetch.php",
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
                var busstopname = $('#busstopname').val();
                var busstopnameTH = $('#busstopnameTH').val();
                var latitude = $('#latitude').val();
                var longtitude = $('#longtitude').val();
                
            
                if(busstopname != '' && busstopnameTH != '' && latitude != '' && longtitude != ''){
                 
                    $.ajax({
                        url:"station_insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTablebusline.ajax.reload();
                        }
                    });
                }

                else
                {
                    alert("กรอกข้อมูลให้ครบ");
                }
            });
            
          

              $(document).on('click', '.update', function(){
                var busstop_id = $(this).attr("id");
                $.ajax({
                    url:"station_fetch_single.php",
                    method:"POST",
                    data:{busstop_id:busstop_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('.modal-title').text("");
                        $('#busstopname').val(data.busstopname);
                        $('#busstopnameTH').val(data.busstopnameTH);
                        $('#latitude').val(data.latitude);
                        $('#longtitude').val(data.longtitude);
                        $('#busstop_id').val(busstop_id);
                        $('#action').val("Edit"); //ปุ่ม 
                        $('#operation').val("Edit"); //จัดการ
                       
                    }
                })
            });
            
            $(document).on('click', '.delete', function(){
                var busstop_id = $(this).attr("id");
                if(confirm("ต้องการจะลบข้อมูลนี้หรือไม่ ? " ))
                {
                    $.ajax({
                        url:"station_delete.php",
                        method:"POST",
                        data:{busstop_id:busstop_id},
                        success:function(data)
                        {
                            alert(data);
                            dataTablebusline.ajax.reload();
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

     <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqYJn_Z1CkSTht8ahYUhtoIRj2CR6nnxk&callback=initMap">
</script>
    <script>
           var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {

           


        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(19.03063150, 99.92315530),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('map_fetch.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });

              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

   


      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>

  </body>

</html>
