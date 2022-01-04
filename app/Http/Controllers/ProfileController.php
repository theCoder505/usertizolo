<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //


    public function showprofile()
    {

        if ((Cookie::get('logermail'))) {

            $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
            $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
            $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);


            $userId = (Cookie::get('usersnNumber'));

            $count = DB::table('coininfos')->where('added_user_id', $userId)->count();
            if ($count > 0) {
                $userCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->where('added_user_id', $userId)->get();
            } else {
                $userCoins = '';
            }


            return view('normalpages.profile', compact('userCoins', 'siteLogo', 'siteName', 'footerAdd'));
        } else {
            return redirect('/login');
        }
    }




    public function deleteMethod(Request $request)
    {

        $deletingId = $request->deletingId;
        $dlt = DB::table('coininfos')->where('id', $deletingId)->update([
            'action_status' => 'waiting delete'
        ]);
        if ($dlt) {
            return response()->json([
                'resp' => 'deleted'
            ]);
        }
    }
}
