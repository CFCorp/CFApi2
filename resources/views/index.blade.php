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
    <div class="center-object">
        <div class="box-container">
            <section class="me unset">
                <div class="avatar-container">
                    <img draggable="false" src="{{ asset('profile/profile.png') }}" class="image-title">
                </div>
                <div class="unset">
                    <h1 class="title monospace computerfreaker-text">CF's API</h1>
                    <h5 class="cubered-text">click one of the buttons to go to the corresponding API endpoint.</h5>
                </div>
            </section>
            <section class="buttons">
                <p>To see all current endpoints you have to login</p>
            </section>
            <section class="buttons">
                <a href="https://discord.gg/DDRbw7W" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="_blank">Main Server (Discord)</a>
                <a href="https://discord.gg/gzWwtWG" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="_blank">API Server (Discord)</a>
                @auth
                <a href="{{ route('home') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Dashboard</a>
                @endauth
            </section>
    </div>
    <a href="#login"><div class="arrow bounce">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 481.32 291.98" class="wisteria-fill">
                <path d="M466.5,15.5L466,15c-19.8-19.8-52-19.8-71.9,0L240.8,168.3L87.2,14.8C67.4-5,35.2-5,15.4,14.8l-0.5,0.5 C-5,35.2-5,67.4,14.8,87.2l186.6,186.6c0.9,1,1.8,2,2.7,3v0c3.8,3.8,8.1,6.9,12.7,9.3c17,9,38.1,7.7,53.9-3.9 c2.2-1.6,4.4-3.4,6.4-5.4L466.5,87.4C486.4,67.6,486.4,35.4,466.5,15.5z"/>
            </svg>
        </div></a>
</div>
<section class="container" id="login">
    <section class="box-container">
        <section class="table-container">
        @guest
        <section class="buttons">
        <a href="{{ route('login') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">login</a>
        </section>
        @endguest
        @auth
        <section class="buttons">
        <h3 class="computerfreaker-text">Welcome {{ Auth::user()->name }}, if you want to logout click here: </h3><a href="{{ route('signout') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">logout</a>
        </section>
        @endauth
        
        </section>
    </section>
</section>
</body>
</html>
