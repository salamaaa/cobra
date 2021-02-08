<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cobra') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<div id="app">
    <section class="px-8 mb-6">
        <header class="container mx-auto">
            <img src="{{asset('img/Cobra-logo.png')}}" width="150" height="130" alt="">
        </header>
    </section>
    <section class="px-8 py-4">
        <main class="mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-32">
                    @include('cobra.sidebar_links')
                </div>
                <div class="lg:flex-1 lg:mx-12" style="max-width: 700px">
                    @yield('content')
                </div>
                <div class="lg:w-1/6 bg-green-100 rounded-lg p-4">@include('cobra.friends_list')</div>
            </div>


        </main>
    </section>
</div>
</body>
</html>
