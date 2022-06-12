<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="PIXINVENT" />
    <title>Login Page - {{env('APP_NAME')}}</title>
    <link rel="apple-touch-icon" href="{{asset('assets/app-assets/images/ico/apple-icon-120.png')}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/ico/favicon.ico')}}" />
    @include('includes.style-sheet')
</head>

<body class="vertical-layout vertical-menu 1-column blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    @include('includes.js-scripts')

</body>

</html>