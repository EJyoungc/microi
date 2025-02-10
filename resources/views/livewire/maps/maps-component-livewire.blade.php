<div>
    <div id="maptest" style="height: 400px;"></div>
   
</div>
{{-- @script --}}
<script>
    // document.addEventListener('livewire:init', function () {
        let map = L.map('maptest').setView([-15.81368, 35.006646], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© Techlink360'
        }).addTo(map);
        // let marker = L.marker([ -15.81368, 35.006646]).addTo(map);

 // Create a FeatureGroup to store editable layers
 var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    // Set up the Leaflet.draw control and pass it the FeatureGroup of editable layers
    var drawControl = new L.Control.Draw({
      edit: { featureGroup: drawnItems },
      draw: {
        polygon: true,
        polyline: true,
        rectangle: true,
        circle: true,
        marker: false,       // disable marker if not needed
        circlemarker: false  // disable circle marker if not needed
      }
    });
    map.addControl(drawControl);
    
    // When a shape is created, add it to the drawnItems layer and display its measurement
    map.on(L.Draw.Event.CREATED, function (e) {
      var layer = e.layer;
      drawnItems.addLayer(layer);
      var content = "";

      // For circles: display the radius.
      if (layer instanceof L.Circle) {
        var radius = layer.getRadius();
        content = "Radius: " + (radius > 1000 ? (radius / 1000).toFixed(2) + " km" : radius.toFixed(2) + " m");
      }
      // For polygons (including rectangles): compute the perimeter.
      else if (layer instanceof L.Polygon) {
        // getLatLngs() returns an array; if the polygon has multiple rings, use the first one.
        var latlngs = layer.getLatLngs();
        if (Array.isArray(latlngs[0])) {
          latlngs = latlngs[0];
        }
        var totalDistance = 0;
        for (var i = 0; i < latlngs.length - 1; i++) {
          totalDistance += latlngs[i].distanceTo(latlngs[i + 1]);
        }
        // Ensure the polygon is "closed" by adding the distance from the last point back to the first
        if (!latlngs[0].equals(latlngs[latlngs.length - 1])) {
          totalDistance += latlngs[latlngs.length - 1].distanceTo(latlngs[0]);
        }
        content = "Perimeter: " + (totalDistance > 1000 ? (totalDistance / 1000).toFixed(2) + " km" : totalDistance.toFixed(2) + " m");
      }
      // For polylines: compute the total length.
      else if (layer instanceof L.Polyline) {
        var latlngs = layer.getLatLngs();
        var totalDistance = 0;
        for (var i = 0; i < latlngs.length - 1; i++) {
          totalDistance += latlngs[i].distanceTo(latlngs[i + 1]);
        }
        content = "Distance: " + (totalDistance > 1000 ? (totalDistance / 1000).toFixed(2) + " km" : totalDistance.toFixed(2) + " m");
      }

      // If a measurement was calculated, bind a popup to the layer and open it.
      if (content !== "") {
        layer.bindPopup(content).openPopup();
      }
    });

    // Add the measurement control (for interactive measuring on the map)
    // var measureControl = new L.Control.Measure({
    //   primaryLengthUnit: 'meters',
    //   secondaryLengthUnit: 'kilometers',
    //   primaryAreaUnit: 'sqmeters',
    //   secondaryAreaUnit: 'hectares'
    // });
    // measureControl.addTo(map);
    // var llc = new LocateControl();
    // llc.addTo(map);

    // Add the locate control button to show your current location
    L.control.locate({
      position: 'topright',
      drawCircle: false,
      follow: true,
      setView: 'once',
      keepCurrentZoomLevel: true,
      markerStyle: {
        weight: 1,
        opacity: 1.0,
        fillOpacity: 1.0
      },
      circleStyle: {
        weight: 1,
        clickable: false
      },
      strings: {
        title: "Show my location",
        popup: "You are within {distance} {unit} from this point",
        outsideMapBoundsMsg: "You seem to be located outside the map bounds"
      },
      locateOptions: {
        maxZoom: 16,
        enableHighAccuracy: true
      }
    }).addTo(map);
        
        function updateLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    let lat = position.coords.latitude;
                    let lon = position.coords.longitude;
                    
                    marker.setLatLng([lat, lon]);
                    map.setView([lat, lon]);
                    // window.Livewire.dispatch('updateLocation', { latitude: lat, longitude: lon });
                });
            }
        }
        
        function simulateMovement() {
            let lat =  -15.81368;
            let lon = 35.006646;
            console.log(lat, lon);
            setInterval(() => {
                lat += (Math.random() - 0.5) * 0.0001;
                lon += (Math.random() - 0.5) * 0.0001;
                marker.setLatLng([lat, lon]);
                map.setView([lat, lon]);
                console.log(lat, lon);
                // window.Livewire.dispatch('updateLocation', { latitude: lat, longitude: lon });
            }, 500);
        }
        
        setInterval(updateLocation, 5000);
        updateLocation();
        // simulateMovement();
    // });
</script>
{{-- @endscript --}}