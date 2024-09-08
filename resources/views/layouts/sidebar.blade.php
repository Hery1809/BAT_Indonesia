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
                <li class="@yield('Headcount')">
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
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
                        <i class="demo-pli-split-vertical-2"></i>
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
                        <i class="demo-pli-split-vertical-2"></i>
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
                <li class="@yield('FFISPayment')">
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
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
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Product Handling</span>
                    </a>
                </li>
                <li class="@yield('StockRotation')">
                    <a href="{{ route('stock-rotation.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Stock Rotation</span>
                    </a>
                </li>
                <li class="@yield('SellOuttoWS')">
                    <a href="{{ route('sell-out-to-ws.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Sell Out to WS</span>
                    </a>
                </li>
                <li class="@yield('ARPayment')">
                    <a href="{{ route('ar-payment.index') }}">
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
                <li class="@yield('MasterData')">
                    <a href="#">
                        <i class="demo-pli-split-vertical-2"></i>
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
                        <i class="demo-pli-split-vertical-2"></i>
                        <span class="menu-title">Master Parameter</span>
                        <i class="arrow"></i>
                    </a>

                    <ul class="collapse">
                        <li class="@yield('StockLevelPolicy')">
                            <a href="{{ route('stock-level-policy.index') }}">Stock Level Policy</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Subcomponent Weight</a>
                        </li>
                        <li>
                            <a href="layouts-collapsed-navigation.html">Maincomponent Weight</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('FileManager')">
                    <a href="{{ route('file-manager.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">File Manager</span>
                    </a>
                </li>
                <li class="@yield('ActivityUser')">
                    <a href="{{ route('activity-user.index') }}">
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
                <li class="@yield('Setting')">
                    <a href="{{ route('setting.index') }}">
                        <i class="demo-pli-home"></i>
                        <span class="menu-title">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
