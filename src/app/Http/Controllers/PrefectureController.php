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
      'あ' => '/^[ぁ-おァ-オヴｧ-ｫｱ-ｵ]/u',
      'か' => '/^[か-ごカ-ゴヵヶｶ-ｺ]/u',
      'さ' => '/^[さ-ぞサ-ゾｻ-ｿ]/u',
      'た' => '/^[た-どタ-ドｯﾀ-ﾄ]/u',
      'な' => '/^[な-のナ-ノﾅ-ﾉ]/u',
      'は' => '/^[は-ぽハ-ポﾊ-ﾎ]/u',
      'ま' => '/^[ま-もマ-モﾏ-ﾓ]/u',
      'や' => '/^[ゃ-よャ-ヨｬ-ｮﾔ-ﾖ]/u',
      'ら' => '/^[ら-ろラ-ロﾗ-ﾛ]/u',
      'わ' => '/^[ゎ-んヮ-ンｦﾜ-ﾝ]/u',
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
