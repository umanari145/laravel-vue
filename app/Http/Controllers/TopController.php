<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Mjuusho;

class TopController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
        }
        return view('index', []);
    }
}
