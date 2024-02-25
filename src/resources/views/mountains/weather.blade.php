<x-layout>
    <x-slot name="title">
        {{ $mountain->name }} - 天気予報
    </x-slot>

    <h1>{{ $mountain->name }} - {{ $weatherData['city']['name'] }}付近の天気予報</h1>
    <ul>
        @foreach ($weatherData['list'] as $i => $weather_3hours)
            <li>{{ date('Y/m/d H:i', $weather_3hours['dt']) }}</li>
            <li><img src="http://openweathermap.org/img/wn/{{ $weather_3hours['weather'][0]['icon'] }}@2x.png"
                    alt="{{ $weather_3hours['weather'][0]['description'] }}"></li>
            <li>天気 : {{ $weather_3hours['weather'][0]['description'] }}</li>
            <li>気温 : {{ round($weather_3hours['main']['temp']) }}°C</li>
            @if (isset($weather_3hours['rain']))
                <li>降水量 : {{ $weather_3hours['rain']['3h'] }}mm</li>
            @else
                <li>降水量: 0.0mm</li>
            @endif
            <li>風速 : {{ $degData[$i] . ' ' . round($weather_3hours['wind']['speed'], 1) }}m/s</li>
        @endforeach
    </ul>
</x-layout>
