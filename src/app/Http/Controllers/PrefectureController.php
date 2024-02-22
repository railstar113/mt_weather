<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\Mountain;

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
        // return view('prefectures.index')->with(['regions' => $regions]);
    }

    public function show($code)
    {
        $prefecture = Prefecture::findOrFail($code)->name;
        $mountainsExist = Mountain::where('prefecture_code', $code)->exists();
        $kanaColumnsList = [
            'あ行' => '^([ぁ-おァ-オヴｧ-ｫｱ-ｵ])',
            'か行' => '^([か-ごカ-ゴヵヶｶ-ｺ])',
            'さ行' => '^([さ-ぞサ-ゾｻ-ｿ])',
            'た行' => '^([た-どタ-ドｯﾀ-ﾄ])',
            'な行' => '^([な-のナ-ノﾅ-ﾉ])',
            'は行' => '^([は-ぽハ-ポﾊ-ﾎ])',
            'ま行' => '^([ま-もマ-モﾏ-ﾓ])',
            'や行' => '^([ゃ-よャャ-ヨｬ-ｮﾔ-ﾖ])',
            'ら行' => '^([ら-ろラ-ロﾗ-ﾛ])',
            'わ行' => '^([ゎゎ-んヮ-ンｦﾜ-ﾝ])',
        ];
        foreach ($kanaColumnsList as $kanaColumn => $regex) {
            $kanaColumns[$kanaColumn] = Mountain::where('prefecture_code', $code)
                                                ->where('kana', 'REGEXP', $regex)
                                                ->orderBy('kana', 'asc')
                                                ->get();
        }

        return view('prefectures.show', compact('prefecture', 'mountainsExist', 'kanaColumns'));
    }
}
