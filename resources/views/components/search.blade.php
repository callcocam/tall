   
   <div class="relative z-10" role="dialog" x-bind:aria-modal="open.toString()">
        <div x-cloak x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-description=" Command palette, show/hide based on modal state."
            class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>
        <div x-show="open" x-cloak x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            x-description=" Command palette, show/hide based on modal state."
            class="fixed inset-0 z-10 overflow-hidden p-4 sm:p-6 md:p-20  h-76 ">
           {{ $slot }}
        </div>
    </div>
