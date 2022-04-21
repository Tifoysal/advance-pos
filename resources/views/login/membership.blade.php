<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V14</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/icon-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/daterangepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css">
    <meta name="robots" content="noindex, follow">
    <script nonce="8971166d-b29b-45cf-bb1b-5bb8246ef500">(function (w, d) {
            !function (a, e, t, r, z) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {deferred: []};
                var s = e.getElementsByTagName("title")[0];
                s && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.dataLayer = a.dataLayer || [], a.zaraz.track = (e, t) => {
                    for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                    a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                }, a.dataLayer.push({"zaraz.start": (new Date).getTime()}), a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0], z = e.createElement(r);
                    z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);</script>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

<h1>name: {{auth()->user()->name}}</h1>

            <div class="row">
                <div class="card col-12 col-md-6 col-lg-3">
                    <div class="card-wrapper card1">
                        <div class="card-box align-left">
                            <div class="iconfont-wrapper">
                                <span class="mbr-iconfont mobi-mbri-cash mobi-mbri"></span>
                            </div>
                            <h5 class="card-title mbr-fonts-style display-5">Basic</h5>
                            <p class="card-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</p>
                            <h6 class="link mbr-fonts-style display-4"><a href="{{route('membership.get','free')}}" class="text-info">Free</a></h6>
                        </div>
                    </div>
                </div>
                <div class="card col-12 col-md-6 col-lg-3">
                    <div class="card-wrapper card2">
                        <div class="card-box align-left">
                            <div class="iconfont-wrapper">
                                <span class="mbr-iconfont mobi-mbri-change-style mobi-mbri"></span>
                            </div>
                            <h5 class="card-title mbr-fonts-style display-5">Premium</h5>
                            <p class="card-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <h6 class="link mbr-fonts-style display-4">
                                <a href="{{route('membership.get','premium')}}" class="text-info">
                                    $100</a></h6>
                        </div>
                    </div>
                </div>
                <div class="card col-12 col-md-6 col-lg-3">
                    <div class="card-wrapper card3">
                        <div class="card-box align-left">
                            <div class="iconfont-wrapper">
                                <span class="mbr-iconfont mobi-mbri-photo mobi-mbri"></span>
                            </div>
                            <h5 class="card-title mbr-fonts-style display-5">Pro</h5>
                            <p class="card-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <h6 class="link mbr-fonts-style display-4"><a href="{{route('membership.get','pro')}}" class="text-info">$150</a></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>



<div id="dropDownSelect1"></div>

<script src="{{url('/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{url('/js/animsition.min.js')}}"></script>

<script src="{{url('/js/popper.js')}}"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="{{url('/js/select2.min.js')}}"></script>

<script src="{{url('/js/moment.min.js')}}"></script>
<script src="{{url('/js/daterangepicker.js')}}"></script>

<script src="{{url('/js/countdowntime.js')}}"></script>

<script src="{{url('/js/main.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"6eae7534ab2b4c0b","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}'
        crossorigin="anonymous"></script>
</body>
</html>
