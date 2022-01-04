<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ParticularCoin extends Controller
{
    //

    public function particular($coinid)
    {



        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $gcaptcha = DB::table('siteinfo')->where('id', '1')->value('google_key');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);






        $selectadd = DB::table('footeradds')->where('add_location', 'otherpages')->get()->random(1);

        $coinid = substr($coinid, 5);
        $coininfoData = DB::table('coininfos')->orderBy('promote_position', 'asc')->where('status', 'promoted')->get();
        $cardData = DB::table('coininfos')->where('id', $coinid)->get();

        $allowVote = 'yes';
        $wishedItem = 'far';

        if ((Cookie::get('logermail'))) {
            $logInfo = "Y";
            $loggerId = (Cookie::get('usersnNumber'));

            $wishlists = DB::table('wishlist')->where('wished_coin_id', $coinid)->where('wisher_id', $loggerId)->count();
            if ($wishlists > 0) {
                $wishedItem = 'fa';
            } else {
                $wishedItem = 'far';
            }

            $vote_checkerVoteCheck = DB::table('vote_checker')->where('coin_id', $coinid)->where('user_id', $loggerId)->count();
            if ($vote_checkerVoteCheck > 0) {
                $checkTime = DB::table('vote_checker')->where('coin_id', $coinid)->where('user_id', $loggerId)->value('time');

                $settedTime = $checkTime + (86400 / 12); // 12 hours 
                $currTime = time();
                if ($currTime > $settedTime) {
                    $allowVote = 'allow';
                } else {
                    $allowVote = 'no';
                }
            }
        } else {
            $logInfo = "n";
            $allowVote = 'no';
        }



        return view('particularcoin', compact('cardData', 'coininfoData', 'logInfo', 'allowVote', 'wishedItem', 'selectadd', 'siteLogo', 'siteName', 'footerAdd', 'gcaptcha'));
    }
}
