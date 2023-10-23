<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  $location = 'Phnom Penh';
  $apiKey = 'iwHi2u4Jaeaw64WmK4joH6QiPQ30v8ZH';
  $client = new \GuzzleHttp\Client();
  $response = $client->request('GET', "https://api.tomorrow.io/v4/weather/realtime?location={$location}&apikey={$apiKey}&timezone=Asia/Bangkok", [
    'headers' => [
      'accept' => 'application/json',
    ],
  ]);
  // $response = Http::get()
  $responseFuture = $client->request('GET', "https://api.tomorrow.io/v4/weather/forecast?location={$location}&timesteps=1d&units=metric&apikey={$apiKey}&timezone=Asia/Bangkok", [
    'headers' => [
      'accept' => 'application/json',
    ],
  ]);

  $currentWeather = $response->getBody()->getContents(); //getBody returns stream object?? then getContents return string
  $current = json_decode($currentWeather, true);
  $forecastWeather = $responseFuture->getBody()->getContents();
  $forecast = json_decode($forecastWeather, true);
  $contents = File::get(public_path('/json/weather-codes.json'));
  $description = json_decode($contents, true); //json file for weather code and description
  // echo $description['weatherCodeFullDay'][$current['data']['values']['weatherCode']];
  // $description = File::json_decode(public_path('/json/weather-codes.json'));
  // $descriptionFormatted = str_replace(' ', '_', strtolower($description['weatherCodeFullDay'][$currentWeather['data']['values']['weatherCode']])); //get the description as a slug
  // echo $descriptionFormatted;
  // var_dump($forecast);
  return view('main', [
    'currentWeather' => $current,
    'forecastWeather' => $forecast,
    'description' => $description,
  ]);
});
