{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot> --}}


<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ 'css/navbar.css' }}" />
        <link rel="stylesheet" href="{{ 'css/home.css' }}" />
        <title>BiRent</title>
    </head>
    
    <body>
        <x-app-layout>
            <nav class="navbar">
                <div class="logo">
                    <img src="{{ 'images/logoBirent.png' }}" alt="">
                </div>
                <div class="nav-links">
                    <a href="#" class="active">HOME</a>
                    <a href="/cars">CARS</a>
                </div>
            </nav>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        <script src="{{ 'js/navbar.js' }}"></script>
    </x-app-layout>
</body>
</html>
