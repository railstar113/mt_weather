<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Http;

class MountainController extends Controller
{
  public function weather($prefectureId, $mountainId)
  {
    $prefecture = Prefecture::findOrFail($prefectureId);

    // mountix APIで緯度・経度取得
    $response = Http::get("https://mountix.codemountains.org/api/v1/mountains/$mountainId");
    $mountain = $response->json();
    $lat = $mountain['location']['latitude'];
    $lon = $mountain['location']['longitude'];

    // OpenWeatherAPIで天気データ取得
    $apiKey = config('api.key');
    $lang = config('api.lang');
    $response = Http::get("https://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&exclude=minutely&appid=$apiKey&units=metric&lang=$lang");
    $weatherData = $response->json();

    // 天気データ整形ここから
    foreach ($weatherData['list'] as $i => $weather3h) {
      // 風向きを数値から日本語に変換
      $degs = ['北', '北北東', '北東', '東北東', '東', '東南東', '南東', '南南東', '南', '南南西', '南西', '西南西', '西北西', '北西', '北北西', '北', '北北東'];
      $degIndex = round($weather3h['wind']['deg'] / 22.5);
      $weather3h['wind']['deg'] = $degs[$degIndex];
      $weatherData['list'][$i]['wind']['direction'] = $degs[$degIndex];

      // 曜日を日本語に変換
      $days = ['日', '月', '火', '水', '木', '金', '土'];
      $dayIndex = date('w', $weather3h['dt']);
      $weatherData['list'][$i]['dt_day'] = $days[$dayIndex];

      // 現在の天気データのみ取得
      $weatherNow = $weatherData['list'][0];
      // 現在の次の時間以降の天気データ取得（3時間毎）
      if ($i === 1) {
        $nextHour = date('H', $weather3h['dt']);
        $emptyTag = '<td class="empty"></td>';
        $emptyTags = [];
        switch ($nextHour) {
          case ('00'):
            $emptyTags['first'] = '';
            $emptyTags['last'] = str_repeat($emptyTag, 1);
            $breakIndex = 9;
            break;
          case ('03'):
            $emptyTags['first'] = str_repeat($emptyTag, 1);
            $emptyTags['last'] = '';
            $breakIndex = 8;
            break;
          case ('06'):
            $emptyTags['first'] = str_repeat($emptyTag, 2);
            $emptyTags['last'] = str_repeat($emptyTag, 7);
            $breakIndex = 7;
            break;
          case ('09'):
            $emptyTags['first'] = str_repeat($emptyTag, 3);
            $emptyTags['last'] = str_repeat($emptyTag, 6);
            $breakIndex = 6;
            break;
          case ('12'):
            $emptyTags['first'] = str_repeat($emptyTag, 4);
            $emptyTags['last'] = str_repeat($emptyTag, 5);
            $breakIndex = 5;
            break;
          case ('15'):
            $emptyTags['first'] = str_repeat($emptyTag, 5);
            $emptyTags['last'] = str_repeat($emptyTag, 4);
            $breakIndex = 4;
            break;
          case ('18'):
            $emptyTags['first'] = str_repeat($emptyTag, 6);
            $emptyTags['last'] = str_repeat($emptyTag, 3);
            $breakIndex = 3;
            break;
          case ('21'):
            $emptyTags['first'] = str_repeat($emptyTag, 7);
            $emptyTags['last'] = str_repeat($emptyTag, 2);
            $breakIndex = 2;
            break;
          default:
            break;
        }
      }
    }
    $weather3hData[] = array_slice($weatherData['list'], 1, $breakIndex - 1);
    for ($i = $breakIndex; $i <= count($weatherData['list']); $i += 8) {
      $every8Pieces = array_slice($weatherData['list'], $i, 8);
      if (count($every8Pieces) !== 0) {
        $weather3hData[] = $every8Pieces;
      }
    }
    // 天気データ整形ここまで

    return view('mountains.weather', compact('prefecture', 'mountain', 'weatherNow', 'weather3hData', 'emptyTags'));
  }
}
