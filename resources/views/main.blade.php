<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
    <div class="mt-8">
        <x-weather-widget :currentWeather="$currentWeather" :description="$description" :forecastWeather="$forecastWeather"  />
    </div>
</body>

</html>
