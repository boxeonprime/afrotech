@php
header('Accept-Encoding: gzip, compress, br');
@endphp
<title>@yield('title', config('app.name'))</title>
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="@yield('og:image')">
<meta property="og:image:alt" content="@yield('og:image:alt')">
<meta property="og:image:size" content="320" />
<meta property="og:locale" content="en-us" />
<meta property="og:locale:alternate" content="en-ca" />
<meta property="og:site_name" content="{{config('app.name')}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:site" content="{{config('app.name')}}" />
<meta name="keywords" content="@yield('keywords')">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" type="image/svg+xml" href="{{ asset('/assets/images/favicon.webp') }}">
<link rel="alternate icon" href="{{ asset('/assets/images/favicon.webp') }}">
<link rel="mask-icon" href="{{ asset('/assets/images/favicon.webp')}}" color="#fff">
<link rel="stylesheet" href="{{ asset('/assets/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/forms.min.css?v=35') }}">
<link defer rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
<link rel="stylesheet" media="screen and (min-width: 200px) and (max-width: 1810px)"
    href="{{ asset('/assets/css/mobile.min.css?v=3.6') }}" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script defer type="module" src="{{ asset('/assets/js/global.js?v=2.1') }}"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

 


