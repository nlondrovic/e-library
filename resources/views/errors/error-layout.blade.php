<!doctype html>
<html lang="en" class="h-full">
<head>
    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="ICT Cortex Library - project for high school students..."/>
    <meta name="keywords" content="ict cortex, cortex, fleka, highschool, students, coding, library"/>
    <meta name="author" content=""/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- End Meta -->

    <!-- Title -->
    <title> {{ __('Error') }} | {{ __(config('app.name')) }}</title>
    <!-- Icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon.ico')}}">
    <!-- End Title -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css">
    {{--        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
    <!-- End Styles -->
</head>

<body class="h-full" style="background-color: #dcb598">

    <main class="h-full">
        @yield('content')
    </main>

</body>

</html>
