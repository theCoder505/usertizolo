<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WishListController extends Controller
{
    //



    public function addingMethos($wishedCoinId)
    {

        if (Cookie::get('usersnNumber')) {
            $loggerSnNumber = (Cookie::get('usersnNumber'));

            $check = DB::table('wishlist')->where('wished_coin_id', $wishedCoinId)->where('wisher_id', $loggerSnNumber)->count();


            if ($check > 0) {
                $dlt = DB::table('wishlist')->where('wished_coin_id', $wishedCoinId)->where('wisher_id', $loggerSnNumber)->delete();



                if ($dlt) {

                    $oldwishlist = DB::table('coininfos')->where('id', $wishedCoinId)->value('watchlist');
                    if ($oldwishlist != 0) {
                        $newcount = $oldwishlist - 1;
                        $totalwishlist = DB::table('coininfos')->where('id', $wishedCoinId)->update([
                            'watchlist' => $newcount,
                        ]);
                        return Redirect::back()->with('msg', "Coin removed from wishlist successfully!")->with('type', 'alert-info');
                    } else {
                        return Redirect::back()->with('msg', "Coin removed from wishlist successfully!")->with('type', 'alert-info');
                    }
                }
            } else {
                $insert = DB::table('wishlist')->insert([
                    'wished_coin_id' => $wishedCoinId,
                    'wisher_id' => $loggerSnNumber,
                ]);


                if ($insert) {


                    $oldwishlist = DB::table('coininfos')->where('id', $wishedCoinId)->value('watchlist');
                    if ($oldwishlist === 0) {
                        $newcount = 0;
                        // return "NULL wishlist";
                    } else {
                        $newcount = $oldwishlist + 1;
                    }
                    $totalwishlist = DB::table('coininfos')->where('id', $wishedCoinId)->update([
                        'watchlist' => $newcount,
                    ]);



                    if ($totalwishlist) {
                        return Redirect::back()->with('msg', "Coin Been Added To Your Wishlist")->with('type', 'alert-success');
                    } else {
                        return "Failed to add in coininfo";
                    }
                } else {
                    return Redirect::back()->with('msg', "Could not add to Wishlist! Try later")->with('type', 'alert-danger');
                }
            }
        } else {
            return redirect('/login');
        }
    }










    public function wishListPage()
    {
        if (Cookie::get('usersnNumber')) {

            $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
            $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
            $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);


            $userId = (Cookie::get('usersnNumber'));


            $grabwishlist = DB::table('coininfos')->join('wishlist', 'wishlist.wished_coin_id', '=', 'coininfos.id')->where('wisher_id', $userId)->orderBy('serial', 'asc')->get();

            return view('normalpages.wishlistpage', compact('grabwishlist', 'siteLogo', 'siteName', 'footerAdd'));
        } else {
            return redirect('/login');
        }
    }






    public function removeWish($removeId)
    {
        if ((Cookie::get('usersnNumber'))) {
            $check = DB::table('wishlist')->where('serial', $removeId)->count();
            if ($check > 0) {

                $remove = DB::table('wishlist')->where('serial', $removeId)->delete();
                if ($remove) {
                    return Redirect::back()->with('successMsg', 'Coin been removed from watchlist!...');
                } else {
                    return "Could not remove";
                }
            } else {
                return redirect('/wishlist');
            }
        }
    }
}
