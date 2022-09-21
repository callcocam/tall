<div x-data="{
    openIcon: false,
    toggleDropdown() {
        this.openIcon = !this.openIcon
    },
}">
    <label for="combobox-label" class="block text-sm font-medium text-gray-700">Icone</label>
    <div class="relative mt-1">
        <input x-on:focus="openIcon = true" wire:model.debounce.500ms="filters.icone" autocomplete="off"
            id="combobox-tall::icone" type="text" placeholder="cog"
            class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
            role="combobox" aria-controls="options" :aria-expanded="openIcon.toString()" aria-expanded="false">
        <div class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 space-x-2 focus:outline-none">
            <button type="button" x-on:click="toggleDropdown"
                class="flex items-center rounded-r-md focus:outline-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul x-show="openIcon"
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            id="options-icone" role="listbox">
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-academic-cap" role="option" tabindex="0">
                <label for="632462b3222aa-icone-academic-cap" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.academic-cap class="h-5 w-5" /><span>academic-cap</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="academic-cap"
                        id="632462b3222aa-icone-academic-cap">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-adjustments" role="option" tabindex="1">
                <label for="632462b3222aa-icone-adjustments" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.adjustments class="h-5 w-5" /><span>adjustments</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="adjustments"
                        id="632462b3222aa-icone-adjustments">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-annotation" role="option" tabindex="2">
                <label for="632462b3222aa-icone-annotation" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.annotation class="h-5 w-5" /><span>annotation</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="annotation"
                        id="632462b3222aa-icone-annotation">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-archive" role="option" tabindex="3">
                <label for="632462b3222aa-icone-archive" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.archive class="h-5 w-5" /><span>archive</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="archive"
                        id="632462b3222aa-icone-archive">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-circle-down" role="option" tabindex="4">
                <label for="632462b3222aa-icone-arrow-circle-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-circle-down class="h-5 w-5" /><span>arrow-circle-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-circle-down"
                        id="632462b3222aa-icone-arrow-circle-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-circle-left" role="option" tabindex="5">
                <label for="632462b3222aa-icone-arrow-circle-left" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-circle-left class="h-5 w-5" /><span>arrow-circle-left</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-circle-left"
                        id="632462b3222aa-icone-arrow-circle-left">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-circle-right" role="option" tabindex="6">
                <label for="632462b3222aa-icone-arrow-circle-right" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-circle-right class="h-5 w-5" /><span>arrow-circle-right</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-circle-right"
                        id="632462b3222aa-icone-arrow-circle-right">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-circle-up" role="option" tabindex="7">
                <label for="632462b3222aa-icone-arrow-circle-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-circle-up class="h-5 w-5" /><span>arrow-circle-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-circle-up"
                        id="632462b3222aa-icone-arrow-circle-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-down" role="option" tabindex="8">
                <label for="632462b3222aa-icone-arrow-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-down class="h-5 w-5" /><span>arrow-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-down"
                        id="632462b3222aa-icone-arrow-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-left" role="option" tabindex="9">
                <label for="632462b3222aa-icone-arrow-left" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-left class="h-5 w-5" /><span>arrow-left</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-left"
                        id="632462b3222aa-icone-arrow-left">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-narrow-down" role="option" tabindex="10">
                <label for="632462b3222aa-icone-arrow-narrow-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-narrow-down class="h-5 w-5" /><span>arrow-narrow-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-narrow-down"
                        id="632462b3222aa-icone-arrow-narrow-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-narrow-left" role="option" tabindex="11">
                <label for="632462b3222aa-icone-arrow-narrow-left" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-narrow-left class="h-5 w-5" /><span>arrow-narrow-left</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-narrow-left"
                        id="632462b3222aa-icone-arrow-narrow-left">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-narrow-right" role="option" tabindex="12">
                <label for="632462b3222aa-icone-arrow-narrow-right" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-narrow-right class="h-5 w-5" /><span>arrow-narrow-right</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-narrow-right"
                        id="632462b3222aa-icone-arrow-narrow-right">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-narrow-up" role="option" tabindex="13">
                <label for="632462b3222aa-icone-arrow-narrow-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-narrow-up class="h-5 w-5" /><span>arrow-narrow-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-narrow-up"
                        id="632462b3222aa-icone-arrow-narrow-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-right" role="option" tabindex="14">
                <label for="632462b3222aa-icone-arrow-right" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-right class="h-5 w-5" /><span>arrow-right</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-right"
                        id="632462b3222aa-icone-arrow-right">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrow-up" role="option" tabindex="15">
                <label for="632462b3222aa-icone-arrow-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrow-up class="h-5 w-5" /><span>arrow-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrow-up"
                        id="632462b3222aa-icone-arrow-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-arrows-expand" role="option" tabindex="16">
                <label for="632462b3222aa-icone-arrows-expand" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.arrows-expand class="h-5 w-5" /><span>arrows-expand</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="arrows-expand"
                        id="632462b3222aa-icone-arrows-expand">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-at-symbol" role="option" tabindex="17">
                <label for="632462b3222aa-icone-at-symbol" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.at-symbol class="h-5 w-5" /><span>at-symbol</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="at-symbol"
                        id="632462b3222aa-icone-at-symbol">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-backspace" role="option" tabindex="18">
                <label for="632462b3222aa-icone-backspace" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.backspace class="h-5 w-5" /><span>backspace</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="backspace"
                        id="632462b3222aa-icone-backspace">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-badge-check" role="option" tabindex="19">
                <label for="632462b3222aa-icone-badge-check" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.badge-check class="h-5 w-5" /><span>badge-check</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="badge-check"
                        id="632462b3222aa-icone-badge-check">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-ban" role="option" tabindex="20">
                <label for="632462b3222aa-icone-ban" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.ban class="h-5 w-5" /><span>ban</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="ban"
                        id="632462b3222aa-icone-ban">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-beaker" role="option" tabindex="21">
                <label for="632462b3222aa-icone-beaker" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.beaker class="h-5 w-5" /><span>beaker</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="beaker"
                        id="632462b3222aa-icone-beaker">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-bell" role="option" tabindex="22">
                <label for="632462b3222aa-icone-bell" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.bell class="h-5 w-5" /><span>bell</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="bell"
                        id="632462b3222aa-icone-bell">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-book-open" role="option" tabindex="23">
                <label for="632462b3222aa-icone-book-open" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.book-open class="h-5 w-5" /><span>book-open</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="book-open"
                        id="632462b3222aa-icone-book-open">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-bookmark" role="option" tabindex="24">
                <label for="632462b3222aa-icone-bookmark" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.bookmark class="h-5 w-5" /><span>bookmark</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="bookmark"
                        id="632462b3222aa-icone-bookmark">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-bookmark-alt" role="option" tabindex="25">
                <label for="632462b3222aa-icone-bookmark-alt" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.bookmark-alt class="h-5 w-5" /><span>bookmark-alt</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="bookmark-alt"
                        id="632462b3222aa-icone-bookmark-alt">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-briefcase" role="option" tabindex="26">
                <label for="632462b3222aa-icone-briefcase" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.briefcase class="h-5 w-5" /><span>briefcase</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="briefcase"
                        id="632462b3222aa-icone-briefcase">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cake" role="option" tabindex="27">
                <label for="632462b3222aa-icone-cake" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cake class="h-5 w-5" /><span>cake</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cake"
                        id="632462b3222aa-icone-cake">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-calculator" role="option" tabindex="28">
                <label for="632462b3222aa-icone-calculator" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.calculator class="h-5 w-5" /><span>calculator</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="calculator"
                        id="632462b3222aa-icone-calculator">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-calendar" role="option" tabindex="29">
                <label for="632462b3222aa-icone-calendar" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.calendar class="h-5 w-5" /><span>calendar</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="calendar"
                        id="632462b3222aa-icone-calendar">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-camera" role="option" tabindex="30">
                <label for="632462b3222aa-icone-camera" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.camera class="h-5 w-5" /><span>camera</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="camera"
                        id="632462b3222aa-icone-camera">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cash" role="option" tabindex="31">
                <label for="632462b3222aa-icone-cash" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cash class="h-5 w-5" /><span>cash</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cash"
                        id="632462b3222aa-icone-cash">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chart-bar" role="option" tabindex="32">
                <label for="632462b3222aa-icone-chart-bar" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chart-bar class="h-5 w-5" /><span>chart-bar</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chart-bar"
                        id="632462b3222aa-icone-chart-bar">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chart-pie" role="option" tabindex="33">
                <label for="632462b3222aa-icone-chart-pie" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chart-pie class="h-5 w-5" /><span>chart-pie</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chart-pie"
                        id="632462b3222aa-icone-chart-pie">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chart-square-bar" role="option" tabindex="34">
                <label for="632462b3222aa-icone-chart-square-bar" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chart-square-bar class="h-5 w-5" /><span>chart-square-bar</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chart-square-bar"
                        id="632462b3222aa-icone-chart-square-bar">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chat" role="option" tabindex="35">
                <label for="632462b3222aa-icone-chat" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chat class="h-5 w-5" /><span>chat</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chat"
                        id="632462b3222aa-icone-chat">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chat-alt" role="option" tabindex="36">
                <label for="632462b3222aa-icone-chat-alt" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chat-alt class="h-5 w-5" /><span>chat-alt</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chat-alt"
                        id="632462b3222aa-icone-chat-alt">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chat-alt-2" role="option" tabindex="37">
                <label for="632462b3222aa-icone-chat-alt-2" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chat-alt-2 class="h-5 w-5" /><span>chat-alt-2</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chat-alt-2"
                        id="632462b3222aa-icone-chat-alt-2">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-check" role="option" tabindex="38">
                <label for="632462b3222aa-icone-check" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.check class="h-5 w-5" /><span>check</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="check"
                        id="632462b3222aa-icone-check">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-check-circle" role="option" tabindex="39">
                <label for="632462b3222aa-icone-check-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.check-circle class="h-5 w-5" /><span>check-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="check-circle"
                        id="632462b3222aa-icone-check-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-double-down" role="option" tabindex="40">
                <label for="632462b3222aa-icone-chevron-double-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-double-down class="h-5 w-5" /><span>chevron-double-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-double-down"
                        id="632462b3222aa-icone-chevron-double-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-double-left" role="option" tabindex="41">
                <label for="632462b3222aa-icone-chevron-double-left" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-double-left class="h-5 w-5" /><span>chevron-double-left</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-double-left"
                        id="632462b3222aa-icone-chevron-double-left">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-double-right" role="option" tabindex="42">
                <label for="632462b3222aa-icone-chevron-double-right" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-double-right class="h-5 w-5" /><span>chevron-double-right</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-double-right"
                        id="632462b3222aa-icone-chevron-double-right">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-double-up" role="option" tabindex="43">
                <label for="632462b3222aa-icone-chevron-double-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-double-up class="h-5 w-5" /><span>chevron-double-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-double-up"
                        id="632462b3222aa-icone-chevron-double-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-down" role="option" tabindex="44">
                <label for="632462b3222aa-icone-chevron-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-down class="h-5 w-5" /><span>chevron-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-down"
                        id="632462b3222aa-icone-chevron-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-left" role="option" tabindex="45">
                <label for="632462b3222aa-icone-chevron-left" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-left class="h-5 w-5" /><span>chevron-left</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-left"
                        id="632462b3222aa-icone-chevron-left">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-right" role="option" tabindex="46">
                <label for="632462b3222aa-icone-chevron-right" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-right class="h-5 w-5" /><span>chevron-right</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-right"
                        id="632462b3222aa-icone-chevron-right">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-up" role="option" tabindex="47">
                <label for="632462b3222aa-icone-chevron-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-up class="h-5 w-5" /><span>chevron-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-up"
                        id="632462b3222aa-icone-chevron-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chevron-up-down" role="option" tabindex="48">
                <label for="632462b3222aa-icone-chevron-up-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chevron-up-down class="h-5 w-5" /><span>chevron-up-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chevron-up-down"
                        id="632462b3222aa-icone-chevron-up-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-chip" role="option" tabindex="49">
                <label for="632462b3222aa-icone-chip" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.chip class="h-5 w-5" /><span>chip</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="chip"
                        id="632462b3222aa-icone-chip">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-clipboard" role="option" tabindex="50">
                <label for="632462b3222aa-icone-clipboard" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.clipboard class="h-5 w-5" /><span>clipboard</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="clipboard"
                        id="632462b3222aa-icone-clipboard">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-clipboard-check" role="option" tabindex="51">
                <label for="632462b3222aa-icone-clipboard-check" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.clipboard-check class="h-5 w-5" /><span>clipboard-check</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="clipboard-check"
                        id="632462b3222aa-icone-clipboard-check">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-clipboard-copy" role="option" tabindex="52">
                <label for="632462b3222aa-icone-clipboard-copy" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.clipboard-copy class="h-5 w-5" /><span>clipboard-copy</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="clipboard-copy"
                        id="632462b3222aa-icone-clipboard-copy">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-clipboard-list" role="option" tabindex="53">
                <label for="632462b3222aa-icone-clipboard-list" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.clipboard-list class="h-5 w-5" /><span>clipboard-list</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="clipboard-list"
                        id="632462b3222aa-icone-clipboard-list">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-clock" role="option" tabindex="54">
                <label for="632462b3222aa-icone-clock" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.clock class="h-5 w-5" /><span>clock</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="clock"
                        id="632462b3222aa-icone-clock">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cloud" role="option" tabindex="55">
                <label for="632462b3222aa-icone-cloud" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cloud class="h-5 w-5" /><span>cloud</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cloud"
                        id="632462b3222aa-icone-cloud">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cloud-download" role="option" tabindex="56">
                <label for="632462b3222aa-icone-cloud-download" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cloud-download class="h-5 w-5" /><span>cloud-download</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cloud-download"
                        id="632462b3222aa-icone-cloud-download">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cloud-upload" role="option" tabindex="57">
                <label for="632462b3222aa-icone-cloud-upload" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cloud-upload class="h-5 w-5" /><span>cloud-upload</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cloud-upload"
                        id="632462b3222aa-icone-cloud-upload">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-code" role="option" tabindex="58">
                <label for="632462b3222aa-icone-code" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.code class="h-5 w-5" /><span>code</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="code"
                        id="632462b3222aa-icone-code">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cog" role="option" tabindex="59">
                <label for="632462b3222aa-icone-cog" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cog class="h-5 w-5" /><span>cog</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cog"
                        id="632462b3222aa-icone-cog">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                        <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-collection" role="option" tabindex="60">
                <label for="632462b3222aa-icone-collection" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.collection class="h-5 w-5" /><span>collection</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="collection"
                        id="632462b3222aa-icone-collection">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-color-swatch" role="option" tabindex="61">
                <label for="632462b3222aa-icone-color-swatch" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.color-swatch class="h-5 w-5" /><span>color-swatch</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="color-swatch"
                        id="632462b3222aa-icone-color-swatch">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-credit-card" role="option" tabindex="62">
                <label for="632462b3222aa-icone-credit-card" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.credit-card class="h-5 w-5" /><span>credit-card</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="credit-card"
                        id="632462b3222aa-icone-credit-card">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cube" role="option" tabindex="63">
                <label for="632462b3222aa-icone-cube" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cube class="h-5 w-5" /><span>cube</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cube"
                        id="632462b3222aa-icone-cube">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cube-transparent" role="option" tabindex="64">
                <label for="632462b3222aa-icone-cube-transparent" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cube-transparent class="h-5 w-5" /><span>cube-transparent</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cube-transparent"
                        id="632462b3222aa-icone-cube-transparent">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-bangladeshi" role="option" tabindex="65">
                <label for="632462b3222aa-icone-currency-bangladeshi" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-bangladeshi class="h-5 w-5" />
                        <span>currency-bangladeshi</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-bangladeshi"
                        id="632462b3222aa-icone-currency-bangladeshi">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-dollar" role="option" tabindex="66">
                <label for="632462b3222aa-icone-currency-dollar" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-dollar class="h-5 w-5" /><span>currency-dollar</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-dollar"
                        id="632462b3222aa-icone-currency-dollar">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-euro" role="option" tabindex="67">
                <label for="632462b3222aa-icone-currency-euro" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-euro class="h-5 w-5" /><span>currency-euro</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-euro"
                        id="632462b3222aa-icone-currency-euro">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-pound" role="option" tabindex="68">
                <label for="632462b3222aa-icone-currency-pound" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-pound class="h-5 w-5" /><span>currency-pound</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-pound"
                        id="632462b3222aa-icone-currency-pound">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-rupee" role="option" tabindex="69">
                <label for="632462b3222aa-icone-currency-rupee" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-rupee class="h-5 w-5" /><span>currency-rupee</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-rupee"
                        id="632462b3222aa-icone-currency-rupee">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-currency-yen" role="option" tabindex="70">
                <label for="632462b3222aa-icone-currency-yen" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.currency-yen class="h-5 w-5" /><span>currency-yen</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="currency-yen"
                        id="632462b3222aa-icone-currency-yen">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-cursor-click" role="option" tabindex="71">
                <label for="632462b3222aa-icone-cursor-click" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.cursor-click class="h-5 w-5" /><span>cursor-click</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="cursor-click"
                        id="632462b3222aa-icone-cursor-click">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-database" role="option" tabindex="72">
                <label for="632462b3222aa-icone-database" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.database class="h-5 w-5" /><span>database</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="database"
                        id="632462b3222aa-icone-database">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-desktop-computer" role="option" tabindex="73">
                <label for="632462b3222aa-icone-desktop-computer" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.desktop-computer class="h-5 w-5" /><span>desktop-computer</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="desktop-computer"
                        id="632462b3222aa-icone-desktop-computer">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-device-mobile" role="option" tabindex="74">
                <label for="632462b3222aa-icone-device-mobile" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.device-mobile class="h-5 w-5" /><span>device-mobile</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="device-mobile"
                        id="632462b3222aa-icone-device-mobile">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-device-tablet" role="option" tabindex="75">
                <label for="632462b3222aa-icone-device-tablet" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.device-tablet class="h-5 w-5" /><span>device-tablet</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="device-tablet"
                        id="632462b3222aa-icone-device-tablet">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document" role="option" tabindex="76">
                <label for="632462b3222aa-icone-document" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document class="h-5 w-5" /><span>document</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document"
                        id="632462b3222aa-icone-document">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-add" role="option" tabindex="77">
                <label for="632462b3222aa-icone-document-add" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-add class="h-5 w-5" /><span>document-add</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-add"
                        id="632462b3222aa-icone-document-add">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-download" role="option" tabindex="78">
                <label for="632462b3222aa-icone-document-download" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-download class="h-5 w-5" /><span>document-download</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-download"
                        id="632462b3222aa-icone-document-download">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-duplicate" role="option" tabindex="79">
                <label for="632462b3222aa-icone-document-duplicate" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-duplicate class="h-5 w-5" /><span>document-duplicate</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-duplicate"
                        id="632462b3222aa-icone-document-duplicate">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-remove" role="option" tabindex="80">
                <label for="632462b3222aa-icone-document-remove" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-remove class="h-5 w-5" /><span>document-remove</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-remove"
                        id="632462b3222aa-icone-document-remove">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-report" role="option" tabindex="81">
                <label for="632462b3222aa-icone-document-report" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-report class="h-5 w-5" /><span>document-report</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-report"
                        id="632462b3222aa-icone-document-report">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-search" role="option" tabindex="82">
                <label for="632462b3222aa-icone-document-search" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-search class="h-5 w-5" /><span>document-search</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-search"
                        id="632462b3222aa-icone-document-search">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-document-text" role="option" tabindex="83">
                <label for="632462b3222aa-icone-document-text" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.document-text class="h-5 w-5" /><span>document-text</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="document-text"
                        id="632462b3222aa-icone-document-text">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-dots-circle-horizontal" role="option" tabindex="84">
                <label for="632462b3222aa-icone-dots-circle-horizontal"
                    class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.dots-circle-horizontal class="h-5 w-5" />
                        <span>dots-circle-horizontal</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="dots-circle-horizontal"
                        id="632462b3222aa-icone-dots-circle-horizontal">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-dots-horizontal" role="option" tabindex="85">
                <label for="632462b3222aa-icone-dots-horizontal" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.dots-horizontal class="h-5 w-5" /><span>dots-horizontal</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="dots-horizontal"
                        id="632462b3222aa-icone-dots-horizontal">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-dots-vertical" role="option" tabindex="86">
                <label for="632462b3222aa-icone-dots-vertical" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.dots-vertical class="h-5 w-5" /><span>dots-vertical</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="dots-vertical"
                        id="632462b3222aa-icone-dots-vertical">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-download" role="option" tabindex="87">
                <label for="632462b3222aa-icone-download" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.download class="h-5 w-5" /><span>download</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="download"
                        id="632462b3222aa-icone-download">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-duplicate" role="option" tabindex="88">
                <label for="632462b3222aa-icone-duplicate" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.duplicate class="h-5 w-5" /><span>duplicate</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="duplicate"
                        id="632462b3222aa-icone-duplicate">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-emoji-happy" role="option" tabindex="89">
                <label for="632462b3222aa-icone-emoji-happy" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.emoji-happy class="h-5 w-5" /><span>emoji-happy</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="emoji-happy"
                        id="632462b3222aa-icone-emoji-happy">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-emoji-sad" role="option" tabindex="90">
                <label for="632462b3222aa-icone-emoji-sad" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.emoji-sad class="h-5 w-5" /><span>emoji-sad</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="emoji-sad"
                        id="632462b3222aa-icone-emoji-sad">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-exclamation" role="option" tabindex="91">
                <label for="632462b3222aa-icone-exclamation" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.exclamation class="h-5 w-5" /><span>exclamation</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="exclamation"
                        id="632462b3222aa-icone-exclamation">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-exclamation-circle" role="option" tabindex="92">
                <label for="632462b3222aa-icone-exclamation-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.exclamation-circle class="h-5 w-5" /><span>exclamation-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="exclamation-circle"
                        id="632462b3222aa-icone-exclamation-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-external-link" role="option" tabindex="93">
                <label for="632462b3222aa-icone-external-link" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.external-link class="h-5 w-5" /><span>external-link</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="external-link"
                        id="632462b3222aa-icone-external-link">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-eye" role="option" tabindex="94">
                <label for="632462b3222aa-icone-eye" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.eye class="h-5 w-5" /><span>eye</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="eye"
                        id="632462b3222aa-icone-eye">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-eye-off" role="option" tabindex="95">
                <label for="632462b3222aa-icone-eye-off" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.eye-off class="h-5 w-5" /><span>eye-off</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="eye-off"
                        id="632462b3222aa-icone-eye-off">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-fast-forward" role="option" tabindex="96">
                <label for="632462b3222aa-icone-fast-forward" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.fast-forward class="h-5 w-5" /><span>fast-forward</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="fast-forward"
                        id="632462b3222aa-icone-fast-forward">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-film" role="option" tabindex="97">
                <label for="632462b3222aa-icone-film" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.film class="h-5 w-5" /><span>film</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="film"
                        id="632462b3222aa-icone-film">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-filter" role="option" tabindex="98">
                <label for="632462b3222aa-icone-filter" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.filter class="h-5 w-5" /><span>filter</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="filter"
                        id="632462b3222aa-icone-filter">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-finger-print" role="option" tabindex="99">
                <label for="632462b3222aa-icone-finger-print" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.finger-print class="h-5 w-5" /><span>finger-print</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="finger-print"
                        id="632462b3222aa-icone-finger-print">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-fire" role="option" tabindex="100">
                <label for="632462b3222aa-icone-fire" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.fire class="h-5 w-5" /><span>fire</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="fire"
                        id="632462b3222aa-icone-fire">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-flag" role="option" tabindex="101">
                <label for="632462b3222aa-icone-flag" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.flag class="h-5 w-5" /><span>flag</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="flag"
                        id="632462b3222aa-icone-flag">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-folder" role="option" tabindex="102">
                <label for="632462b3222aa-icone-folder" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.folder class="h-5 w-5" /><span>folder</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="folder"
                        id="632462b3222aa-icone-folder">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-folder-add" role="option" tabindex="103">
                <label for="632462b3222aa-icone-folder-add" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.folder-add class="h-5 w-5" /><span>folder-add</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="folder-add"
                        id="632462b3222aa-icone-folder-add">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-folder-download" role="option" tabindex="104">
                <label for="632462b3222aa-icone-folder-download" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.folder-download class="h-5 w-5" /><span>folder-download</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="folder-download"
                        id="632462b3222aa-icone-folder-download">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-folder-open" role="option" tabindex="105">
                <label for="632462b3222aa-icone-folder-open" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.folder-open class="h-5 w-5" /><span>folder-open</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="folder-open"
                        id="632462b3222aa-icone-folder-open">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-folder-remove" role="option" tabindex="106">
                <label for="632462b3222aa-icone-folder-remove" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.folder-remove class="h-5 w-5" /><span>folder-remove</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="folder-remove"
                        id="632462b3222aa-icone-folder-remove">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-gift" role="option" tabindex="107">
                <label for="632462b3222aa-icone-gift" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.gift class="h-5 w-5" /><span>gift</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="gift"
                        id="632462b3222aa-icone-gift">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-globe" role="option" tabindex="108">
                <label for="632462b3222aa-icone-globe" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.globe class="h-5 w-5" /><span>globe</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="globe"
                        id="632462b3222aa-icone-globe">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-globe-alt" role="option" tabindex="109">
                <label for="632462b3222aa-icone-globe-alt" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.globe-alt class="h-5 w-5" /><span>globe-alt</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="globe-alt"
                        id="632462b3222aa-icone-globe-alt">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-hand" role="option" tabindex="110">
                <label for="632462b3222aa-icone-hand" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.hand class="h-5 w-5" /><span>hand</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="hand"
                        id="632462b3222aa-icone-hand">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-hashtag" role="option" tabindex="111">
                <label for="632462b3222aa-icone-hashtag" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.hashtag class="h-5 w-5" /><span>hashtag</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="hashtag"
                        id="632462b3222aa-icone-hashtag">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-heart" role="option" tabindex="112">
                <label for="632462b3222aa-icone-heart" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.heart class="h-5 w-5" /><span>heart</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="heart"
                        id="632462b3222aa-icone-heart">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-home" role="option" tabindex="113">
                <label for="632462b3222aa-icone-home" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.home class="h-5 w-5" /><span>home</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="home"
                        id="632462b3222aa-icone-home">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-identification" role="option" tabindex="114">
                <label for="632462b3222aa-icone-identification" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.identification class="h-5 w-5" /><span>identification</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="identification"
                        id="632462b3222aa-icone-identification">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-inbox" role="option" tabindex="115">
                <label for="632462b3222aa-icone-inbox" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.inbox class="h-5 w-5" /><span>inbox</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="inbox"
                        id="632462b3222aa-icone-inbox">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-inbox-in" role="option" tabindex="116">
                <label for="632462b3222aa-icone-inbox-in" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.inbox-in class="h-5 w-5" /><span>inbox-in</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="inbox-in"
                        id="632462b3222aa-icone-inbox-in">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-information-circle" role="option" tabindex="117">
                <label for="632462b3222aa-icone-information-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.information-circle class="h-5 w-5" /><span>information-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="information-circle"
                        id="632462b3222aa-icone-information-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-key" role="option" tabindex="118">
                <label for="632462b3222aa-icone-key" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.key class="h-5 w-5" /><span>key</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="key"
                        id="632462b3222aa-icone-key">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-library" role="option" tabindex="119">
                <label for="632462b3222aa-icone-library" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.library class="h-5 w-5" /><span>library</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="library"
                        id="632462b3222aa-icone-library">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-light-bulb" role="option" tabindex="120">
                <label for="632462b3222aa-icone-light-bulb" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.light-bulb class="h-5 w-5" /><span>light-bulb</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="light-bulb"
                        id="632462b3222aa-icone-light-bulb">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-lightning-bolt" role="option" tabindex="121">
                <label for="632462b3222aa-icone-lightning-bolt" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.lightning-bolt class="h-5 w-5" /><span>lightning-bolt</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="lightning-bolt"
                        id="632462b3222aa-icone-lightning-bolt">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-link" role="option" tabindex="122">
                <label for="632462b3222aa-icone-link" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.link class="h-5 w-5" /><span>link</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="link"
                        id="632462b3222aa-icone-link">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-location-marker" role="option" tabindex="123">
                <label for="632462b3222aa-icone-location-marker" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.location-marker class="h-5 w-5" /><span>location-marker</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="location-marker"
                        id="632462b3222aa-icone-location-marker">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-lock-closed" role="option" tabindex="124">
                <label for="632462b3222aa-icone-lock-closed" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.lock-closed class="h-5 w-5" /><span>lock-closed</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="lock-closed"
                        id="632462b3222aa-icone-lock-closed">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-lock-open" role="option" tabindex="125">
                <label for="632462b3222aa-icone-lock-open" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.lock-open class="h-5 w-5" /><span>lock-open</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="lock-open"
                        id="632462b3222aa-icone-lock-open">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-login" role="option" tabindex="126">
                <label for="632462b3222aa-icone-login" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.login class="h-5 w-5" /><span>login</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="login"
                        id="632462b3222aa-icone-login">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-logout" role="option" tabindex="127">
                <label for="632462b3222aa-icone-logout" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.logout class="h-5 w-5" /><span>logout</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="logout"
                        id="632462b3222aa-icone-logout">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-mail" role="option" tabindex="128">
                <label for="632462b3222aa-icone-mail" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.mail class="h-5 w-5" /><span>mail</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="mail"
                        id="632462b3222aa-icone-mail">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-mail-open" role="option" tabindex="129">
                <label for="632462b3222aa-icone-mail-open" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.mail-open class="h-5 w-5" /><span>mail-open</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="mail-open"
                        id="632462b3222aa-icone-mail-open">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-map" role="option" tabindex="130">
                <label for="632462b3222aa-icone-map" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.map class="h-5 w-5" /><span>map</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="map"
                        id="632462b3222aa-icone-map">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-menu" role="option" tabindex="131">
                <label for="632462b3222aa-icone-menu" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.menu class="h-5 w-5" /><span>menu</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="menu"
                        id="632462b3222aa-icone-menu">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-menu-alt-1" role="option" tabindex="132">
                <label for="632462b3222aa-icone-menu-alt-1" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.menu-alt-1 class="h-5 w-5" /><span>menu-alt-1</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="menu-alt-1"
                        id="632462b3222aa-icone-menu-alt-1">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-menu-alt-2" role="option" tabindex="133">
                <label for="632462b3222aa-icone-menu-alt-2" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.menu-alt-2 class="h-5 w-5" /><span>menu-alt-2</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="menu-alt-2"
                        id="632462b3222aa-icone-menu-alt-2">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-menu-alt-3" role="option" tabindex="134">
                <label for="632462b3222aa-icone-menu-alt-3" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.menu-alt-3 class="h-5 w-5" /><span>menu-alt-3</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="menu-alt-3"
                        id="632462b3222aa-icone-menu-alt-3">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-menu-alt-4" role="option" tabindex="135">
                <label for="632462b3222aa-icone-menu-alt-4" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.menu-alt-4 class="h-5 w-5" /><span>menu-alt-4</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="menu-alt-4"
                        id="632462b3222aa-icone-menu-alt-4">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-microphone" role="option" tabindex="136">
                <label for="632462b3222aa-icone-microphone" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.microphone class="h-5 w-5" /><span>microphone</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="microphone"
                        id="632462b3222aa-icone-microphone">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-minus" role="option" tabindex="137">
                <label for="632462b3222aa-icone-minus" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.minus class="h-5 w-5" /><span>minus</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="minus"
                        id="632462b3222aa-icone-minus">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-minus-circle" role="option" tabindex="138">
                <label for="632462b3222aa-icone-minus-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.minus-circle class="h-5 w-5" /><span>minus-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="minus-circle"
                        id="632462b3222aa-icone-minus-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-minus-sm" role="option" tabindex="139">
                <label for="632462b3222aa-icone-minus-sm" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.minus-sm class="h-5 w-5" /><span>minus-sm</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="minus-sm"
                        id="632462b3222aa-icone-minus-sm">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-moon" role="option" tabindex="140">
                <label for="632462b3222aa-icone-moon" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.moon class="h-5 w-5" /><span>moon</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="moon"
                        id="632462b3222aa-icone-moon">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-music-note" role="option" tabindex="141">
                <label for="632462b3222aa-icone-music-note" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.music-note class="h-5 w-5" /><span>music-note</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="music-note"
                        id="632462b3222aa-icone-music-note">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-newspaper" role="option" tabindex="142">
                <label for="632462b3222aa-icone-newspaper" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.newspaper class="h-5 w-5" /><span>newspaper</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="newspaper"
                        id="632462b3222aa-icone-newspaper">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-office-building" role="option" tabindex="143">
                <label for="632462b3222aa-icone-office-building" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.office-building class="h-5 w-5" /><span>office-building</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="office-building"
                        id="632462b3222aa-icone-office-building">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-paper-airplane" role="option" tabindex="144">
                <label for="632462b3222aa-icone-paper-airplane" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.paper-airplane class="h-5 w-5" /><span>paper-airplane</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="paper-airplane"
                        id="632462b3222aa-icone-paper-airplane">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-paper-clip" role="option" tabindex="145">
                <label for="632462b3222aa-icone-paper-clip" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.paper-clip class="h-5 w-5" /><span>paper-clip</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="paper-clip"
                        id="632462b3222aa-icone-paper-clip">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-pause" role="option" tabindex="146">
                <label for="632462b3222aa-icone-pause" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.pause class="h-5 w-5" /><span>pause</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="pause"
                        id="632462b3222aa-icone-pause">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-pencil" role="option" tabindex="147">
                <label for="632462b3222aa-icone-pencil" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.pencil class="h-5 w-5" /><span>pencil</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="pencil"
                        id="632462b3222aa-icone-pencil">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-pencil-alt" role="option" tabindex="148">
                <label for="632462b3222aa-icone-pencil-alt" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.pencil-alt class="h-5 w-5" /><span>pencil-alt</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="pencil-alt"
                        id="632462b3222aa-icone-pencil-alt">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-phone" role="option" tabindex="149">
                <label for="632462b3222aa-icone-phone" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.phone class="h-5 w-5" /><span>phone</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="phone"
                        id="632462b3222aa-icone-phone">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-phone-incoming" role="option" tabindex="150">
                <label for="632462b3222aa-icone-phone-incoming" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.phone-incoming class="h-5 w-5" /><span>phone-incoming</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="phone-incoming"
                        id="632462b3222aa-icone-phone-incoming">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-phone-missed-call" role="option" tabindex="151">
                <label for="632462b3222aa-icone-phone-missed-call" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.phone-missed-call class="h-5 w-5" /><span>phone-missed-call</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="phone-missed-call"
                        id="632462b3222aa-icone-phone-missed-call">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-phone-outgoing" role="option" tabindex="152">
                <label for="632462b3222aa-icone-phone-outgoing" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.phone-outgoing class="h-5 w-5" /><span>phone-outgoing</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="phone-outgoing"
                        id="632462b3222aa-icone-phone-outgoing">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-photograph" role="option" tabindex="153">
                <label for="632462b3222aa-icone-photograph" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.photograph class="h-5 w-5" /><span>photograph</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="photograph"
                        id="632462b3222aa-icone-photograph">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-play" role="option" tabindex="154">
                <label for="632462b3222aa-icone-play" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.play class="h-5 w-5" /><span>play</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="play"
                        id="632462b3222aa-icone-play">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-plus" role="option" tabindex="155">
                <label for="632462b3222aa-icone-plus" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.plus class="h-5 w-5" /><span>plus</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="plus"
                        id="632462b3222aa-icone-plus">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-plus-circle" role="option" tabindex="156">
                <label for="632462b3222aa-icone-plus-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.plus-circle class="h-5 w-5" /><span>plus-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="plus-circle"
                        id="632462b3222aa-icone-plus-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-plus-sm" role="option" tabindex="157">
                <label for="632462b3222aa-icone-plus-sm" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.plus-sm class="h-5 w-5" /><span>plus-sm</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="plus-sm"
                        id="632462b3222aa-icone-plus-sm">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-presentation-chart-bar" role="option" tabindex="158">
                <label for="632462b3222aa-icone-presentation-chart-bar"
                    class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.presentation-chart-bar class="h-5 w-5" />
                        <span>presentation-chart-bar</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="presentation-chart-bar"
                        id="632462b3222aa-icone-presentation-chart-bar">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-presentation-chart-line" role="option" tabindex="159">
                <label for="632462b3222aa-icone-presentation-chart-line"
                    class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.presentation-chart-line class="h-5 w-5" />
                        <span>presentation-chart-line</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="presentation-chart-line"
                        id="632462b3222aa-icone-presentation-chart-line">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-printer" role="option" tabindex="160">
                <label for="632462b3222aa-icone-printer" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.printer class="h-5 w-5" /><span>printer</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="printer"
                        id="632462b3222aa-icone-printer">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-puzzle" role="option" tabindex="161">
                <label for="632462b3222aa-icone-puzzle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.puzzle class="h-5 w-5" /><span>puzzle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="puzzle"
                        id="632462b3222aa-icone-puzzle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-qrcode" role="option" tabindex="162">
                <label for="632462b3222aa-icone-qrcode" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.qrcode class="h-5 w-5" /><span>qrcode</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="qrcode"
                        id="632462b3222aa-icone-qrcode">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-question-mark-circle" role="option" tabindex="163">
                <label for="632462b3222aa-icone-question-mark-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.question-mark-circle class="h-5 w-5" />
                        <span>question-mark-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="question-mark-circle"
                        id="632462b3222aa-icone-question-mark-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-receipt-refund" role="option" tabindex="164">
                <label for="632462b3222aa-icone-receipt-refund" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.receipt-refund class="h-5 w-5" /><span>receipt-refund</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="receipt-refund"
                        id="632462b3222aa-icone-receipt-refund">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-receipt-tax" role="option" tabindex="165">
                <label for="632462b3222aa-icone-receipt-tax" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.receipt-tax class="h-5 w-5" /><span>receipt-tax</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="receipt-tax"
                        id="632462b3222aa-icone-receipt-tax">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-refresh" role="option" tabindex="166">
                <label for="632462b3222aa-icone-refresh" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.refresh class="h-5 w-5" /><span>refresh</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="refresh"
                        id="632462b3222aa-icone-refresh">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-reply" role="option" tabindex="167">
                <label for="632462b3222aa-icone-reply" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.reply class="h-5 w-5" /><span>reply</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="reply"
                        id="632462b3222aa-icone-reply">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-rewind" role="option" tabindex="168">
                <label for="632462b3222aa-icone-rewind" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.rewind class="h-5 w-5" /><span>rewind</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="rewind"
                        id="632462b3222aa-icone-rewind">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-rss" role="option" tabindex="169">
                <label for="632462b3222aa-icone-rss" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.rss class="h-5 w-5" /><span>rss</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="rss"
                        id="632462b3222aa-icone-rss">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-save" role="option" tabindex="170">
                <label for="632462b3222aa-icone-save" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.save class="h-5 w-5" /><span>save</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="save"
                        id="632462b3222aa-icone-save">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-save-as" role="option" tabindex="171">
                <label for="632462b3222aa-icone-save-as" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.save-as class="h-5 w-5" /><span>save-as</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="save-as"
                        id="632462b3222aa-icone-save-as">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-scale" role="option" tabindex="172">
                <label for="632462b3222aa-icone-scale" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.scale class="h-5 w-5" /><span>scale</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="scale"
                        id="632462b3222aa-icone-scale">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-scissors" role="option" tabindex="173">
                <label for="632462b3222aa-icone-scissors" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.scissors class="h-5 w-5" /><span>scissors</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="scissors"
                        id="632462b3222aa-icone-scissors">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-search" role="option" tabindex="174">
                <label for="632462b3222aa-icone-search" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.search class="h-5 w-5" /><span>search</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="search"
                        id="632462b3222aa-icone-search">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-search-circle" role="option" tabindex="175">
                <label for="632462b3222aa-icone-search-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.search-circle class="h-5 w-5" /><span>search-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="search-circle"
                        id="632462b3222aa-icone-search-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-selector" role="option" tabindex="176">
                <label for="632462b3222aa-icone-selector" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.selector class="h-5 w-5" /><span>selector</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="selector"
                        id="632462b3222aa-icone-selector">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-server" role="option" tabindex="177">
                <label for="632462b3222aa-icone-server" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.server class="h-5 w-5" /><span>server</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="server"
                        id="632462b3222aa-icone-server">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-share" role="option" tabindex="178">
                <label for="632462b3222aa-icone-share" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.share class="h-5 w-5" /><span>share</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="share"
                        id="632462b3222aa-icone-share">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-shield-check" role="option" tabindex="179">
                <label for="632462b3222aa-icone-shield-check" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.shield-check class="h-5 w-5" /><span>shield-check</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="shield-check"
                        id="632462b3222aa-icone-shield-check">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-shield-exclamation" role="option" tabindex="180">
                <label for="632462b3222aa-icone-shield-exclamation" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.shield-exclamation class="h-5 w-5" /><span>shield-exclamation</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="shield-exclamation"
                        id="632462b3222aa-icone-shield-exclamation">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-shopping-bag" role="option" tabindex="181">
                <label for="632462b3222aa-icone-shopping-bag" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.shopping-bag class="h-5 w-5" /><span>shopping-bag</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="shopping-bag"
                        id="632462b3222aa-icone-shopping-bag">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-shopping-cart" role="option" tabindex="182">
                <label for="632462b3222aa-icone-shopping-cart" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.shopping-cart class="h-5 w-5" /><span>shopping-cart</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="shopping-cart"
                        id="632462b3222aa-icone-shopping-cart">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-sort-ascending" role="option" tabindex="183">
                <label for="632462b3222aa-icone-sort-ascending" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.sort-ascending class="h-5 w-5" /><span>sort-ascending</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="sort-ascending"
                        id="632462b3222aa-icone-sort-ascending">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-sort-descending" role="option" tabindex="184">
                <label for="632462b3222aa-icone-sort-descending" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.sort-descending class="h-5 w-5" /><span>sort-descending</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="sort-descending"
                        id="632462b3222aa-icone-sort-descending">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-sparkles" role="option" tabindex="185">
                <label for="632462b3222aa-icone-sparkles" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.sparkles class="h-5 w-5" /><span>sparkles</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="sparkles"
                        id="632462b3222aa-icone-sparkles">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-speakerphone" role="option" tabindex="186">
                <label for="632462b3222aa-icone-speakerphone" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.speakerphone class="h-5 w-5" /><span>speakerphone</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="speakerphone"
                        id="632462b3222aa-icone-speakerphone">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-spinner" role="option" tabindex="187">
                <label for="632462b3222aa-icone-spinner" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.spinner class="h-5 w-5" /><span>spinner</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="spinner"
                        id="632462b3222aa-icone-spinner">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-star" role="option" tabindex="188">
                <label for="632462b3222aa-icone-star" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.star class="h-5 w-5" /><span>star</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="star"
                        id="632462b3222aa-icone-star">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-status-offline" role="option" tabindex="189">
                <label for="632462b3222aa-icone-status-offline" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.status-offline class="h-5 w-5" /><span>status-offline</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="status-offline"
                        id="632462b3222aa-icone-status-offline">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-status-online" role="option" tabindex="190">
                <label for="632462b3222aa-icone-status-online" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.status-online class="h-5 w-5" /><span>status-online</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="status-online"
                        id="632462b3222aa-icone-status-online">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-stop" role="option" tabindex="191">
                <label for="632462b3222aa-icone-stop" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.stop class="h-5 w-5" /><span>stop</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="stop"
                        id="632462b3222aa-icone-stop">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-sun" role="option" tabindex="192">
                <label for="632462b3222aa-icone-sun" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.sun class="h-5 w-5" /><span>sun</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="sun"
                        id="632462b3222aa-icone-sun">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-support" role="option" tabindex="193">
                <label for="632462b3222aa-icone-support" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.support class="h-5 w-5" /><span>support</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="support"
                        id="632462b3222aa-icone-support">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-switch-horizontal" role="option" tabindex="194">
                <label for="632462b3222aa-icone-switch-horizontal" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.switch-horizontal class="h-5 w-5" /><span>switch-horizontal</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="switch-horizontal"
                        id="632462b3222aa-icone-switch-horizontal">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-switch-vertical" role="option" tabindex="195">
                <label for="632462b3222aa-icone-switch-vertical" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.switch-vertical class="h-5 w-5" /><span>switch-vertical</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="switch-vertical"
                        id="632462b3222aa-icone-switch-vertical">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-table" role="option" tabindex="196">
                <label for="632462b3222aa-icone-table" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.table class="h-5 w-5" /><span>table</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="table"
                        id="632462b3222aa-icone-table">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-tag" role="option" tabindex="197">
                <label for="632462b3222aa-icone-tag" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.tag class="h-5 w-5" /><span>tag</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="tag"
                        id="632462b3222aa-icone-tag">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-template" role="option" tabindex="198">
                <label for="632462b3222aa-icone-template" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.template class="h-5 w-5" /><span>template</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="template"
                        id="632462b3222aa-icone-template">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-terminal" role="option" tabindex="199">
                <label for="632462b3222aa-icone-terminal" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.terminal class="h-5 w-5" /><span>terminal</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="terminal"
                        id="632462b3222aa-icone-terminal">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-thumb-down" role="option" tabindex="200">
                <label for="632462b3222aa-icone-thumb-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.thumb-down class="h-5 w-5" /><span>thumb-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="thumb-down"
                        id="632462b3222aa-icone-thumb-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-thumb-up" role="option" tabindex="201">
                <label for="632462b3222aa-icone-thumb-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.thumb-up class="h-5 w-5" /><span>thumb-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="thumb-up"
                        id="632462b3222aa-icone-thumb-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-ticket" role="option" tabindex="202">
                <label for="632462b3222aa-icone-ticket" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.ticket class="h-5 w-5" /><span>ticket</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="ticket"
                        id="632462b3222aa-icone-ticket">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-translate" role="option" tabindex="203">
                <label for="632462b3222aa-icone-translate" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.translate class="h-5 w-5" /><span>translate</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="translate"
                        id="632462b3222aa-icone-translate">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-trash" role="option" tabindex="204">
                <label for="632462b3222aa-icone-trash" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.trash class="h-5 w-5" /><span>trash</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="trash"
                        id="632462b3222aa-icone-trash">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-trending-down" role="option" tabindex="205">
                <label for="632462b3222aa-icone-trending-down" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.trending-down class="h-5 w-5" /><span>trending-down</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="trending-down"
                        id="632462b3222aa-icone-trending-down">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-trending-up" role="option" tabindex="206">
                <label for="632462b3222aa-icone-trending-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.trending-up class="h-5 w-5" /><span>trending-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="trending-up"
                        id="632462b3222aa-icone-trending-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-truck" role="option" tabindex="207">
                <label for="632462b3222aa-icone-truck" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.truck class="h-5 w-5" /><span>truck</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="truck"
                        id="632462b3222aa-icone-truck">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-upload" role="option" tabindex="208">
                <label for="632462b3222aa-icone-upload" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.upload class="h-5 w-5" /><span>upload</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="upload"
                        id="632462b3222aa-icone-upload">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-user" role="option" tabindex="209">
                <label for="632462b3222aa-icone-user" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.user class="h-5 w-5" /><span>user</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="user"
                        id="632462b3222aa-icone-user">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-user-add" role="option" tabindex="210">
                <label for="632462b3222aa-icone-user-add" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.user-add class="h-5 w-5" /><span>user-add</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="user-add"
                        id="632462b3222aa-icone-user-add">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-user-circle" role="option" tabindex="211">
                <label for="632462b3222aa-icone-user-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.user-circle class="h-5 w-5" /><span>user-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="user-circle"
                        id="632462b3222aa-icone-user-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-user-group" role="option" tabindex="212">
                <label for="632462b3222aa-icone-user-group" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.user-group class="h-5 w-5" /><span>user-group</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="user-group"
                        id="632462b3222aa-icone-user-group">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-user-remove" role="option" tabindex="213">
                <label for="632462b3222aa-icone-user-remove" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.user-remove class="h-5 w-5" /><span>user-remove</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="user-remove"
                        id="632462b3222aa-icone-user-remove">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-users" role="option" tabindex="214">
                <label for="632462b3222aa-icone-users" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.users class="h-5 w-5" /><span>users</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="users"
                        id="632462b3222aa-icone-users">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-variable" role="option" tabindex="215">
                <label for="632462b3222aa-icone-variable" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.variable class="h-5 w-5" /><span>variable</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="variable"
                        id="632462b3222aa-icone-variable">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-video-camera" role="option" tabindex="216">
                <label for="632462b3222aa-icone-video-camera" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.video-camera class="h-5 w-5" /><span>video-camera</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="video-camera"
                        id="632462b3222aa-icone-video-camera">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-view-boards" role="option" tabindex="217">
                <label for="632462b3222aa-icone-view-boards" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.view-boards class="h-5 w-5" /><span>view-boards</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="view-boards"
                        id="632462b3222aa-icone-view-boards">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-view-grid" role="option" tabindex="218">
                <label for="632462b3222aa-icone-view-grid" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.view-grid class="h-5 w-5" /><span>view-grid</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="view-grid"
                        id="632462b3222aa-icone-view-grid">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-view-grid-add" role="option" tabindex="219">
                <label for="632462b3222aa-icone-view-grid-add" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.view-grid-add class="h-5 w-5" /><span>view-grid-add</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="view-grid-add"
                        id="632462b3222aa-icone-view-grid-add">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-view-list" role="option" tabindex="220">
                <label for="632462b3222aa-icone-view-list" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.view-list class="h-5 w-5" /><span>view-list</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="view-list"
                        id="632462b3222aa-icone-view-list">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-volume-off" role="option" tabindex="221">
                <label for="632462b3222aa-icone-volume-off" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.volume-off class="h-5 w-5" /><span>volume-off</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="volume-off"
                        id="632462b3222aa-icone-volume-off">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-volume-up" role="option" tabindex="222">
                <label for="632462b3222aa-icone-volume-up" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.volume-up class="h-5 w-5" /><span>volume-up</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="volume-up"
                        id="632462b3222aa-icone-volume-up">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-wifi" role="option" tabindex="223">
                <label for="632462b3222aa-icone-wifi" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.wifi class="h-5 w-5" /><span>wifi</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="wifi"
                        id="632462b3222aa-icone-wifi">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-x" role="option" tabindex="224">
                <label for="632462b3222aa-icone-x" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.x class="h-5 w-5" /><span>x</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="x"
                        id="632462b3222aa-icone-x">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-x-circle" role="option" tabindex="225">
                <label for="632462b3222aa-icone-x-circle" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.x-circle class="h-5 w-5" /><span>x-circle</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="x-circle"
                        id="632462b3222aa-icone-x-circle">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-zoom-in" role="option" tabindex="226">
                <label for="632462b3222aa-icone-zoom-in" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.zoom-in class="h-5 w-5" /><span>zoom-in</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="zoom-in"
                        id="632462b3222aa-icone-zoom-in">
                </label>
            </li>
            <li x-on:click="toggleDropdown"
                class="relative select-none pl-3 pr-9 text-gray-900 "
                id="option-icone-632462b3222aa-zoom-out" role="option" tabindex="227">
                <label for="632462b3222aa-icone-zoom-out" class="flex items-center py-2 cursor-pointer hover:bg-gray-50">
                    <span class="flex items-center  pl-1.5 text-indigo-600">
                    </span>
                    <span class="ml-3 truncate flex items-center space-x-2">
                        <x-tall::icons.outline.zoom-out class="h-5 w-5" /><span>zoom-out</span>
                    </span>
                    <input class="hidden" wire:model="data.icone" type="radio" value="zoom-out"
                        id="632462b3222aa-icone-zoom-out">
                </label>
            </li>
        </ul>
    </div>
</div>
