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
    {{-- Poppins — same font as maxicodes.com --}}
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-initial-section="{{ session('success') || $errors->any() ? 'contact' : 'about' }}"
      class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<div class="flex h-screen overflow-hidden">

    {{-- ── Icon sidebar (fixed strip) ── --}}
    <aside id="sidebar"
           class="shrink-0 w-full lg:w-20 bg-white dark:bg-gray-800
                  border-b lg:border-b-0 lg:border-r border-gray-200 dark:border-gray-700
                  flex flex-row lg:flex-col items-center
                  py-2 lg:py-8 px-2 lg:px-0
                  space-x-2 lg:space-x-0 lg:space-y-8
                  overflow-x-auto lg:overflow-visible lg:h-full shrink-0">

        {{-- Theme toggle --}}
        <button id="theme-toggle" aria-label="Toggle colour theme"
                class="p-2 lg:p-3 shrink-0 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
            <svg id="theme-icon-sun"  class="w-5 h-5 lg:w-6 lg:h-6 hidden dark:block text-[#f4c430] transition-transform duration-300 group-hover:rotate-45"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <svg id="theme-icon-moon" class="w-5 h-5 lg:w-6 lg:h-6 block dark:hidden text-[#f4c430] transition-transform duration-300 group-hover:-rotate-12"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
        </button>

        {{-- Nav links --}}
        <nav class="flex flex-row lg:flex-col space-x-2 lg:space-x-0 lg:space-y-6">
            <x-nav-link section="about"   label="About"   icon="user"     />
            <x-nav-link section="resume"  label="Resume"  icon="document" />
            <x-nav-link section="skills"  label="Skills"  icon="bulb"     />
            <x-nav-link section="contact" label="Contact" icon="mail"     />
        </nav>
    </aside>

    {{-- ── Inner wrapper: profile panel + content ── --}}
    <div class="flex flex-1 flex-col lg:flex-row min-h-0">

        {{-- ── Profile / identity panel (sticky) ── --}}
        <div class="shrink-0 w-full lg:w-96 bg-white dark:bg-gray-800
                    border-b lg:border-b-0 lg:border-r border-gray-200 dark:border-gray-700
                    lg:h-full lg:overflow-y-auto
                    flex flex-col items-center justify-center p-4 lg:p-8">
            <div class="text-center space-y-3 lg:space-y-5 w-full">

                {{-- Avatar --}}
                <div class="relative w-24 h-24 lg:w-40 lg:h-40 mx-auto">
                    <img src="/image/portfolio.jpeg"
                         alt="{{ config('portfolio.name') }}"
                         width="160" height="160" loading="lazy"
                         class="w-full h-full rounded-full object-cover border-2 lg:border-4 border-[#f4c430] shadow-lg">
                    <span class="absolute bottom-2 right-2 w-3.5 h-3.5 lg:w-4 lg:h-4 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                </div>

                {{-- Name & title --}}
                <div>
                    <h1 class="text-lg lg:text-2xl font-semibold text-gray-900 dark:text-white leading-tight">
                        {{ config('portfolio.name') }}
                    </h1>
                    <p class="text-[#f4c430] font-semibold mt-1 text-xs lg:text-sm leading-snug">
                        Software Developer &amp; Data Scientist
                    </p>
                    <p class="text-gray-400 text-xs mt-1">📍 {{ config('portfolio.location') }}</p>
                </div>

                <div class="w-10 lg:w-14 h-0.5 bg-[#f4c430] rounded-full mx-auto"></div>

                {{-- Badges --}}
                <div class="flex flex-wrap justify-center gap-1 lg:gap-2">
                    <x-skill-badge>🎓 Business Computing</x-skill-badge>
                    <x-skill-badge>✅ Open to Work</x-skill-badge>
                    <x-skill-badge>🌐 Remote / Onsite</x-skill-badge>
                </div>

                {{-- Social links --}}
                <div class="flex justify-center gap-2">
                    <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   />
                    <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" />
                    <x-social-link href="https://x.com/cherryCisco"                            title="Twitter"  icon="twitter"  />
                    <x-social-link href="https://wa.me/256784309829"                          title="WhatsApp" icon="whatsapp" />
                </div>

                {{-- CTA buttons --}}
                <div class="space-y-2 lg:space-y-3 w-full">
                    {{-- CV downloads — two roles --}}
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium text-left">Download CV</p>
                    <a href="/cv/cherop-sisco-cv.pdf" download
                       class="flex w-full items-center justify-center gap-2 px-4 py-2
                              bg-[#f4c430] hover:bg-[#e0b020] active:scale-95
                              text-gray-900 font-semibold rounded-lg transition-all duration-200 text-xs">
                        <x-icon name="download" class="w-3.5 h-3.5" />
                        Software Developer CV
                    </a>
                    <a href="/cv/sisco_cv-DS.docx" download
                       class="flex w-full items-center justify-center gap-2 px-4 py-2
                              bg-[#f4c430]/10 hover:bg-[#f4c430]/20 active:scale-95
                              border border-[#f4c430]/40 text-[#b8900a] dark:text-[#f4c430]
                              font-semibold rounded-lg transition-all duration-200 text-xs">
                        <x-icon name="download" class="w-3.5 h-3.5" />
                        Data Science CV
                    </a>
                    <button data-section="contact"
                            class="nav-link flex w-full items-center justify-center gap-2 px-4 lg:px-6 py-2 lg:py-3
                                   border-2 border-[#f4c430] text-[#f4c430]
                                   hover:bg-[#f4c430]/10 active:scale-95
                                   font-semibold rounded-lg transition-all duration-200 text-sm lg:text-base">
                        <x-icon name="mail" class="w-3.5 h-3.5 lg:w-4 lg:h-4" />
                        Contact Me
                    </button>
                </div>
            </div>
        </div>

        {{-- ── Scrollable content area ── --}}
        <main class="flex-1 overflow-y-auto min-h-0 p-4 lg:p-8 xl:p-12">
            <div id="content-area" class="max-w-4xl mx-auto">
                @yield('content')
            </div>
        </main>

    </div>
</div>

</body>
</html>
