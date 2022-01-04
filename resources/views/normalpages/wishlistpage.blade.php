@extends('layout.app')

@section('title')
    Users Wishlist - {{ $siteName }}
@endsection



@section('content')

    <div class="container mb-5">

        <div id="promoteds">

            <a href="/contact" class="righthref">Want your coin here? Contact Us</a>
            <h4 class="yellow">
                All Coins of your wishlist
            </h4>

            <div id="tableScroller" class="desk_only">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Chain</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Launch</th>
                            <th scope="col">Total Votes</th>
                            <th scope="col">Todays Votes</th>
                            <th scope="col">Vote</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @if ($grabwishlist == '')

                            <h1 class="text-center red">
                                You didn't add cany Coin Yet!...
                            </h1>

                        @else



                            @forelse ($grabwishlist as $key => $item)


                                <tr>
                                    <th scope="row">
                                        {{ $key + 1 }}
                                        <br>
                                        <i class="fa fa-star yellow"></i>
                                    </th>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="{{ asset($item->coin_img) }}" alt="" class="tableImg">
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <img src="{{ asset('assets/webimages/coincap.png') }}" alt=""
                                                            class="table_sec_img"
                                                            onclick="coinmarket('{{ $item->coin_mrkt_link }}')">
                                                    </div>
                                                    <div class="col-12">
                                                        <img src="{{ asset('assets/webimages/coingeko.png') }}" alt=""
                                                            class="table_sec_img"
                                                            onclick="coingeko('{{ $item->coin_geko_link }}')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $item->coin_name }}</td>
                                    <td>
                                        <button
                                            class="btn btn-warning btn-sm uppercase">{{ $item->network_chain }}</button>
                                    </td>
                                    <td>{{ $item->symbol }}</td>
                                    <td>{{ $item->launch }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">
                                            {{ $item->votes_total }}
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm">
                                            @if ($item->today_votes == '')
                                                0
                                            @else
                                                @if (date('d-m-y') == $item->voting_date)
                                                    {{ $item->today_votes }}
                                                @else
                                                    0
                                                @endif
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" onclick="sendto(11015{{ $item->id }})">
                                            View Coin
                                        </button>
                                    </td>
                                    <td>
                                        @if ($item->action_status == '')
                                            <a href="/remove-wishlist-{{ $item->serial }}" class="btn btn-danger btn-sm">
                                                Remove
                                            </a>
                                        @else
                                            <button class="btn btn-danger btn-sm" disabled>
                                                {{ $item->action_status }}
                                            </button>
                                        @endif

                                    </td>
                                </tr>

                            @empty
                                <h1 class="text-center red">
                                    You didn't add cany Coin Yet!...
                                </h1>
                            @endforelse

                        @endif

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script>
        $(".account").addClass("activated");
    </script>

@endsection
