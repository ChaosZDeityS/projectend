<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>From Info Windows to a Database: Saving User-Added Form Data</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"  style="width: 900px; height: 500px;"></div>
    <div id="form">
      <table>
      <tr><td>busstopname:</td> <td><input type='text' id='busstopname'/> </td> </tr>
      <tr><td>busstopnameTH:</td> <td><input type='text' id='busstopnameTH'/> </td> </tr>
    <td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>
    </div>
    <div id="message">Location saved</div>
    <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var california = {lat: 37.4419, lng: -122.1419};
        map = new google.maps.Map(document.getElementById('map'), {
          center: california,
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
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {
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