<x-layout>
  <x-slot name="title">
    {{ $prefecture->name }} - 山一覧
  </x-slot>
  <x-slot name="bodyClass">
    mountains
  </x-slot>

  <h1>{{ $prefecture->name }}<span class="text_small">の山一覧</span></h1>
  <div class="container">
    <div class="kana_columns_wrap">
      @foreach ($kanaColumns as $kanaColumn => $mountains)
        <dl>
          <dt>{{ $kanaColumn }}</dt>
          <dd>
            <ul class="list_unstyled">
              @foreach ($mountains as $mountain)
                <li>
                  <a href="{{ route('mountains.weather', ['prefectureId' => $prefecture, 'mountainId' => $mountain['id']]) }}">{{ $mountain['name'] }}</a>
                </li>
              @endforeach
            </ul>
          </dd>
        </dl>
      @endforeach
    </div>
    <p class="back"><a href="{{ route('prefectures.index') }}" class="button">都道府県一覧</a></a></p>
  </div>
</x-layout>
