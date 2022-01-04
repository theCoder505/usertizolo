@extends('layout.app')

@section('title')
    Usert Profile Page - {{ $siteName }}
@endsection



@section('content')


    <div class="container mb-5">

        <div id="promoteds">

            <a href="/contact" class="righthref">Want your coin here? Contact Us</a>
            <h4 class="yellow">
                Your All Coins
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


                        @if ($userCoins == '')

                            <h1 class="text-center red">
                                You didn't add cany Coin Yet223!...
                            </h1>

                        @else



                            @forelse ($userCoins as $key => $item)


                                <tr>
                                    <th scope="row">
                                        {{ $key + 1 }}
                                        <br>
                                        <i class="far fa-star yellow star" onclick="addtowish({{ $item->id }})"></i>
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
                                        @if ($item->action_status != 'waiting delete')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deleteCoin({{ $item->id }})">
                                                Delete
                                            </button>
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


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModalCenter"
        id="modalClick">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" onclick="reload()">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title font-weight-bold red" id="exampleModalLongTitle">Confirmation</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-light">
                    You request has been taken! Admin will take actions soon!...
                </div>
                <button type="button" class="btn btn-danger my-3" data-dismiss="modal" onclick="reload()">Close</button>
            </div>
        </div>
    </div>



    <script>
        function deleteCoin(deletingId) {

            $.ajax({
                url: "/ask-to-delete-coin",
                type: "POST",
                dataType: "json",
                data: {
                    deletingId: deletingId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response) {
                        console.log(response.resp);
                        $("#modalClick").click();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });


        }
    </script>

    <script>
        $(".account").addClass("activated");
    </script>
@endsection
