
<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>

    @include('includes.meta')

</head>
<body id='index'>
    @if (session()->has('message'))
    <dialog class="alert">
        <p class='centered'> {{ session()->get('message') }}</p>
    </dialog>
@endif
    <div id="container">
       
        @include('includes.header')
        <span></span>
        @include('includes.menus.index')
        @yield('content')
    </div>
    @include('includes.footer')
</body>
</html>
