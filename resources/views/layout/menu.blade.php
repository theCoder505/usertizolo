<nav class="navbar navbar-expand-lg navbar-dark bg-black fixedNav px-lg-5">
    <a class="navbar-brand" href="/">
        <img src="{{ asset($siteLogo) }}" alt="..." height="80">
    </a>
    {{-- sitelogo --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active home">
                <a class="nav-link" href="/"> Home</a>
            </li>
            {{-- activated --}}
            <li class="nav-item active about">
                <a class="nav-link" href="/about-us">About Us</a>
            </li>
            <li class="nav-item active contact">
                <a class="nav-link" href="/advertise">Contact Us</a>
            </li>

            <li class="nav-item dropdown active coins">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Coins
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/chain=all/coin=alltime#particulars" class="alltime">All Time
                        Rankings</a>
                    <a class="dropdown-item" href="/chain=all/coin=today#particulars" class="dailyrank">Daily
                        Raning</a>
                    <a class="dropdown-item" href="/chain=all/coin=new#particulars" class="listings">New
                        Listings</a>
                </div>
            </li>

            <li class="nav-item dropdown active account">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    @if (Cookie::get('logermail'))
                        <a class="dropdown-item" href="/profile" class="profile">Profile</a>
                        <a class="dropdown-item" href="/wishlist" class="wishlist">wishlist</a>
                        <a class="dropdown-item" href="/logout" class="logout">Logout</a>
                    @else
                        <a class="dropdown-item" href="/sign-up" class="signup">Sign Up Now</a>
                        <a class="dropdown-item" href="/login" class="login">Login Now</a>
                    @endif

                </div>
            </li>

        </ul>
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" id="searchInput">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search"
                onclick="searchFunc()">Search</button>
        </div>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="showSrchResults" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Search Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div id="results">

                    <div class="result_line">
                        <img src="http://127.0.0.1:8000/assets/webimages/randomcoin.png" alt="" class="resultImg">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="" target="_blank">
                            <h4 class="yellow">
                                Coin Name || <span class="red uppercase"> Network</span>
                            </h4>
                        </a>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
