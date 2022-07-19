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
    <!-- End Meta -->

    <!-- Title -->
    <title>Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/library-favicon.ico') }}" type="image/vnd.microsoft.icon"/>
    <!-- End Title -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End Styles -->
</head>

<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
<!-- Header -->
@include('components/header')
<!-- End Header -->


<!-- Main content -->
<main class="flex flex-row small:hidden">
    <!-- Sidebar -->
@include('components/sidebar')
<!-- End Sidebar -->

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
