<div id="mainnav-menu-wrap">
    <div class="nano">
        <div class="nano-content">

            <!--Profile Widget-->
            <div id="mainnav-profile" class="mainnav-profile">
                <div class="profile-wrap text-center">
                    <div class="pad-btm">
                        <img class="img-circle img-md" src="{{ asset('assets/file/user/' . Auth::user()->user_foto) }}"
                            onerror="this.onerror=null;this.src='{{ asset('assets/icon/user.jpeg') }}';" alt="">

                    </div>
                    <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                        <span class="pull-right dropdown-toggle">
                            <i class="dropdown-caret"></i>
                        </span>
                        <p class="mnp-name">{{ Auth::user()->user_name }}</p>
                        <span class="mnp-desc">{{ Auth::user()->user_status }}</span>

                    </a>
                </div>
            </div>


            <ul id="mainnav-menu" class="list-group">
                <!--Menu-->
                <li class="@yield('Dashboard')">
                    <a href="{{ route('hod.dashboard.index') }}">
                        <span class="ico icon-dashboard"></span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="@yield('Chart')">
                    <a href="{{ route('chart.index') }}">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">Chart</span>
                    </a>
                </li>
                <li class="@yield('WeeklyMeeting')">
                    <a href="{{ route('hod.weeklymeeting.index') }}">
                        <span class="ico icon-meeting"></span>
                        <span class="menu-title">Weekly Meeting</span>
                    </a>
                </li>

                <li class="@yield('Headcount')">
                    <a href="{{ route('hod.headcount.index') }}">
                        <span class="ico icon-headcount"></span>
                        <span class="menu-title">Headcount</span>
                    </a>
                </li>

                <li class="@yield('Coverage')">
                    <a href="{{ route('hod.coverage.index') }}">
                        <span class="ico icon-coverage"></span>
                        <span class="menu-title">Coverage</span>
                    </a>
                </li>

                <li class="@yield('StockLevel')">
                    <a href="{{ route('hod.stocklevel.index') }}">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">Stock Level</span>
                    </a>
                </li>

                <li class="@yield('StockCount')">
                    <a href="{{ route('hod.stockcount.index') }}">
                        <span class="ico icon-stock-count"></span>
                        <span class="menu-title">Stock Count</span>
                    </a>
                </li>

                <li class="@yield('DailyOperations')">
                    <a href="{{ route('hod.dailyoperations.index') }}">
                        <span class="ico icon-daily-ops"></span>
                        <span class="menu-title">Daily Operations</span>
                    </a>
                </li>

                <li class="@yield('EHSFacility')">
                    <a href="{{ route('hod.ehsfacility.index') }}">
                        <span class="ico icon-ehs"></span>
                        <span class="menu-title">EHS & Facility</span>
                    </a>
                </li>


                <li class="@yield('Training')">
                    <a href="{{ route('hod.training.index') }}">
                        <span class="ico icon-training"></span>
                        <span class="menu-title">Training</span>
                    </a>
                </li>


                <li class="@yield('FFISPayment')">
                    <a href="{{ route('hod.ffispayment.index') }}">
                        <span class="ico icon-ffis"></span>
                        <span class="menu-title">FFIS Payment</span>
                    </a>
                </li>

                <li class="@yield('ProductHandling')">
                    <a href="{{ route('hod.producthandling.index') }}">
                        <span class="ico icon-product"></span>
                        <span class="menu-title">Product Handling</span>
                    </a>
                </li>

                <li class="@yield('StockRotation')">
                    <a href="{{ route('hod.stockrotation.index') }}">
                        <span class="ico icon-freshness"></span>
                        <span class="menu-title">Stock Rotation</span>
                    </a>
                </li>


                <li class="@yield('SellOut')">
                    <a href="{{ route('hod.sellout.index') }}">
                        <span class="ico icon-sell"></span>
                        <span class="menu-title">Sell Out to WS</span>
                    </a>
                </li>

                <li class="@yield('Payment')">
                    <a href="{{ route('hod.payment.index') }}">
                        <span class="ico icon-payment"></span>
                        <span class="menu-title">AR Payment</span>
                    </a>
                </li>

                <li class="@yield('Setting')">
                    <a href="{{ route('setting.index') }}">
                        <span class="ico icon-setting"></span>
                        <span class="menu-title">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
