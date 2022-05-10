<!DOCTYPE html>
<html>
<head>
    <title>CF's API</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <!-- Meta Data -->
    <meta name="theme-color" content="#6600cc">
    <meta content="{{ asset('profile/profile.png') }}" property="og:image" />
    <link rel="icon" type="image/x-icon" href="{{ asset('profile/profile.png') }}">
    <meta content="CF's API" property="og:title" />

    <meta content="CF's API" property="og:description" />
    <meta content="CF's API" name="description" />

    <meta name="revisit-after" content="2 days">
    <meta name="keywords" content="computerfreaker, API, CFsAPI, Discord">

    <meta property="og:locale" content="en_US" />
    <link rel="canonical" href="https://computerfreaker.pw/" />
    <meta property="og:url" content="https://api.computerfreaker.pw/" />
    <meta property="og:site_name" content="api.computerfreaker.pw" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@computerfreaker" />

    <!-- CSS -->
    <link href="{{ asset('css/modesta.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/colours.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/markdown.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/twemoji.css') }}" type="text/css" rel="stylesheet">
</head>
<body class="github-font-standard dark-theme">
<div class="fullscreen">
    <div class="background" style="background-image: url('{{ asset('Image/background.jpg') }}');"></div>
    @csrf
    <div class="center-object">
        <form method="post">
            <h3 class="emerald-text">Change Your Email</h3>
            <div class="flex-grid">
                <div class="box-container text-left">
                    New Email:
                </div>
                <div class="box-container text-right">
                    <input type="password" name="new_email"/>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" value="Change Email">
            </div>
        </form>
    </div>
</div>
</body>
</html>