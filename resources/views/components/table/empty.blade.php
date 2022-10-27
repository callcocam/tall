@props(['route'=>route("dashboard")])
<div class="flex justify-center items-center flex-col">
    <img class="flex mx-auto" src="{{ asset('img/no-results.png') }}" alt="Nenhum resultado encontrado">
    <p class="text-gray-500 font-serif font-bold py-2">Não encontramos nenhum resultado...</p>
    <a class="py-2 px-4 flex rounded-md bg-indigo-600 text-gray-200 hover:bg-indigo-500 hover:text-gray-100" href="{{ $route }}"> Voltar para a dashboard</a>
</div>