<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Login : Sistem Informasi </title>
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('/favicon.png')}}" />

    <!-- vendor css -->
    <link href="{{asset('vendor/login')}}/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('vendor/login')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.css">
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.dark.css">
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('vendor/sweetalert')}}/sweetalert.css">
  <!-- End SweetAlert2 -->
</head>

<body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
        <img src="{{asset('vendor/login')}}/img/background.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
        <div class="overlay-body bg-black-2 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-8">
                
                <div class="signin-logo tx-center tx-28 tx-bold tx-white"> <img src="{{asset('vendor/home')}}/img/logo/logo.png" alt="logo image" class="img-fluid" width="80px;">
                    <div class="tx-white tx-center ">SISTEM INFORMASI AKADEMIK </div>
                </div>
               
                <div class="tx-white tx-center mg-t-30">Please Login To Continue</div>
                <form action="{{route('user.auth')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="email" class="form-control fc-outline-dark" placeholder="Enter your email">
                        @error('email')
                        <div class="text-danger ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control fc-outline-dark" placeholder="Enter your password">
                        @error('password')
                        <div class="text-danger ">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Sign In</button>
                </form>
            </div><!-- login-wrapper -->
        </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{asset('vendor/login')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('vendor/login')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('vendor/login')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('vendor/sweetalert')}}/sweetalert.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
