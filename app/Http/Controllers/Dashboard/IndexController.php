<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
//    public function root()
//    {
//        return view('auth.login');
//    }
    public function index(){
        return view('index');
    }
        public function lang($locale)
        {
            if ($locale) {
                App::setLocale($locale);
                Session::put('lang', $locale);
                Session::save();
                return redirect()->back()->with('locale', $locale);
            } else {
                return redirect()->back();
            }
        }
    }
