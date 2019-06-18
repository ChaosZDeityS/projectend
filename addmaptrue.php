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
           
            
       <div id="form">
      <table>
      <tr><td>ชื่อสถานีจุดจอดรถภาษาอังกฤษ :</td> <td><input type='text' id='busstopname' required/> </td> </tr>
     <tr><td>ชื่อสถานีจุดจอดแบบภาษาไทย:</td> <td><input type='text' id='busstopnameTH' required/> </td> <tr>
    <td><input type='button' value='เพิ่มจุดจอดรถ' onclick='saveData()'/></td></tr>
      </table>
    </div>
    <div id="message">เพิ่มจุดเสร็จสิ้น</div>
          <div id="wrapper">
        </div>
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
  location.replace("managestation.php")
}
</script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        
 
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

        <script>
 document.getElementById("form").style.display ="none"
    document.getElementById("message").style.display ="none"
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var california = {lat: 37.4419, lng: -122.1419};
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(19.03063150, 99.92315530),
          zoom: 13
        });
       
        infowindow = new google.maps.InfoWindow({

          content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            document.getElementById("form").style.display ="block"
    //document.getElementById("message").style.display ="block"
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {

        function hideshow() {
        var x = document.getElementById("ddd");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }
        var busstopname = escape(document.getElementById('busstopname').value);
        var busstopnameTH = escape(document.getElementById('busstopnameTH').value);
        //var type = document.getElementById('type').value;
        var latlng = marker.getPosition();
        var url = 'addmaptest_insert.php?busstopname=' + busstopname + '&busstopnameTH=' + busstopnameTH +
                    '&latitude=' + latlng.lat() + '&longtitude=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
            redirect();
          }
        });


      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

    </script>
   <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqYJn_Z1CkSTht8ahYUhtoIRj2CR6nnxk&callback=initMap">
</script>


  </body>

</html>
