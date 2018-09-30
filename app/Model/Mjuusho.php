<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mjuusho extends Model
{
    protected $table = 'm_juusho';

    public static function getPrefList()
    {
        $prefList = self::select('m_prefectures_id', 'ken')
                    ->distinct()
                    ->get()
                    ->pluck('ken', 'm_prefectures_id');
        return $prefList;
    }

    public static function getCityList($prefCd)
    {
        $cityList = self::select('shikuchouson', 'shikuchouson_cd')
                    ->distinct()
                    ->where('m_prefectures_id', $prefCd)
                    ->get()
                    ->pluck('shikuchouson', 'shikuchouson_cd');
        return $cityList;
    }

    public static function getTownList($prefCd, $cityCds)
    {
        $townList = self::select(DB::raw("shikuchouson, ooaza, CONCAT(shikuchouson_cd,'-', ooaza_cd) as aza_cd"))
                    ->distinct()
                    ->where('m_prefectures_id', $prefCd)
                    ->whereIn('shikuchouson_cd', $cityCds)
                    ->get()
                    ->groupBy('shikuchouson')
                    ->map(function ($v) {
                        return $v->pluck('ooaza', 'aza_cd');
                    });

        return $townList;
    }
}
