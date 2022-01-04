@extends('layout.app')


@section('title')
    Privacy & Policy - {{ $siteName }}
@endsection


@section('content')

    <div id="aboutUsPart">
        <div class="privacyPolicybgImg white">
            <div class="overlayBg">
                <p class="center_text">
                    <span class="yellow">Privacy</span> Policy
                </p>
            </div>
        </div>


        <div class="container">
            <div id="aboutComp" class="white">
                <h1 class="font-weight-bold mb-3 yellow text-center">
                    Privacy Policy of {{ env('APP_NAME') }}
                </h1>

                <div class="privacy_policy_content">
                    {!! html_entity_decode($privacy) !!}
                </div>

            </div>
        </div>

    </div>
@endsection
