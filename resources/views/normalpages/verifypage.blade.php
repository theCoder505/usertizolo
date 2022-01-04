@extends('layout.app')

@section('title')
    Mail Verified Page - {{ $siteName }}
@endsection



@section('content')


    <div class="container">
        <center>
            @if (!session()->has('verifiedmsg'))
                <h2 class="mt-3 text-info font-weigth-bold text-center">
                    We've sent you an email. Please click the link in the mail to verify!...
                </h2>
            @endif


            <div id="mailImgHolder">

                @if (session()->has('verifiedmsg'))
                    <div class="alert alert-success mt-4">
                        <img src="{{ asset('assets/webimages/right.png') }}" alt="" id="rightImg">
                        Email has been verified! You are a verified user now!...
                        <br>
                        <a href="/" class="btn btn-primary px-3">Go To Homepage</a>
                    </div>
                @endif

                <img src="{{ asset('assets/webimages/mailsent.png') }}" alt="" id="mailSent" class="my-5">
            </div>
        </center>
    </div>

@endsection
