@props(['href', 'title', 'icon'])
<a
  href="{{ $href }}"
  title="{{ $title }}"
  aria-label="{{ $attributes->get('aria-label', $title) }}"
  target="_blank"
  rel="noopener noreferrer"
  {{ $attributes->except('aria-label')->merge(['class' => 'inline-flex items-center justify-center w-8 h-8 rounded-lg transition-colors']) }}
  style="background:var(--color-surface); border:1px solid var(--color-border); color:var(--color-text-muted);"
  onmouseover="this.style.background='var(--color-accent-muted)';this.style.color='var(--color-accent-text)';this.style.borderColor='var(--color-accent)';"
  onmouseout="this.style.background='var(--color-surface)';this.style.color='var(--color-text-muted)';this.style.borderColor='var(--color-border)';"
  onfocus="this.style.outline='2px solid var(--color-accent)'; this.style.outlineOffset='3px';"
  onblur="this.style.outline='none';"
>
  <x-icon :name="$icon" fill="currentColor" class="w-3.5 h-3.5" />
</a>
