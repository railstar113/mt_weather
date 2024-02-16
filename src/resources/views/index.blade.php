<x-layout>
    <x-slot name="title">
        山の天気予報
    </x-slot>

    <h1>山の天気予報</h1>
    <ul>
        @foreach($mountains as $mountain)
            <li><a href="{{ route('mountains.show', $mountain) }}">{{ $mountain->name }}</a></li>
        @endforeach
    </ul>
</x-layout>
