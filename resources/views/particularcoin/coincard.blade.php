@if (session()->has('msg'))
    <div class="alert text-center {{ session()->get('type') }}">
        {{ session()->get('msg') }}
    </div>
@endif

@forelse ($cardData as $item)

    <script src="https:www.google.com/recaptcha/api.js" async defer></script>

    <div class="row coin_card_div">

        <div class="col-12 col-md-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-md-2">
                    <img src="{{ asset($item->coin_img) }}" alt="" class="coin_card_img">
                </div>
                <div class="col-12 col-md-8">
                    <h4 class="part_coins_name">
                        <span class="uppercase">
                            {{ $item->coin_name }}
                        </span>

                        <button class="btn btn-dark coin_sign"> ${{ $item->symbol }}</button>

                        @if ($item->coin_mrkt_link)
                            <a href="{{ $item->coin_mrkt_link }}" data-toggle="tooltip" title="View on CoinMarketCap">
                                <img src="{{ asset('assets/webimages/coincap.png') }}" alt="" class="coincap">
                            </a>
                        @endif


                        @if ($item->coin_geko_link)
                            <a href="{{ $item->coin_geko_link }}" data-toggle="tooltip" title="View on CoinGecko">
                                <img src="{{ asset('assets/webimages/coingeko.png') }}" alt="" class="coincap">
                            </a>
                        @endif


                        <a href="wishlist-{{ $item->id }}" data-toggle="tooltip" title="Add / Remove Watchlist">
                            <i class="coincap {{ $wishedItem }} fa-star  yellow"></i>
                        </a>
                    </h4>

                    <b>
                        {{ $item->network_chain }} Contract Address:
                        <span class="d-none showcopytxt yellow">Address Copied*</span>
                    </b>
                    <p class="contract_addr">
                        <span class="contract_addr_txt" id="copyTxt">
                            {{ $item->contract_addr }}
                        </span>
                        <i class="fas fa-copy" id="copyContract" onclick="copyDivToClipboard()"></i>
                    </p>
                </div>
            </div>

            <div class="statusHolders">

                <table class="table white">
                    <tbody>
                        <tr>
                            <td scope="col">Status:</td>
                            <td scope="col">Votes for listing:</td>
                            <td scope="col">Votes:</td>
                            <td scope="col">Votes Today:</td>
                            <td scope="col">Network:</td>
                        </tr>


                        <tr>
                            <td scope="col">
                                <button class="btn btn-success"> {{ $item->status }}</button>
                            </td>
                            <td scope="col">
                                @if ($item->votes_total < 360)
                                    <button class="btn btn-warning"> {{ $item->votes_total }}/360 </button>
                                @else
                                    <button class="btn btn-success"> 360/360 </button>
                                @endif

                            </td>
                            <td scope="col">
                                <button class="btn btn-info" id="ttlvotes">
                                    @if ($item->votes_total == '')
                                        0
                                    @else
                                        {{ $item->votes_total }}
                                    @endif
                                </button>
                            </td>
                            <td scope="col">
                                {{-- yet to add in database --}}
                                <button class="btn btn-info" id="tdyvotes">

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
                            <td scope="col">
                                <button class="btn btn-info uppercase"> {{ $item->network_chain }}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <pre class="descriptions"> {!! html_entity_decode($item->description) !!} </pre>


            <div class="voting_part">
                <h3 class="font-weight-bold red">
                    Vote for <span class="yellow uppercase">{{ $item->coin_name }}</span>
                </h3>
                <p class="white">
                    Vote for <span class="red uppercase">{{ $item->coin_name }}</span> to increase its rank!
                </p>

                <button class="btn btn-lg btn-block text-white redBg d-none" id="thnksforvote" disabled>
                    THANKS FOR YOUR VOTE
                </button>



                @if ($logInfo == 'Y')

                    @if ($allowVote == 'no')
                        <button class="btn btn-lg btn-block text-white redBg" id="thnksforvote" disabled>
                            THANKS FOR YOUR VOTE
                        </button>
                    @else

                        <div id="captchaDiv">
                            <p class="red d-none" id="vryfy">Please Verify You Are Not Robot!...</p>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="field">
                                        <div class="g-recaptcha" id="captchaID" data-sitekey="{{ $gcaptcha }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <button href="/login" class="btn text-white yellowBg mb-4 ml-3 px-4 btn-block"
                                        id="captchaSolve" onclick="voteCoin({{ $item->id }})">
                                        <i class="fas fa-key"></i> VOTE THIS COIN
                                    </button>
                                </div>

                            </div>
                        </div>

                    @endif

                @else

                    <a href="/login" class="btn btn-lg btn-block" id="readMore">
                        AT FIRST LOGIN FOR VOTE
                    </a>

                @endif




                You can vote once in every 12 hours.

                <p class="yellow mt-2">
                    Inform us, if you find any information is incorrect! <a href="/advertise">Click Here</a>
                </p>
            </div>


        </div>

        <div class="col-12 col-md-12 col-lg-4 white">
            <h5>
                Safety Rating
                <span class="badge badge-pill badge-success ml-2">
                    new
                    {{-- yet to come data field --}}
                    {{-- {{ $item->id }} --}}
                </span>
            </h5>
            <p>
                View honeypot check, liquidity info, safety ratings by contract scanners, audits and more on
                ScamSniper.net before
                investing.
            </p>

            <b>
                Popularity
            </b>

            <p class="popularities">
                Watchlists On
                <i class="yellow fa fa-star"></i>
                <span class="btn btn-sm btn-dark mx-2">
                    {{ $item->watchlist }}
                </span>
                watchlists
            </p>

            <b>
                Token Value
            </b>


            <table class="table white tokenvalue">
                <tbody>
                    <tr>
                        <td>Marketcap</td>
                        <td>$ {{ $item->marketcap }}</td>
                    </tr>
                    <tr>
                        <td>Price (USD)</td>
                        <td>$ {{ $item->price_usd }}</td>
                    </tr>
                    <tr>
                        <td>Price (BNB)</td>
                        <td>
                            @php
                                if ($item->price_usd != '-') {
                                    echo 517.95 * $item->price_usd;
                                } else {
                                    echo $item->price_usd;
                                }
                            @endphp
                            BNB
                        </td>
                    </tr>
                </tbody>
            </table>



            <div class="socialLinks">
                <b>
                    Social Links
                </b>

                <br>
                <a href="{{ $item->web_link }}" target="_blank" class="btn btn-warning white yellowBg m-1"><i
                        class="fa fa-globe"></i>
                    Visit
                    Website</a><br>
                <a href="{{ $item->telegram_link }}" target="_blank" class="btn btn-warning white yellowBg m-1"><i
                        class="fab fa-telegram"></i>
                    Join Telegram</a><br>
                <a href="{{ $item->twitter_link }}" target="_blank" class="btn btn-warning white yellowBg m-1"><i
                        class="fab fa-twitter"></i> Follow
                    Twitter</a>
            </div>


            <div class="charts mt-4">
                <b>
                    Charts / Prices
                </b>
                <br>

                <a href="{{ $item->coin_mrkt_link }}" class="btn btn-light coinbtn">
                    <img src="{{ asset('assets/webimages/coincap-black.png') }}" alt="" class="lightbtn">
                    CoinMarketCap
                </a>
                <a href="{{ $item->coin_geko_link }}" class="btn btn-light coinbtn">
                    <img src="{{ asset('assets/webimages/coingeko.png') }}" alt="" class="lightbtn">
                    CoinGeko
                </a>
                {{-- yet to add --}}
                <a href="{{ $item->poo_coin }}" class="btn btn-light coinbtn">
                    <img src="{{ asset('assets/webimages/poocoin.png') }}" alt="" class="lightbtn">
                    PooCoin
                </a>
                {{-- yet to add --}}
                <a href="{{ $item->chart_link }}" class="btn btn-light coinbtn">
                    <img src="{{ asset('assets/webimages/bogged.png') }}" alt="" class="lightbtn">
                    Bogged
                </a>
            </div>


            <div class="buynow mt-4">
                <b>
                    Buy Now
                </b>
                <br>

                {{-- yet to add --}}
                <a href="{{ $item->swap_link }}" class="btn btn-light coinbtn">
                    <img src="{{ asset('assets/webimages/pancakeswap.png') }}" alt="" class="lightbtn">
                    PancakeSwap
                </a>
                {{-- yet to add --}}
                <a href="{{ $item->flooz_trade }}" class="btn text-white redBg coinbtn white">
                    <img src="{{ asset('assets/webimages/flooz.gif') }}" alt="" class="lightbtn">
                    Flooz.Trade
                </a>
            </div>



            <div class="informations mt-4">
                <b>
                    Information
                </b>

                <table class="table white tokenvalue">
                    <tbody>
                        <tr>
                            <td>Added</td>

                            <td>
                                @php
                                    $stringTime = $item->time;
                                    $date = date('d F, Y', strtotime($stringTime));
                                    echo $date;
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td>Launch </td>
                            <td>
                                @php
                                    $stringTime = $item->launch;
                                    $date = date('d F, Y', strtotime($stringTime));
                                    echo $date;
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script>
        function voteCoin(votingId) {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                $("#vryfy").removeClass("d-none");
                return false;
            } else {
                $.ajax({
                    url: "/vote-coin",
                    type: "POST",
                    dataType: "json",
                    data: {
                        coinId: votingId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response) {
                            console.log(response.resp);
                            grecaptcha.reset();
                            $("#vryfy").removeClass("d-none");
                            $("#captchaDiv").addClass("d-none");
                            $("#thnksforvote").removeClass("d-none");

                            var ttlvotesData = $("#ttlvotes").html();
                            var ttlvoteNumber = Number(ttlvotesData);
                            $("#ttlvotes").html(ttlvoteNumber + 1);


                            var tdyvotesData = $("#tdyvotes").html();
                            var tdayvoteNumber = Number(tdyvotesData);
                            $("#tdyvotes").html(tdayvoteNumber + 1);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }
        }
    </script>

@empty

@endforelse
