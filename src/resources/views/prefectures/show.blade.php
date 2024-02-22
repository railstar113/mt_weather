<x-layout>
    <x-slot name="title">
        {{ $prefecture }} - 山一覧
    </x-slot>

    <h1>{{ $prefecture }}の山一覧</h1>
    @if ($mountainsExist)
        <dl>
            @foreach ($kanaColumns as $kanaColumn => $mountains)
                @if ($mountains->isNotEmpty())
                    <dt>{{ $kanaColumn }}</dt>
                    <dd>
                        <ul>
                            @foreach ($mountains as $mountain)
                                <li><a href="{{ route('mountains.weather', $mountain->id) }}">{{ $mountain->name }}</a></li>
                            @endforeach
                        </ul>
                    </dd>
                @endif
            @endforeach
        </dl>
    @else
        <p>山の登録がありません。</p>
    @endif
</x-layout>
