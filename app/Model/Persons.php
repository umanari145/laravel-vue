<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Persons extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'person_name',
        'sex',
        'birth_day',
        'zip',
        'address_code',
        'address1',
        'address2',
        'email',
        'tel',
        'traffic',
        'contents',
        'created_at',
        'updated_at'
    ];

}
