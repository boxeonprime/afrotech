@include('includes.http-headers')
<span></span><!-- Hack !-->
<header>
    <span id="top-bar"></span>
    <div id="header-inner-wrapper">
        <span class="hide w900hide"></span>
        <a id='logo' href="/" title='Black Haveb'>
            <img id='logo' width="127px" height="50px" src='{{ asset('../assets/images/logo.webp') }}' alt='logo' />
        </a>
        <a class="button" href="https://www.indiegogo.com/project/preview/95da2bb8" title="Donate">Donate</a>
        <a class="button hide" href="/apply" title="RSVP">Request An Invitation <span class="material-symbols-outlined move-arrow-down">arrow_forward</span></a>
        <a class="button m-hide" href="/apply" title="Apply">Request</a>
    </div>
</header>
