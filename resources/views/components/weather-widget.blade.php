@props(['currentWeather', 'description', 'forecastWeather'])
<div class="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
    <div class="current-weather relative">
        <div class="flex items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <div>
                    <div class="text-5xl font-semibold">
                        {{-- {{ $currentWeather['data']['time'] }} --}}
                        {{ round($currentWeather['data']['values']['temperature']) }}&#176;C</div>
                    <div class="text-gray-400">Feels like
                        {{ round($currentWeather['data']['values']['temperatureApparent']) }}&#176;C</div>
                </div>
                <div class="ml-5">
                    <div class="font-semibold">
                        {{ $description['weatherCodeFullDay'][$currentWeather['data']['values']['weatherCode']] }}</div>
                    <div class="text-gray-400">Phnom Penh, Cambodia</div>
                </div>
            </div>
            <div>
                <img src="/png/{{ $currentWeather['data']['values']['weatherCode'] }}0_{{ str_replace(' ', '_', strtolower($description['weatherCodeFullDay'][$currentWeather['data']['values']['weatherCode']])) }}_small@2x.png"
                    alt="icon">
            </div>
        </div>
        <button class="absolute right-0 bottom-0 mb-2 mr-2 text-xs">Toggle</button>
    </div>
    <ul class="future-weather bg-gray-800 px-4 py-6 space-y-8 ">
        @foreach ($forecastWeather['timelines']['daily'] as $weather)
            @if ($loop->iteration == 1)
                @continue
            @endif
            <li class="grid grid-cols-weather items-center">
                <div class="text-gray-400">{{ \Carbon\Carbon::parse($weather['time'])->setTimezone('Asia/Bangkok')->format('D') }}</div> {{-- {{ \Carbon\Carbon::parse($weather['time'])->format('D') }} --}}
                <div class="flex items-center">
                    <div> <img
                            src="/png/{{ $weather['values']['weatherCodeMin'] }}0_{{ str_replace(' ', '_', strtolower($description['weatherCodeFullDay'][$weather['values']['weatherCodeMin']])) }}_small.png"
                            alt="icon">
                    </div>
                    <div>{{ $description['weatherCodeFullDay'][$weather['values']['weatherCodeMin']] }}</div>
                </div>
                <div class="text-right text-xs">
                    <div>{{ $weather['values']['temperatureMax'] }}&#176;C</div>
                    <div>{{ $weather['values']['temperatureMin'] }}&#176;C</div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
