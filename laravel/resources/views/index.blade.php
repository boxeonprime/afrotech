@extends('layouts.index')
@section('title', 'AfroTok - Take back control')
@section('og:image', asset('../assets/images/logo-square.webp'))
@section('og:image:alt', asset('../assets/images/logo-square2.webp'))
@section('keywords', 'AfroTok, Black social network, Black owned social media, black exit train')
@section('description', 'AfroTok is an invite-only video streaming app for the global black community with an algorithm that centers us.')
@section('content')
    <div id="masthead" class="margin-top-4-em">
        <aside class="asides call-out mobile-scroll two-col-grid">
            <div>
                <br>
                <img id="logo-main" width="160px" class="r-float" src="{{ asset('../assets/images/logo-black.webp') }}" alt="AfroTok">
                <h1 id="headline_h1" class="r-float font-size-2-5-em green">Take back control</h1>
                <p id="pitch-2" class="text-align-right max-width-25-em r-float">AfroTok is an
                    invite-only video streaming app for the black community that provides legal protection for original content and features an algorithm placing them first.</p>

                <button id="donate-btn" class="donate r-float button">DONATE</button>
            </div>
            <div>
                <img id="app-preview" width="317px" src="{{ asset('../assets/images/app-preview.webp') }}"
                    alt="AfroTok"><br>
            </div>
        </aside>
        <br>
    </div>
    <main>
        @include('includes.works')
        <section class='section maxw1035'>
            <section class="section maxw1035 margin-top-4-em wide four-col-grid grid-gap-4-em">
                <span></span>
                <img class="w100per" src={{ asset('../assets/images/tok2.webp') }} alt="Inside Box">
                <div class="w-max-content margin-top-2em">
                    <h2 class="font-size-3-em sentence-case text-black margin-top-zero">Content to expect&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </h2>
                    <h3 class="text-black">✓ Inspirational</h3>
                    <h3 class="text-black">✓ Motivational</h3>
                    <h3 class="text-black">✓ Educational</h3>
                    <h3 class="text-black">✓ Cultural</h3>
                    <h3 class="text-black">✓ Communalistic</h3>
                    <button class="request" class="w100per button">REQUEST INVITATION</button>
                </div>
                <span></span>
            </section>
            <section class="section  maxw1035 margin-top-4-em wide four-col-grid grid-gap-4-em">
                <span></span>
                <img class="w100per" src={{ asset('../assets/images/tok.jpeg') }} alt="Inside Box">
                <div class="w-max-content margin-top-2em">
                    <h2 class="font-size-3-em sentence-case text-black margin-top-zero">Benefits for creators</h2>
                    <h3 class="text-black">✓ Content ownership</h3>
                    <h3 class="text-black">✓ Protection for original content</h3>
                    <h3 class="text-black">✓ Patreon-like memberships</h3>
                    <h3 class="text-black">✓ Profit sharing</h3>
                    <h3 class="text-black">✓ Black centered algorithm</h3>
                    <button class="request" class="w100per button">REQUEST INVITATION</button>
                </div>
                <span></span>
            </section>
            <section class="section margin-top-4-em wide">
                <span></span>
                <div>
                    <h2 class="centered sentence-case text-black font-size-3-em">Join the movement. <br>Tag
                        #AfroTok #TakeBackControl</h2>
                    <div id="tiktok-videos" class="three-col-grid">
                        <div class="p-relative">
                            <img id="genia.mp4" class="w100per margin-auto" loading="lazy" src="{{ '../assets/images/video-thumb.webp' }}" alt="Endorsement">
                            <div class="play-btn" data-video="genia.mp4">
                                <img src="{{'../assets/images/play.svg'}}" alt="Play">
                            </div>
                        </div>
                        <div class="p-relative">
                            <img loading="lazy" class="w100per margin-auto" src="{{ '../assets/images/video-thumb.webp' }}" alt="Endorsement">
                            <div class="play-btn" data-video="test1.mp4">
                                <img src="{{'../assets/images/play.svg'}}" alt="Play">
                            </div>
                        </div>
                        <div class="p-relative">
                            <img loading="lazy" class="w100per margin-auto" src="{{ '../assets/images/video-thumb.webp' }}" alt="Endorsement">
                            <div class="play-btn" data-video="test2.mp4">
                                <img src="{{'../assets/images/play.svg'}}" alt="Play">
                            </div>
                        </div>
                    </div>
                </div>
                <span></span>
            </section>
            <section class="maxw1035px">
                <a href="https://www.indiegogo.com/project/preview/95da2bb8" class="donate margin-auto button">DONATE</a>
            </section>
            <br><br>
        </section>
    </main>
@endsection
