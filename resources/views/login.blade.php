<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="css/feather.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="css/tabler-icons.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body class="bg-white">

    <div id="global-loader" style="display: none;">
        <div class="page-loader"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="container-fuild">
            <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
                <div class="row">
                    <div class="col-lg-5">
                        <div
                            class="login-background position-relative d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100">
                            <div class="bg-overlay-img">
                                <img src="images/bg-01.png" class="bg-1" alt="Img">
                                <img src="images/bg-02.png" class="bg-2" alt="Img">
                                <img src="images/bg-03.png" class="bg-3" alt="Img">
                            </div>
                            <div class="authentication-card w-100">
                                <div class="authen-overlay-item border w-100">
                                    <h1 class="text-white display-1">Empowering people <br> through seamless HR <br>
                                        management.</h1>
                                    <div class="my-4 mx-auto authen-overlay-img">
                                        <img src="images/authentication-bg-01.png" alt="Img">
                                    </div>
                                    <div>
                                        <p class="text-white fs-20 fw-semibold text-center">Efficiently manage your
                                            workforce, streamline <br> operations effortlessly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap">
                            <div class="col-md-7 mx-auto vh-100">
                                <form action="{{ route('SuperAdminLogin') }}" method="POST" class="vh-100">
                                    @csrf
                                    <div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
                                        <div class=" mx-auto mb-5 text-center">
                                            <img src="/logo/{{ $setting->img }}" class="img-fluid" alt="Logo">
                                        </div>
                                        <div class="">
                                            <div class="text-center mb-3">
                                                <h2 class="mb-2">Sign In</h2>
                                                <p class="mb-0">Please enter your details to sign in</p>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <div class="input-group">
                                                    <input type="email" name="email" value=""
                                                        class="form-control border-end-0">
                                                    <span class="input-group-text border-start-0">
                                                        <i class="ti ti-mail"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="pass-group">
                                                    <input type="password" name="password"
                                                        class="pass-input form-control">
                                                    <span class="ti toggle-password ti-eye-off"></span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-md mb-0">
                                                        <input class="form-check-input" id="remember_me"
                                                            type="checkbox">
                                                        <label for="remember_me" class="form-check-label mt-0">Remember
                                                            Me</label>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <a href="forgot-password.html" class="link-danger">Forgot
                                                        Password?</a>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                            </div>
                                            <div class="text-center">
                                                <h6 class="fw-normal text-dark mb-0">Don’t have an account?
                                                    <a href="register.html" class="hover-a"> Create Account</a>
                                                </h6>
                                            </div>
                                            <div class="login-or">
                                                <span class="span-or">Or</span>
                                            </div>
                                            <div class="mt-2">
                                                <div
                                                    class="d-flex align-items-center justify-content-center flex-wrap">
                                                    <div class="text-center me-2 flex-fill">
                                                        <a href="javascript:void(0);"
                                                            class="br-10 p-2 btn btn-info d-flex align-items-center justify-content-center">
                                                            <img class="img-fluid m-1" src="images/facebook-logo.svg"
                                                                alt="Facebook">
                                                        </a>
                                                    </div>
                                                    <div class="text-center me-2 flex-fill">
                                                        <a href="javascript:void(0);"
                                                            class="br-10 p-2 btn btn-outline-light border d-flex align-items-center justify-content-center">
                                                            <img class="img-fluid m-1" src="images/google-logo.svg"
                                                                alt="Facebook">
                                                        </a>
                                                    </div>
                                                    <div class="text-center flex-fill">
                                                        <a href="javascript:void(0);"
                                                            class="bg-dark br-10 p-2 btn btn-dark d-flex align-items-center justify-content-center">
                                                            <img class="img-fluid m-1" src="images/apple-logo.svg"
                                                                alt="Apple">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 pb-4 text-center">
                                            <p class="mb-0 text-gray-9">Copyright � 2024 - Smarthr</p>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="js/jquery-3.7.1.min.js" type="087d17b0325e87dd13c96bec-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="js/bootstrap.bundle.min.js" type="087d17b0325e87dd13c96bec-text/javascript"></script>

    <!-- Feather Icon JS -->
    <script src="js/feather.min.js" type="087d17b0325e87dd13c96bec-text/javascript"></script>

    <!-- Custom JS -->
    <script src="js/script.js" type="087d17b0325e87dd13c96bec-text/javascript"></script>

    <script src="js/rocket-loader.min.js" data-cf-settings="087d17b0325e87dd13c96bec-|49" defer=""></script>

</body>

</html>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
    @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @elseif (Session::has('warning'))
        toastr.warning('{{ Session::get('warning') }}');
    @endif
</script>
