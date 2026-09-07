@props(['section', 'label', 'icon'])
<button
  data-section="{{ $section }}"
  data-nav-link
  aria-current="false"
  aria-label="Go to {{ $label }}"
  title="{{ $label }}"
  {{ $attributes->merge(['class' => 'nav-link relative flex flex-col items-center gap-1 px-3 py-3 rounded-xl']) }}
>
  {{-- Active indicator --}}
  <span
    class="nav-indicator absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 rounded-r opacity-0"
    style="background:var(--color-accent);"
    aria-hidden="true"
  ></span>

  <x-icon
    :name="$icon"
    class="w-5 h-5 nav-icon"
    style="color:var(--color-text-muted);"
  />
  <span
    class="nav-label text-[9px] font-semibold uppercase tracking-wide"
    style="color:var(--color-text-muted);"
  >{{ $label }}</span>
</button>
