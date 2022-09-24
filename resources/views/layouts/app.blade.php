<!DOCTYPE html>
<html lang="en">

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
    <title> @yield('title') - {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/library-favicon.ico') }}" type="image/vnd.microsoft.icon"/>
    <!-- End Title -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"
    />
{{--        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
    <!-- End Styles -->
</head>

<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
<!-- Header -->
@include('components.dashboard.header')
<!-- End Header -->


<!-- Main content -->
<main class="flex flex-row small:hidden">
    <!-- Sidebar -->
    @include('components.dashboard.sidebar')
    <!-- End Sidebar -->

    <!-- Checks if session has flash message -->
    @if(session()->has('flash-success'))
        @include('components.flash-success')
    @endif

    <!-- Content -->
    <section class="w-screen h-screen py-4 pl-[60px] text-[#212121]">
        @yield('main')
    </section>
    <!-- End Content -->
</main>
<!-- End Main content -->


<!-- Notification for small devices -->
@include('components/inProgress')

<!-- Scripts -->
@include('components/scripts')
<!-- End Scripts -->

</body>

</html>
