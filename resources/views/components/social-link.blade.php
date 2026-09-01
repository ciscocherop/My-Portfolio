@props(['href', 'title', 'icon'])
<a href="{{ $href }}" title="{{ $title }}" target="_blank" rel="noopener noreferrer"
   {{ $attributes->merge(['class' => 'p-2 lg:p-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-[#f4c430]/20 hover:text-[#f4c430] rounded-lg transition-colors duration-150']) }}>
    <x-icon :name="$icon" fill="currentColor" class="w-3 h-3 lg:w-4 lg:h-4" />
</a>
