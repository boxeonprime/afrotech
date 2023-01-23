
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
</head>

<body class="about">
    <div class="container-fluid" class="bg-black">
        <span></span><!-- Hack-->
        @include('includes.header')
        @include('includes.menus.index')
        @yield('content')
    </div>
    @include('includes.footer')
</body>

</html>
