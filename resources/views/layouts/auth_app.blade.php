<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="clothing store for male fashion">
    <meta name="keywords" content="clothing, fashion, male, outfit">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Indigo Muse</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #bd6b3d;
        }

        .form input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }

        .form a {
            color: #bd6b3d;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form input.button:hover {
            background: #a15529;
        }

        label.login-link {
            color: #bd6b3d;
            cursor: pointer;
        }

        label.login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        @yield('content')
    </div>
</body>

</html>
