<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <!-- Meta Data -->
    <meta name="theme-color" content="#6600cc">
    <meta content="{{ asset('profile/profile.png') }}" property="og:image" />
    <link rel="icon" type="image/x-icon" href="{{ asset('profile/profile.png') }}">
    <meta content="dashboard" property="og:title" />

    <meta content="Dashboard" property="og:description" />
    <meta content="Dashboard" name="description" />

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
                <div class="table-container">
                <h3 class="title emerald-text"><i class="emoji blobcatbusiness"></i> Stats: </h3>
                <table>
                    <thead>
                    <tr>
                        <th>Endpoint Name</th>
                        <th>Amount of Images</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="emerald-text">Anime</span></td>
                            <td class="numeric gold-text bold">{{ $anime }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Hentai</span></td>
                            <td class="numeric gold-text bold">{{ $hentai }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">D.VA</span></td>
                            <td class="numeric gold-text bold">{{ $dva }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Trap</span></td>
                            <td class="numeric gold-text bold">{{ $trap }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Hug</span></td>
                            <td class="numeric gold-text bold">{{ $hug }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Baguette</span></td>
                            <td class="numeric gold-text bold">{{ $baguette }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Yuri</span></td>
                            <td class="numeric gold-text bold">{{ $yuri }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">Neko</span></td>
                            <td class="numeric gold-text bold">{{ $neko }}</td>
                        </tr>
                        <tr>
                            <td><span class="emerald-text">NSFW Neko</span></td>
                            <td class="numeric gold-text bold">{{ $nsfwneko }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <button onclick="{{ Illuminate\Support\Js::from(updateUserToken()) }}" type="button" class="btn animation hover-scale snapchat-text computerfreaker-bg black-dropshadow">Regenerate Token</button>
        </div>
    </div>
</div>
</body>
</html>
