        <div class="row">
            <div class="col-12 col-md-7">
                <h3 class="white">
                    Best Coins <span class="red">Today </span>
                </h3>
                <h4 class="dim_color">
                    Find the top voted coins of the last 24 hours
                </h4>
            </div>
            <div class="col-12 col-md-5">


                <a href="/advertise" class="rightLink">Advertise With Us?</a>
                @forelse ($selectadd as $item)

                    <a href="{{$item->redirectlink}}">
                        @if (($item->rawimage) == '')
                            <img src="{{ asset($item->imagelink) }}"
                                alt="" class="addvertise">
                        @else
                            <img src="{{ asset($item->rawimage) }}"
                                alt="" class="addvertise">
                        @endif
                    </a>

                @empty
                @endforelse


            </div>
        </div>
