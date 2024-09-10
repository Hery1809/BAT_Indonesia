<div id="mainnav-menu-wrap">
    <div class="nano has-scrollbar">
        <div class="nano-content" tabindex="0" style="right: -17px;">

            <!--Profile Widget-->
            <!--================================-->
            <div id="mainnav-profile" class="mainnav-profile">
                <div class="profile-wrap text-center">
                    <div class="pad-btm">
                        <img class="img-circle img-md" src="https://batidistributor.com/staging/assets/icon/user.jpeg" onerror="this.onerror=null;this.src='https://batidistributor.com/staging/assets/icon/user.jpeg';" alt="">
                    </div>
                    <p class="mnp-name">Samara</p>
                    <span class="mnp-desc">HO BAT</span>

                </div>
            </div>



            <ul id="mainnav-menu" class="list-group">

                <!--Menu list item-->
                <li class="@yield('dashboard')">
                    <a href="{{ route('ho.dashboard.index') }}" class="active-link">
                        <span class="ico icon-dashboard"></span>
                        <span class="menu-title">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="@yield('weeklymeeting')">
                    <a href="{{ route('ho.meeting-weekly.index') }}" class="active-link">
                        <span class="ico icon-meeting"></span>
                        <span class="menu-title">
                            Weekly Meeting
                        </span>
                    </a>
                </li>

                <li class="@yield('headcount')">
                    <a href="{{ route('ho.headcount.index') }}" class="active-link">
                        <span class="ico icon-headcount"></span>
                        <span class="menu-title">
                            Headcount
                        </span>
                    </a>
                </li>

                <li class="@yield('coverage')">
                    <a href="{{ route('ho.coverage.index') }}" class="active-link">
                        <span class="ico icon-coverage"></span>
                        <span class="menu-title">
                            Coverage
                        </span>
                    </a>
                </li>

                <li class="@yield('stock level')">
                    <a href="{{ route('ho.stock-level.index') }}" class="active-link">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">
                            Stock Level
                        </span>
                    </a>
                </li>


                <li class="@yield('stock count')">
                    <a href="{{ route('ho.stock-count.index') }}" class="active-link">
                        <span class="ico icon-stock-count"></span>
                        <span class="menu-title">
                            Stock Count
                        </span>
                    </a>
                </li>


                <li class="@yield('daily operations')">
                    <a href="{{ route('ho.daily-operations.index') }}" class="active-link">
                        <span class="ico icon-daily-ops"></span>
                        <span class="menu-title">
                            Daily Operations
                        </span>
                    </a>
                </li>

                <li class="@yield('ehs facility')">
                    <a href="{{ route('ho.ehs-facility.index') }}" class="active-link">
                        <span class="ico icon-ehs"></span>
                        <span class="menu-title">
                            EHS &amp; Facility
                        </span>
                    </a>
                </li>


                <li class="@yield('training')">
                    <a href="{{ route('ho.training.index') }}" class="active-link">
                        <span class="ico icon-training"></span>
                        <span class="menu-title">
                            Training
                        </span>
                    </a>
                </li>

                <li class="@yield('ffis-payment')">
                    <a href="{{ route('ho.ffis-payment.index') }}" class="active-link">
                        <span class="ico icon-ffis"></span>
                        <span class="menu-title">FFIS Payment</span>
                    </a>
                </li>

                <li class="@yield('product handling')">
                    <a href="{{ route('ho.product-handling.index') }}" class="active-link">
                        <span class="ico icon-product"></span>
                        <span class="menu-title">Product Handling</span>
                    </a>
                </li>

                <li class="@yield('stock rotation')">
                    <a href="{{ route('ho.stock-rotation.index') }}" class="active-link">
                        <span class="ico icon-freshness"></span>
                        <span class="menu-title">Stock Rotation</span>
                    </a>
                </li>

                <li class="@yield('sell out')">
                    <a href="{{ route('ho.sell-out.index') }}" class="active-link">
                        <span class="ico icon-sell"></span>
                        <span class="menu-title">Sell Out to WS</span>
                    </a>
                </li>

                <li class="@yield('ar payment')">
                    <a href="{{ route('ho.ar-payment.index') }}" class="active-link">
                        <span class="ico icon-payment"></span>
                        <span class="menu-title">AR Payment</span>
                    </a>
                </li>

                <li class="@yield('setting')">
                    <a href="{{ route('ho.setting.index') }}" class="active-link">
                        <span class="ico icon-setting"></span>
                        <span class="menu-title">Setting</span>
                    </a>
                </li>


            </ul>


        </div>
        <div class="nano-pane">
            <div class="nano-slider" style="height: 210px; transform: translate(0px, 0px);"></div>
        </div>
    </div>
</div>