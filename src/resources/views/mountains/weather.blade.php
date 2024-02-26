<x-layout>
  <x-slot name="title">
    {{ $mountain->name }} - 天気予報
  </x-slot>

  <h1>{{ $mountain->name }} - {{ $weatherData['city']['name'] }}付近の<span class="i_block">天気予報</span></h1>
  <div class="container">
    <p class="back_link">&laquo; <a href="{{ route('prefectures.show', $mountain->prefecture) }}">{{ $mountain->prefecture->name }}の山一覧</a></a></p>
    
    {{-- レイアウト調整用ここから --}}
    <div class="row text_center">
      <table class="table_weather now">
        <thead>
          <tr>
            <th>2024/02/26(月) 21:00<br>現在の天気</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
          </tr>
          <tr>
            <td>小雨 6℃</td>
          </tr>
          <tr>
            <td><span class="text_small">降水量:</span> 0.2<span class="text_small">mm</span></td>
          </tr>
          <tr>
            <td><span class="text_small">風速:</span> <span class="text_small">北東</span> 6.3<span class="text_small">m/s</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row text_center pc_only">
      <table class="table_weather pc_only">
        <thead>
          <tr>
            <th colspan="9">今日 02/26(火)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th width="12%;">時刻</th>
            <td width="11%;">00:00</td>
            <td width="11%;">03:00</td>
            <td width="11%;">06:00</td>
            <td width="11%;">09:00</td>
            <td width="11%;">12:00</td>
            <td width="11%;">15:00</td>
            <td width="11%;">18:00</td>
            <td width="11%;">21:00</td>
          </tr>
          <tr>
            <th></th>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
          </tr>
          <tr>
            <th>天気</th>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
            <td>小雨</td>
          </tr>
          <tr>
            <th>気温</th>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
            <td>6℃</td>
          </tr>
          <tr>
            <th>降水量</th>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
            <td>0.2<span class="text_small">mm</span></td>
          </tr>
          <tr>
            <th>風速</th>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row text_center sp_only">
      <table class="table_weather sp_only">
        <thead>
          <tr>
            <th colspan="9">今日 02/27(火)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th width="20%;">時刻</th>
            <th width="20%;"></th>
            <th width="20%;">天気</th>
            <th width="20%;">気温</th>
            <th width="20%;">降水量</th>
            <th width="20%;">風速</th>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
          <tr>
            <td>00:00</td>
            <td><img src="http://openweathermap.org/img/wn/10n@2x.png" alt="小雨"></td>
            <td>小雨</td>
            <td>6℃</td>
            <td>0.2<span class="text_small">mm</span></td>
            <td><span class="text_small">北東</span><br>6.3<span class="text_small">m/s</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    {{-- レイアウト調整用ここまで --}}

    {{-- <div class="weather_wrap">
      <ul class="list_unstyled">
        @foreach ($weatherData['list'] as $i => $weather_3hours)
          @php
            $week = ['日', '月', '火', '水', '木', '金', '土'];
            $date = date('w', $weather_3hours['dt']);
          @endphp
          <li>{{ date('Y/m/d H:i', $weather_3hours['dt']) . '(' . $week[$date] . ')' }}</li>
          <li><img src="http://openweathermap.org/img/wn/{{ $weather_3hours['weather'][0]['icon'] }}@2x.png"
              alt="{{ $weather_3hours['weather'][0]['description'] }}"></li>
          <li>天気 : {{ $weather_3hours['weather'][0]['description'] }}</li>
          <li>気温 : {{ round($weather_3hours['main']['temp']) }}°C</li>
          @if (isset($weather_3hours['rain']))
            <li>降水量 : {{ $weather_3hours['rain']['3h'] }}mm</li>
          @else
            <li>降水量: 0.0mm</li>
          @endif
          <li>風速 : {{ $degData[$i] . ' ' . round($weather_3hours['wind']['speed'], 1) }}m/s</li>
        @endforeach
      </ul>
    </div> --}}
  </div>
</x-layout>
