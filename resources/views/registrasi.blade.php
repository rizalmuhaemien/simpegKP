<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Pegawai</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/login/css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="/asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(/login/images/karyawan.png);">
                    <span class="login100-form-title-1">
                        <img src="/login/images/simpeg.png" width="60px"> Sistem Informasi Kepegawaian
                    </span>
                    <p class="login100-form-title-2">Aplikasi ini di buat untuk mengelola data pegawai PPPK</p>
                </div>

                <form class="login100-form validate-form" action="{{url('/register/proses')}}" method="post">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Nama</span>
                        <input class="input100" type="text" name="name" value="{{old('name')}}" placeholder="Masukan nama">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" value="{{old('username')}}" placeholder="Masukan username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="Masukan email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" id="pass_log_id" type="password" name="password" placeholder="Masukan password">
                        <span class="focus-input100"></span>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password pull-right"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Konfirmasi Password</span>
                        <input class="input100" id="pass_log" type="password" name="confirm_password" placeholder="Konfirmasi password">
                        <span class="focus-input100"></span>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-pass pull-right"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="{{route('login')}}" class="txt1">
                                Login?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Registrasi&nbsp;<i class="fas fa-sign-in-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/bootstrap/js/popper.js"></script>
    <script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/login/js/main.js"></script>
    <!-- Toastr -->
    <script src="/asset/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="/asset/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $("#pass_log_id");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
    </script>

    <script>
        $(document).on('click', '.toggle-pass', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $("#pass_log");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
    </script>

</body>

</html>