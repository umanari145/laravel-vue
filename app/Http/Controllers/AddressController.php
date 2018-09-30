<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Mjuusho;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'address.index',
             []
        );
    }
}
