<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    public function index() {
        return view('web.settings');

    }
    
}
