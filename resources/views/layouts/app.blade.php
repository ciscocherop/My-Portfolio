<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $portfolioUrl   = rtrim(config('portfolio.url'), '/');
        $portfolioDesc  = config('portfolio.description');
        $portfolioImage = $portfolioUrl . config('portfolio.image');
        $personSchema   = [
            '@context' => 'https://schema.org',
            '@type'    => 'Person',
            'name'     => config('portfolio.name'),
            'jobTitle' => config('portfolio.job_title'),
            'url'      => $portfolioUrl,
            'image'    => $portfolioImage,
            'sameAs'   => config('portfolio.social_links'),
        ];
    @endphp
    <title>@yield('title', config('portfolio.name'))</title>
    <meta name="description"        content="{{ $portfolioDesc }}">
    <link rel="canonical"           href="{{ $portfolioUrl }}">
    <meta property="og:title"       content="@yield('title', config('portfolio.name'))">
    <meta property="og:description" content="{{ $portfolioDesc }}">
    <meta property="og:image"       content="{{ $portfolioImage }}">
    <meta property="og:type"        content="profile">
    <meta property="og:url"         content="{{ $portfolioUrl }}">
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="@yield('title', config('portfolio.name'))">
    <meta name="twitter:description" content="{{ $portfolioDesc }}">
    <meta name="twitter:image"       content="{{ $portfolioImage }}">
    <script type="application/ld+json">@json($personSchema)</script>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-initial-section="{{ session('success') || $errors->any() ? 'contact' : 'about' }}"
      class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

{{-- ═══════════════════════════════════════
     MOBILE LAYOUT (below lg)
     - Fixed top header with name + theme toggle
     - Scrollable content (profile card + sections)
     - Fixed bottom nav bar
     ═══════════════════════════════════════ --}}

{{-- Mobile top header --}}
<header class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <img src="/image/portfolio.jpeg" alt="{{ config('portfolio.name') }}"
             class="w-9 h-9 rounded-full object-cover border-2 border-[#f4c430]">
        <div>
            <p class="text-sm font-semibold text-gray-900 dark:text-white leading-none">{{ config('portfolio.name') }}</p>
            <p class="text-[10px] text-[#f4c430] font-medium mt-0.5">Software Developer &amp; Data Scientist</p>
        </div>
    </div>
    <button id="theme-toggle-mobile" aria-label="Toggle theme"
            class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
        <svg id="theme-icon-sun-mobile"  class="w-5 h-5 hidden dark:block text-[#f4c430]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
        <svg id="theme-icon-moon-mobile" class="w-5 h-5 block dark:hidden text-[#f4c430]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
        </svg>
    </button>
</header>

{{-- Mobile bottom nav --}}
<nav class="lg:hidden fixed bottom-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex items-center justify-around px-2 py-2">
    <button data-section="about"   data-nav-link aria-current="false" class="nav-link flex flex-col items-center gap-0.5 px-3 py-1.5 rounded-lg transition-colors group">
        <x-icon name="user"     class="w-5 h-5 nav-icon text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]" />
        <span class="nav-label text-[10px] text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]">About</span>
    </button>
    <button data-section="resume"  data-nav-link aria-current="false" class="nav-link flex flex-col items-center gap-0.5 px-3 py-1.5 rounded-lg transition-colors group">
        <x-icon name="document" class="w-5 h-5 nav-icon text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]" />
        <span class="nav-label text-[10px] text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]">Resume</span>
    </button>
    <button data-section="skills"  data-nav-link aria-current="false" class="nav-link flex flex-col items-center gap-0.5 px-3 py-1.5 rounded-lg transition-colors group">
        <x-icon name="bulb"     class="w-5 h-5 nav-icon text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]" />
        <span class="nav-label text-[10px] text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]">Skills</span>
    </button>
    <button data-section="contact" data-nav-link aria-current="false" class="nav-link flex flex-col items-center gap-0.5 px-3 py-1.5 rounded-lg transition-colors group">
        <x-icon name="mail"     class="w-5 h-5 nav-icon text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]" />
        <span class="nav-label text-[10px] text-gray-400 dark:text-gray-500 group-hover:text-[#f4c430]">Contact</span>
    </button>
</nav>

{{-- Mobile scrollable body --}}
<div class="lg:hidden pt-16 pb-20 min-h-full overflow-y-auto bg-gray-50 dark:bg-gray-900">

    {{-- Mobile profile card --}}
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-5 py-6 text-center">
        <div class="relative w-24 h-24 mx-auto mb-3">
            <img src="/image/portfolio.jpeg" alt="{{ config('portfolio.name') }}"
                 class="w-full h-full rounded-full object-cover border-4 border-[#f4c430] shadow-lg">
            <span class="absolute bottom-1 right-1 w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
        </div>
        <h1 class="text-xl font-bold text-gray-900 dark:text-white">{{ config('portfolio.name') }}</h1>
        <p class="text-[#f4c430] font-medium text-sm mt-1">Software Developer &amp; Data Scientist</p>
        <p class="text-gray-400 text-xs mt-1">📍 {{ config('portfolio.location') }}</p>
        <div class="w-10 h-0.5 bg-[#f4c430] rounded-full mx-auto my-3"></div>
        <div class="flex flex-wrap justify-center gap-1.5 mb-4">
            <x-skill-badge>🎓 Business Computing</x-skill-badge>
            <x-skill-badge>✅ Open to Work</x-skill-badge>
            <x-skill-badge>🌐 Remote / Onsite</x-skill-badge>
        </div>
        <div class="flex justify-center gap-2 mb-4">
            <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   />
            <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" />
            <x-social-link href="https://x.com/cherryCisco"                           title="Twitter"  icon="twitter"  />
            <x-social-link href="https://wa.me/256784309829"                          title="WhatsApp" icon="whatsapp" />
        </div>
        <div class="grid grid-cols-2 gap-2">
            <a href="/cv/cherop-sisco-cv.pdf" download
               class="flex items-center justify-center gap-1.5 py-2 px-3 bg-[#f4c430] hover:bg-[#e0b020] text-gray-900 font-semibold rounded-lg text-xs">
                <x-icon name="download" class="w-3.5 h-3.5" /> Dev CV
            </a>
            <a href="/cv/sisco_cv-DS.docx" download
               class="flex items-center justify-center gap-1.5 py-2 px-3 border-2 border-[#f4c430] text-[#f4c430] font-semibold rounded-lg text-xs">
                <x-icon name="download" class="w-3.5 h-3.5" /> DS CV
            </a>
        </div>
    </div>

    {{-- Mobile content sections --}}
    <div class="px-4 py-6">
        <div id="content-area-mobile" class="max-w-2xl mx-auto">
            {{-- sections injected here by JS --}}
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     DESKTOP LAYOUT (lg and above)
     - Fixed icon sidebar
     - Fixed profile panel
     - Scrollable content
     ═══════════════════════════════════════ --}}
<div class="hidden lg:flex h-screen overflow-hidden">

    {{-- Icon sidebar --}}
    <aside class="shrink-0 w-20 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700
                  flex flex-col items-center py-8 space-y-8 h-full">
        <button id="theme-toggle" aria-label="Toggle theme"
                class="p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
            <svg id="theme-icon-sun"  class="w-6 h-6 hidden dark:block text-[#f4c430] group-hover:rotate-45 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <svg id="theme-icon-moon" class="w-6 h-6 block dark:hidden text-[#f4c430] group-hover:-rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
        </button>
        <nav class="flex flex-col space-y-6">
            <x-nav-link section="about"   label="About"   icon="user"     />
            <x-nav-link section="resume"  label="Resume"  icon="document" />
            <x-nav-link section="skills"  label="Skills"  icon="bulb"     />
            <x-nav-link section="contact" label="Contact" icon="mail"     />
        </nav>
    </aside>

    {{-- Profile panel --}}
    <div class="shrink-0 w-80 xl:w-96 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700
                h-full overflow-y-auto flex flex-col items-center justify-center p-8">
        <div class="text-center space-y-4 w-full">
            <div class="relative w-36 h-36 mx-auto">
                <img src="/image/portfolio.jpeg" alt="{{ config('portfolio.name') }}"
                     class="w-full h-full rounded-full object-cover border-4 border-[#f4c430] shadow-lg">
                <span class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">{{ config('portfolio.name') }}</h1>
                <p class="text-[#f4c430] font-semibold mt-1 text-sm leading-snug">Software Developer &amp; Data Scientist</p>
                <p class="text-gray-400 text-xs mt-1">📍 {{ config('portfolio.location') }}</p>
            </div>
            <div class="w-12 h-0.5 bg-[#f4c430] rounded-full mx-auto"></div>
            <div class="flex flex-wrap justify-center gap-1.5">
                <x-skill-badge>🎓 Business Computing</x-skill-badge>
                <x-skill-badge>✅ Open to Work</x-skill-badge>
                <x-skill-badge>🌐 Remote / Onsite</x-skill-badge>
            </div>
            <div class="flex justify-center gap-2">
                <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   />
                <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" />
                <x-social-link href="https://x.com/cherryCisco"                           title="Twitter"  icon="twitter"  />
                <x-social-link href="https://wa.me/256784309829"                          title="WhatsApp" icon="whatsapp" />
            </div>
            <div class="space-y-2 w-full">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium text-left">Download CV</p>
                <a href="/cv/cherop-sisco-cv.pdf" download
                   class="flex w-full items-center justify-center gap-2 px-4 py-2 bg-[#f4c430] hover:bg-[#e0b020] active:scale-95 text-gray-900 font-semibold rounded-lg transition-all text-xs">
                    <x-icon name="download" class="w-3.5 h-3.5" /> Software Developer CV
                </a>
                <a href="/cv/sisco_cv-DS.docx" download
                   class="flex w-full items-center justify-center gap-2 px-4 py-2 bg-[#f4c430]/10 hover:bg-[#f4c430]/20 active:scale-95 border border-[#f4c430]/40 text-[#b8900a] dark:text-[#f4c430] font-semibold rounded-lg transition-all text-xs">
                    <x-icon name="download" class="w-3.5 h-3.5" /> Data Science CV
                </a>
                <button data-section="contact"
                        class="nav-link flex w-full items-center justify-center gap-2 px-4 py-2.5 border-2 border-[#f4c430] text-[#f4c430] hover:bg-[#f4c430]/10 active:scale-95 font-semibold rounded-lg transition-all text-sm">
                    <x-icon name="mail" class="w-4 h-4" /> Contact Me
                </button>
            </div>
        </div>
    </div>

    {{-- Scrollable content --}}
    <main class="flex-1 overflow-y-auto min-h-0 p-8 xl:p-12 bg-gray-50 dark:bg-gray-900">
        <div id="content-area" class="max-w-4xl mx-auto">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
