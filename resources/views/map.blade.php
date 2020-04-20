<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>Draggable Marker</title>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <link rel="stylesheet" type="text/css" href="demo.css" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="../template.css" />
    <script type="text/javascript" src='../test-credentials.js'></script>    
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  <script type="text/javascript" src='../js-examples-rendering-helpers/iframe-height.js'></script></head>
  <body id="markers-on-the-map">
    <div class="page-header">
        <h1>Draggable Marker</h1>
        <p>Display a moveable marker on a map</p>
    </div>
    <p>This example displays a moveable map of <b>Boston</b>, including a marker. The marker can also be moved around the map.</p>
    <div id="map"></div>
    <h3>Code</h3>
    <p>Default markers are created by using the <code>H.map.Marker</code> class without specifying an icon and passing in a location only. 
      To respond to drag events the <code>marker.draggable</code> flag needs to be set. The default panning interaction of the 
      map (<code>H.mapevents.Behavior</code>) must be disabled whilst the <code>drag</code> event is in operation.</p>
    
<script type="text/javascript" src='demo.js'>

/**
 * Adds a  draggable marker to the map..
 *
 * @param {H.Map} map                      A HERE Map instance within the
 *                                         application
 * @param {H.mapevents.Behavior} behavior  Behavior implements
 *                                         default interactions for pan/zoom
 */
 function addDraggableMarker(map, behavior){

var marker = new H.map.Marker({lat:42.35805, lng:-71.0636}, {
  // mark the object as volatile for the smooth dragging
  volatility: true
});
// Ensure that the marker can receive drag events
marker.draggable = true;
map.addObject(marker);

// disable the default draggability of the underlying map
// and calculate the offset between mouse and target's position
// when starting to drag a marker object:
map.addEventListener('dragstart', function(ev) {
  var target = ev.target,
      pointer = ev.currentPointer;
  if (target instanceof H.map.Marker) {
    var targetPosition = map.geoToScreen(target.getGeometry());
    target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY - targetPosition.y);
    behavior.disable();
  }
}, false);


// re-enable the default draggability of the underlying map
// when dragging has completed
map.addEventListener('dragend', function(ev) {
  var target = ev.target;
  if (target instanceof H.map.Marker) {
    behavior.enable();
  }
}, false);

// Listen to the drag event and move the position of the marker
// as necessary
 map.addEventListener('drag', function(ev) {
  var target = ev.target,
      pointer = ev.currentPointer;
  if (target instanceof H.map.Marker) {
    target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer.viewportY - target['offset'].y));
  }
}, false);
}

/**
* Boilerplate map initialization code starts below:
*/

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
apikey: window.apikey
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Boston
var map = new H.Map(document.getElementById('map'),
defaultLayers.vector.normal.map, {
center: {lat:42.35805, lng:-71.0636},
zoom: 12,
pixelRatio: window.devicePixelRatio || 1
});
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Step 4: Create the default UI:
var ui = H.ui.UI.createDefault(map, defaultLayers, 'en-US');

// Add the click event listener.
addDraggableMarker(map, behavior);
    </script>
  </body>
</html>