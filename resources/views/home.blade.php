@extends('layout.app')

@section('title')
    Todays Best Coins - {{ $siteName }}
@endsection

@section('content')

    @include('homeviews.tillaboutus')
    @include('homeviews.allcoins')
    @include('homeviews.submitsection')
    @include('homeviews.helpsnregister')


    <script>
        $(".home").addClass("activated");
    </script>
@endsection
