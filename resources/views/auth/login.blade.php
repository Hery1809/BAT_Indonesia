<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themeon.net/bat/v2.9/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Mar 2018 05:38:09 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login page </title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--bat Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/bat.min.css') }}" rel="stylesheet">


    <!--bat Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('assets/css/demo/bat-demo-icons.min.css') }}" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('assets/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>

    <link href="{{ asset('assets/plugins/css-loaders/css/css-loaders.css') }}" rel="stylesheet">



    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('assets/css/demo/bat-demo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .field-icon {
            float: right;
            margin-top: -30px;
            position: relative;
            z-index: 2;
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <script src="{{ asset('assets/js/sweetalert-dev.js') }}"></script>


</head>


<body>
    <div id="container" class="cls-container">

        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay"></div>

        <div class="row">
            <div class="col-sm-6" style="background:#25476a;">
                <p>&nbsp;</p>
                <img src="{{ asset('assets/img/bat-logo.png') }}" style="height: 110px;">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h3 class="text-center" style="color:white;">Distributor P4C Portal</h3>
                <p>&nbsp;</p>
                <img src="{{ asset('assets/img/Logistic.png') }}" width="60%">
                <p>&nbsp;</p>
            </div>
            <div class="col-sm-6">
                <!-- LOGIN FORM -->
                <!--===================================================-->
                <div class="cls-content">
                    <div class="cls-content-sm panel text-left">
                        <div class="panel-body">
                            <div class="mar-ver pad-btm">
                                <h2>Log in </h2>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('dologin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" id="user_email" name="user_email" class="form-control"
                                        placeholder="Enter Your Email" autofocus>
                                </div>
                                <div class="form-group">
                                    <label><b>Password</b></label>
                                    <input type="password" id="password-field" name="password" class="form-control"
                                        placeholder="Password">
                                    <span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="checkbox pad-btm text-left">
                                    <div class="pull-right text-bold">
                                        <a href="">Forgot Password</a>
                                    </div>
                                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                                    <label for="demo-form-checkbox">Remember me</label>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">LOG IN</button>
                            </form>
                        </div>


                    </div>
                </div>
                <!--===================================================-->
            </div>
        </div>





    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>


    <!--batJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/bat.min.js') }}"></script>

    <!--=================================================-->


    <script type="text/javascript">
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

</body>

</html>
