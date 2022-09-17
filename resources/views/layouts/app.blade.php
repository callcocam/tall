<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="min-h-full" x-data="site" x-on:resize.window="updateSidebar">
    <div class="flex flex-col items-center justify-center ">
        <div class="bg-[#eee] w-full shadow-lg">
            <ul class="flex  mx-auto max-w-6xl py-2" aria-label="Controles de acessibilidade do site">
                {{-- <li role="menuitem" class="closeContrast">
                    <a href="acessibilidade.html" title="Acessar a página de acessibilidade" class="pgacessibilidade">
                        <span lang="pt-br">Acessibilidade</span>
                    </a>
                </li>

                <li role="menuitem" class="zoomButtons"><a href="#" title="Ampliar tela"
                        class="zoomIn gm5zoom"><span lang="pt-br">A+</span></a></li>

                <li role="menuitem" class="zoomButtons closeContrast"><a href="#" title="Reduzir tela"
                        class="zoomOut gm5zoom"><span lang="pt-br">A-</span></a></li>
                <li role="menuitem" class="contraste">

                    <a href="#" title="Contraste" class="contraste" aria-haspopup="true"><span
                            lang="pt-br">Contraste</span></a>
                    <div class="flex relative" aria-label="submenu">
                        <ul class="flex flex-col absolute top-0 left-0">
                            <li><a href="#" title="Preto, branco e amarelo" data-nivel="amarelopreto"><span
                                        lang="pt-br">Preto, branco e amarelo</span></a></li>
                            <li><a href="#" title="Contraste aumentado" data-nivel="altocontraste"><span
                                        lang="pt-br">Contraste aumentado</span></a></li>
                            <li><a href="#" title="Monocromático" data-nivel="monocromatico"><span
                                        lang="pt-br">Monocromático</span></a></li>
                            <li><a href="#" title="Escala de cinza invertida" data-nivel="cinzainvertida"><span
                                        lang="pt-br">Escala de cinza invertida</span></a></li>
                            <li><a href="#" title="Cor invertida" data-nivel="corinvertida"><span
                                        lang="pt-br">Cor invertida</span></a></li>
                            <li><a href="#" title="Cores originais" data-nivel="normal"><span lang="pt-br">Cores
                                        originais</span></a></li>
                        </ul>
                    </div>
                </li> --}}
                <li role="menuitem">
                    <a target="_blank" class="flex space-x-2 items-center" href="https://www.pinheiralprevi.rj.gov.br/webmail">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round"
                                d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg><span lang="pt-br">Webmail</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mx-auto max-w-6xl rounded-b-lg">
            <img class="rounded-b-lg" src="https://www.pinheiralprevi.rj.gov.br/dist/uploads/files/7/imagens/1.png" alt="">
        </div>
    </div>
    @livewire('tall::includes.site.nav.desktop-component')
    <div class="min-h-screen bg-gray-100">

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @livewire('tall::includes.site.footer-component')
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
