<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
            <a class="navbar-brand brand-logo" href="/">5G Network</a>
            <a class="navbar-brand brand-logo-mini" href="/"><i class="mdi mdi-access-point-network menu-icon"></i></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>  
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul>
        @if(Auth::check())
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">Minh Duc
                            <i class="mdi mdi-menu-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="mdi mdi-account-box"></i>
                            Cá nhân
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="mdi mdi-logout"></i>
                                Đăng xuất
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        @else
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile">
                    <a class="nav-link" href="/login">
                        <span class="">Login
                            <i class="mdi mdi-login"></i>
                        </span>
                    </a>
                </li>
            </ul>
        @endif
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>