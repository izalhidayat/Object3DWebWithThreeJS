<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Displaying text directions with <code>setPanel()</code></title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select, #right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

      #right-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
      }

      #map {
        margin-right: 400px;
      }

      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map {
          height: 500px;
          margin: 0;
        }

        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <button id="start" style="background: white;width: 80px;height: 30px;border: none;">Tampilkan</button>
      <strong id="end"></strong>
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    <?php
    $lat1='-6.928665';$long1='107.548054';
    $lat2=$_GET['lat2'];$long2=$_GET['long2'];
    ?>
    <script>
function initMap() {
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: {lat: -6.928320, lng: 107.658948},
  });
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('start').addEventListener('click', onChangeHandler);
  document.getElementById('end').addEventListener('click', onChangeHandler);
}

var awal='<?php echo $lat1?>,<?php echo $long1?>';
var tujuan='<?php echo $lat2?>,<?php echo $long2?>';
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    origin: awal,
    destination: tujuan,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ1Ahjtj_yvAhk3Hw-qn3cow-cQmybyaY&signed_in=true&callback=initMap"
        async defer></script>
  </body>
</html>