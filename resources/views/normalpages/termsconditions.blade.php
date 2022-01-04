@extends('layout.app')

@section('title')
    Terms & Conditions - {{ $siteName }}
@endsection



@section('content')

    <div id="aboutUsPart">
        <div class="termsBgImg white">
            <div class="overlayBg">
                <p class="center_text">
                    <span class="yellow">Terms </span> & <span class="red">Conditions</span>
                </p>
            </div>
        </div>


        <div class="container">
            <div id="aboutComp" class="dim_color">
                <h1 class="font-weight-bold mb-3 white text-center">
                    Terms & Conditions Of {{ env('APP_NAME') }}
                </h1>

                <div class="terms_conditions">
                    {!! html_entity_decode($termsconditions) !!}
                </div>

            </div>
        </div>

    </div>
@endsection
