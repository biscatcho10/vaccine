<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (app()->getLocale() == "en")
                        <i class="flag-icon flag-icon-us"></i>
                        <span class="selected-language">English</span>
                    @else
                        <i class="flag-icon flag-icon-eg"></i>
                        <span class="selected-language">Arabic</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{url('locale/en')}}" data-language="en">
                        <i class="flag-icon flag-icon-us"></i>
                        English
                    </a>
                    <a class="dropdown-item" href="{{url('locale/ar')}}" data-language="ar">
                        <i class="flag-icon flag-icon-eg"></i>
                        Arabic
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">John Doe</span><span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40" />
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html">
                        <i class="mr-50" data-feather="user"></i>Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="page-account-settings.html">
                        <i class="mr-50" data-feather="settings"></i>
                        Settings
                    </a>

                    <a class="dropdown-item" href="page-auth-login-v2.html"><i class="mr-50" data-feather="power"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
