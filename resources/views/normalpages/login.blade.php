@extends('layout.app', ['footer' => false ]);


@section('title')
    User Login Page
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


                <form action="/loginuser" method="post">
                    @csrf
                    <h3 class="white mt-3 font-weight-bold"> Login Now </h3>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
                            <input type="email" name="askingmailaddr" class="form-control" placeholder="Email Address"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                            <input type="password" name="askingpwd" class="form-control" placeholder="Password" required>
                        </div>
                    </div>

                    <small><a href="/forget-password">Forget Password?</a></small>
                    <button type="submit" class="btn text-light redBg btn-block mt-3" id="submitBtn">Submit</button>

                    <small><a href="/sign-up">Don't Have an account? Register now!</a></small>

                </form>



            </article>
        </section>
    </div>

    <script>
        $(".account").addClass("activated");
    </script>


@endsection
