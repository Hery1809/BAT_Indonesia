<div id="mainnav-menu-wrap">
    <div class="nano">
        <div class="nano-content">

            <!--Profile Widget-->
            <div id="mainnav-profile" class="mainnav-profile">
                <div class="profile-wrap text-center">
                    <div class="pad-btm">
                        <img class="img-circle img-md" src="{{ asset('assets/img/profile-photos/1.png') }}"
                            alt="Profile Picture">
                    </div>
                    <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                        <span class="pull-right dropdown-toggle">
                            <i class="dropdown-caret"></i>
                        </span>
                        <p class="mnp-name">Aaron Chavez</p>
                        <span class="mnp-desc">aaron.cha@themeon.net</span>
                    </a>
                </div>
                <div id="profile-nav" class="collapse list-group bg-trans">
                    <a href="#" class="list-group-item">
                        <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="demo-pli-information icon-lg icon-fw"></i> Help
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                    </a>
                </div>
            </div>


            <!--Shortcut buttons-->
            <!--================================-->
            <div id="mainnav-shortcut" class="hidden">
                <ul class="list-unstyled shortcut-wrap">
                    <li class="col-xs-3" data-content="My Profile">
                        <a class="shortcut-grid" href="#">
                            <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                <i class="demo-pli-male"></i>
                            </div>
                        </a>
                    </li>
                    <li class="col-xs-3" data-content="Messages">
                        <a class="shortcut-grid" href="#">
                            <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                <i class="demo-pli-speech-bubble-3"></i>
                            </div>
                        </a>
                    </li>
                    <li class="col-xs-3" data-content="Activity">
                        <a class="shortcut-grid" href="#">
                            <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                <i class="demo-pli-thunder"></i>
                            </div>
                        </a>
                    </li>
                    <li class="col-xs-3" data-content="Lock Screen">
                        <a class="shortcut-grid" href="#">
                            <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                <i class="demo-pli-lock-2"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!--================================-->
            <!--End shortcut buttons-->

            <ul id="mainnav-menu" class="list-group">
                <!--Menu-->
                <li class="@yield('Dashboard')">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="@yield('Chart')">
                    <a href="{{ route('chart.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Chart</span>
                    </a>
                </li>
                <li class="@yield('WeeklyMeeting')">
                    <a href="{{ route('weekly-weeting.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Weekly Meeting</span>
                    </a>
                </li>
                {{-- <li class="active-sub active"> --}}
                <li class="@yield('active-sub') @yield('active')">
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Headcount</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        {{-- <li class="active-link"> --}}
                        <li class="">
                            <a href="layouts-collapsed-navigation.html">Target</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Weight Position</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Headcount</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Coverage</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">Target Coverage</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Coverage</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Stock Level</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">Stock Level SKU</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Stock Level</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('StockCount')">
                    <a href="{{ route('stock-count.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Stock Count</span>
                    </a>
                </li>
                <li class="@yield('DailyOperations')">
                    <a href="{{ route('daily-operations.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Daily Operations</span>
                    </a>
                </li>
                <li class="@yield('EHSFacility')">
                    <a href="{{ route('ehs-facility.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">EHS & Facility</span>
                    </a>
                </li>
                <li class="@yield('Training')">
                    <a href="{{ route('training.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Training</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">FFIS Payment</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">Penerimaan Insentif</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">FFIS Payment</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Product Handling</span>
                    </a>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Stock Rotation</span>
                    </a>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Sell Out to WS</span>
                    </a>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">AR Payment</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-tactic"></i>
                        <span class="menu-title">Master EHS & Facility</span>
                        <i class="arrow"></i>
                    </a>

                    <!--Submenu-->
                    <ul class="collapse">
                        <li>
                            <a href="#">Warehouse<i class="arrow"></i></a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Aktivitas</a></li>
                                <li><a href="#">Bahaya</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Sales<i class="arrow"></i></a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Aktivitas</a></li>
                                <li><a href="#">Bahaya</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Security<i class="arrow"></i></a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Aktivitas</a></li>
                                <li><a href="#">Bahaya</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Admin<i class="arrow"></i></a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Aktivitas</a></li>
                                <li><a href="#">Bahaya</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Non Routine<i class="arrow"></i></a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Aktivitas</a></li>
                                <li><a href="#">Bahaya</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Master Data</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">Cigarette</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Depo</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Distributor</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Jabatan</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Calendar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Master Parameter</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">Stock Level Policy</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Subcomponent Weight</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Maincomponent Weight</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">File Manager</span>
                    </a>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Activity User</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">User</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li>
                            <a href="layouts-collapsed-navigation.html">AM Distributor</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">HO Distributor</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">ASM BAT</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">HO BAT</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Administrator</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('active-sub')">
                    <a href="#">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
