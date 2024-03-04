<x-layout>
  <x-slot name="title">
    {{ config('app.name') }}
  </x-slot>
  <x-slot name="description">
    {{ config('app.name') }}は、日本各地の山の天気予報をご提供します。登山に必要な情報に簡単にアクセスすることが可能です。
  </x-slot>
  <x-slot name="bodyClass">
    home
  </x-slot>

  <h1>{{ config('app.name') }}</h1>
  <div class="container">
    <div class="regions_wrap">
      @foreach ($regions as $region => $prefectures)
        <dl>
          <dt>{{ $region }}</dt>
          <dd>
            <ul class="list_unstyled">
              @foreach ($prefectures as $prefecture)
                <li>
                  <a href="{{ route('prefectures.show', $prefecture->id) }}">{{ $prefecture->name }}</a>
                </li>
              @endforeach
            </ul>
          </dd>
        </dl>
      @endforeach
    </div>
  </div>
</x-layout>
