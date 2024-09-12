
<div id="mainnav-menu-wrap">
    <div class="nano has-scrollbar">
        <div class="nano-content" tabindex="0" style="right: -15px;">

            <!--Profile Widget-->
            <!--================================-->
            <div id="mainnav-profile" class="mainnav-profile">
                <div class="profile-wrap text-center">
                    <div class="pad-btm">
                        <img class="img-circle img-md" src="https://batidistributor.com/staging/assets/icon/user.jpeg"
                            onerror="this.onerror=null;this.src='https://batidistributor.com/staging/assets/icon/user.jpeg';"
                            alt="">
                    </div>
                    <p class="mnp-name">asm@bat.com</p>
                    <span class="mnp-desc">ASM</span>
                </div>
            </div>
            <ul id="mainnav-menu" class="list-group">
                <!--Menu list item-->
                <li class="@yield('dashboard')">
                    <a href="{{ route('asm.dashboard.index') }}">
                        <span class="ico icon-dashboard"></span>
                        <span class="menu-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="@yield('weeklymeeting')">
                    <a href="{{ route('weekly.meeting.asm.index') }}">
                        <span class="ico icon-meeting"></span>
                        <span class="menu-title">Weekly Meeting</span>
                    </a>
                </li>
                <li class="@yield('headcount')">
                    <a href="{{ route('headcount.asm.index') }}">
                        <span class="ico icon-headcount"></span>
                        <span class="menu-title">
                            Headcount
                        </span>
                    </a>
                </li>
                <li class="@yield('coverage')">
                    <a href="{{ route('coverage.asm.index') }}">
                        <span class="ico icon-coverage"></span>
                        <span class="menu-title">
                            Coverage
                        </span>
                    </a>
                </li>

                <li class="@yield('stocklevel')">
                    <a href="{{ route('stock-level.asm.index') }}">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">
                            Stock Level
                        </span>
                    </a>
                </li>
                <li class="@yield('stockcount')">
                    <a href="{{ route('stock-count.asm.index') }}">
                        <span class="ico icon-stock-count"></span>
                        <span class="menu-title">
                            Stock Count
                            <span class="pull-right badge badge-warning">10<span> </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="@yield('dailyoperations')">
                    <a href="{{ route('daily-operations.asm.index') }}">
                        <span class="ico icon-daily-ops"></span>
                        <span class="menu-title">
                            Daily Operations
                        </span>
                    </a>
                </li>
                <li class="{{ Request::is('asm/warehouse*') || Request::is('asm/sales*') || Request::is('asm/security*') || Request::is('asm/admin*') || Request::is('asm/non-routine*') || Request::is('asm/ehs-form*') ? 'active-sub' : '' }}">
                    <a href="#">
                        <span class="ico icon-ehs"></span>
                        <span class="menu-title">
                            EHS &amp; Facility
                        </span>
                        <i class="arrow"></i>
                    </a>
                    <!--Submenu-->
                    <ul class="collapse {{ Request::is('asm/warehouse*') || Request::is('asm/sales*') || Request::is('asm/security*') || Request::is('asm/admin*') || Request::is('asm/non-routine*') || Request::is('asm/ehs-form*') ? 'in' : '' }}">
                        <li class="{{ Request::is('asm/warehouse*') ? 'active' : '' }}"><a href="{{ route('warehouse.asm.index') }}" style="{{ Request::is('asm/warehouse*') ? 'font-weight: bold;' : '' }}">Warehouse
                                <span class="pull-right badge badge-warning">9<span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="{{ Request::is('asm/sales*') ? 'active' : '' }}">
                            <a href="{{ route('sales.asm.index') }}" style="{{ Request::is('asm/sales*') ? 'font-weight: bold;' : '' }}">Sales
                                <span class="pull-right badge badge-warning">9<span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="{{ Request::is('asm/security*') ? 'active' : '' }}">
                            <a href="{{ route('security.asm.index') }}" style="{{ Request::is('asm/security*') ? 'font-weight: bold;' : '' }}">Security
                                <span class="pull-right badge badge-warning">9<span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="{{ Request::is('asm/admin*') ? 'active' : '' }}">
                            <a href="{{ route('admin.asm.index') }}" style="{{ Request::is('asm/admin*') ? 'font-weight: bold;' : '' }}">Admin
                                <span class="pull-right badge badge-warning">9<span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="{{ Request::is('asm/non-routine*') ? 'active' : '' }}">
                            <a href="{{ route('non-routine.asm.index') }}" style="{{ Request::is('asm/non-routine*') ? 'font-weight: bold;' : '' }}">Non Routine
                                <span class="pull-right badge badge-warning">13<span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="{{ Request::is('asm/ehs-form*') ? 'active' : '' }}">
                            <a href="{{ route('ehs-form.asm.index') }}" style="{{ Request::is('asm/ehs-form*') ? 'font-weight: bold;' : '' }}">EHS Form
                                <span class="pull-right badge badge-warning">1<span>
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('training')">
                    <a href="{{route('asm.Training.index')}}">
                        <span class="ico icon-training"></span>
                        <span class="menu-title">
                            Training
                            <span class="pull-right badge badge-warning">2<span> </span>
                        </span>
                    </a>
                </li>

                <li class="@yield('ffispayment')">
                    <a href="{{route('asm.FFISPayment.index')}}">
                        <span class="ico icon-ffis"></span>
                        <span class="menu-title">
                            FFIS Payment
                        </span>
                    </a>
                </li>

                <li class="@yield('producthandling')">
                    <a href="{{route('asm.ProductHandling.index')}}">
                        <span class="ico icon-product"></span>
                        <span class="menu-title">
                            Product Handling
                            <span class="pull-right badge badge-warning">15<span> </span>
                            </span>
                        </span>
                    </a>
                </li>

                <li class="@yield('stockrotation')">
                    <a href="{{route('asm.StockRotation.index')}}">
                        <span class="ico icon-freshness"></span>
                        <span class="menu-title">
                            Stock Rotation
                        </span>
                    </a>
                </li>

                <li class="@yield('sellouttows')">
                    <a href="{{route('asm.SellOutToWs.index')}}">
                        <span class="ico icon-sell"></span>
                        <span class="menu-title">
                            Sell Out to WS
                        </span>
                    </a>
                </li>


                <li class="@yield('setting')">
                    <a href="{{route('asm.Setting.index')}}">
                        <span class="ico icon-setting"></span>
                        <span class="menu-title">
                            Setting
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nano-pane" style="display: none;">
            <div class="nano-slider" style="height: 1194px; transform: translate(0px, 0px);"></div>
        </div>
    </div>
</div>