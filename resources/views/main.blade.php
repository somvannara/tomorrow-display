<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>How's the Weather</title>
</head>
{{-- Hello Kimhou --}}
<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
    <div class="mt-8">
        {{-- pass variables to blade component --}}
        <x-weather-widget :currentWeather="$currentWeather" :description="$description" :forecastWeather="$forecastWeather" :location="$location" />
    </div>
    <script>
        let autocomplete;
        function initPlaces() {
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('countrySearch'),
                {
                    // specifying the type of place the user should search for
                    types: ['(cities)'],
                    fields: ['place_id', 'geometry', 'name']
                });
            autocomplete.addListener('place_changed', onPlaceChanged);
        }

        const urlParams = new URLSearchParams(window.location.search)
        const myLocation = urlParams.get('location') ? urlParams.get('location') : 'Phnom Penh'

        function onPlaceChanged() {
            var place = autocomplete.getPlace();
            window.location.href = `/?location=${place.name}`
            if(!place.geometry) {
                //User did not select a prediction; reset the input field
                document.getElementById('countrySearch').placeholder = 'Enter a valid place';
            } else {
                //Display details about the valid place
                document.getElementById('countrySearch').innerHTML = place.name;
            }
        }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5XxwhH_ogDrzePaBsGj57ky20NWWRQYY&libraries=places&callback=initPlaces"></script>
</body>

</html>
