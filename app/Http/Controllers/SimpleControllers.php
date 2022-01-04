<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpleControllers extends Controller
{
    //




    // ALL 
    public function coinsubmit()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('coinsubmit', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function advertise()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.advertise', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function register()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.register', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function verifypage()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.verifypage', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function login()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.login', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function forget()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.forget', compact('siteLogo', 'siteName', 'footerAdd'));
    }












    public function askotp()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        return view('normalpages.askotp', compact('siteLogo', 'siteName', 'footerAdd'));
    }
}
