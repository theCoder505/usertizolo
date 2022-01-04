@extends('layout.app')


@section('title')
    Advertise / Contact with us
@endsection



@section('content')

    <div id="aboutUsPart">
        <div class="contactbgImg white">
            <div class="overlayBg">
                <p class="center_text">
                    <span class="yellow">Contact </span> / <span class="red">Advertise</span> with Us
                </p>
            </div>
        </div>


        <div class="container">
            <div id="aboutComp" class="white">


                @if (session()->has('updateMsg'))
                    <div class="alert alert-info text-center font-weight-bold">
                        {{ session()->get('updateMsg') }}
                    </div>
                @endif


                <div id="advertising" class="contactSubSection">
                    <h1 class="font-weight-bold mb-3 text-center">
                        For Advertising
                    </h1>

                    <p>
                        Want to promote your project? We offer Promoted Coin spots and Banner Ad spots. For prices and
                        information, please email
                        us at:
                    </p>

                    <a href="mailto:ads@sitename.com" class="btn btn-lg btn-block btn-success redBg">
                        <i class="fa fa-envelope"></i>
                        ads@sitename.com
                    </a>

                </div>

                <div id="advertising" class="contactSubSection">
                    <h1 class="font-weight-bold mb-3 text-center">
                        For General Inquiries
                    </h1>

                    <p>
                        For anything else, please email us at:
                    </p>

                    <a href="mailto:info@sitename.com" class="btn btn-lg btn-block btn-warning yellowBg white">
                        <i class="fa fa-envelope"></i>
                        info@sitename.com
                    </a>

                </div>

                <div id="updateCoin" class="pt-4">
                    <div id="advertising" class="contactSubSection">
                        <h1 class="font-weight-bold mb-3 text-center">
                            For Updating Coins
                        </h1>

                        <p>
                            Want to update your coin logo, contract address, description, launch date, or anything else? The
                            fastest way is to
                            submit a request using our Update Request Form:
                        </p>


                        <div class="form-group">
                            <label for="updateInp"> Please type coin name the one you wanna update. </label>
                            <input type="text" class="form-control" id="updateInp" placeholder="Exp: Fat Boy">
                        </div>

                        <div id="resultsUpCoin"></div>

                        <button class="btn btn-lg btn-block btn-dark" id="getCoin">
                            <i class="fas fa-share-square"></i>
                            Get Coin
                        </button>



                        <p>
                            Your update request will be answered very quickly. You will be updated via email.
                        </p>

                    </div>
                </div>

            </div>
        </div>

    </div>


    <script>
        $("#getCoin").click(function() {

            $loading = '<span class="spinner-grow spinner-grow-sm"></span> Fetching Data...';
            $getCoin = '<i class="fas fa-share-square"></i> Get Coin';
            $("#getCoin").html($loading);


            $updateInpVal = $("#updateInp").val();
            $("#resultsUpCoin").html('');

            $.ajax({
                url: "/coindata-ftech-request",
                type: "POST",
                dataType: "json",
                data: {
                    coinName: $updateInpVal,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response) {
                        // console.log(response.coinData);

                        $.each(response.coinData, function(key, item) {
                            $("#resultsUpCoin").append(
                                '\
                                                                                                                                                                            <div class="resultLine"> \
                                                                                                                                                                                <a href="/update-coin-11015' +
                                item
                                .id +
                                '"> \
                                                                                                                                                                                <img src="' +
                                (
                                    item
                                    .coin_img) +
                                '" \
                                                                                                                                                                                    alt="" class="resultCoinImg"> \
                                                                                                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \
                                                                                                                                                                                    <b class="resCoinName yellow">' +
                                (
                                    item
                                    .coin_name) +
                                '</b> \
                                                                                                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \
                                                                                                                                                                                    <b class="rescoindighn red uppercase">$' +
                                (
                                    item
                                    .network_chain) +
                                '</b> \
                                                                                                                                                                                </a>\
                                                                                                                                                                            </div>'
                            );
                        });

                        $("#getCoin").html($getCoin);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });







        });
    </script>






    <script>
        $(".contact").addClass("activated");
    </script>

@endsection
