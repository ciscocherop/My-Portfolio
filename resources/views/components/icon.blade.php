@props(['name', 'class' => 'w-5 h-5', 'fill' => 'none'])
<svg {{ $attributes->merge(['class' => $class, 'fill' => $fill, 'stroke' => $fill === 'none' ? 'currentColor' : null, 'viewBox' => '0 0 24 24', 'aria-hidden' => 'true']) }}>
    <use href="{{ asset('icons/sprite.svg') }}#{{ $name }}"></use>
</svg>
