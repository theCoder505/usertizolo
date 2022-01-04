@extends('layout.app')

@section('title')
    Change Password
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


                <form action="/updatePwd" method="post">
                    @csrf
                    <h3 class="white mt-3 font-weight-bold"> Update Password </h3>
                    <small class="white mb-3"> Notice this page will expire in 15 minitues. </small>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                            <input type="password" name="firstPassword" class="form-control" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                            <input type="password" name="confirmPassword" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-danger redBg btn-block mt-3" id="submitBtn">Update
                        Password</button>


                </form>



            </article>
        </section>
    </div>

    <script src="{{ asset('assets/javascripts/captcha.js') }}"></script>

@endsection
