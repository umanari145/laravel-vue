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

    public static function getTownList($prefCd, $cityCd)
    {
        $townList = self::select(DB::raw("ken, shikuchouson, ooaza, CONCAT(ken, shikuchouson, ooaza) as full_address ,CONCAT(shikuchouson_cd,'-', ooaza_cd) as aza_cd"))
                    ->distinct()
                    ->where('m_prefectures_id', $prefCd)
                    ->where('shikuchouson_cd', $cityCd)
                    ->get();

        return $townList;
    }
}
