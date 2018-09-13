<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <title>Bánh tráng tô</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/web/assets/mobirise-icons/mobirise-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/tether/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/dropdown/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/socicon/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/theme/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/mobirise/css/mbr-additional.css') }}" type="text/css">


</head>
<body>

@yield('content')

<script type="text/javascript" src="{{ asset('dist/web/assets/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/popper/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/tether/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/smoothscroll/smooth-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/dropdown/js/script.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/ytplayer/jquery.mb.ytplayer.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/vimeoplayer/jquery.mb.vimeo_player.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/parallax/jarallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/bootstrapcarouselswipe/bootstrap-carousel-swipe.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/touchswipe/jquery.touch-swipe.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/theme/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/slidervideo/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>