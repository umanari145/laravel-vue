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
}
