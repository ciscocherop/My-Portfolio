@props(['section', 'label', 'icon'])
<button
    data-section="{{ $section }}"
    data-nav-link
    aria-current="false"
    {{ $attributes->merge(['class' => 'nav-link relative p-2 lg:p-3 shrink-0 rounded-lg transition-colors duration-200 group flex flex-col items-center']) }}
>
    {{-- active indicator bar (left side on desktop) --}}
    <span class="nav-indicator absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 bg-[#f4c430] rounded-r opacity-0 transition-opacity duration-200 hidden lg:block"></span>

    <x-icon :name="$icon"
            class="w-5 h-5 lg:w-6 lg:h-6 text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430] transition-colors duration-200 nav-icon" />
    <span class="text-[10px] lg:text-xs mt-1 text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430] transition-colors duration-200 whitespace-nowrap nav-label">
        {{ $label }}
    </span>
</button>
