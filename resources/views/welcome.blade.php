<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
    <body>
        <div class="flex-center position-ref full-height">
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
                <div class="title m-b-md">
                    Laravel Exam
                </div>

                <span>
                    <b>Please do this command:</b> <br>
                    
                    <div style="color:red;">
                        composer install<br>
                        composer dump-autoload<br>
                        php artisan migrate<br><br>
                    </div> 

                    <b>Database Details</b><br>
                    <div style="color:red;">
                        DB_DATABASE=exam<br>
                        DB_USERNAME=root<br>
                        DB_PASSWORD=<br><br>
                    </div>

                    <b>To run the CRON or SCHEDULER, run this command</b><br>
                    <div style="color:red;">
                        php artisan import:players <br><br>
                    </div>

                    <b>To run PHPUnit Testing, run this command</b><br>
                    <div style="color:red;">
                        ./vendor/bin/phpunit
                    </div>
                </span><br><br>
                <b>Sample call to action URL</b>
                <div class="links">
                    <a href="{{ url('api/all-players') }}">{{ url('api/all-players') }}</a>
                    <a href="{{ url('api/single-player/1') }}">{{ url('api/single-player/1') }}</a>
                </div>                
            </div>
        </div>
    </body>
</html>
