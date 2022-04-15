<!DOCTYPE html>
<html>
<head>
    <title>CFs API</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <!-- Meta Data -->
    <meta name="theme-color" content="#6600cc">
    <meta content="{{ asset('profile/profile.png') }}" property="og:image" />
    <link rel="icon" type="image/x-icon" href="{{ asset('profile/profile.png') }}">
    <meta content="CFs API" property="og:title" />

    <meta content="CFs API" property="og:description" />
    <meta content="CFs API" name="description" />

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
<body class="github-font-standard" class="dark-primary">
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
                <a href="{{ route('anime') }}" class="btn github animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Anime</a>
                <a href="{{ route('hentai') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Hentai</a>
                <a href="{{ route('yuri') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Yuri</a>
                <a href="{{ route('dva') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">D.VA</a>
                <a href="{{ route('trap') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Trap</a>
            </section>
            <section class="buttons">
                <a href="{{ route('hug') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Hug</a>
                <a href="{{ route('neko') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Neko</a>
                <a href="{{ route('nsfwneko') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">NSFW Neko</a>
                <a href="{{ route('baguette') }}" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="">Baguette</a>
            </section>
            <section class="buttons">
                <a href="https://discord.gg/DDRbw7W" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="_blank">Main Server (Discord)</a>
                <a href="https://discord.gg/gzWwtWG " class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow" target="_blank">API Server (Discord)</a>
            </section>
        </div>

    </div>
</div>
</body>
</html>
