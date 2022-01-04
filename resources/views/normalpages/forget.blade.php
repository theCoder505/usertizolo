@extends('layout.app')

@section('title')
    Forgewt Password Page
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


                <form action="/sendotpinmail" method="post">
                    @csrf
                    <h3 class="white mt-3 font-weight-bold"> Forgot Password </h3>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
                            <input type="email" name="askingmailaddr" class="form-control" placeholder="Email Address"
                                required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger redBg btn-block mt-3" id="submitBtn">send otp</button>

                    <small><a href="/sign-up">Don't Have an account? Register now!</a></small>

                </form>



            </article>
        </section>
    </div>

    <script src="{{ asset('assets/javascripts/captcha.js') }}"></script>

@endsection
