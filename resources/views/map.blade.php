<!DOCTYPE html>
<html>

<head>
    <title>Tomorrow.io Map</title>
    <link rel="stylesheet" type="text/css" href="./map.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="./map.js"></script>
</head>

<body>
    <div id="map"></div>
    <div id="legend">
        <h3>Legend</h3>
        <button id="return"><a href="/" class="return">Go Back</a></button>
    </div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTmi8BNoN2q9A1Dq97DVVufkMQzRgG6oA&callback=initMap&libraries=&v=weekly"
        async></script>

</body>

</html>
