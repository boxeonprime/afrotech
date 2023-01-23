<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    @include('includes.meta')
</head>
<body id='index'>
    <div class="container-fluid">
        <span></span><!-- Hack-->
        @include('includes.header')
        @include('includes.menus.index')
        @yield('content')
        @include('includes.footer')
  
</body>
</html>
