<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('GradeYantra', 'GradeYantra') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 " style="background-image: linear-gradient(to top, #fddb92 0%, #d1fdff 100%);">
            <div>
                <a href="/">
                <img src="./images/IITB.png" style="width: 80px;">
                </a>
            </div>
            <div class="bg-white mt-4 px-3 p-1 rounded-lg">
            <h1 class=" font-medium text-xl text-black-700">GradeYantra Login <i class="fa fa-sign-in" aria-hidden="true"></i>
            </h1>
            </div>
            <div class="w-full sm:max-w-md mt-4 px-6 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
