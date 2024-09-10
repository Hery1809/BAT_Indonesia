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
                    <a href="{{ route('dashboard.index') }}">
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
                    <a href="{{ route('weekly-weeting.index') }}">
                        <span class="ico icon-meeting"></span>
                        <span class="menu-title">Weekly Meeting</span>
                    </a>
                </li>
                <li class="@yield('Headcount')">
                    <a href="#">
                        <span class="ico icon-headcount"></span>
                        <span class="menu-title">Headcount</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('Target')">
                            <a href="{{ route('target.index') }}">Target</a>
                        </li>
                        <li class="@yield('WeightPosition')">
                            <a href="{{ route('weight-position.index') }}">Weight Position</a>
                        </li>
                        <li class="@yield('HeadcountSub')">
                            <a href="{{ route('headcount.index') }}">Headcount</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('Coverage')">
                    <a href="#">
                        <span class="ico icon-coverage"></span>
                        <span class="menu-title">Coverage</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('TargetCoverage')">
                            <a href="{{ route('target-coverage.index') }}">Target Coverage</a>
                        </li>
                        <li class="@yield('CoverageSub')">
                            <a href="{{ route('coverage.index') }}">Coverage</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('StockLevel')">
                    <a href="#">
                        <span class="ico icon-stock-level"></span>
                        <span class="menu-title">Stock Level</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('StockLevelSKU')">
                            <a href="{{ route('stock-level-sku.index') }}">Stock Level SKU</a>
                        </li>
                        <li class="@yield('StockLevelSub')">
                            <a href="{{ route('stock-level.index') }}">Stock Level</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('StockCount')">
                    <a href="{{ route('stock-count.index') }}">
                        <span class="ico icon-stock-count"></span>
                        <span class="menu-title">Stock Count</span>
                    </a>
                </li>
                <li class="@yield('DailyOperations')">
                    <a href="{{ route('daily-operations.index') }}">
                        <span class="ico icon-daily-ops"></span>
                        <span class="menu-title">Daily Operations</span>
                    </a>
                </li>
                <li class="@yield('EHSFacility')">
                    <a href="{{ route('ehs-facility.index') }}">
                        <span class="ico icon-ehs"></span>
                        <span class="menu-title">EHS & Facility</span>
                    </a>
                </li>
                <li class="@yield('Training')">
                    <a href="{{ route('training.index') }}">
                        <span class="ico icon-training"></span>
                        <span class="menu-title">Training</span>
                    </a>
                </li>
                <li class="@yield('FFISPayment')">
                    <a href="#">
                        <span class="ico icon-ffis"></span>
                        <span class="menu-title">FFIS Payment</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('PenerimaanInsentif')">
                            <a href="{{ route('penerimaan-insentif.index') }}">Penerimaan Insentif</a>
                        </li>
                        <li class="@yield('FFISPaymentSub')">
                            <a href="{{ route('ffis-payment.index') }}">FFIS Payment</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('ProductHandling')">
                    <a href="{{ route('product-handling.index') }}">
                        <span class="ico icon-product"></span>
                        <span class="menu-title">Product Handling</span>
                    </a>
                </li>
                <li class="@yield('StockRotation')">
                    <a href="{{ route('stock-rotation.index') }}">
                        <span class="ico icon-freshness"></span>
                        <span class="menu-title">Stock Rotation</span>
                    </a>
                </li>
                <li class="@yield('SellOuttoWS')">
                    <a href="{{ route('sell-out-to-ws.index') }}">
                        <span class="ico icon-sell"></span>
                        <span class="menu-title">Sell Out to WS</span>
                    </a>
                </li>
                <li class="@yield('ARPayment')">
                    <a href="{{ route('ar-payment.index') }}">
                        <span class="ico icon-payment"></span>
                        <span class="menu-title">AR Payment</span>
                    </a>
                </li>
                {{-- <li class="@yield('MasterEHSFacility')">
                    <a href="#">
                        <i class="demo-pli-tactic"></i>
                        <span class="menu-title">Master EHS & Facility</span>
                        <i class="arrow"></i>
                    </a>

                    <!--Submenu-->
                    @php
                        $menu = App\Models\DataEhsCategoryModel::all();
                    @endphp
                    <ul class="collapse">
                        @foreach ($menu as $dataMenu)
                            <li class="@yield('Warehouse')">
                                <a href="{{ route('ehs_aktivitas.index', $dataMenu->ec_name) }}">{{ $dataMenu->ec_name }}<i
                                        class="arrow"></i></a>
                                <!-- Submenu -->
                                <ul class="collapse">
                                    <li class="@yield('Warehousesub')">
                                        <a href="{{ route('ehs_aktivitas.index', $dataMenu->ec_name) }}">Aktivitas</a>
                                    </li>
                                    <li class="@yield('{{ $dataMenu->ec_name }}sub')">
                                        <a href="{{ route('ehs_bahaya.index', $dataMenu->ec_name) }}">Bahaya</a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li> --}}
                <li class="{{ request()->is('ehs_aktivitas/*') ? 'active-sub active' : '' }}">
                    <a href="#">
                        <span class="ico icon-ehs-data"></span>
                        <span class="menu-title">Master EHS & Facility</span>
                        <i class="arrow"></i>
                    </a>

                    <!-- Submenu -->
                    @php
                        $menu = App\Models\DataEhsCategoryModel::all();
                    @endphp
                    <ul class="collapse">
                        @foreach ($menu as $dataMenu)
                            <li
                                class="{{ request()->is('ehs_aktivitas/' . $dataMenu->ec_name) ? 'active-sub active' : '' }}">
                                <a href="{{ route('ehs_aktivitas.index', $dataMenu->ec_name) }}">{{ $dataMenu->ec_name }}<i
                                        class="arrow"></i></a>
                                <!-- Submenu -->
                                <ul class="collapse">
                                    <li
                                        class="{{ request()->is('ehs_aktivitas/' . $dataMenu->ec_name) ? 'active-sub' : '' }}">
                                        <a href="{{ route('ehs_aktivitas.index', $dataMenu->ec_name) }}">Aktivitas</a>
                                    </li>
                                    <li
                                        class="{{ request()->is('ehs_bahaya/' . $dataMenu->ec_name) ? 'active-sub' : '' }}">
                                        <a href="{{ route('ehs_bahaya.index', $dataMenu->ec_name) }}">Bahaya</a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="@yield('MasterData')">
                    <a href="#">
                        <span class="ico icon-master"></span>
                        <span class="menu-title">Master Data</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('Cigarette')">
                            <a href="{{ route('cigarette.index') }}">Cigarette</a>
                        </li>
                        <li class="@yield('Depo')">
                            <a href="{{ route('depo.index') }}">Depo</a>
                        </li>
                        <li class="@yield('Distributor')">
                            <a href="{{ route('distributor.index') }}">Distributor</a>
                        </li>
                        <li class="@yield('Jabatan')">
                            <a href="{{ route('jabatan.index') }}">Jabatan</a>
                        </li>
                        <li class="@yield('Calendar')">
                            <a href="{{ route('calendar.index') }}">Calendar</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('MasterParameter')">
                    <a href="#">
                        <span class="ico icon-parameter"></span>
                        <span class="menu-title">Master Parameter</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('StockLevelPolicy')">
                            <a href="{{ route('stock-level-policy.index') }}">Stock Level Policy</a>
                        </li>
                        <li class="@yield('SubcomponentWeight')">
                            <a href="{{ route('subcomponent-weight.index') }}">Subcomponent Weight</a>
                        </li>
                        <li class="@yield('MaincomponentWeight')">
                            <a href="{{ route('maincomponent-weight.index') }}">Maincomponent Weight</a>
                        </li>
                    </ul>
                </li>

                <li class="@yield('FileManager')">
                    <a href="{{ route('file-manager.index') }}">
                        <span class="ico icon-file"></span>
                        <span class="menu-title">File Manager</span>
                    </a>
                </li>
                <li class="@yield('ActivityUser')">
                    <a href="{{ route('activity-user.index') }}">
                        <span class="ico icon-activity"></span>
                        <span class="menu-title">Activity User</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="ico icon-user"></span>
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
