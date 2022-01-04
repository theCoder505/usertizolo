<div id="top10Influencer">

    <h4 class="white mt-5">
        Our Top <span class="red">influencers</span>
    </h4>
    <div class="row">


        @forelse ($getinfluencers as $key => $item)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="//{{ $item->influencer_url }}" class="normalHref white">
                    <div class="coindiv">

                         @if ($item->influencer_img_link == 0)
                            <img src="https://toppng.com//public/uploads/preview/influencer-marketing-marketing-influencer-icon-11563039761b43uqszd74.png" alt="" class="top_coinimg">
                         @else
                            <img src="{{ $item->influencer_img_link }}" alt="" class="top_coinimg">
                        @endif


                        
                        <h4 class="coin_name">
                            {{ $item->user_name }}
                        </h4>
                        <span class="number">
                            {{ $key + 1 }}
                        </span>
                    </div>
                </a>
            </div>
        @empty
            

            <h3 class="text-center red"> No Influencers Yet!... </h3>
        @endforelse




    </div>

</div>
