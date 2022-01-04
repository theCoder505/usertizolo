@extends('layout.app')


@section('title')
    Create A New Account
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


                <form action="/addnewuser" method="post">
                    @csrf
                    <h3 class="white mt-3 font-weight-bold"> Register Now </h3>
                    <small class="white mb-3"> We will send you a mail for verification. </small>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                            <input type="text" name="userName" class="form-control" placeholder="Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
                            <input type="email" name="mailAddr" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <small class="yellow"> Select User Type: </small>
                        <select class="form-control" name="usertype" required>
                            <option value="voter" selected>Voter</option>
                            <option value="influencer">Influencer</option>
                            <option value="owner">Coin Owner</option>
                        </select>
                    </div>


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


                    <div class="captcha_processing">
                        <div class="wrapper">
                            <div class="captcha-area">
                                <div class="captcha-img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSY12-wtq21-cjiWRbx7hFaYDSdtzom8HJTLA&usqp=CAU"
                                        alt="Captch Background">
                                    <span class="captcha"></span>
                                </div>
                                <div class="reload-btn"><i class="fas fa-redo-alt"></i></div>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="checkCaptcha" placeholder="Enter captcha"
                                    maxlength="6" spellcheck="false" required>
                            </div>
                            <div class="status-text"></div>
                        </div>
                    </div>


                    <button type="submit" class="btn text-light redBg btn-block mt-3" id="submitBtn"
                        disabled="true">Submit</button>

                    <small><a href="/login">Already Have an account? Login now!</a></small>

                </form>



            </article>
        </section>
    </div>


    <script>
        $(".account").addClass("activated");
    </script>
    <script src="{{ asset('assets/javascripts/captcha.js') }}"></script>

@endsection
