<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <div class="navbar-header">
            <a href="{{ route('hod.dashboard.index') }}" class="navbar-brand">
                <div class="brand-title">
                    <img src="{{ asset('assets/img/bat-logo.png') }}" alt="BAT Logo" class="brand-icon">
                </div>
            </a>
        </div>

        <!--Navbar Dropdown-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>

                <!--Search-->
                <li>
                    <div class="custom-search-form">
                        <h4 class="text-white text-left">Distributor P4C Tracking </h4>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-top-links">

                <!--Search-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li>

                    <div class="custom-search-form2">
                        <p class="text-white text-left"><span class="text-aqua text-bold span">Period</span>
                            <br> tes
                        </p>
                    </div>
                    <div class="custom-search-form2">
                        <p class="text-white text-left"><span class="text-aqua text-bold span">Week</span>
                            <br> 123
                        </p>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Search-->

            </ul>

            <ul class="nav navbar-top-links">


                <!--User dropdown-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">
                            <i class="demo-pli-male"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><i class="demo-pli-unlock icon-lg icon-fw"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</header>
