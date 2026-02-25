<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cherop Sisco - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div class="flex h-full">
        <!-- Left Sidebar Navigation -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-20 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col items-center py-8 space-y-8 transition-transform duration-300 -translate-x-full lg:translate-x-0">
            
            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg id="theme-icon-sun" class="w-6 h-6 hidden dark:block text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <svg id="theme-icon-moon" class="w-6 h-6 block dark:hidden text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </button>

            <!-- Navigation Links -->
            <nav class="flex flex-col space-y-6">
                <button data-section="home" class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Home</span>
                </button>


                <button data-section="about" class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">About</span>
                </button>

                <button data-section="resume" class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Resume</span>
                </button>


                <button data-section="skills" class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Skills</span>
                </button>


                <button data-section="contact" class="nav-link p-3 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors group flex flex-col items-center">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-xs mt-1 text-gray-600 dark:text-gray-400 group-hover:text-orange-500">Contact</span>
                </button>

            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
            
            <!-- Middle Section - Profile Card -->
            <div class="w-full lg:w-96 bg-white dark:bg-gray-800 border-b lg:border-r lg:border-b-0 border-gray-200 dark:border-gray-700 p-8 flex flex-col items-center justify-center">
                <div class="text-center space-y-6">
                    <!-- Profile Photo -->
                    <div class="relative w-48 h-48 mx-auto">
                        <img src="/images/profile.jpg" alt="Cherop Sisco" class="w-full h-full rounded-full object-cover border-4 border-orange-500 shadow-lg">
                    </div>

                    <!-- Name and Title -->
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Cherop Sisco</h1>
                        <p class="text-orange-500 font-medium mt-2">Web Developer</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">AI and Science Enthusiast</p>
                    </div>

                    <!-- Social Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="p-2 text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="p-2 text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="p-2 text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="#" class="p-2 text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 w-full">
                        <a href="#" class="block w-full px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors">
                            Download CV
                        </a>
                        <button data-section="contact" class="block w-full px-6 py-3 border-2 border-orange-500 text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-900/20 font-medium rounded-lg transition-colors">
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
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Welcome! 👋</h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                Hi, I'm <span class="text-orange-500 font-semibold">Cherop Sisco</span>, a passionate web developer with a deep interest in AI and science. 
                            </p>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                I build modern, responsive web applications using cutting-edge technologies. My work combines creativity with technical expertise to deliver exceptional digital experiences.
                            </p>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                Explore my portfolio to learn more about my skills, experience, and projects. Feel free to reach out if you'd like to collaborate!
                            </p>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div id="about-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">About Me</h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                I'm a web developer passionate about creating elegant solutions to complex problems. With expertise in modern web technologies, I specialize in building scalable applications that make a difference.
                            </p>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                My journey in tech started with a curiosity about how things work, which evolved into a career focused on innovation and continuous learning. I'm particularly interested in the intersection of web development, artificial intelligence, and scientific computing.
                            </p>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                When I'm not coding, you'll find me exploring new technologies, contributing to open-source projects, or diving deep into the latest AI research.
                            </p>
                        </div>
                    </div>

                    <!-- Resume Section -->
                    <div id="resume-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Resume</h2>
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Experience</h3>
                                <div class="space-y-4">
                                    <div class="border-l-4 border-orange-500 pl-4">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Web Developer</h4>
                                        <p class="text-orange-500">Company Name • 2020 - Present</p>
                                        <p class="text-gray-600 dark:text-gray-300 mt-2">Description of your role and achievements.</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Education</h3>
                                <div class="border-l-4 border-orange-500 pl-4">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Degree Name</h4>
                                    <p class="text-orange-500">University Name • Year</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div id="skills-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Skills</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Frontend</h3>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">HTML/CSS</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">JavaScript</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">Tailwind CSS</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">Vue.js</span>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Backend</h3>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">PHP</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">Laravel</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">MySQL</span>
                                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-full text-sm">APIs</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div id="contact-section" class="content-section hidden">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Get in Touch</h2>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Contact Information</h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-6 h-6 text-orange-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">Email</p>
                                            <a href="mailto:your.email@example.com" class="text-orange-500 hover:underline">your.email@example.com</a>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-6 h-6 text-orange-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">Phone</p>
                                            <a href="tel:+1234567890" class="text-orange-500 hover:underline">+123 456 7890</a>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-6 h-6 text-orange-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">Location</p>
                                            <p class="text-gray-600 dark:text-gray-300">Your City, Country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Send a Message</h3>
                                <form class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                        <input type="email" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                                        <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg
