@extends('layout.app')


@section('title')
    Request For Coin UPdate - {{ $siteName }}
@endsection



@section('content')

    <div class="container submitCoin">
        <div id="submitHolder">

            <form action="/update-coininfo" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach ($cardData as $item)


                    @if (session()->has('errormsg'))
                        <div class="alert alert-danger text-center">
                            {{ session()->get('errormsg') }}
                        </div>
                    @endif

                    @if (session()->has('successMsg'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('successMsg') }}
                        </div>
                    @endif

                    <h2 class="text-center font-weight-bold red">
                        Send Update Request For "<span class="yellow"> {{ $item->coin_name }} </span>"
                    </h2>
                    <p>Fillup the fields you wanna update about this coin. All Fields are Optional. Simply skip the ones
                        blank those you don't
                        wanna update!...</p>
                    <br>

                    <input type="hidden" value="{{ $coinId }}" name="coinId">

                    <center>
                        <img src="{{ $item->coin_img }}" alt="" id="coinLogo">
                    </center>


                    <div class="mt-3">
                        <label for="addedCoinLogo"> Upload Coin Logo </label><br>
                        <small class="yellow">Use 300 X 300 Image for Logo</small><br>

                        <input type="file" value="" name="addProfileImg" class="" id="addProfileImg"
                            accept="image/" onchange="showProfile(event)">
                        <img src="" alt="" class="d-none imgSizeChecker">
                    </div>



                    <div class="form-group mt-3">
                        <label for="addedCoinName">Coin Name</label>
                        <input type="text" class="form-control" value="" name="coinName" id="addedCoinName"
                            placeholder="Bitcoin">
                    </div>

                    <div class="form-group">
                        <label for="addedcoinSymbol">Symbol</label>
                        <input type="text" class="form-control" value="" name="coinSymbol" id="addedcoinSymbol"
                            placeholder="BTC">
                    </div>

                    <div class="form-group">
                        <label for="addednetwork">Network/Chain</label>
                        <select class="form-control" value="" name="network">
                            <option value="bsc">Binance Smart Chain (BSC)</option>
                            <option value="eth">Ethereum (ETH)</option>
                            <option value="matic">Polygon (MATIC)</option>
                            <option value="trx">Tron (TRX)</option>
                            <option value="ftm">Fantom (FTM)</option>
                            <option value="sol">Solana (SOL)</option>
                            <option value="kcc">Kucoin Chain (KCC)</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <label for="">
                        Project in presale phase?
                    </label>
                    <br>


                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="" name="presalePhase" id="inlineRadio2"
                            value="no">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="yes" name="presalePhase" id="inlineRadio2"
                            value="yes">
                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                    </div>





                    <div class="form-group mt-2">
                        <label for="addedcontractAddr">Contract Address</label>
                        <input type="text" class="form-control" value="" name="contractAddr" id="addedcontractAddr"
                            placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52">
                    </div>


                    <div class="form-group">
                        <label for="descText">Description</label>
                        <textarea class="form-control" value="" name="desc" id="descText" rows="4"></textarea>
                    </div>




                    <div class="form-group">
                        <label for="descText">Custom chart link (optional)</label>
                        <input type="text" class="form-control" value="" name="chartLink" id="addedchartLink"
                            placeholder="https://dex.guru/token/0x....">
                        <small>
                            By default, Poocoin (BSC) and Dextools (ETH) is used. Enter custom chart link here if you want
                            to use it.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="addedswapLink">Custom swap link (optional)</label>
                        <input type="text" class="form-control" value="" name="swapLink" id="addedswapLink"
                            placeholder="https://apeswap.finance/...">
                        <small>
                            By default, PancakeSwap v2 (BSC) and UniSwap (ETH) is used. Enter custom swap link here if you
                            want to use it, like Apeswap.
                        </small>
                    </div>


                    <div class="form-group">
                        <label for="addedwebLink">Website link</label>
                        <input type="text" class="form-control" value="" name="webLink" id="addedwebLink"
                            placeholder="https://goole.com">
                    </div>

                    <div class="form-group">
                        <label for="updateLaunchDate">Launch Date</label>
                        <input type="text" class="form-control" value="" name="launchDate" id="updateLaunchDate">
                    </div>

                    <div class="form-group">
                        <label for="addedtelLink">Telegram link</label>
                        <input type="text" class="form-control" value="" name="telLink" id="addedtelLink"
                            placeholder="https://t.me/coingroup">
                    </div>

                    <div class="form-group">
                        <label for="addedtwitLink">Twitter link</label>
                        <input type="text" class="form-control" value="" name="twitLink" id="addedtwitLink"
                            placeholder="https://twitter.com/coingroup">
                    </div>

                    <div class="form-group">
                        <label for="addeddiscordLink">Discord link</label>
                        <input type="text" class="form-control" value="" name="discordLink" id="addeddiscordLink"
                            placeholder="https://discord.gg/coingroup">
                    </div>


                    <center>
                        <button class="btn px-5 text-white redBg btn-lg btn-block">SUBMIT REQUEST</button>
                    </center>


                @endforeach
            </form>


        </div>
    </div>



@endsection
