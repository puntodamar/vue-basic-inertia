<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    @routes
    <style>
        @import "tailwindcss";
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    @inertia
</body>
</html>
