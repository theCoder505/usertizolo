<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);





        $todayDate = date('d-m-y');

        $coininfoData = DB::table('coininfos')->orderBy('promote_position', 'asc')->where('status', 'promoted')->get();
        $votesData = DB::table('coininfos')->orderBy('votes_total', 'desc')->limit(10)->get();
        $helptexts = DB::table('pagetexts')->where('sno', '4')->value('helptexts');
        $about = DB::table('pagetexts')->where('sno', '1')->value('aboutus');

        $selectadd = DB::table('footeradds')->where('add_location', 'otherpages')->get()->random(1);


        $chaindata = 'all';
        $coindata = 'today';


        $listedCoins = DB::table('coininfos')->orderBy('today_votes', 'desc')->where('voting_date', $todayDate)->paginate(10);
        $getinfluencers = DB::table('user_data')->where('user_type', 'influencer')->where('varification_status', 'verified')->orderBy('influencer_pos', 'asc')->get();

        return view('home', compact('coininfoData', 'votesData', 'listedCoins', 'chaindata', 'coindata', 'getinfluencers', 'helptexts', 'about', 'selectadd', 'footerAdd', 'siteLogo', 'siteName'));
    }











    public function coinChainControl($chaindata, $coindata)
    {

        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);



        $todayDate = date("d-m-y");


        $coininfoData = DB::table('coininfos')->orderBy('promote_position', 'asc')->where('status', 'promoted')->get();
        $votesData = DB::table('coininfos')->orderBy('votes_total', 'desc')->get();
        $getinfluencers = DB::table('user_data')->where('user_type', 'influencer')->where('varification_status', 'verified')->orderBy('influencer_pos', 'asc')->get();
        $helptexts = DB::table('pagetexts')->where('sno', '4')->value('helptexts');
        $about = DB::table('pagetexts')->where('sno', '1')->value('aboutus');
        $selectadd = DB::table('footeradds')->where('add_location', 'otherpages')->get()->random(1);



        if ($chaindata == 'all') {




            if ($coindata == 'today') {
                $listedCoins = DB::table('coininfos')->orderBy('today_votes', 'desc')->where('voting_date', $todayDate)->paginate(10);
            }
            if ($coindata == 'alltime') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->paginate(10);
            }
            if ($coindata == 'new') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('votes_total', '<=', 360)->paginate(10);
            }
            if ($coindata == 'marketcap') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->paginate(10);
            }
            if ($coindata == 'presales') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('project_phase', 'yes')->paginate(10);
            }
        } else {



            // $listedCoins = DB::table('coininfos')->orderBy('today_votes', 'desc')->where('network_chain', $chaindata)->where('voting_date', $todayDate)->paginate(10);




            if ($coindata == 'today') {
                $listedCoins = DB::table('coininfos')->orderBy('today_votes', 'desc')->where('network_chain', $chaindata)->where('voting_date', $todayDate)->paginate(10);
            }
            if ($coindata == 'alltime') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('network_chain', $chaindata)->paginate(10);
            }
            if ($coindata == 'new') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('network_chain', $chaindata)->where('votes_total', '>=', 360)->paginate(10);
            }
            if ($coindata == 'marketcap') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('network_chain', $chaindata)->paginate(10);
            }
            if ($coindata == 'presales') {
                $listedCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('network_chain', $chaindata)->where('project_phase', 'yes')->paginate(10);
            }
        }


        // now coindata validation 
        // today | alltime | new | marketcap | presales | 



        return view('home', compact('coininfoData', 'votesData', 'listedCoins', 'chaindata', 'coindata', 'getinfluencers', 'helptexts', 'about', 'selectadd', 'siteLogo', 'siteName', 'footerAdd'));
    }










    public function removeFooterAdd($addId)
    {
        $getCookieTime = DB::table('footeradds')->where('sno', $addId)->value('cookietime');
        Cookie::queue('advertise', 'footeradd', $getCookieTime);
        return 'success';
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
