@extends('layout.app')

@section('title')
    OTP Asking Page
@endsection



@section('content')


    <link rel="stylesheet" href="{{ asset('assets/styles/sign-up.css') }}">

    <div class="col-md-8 col-md-offset-8 col-lg-4 col-lg-offset-4" id="login">
        <section id="inner-wrapper" class="login">
            <article>


                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif


                <form action="/checkotp" method="post">
                    @csrf
                    <h3 class="white mt-3 font-weight-bold"> Forgot Password </h3>
                    <small class="yellow">Provide the 6 digit OTP we sent to your email.</small>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                            <input type="text" name="askingOTP" maxlength="6" class="form-control"
                                placeholder="6 Digit OTP" required>
                        </div>
                    </div>


                    @isset($_GET['mailer'])
                        <input type="hidden" name="mailer" value="{{ $_GET['mailer'] }}">
                    @endisset



                    <button type="submit" class="btn btn-danger redBg btn-block mt-3" id="submitBtn">Check otp</button>

                    <small><a href="/sign-up">Don't Have an account? Register now!</a></small>

                </form>



            </article>
        </section>
    </div>

    <script src="{{ asset('assets/javascripts/captcha.js') }}"></script>

@endsection
