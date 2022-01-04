@extends('layout.app')

@section('content')

    <div class="container py-3 coin_details_holder">
        @include('particularcoin.addspart')
        @include('particularcoin.coincard')
    </div>


    <div class="coin_table_holder my-5">
        @include('homeviews.coinparts.promoteds')
    </div>

@endsection
