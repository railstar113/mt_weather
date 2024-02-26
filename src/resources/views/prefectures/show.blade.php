<x-layout>
  <x-slot name="title">
    {{ $prefecture->name }} - 山一覧
  </x-slot>

  <h1>{{ $prefecture->name }}の山一覧</h1>
  <div class="container">
    <p class="back_link">&laquo; <a href="{{ route('prefectures.index') }}">都道府県一覧</a></a></p>
    <div class="kana_columns_wrap">
      @if ($mountainsExist)
        @foreach ($kanaColumns as $kanaColumn => $mountains)
          @if ($mountains->isNotEmpty())
            <dl>
              <dt>{{ $kanaColumn }}</dt>
              <dd>
                <ul class="list_unstyled">
                  @foreach ($mountains as $mountain)
                    <li>
                      <a href="{{ route('mountains.weather', $mountain->id) }}">{{ $mountain->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </dd>
            </dl>
          @endif
        @endforeach
      @else
        <p>山の登録がありません。</p>
      @endif
    </div>
  </div>
</x-layout>
