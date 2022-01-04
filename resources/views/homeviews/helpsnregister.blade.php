    <section id="helps">
        <div class="container">
            <h3 class="helptxt white">
                HELPS
            </h3>
            <hr>

            <br>




            <div id="questions">
              {!! $helptexts !!}
            </div>

        </div>
    </section>



    
    <section id="rergisternow">
        <div class="overlayBg3 cstmpadding">
            <h3 class="text-center white font-weight-bold">
                Get Started Today With {{ env('APP_NAME') }}
            </h3>
            <h5 class="dim_color">
                Open account and start the votings and coin adding
            </h5>
            <center>
                <a href="/submit-coin" class="btn mt-3" id="readMore">
                    ADD A COIN  
                </a>
            </center>

        </div>

    </section>