<x-layout>
  <x-slot name="title">
    {{ $prefecture->name }} - 山一覧
  </x-slot>

  <h1>{{ $prefecture->name }}の山一覧</h1>
  <div class="container">
    <p class="back_link">&laquo; <a href="{{ route('prefectures.index') }}">都道府県一覧</a></a></p>
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
  </div>
</x-layout>
