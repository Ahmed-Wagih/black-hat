<!doctype html> <html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{
    LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ignite The game - @yield('page_title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="Welcome to the engagement app for Ignite The game event use it now 🚀" />
    <meta name="keywords" content="Welcome to the engagement app for Ignite The game event use it now 🚀" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Ignite The game" />
    <meta property="og:url" content="https://haymna.com" />
    <meta property="og:site_name" content="haymna | Ignite" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="https://haymna.com" />
    <link rel="shortcut icon" href="#" />
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}?v={{ rand(1111,9999) }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}?v={{ rand(1111,9999) }}">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap.rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/style.rtl.css') }}?v={{ rand(1111,9999) }}">

        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
            integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <!--begin::Google tag-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            th {
                font-family: 'Cairo', Sans-Serif !important;
                text-align: right;
            }
        </style>
    @endif
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    @stack('styles')
</head>

<body style="min-height: 100vh;" onload="init()">
    <header class="text-center">
        <div class="logo">
            <img class="img-fluid" src="{{ asset('web/images/logo-w.png') }}" alt="">
        </div>
    </header>

    @yield('content')

    <script src="{{ asset('web/js/jquery-7-1.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    {{-- Start chat js  --}}
    @if(auth()->user())
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('dc07f9f060800369c3bf', {
            cluster: 'mt1'
        });
        var channel = pusher.subscribe('chat{{ auth()->user()->id }}');
        channel.bind('chatMessage', function(data) {
            addNotification();
            appendMessageToReceiver(data.message);
        });
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $("#sendMessage").click(function() {
                sendMessage()
            });

            $("#chatInput").keypress(function(e) {
                if (e.which === 13 && !e.shiftKey) {
                    sendMessage();
                    return false;
                }
            });


        });

        function addNotification() {
            var audio = $('<audio>');
            audio.attr('src', '{{ asset('web/sounds/iphone_sms.mp3') }}');
            $('body').append(audio);
            audio[0].play();
            var messagesNotificationSpan = $('.messages-number');
            var messagesNuber = messagesNotificationSpan.html();
            messagesNotificationSpan.html(parseInt(messagesNuber) + 1);
            messagesNotificationSpan.removeClass('d-none');
        }
    </script>
    {{-- End chat js  --}}

    @stack('scripts')


</body>

</html>