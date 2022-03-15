<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon"  data-feather="sun"></i>
                </a>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{auth()->user()->name}}</span>
                        <span
                            class="user-status">Admin</span>
                        </div>

                        <span class="avatar">
                            <img class="round"
                            src="{{asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40"
                            width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item"
                        href="page-profile.html">
                        <i class="me-50" data-feather="user"></i> Profile
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="page-account-settings-account.html">
                        <i class="me-50" data-feather="settings"></i>
                        Settings
                    </a>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item d-block w-100">
                            <i class="me-50" data-feather="power"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
