<nav class="nav">
    <div class="nav-left">
        <a href="{{ URL::route('index') }}" class="nav-item">
            <img src="{{ asset('img/Synology-TPB-Downloader.png') }}" alt="Bulma logo">
        </a>
    </div>

    <div class="nav-center">
        <a class="nav-item" href="https://github.com/mace015/synology-tpb-downloader" target="_blank">
            <span class="icon">
                <i class="fa fa-github"></i>
            </span>
        </a>
    </div>

    <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
    <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>

    <!-- This "nav-menu" is hidden on mobile -->
    <!-- Add the modifier "is-active" to display it on mobile -->
    <div class="nav-right nav-menu">

        @if(Auth::check())
            <span class="nav-item">
                <a class="button" href="{{ URL::route('logout') }}">
                    <span class="icon">
                        <i class="fa fa-sign-out"></i>
                    </span>
                    <span>Logout</span>
                </a>
            </span>
        @endif
    </div>
</nav>