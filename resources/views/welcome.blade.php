<!DOCTYPE html>

<html dir="rtl">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style type="text/css">
		html{ height:100%; }
		body{ height:100%; margin:0; padding:0; color: grey; }
		#map_canvas{ height:100%; width:100%; }
		</style>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	</head>

	<body>
		<h3 align="center" style="color:blue;">WFP Area of Operation Stakeholder Analysis DEMO</h3>
        <script type="text/javascript">
            function initialise() {
                // create object literal to store map properties
                var myOptions = {
                    zoom: 8 // set zoom level
                    , mapTypeId: google.maps.MapTypeId.HYBRID // apply tile (options include ROADMAP, SATELLITE, HYBRID and TERRAIN)
                };
                
                // create map object and apply properties
                var map = new google.maps.Map( document.getElementById( "map_canvas" ), myOptions );
                
                // create map bounds object
                var bounds = new google.maps.LatLngBounds();
                map.fitBounds( bounds );
            }
    
            // load map after page has finished loading
            function loadScript() {
                var script = document.createElement( "script" );
                script.type = "text/javascript";
                script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialise"; // initialize method called using callback parameter
                document.body.appendChild( script );
            }
            window.onload = loadScript;		
            </script>
		<!-- map container -->
		<div id="map_canvas" style="width:100%;height:100%;"><noscript><p>JavaScript is required to render the Google Map.</p></noscript></div>
	</body>
		<script type="text/javascript">
			function initialise() {
				// create object literal to store map properties
				var myOptions = {
					zoom: 14 // set zoom level
					
					, mapTypeId: google.maps.MapTypeId.HYBRID // apply tile (options include ROADMAP, SATELLITE, HYBRID and TERRAIN)
				};
				
				// create map object and apply properties
				var map = new google.maps.Map( document.getElementById( "map_canvas" ), myOptions );
				
			
				//Place Draggable Marker
				var myLatLng=new google.maps.LatLng(3.028086, 30.910002)
				var marker= new google.maps.Marker({
					position: myLatLng,
					map:map,
					draggable:true,
					title: 'Get Coordinates'
	
				})
				google.maps.event.addListener(marker, 'dragend', function(evt){
					console.log(evt.latLng.lat(), evt.latLng.lng())
					console.log(evt.latLng)
					var lat=this.getPosition().lat();
					var lng=this.getPosition().lng();
	
					//Using an Ajax fxn to save the lat/lng to the DB
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					})
					$.ajax({
						type: 'POST',
						data:{latitude:lat, longitude:lng},
						url: "savecoords", 
						success:function(response){
							alert(response);
						},
						error:function(){
							alert('An error Occured during request processing');
						}
					})
				})
	
				//Using an Ajax fxn to get the lat/lng from the DB
				
				map.setCenter(marker.position);
				marker.setMap(map);
				
				// create map bounds object
				var bounds = new google.maps.LatLngBounds();
				// loop through locations and add to map
				@foreach($locations as $location)
					 // {{ $location->lat }} {{ $location->lng }}
					 {
							
					// create map position
					var position = new google.maps.LatLng( 	{{ $location->lat }}, {{ $location->lng }} );
					
					// add position to bounds
					bounds.extend( position );
					
					// create marker (https://developers.google.com/maps/documentation/javascript/reference#MarkerOptions)
					var marker = new google.maps.Marker({
						animation: google.maps.Animation.DROP
						, icon: "http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png"
						, map: map
						, position: position
						, title: "location"
					});
					
					
					// create info window and add to marker (https://developers.google.com/maps/documentation/javascript/reference#InfoWindowOptions)
					google.maps.event.addListener( marker, 'click', ( 
						function( marker) {
							return function() {
								var infowindow = new google.maps.InfoWindow();
								infowindow.setContent("<div align='center' style='width:300px;height:500px;'><p style='color:red;margin:5px;'>world food program!!</p></div>");
								infowindow.open( map, marker );
							}
						}
					)( marker) );
				};
				@endforeach
				map.fitBounds( bounds );
			}
	
			// load map after page has finished loading
			function loadScript() {
				var script = document.createElement( "script" );
				script.type = "text/javascript";
				script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialise&key=AIzaSyBa_hrFDCUbo5UtejzWzKfFkoCvhKw0usU"; // initialize method called using callback parameter
				document.body.appendChild( script );
			}
			window.onload = loadScript;		
			</script>
		<!-- map container -->
	
	</body>
</html>