
<div id="mainnav-menu-wrap">
    <div class="nano has-scrollbar">
        <div class="nano-content" tabindex="0" style="right: -17px;">

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
                <li>
                    <a href="https://batidistributor.com/staging/asm/dashboard" class="active-link"
                        data-original-title="" title="">
                        <span class="ico icon-dashboard"></span>
                        <span class="menu-title">
                            Dashboard
                        </span>
                    </a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/meeting_weekly_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-meeting"></span>
                        <span class="menu-title">
                            Weekly Meeting
                        </span>
                    </a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/headcount_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-headcount"></span>
                        <span class="menu-title">
                            Headcount
                        </span>
                    </a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/coverage_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-coverage"></span>
                        <span class="menu-title">
                            Coverage
                        </span>
                    </a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/stock_level_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">
                            Stock Level
                        </span>
                    </a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/stock_count_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-stock-count"></span>
                        <span class="menu-title">
                            Stock Count
                            <span class="pull-right badge badge-warning">10<span> </span>
                            </span></span></a>
                </li>


                <li>
                    <a href="https://batidistributor.com/staging/asm/daily_operations_verify_asm" data-original-title=""
                        title="">
                        <span class="ico icon-daily-ops"></span>
                        <span class="menu-title">
                            Daily Operations
                        </span>
                    </a>
                </li>


                <li>
                    <a href="#" data-original-title="" title="">
                        <span class="ico icon-ehs"></span>
                        <span class="menu-title">
                            EHS &amp; Facility
                        </span>
                        <i class="arrow"></i>
                    </a>

                    <!--Submenu-->

                    <ul class="collapse" aria-expanded="false">
                        <li><a href="https://batidistributor.com/staging/asm/ehs_verify_asm?ec=Warehouse">Warehouse
                                <span class="pull-right badge badge-warning">9<span>
                                    </span></span></a>
                        </li>

                        <li><a href="https://batidistributor.com/staging/asm/ehs_verify_asm?ec=Sales">Sales
                                <span class="pull-right badge badge-warning">9<span>
                                    </span></span></a>
                        </li>

                        <li><a href="https://batidistributor.com/staging/asm/ehs_verify_asm?ec=Security">Security
                                <span class="pull-right badge badge-warning">9<span>
                                    </span></span></a>
                        </li>

                        <li><a href="https://batidistributor.com/staging/asm/ehs_verify_asm?ec=Admin">Admin
                                <span class="pull-right badge badge-warning">9<span>
                                    </span></span></a>
                        </li>

                        <li><a href="https://batidistributor.com/staging/asm/ehs_verify_asm?ec=Non Routine">Non Routine
                                <span class="pull-right badge badge-warning">13<span>
                                    </span></span></a>
                        </li>
                        <li><a href="https://batidistributor.com/staging/asm/ehs_form_verify_asm">EHS Form
                                <span class="pull-right badge badge-warning">1<span>
                                    </span></span></a>
                        </li>
                    </ul>
                </li>


                <li class="@yield('training')">
                    <a href="{{route('asm.Training.index')}}">
                        <span class="ico icon-training"></span>
                        <span class="menu-title">
                            Training

                            <span class="pull-right badge badge-warning">2<span> </span>
                            </span></span></a>
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
                            </span></span></a>
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
            <div class="nano-slider" style="height: 2109px; transform: translate(0px, 0px);"></div>
        </div>
    </div>
</div>