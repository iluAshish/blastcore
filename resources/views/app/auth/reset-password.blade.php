<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - Reset Password</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('backend/img/favicon.png')}}" type="image/png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">
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
        <div class="m-account-w bg--img" style="background-image: url('{{url('backend/img/wrapper-bg.jpg')}}')">
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
                              <label class="m-account--title">Reset Your Password</label>
                                <form method="post" id="reset-password-form" role="form">
                                    {{@csrf_field()}}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control required" autocomplete="off" required>
                                        </div>
                                        <div class="help-block with-errors" id="password_error"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control required" autocomplete="off" required>
                                            <div class="help-block with-errors" id="confirm_password_error"></div>
                                        </div>
                                    </div>
                                    <div class="m-account--actions">
                                        <button type="submit" class="btn btn-rounded btn-info" id="reset-password-btn">Reset Password</button>
                                        <input type="hidden" name="id" id="id" value="{{$tokenAdmin->id}}">
                                    </div>
                                </form>
                              <div class="m-account--footer">
                                  <p>&copy; 2021 </p>
                              </div>
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
