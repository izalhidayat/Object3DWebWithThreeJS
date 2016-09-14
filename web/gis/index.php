<?php
session_start();
error_reporting(0);
$ids=$_GET['id'];
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="../js/infobubble.js"></script>
		<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCQ1Ahjtj_yvAhk3Hw-qn3cow-cQmybyaY&sensor=false"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var iconHotel='icons/pinner.gif';

				var mapCenter = new google.maps.LatLng(-6.978863,107.631645); //Google map Coordinates
				var map;
					map_initialize(); // initialize google map
				
				//############### Google Map Initialize ##############
			function map_initialize(){
				var googleMapOptions = 
				{
					zoom: 14,
					center: mapCenter,
					minZoom:15,
					maxZoom:19,
					mapTypeControl: true,
					mapTypeControlOptions: {
						style: google.maps.MapTypeControlStyle.DEFAULT,
						mapTypeIds: [
							google.maps.MapTypeId.ROADMAP,
							google.maps.MapTypeId.TERRAIN
						] // google map type
					},
					zoomControl: true,
    				zoomControlOptions: {
      					style: google.maps.ZoomControlStyle.BIG
   					},
					scaleControl: true, // enable scale control
				
				};

		        var markers = [];
		   		map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);
				
				//Load Markers from the XML File, Check (map_process.php)
				$.get("map_process.php?id=<?php echo $ids?>", function (data) {
					$(data).find("marker").each(function () {
					  var nama_pembeli 		= $(this).attr('nama_pembeli');
					  var alamat	= $(this).attr('alamat');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('long')));
					  create_marker(point, nama_pembeli, alamat,false, iconHotel);
					});
				});
			}		

	//############### Create Marker Function ##############
	function create_marker(MapPos, MapTitle, MapDesc, InfoOpenDefault, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:false,
			animation: google.maps.Animation,
			title:"Info Lokasi",
			icon: iconPath
		});
		
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win"><div class="marker-inner-win"><span>'+MapTitle+'</span></div>');	

		//Create an infoWindow
		var infoBubble = new InfoBubble({
      		map: map,
      		position: new google.maps.LatLng(-32.0, 149.0),
      		shadowStyle: 1,
      		overflowX: 'hidden',
      		padding: 0,
      		borderRadius: 15,
      		arrowSize: 10,
      		backgroundColor: '#fff',
      		disableAutoPan: false,
      		hideCloseButton: false,
      		arrowPosition: 30,
      		backgroundClassName: 'transparent',
      		arrowStyle: 2});
		//set the content of infoWindow
		infoBubble.setContent(contentString[0]);
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infoBubble.open(map,marker);
		}
	}

});

</script>
	</head>
<style>
h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

/* width and height of google map */
#google_map {width: 100%;
height:650px;
left: 0px;
margin-top:0px;
margin-left:auto;
margin-right:auto;
}
</style>
	<body class="homepage">
             <div class="peta">
                  <div id="google_map" class="image featured" style="width: 100%;position: relative;overflow: hidden;transform: translateZ(0px);hight:auto"></div>
              </div>
	</body>
</html>