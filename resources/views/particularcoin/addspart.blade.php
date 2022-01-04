 <div class="row">
     <div class="col-12 col-md-6 white">
         <a href="/">
             Home
         </a>
         &#8594;
         <a href="/">
             Coins
         </a>
         &#8594; Lunar
     </div>
     <div class="col-12 col-md-6">


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
