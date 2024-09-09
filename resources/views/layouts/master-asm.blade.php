<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        @include('layouts.navbar-asm')

        <div class="boxed">
            <!--Page content-->
            <div id="content-container">
                <div id="page-content">
                    @yield('content')
                    {{-- @include('pages.admin.index') --}}
                </div>
            </div>

            <!--MAIN NAVIGATION-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu Sidebar-->
                    @include('layouts.sidebar-asm')
                </div>
            </nav>
        </div>

        <!-- FOOTER -->
        <footer id="footer">
            @include('layouts.footer')
        </footer>

        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

    @include('layouts.scripts')
</body>

</html>
