<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body onLoad="renderTime();">
        <div class="flex-center position-ref full-height" id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <router-view></router-view>
            </div>
        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
        <script>
            function renderTime() {
                // DATE
                var myDate = new Date();
                var year = myDate.getFullYear();

                var day = myDate.getDay();
                var month = myDate.getMonth();
                var date = myDate.getDate();

                var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                // TIME
                var currentTime = new Date();
                var h = currentTime.getHours();
                var m = currentTime.getMinutes();
                var s = currentTime.getSeconds();
                    if (h == 24) {
                        h = 0;
                    }
                    else if (h > 12) {
                        h = h - 12;
                    }

                    if (h < 10) {
                        h = "0" + h;
                    }

                    if (m < 10) {
                        m = "0" + m;
                    }

                    if (s < 10) {
                        s = "0" + s;
                    }
                
                var dateNow = document.getElementById("Date");
                dateNow.textContent = " " + days[day] + " " + date + " " + months[month] + " " + year + " ";
                // dateNow.innerText = " " + days[day] + " " + date + " " + months[month] + " " + year + " " + " | " + h + ":" + m + ":" + s;

                var timeNow = document.getElementById("Time");
                timeNow.textContent = h + ":" + m + ":" + s;

                setTimeout("renderTime()", 1000);
            }
            renderTime();
        </script>
    </body>
</html>
