<?php
function makeRandomString($bits = 256) {
    $bytes = ceil($bits / 8);
    $return = '';
    for ($i = 0; $i < $bytes; $i++) {
        $return .= chr(mt_rand(0, 256));
    }
    return $return;
}
$hash =  hash('sha256', makeRandomString());
$cookie = "nonce-" . $hash;
setcookie('hash', $cookie);

header("Content-Security-Policy: default-src 'self' https://l.sharethis.com https://www.google-analytics.com https://nd.squarecdn.com https://pci-connect.squareupsandbox.com https://www.googleanalytics.com; script-src-elem 'self' https://lf16-tiktok-web.tiktokcdn-us.com/obj/tiktok-web-tx/tiktok/falcon/embed/embed_lib_v1.0.11.js https://www.googletagmanager.com https://www.tiktok.com https://lf16-tiktok-web.tiktokcdn-us.com/obj/tiktok-web-tx/tiktok/falcon/embed/embed_v1.0.11.js; img-src 'self' https://lf16-tiktok-web.tiktokcdn-us.com https://l.sharethis.com/ https://lh3.googleusercontent.com https://platform-cdn.sharethis.com http://img.youtube.com https://shippo-static.s3.amazonaws.com; frame-ancestors 'self'; child-src 'self' https://nd.squarecdn.com https://accounts.google.com/ https://www.youtube.com; object-src 'self' https://youtube.com; media-src 'self' https://youtube.com https://www.youtube.com; base-uri https://boxeon.com; form-action 'self'; font-src 'self' https://fonts.gstatic.com; style-src 'self' 'unsafe-inline' https://maxcdn.bootstrapcdn.com https://lf16-tiktok-web.tiktokcdn-us.com/obj/tiktok-web-tx/tiktok/falcon/embed/embed_lib_v1.0.11.css https://sandbox.web.squarecdn.com https://fonts.googleapis.com; frame-src 'self' https://lf16-tiktok-web.tiktokcdn-us.com https://www.tiktok.com https://www.google.com https://lf16-tiktok-web.tiktokcdn-us.com https://accounts.google.com https://connect.squareupsandbox.com https://sandbox.web.squarecdn.com/ https://www.youtube.com; script-src 'self' $cookie https://count-server.sharethis.com https://nd.squarecdn.com https://js.squareupsandbox.com  https://l.sharethis.com https://buttons-config.sharethis.com/js/63371544b22a350012c877a6.js https://platform-api.sharethis.com/js/sharethis.js http://www.googletagmanager.com https://sandbox.web.squarecdn.com https://apis.google.com https://ajax.googleapis.com");

