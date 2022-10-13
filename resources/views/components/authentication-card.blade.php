<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
    <div class="bg-white block shadow rounded-t-lg max-w-lg mx-auto">
        <div class="sm:mx-auto sm:w-full sm:max-w-md p-3">
            {{ $logo }}
            <h2 class="mt-2 px-6 text-center text-md font-bold tracking-tight text-gray-900">
                {{ get_tenant()->name }}
            </h2>
        </div>
        <div class="mt-0 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="pt-2 pb-8 px-4  sm:rounded-lg sm:px-10">
                {{ $slot }}
                @isset($social)
                    <div class="mt-2">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-white px-2 text-gray-500">{{ __('Or continue with') }}</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-3 gap-3">
                            {{ $social }}
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
