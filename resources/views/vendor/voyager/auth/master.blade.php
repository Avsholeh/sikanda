<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>@yield('title', 'Login - '.Voyager::setting("admin.title"))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {
            background-image: url('{{ setting('admin.bg_image') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .panel-rounded {
            border-radius: 15px;
        }

        .panel {
            box-shadow: 5px 5px 5px grey;
        }

        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }
    </style>

    @yield('pre_css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 3rem">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <div style="margin: auto">
                <div class="panel panel-rounded">
                    <div class="panel-body" style="padding: 2em">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('post_js')
</body>
</html>
