    <div class="container submitCoin">
        <div id="submitHolder">

            <form action="/submitnewcoin" method="POST" enctype="multipart/form-data">
                @csrf


                @if (session()->has('errormsg'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('errormsg') }}
                    </div>
                @endif

                <h2 class="text-center font-weight-bold">
                    Submit new coin to {{ env('APP_NAME') }}
                </h2>



                <p class="text-center">
                    Please fill out this form carefully to add a new coin to {{ env('APP_NAME') }}. After submission,
                    your coin
                    will be
                    visible on the
                    New Listings page. Get 500 votes to be officially listed on {{ env('APP_NAME') }}.
                </p>



                <center>
                    <img src="assets/webimages/upimg.png" alt="" id="coinLogo">
                </center>


                <div class="mt-3">
                    <label for="addedCoinLogo"> Upload Coin Logo* </label><br>
                    <small class="yellow">Use 300 X 300 Image for Logo</small><br>

                    <input type="file" name="addProfileImg" class="" id="addProfileImg" accept="image/*"
                        required onchange="showProfile(event)">
                    <img src="" alt="" class="d-none imgSizeChecker">
                </div>



                <div class="form-group mt-3">
                    <label for="addedCoinName">Coin Name*</label>
                    <input type="text" class="form-control" name="coinName" id="addedCoinName" required
                        placeholder="Bitcoin">
                </div>

                <div class="form-group">
                    <label for="addedcoinSymbol">Symbol*</label>
                    <input type="text" class="form-control" name="coinSymbol" id="addedcoinSymbol" required
                        placeholder="BTC">
                </div>

                <div class="form-group">
                    <label for="addednetwork">Network/Chain</label>
                    <select class="form-control" name="network">
                        <option value="bsc" selected="">Binance Smart Chain (BSC)</option>
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
                    Project in presale phase?*
                </label>
                <br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="presalePhase" id="inlineRadio1" value="yes">
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="presalePhase" id="inlineRadio2" value="no"
                        checked>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>




                <div class="form-group mt-2">
                    <label for="addedcontractAddr">Contract Address</label>
                    <input type="text" class="form-control" name="contractAddr" id="addedcontractAddr"
                        placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52">
                </div>


                <div class="form-group">
                    <label for="descText">Description</label>
                    <textarea class="form-control" name="desc" id="descText" rows="4"></textarea>
                </div>




                <div class="form-group">
                    <label for="descText">Custom chart link (optional)</label>
                    <input type="text" class="form-control" name="chartLink" id="addedchartLink"
                        placeholder="https://dex.guru/token/0x....">
                    <small>
                        By default, it's a Bogged website Link
                    </small>
                </div>

                <div class="form-group">
                    <label for="addedswapLink">Custom swap link (optional)</label>
                    <input type="text" class="form-control" name="swapLink" id="addedswapLink"
                        placeholder="https://apeswap.finance/...">
                    <small>
                        By default, it's a PancakeSwap website link.
                    </small>
                </div>


                <div class="form-group">
                    <label for="addedwebLink">Website link*</label>
                    <input type="text" class="form-control" name="webLink" id="addedwebLink"
                        placeholder="https://goole.com" required>
                </div>

                <div class="form-group">
                    <label for="addedlaunchDate">Launch Date*</label>
                    <input type="date" class="form-control" name="launchDate" id="addedlaunchDate" required>
                </div>

                <div class="form-group">
                    <label for="addedtelLink">Telegram link*</label>
                    <input type="text" class="form-control" name="telLink" id="addedtelLink"
                        placeholder="https://t.me/coingroup" required>
                </div>

                <div class="form-group">
                    <label for="addedtwitLink">Twitter link</label>
                    <input type="text" class="form-control" name="twitLink" id="addedtwitLink"
                        placeholder="https://twitter.com/coingroup">
                </div>

                <div class="form-group">
                    <label for="addeddiscordLink">Discord link</label>
                    <input type="text" class="form-control" name="discordLink" id="addeddiscordLink"
                        placeholder="https://discord.gg/coingroup">
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="agree" required>
                    <label class="form-check-label" for="agree">
                        I agree to the <a href="terms-conditions">Terms and Conditions</a>*
                    </label>
                </div>

                <center>
                    <button class="btn px-5 text-white redBg btn-lg btn-block">SUBMIT COIN</button>
                </center>

            </form>


        </div>
    </div>
