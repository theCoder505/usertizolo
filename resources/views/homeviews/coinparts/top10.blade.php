<div id="top10">
    <h4 class="white mt-5">
        Top 10 coins
    </h4>
    <div class="row">


        @forelse ($votesData as $key => $coindata)

            <div class="col-6 col-md-4 col-lg-2">
                <a href="/coin-number-11015{{ $coindata->id }}" class="normalHref white">
                    <div class="coindiv">
                        <img src="{{ asset($coindata->coin_img) }}" alt="" class="top_coinimg">

                        <h4 class="coin_name">
                            {{ $coindata->coin_name }}
                        </h4>

                        <p class="coin dim_color">
                            {{ $coindata->chain }}
                        </p>
                        <span class="number">
                            {{ $key + 1 }}
                        </span>
                    </div>
                </a>
            </div>

        @empty

        @endforelse

    </div>
</div>
