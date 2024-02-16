<x-layout>
    <x-slot name="title">
        {{ $mountain->name }} - 山の天気予報
    </x-slot>

    <h1>{{ $mountain->name }}付近の天気予報</h1>
    <ul>
        @foreach($weatherData['daily'] as $day)
            <li>{{ date('Y-m-d', $day['dt']) }}: {{ $day['weather'][0]['description'] }}, High: {{ $day['temp']['max'] }}°C, Low: {{ $day['temp']['min'] }}°C</li>
        @endforeach
    </ul>
</x-layout>
