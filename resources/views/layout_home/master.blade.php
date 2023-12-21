<!doctype html>
<html lang="en">

<head>
    <base href="/">

    <title>{{ config('app.name', 'BIDAAA') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="" href="{{ asset('build/images/logo-rs.png') }}" />
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/build/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/css/lienhe.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/css/style.css') }}">
    <style>
        .form-block {
            display: flex;
            flex-direction: column;
        }

        .card-body {
            padding: 0px;
            margin: 0px;
            grid-area: auto;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 1);
            display: grid;
        }

        a.link-secondary.text-decoration-none {
            font-size: 15px;
            font-weight: 500;
        }
    </style>

    @yield('style')
</head>

<body class="landing is-preload">
    <header>
        @include('layout_home.header')
    </header>

    <main>
        @include('layout_home.banner')
        <hr>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <hr>
    <footer>
        @include('layout_home.footer')
        <div id="fb-root"></div>

        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>
    </footer>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/build/js/script.js') }}"></script>
    <script src="{{ asset('/build/js/jquery.min.js') }}"></script>
    @yield('script')
    <!-- Messenger Plugin chat Code -->


    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "188455621016069");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>
