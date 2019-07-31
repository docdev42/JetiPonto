<!DOCTYPE html>

<html>
</head></head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JetPonto') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <script defer src="{{ asset('js/jetponto.js') }}"></script>

<body>
    <header>
        <nav class="level navbar">
            <p class="level-item has-text-centered">
                <a class="link is-info">Home</a>
            </p>
            <p class="level-item has-text-centered">
                <a class="link is-info">Menu</a>
            </p>
            <p class="level-item has-text-centered">
                <img src="https://bulma.io/images/bulma-type.png" alt="" style="height: 30px;">
            </p>
            <p class="level-item has-text-centered">
                <a class="link is-info">Reservations</a>
            </p>
            <p class="level-item has-text-centered">
                <a class="link is-info">Contact</a>
            </p>
        </nav>
    </header>

    <div class="container">
        <div class="level section">
            <div class="level-left">
                <div class="level-item">
                    <h1>{{ $user->name }}</h1>
                </div>
            </div>
        

            <div class="level-right">
                <div class="level-item">
                    {!! QrCode::size('500')->generate($user->email); !!}
                </div>
            </div>
        </div>
</div>

</body>
</html>