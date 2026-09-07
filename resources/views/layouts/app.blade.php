<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @php
    $url   = rtrim(config('portfolio.url'), '/');
    $desc  = config('portfolio.description');
    $img   = $url . config('portfolio.image');
    $name  = config('portfolio.name');
    $schema = [
      '@context' => 'https://schema.org', '@type' => 'Person',
      'name' => $name, 'jobTitle' => config('portfolio.job_title'),
      'url' => $url, 'image' => $img,
      'sameAs' => config('portfolio.social_links'),
    ];
  @endphp

  <title>{{ $name }} — Software Developer &amp; Data Scientist</title>
  <meta name="description" content="{{ $desc }}">
  <meta name="robots"      content="index, follow">
  <link rel="canonical"    href="{{ $url }}">

  {{-- Open Graph --}}
  <meta property="og:title"       content="{{ $name }} — Portfolio">
  <meta property="og:description" content="{{ $desc }}">
  <meta property="og:image"       content="{{ $img }}">
  <meta property="og:type"        content="profile">
  <meta property="og:url"         content="{{ $url }}">
  <meta property="og:locale"      content="en_US">

  {{-- Twitter --}}
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="{{ $name }} — Portfolio">
  <meta name="twitter:description" content="{{ $desc }}">
  <meta name="twitter:image"       content="{{ $img }}">
  <meta name="twitter:creator"     content="@cherryCisco">

  <script type="application/ld+json">@json($schema)</script>

  {{-- Favicon --}}
  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  {{-- DM Sans — distinctive, geometric, not Inter/Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- data-initial-section drives the JS bootstrap --}}
<body
  id="top"
  data-initial-section="{{ session('success') || $errors->any() ? 'contact' : 'about' }}"
  class="h-full antialiased"
  style="background: var(--color-surface); color: var(--color-text-primary);"
>

{{-- Skip link — first focusable element for keyboard users --}}
<a href="#main-content" class="skip-link">Skip to main content</a>

{{-- ══════════════════════════════════════════════════
     MOBILE LAYOUT  (hidden on lg+)
     ══════════════════════════════════════════════════ --}}

{{-- Top bar --}}
<header
  class="lg:hidden fixed inset-x-0 top-0 z-50 flex items-center justify-between px-4 py-3"
  style="background: var(--color-surface-card); border-bottom: 1px solid var(--color-border);"
  role="banner"
>
  <div class="flex items-center gap-3 min-w-0">
    <img
      src="/image/portfolio.jpeg"
      alt="Portrait of {{ $name }}"
      width="36" height="36"
      class="w-9 h-9 rounded-full object-cover shrink-0"
      style="border: 2px solid var(--color-accent);"
    >
    <div class="min-w-0">
      <p class="text-sm font-semibold truncate" style="color: var(--color-text-primary);">{{ $name }}</p>
      <p class="text-[10px] font-medium truncate" style="color: var(--color-accent-text);">Software Developer · Data Scientist</p>
    </div>
  </div>
  <button
    id="theme-toggle-mobile"
    aria-label="Toggle colour theme"
    class="btn btn-ghost p-2 rounded-lg shrink-0"
  >
    {{-- Sun: shown in dark mode --}}
    <svg id="sun-m" class="w-5 h-5 hidden dark:block" style="color:var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
    </svg>
    {{-- Moon: shown in light mode --}}
    <svg id="moon-m" class="w-5 h-5 block dark:hidden" style="color:var(--color-accent-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
    </svg>
  </button>
</header>

{{-- Bottom nav --}}
<nav
  class="lg:hidden fixed inset-x-0 bottom-0 z-50 flex items-center justify-around px-2 py-1"
  style="background: var(--color-surface-card); border-top: 1px solid var(--color-border);"
  aria-label="Main navigation"
>
  @foreach ([
    ['about',   'About',   'user'],
    ['resume',  'Resume',  'document'],
    ['skills',  'Skills',  'bulb'],
    ['contact', 'Contact', 'mail'],
  ] as [$sec, $lbl, $ico])
  <button
    data-section="{{ $sec }}"
    data-nav-link
    aria-current="false"
    aria-label="Go to {{ $lbl }}"
    class="nav-link flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg"
  >
    <x-icon :name="$ico" class="w-5 h-5 nav-icon" style="color:var(--color-text-muted);" />
    <span class="nav-label text-[10px] font-medium" style="color:var(--color-text-muted);">{{ $lbl }}</span>
  </button>
  @endforeach
</nav>

{{-- Mobile scrollable body --}}
<div class="lg:hidden mobile-scroll overflow-y-auto" style="padding-top:3.5rem; padding-bottom:4rem; min-height:100vh; background:var(--color-surface);">

  {{-- Mobile profile card --}}
  <div class="px-4 pt-5 pb-6 text-center" style="background:var(--color-surface-card); border-bottom:1px solid var(--color-border);">
    <div class="relative w-24 h-24 mx-auto mb-4">
      <img
        src="/image/portfolio.jpeg"
        alt="Portrait of {{ $name }}"
        width="96" height="96"
        class="w-full h-full rounded-full object-cover"
        style="border:3px solid var(--color-accent); box-shadow: 0 4px 12px rgba(232,168,0,0.3);"
      >
      <span class="avail-dot absolute bottom-1 right-1" style="border:2px solid var(--color-surface-card);"></span>
    </div>

    {{-- Single H1 per page on mobile --}}
    <h1 class="text-xl font-bold mb-1" style="color:var(--color-text-primary);">{{ $name }}</h1>
    <p class="text-sm font-medium mb-1" style="color:var(--color-accent-text);">Software Developer &amp; Data Scientist</p>
    <p class="text-xs mb-4 flex items-center justify-center gap-1" style="color:var(--color-text-muted);">
        <img src="/icons/location.png" alt="" class="w-3.5 h-3.5 object-contain" aria-hidden="true">
        {{ config('portfolio.location') }}
      </p>

    <div class="panel-divider mb-4"></div>

    {{-- Badges --}}
    <div class="flex flex-wrap justify-center gap-1.5 mb-4">
      <span class="badge"><img src="/icons/graduate.jpg" alt="" class="w-3.5 h-3.5 object-contain inline-block rounded" aria-hidden="true"> Business Computing</span>
      <span class="badge"><img src="/icons/tick.png" alt="" class="w-3.5 h-3.5 object-contain inline-block" aria-hidden="true"> Open to Work</span>
      <span class="badge"><img src="/icons/world.jpg" alt="" class="w-3.5 h-3.5 object-contain inline-block rounded-full" aria-hidden="true"> Remote · Onsite</span>
    </div>

    {{-- Socials --}}
    <div class="flex justify-center gap-2 mb-5">
      <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   aria-label="Cherop Sisco on GitHub" />
      <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" aria-label="Cherop Sisco on LinkedIn" />
      <x-social-link href="https://x.com/cherryCisco"                           title="X"        icon="twitter"  aria-label="Cherop Sisco on X" />
      <x-social-link href="https://wa.me/256784309829"                          title="WhatsApp" icon="whatsapp" aria-label="Cherop Sisco on WhatsApp" />
    </div>

    {{-- CV downloads --}}
    <div class="grid grid-cols-2 gap-2">
      <a href="/cv/cherop-sisco-cv.pdf" download class="btn btn-primary text-xs py-2">
        <x-icon name="download" class="w-3.5 h-3.5" /> Dev CV
      </a>
      <a href="/cv/sisco_cv-DS.docx" download class="btn btn-outline text-xs py-2">
        <x-icon name="download" class="w-3.5 h-3.5" /> DS CV
      </a>
    </div>
  </div>

  {{-- Mobile section content --}}
  <div class="px-4 py-6">
    <div id="content-area-mobile" class="max-w-2xl mx-auto"></div>
  </div>
</div>

{{-- Shared hidden source — JS moves children into the right container --}}
<div id="sections-source" class="hidden" aria-hidden="true">
  @yield('content')
</div>

{{-- ══════════════════════════════════════════════════
     DESKTOP LAYOUT  (hidden below lg)
     ══════════════════════════════════════════════════ --}}
<div class="hidden lg:flex h-screen overflow-hidden">

  {{-- Icon sidebar --}}
  <aside
    class="shrink-0 w-[4.5rem] flex flex-col items-center py-8 gap-8 h-full"
    style="background:var(--color-surface-card); border-right:1px solid var(--color-border);"
    aria-label="Site navigation"
  >
    {{-- Theme toggle --}}
    <button
      id="theme-toggle"
      aria-label="Toggle colour theme"
      class="btn btn-ghost p-2.5 rounded-xl"
    >
      <svg id="sun-d" class="w-5 h-5 hidden dark:block" style="color:var(--color-accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
      </svg>
      <svg id="moon-d" class="w-5 h-5 block dark:hidden" style="color:var(--color-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
      </svg>
    </button>

    {{-- Nav --}}
    <nav class="flex flex-col gap-2 flex-1" aria-label="Main navigation">
      @foreach ([
        ['about',   'About',   'user'],
        ['resume',  'Resume',  'document'],
        ['skills',  'Skills',  'bulb'],
        ['contact', 'Contact', 'mail'],
      ] as [$sec, $lbl, $ico])
      <button
        data-section="{{ $sec }}"
        data-nav-link
        aria-current="false"
        aria-label="{{ $lbl }}"
        title="{{ $lbl }}"
        class="nav-link relative flex flex-col items-center gap-1 px-3 py-3 rounded-xl"
      >
        {{-- Active indicator bar --}}
        <span class="nav-indicator absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 rounded-r opacity-0" style="background:var(--color-accent);"></span>
        <x-icon :name="$ico" class="w-5 h-5 nav-icon" style="color:var(--color-text-muted);" />
        <span class="nav-label text-[9px] font-semibold uppercase tracking-wide" style="color:var(--color-text-muted);">{{ $lbl }}</span>
      </button>
      @endforeach
    </nav>
  </aside>

  {{-- Profile panel --}}
  <div
    class="shrink-0 w-72 xl:w-80 h-full overflow-y-auto flex flex-col items-center justify-center p-7"
    style="background:var(--color-surface-card); border-right:1px solid var(--color-border);"
  >
    <div class="w-full text-center space-y-4">

      {{-- Avatar --}}
      <div class="relative w-32 h-32 mx-auto">
        <img
          src="/image/portfolio.jpeg"
          alt="Portrait of {{ $name }}"
          width="128" height="128"
          class="w-full h-full rounded-full object-cover"
          style="border:3px solid var(--color-accent); box-shadow: 0 6px 20px rgba(232,168,0,0.25);"
        >
        <span class="avail-dot absolute bottom-2 right-2" style="border:2px solid var(--color-surface-card);"></span>
      </div>

      {{-- Single H1 per page on desktop --}}
      <div>
        <h1 class="text-lg font-bold leading-tight" style="color:var(--color-text-primary);">{{ $name }}</h1>
        <p class="text-sm font-medium mt-1" style="color:var(--color-accent-text);">Software Developer &amp; Data Scientist</p>
        <p class="text-xs mt-1 flex items-center justify-center gap-1" style="color:var(--color-text-muted);">
          <img src="/icons/location.png" alt="" class="w-3.5 h-3.5 object-contain" aria-hidden="true">
          {{ config('portfolio.location') }}
        </p>
      </div>

      <div class="panel-divider"></div>

      {{-- Badges --}}
      <div class="flex flex-wrap justify-center gap-1.5">
        <span class="badge"><img src="/icons/graduate.jpg" alt="" class="w-3.5 h-3.5 object-contain inline-block rounded" aria-hidden="true"> Business Computing</span>
        <span class="badge"><img src="/icons/tick.png" alt="" class="w-3.5 h-3.5 object-contain inline-block" aria-hidden="true"> Open to Work</span>
        <span class="badge"><img src="/icons/world.jpg" alt="" class="w-3.5 h-3.5 object-contain inline-block rounded-full" aria-hidden="true"> Remote · Onsite</span>
      </div>

      {{-- Socials --}}
      <div class="flex justify-center gap-2">
        <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   aria-label="Cherop Sisco on GitHub" />
        <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" aria-label="Cherop Sisco on LinkedIn" />
        <x-social-link href="https://x.com/cherryCisco"                           title="X"        icon="twitter"  aria-label="Cherop Sisco on X" />
        <x-social-link href="https://wa.me/256784309829"                          title="WhatsApp" icon="whatsapp" aria-label="Cherop Sisco on WhatsApp" />
      </div>

      {{-- CVs --}}
      <div class="space-y-2 w-full">
        <p class="text-section-label text-left">Download CV</p>
        <a href="/cv/cherop-sisco-cv.pdf" download class="btn btn-primary w-full text-xs">
          <x-icon name="download" class="w-3.5 h-3.5" /> Software Developer CV
        </a>
        <a href="/cv/sisco_cv-DS.docx" download class="btn btn-outline w-full text-xs">
          <x-icon name="download" class="w-3.5 h-3.5" /> Data Science CV
        </a>
        <button data-section="contact" class="nav-link btn btn-ghost w-full text-sm border-2" style="border-color:var(--color-accent); color:var(--color-accent-text);">
          <x-icon name="mail" class="w-4 h-4" /> Contact Me
        </button>
      </div>
    </div>
  </div>

  {{-- Main scrollable content --}}
  <main
    id="main-content"
    tabindex="-1"
    class="flex-1 overflow-y-auto min-h-0"
    style="background:var(--color-surface);"
    aria-label="Main content"
  >
    <div class="p-8 xl:p-12">
      <div id="content-area" class="max-w-3xl mx-auto"></div>
    </div>
  </main>

</div>

</body>
</html>
