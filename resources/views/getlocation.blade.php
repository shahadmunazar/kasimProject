<!DOCTYPE html>
<html>
<head>
  <title>My Current Location with Full Address</title>
  <style>
    #map {
      height: 500px;
      width: 100%;
      border-radius: 8px;
      margin-top: 20px;
    }
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f7f7f7;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      background: #4285F4;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    #info {
      margin-top: 15px;
      font-size: 16px;
    }
  </style>
</head>
<body>

<h2>Get My Current Location & Address</h2>
<button onclick="getLocation()">Show My Location</button>
<div id="info"></div>
<div id="map"></div>

<!-- Load Google Maps JavaScript API -->
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-EVjH_5VfSycKL4fJeLy1l-BsLWCyN6c&callback=initMap">
</script>

<script>
  let map, marker;

  function initMap() {
    // Default map center
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 20.5937, lng: 78.9629 }, // Center of India
      zoom: 5,
    });
  }

  function getLocation() {
    const info = document.getElementById("info");
    if (navigator.geolocation) {
      info.innerHTML = "Fetching your location...";
      navigator.geolocation.getCurrentPosition(showPosition, showError, {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
      });
    } else {
      info.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    const userLocation = { lat: lat, lng: lng };

    map.setCenter(userLocation);
    map.setZoom(17);

    if (marker) marker.setMap(null);
    marker = new google.maps.Marker({
      position: userLocation,
      map: map,
      title: "You are here!"
    });

    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: userLocation }, function (results, status) {
      if (status === "OK") {
        if (results[0]) {
          document.getElementById("info").innerHTML = `
            <strong>Latitude:</strong> ${lat}<br>
            <strong>Longitude:</strong> ${lng}<br>
            <strong>Address:</strong> ${results[0].formatted_address}
          `;
          $.ajax({
          url: "/save-location",
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          data: {
            latitude: lat,
            longitude: lng,
            address: address
          },
          success: function (res) {
            console.log("Saved successfully", res);
          },
          error: function (err) {
            console.error("Save error", err.responseText);
          }
        });
        } else {
          document.getElementById("info").innerHTML = "No address results found.";
        }
      } else {
        document.getElementById("info").innerHTML = "Geocoder failed: " + status;
      }
    });
  }

  function showError(error) {
    let msg = "Error retrieving location.";
    switch (error.code) {
      case error.PERMISSION_DENIED:
        msg = "User denied the request for Geolocation.";
        break;
      case error.POSITION_UNAVAILABLE:
        msg = "Location information is unavailable.";
        break;
      case error.TIMEOUT:
        msg = "The request to get user location timed out.";
        break;
    }
    document.getElementById("info").innerHTML = msg;
  }
</script>

</body>
</html>
