<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CompanyPagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticularCoin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimpleControllers;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', [HomeController::class, 'index']);

Route::get('/chain={chaindata}/coin={coindata}', [HomeController::class, 'coinChainControl']);

Route::get('/submit-coin', [SimpleControllers::class, 'coinsubmit'])->middleware('checkuserTypeNLogin');


Route::get('/coin-number-{coinid}', [ParticularCoin::class, 'particular']);


Route::get('/about-us', [CompanyPagesController::class, 'aboutUs']);

Route::get('/privacy-policy', [CompanyPagesController::class, 'privacy']);

Route::get('/terms-conditions', [CompanyPagesController::class, 'termsconditions']);

Route::get('/advertise', [SimpleControllers::class, 'advertise']);



Route::get('/sign-up', [SimpleControllers::class, 'register']);


Route::get('/verify-mail/{user64mail}/{base64url}', [AllUserController::class, 'verifymail']);

Route::get('/mail-verification', [SimpleControllers::class, 'verifypage']);


Route::get('/login', [SimpleControllers::class, 'login']);

Route::get('/forget-password', [SimpleControllers::class, 'forget']);

Route::get('/otp-page', [SimpleControllers::class, 'askotp']);


Route::get('/profile', [ProfileController::class, 'showprofile']);


Route::get('/update-coin-{coinId}', [CoinController::class, 'updateCoinMethod']);



Route::get('/update-password', [AllUserController::class, 'checkCookies']);


Route::get('/logout', [AllUserController::class, 'logoutmethod']);


Route::get('/search-results-{searchname}', [CoinController::class, 'searchResults']);

Route::get('/wishlist-{wishedCoinId}', [WishListController::class, 'addingMethos']);

Route::get('/wishlist', [WishListController::class, 'wishListPage']);

Route::get('/remove-wishlist-{removeId}', [WishListController::class, 'removeWish']);





Route::get('/remove-footer-add-{addId}', [HomeController::class, 'removeFooterAdd']);



// post routes 
Route::post('/submitnewcoin', [CoinController::class, 'coinupload']);

Route::post('/addnewuser', [AllUserController::class, 'addnewuser']);

Route::post('/loginuser', [AllUserController::class, 'userloginmethod']);

Route::post('/sendotpinmail', [AllUserController::class, 'otpSendMethod']);

Route::post('/checkotp', [AllUserController::class, 'checkotpMethod']);

Route::post('/updatePwd', [AllUserController::class, 'updatePasswordMethod']);

Route::post('/coindata-ftech-request', [CoinController::class, 'fetchCoinDataMethod']);

Route::post('/update-coininfo', [CoinController::class, 'sendToUpdateCoinInfoMethod']);

Route::post('/vote-coin', [CoinController::class, 'coinVotingMethod']);

Route::post('/ask-to-delete-coin', [ProfileController::class, 'deleteMethod']);

Route::post('/grecaptcha-check', [CoinController::class, 'checkCaptcha']);
























Route::get('/cache', function(){
   Artisan::call('cache:clear');
});


Route::get('/storage', function(){
   Artisan::call('storage:link');
});


Route::get('/config', function(){
   Artisan::call('config:cache');
});










