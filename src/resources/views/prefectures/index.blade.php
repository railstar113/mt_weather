<x-layout>
  <x-slot name="title">
    山の天気予報
  </x-slot>
  <x-slot name="bodyClass">
    home
  </x-slot>

  <h1>山の天気予報</h1>
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
