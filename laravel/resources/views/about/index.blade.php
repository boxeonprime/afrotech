@extends('layouts.about')
@section('title', 'About AfroTok')
@section('og:image', asset('../assets/images/logo_square.png'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords', 'AfroTok, Video Streaming App, Black social network, Black mobile app')
@section('description', 'AfroTok is a video streaming app for black families and allies to replace TikTok.')
@section('content')

    <main id="about">
        <section class="section maxw1035 padding-1-em white">
            <h1 class="white font-size-3-em">The #BlackGirlFollowTrain movement continues with #BlackExitTrain...</h1>
            <div class="white text-align-left">
                <h2 class="uppercase green">Mission</h2>
                <p class="white">Establish Black first-class citizenship on Social</p>
            </div>
            <h2 class="uppercase green">Overview</h2>
            <p>AfroTok will be an invitation-only video streaming application that places the Black community first. It will be a
                safe space for collaboration, entertainment, discussion, and communalism.</p>
   
            <p>AfroTok will provide creators with more monitization opportunities, give all stakeholders
                a better experience on Social, and be governed by content guidelines germane to the Black community globally. </p>
            <h2 class="uppercase green">Background</h2>
            <p>At the end of 2022, after years of rampant abuse on TikTok, the Black community cried out for a TikTok
                replacement. The straw that broke the camel's back was the shadow banning of the #BlackGirlFollowTrain. This
                hashtag - still in its infancy, commanded almost 200 million views and was met with a deluge of complaints
                and reporting of content. The backlash falsely premised that Black women supporting each other in response
                to abuse and marginalization is, in fact, racist. TikTok responded by killing the hashtag's momentum.</p>

            <div class="div-horizontal-rule"></div>
            <div class="three-col-grid grid-gap-4-em maxw1035 padding-1-em">
                <div>
                    <h3 class="green">Estimated Cost</h3>
                    <p class="white">$100, 000</p>
                </div>
                <div>
                    <h3 class="green">Estimated Release Date</h3>
                    <p class="white">Spring 2023</p>
                </div>
                <div>
                    <h3 class="green">Project Leads</h3>
                    <p class="white">Genia Jackson, Trevor Prime</p>
                </div>

            </div>
            <div class="div-horizontal-rule"></div>
            <h2 class="uppercase green">Scope</h2>
            <p>The beta version of AfroTok will provide the following features:</p>
            <ol>
                <li>An app that works on Android & iOS.</li>
                <li>Account & profile creation</li>
                <li>Authentication with email & password</li>
                <li>Uploading videos with caption</li>
                <li>Video compression for speed</li>
                <li>Generating thumbnails out of videos</li>
                <li>Liking of videos</li>
                <li>Posting comments</li>
                <li>Liking comments</li>
                <li>Searching users</li>
                <li>Following and unfollowing users</li>
                <li>Displaying followers, following, likes, and posts by users</li>
                <li>TikTok-like user interface</li>
            </ol>
            <p>Based on feedback from beta users, version 1.0 of AfroTok may provide the following features:</p>
            <ol>
                <li>Event pages</li>
                <li>Patreon-like subscriptions to creators' walled-off content</li>
                <li>Live streaming</li>
                <li>Sharing of content</li>
                <li>Video playlists</li>
                <li>Suggested content</li>
                <li>Discover new creators</li>
                <li>Inbox</li>
                <li>Importing phone contacts</li>
                <li>Settings</li>
                <li>Popular topics</li>
                <li>Content reporting</li>
                <li>Duet this</li>
                <li>Stitch this</li>
                <li>Filters</li>
            </ol>
            <h2 class="uppercase green">Tech Stack</h2>
            <ol>
                <li>Server: Firebase Auth, Firebase Storage, Firebase Firestore, Java</li>

                <li>Client: Flutter, GetX</li>

                <li>Architecture: MVC</li>
            </ol>
            <h2 class="uppercase green">Contact</h2>
            <p>To get in touch with us please send an email to <a href="mailto:hello@afrotok.com" class="underline one-em-font">hello@afrotok.com</a></p>
        </section>
    </main>
@endsection
