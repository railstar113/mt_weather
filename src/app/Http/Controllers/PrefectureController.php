<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Http;

class PrefectureController extends Controller
{
  public function index()
  {
    $regionsList = [
      '北海道・東北', '関東', '中部', '近畿', '中国', '四国', '九州・沖縄'
    ];
    foreach ($regionsList as $region) {
      $regions[$region] = Prefecture::where('region', $region)->get();
    }
    return view('prefectures.index', compact('regions'));
  }

  public function show(Prefecture $prefecture)
  {
    $response = Http::get("https://mountix.codemountains.org/api/v1/mountains?prefecture=$prefecture->id&sort=name.asc");
    $mountains = $response->json()['mountains'];

    $regexList = [
      'あ行' => '/^[ぁ-おァ-オヴｧ-ｫｱ-ｵ]/u',
      'か行' => '/^[か-ごカ-ゴヵヶｶ-ｺ]/u',
      'さ行' => '/^[さ-ぞサ-ゾｻ-ｿ]/u',
      'た行' => '/^[た-どタ-ドｯﾀ-ﾄ]/u',
      'な行' => '/^[な-のナ-ノﾅ-ﾉ]/u',
      'は行' => '/^[は-ぽハ-ポﾊ-ﾎ]/u',
      'ま行' => '/^[ま-もマ-モﾏ-ﾓ]/u',
      'や行' => '/^[ゃ-よャ-ヨｬ-ｮﾔ-ﾖ]/u',
      'ら行' => '/^[ら-ろラ-ロﾗ-ﾛ]/u',
      'わ行' => '/^[ゎ-んヮ-ンｦﾜ-ﾝ]/u',
    ];
    $kanaColumns = [];
    foreach ($mountains as $mountain) {
      $nameKana = $mountain['nameKana'];
      $matched = false;
      foreach ($regexList as $kanaColumn => $regex) {
        if (preg_match($regex, $nameKana)) {
          $kanaColumns[$kanaColumn][] = $mountain;
          $matched = true;
          break;
        }
      }
      if (!$matched) {
        $kanaColumns['その他'][] = $mountain;
      }
    }

    return view('prefectures.show', compact('prefecture', 'kanaColumns'));
  }
}
