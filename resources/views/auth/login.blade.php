<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page | Nifty - Admin Template</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--Nifty-->
    <link href="{{ asset('assets/css/nifty.min.css') }}" rel="stylesheet">
    <!--Nifty Premium Icon-->
    <link href="{{ asset('assets/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">
    <!--Pace - Page Load Progress-->
    <link href="{{ asset('assets/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!--Demo-->
    <link href="{{ asset('assets/css/demo/nifty-demo.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="container" class="cls-container">

        <!-- BACKGROUND IMAGE -->
        <div id="bg-overlay"></div>

        <!-- LOGIN FORM -->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <div class="mar-ver pad-btm">
                        <h1 class="h3">Account Login</h1>
                        <p>Sign In to your account</p>
                    </div>
                    @if ($errors->any())
                        <div>
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
                            <input type="password" id="user_password" name="user_password" class="form-control"
                                placeholder="Enter Your Password">
                        </div>
                        <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                            <label for="demo-form-checkbox">Remember me</label>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                    </form>
                </div>
                <div class="pad-all">
                    <a href="pages-password-reminder.html" class="btn-link mar-rgt">Forgot password ?</a>
                    <a href="pages-register.html" class="btn-link mar-lft">Create a new account</a>
                    <div class="media pad-top bord-top">
                        <div class="pull-right">
                            <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                            <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                            <a href="#" class="pad-rgt"><i
                                    class="demo-psi-google-plus icon-lg text-danger"></i></a>
                        </div>
                        <div class="media-body text-left text-bold text-main">
                            Login with
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- DEMO PURPOSE ONLY -->
        <div class="demo-bg">
            <div id="demo-bg-list">
                <div class="demo-loading"><i class="psi-repeat-2"></i></div>
                <img class="demo-chg-bg bg-trans active" src="{{ asset('assets/img/bg-img/thumbs/bg-trns.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-1.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-2.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-3.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-4.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-5.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-6.jpg') }}"
                    alt="Background Image">
                <img class="demo-chg-bg" src="{{ asset('assets/img/bg-img/thumbs/bg-img-7.jpg') }}"
                    alt="Background Image">
            </div>
        </div>
    </div>

    <!--jQuery-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--BootstrapJS-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--NiftyJS-->
    <script src="{{ asset('assets/js/nifty.min.js') }}"></script>
    <!--Background Image-->
    <script src="{{ asset('assets/js/demo/bg-images.js') }}"></script>
</body>

</html>
