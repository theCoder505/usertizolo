@extends('layout.app')

@section('title')
    About Us - {{ $siteName }}
@endsection




@section('content')

    <div id="aboutUsPart">
        <div class="bgImg white">
            <div class="overlayBg">
                <p class="center_text">
                    <span class="yellow">ABOUT</span> US
                </p>
            </div>
        </div>


        <div class="container">
            <div id="aboutComp" class="white">
                <h1 class="font-weight-bold mb-3 yellow text-center">
                    Terms and Conditions for {{ env('APP_NAME') }}
                </h1>

                <div class="about_us_content">
                    {!! html_entity_decode($about) !!}
                </div>

            </div>
        </div>

    </div>


    <script>
        $(".about").addClass("activated");
    </script>
@endsection
