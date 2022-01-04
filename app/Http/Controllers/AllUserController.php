<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AllUserController extends Controller
{
    //

    public function addnewuser(Request $request)
    {

        $datauserName = $request->userName;
        $datamailAddr = $request->mailAddr;
        $datausertype = $request->usertype;
        $datafirstPassword = $request->firstPassword;
        $dataconfirmPassword = $request->confirmPassword;

        if ($datafirstPassword != $dataconfirmPassword) {
            return redirect()->back()->with('message', 'Passwords Didn\'t matched! Try Again...');
        } else {

            $hashedPwd = bcrypt($datafirstPassword);
            $varificationUrl = $datauserName . " -> " . time() . " -> " . $datamailAddr . " -> " . rand(0000, 9999);
            $base64Url = base64_encode($varificationUrl);
            $base64UserMail = base64_encode($datamailAddr);
            //


            $checkMailAvailablty = DB::table('user_data')->where('user_email', $datamailAddr)->count();
            if ($checkMailAvailablty > 0) {
                return redirect()->back()->with('message', 'Mail already exits!! Try with another mail please!...');
            } else {


                // $sendmail now, if sent then add to database | else send
                // return redirect()->back()->with('message', 'Could not add user! Try again Later...');
                $sendUrl = "http://" . $_SERVER['HTTP_HOST'] . "/verify-mail/" . $base64UserMail . "/" . $base64Url;


                //mail part start
                $data = ['name' => 'Vishal Sharma', 'theLink' => $sendUrl];
                $user['to'] = $datamailAddr;
                Mail::send('mail', $data, function ($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject((env('APP_NAME')) . " User account verification");
                });
                //mail part ends



                $adduser = userModel::insert([
                    'user_name' => $datauserName,
                    'user_email' => $datamailAddr,
                    'user_type' => $datausertype,
                    'user_password' => $hashedPwd,
                    'varification_status' => '0',
                    'verification_url' => $base64Url
                ]);

                if ($adduser) {
                    return redirect('/mail-verification');
                } else {
                    return redirect()->back()->with('message', 'Could not add user! Try again Later...');
                }
            }
        }
    }





    public function verifymail($user64mail, $base64url)
    {

        $usermailaddr = base64_decode($user64mail);
        $verify = DB::table('user_data')->where('user_email', $usermailaddr)->where('verification_url', $base64url)->count();

        if ($verify > 0) {
            $updateVerification = DB::table('user_data')->where('user_email', $usermailaddr)->where('verification_url', $base64url)->update([
                'varification_status' => 'verified'
            ]);

            $userId = DB::table('user_data')->where('user_email', $usermailaddr)->value('id');
            $userType = DB::table('user_data')->where('user_email', $usermailaddr)->value('user_type');
            $minutes = 60 * 24;
            Cookie::queue('logermail', $usermailaddr, $minutes);
            Cookie::queue('usersnNumber', $userId, $minutes);
            Cookie::queue('loggerType', $userType, $minutes);

            // mail verified now sending this notification
            return redirect('/mail-verification')->with('verifiedmsg', 'mail verified');
        } else {

            $delete = DB::table('user_data')->where('user_email', $usermailaddr)->delete();
            if ($delete) {
                return redirect('/sign-up')->with('message', 'Could not verify mail! Please try again. We will send you a new mail for verification!...');
            }
        }
    }



    public function userloginmethod(Request $request)
    {
        $useraskingmailaddr = $request->askingmailaddr;
        $useraskingpwd = $request->askingpwd;
        $checkuser = DB::table('user_data')->where('user_email', $useraskingmailaddr)->count();

        if ($checkuser > 0) {

            $dbPwd = DB::table('user_data')->where('user_email', $useraskingmailaddr)->value('user_password');
            $userId = DB::table('user_data')->where('user_email', $useraskingmailaddr)->value('id');
            $userType = DB::table('user_data')->where('user_email', $useraskingmailaddr)->value('user_type');
            $status = DB::table('user_data')->where('user_email', $useraskingmailaddr)->value('varification_status');

            if ($status == 'verified') {
                $pwdMatch = password_verify($useraskingpwd, $dbPwd);
                if ($pwdMatch) {

                    $minutes = 60 * 24;
                    Cookie::queue('logermail', $useraskingmailaddr, $minutes);
                    Cookie::queue('usersnNumber', $userId, $minutes);
                    Cookie::queue('loggerType', $userType, $minutes);

                    return redirect('/');
                } else {
                    return redirect('/login')->with('message', 'Password did not match! Try again!...');
                }
            } else {
                return redirect('/login')->with('message', 'Your account not verified yet! Please verify and try again!...');
            }
        } else {
            return redirect('/login')->with('message', 'Email did not match! Try with exact one!...');
        }
    }




    public function logoutmethod()
    {
        if ((Cookie::get('logermail')) &&  (Cookie::get('usersnNumber')) && (Cookie::get('loggerType'))) {
            Cookie::queue(Cookie::forget('logermail'));
            Cookie::queue(Cookie::forget('usersnNumber'));
            Cookie::queue(Cookie::forget('loggerType'));
        }
        return redirect('/');
    }




    public function otpSendMethod(Request $request)
    {
        $randomOtp = rand(000000, 999999);
        $requestedMail = $request->askingmailaddr;

        $count = DB::table('user_data')->where('user_email', $requestedMail)->count();

        if ($count > 0) {


            //mail part start
            $data = ['name' => 'Vishal Sharma', 'theotp' => $randomOtp];
            $user['to'] = $requestedMail;
            Mail::send('otpmail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("OTP from " . (env('APP_NAME')));
            });
            //mail part ends

            // now send mail, if sent then upload otp in database! 
            $updateOtp = DB::table('user_data')->where('user_email', $requestedMail)->update([
                'otp' => $randomOtp
            ]);

            if ($updateOtp) {

                return redirect('/otp-page?mailer=' . $requestedMail);
            }
        } else {
            return redirect('/forget-password')->with('message', 'Didn\'t find email! Use the exact email!...');
        }
    }




    public function checkotpMethod(Request $request)
    {
        $sentOtp = $request->askingOTP;
        $theMailer = $request->mailer;

        $check = DB::table('user_data')->where('user_email', $theMailer)->where('otp', $sentOtp)->count();
        if ($check > 0) {

            $minutes = 15;
            Cookie::queue('frgtusersmail', $theMailer, $minutes);
            return redirect('/update-password');
        } else {
            return Redirect::back()->with('message', 'OTP did not matched! Try again!...');
        }
    }




    public function checkCookies()
    {

        if ((Cookie::get('frgtusersmail'))) {

            $siteLogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
            $siteName = DB::table('siteinfo')->where('id', '1')->value('sitename');
            $footerAdd = DB::table('footeradds')->where('add_location', 'footeradd')->get()->random(1);


            return view('normalpages.changepassword', compact('siteLogo', 'siteName', 'footerAdd'));
        } else {
            return redirect('/forget-password')->with('message', 'Page Expired! Try again... ');
        }
    }






    public function updatePasswordMethod(Request $request)
    {
        $reqfirstPassword = $request->firstPassword;
        $reqconfirmPassword = $request->confirmPassword;

        if ($reqfirstPassword != $reqconfirmPassword) {
            return Redirect::back()->with('message', 'The two password are not same! Check again');
        } else {


            $mailer = (Cookie::get('frgtusersmail'));
            $bcrypted = bcrypt($reqfirstPassword);
            $updatePwd = DB::table('user_data')->where('user_email', $mailer)->update(['user_password' => $bcrypted]);

            if ($updatePwd) {
                if ((Cookie::get('logermail')) &&  (Cookie::get('usersnNumber') && (Cookie::get('loggerType')))) {
                    Cookie::queue(Cookie::forget('logermail'));
                    Cookie::queue(Cookie::forget('usersnNumber'));
                    Cookie::queue(Cookie::forget('loggerType'));
                }


                $userId = DB::table('user_data')->where('user_email', $mailer)->value('id');
                $userType = DB::table('user_data')->where('user_email', $mailer)->value('user_type');
                $minutes = 60 * 24;
                Cookie::queue('logermail', $mailer, $minutes);
                Cookie::queue('usersnNumber', $userId, $minutes);
                Cookie::queue('loggerType', $userType, $minutes);

                return redirect('/');
            }
        }
    }
}
