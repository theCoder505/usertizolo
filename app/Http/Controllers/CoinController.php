<?php

namespace App\Http\Controllers;

use App\Models\CoinModel;
use App\Models\CoinUpdateWait;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CoinController extends Controller
{
    //

    public function coinupload(Request $request)
    {

        $loggerSnNumber = (Cookie::get('usersnNumber'));

        $validate = $request->validate([
            'addProfileImg' => 'required|mimes:jpg,png,jpeg,gif'
        ]);

        if ($validate) {


            $storeLocation = $request->file('addProfileImg')->store('public/coinimages');

            if ($storeLocation) {

                $photoName = explode('/', $storeLocation)[2];
                $host = $_SERVER['HTTP_HOST'];
                $imgLocation = 'http://' . $host . '/storage/coinimages/' . $photoName;

                $addProfileImg = $imgLocation;

                $coinName = $request->coinName;
                $coinSymbol = $request->coinSymbol;
                $network = $request->network;
                $presalePhase = $request->presalePhase;
                $contractAddr = $request->contractAddr;
                $desc = $request->desc;
                $chartLink = $request->chartLink;
                $swapLink = $request->swapLink;
                $webLink = $request->webLink;
                $launchDate = $request->launchDate;
                $telLink = $request->telLink;
                $twitLink = $request->twitLink;
                $discordLink = $request->discordLink;





                $result = CoinModel::insert([
                    'coin_name' => $coinName,
                    'added_user_id' => $loggerSnNumber,
                    'coin_img' => $addProfileImg,
                    'symbol' => $coinSymbol,
                    'network_chain' => $network,
                    'project_phase' => $presalePhase,
                    'contract_addr' => $contractAddr,
                    'description' => $desc,
                    'chart_link' => $chartLink,
                    'swap_link' => $swapLink,
                    'web_link' => $webLink,
                    'launch' => $launchDate,
                    'telegram_link' => $telLink,
                    'twitter_link' => $twitLink,
                    'discord_link' => $discordLink,


                    'marketcap' => '-',
                    'price_usd' => '-',
                    'votes_total' => '0',
                    'watchlist' => '0',
                    'status' => 'normal',
                    'promote_position' => '0'



                ]);


                if ($result) {
                    return redirect('/');
                } else {
                    return Redirect::back()->with('errormsg', 'Could not insert! Try again!...');
                }
            }
        }
    }






    public function fetchCoinDataMethod(Request $request)
    {
        $coinName = $request->coinName;
        $getData = DB::table('coininfos')->where('coin_name', 'LIKE', "%{$coinName}%")->get();
        return response()->json([
            'coinData' => $getData
        ]);
    }





    public function updateCoinMethod($coinId)
    {

        $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
        $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);


        $coinId = substr($coinId, 5);
        $cardData = DB::table('coininfos')->where('id', $coinId)->get();
        if ((Cookie::get('logermail'))) {
            return view('normalpages.updatecoin', compact('cardData', 'coinId', 'siteLogo', 'siteName', 'footerAdd'));
        } else {
            return redirect('/login');
        }
    }




    public function sendToUpdateCoinInfoMethod(Request $request)
    {


        // $loggerType = 'owner';
        $loggerType = ((Cookie::get('loggerType')));

        $postcoinId = $request->coinId;
        $postedFetchedImg = $request->addProfileImg;
        $postcoinName = $request->coinName;
        $postcoinSymbol = $request->coinSymbol;
        $postnetwork = $request->network;
        $postpresalePhase = $request->presalePhase;
        $postcontractAddr = $request->contractAddr;
        $postdesc = $request->desc;
        $postchartLink = $request->chartLink;
        $postswapLink = $request->swapLink;
        $postwebLink = $request->webLink;
        $postlaunchDate = $request->launchDate;
        $posttelLink = $request->telLink;
        $posttwitLink = $request->twitLink;
        $postdiscordLink = $request->discordLink;


        $checkInCoininfo = DB::table('coininfos')->where('id', $postcoinId)->count();

        if ($checkInCoininfo > 0) {


            if (!(empty($postedFetchedImg))) {


                $validate = $request->validate([
                    'addProfileImg' => 'required|mimes:jpg,png,jpeg,gif'
                ]);

                if ($validate) {
                    $storeLocation = $request->file('addProfileImg')->store('public/upcoinimages');
                    if ($storeLocation) {
                        $photoName = explode('/', $storeLocation)[2];
                        $host = $_SERVER['HTTP_HOST'];
                        $imgLocation = 'http://' . $host . '/storage/upcoinimages/' . $photoName;
                        $postaddProfileImg = $imgLocation;
                    } else {
                        return Redirect::back()->with('errormsg', 'Could not send request! Try again!...');
                    }
                } else {
                    return Redirect::back()->with('errormsg', 'Use particular image file [like mimes:jpg, png, jpeg, gif ]!');
                }
            } else {
                $postaddProfileImg = '';
            }



            $insertQuery = CoinUpdateWait::insert([
                'coin_id' => $postcoinId,
                'img' => $postaddProfileImg,
                'name' => $postcoinName,
                'symbol' => $postcoinSymbol,
                'network' => $postnetwork,
                'phase' => $postpresalePhase,
                'contract' => $postcontractAddr,
                'description' => $postdesc,
                'chart' => $postchartLink,
                'swap' => $postswapLink,
                'web' => $postwebLink,
                'launch' => $postlaunchDate,
                'tel' => $posttelLink,
                'twit' => $posttwitLink,
                'discord' => $postdiscordLink,
                'user_type' => $loggerType,
                'status' => 'waiting'
            ]);
            if ($insertQuery) {
                return Redirect::back()->with('successMsg', 'Your request been submitted! Admin will review soon. You\'ll see the coin updated if admin approves! Thanks.');
            } else {
                return Redirect::back()->with('errormsg', 'Could not update! Try again later!...');
            }
        } else {
            return redirect('/');
        }
    }





    public function coinVotingMethod(Request $request)
    {
        $votingCoinId = $request->coinId;
        $pastVotes = DB::table('coininfos')->where('id', $votingCoinId)->value('votes_total');
        $todayAllVotes = DB::table('coininfos')->where('id', $votingCoinId)->value('today_votes');
        $votingDate = DB::table('coininfos')->where('id', $votingCoinId)->value('voting_date');
        $newVote = $pastVotes + 1;

        $todayDate = date('d-m-y');
        if ($todayDate > $votingDate) {
            $todayfinalvotes = 1;
        } else {
            $todayfinalvotes = $todayAllVotes + 1;
        }

        $loggerId = (Cookie::get('usersnNumber'));

        $addVote = DB::table('coininfos')->where('id', $votingCoinId)->update([
            'votes_total' => $newVote,
            'today_votes' => $todayfinalvotes,
            'voting_date' => $todayDate,
        ]);


        if ($addVote) {

            $vote_checker_check = DB::table('vote_checker')->where('user_id', $loggerId)->where('coin_id', $votingCoinId)->count();


            if ($vote_checker_check > 0) {
                DB::table('vote_checker')->where('user_id', $loggerId)->where('coin_id', $votingCoinId)->delete();

                $vote_checkerStore = DB::table('vote_checker')->insert([
                    'user_id' => $loggerId,
                    'coin_id' => $votingCoinId,
                    'time' => time(),
                ]);

                if ($vote_checkerStore) {
                    return response()->json([
                        'resp' => 'added'
                    ]);
                }
            } else {



                $vote_checkerStore = DB::table('vote_checker')->insert([
                    'user_id' => $loggerId,
                    'coin_id' => $votingCoinId,
                    'time' => time(),
                ]);

                if ($vote_checkerStore) {
                    return response()->json([
                        'resp' => 'added'
                    ]);
                }
            }
        }
    }






    public function searchResults($searchname)
    {
        $count = DB::table('coininfos')->where('coin_name', 'LIKE', "%{$searchname}%")->count();
        if ($count > 0) {

            $search = DB::table('coininfos')->where('coin_name', 'LIKE', "%{$searchname}%")
                ->orderBy('votes_total', 'desc')->get();

            if ($search) {
                return response()->json([
                    'resp' => $search
                ]);
            }
        } else {
            return response()->json([
                'resp' => ''
            ]);
        }
    }






    public function checkCaptcha(Request $request)
    {
        $captcha = $request->recaptchaRequest;

        return response()->json([
            'resp' => $captcha,
        ]);
    }
}
