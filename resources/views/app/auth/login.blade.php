<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - Login</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{url('app/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('app/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">
    <link rel="stylesheet" href="{{url('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('app/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{url('app/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{url('app/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{url('app/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" href="{{url('app/css/style.css')}}">
    <script type="text/javascript">
        var base_url = "{{ url('admin') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body>
<div class="wrapper">
    <div class="m-account-w bg--img" style="background-image: url('{{url('app/img/login-bg.jpg')}}')">
        <a href="{{ url('/') }}" class="logo" style="text-align: center;">
        </a>
        <div class="m-account">
            <div class="row no-gutters">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="m-account--form-w">
                        <div class="m-account--form">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <img src="{{url('app/img/Logo.jpg')}}" alt="Logo" style="">
                            <label class="m-account--title">Login to your account</label>
                            <form action="" method="post">
                                {{@csrf_field()}}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <font style="color:red;"></font>
                                        <input type="text" name="username" placeholder="Username" class="form-control"
                                               autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <input type="password" name="password" placeholder="Password"
                                               class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="m-account--actions">
                                    <a href="#forgot_password" class="btn btn-outline-secondary white-color"
                                       data-toggle="modal">Forgot Password?</a>
                                    <button type="submit" class="btn btn-rounded btn-info">Sign In</button>
                                </div>
                            </form>
                            <div class="m-account--footer">
                                <p>&copy; 2021 </p>
                            </div>
                        </div>
                        <div id="forgot_password" class="modal fade">
                            <form id="forgotForm" role="form" method="post">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Forgot Password</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" name="email_forgot" placeholder="Username or email"
                                                       id="email_forgot" class="form-control forgot_required"
                                                       autocomplete="off" required>
                                                <div class="help-block with-errors" id="email_forgot_error"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <span class="error_message"></span>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-success" id="forgot-password-btn">
                                                Submit
                                            </button>
                                        </div>
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
<script src="{{url('app/js/jquery.min.js')}}"></script>
<script src="{{url('app/js/jquery-ui.min.js')}}"></script>
<script src="{{url('app/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('app/js/bootstrap-notify.js')}}"></script>
<script src="{{url('backend/js/bootstrap-notify.min.js')}}"></script>
<script src="{{url('app/js/sweetalert.min.js')}}"></script>
<script src="{{url('app/js/sweetalert-init.js')}}"></script>
<script src="{{url('app/js/login.js?v=1.0')}}"></script>
</body>
</html>
