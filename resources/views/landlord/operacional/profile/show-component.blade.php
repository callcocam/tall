<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('User') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ $title }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $model->name }}</h3>
                            {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p> --}}
                        </div>
                        <div class="border-t border-gray-200">
                            <div>
                                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        @livewire('tall::landlord.operacional.profile.update-profile-information-form')

                                        <x-jet-section-border />
                                    @endif

                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('tall::landlord.operacional.profile.update-password-form')
                                        </div>

                                        <x-jet-section-border />
                                    @endif

                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('tall::landlord.operacional.profile.two-factor-authentication-form')
                                        </div>

                                        <x-jet-section-border />
                                    @endif

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('tall::landlord.operacional.profile.logout-other-browser-sessions-form')
                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                        <x-jet-section-border />

                                        <div class="mt-10 sm:mt-0">
                                            @livewire('tall::landlord.operacional.profile.delete-user-form')
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
