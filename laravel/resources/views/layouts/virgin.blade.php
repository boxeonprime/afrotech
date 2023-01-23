<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
    @section('title', 'Boxeon.com')
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    @include('includes.meta')
</head>

<body id='index' class="virgin">
    <div id="container">
        <div id="virgin-header-wrapper">
            <div id="virgin-header" class="three-col-grid">

                <div>
                    <img class="w30px l-float" src="{{asset('../assets/images/sync.svg')}}" alt="Plan">
                    <p>Select Plan &nbsp;<span class="span-grayed-line"></span></p>
                </div>

                <div>
                    <img class="w30px l-float" src="{{asset('../assets/images/checkout.svg')}}" alt="Checkout">
                    <p>Checkout&nbsp;<span class="span-grayed-line"></span></p>
                </div>
                <div>
                    <img class="w30px l-float" src="{{asset('../assets/images/meals.svg')}}" alt="Meals">
                    <p>Select Meals&nbsp;<span class="span-grayed-line"></span></p>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    @include('includes.footer')
</body>

</html>
