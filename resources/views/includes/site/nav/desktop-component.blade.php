<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative z-10  bg-white  shadow">
    <div class="relative z-10 mx-auto shadow-lg flex max-w-7xl px-4 sm:px-6 lg:px-8 border-b-2 min-h-[4em]">
        <div class="flex flex-col lg:flex-row w-full" x-show="open" x-cloak>
            <!-- component -->
            @if ($menus = $this->menus)
                @foreach ($menus as $menu)
                    @if ($menu)
                        @if ($sub_menus = data_get($menu, 'sub_menus', []))
                            @if (count($sub_menus))
                                @include('tall::includes.site.nav.desktop-items-component',
                                    compact('sub_menus'))
                            @else
                                @include('tall::includes.site.nav.desktop-item-component', compact('menu'))
                            @endif
                        @endif
                    @endif
                @endforeach
            @endif
        </div>
        <button x-on:click="open = !open" class="block lg:hidden absolute right-2 top-5">X</button>
    </div>
</div>

<style>
    /* since nested groupes are not supported we have to use
     regular css for the nested dropdowns
  */
    /*
    li>ul {
        transform: translatex(100%) scale(0)
    }

    li:hover>ul {
        transform: translatex(100%) scale(1)
    }

    li>a svg {
        transform: rotate(-90deg)
    }

    li:hover>a svg {
        transform: rotate(-270deg)
    }

    /* Below styles fake what can be achieved with the tailwind config
     you need to add the group-hover variant to scale and define your custom
     min width style.
  See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
  for implementation with config file
  */
    /* .group:hover .group-hover\:scale-100 {
        transform: scale(1)
    }

    .group:hover .group-hover\:-rotate-180 {
        transform: rotate(180deg)
    }

    .scale-0 {
        transform: scale(0)
    }

    .min-w-32 {
        min-width: 8rem
    }  */
</style>
<style>
    /* since nested groupes are not supported we have to use
     regular css for the nested dropdowns
  */
    .scale-item {
        transform: translatex(100%) scale(0)
    }

    .scale-item-active {
        transform: translatex(100%) scale(1)
    }

    .scale-0 {
        transform: scale(0)
    }

    .scale-100 {
        transform: scale(1)
    }

    .min-w-32 {
        min-width: 8rem
    }
</style>
