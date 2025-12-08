<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - {{ $title ?? 'Custom Page'}}</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="{{asset('app/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('app/img/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/kartik-v-bootstrap/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/kartik-v-bootstrap/themes/explorer-fas/theme.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/bootstrap-switch.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/bootstrap-popover-x.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/fancy_box/source/jquery.fancybox.css?v=2.1.5') }}"
          media="screen"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app/fancy_box/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app/fancy_box/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}"/>
    <link rel="stylesheet" href="{{asset('app/datatable/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/datatable/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/style.css')}}?v=3.2">
    <script src="{{asset('app/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/js/locales/fr.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/kartik-v-bootstrap/themes/explorer-fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/js/tinymce.min.js')}}"></script>
    <script src="{{asset('app/js/bootstrap-popover-x.min.js')}}"></script>
    <script src="{{asset('app/fancy_box/lib/jquery.mousewheel.pack.js?v=3.1.3')}}" type="text/javascript"></script>
    <script src="{{asset('app/fancy_box/source/jquery.fancybox.pack.js?v=2.1.5')}}" type="text/javascript"></script>
    <script
        src="{{asset('app/fancy_box/source/helpers/jquery.fancybox-buttons.js?v=1.0.5" type="text/javascript')}}"></script>
    <script
        src="{{asset('app/fancy_box/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7" type="text/javascript')}}"></script>
    <script
        src="{{asset('app/fancy_box/source/helpers/jquery.fancybox-media.js?v=1.0.6" type="text/javascript')}}"></script>
    <script type="text/javascript" src="{{asset('app/js/moment.min.js')}}"></script>
    <script src="{{asset('app/js/jquery-ui-timepicker-addon.js')}}" type="text/javascript"></script>
    <script src="{{asset('app/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}?v=7.3" type="text/javascript"></script>
    <script type="text/javascript">
        var base_url = "{{ url('admin') }}";
        var fc_path = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
