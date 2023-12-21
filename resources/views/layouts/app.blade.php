<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="{{'/build/assets/images/logos/favicon.png'}}"> --}}
    <link rel="shortcut icon" type="image/png" href="asset('/build/images/logo-rs.png')" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/build/css/admin.css') }}" />


    <script src="https://cdn.tiny.cloud/1/9mwyc5z9bpezv562dehjun2odzvihx5nd0sz9hczg6qi4krm/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            language: 'sv',
            language_url: '/js/sv.js',
            plugins: 'myplugin',
            external_plugins: {
                'myplugin': '/js/myplugin/plugin.min.js'
            }
        });
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.navigation')

        <main>
            <div class="body-wrapper">
                @include('layouts.header')
                <div class="body-admin">
                    <div class="container">
                        {{ $slot }}
                    </div>
                </div>
        </main>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/build/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/build/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('/build/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/build/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('/build/assets/js/dashboard.js') }}"></script>
    <!-- script ajax (javascript) có thể đặt ở trong cặp thẻ head hoặc body -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("document").ready(function() {
            $(".btn-danger").click(function() {
                return confirm("Bạn có thực sự muốn xóa?");
            });
        });
    </script>
</body>

</html>
