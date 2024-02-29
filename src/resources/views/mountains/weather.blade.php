<x-layout>
  <x-slot name="title">
    {{ $mountain['name'] }} - 天気予報
  </x-slot>
  <x-slot name="bodyClass">
    weathers
  </x-slot>

  <h1>{{ $mountain['name'] }}<span class="text_small">{{ '（' . $mountain['elevation'] . 'm付近）' }}</span></h1>
  <div class="container">

    {{-- 現在の天気 --}}
    <div class="row text_center">
      <table class="table_weather now">
        <thead>
          <tr>
            <th>{{ date('Y/m/d', $weatherNow['dt']) . '（' . $weatherNow['dt_day'] . '） ' . date('H:i') }}<br>現在の天気
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="http://openweathermap.org/img/wn/{{ $weatherNow['weather'][0]['icon'] }}@2x.png"
                alt="{{ $weatherNow['weather'][0]['description'] }}"></td>
          </tr>
          <tr>
            <td>{{ $weatherNow['weather'][0]['description'] }} {{ round($weatherNow['main']['temp']) }}°C
            </td>
          </tr>
          <tr>
            <td>
              <span class="text_small">降水量: </span>
              @if (isset($weatherNow['rain']))
                {{ $weatherNow['rain']['3h'] }}<span class="text_small">mm</span>
              @elseif (isset($weatherNow['snow']))
                {{ $weatherNow['snow']['3h'] }}<span class="text_small">cm （積雪量）</span>
              @else
                0.0<span class="text_small">mm</span>
              @endif
            </td>
          </tr>
          <tr>
            <td><span class="text_small">風速: </span><span
                class="text_small">{{ $weatherNow['wind']['direction'] }}</span>
              {{ round($weatherNow['wind']['speed'], 1) }}<span class="text_small">m/s</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    {{-- 3時間毎の天気/PC --}}
    @foreach ($weather3hData as $i => $weather3hs)
      <div class="row text_center pc_only">
        <table class="table_weather">
          <thead>
            <tr>
              <th colspan="9">
                {{ $i === 0 ? '今日 ' : '' }}{{ $i === 1 ? '明日 ' : '' }}{{ date('m/d', $weather3hs[0]['dt']) . '（' . $weather3hs[0]['dt_day'] . '）' }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>時刻</th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td>{{ date('H:i', $weather3h['dt']) }}</td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
            <tr>
              <th></th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td><img src="http://openweathermap.org/img/wn/{{ $weather3h['weather'][0]['icon'] }}@2x.png" alt="{{ $weather3h['weather'][0]['description'] }}"></td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
            <tr>
              <th>天気</th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td>{{ $weather3h['weather'][0]['description'] }}</td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
            <tr>
              <th>気温</th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td>{{ round($weather3h['main']['temp']) }}℃</td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
            <tr>
              <th>降水量</th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td>
                  @if (isset($weather3h['rain']))
                    {{ $weather3h['rain']['3h'] }}<span class="text_small">mm</span>
                  @elseif (isset($weather3h['snow']))
                    {{ $weather3h['snow']['3h'] }}<span class="text_small">cm<br>（積雪量）</span>
                  @else
                    0.0<span class="text_small">mm</span>
                  @endif
                </td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
            <tr>
              <th>風速</th>
              {!! $i === array_key_first($weather3hData) ? $emptyTags['first'] : '' !!}
              @foreach ($weather3hs as $weather3h)
                <td><span class="text_small">{{ $weather3h['wind']['direction'] }}</span><br>{{ round($weather3h['wind']['speed'], 1) }}<span class="text_small">m/s</span></td>
              @endforeach
              {!! $i === array_key_last($weather3hData) ? $emptyTags['last'] : '' !!}
            </tr>
          </tbody>
        </table>
      </div>
    @endforeach

    {{-- 3時間毎の天気/SP --}}
    @foreach ($weather3hData as $i => $weather3hs)
      <div class="row text_center sp_only">
        <table class="table_weather">
          <thead>
            <tr>
              <th colspan="6">
                {{ $i === 0 ? '今日 ' : '' }}{{ $i === 1 ? '明日 ' : '' }}{{ date('m/d', $weather3hs[0]['dt']) . '（' . $weather3hs[0]['dt_day'] . '）' }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>時刻</th>
              <th></th>
              <th>天気</th>
              <th>気温</th>
              <th>降水量</th>
              <th>風速</th>
            </tr>
            @foreach ($weather3hs as $weather3h)
              <tr>
                <td>{{ date('H:i', $weather3h['dt']) }}</td>
                <td><img src="http://openweathermap.org/img/wn/{{ $weather3h['weather'][0]['icon'] }}@2x.png" alt="{{ $weather3h['weather'][0]['description'] }}"></td>
                <td>{{ $weather3h['weather'][0]['description'] }}</td>
                <td>{{ round($weather3h['main']['temp']) }}℃</td>
                <td>
                  @if (isset($weather3h['rain']))
                    {{ $weather3h['rain']['3h'] }}<span class="text_small">mm</span>
                  @elseif (isset($weather3h['snow']))
                    {{ $weather3h['snow']['3h'] }}<span class="text_small">cm<br>（積雪量）</span>
                  @else
                    0.0<span class="text_small">mm</span>
                  @endif
                </td>
                <td><span class="text_small">{{ $weather3h['wind']['direction'] }}</span><br>{{ round($weather3h['wind']['speed'], 1) }}<span class="text_small">m/s</span></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endforeach

    <p class="back"><a href="{{ route('prefectures.show', $prefecture->id) }}" class="button">{{ $prefecture->name }}の山一覧</a></a></p>
    <p class="back mt0"><a href="{{ route('prefectures.index') }}" class="button">都道府県一覧</a></a></p>
  </div>
</x-layout>
