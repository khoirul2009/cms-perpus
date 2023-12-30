<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS - Perpus</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif

        <div class=" mx-auto">
            <div class="hero min-h-screen bg-base-200 ">
                <div class="hero-content flex-col lg:flex-row">
                    <img src="/assets/library.svg" class="max-w-lg rounded-lg " />
                    <div>
                        <h1 class="text-5xl font-bold">Selamat Datang di CMS - Perpus</h1>
                        <p class="py-6">"Perpustakaan menyimpan energi yang memicu imajinasi. Perpustakaan membuka
                            jendela ke dunia dan menginspirasi kita untuk mengeksplorasi dan mencapai, dan berkontribusi
                            untuk meningkatkan kualitas hidup kita." - Sidney Sheldon</p>
                        <a href="/dashboard" wire:navigate class="btn btn-primary">Get Started</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
