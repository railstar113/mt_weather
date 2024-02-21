<x-layout>
    <x-slot name="title">
        山の天気予報
    </x-slot>

    <h1>山の天気予報</h1>
    <dl>
        @foreach ($regions as $region => $prefectures)
            <dt>{{ $region }}</dt>
            <dd>
                <ul>
                    @foreach ($prefectures as $prefecture)
                        <li><a href="{{ route('prefectures.show', $prefecture->code) }}">{{ $prefecture->name }}</a></li>
                    @endforeach
                </ul>
            </dd>
        @endforeach
    </dl>
</x-layout>
