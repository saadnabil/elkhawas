<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(){
        $lang ??= request('lang', 'ar');
        session()->put('lang',$lang);
        app()->setLocale($lang);
        return redirect()->back();
    }
}
