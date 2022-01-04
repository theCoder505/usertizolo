<div id="promoteds">

    <a href="/contact" class="righthref">Want your coin here? Contact Us</a>
    <h4 class="yellow">
        Promoted*
    </h4>

    <div id="tableScroller" class="desk_only">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Chain</th>
                    <th scope="col">Symbol</th>
                    <th scope="col">Market Cap</th>
                    <th scope="col">Price</th>
                    <th scope="col">Launch</th>
                    <th scope="col">Votes</th>
                    <th scope="col">Vote</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($coininfoData as $key => $coindata)


                    <tr>
                        <th scope="row">
                            {{ $key + 1 }}
                            <br>
                            {{-- <i class="far fa-star yellow star" onclick="addtowish({{ $coindata->id }})"></i> --}}
                        </th>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset($coindata->coin_img) }}" alt="" class="tableImg">
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('assets/webimages/coincap.png') }}" alt=""
                                                class="table_sec_img"
                                                onclick="coinmarket('{{ $coindata->coin_mrkt_link }}')">
                                        </div>
                                        <div class="col-12">
                                            <img src="{{ asset('assets/webimages/coingeko.png') }}" alt=""
                                                class="table_sec_img"
                                                onclick="coingeko('{{ $coindata->coin_geko_link }}')">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>{{ $coindata->coin_name }}</td>
                        <td>
                            <button class="btn btn-success redBg uppercase">{{ $coindata->network_chain }}</button>
                        </td>
                        <td>{{ $coindata->symbol }}</td>
                        <td>$ {{ $coindata->marketcap }}</td>
                        <td>$ {{ $coindata->price_usd }}</td>
                        <td>{{ $coindata->launch }}</td>
                        <td>
                            <button class="btn btn-info">
                                {{ $coindata->votes_total }}
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" onclick="sendto(11015{{ $coindata->id }})">
                                Vote
                            </button>
                        </td>
                    </tr>

                @empty

                @endforelse

            </tbody>
        </table>
    </div>

</div>
