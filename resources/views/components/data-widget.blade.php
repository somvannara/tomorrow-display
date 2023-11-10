{{-- complements the passing of variables from blade view --}}
@props(['currentWeather', 'description', 'forecastWeather', 'location'])
<div class="w-128 mx-auto">
    <input id="countrySearch" class="rounded-sm w-128 px-4" type="search" size="50" placeholder="Enter City Name to Get The Data" >
</div>
<div class="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden mt-8">
    <div class="current-weather relative">
        <div class="flex items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <div>
                    <div class="text-5xl font-semibold">
                        {{ round($currentWeather['data']['values']['temperature']) }}&#176;C</div>
                    <div class="text-gray-400">Feels like
                        {{ round($currentWeather['data']['values']['temperatureApparent']) }}&#176;C</div>
                </div>
                <div class="ml-5">
                    <div class="font-semibold">
                        {{ $description['weatherCodeFullDay'][$currentWeather['data']['values']['weatherCode']] }}</div>
                    <div class="text-gray-400">{{ $location }}</div>
                </div>
            </div>
            <div>
                <img src="/png/{{ $currentWeather['data']['values']['weatherCode'] }}0_{{ str_replace(' ', '_', strtolower($description['weatherCodeFullDay'][$currentWeather['data']['values']['weatherCode']])) }}_small@2x.png"
                    alt="icon">
            </div>
        </div>
        <button class="absolute right-20 bottom-0 mb-2 mr-8 text-xs"><a href="/" class="bg-transparent text-blue-400 font-semibold hover:text-white">Go Back</a></button>
        <button class="absolute right-0 bottom-0 mb-2 mr-2 text-xs"><a href="/map" class="bg-transparent text-blue-400 font-semibold hover:text-white">Precipitation Map</a></button>
    </div>
    <div class="flex flex-row bg-gray-800 pr-4 pl-14 py-4 items-center text-center">
        <div class="grow">Precipitation Chance/%</div>
        <div class="grow">Evapotranspiration/mm</div>
        <div class="grow">Wind Direction/&#176;</div>
    </div>
    <ul class="future-weather bg-gray-800 px-4 py-4 space-y-8 "> 
        @foreach ($forecastWeather['timelines']['daily'] as $weather)
            <li class="grid grid-cols-extra items-center">
                <div class="text-gray-400">
                    @if ($loop->iteration == 1)
                        Today
                    @else
                        {{ \Carbon\Carbon::parse($weather['time'])->setTimezone('Asia/Bangkok')->format('D') }}
                    @endif
                </div>
                <div class="flex items-center text-center">
                    <div class="grow">
                        {{ $weather['values']['precipitationProbabilityAvg'] }}
                    </div>
                    {{-- weatherCodeMin is the same as weatherCodeMax proven by checking postman --}}
                    <div class="grow ">
                        {{ $weather['values']['evapotranspirationAvg'] }}
                    </div>
                    <div class="grow">
                        {{ $weather['values']['windDirectionAvg'] }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
