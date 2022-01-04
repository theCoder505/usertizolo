<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyPagesController extends Controller
{
    //



    public function aboutUs()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        $about = DB::table('pagetexts')->where('sno', '1')->value('aboutus');
        return view('normalpages.aboutus', compact('about', 'siteLogo', 'siteName', 'footerAdd'));
    }




    public function privacy()
    {
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        $privacy = DB::table('pagetexts')->where('sno', '3')->value('privacypolicy');
        return view('normalpages.privacypolicy', compact('privacy', 'siteLogo', 'siteName', 'footerAdd'));
    }





    public function termsconditions()
    {
        //it's basically terms but by mistake contactus wroten.
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);

        $termsconditions = DB::table('pagetexts')->where('sno', '2')->value('contactus');
        return view('normalpages.termsconditions', compact('termsconditions', 'siteLogo', 'siteName', 'footerAdd'));
    }
}
