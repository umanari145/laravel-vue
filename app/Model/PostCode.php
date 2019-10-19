<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class PostCode extends Model
{
    protected $table = 'postcode';

    public static function getAddress($zip)
    {
        $address = self::where('zip', $zip)
                    ->first();
        return $address;
    }
}
