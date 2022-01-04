    <footer id="footerHolder">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <center>
                        <a href="/">
                            <img src="{{ $siteLogo }}" alt="" class="footerlogo">
                        </a>
                    </center>
                </div>
                <div class="col-12 col-md-4 mx-auto col-lg-4 footer_links">
                    <h4 class="yellow">
                        Our Company
                    </h4>
                    <a href="about-us" class="hreflink">About Us</a>
                    <br>
                    <a href="terms-conditions" class="hreflink">Terms & Conditions</a>
                    <br>
                    <a href="privacy-policy" class="hreflink">Privacy Policy</a>
                </div>
                <div class="col-12 col-md-4 mx-auto col-lg-4 sideBars footer_links">
                    <h4 class="yellow">
                        Help & Support
                    </h4>
                    <a href="/#helps" class="hreflink">Helps</a>
                    <br>
                    <a href="/advertise" class="hreflink">Contact Us</a>
                    <br>
                    <a href="/advertise" class="hreflink">Advertise</a>
                    <br>
                    <a href="www.twitter.com" class="social">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="www.telegram.com" class="social">
                        <i class="fab fa-telegram-plane"></i>
                    </a>
                </div>
                <div class="col-12 col-md-4 mx-auto col-lg-4 footer_links">
                    <h4 class="yellow">
                        Coins
                    </h4>
                    <a href="/chain=all/coin=alltime#particulars" class="hreflink">All Time Rankings</a>
                    <br>
                    <a href="/chain=all/coin=today#particulars" class="hreflink">Daily Ranking</a>
                    <br>
                    <a href="/chain=all/coin=new#particulars" class="hreflink">New Listings</a>
                    <br>
                    <a href="/submit-coin" class="hreflink">Submit Coin</a>
                    <br>
                    <a href="/advertise#updateCoin" class="hreflink">Update Coin</a>
                </div>
            </div>
        </div>

        <hr class="linerow_last">
        <p class="dim_color text-center">
            Copyright © {{ env('APP_NAME') }} - <span class="thisyear"></span> | All Rights Reserved
        </p>
    </footer>


    @if (Cookie::get('advertise'))

    @else


        @forelse ($footerAdd as $item)

            <div id="lastAddSection" class="lastAddSection">
                <span id="crossBtn" onclick="removefooterAdd(20)">X</span>
                <a href="{{ $item->redirectlink }}">

                    @if ($item->rawimage == '')
                        <img src="{{ asset($item->imagelink) }}" alt="" class="footerAdvertise">
                    @else
                        <img src="{{ asset($item->rawimage) }}" alt="" class="footerAdvertise">
                    @endif
                </a>

            @empty
        @endforelse




    @endif




    <script>
        function removefooterAdd(addId) {

            $("#lastAddSection").removeClass("lastAddSection");
            $("#lastAddSection").addClass("d-none");


            $.ajax({
                url: "/remove-footer-add-" + addId,
                type: "GET",
                success: function(response) {
                    if (response) {
                        console.log(response);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
