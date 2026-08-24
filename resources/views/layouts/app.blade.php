<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-initial-section="{{ session('success') || $errors->any() ? 'contact' : 'home' }}" class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside id="sidebar" class="static w-full lg:w-20 bg-white dark:bg-gray-800 border-b lg:border-r lg:border-b-0 border-gray-200 dark:border-gray-700 flex flex-row lg:flex-col items-center py-2 lg:py-8 px-2 lg:px-0 space-x-2 lg:space-x-0 lg:space-y-8 overflow-x-auto">
            <button id="theme-toggle" class="p-2 lg:p-3 shrink-0 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg id="theme-icon-sun" class="w-5 h-5 lg:w-6 lg:h-6 hidden dark:block text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <svg id="theme-icon-moon" class="w-5 h-5 lg:w-6 lg:h-6 block dark:hidden text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            </button>
            <nav class="flex flex-row lg:flex-col space-x-2 lg:space-x-0 lg:space-y-6">
                <x-nav-link section="home" label="Home" icon="home" />
                <x-nav-link section="about" label="About" icon="user" />
                <x-nav-link section="resume" label="Resume" icon="document" />
                <x-nav-link section="skills" label="Skills" icon="bulb" />
                <x-nav-link section="contact" label="Contact" icon="mail" />
            </nav>
        </aside>
        <div class="flex-1 flex flex-col lg:flex-row">
            <div class="w-full lg:w-96 bg-white dark:bg-gray-800 border-b lg:border-r lg:border-b-0 border-gray-200 dark:border-gray-700 p-4 lg:p-8 flex flex-col items-center lg:justify-center">
                <div class="text-center space-y-3 lg:space-y-6">
                    <div class="relative w-24 h-24 lg:w-44 lg:h-44 mx-auto"><img src="/image/profile.jpeg" alt="Cherop Sisco" class="w-full h-full rounded-full object-cover border-2 lg:border-4 border-orange-500 shadow-lg"><span class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span></div>
                    <div><h1 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Cherop Sisco</h1><p class="text-orange-500 font-semibold mt-1 text-sm lg:text-base">Software Engineer</p><p class="text-gray-500 dark:text-gray-400 text-xs lg:text-sm mt-1">📍 Kampala, Uganda</p></div>
                    <div class="w-12 lg:w-16 h-1 bg-orange-500 rounded-full mx-auto"></div>
                    <div class="flex flex-wrap justify-center gap-1 lg:gap-2"><x-skill-badge>🎓 MUBS Student</x-skill-badge><x-skill-badge>💻 Laravel Dev</x-skill-badge><x-skill-badge>🤖 AI Enthusiast</x-skill-badge></div>
                    <div class="flex justify-center space-x-1 lg:space-x-2">
                        <x-social-link href="https://github.com/ciscocherop" title="GitHub" icon="github" />
                        <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" />
                        <x-social-link href="https://x.com/CiscoCherop" title="Twitter" icon="twitter" />
                        <x-social-link href="https://wa.me/256703558174" title="WhatsApp" icon="whatsapp" />
                    </div>
                    <div class="space-y-2 lg:space-y-3 w-full"><a href="/cv/cherop-sisco-cv.pdf" download class="block w-full px-4 lg:px-6 py-2 lg:py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2 text-sm lg:text-base"><x-icon name="download" class="w-3 h-3 lg:w-4 lg:h-4" />Download CV</a><button data-section="contact" class="nav-link w-full px-4 lg:px-6 py-2 lg:py-3 border-2 border-orange-500 text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-900/20 font-medium rounded-lg transition-colors flex items-center justify-center gap-2 text-sm lg:text-base"><x-icon name="mail" class="w-3 h-3 lg:w-4 lg:h-4" />Contact Me</button></div>
                </div>
            </div>
            <div class="flex-1 overflow-y-auto p-4 lg:p-8 xl:p-12"><div id="content-area" class="max-w-4xl mx-auto">@yield('content')</div></div>
        </div>
    </div>
</body>
</html>