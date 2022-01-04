<div id="particulars">

    <h4 class="yellow">
        Choose Your Particular Coin
    </h4>

    <div class="mb-3">
        <h5 class="white font-weight-bold">
            Select Chain:
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-2 mb-2 mx-md-auto" data-id="all">ALL</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="bsc">BSC</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="eth">ETH</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="matic">MATIC</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="trx">TRX</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="ftm">FTM</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto" data-id="kcc">KCC</button>
            <button class="cmn_chain_btn btn btn-outline-info px-4 m-lg-1 mb-2 mx-md-auto"
                data-id="other">OTHER</button>
        </h5>

        <h1 class="text-center yellow down_arrow">
            &#8675;
        </h1>

        <h5 class="red font-weight-bold">
            Select Coin:
            <button class="btn cmn_coin_btn btn-outline-light px-lg-3 coinslctbtn m-lg-2 mb-2 mx-md-auto"
                data-id="today">
                <i class="fas fa-clock" aria-hidden="true"></i>
                TODAY
            </button>
            <button class="btn cmn_coin_btn btn-outline-light px-lg-3 coinslctbtn m-lg-2 mb-2 mx-md-auto"
                data-id="alltime">
                <i class="fas fa-fire" aria-hidden="true"></i>
                ALL TIME
            </button>
            <button class="btn cmn_coin_btn btn-outline-light px-lg-3 coinslctbtn m-lg-2 mb-2 mx-md-auto" data-id="new">
                <i class="fas fa-plus" aria-hidden="true"></i>
                NEW
            </button>
            <button class="btn cmn_coin_btn btn-outline-light px-lg-3 coinslctbtn m-lg-2 mb-2 mx-md-auto"
                data-id="marketcap">
                <i class="fas fa-coins" aria-hidden="true"></i>
                MARKETCAP
            </button>
            <button class="btn cmn_coin_btn btn-outline-light px-lg-3 coinslctbtn m-lg-2 mb-2 mx-md-auto"
                data-id="presales">
                <i class="fas fa-stopwatch" aria-hidden="true"></i>
                PRESALES
            </button>
        </h5>
    </div>


    <div id="tableScroller" class="desk_only">

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Chain</th>
                    <th scope="col">Symbol</th>
                    <th scope="col">Market Cap</th>
                    <th scope="col">Price</th>
                    <th scope="col">Launch</th>
                    <th scope="col">Votes</th>
                    <th scope="col">Vote</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($listedCoins as $key => $listed)

                    <tr>
                        <th scope="row">
                            {{ $key + 1 }}
                            <br>
                            {{-- <i class="far fa-star yellow star" onclick="addtowish({{ $listed->id }})"></i> --}}
                        </th>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset($listed->coin_img) }}" alt="" class="tableImg">
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('assets/webimages/coincap.png') }}" alt=""
                                                class="table_sec_img"
                                                onclick="coinmarket('{{ $listed->coin_mrkt_link }}')">
                                        </div>
                                        <div class="col-12">
                                            <img src="{{ asset('assets/webimages/coingeko.png') }}" alt=""
                                                class="table_sec_img"
                                                onclick="coingeko('{{ $listed->coin_geko_link }}')">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>{{ $listed->coin_name }}</td>
                        <td>
                            <button class="btn btn-success redBg uppercase">{{ $listed->network_chain }}</button>
                        </td>
                        <td>{{ $listed->symbol }}</td>
                        <td>$ {{ $listed->marketcap }}</td>
                        <td>$ {{ $listed->price_usd }}</td>
                        <td>{{ $listed->launch }}</td>
                        <td>
                            <button class="btn btn-info">
                                {{ $listed->votes_total }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" onclick="sendto(11015{{ $listed->id }})">
                                Vote
                            </button>
                        </td>
                    </tr>

                @empty
                    <h1 class="red text-center"> No Results Found... </h1>
                @endforelse

            </tbody>
        </table>

        <div id="paginationsAll" class="mt-4">
            <div class="d-flex justify-content-center">
                {{ $listedCoins->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>



</div>


<script>
    // add class at urlDataId data-id 
    var urlDataId = "{{ $chaindata }}";
    $('.cmn_chain_btn').removeClass('btn-info');
    $('.cmn_chain_btn[data-id=' + urlDataId + ']').addClass('btn-info');


    var urlCoinDataId = "{{ $coindata }}";
    $('.cmn_coin_btn').removeClass('btn-light');
    $('.cmn_coin_btn[data-id=' + urlCoinDataId + ']').addClass('btn-light');
</script>
