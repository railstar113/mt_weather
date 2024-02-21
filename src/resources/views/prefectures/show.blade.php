<x-layout>
    <x-slot name="title">
        {{ $prefecture }} - 山一覧
    </x-slot>

    <h1>{{ $prefecture }}の山一覧</h1>
    <ul>
        @forelse ($mountains as $mountain)
            <li><a href="{{ route('mountains.weather', $mountain) }}">{{ $mountain->name }}</a></li>
        @empty
            <li>山の登録がありません。</li>
        @endforelse
    </ul>
</x-layout>
