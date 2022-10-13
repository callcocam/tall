<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center text-center px-4 py-2 bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition']) }}>
   <span class="mx-auto"> {{ $slot }}</span>
</button>
