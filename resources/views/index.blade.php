<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn"
        class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div class="flex h-full">
        <!-- Left Sidebar Navigation -->
        <aside id="sidebar"
            class="fixed lg:static inset-y-0 left-0 z-40 w-20 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col items-center py-8 space-y-8 transition-transform duration-300 -translate-x-full lg:translate-x-0">

            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg id="theme-icon-sun" class="w-6 h-6 hidden dark:block text-orange-500" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <svg id="theme-icon-moon" class="w-6 h-6 block dark:hidden text-orange-500" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
            </button>

            <!-- Navigation Links -->
            <nav class="flex flex-col space-y-6">
                <button data-section="home"
                    class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Home</span>
                </button>


                <button data-section="about"
                    class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">About</span>
                </button>

                <button data-section="resume"
                    class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span
                        class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Resume</span>
                </button>


                <button data-section="skills"
                    class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                        </path>
                    </svg>
                    <span
                        class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Skills</span>
                </button>


                <button data-section="contact"
                    class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span
                        class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Contact</span>
                </button>

            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">

            <!-- Middle Section - Profile Card -->
            <div
                class="w-full lg:w-96 bg-white dark:bg-gray-800 border-b lg:border-r lg:border-b-0 border-gray-200 dark:border-gray-700 p-8 flex flex-col items-center justify-center">
                <div class="text-center space-y-6">

                    <!-- Profile Photo -->
                    <div class="relative w-44 h-44 mx-auto">
                        <img src="/images/profile.jpg" alt="Cherop Sisco"
                            class="w-full h-full rounded-full object-cover border-4 border-orange-500 shadow-lg">
                        <!-- Online indicator -->
                        <span
                            class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                    </div>

                    <!-- Name and Title -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Cherop Sisco</h1>
                        <p class="text-orange-500 font-semibold mt-1">Aspiring Software Engineer</p>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">📍 Kampala, Uganda</p>
                    </div>

                    <!-- Divider -->
                    <div class="w-16 h-1 bg-orange-500 rounded-full mx-auto"></div>

                    <!-- Quick Info Pills -->
                    <div class="flex flex-wrap justify-center gap-2">
                        <span
                            class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-xs font-medium">🎓
                            MUBS Student</span>
                        <span
                            class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-xs font-medium">💻
                            Laravel Dev</span>
                        <span
                            class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-xs font-medium">🤖
                            AI Enthusiast</span>
                    </div>

                    <!-- Social Links -->
                    <div class="flex justify-center space-x-2">

                        <!-- GitHub -->
                        <a href="https://github.com/ciscocherop" title="GitHub" target="_blank" ...>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" target="_blank"
                            ...>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>

                        <!-- Twitter/X -->
                        <a href="https://x.com/CiscoCherop" title="Twitter" target="_blank" ...>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/256703558174" title="WhatsApp" target="_blank" ...>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </a>

                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 w-full">
                        <a href="/cv/cherop-sisco-cv.pdf" download
                            class="block w-full px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download CV
                        </a>
                        <button data-section="contact"
                            class="nav-link w-full px-6 py-3 border-2 border-orange-500 text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-900/20 font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Contact Me
                        </button>
                    </div>

                </div>
            </div>

            <!-- Right Section - Dynamic Content -->
            <div class="flex-1 overflow-y-auto p-8 lg:p-12">
                <div id="content-area" class="max-w-4xl mx-auto">

                    <!-- Home Section (Default) -->
                    <div id="home-section" class="content-section">

                        <!-- Greeting -->
                        <div class="mb-8">
                            <p class="text-orange-500 font-medium text-lg mb-2">👋 Hello, World!</p>
                            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                                I'm <span class="text-orange-500">Cherop Sisco</span>
                            </h2>

                            <!-- Animated Role -->
                            <div class="flex items-center gap-2 mt-3">
                                <span class="text-xl text-gray-600 dark:text-gray-300 font-medium">Aspiring</span>
                                <span id="rotating-role"
                                    class="text-xl font-semibold text-orange-500 transition-opacity duration-500">Software
                                    Engineer</span>
                            </div>
                        </div>

                        <!-- Pitch -->
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg max-w-xl mb-8">
                            I build <span class="text-orange-500 font-medium">structured, scalable</span> applications —
                            working across backend systems, APIs, and modern frontend technologies. Continuously growing
                            my engineering skills, one project at a time.
                        </p>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-4 mb-10 max-w-sm">
                            <div
                                class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                                <p class="text-2xl font-bold text-orange-500">5+</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Projects</p>
                            </div>
                            <div
                                class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                                <p class="text-2xl font-bold text-orange-500">3+</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Technologies</p>
                            </div>
                            <div
                                class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                                <p class="text-2xl font-bold text-orange-500">∞</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Curiosity</p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-wrap gap-4">
                            <button data-section="skills"
                                class="nav-link px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors">
                                View My Skills
                            </button>
                            <button data-section="contact"
                                class="px-6 py-3 border-2 border-orange-500 text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-900/20 font-medium rounded-lg transition-colors">
                                Let's Talk
                            </button>
                        </div>

                    </div>

                    <!-- About Section -->
                    <div id="about-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">About Me</h2>
                        <p class="text-orange-500 font-medium mb-8">Get to know me better</p>

                        <!-- Intro Paragraph -->
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 mb-6 shadow-sm">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                I'm a <span class="text-orange-500 font-semibold">technology-driven university
                                    student</span> with a strong interest in
                                <span class="text-orange-500 font-semibold">AI, data systems, and backend
                                    development.</span> I enjoy building solutions
                                that combine functionality with clarity — from global dashboards powered by APIs to
                                structured backend systems using Laravel.
                            </p>
                        </div>

                        <!-- Second Paragraph -->
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 mb-8 shadow-sm">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                I'm an aspiring <span class="text-orange-500 font-semibold">Software Engineer</span>
                                focused on understanding how systems work
                                from the ground up — from databases and backend logic to APIs and user interfaces. I
                                have also explored
                                <span class="text-orange-500 font-semibold">machine learning model training and
                                    deployment</span>, which has strengthened my
                                ability to think beyond just features and focus on <span
                                    class="text-orange-500 font-semibold">system design and scalability.</span>
                            </p>
                        </div>

                        <!-- What I Do Cards -->
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">What I Do</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

                            <div
                                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                <div
                                    class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Backend Development</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Building structured, scalable
                                    systems using Laravel, MySQL, and RESTful APIs.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                <div
                                    class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Frontend & UI</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Crafting clean, responsive
                                    interfaces using Tailwind CSS and modern JavaScript.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                <div
                                    class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">AI & Data Systems</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Exploring ML model training,
                                    deployment, and data-driven application development.</p>
                            </div>

                        </div>

                        <!-- Goal -->
                        <div class="border-l-4 border-orange-500 pl-5 py-2">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed italic">
                                "My long-term goal is to grow into a well-rounded Software Engineer capable of designing
                                <span class="text-orange-500 font-semibold not-italic">efficient, scalable, and
                                    impactful systems</span>
                                that solve real-world problems."
                            </p>
                        </div>

                    </div>

                    <!-- Resume Section -->
                    <div id="resume-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Resume</h2>
                        <p class="text-orange-500 font-medium mb-8">My journey so far</p>

                        <!-- Education -->
                        <div class="mb-10">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l6.16-3.422A12.083 12.083 0 0121 12c0 2.76-2.4 5.4-5.5 7.06A12.07 12.07 0 0112 21a12.07 12.07 0 01-3.5-1.94C5.4 17.4 3 14.76 3 12c0-.682.12-1.337.34-1.96L12 14z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Education</h3>
                            </div>

                            <div class="space-y-4">
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2">
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Bachelor of
                                                Business Computing</h4>
                                            <p class="text-orange-500 font-medium">Makerere University Business School
                                            </p>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm font-medium">2023
                                            – Present</span>
                                    </div>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2">
                                        <div>
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Uganda
                                                Advanced Certificate of Education</h4>
                                            <p class="text-orange-500 font-medium">John Paul Secondary, Chelekura</p>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm font-medium">2015
                                            – 2016</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Projects -->
                        <div class="mb-10">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Projects</h3>
                            </div>

                            <div class="space-y-4">

                                <!-- Project 1 -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">USSD
                                            Self-Medication System</h4>
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-full text-xs font-medium">Group
                                            · Hackathon</span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">A USSD system allowing
                                        users to connect with doctors and access health-related services. Implemented
                                        APIs, Python scripts, mobile system architecture, and database logic.</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Python</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">APIs</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Database</span>
                                    </div>
                                </div>

                                <!-- Project 2 -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Mental Health
                                            Awareness Website — "Your Mind Matters"</h4>
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-full text-xs font-medium">Personal</span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">A multi-page educational
                                        website promoting mental health awareness with a clean, responsive design. Led
                                        the full development process independently.</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">HTML</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">CSS</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Bootstrap</span>
                                    </div>
                                </div>

                                <!-- Project 3 -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Sipi Falls
                                            Tourism Website</h4>
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-full text-xs font-medium">Personal</span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">A dynamic tourism website
                                        promoting local tourism inspired by waterfalls from home. Full-stack development
                                        with both front-end and back-end features.</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">HTML/CSS</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">JavaScript</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">PHP</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">SQL</span>
                                    </div>
                                </div>

                                <!-- Project 4 -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">St. John's
                                            Church Management System</h4>
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-full text-xs font-medium">Group</span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">A web-based system to
                                        register and manage church members. Designed the dashboard, managed user
                                        registration flows, and implemented authentication features.</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Laravel</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Tailwind
                                            CSS</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">PHP</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">SQL</span>
                                    </div>
                                </div>

                                <!-- Project 5 -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex justify-between items-start flex-wrap gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Autism Spectrum
                                            Disorder Prediction System</h4>
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-full text-xs font-medium">Group
                                            · ML</span>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">A machine learning model to
                                        predict ASD in young children using structured tabular data. Handled model
                                        deployment and participated in model training and testing.</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Python</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Streamlit</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">Google
                                            Colab</span>
                                        <span
                                            class="px-2 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded text-xs">ML</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Soft Skills -->
                        <div>
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Soft Skills</h3>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">🤝
                                    Teamwork</span>
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">🧠
                                    Problem-solving</span>
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">💬
                                    Communication</span>
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">⏱️
                                    Time Management</span>
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">⚡
                                    Fast Learner</span>
                                <span
                                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 text-sm hover:border-orange-500 transition-colors">💛
                                    Empathy</span>
                            </div>
                        </div>

                    </div>

                    <!-- Skills Section -->
                    <div id="skills-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Skills</h2>
                        <p class="text-orange-500 font-medium mb-8">My technical toolkit</p>

                        <!-- Programming Languages -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Programming Languages
                                </h3>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors group">
                                    <div class="text-3xl mb-2">🐍</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Python</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ML & Scripting</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors group">
                                    <div class="text-3xl mb-2">☕</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Java</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">OOP & Logic</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors group">
                                    <div class="text-3xl mb-2">🌐</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">JavaScript</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Web Interactivity</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors group">
                                    <div class="text-3xl mb-2">🐘</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">PHP</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Backend</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors group">
                                    <div class="text-3xl mb-2">🗄️</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">SQL</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Databases</p>
                                </div>

                            </div>
                        </div>

                        <!-- Web Development -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Web Development</h3>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">🏗️</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">HTML & CSS</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Structure & Style</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">🎨</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Tailwind CSS</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Utility-first UI</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">🅱️</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Bootstrap</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Responsive Design</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">⚡</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Laravel</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PHP Framework</p>
                                </div>

                            </div>
                        </div>

                        <!-- Tools -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tools & Platforms</h3>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">💻</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">VS Code</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Code Editor</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">🐙</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Git & GitHub</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Version Control</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">🤖</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Google Colab</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ML Notebooks</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 text-center shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="text-3xl mb-2">📊</div>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Streamlit</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ML Deployment</p>
                                </div>

                            </div>
                        </div>

                        <!-- AI & Data -->
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">AI & Data Science</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-2xl">🧠</span>
                                        <p class="font-semibold text-gray-900 dark:text-white">Machine Learning</p>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Model training, testing, and
                                        deployment using Python libraries.</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-2xl">📁</span>
                                        <p class="font-semibold text-gray-900 dark:text-white">Data Handling</p>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Working with structured
                                        datasets, cleaning, and analysis.</p>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-2xl">🎨</span>
                                        <p class="font-semibold text-gray-900 dark:text-white">UI/UX Basics</p>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Designing intuitive,
                                        user-friendly interfaces with clean aesthetics.</p>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Contact Section -->
                    <div id="contact-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Get in Touch</h2>
                        <p class="text-orange-500 font-medium mb-8">Let's build something together</p>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                            <!-- Contact Info -->
                            <div class="space-y-4">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Contact Information
                                </h3>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">
                                            Email</p>
                                        <a href="mailto:siscocherop668@gmail.com"
                                            class="text-gray-900 dark:text-white font-medium hover:text-orange-500 transition-colors">siscocherop668@gmail.com</a>
                                    </div>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">
                                            Phone</p>
                                        <a href="tel:+256784309829"
                                            class="text-gray-900 dark:text-white font-medium hover:text-orange-500 transition-colors">+256
                                            784 309 829</a>
                                    </div>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-orange-500 transition-colors flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">
                                            Location</p>
                                        <p class="text-gray-900 dark:text-white font-medium">Kampala, Uganda</p>
                                    </div>
                                </div>

                                <!-- Social Links -->
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                                    <p
                                        class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-3">
                                        Find me on</p>
                                    <div class="flex gap-3">
                                        <a href="#"
                                            class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center hover:bg-orange-500 group transition-colors">
                                            <svg class="w-5 h-5 text-orange-500 group-hover:text-white transition-colors"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center hover:bg-orange-500 group transition-colors">
                                            <svg class="w-5 h-5 text-orange-500 group-hover:text-white transition-colors"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="w-10 h-10 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center hover:bg-orange-500 group transition-colors">
                                            <svg class="w-5 h-5 text-orange-500 group-hover:text-white transition-colors"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Send a Message</h3>
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm space-y-4">

                                    <div>
                                        <label
                                            class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Your
                                            Name</label>
                                        <input type="text" placeholder="John Doe"
                                            class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition-all">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Email
                                            Address</label>
                                        <input type="email" placeholder="john@example.com"
                                            class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition-all">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Subject</label>
                                        <input type="text" placeholder="Project collaboration..."
                                            class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition-all">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Message</label>
                                        <textarea rows="4" placeholder="Tell me about your project or idea..."
                                            class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition-all resize-none"></textarea>
                                    </div>

                                    <button type="button"
                                        class="w-full px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                        Send Message
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
</body>

</html>