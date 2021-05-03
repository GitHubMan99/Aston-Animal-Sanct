<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aston Animal Sanctuary</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
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

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        a:hover {
            background-color: rgb(175, 206, 211);
            color: rgb(56, 53, 52);
        }

        div.absolute {
            position: absolute;
            top: 200px;
        }

    </style>
</head>

<body>

    <div class="flex-center position:absolute">

    </div>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="80.000000pt" height="80.000000pt"
                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                    <path d="M1265 4793 c-381 -35 -740 -235 -970 -542 -206 -273 -304 -603 -292
       -982 9 -296 65 -506 218 -804 332 -651 1046 -1320 2187 -2050 l152 -97 168
       107 c1254 807 1982 1528 2266 2245 88 223 126 420 126 652 -1 596 -292 1090
       -789 1338 -180 89 -345 128 -596 137 -465 17 -785 -91 -1112 -375 l-63 -54
       -62 54 c-258 223 -503 333 -820 368 -91 9 -322 11 -413 3z m975 -1156 c62 -29
       142 -113 179 -189 130 -264 26 -567 -194 -568 -194 0 -374 275 -337 515 17
       110 56 185 120 229 69 47 146 52 232 13z m910 5 c42 -16 106 -95 130 -158 40
       -107 25 -276 -34 -393 -37 -72 -119 -156 -181 -186 -265 -125 -455 228 -295
       546 88 172 238 249 380 191z m-1484 -658 c143 -68 262 -282 239 -431 -19 -128
       -94 -198 -210 -197 -79 0 -142 31 -215 104 -265 265 -120 671 186 524z m2068
       9 c124 -64 149 -239 59 -417 -137 -271 -452 -299 -505 -44 -55 265 238 567
       446 461z m-1041 -289 c274 -71 564 -356 673 -659 62 -175 72 -383 23 -481 -50
       -100 -114 -109 -319 -49 -270 80 -300 86 -436 92 -153 6 -205 -2 -466 -77
       -175 -51 -265 -63 -305 -41 -66 35 -93 112 -93 266 0 196 67 385 198 560 136
       183 331 331 502 382 90 26 142 28 223 7z" />
                </g>
            </svg>
            <div class="title m-b-md">
                Aston Animal Sanctuary
            </div>


            <div class="links">
                @if (Route::has('login') && Auth::check())
                    <a href="{{ url('/list') }}">See Animals</a>

                @elseif (Route::has('login') && !Auth::check())

                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>

                @endif
            </div>
        </div>
    </div>
</body>

</html>
