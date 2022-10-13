<div x-clock x-data="search(false)" @click.away="open=false"
@close.stop="open=false">
    <div class="relative z-10" role="dialog" x-bind:aria-modal="open.toString()">

        <div x-cloak x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-description=" Command palette, show/hide based on modal state."
            class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>
        {{-- <x-circle-button x-show="!open" indigo icon="search" x-on:click="toggle" /> --}}

        <div x-show="open" x-cloak x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            x-description=" Command palette, show/hide based on modal state."
            class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">
            <!--
        Command palette, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
            <div
                class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                <div class="relative">
                    <!-- Heroicon name: mini/magnifying-glass -->
                    <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text"
                        class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm"
                        placeholder="Search..." role="combobox" aria-expanded="false" aria-controls="options">
                </div>

                <!-- Results, show/hide based on command palette state -->
                <ul class="max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm text-gray-800" id="options"
                    role="listbox">
                    <!-- Active: "bg-indigo-600 text-white" -->
                    <li x-on:click="toggle" class="select-none px-4 py-2 cursor-pointer" id="option-1" role="option"
                        tabindex="-1">Leslie
                        Alexander</li>
                </ul>
                <!-- Empty state, show/hide based on command palette state -->
                <p class="p-4 text-sm text-gray-500">No people found.</p>
            </div>
        </div>
    </div>
</div>