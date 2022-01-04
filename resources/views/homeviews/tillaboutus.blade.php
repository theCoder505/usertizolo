    <section id="first_sec">
        <div class="overlayBg">

            <h2 class="center_text">
                <span class="yellow"> BEST </span> <span class="white"> COINS <br>
                    OF CURRENT </span> <span class="yellow"> TIME </span>
            </h2>

        </div>
    </section>


    <section id="sec2" class="container bg-black">

        <!-- best coins today | top 10 coins | promoted  -->

        <div class="row">
            <div class="col-md-6 mx-auto col-lg-4 col-12 line_row py-2">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('assets/webimages/cryptoimg1.jpg') }}" alt="" class="coinimg">
                    </div>
                    <div class="col-8 pt-3 px-2">
                        <h5>Best cryptocurrency Today</h5>
                        <p>
                            You will get the best coins of Today from our site. These are based on trusted user votes
                            and some other stats also!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto col-lg-4 col-12 line_row py-2">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('assets/webimages/crypto2.png') }}" alt="" class="coinimg">
                    </div>
                    <div class="col-8 pt-3 px-2">
                        <h5>Top 10 Best Crypto Coins</h5>
                        <p>
                            Here you will find the 10 best cryptocurrency coins. These are by our trusted user votes and
                            some stats.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto col-lg-4 col-12 line_row py-2">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('assets/webimages/crypto3.jpg') }}" alt="" class="coinimg">
                    </div>
                    <div class="col-8 pt-3 px-2">
                        <h5>Promote The Coin You Like</h5>
                        <p>
                            If our users want's to promote their coins. can do so by contacting us. You can promote the
                            coin you like.
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </section>



    <section id="aboutUs">
        <div class="container">
            <h3 class="about_txt">
                <span class="white">About</span>
                <span class="yellow">Us</span>
            </h3>

            <p class="about_text2">
                This website is all about the best cryptocurrency of current and all time.
            </p>

            <br>

            <div class="row">
                <div class="col-md-5 col-12">
                    <img src="{{ asset('assets/webimages/about.png') }}" alt="" class="about_img">
                </div>
                <div class="col-md-7 col-12">
                    <div class="dim_color">


                        @php
                            $entity = html_entity_decode($about);
                            $string = substr($entity, 0, 500) . "...";
                            echo $string;
                        @endphp


                    </div>
                    <a href="/about-us" id="readMore">Read More</a>
                </div>
            </div>

        </div>
    </section>
