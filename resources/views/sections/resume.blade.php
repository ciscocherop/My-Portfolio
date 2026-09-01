<div id="resume-section" class="content-section hidden">

    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">
        Resume <span class="text-gray-400 dark:text-gray-500 font-normal">|</span>
        <span class="text-gray-500 dark:text-gray-400 font-normal text-2xl">Curriculum Vitae</span>
    </h2>
    <div class="w-10 h-0.5 bg-[#f4c430] rounded-full mb-10"></div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- ══ LEFT: Education + Languages ══ --}}
        <div class="space-y-10">

            {{-- Education --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">🎓</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Education</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="relative space-y-6">
                    <div class="absolute left-[5px] top-2 bottom-2 w-px bg-gray-200 dark:bg-gray-700"></div>

                    @php
                    $education = [
                        [
                            'date'   => 'Aug 2023 – Present',
                            'active' => true,
                            'degree' => 'Bachelor of Business Computing',
                            'school' => 'Makerere University Business School',
                            'note'   => 'Databases, Software Development, Business Intelligence, Systems Analysis, Software Engineering, IT Project Management',
                        ],
                        [
                            'date'   => 'Sep 2025 Cohort',
                            'active' => true,
                            'degree' => 'Certificate in Data Science & Machine Learning',
                            'school' => 'Refactory Academy',
                            'note'   => 'Data preprocessing, EDA, model development, evaluation and deployment with Python and Streamlit',
                        ],
                        [
                            'date'   => '2021 – 2022',
                            'active' => false,
                            'degree' => 'Uganda Advanced Certificate of Education',
                            'school' => 'John Paul Secondary School, Chelekura',
                            'note'   => null,
                        ],
                        [
                            'date'   => '2015 – 2019',
                            'active' => false,
                            'degree' => 'Uganda Certificate of Education',
                            'school' => 'John Paul Secondary School, Chelekura',
                            'note'   => null,
                        ],
                    ];
                    @endphp

                    @foreach ($education as $edu)
                    <div class="pl-6 relative">
                        <span class="absolute left-0 top-1.5 w-2.5 h-2.5 rounded-full border-2 border-white dark:border-gray-900 {{ $edu['active'] ? 'bg-[#f4c430]' : 'bg-gray-300 dark:bg-gray-600' }}"></span>
                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold mb-1.5 border {{ $edu['active'] ? 'border-[#f4c430] text-[#f4c430]' : 'border-gray-300 dark:border-gray-600 text-gray-400' }}">
                            {{ $edu['date'] }}
                        </span>
                        <h4 class="font-semibold text-gray-900 dark:text-white text-sm leading-snug">{{ $edu['degree'] }}</h4>
                        <p class="text-xs text-[#f4c430] font-medium mt-0.5">{{ $edu['school'] }}</p>
                        @if ($edu['note'])
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 leading-relaxed">{{ $edu['note'] }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Languages --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">🌍</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Languages</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                @php
                $languages = [
                    ['name' => 'English',   'dots' => 9, 'label' => 'Fluent'],
                    ['name' => 'Kupsabiny', 'dots' => 9, 'label' => 'Native'],
                    ['name' => 'Kiswahili', 'dots' => 5, 'label' => 'Fair'],
                    ['name' => 'Luganda',   'dots' => 3, 'label' => 'Basic'],
                ];
                @endphp

                <div class="space-y-5">
                    @foreach ($languages as $lang)
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $lang['name'] }}</span>
                            <span class="text-[10px] text-gray-400 dark:text-gray-500 font-medium uppercase tracking-wide">{{ $lang['label'] }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            @for ($i = 1; $i <= 9; $i++)
                                <span class="w-3.5 h-3.5 rounded-full {{ $i <= $lang['dots'] ? 'bg-[#f4c430]' : 'bg-gray-200 dark:bg-gray-700' }}"></span>
                            @endfor
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- ══ RIGHT: Featured Projects ══ --}}
        <div>
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                    <span class="text-lg">🚀</span>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Featured Projects</h3>
            </div>
            <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

            <div class="space-y-5">

                {{-- Autism Prediction --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-[#f4c430] transition-colors duration-200">
                    <h4 class="font-semibold text-gray-900 dark:text-white text-sm mb-1">Autism Prediction System</h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed mb-3">
                        ML application predicting autism spectrum disorder traits from behavioral and demographic data. Full pipeline — preprocessing, EDA, model training, evaluation, and a Streamlit deployment.
                    </p>
                    <a href="https://github.com/ciscocherop/Austim-Spectrum-Disorder-Prediction" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 hover:text-[#f4c430] transition-colors">
                        <x-icon name="github" fill="currentColor" class="w-3.5 h-3.5" /> GitHub
                    </a>
                </div>

                {{-- Sipi Falls --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-[#f4c430] transition-colors duration-200">
                    <h4 class="font-semibold text-gray-900 dark:text-white text-sm mb-1">Sipi Falls Tourism Website</h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed mb-3">
                        Responsive full-stack tourism platform showcasing Sipi Falls, its attractions, activities, and coffee experiences — Laravel backend with database-driven content.
                    </p>
                    <a href="https://sipifalls.resnetsystems.site/" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1 text-xs font-semibold text-[#f4c430] hover:underline">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Live Site
                    </a>
                </div>

                {{-- LMS --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-[#f4c430] transition-colors duration-200">
                    <h4 class="font-semibold text-gray-900 dark:text-white text-sm mb-1">Learning Management System</h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed mb-3">
                        Collaborative LMS centralizing educational content and user management. Contributed across frontend, backend, and database integration using React, Node.js, and PostgreSQL.
                    </p>
                    <a href="https://github.com/CeaserTA/resnet_academy" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 hover:text-[#f4c430] transition-colors">
                        <x-icon name="github" fill="currentColor" class="w-3.5 h-3.5" /> GitHub
                    </a>
                </div>

            </div>

            {{-- More on GitHub --}}
            <div class="mt-6 text-center">
                <a href="https://github.com/ciscocherop" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 border-2 border-[#f4c430] text-[#f4c430] hover:bg-[#f4c430]/10 font-semibold rounded-lg transition-all duration-150 text-sm active:scale-95">
                    <x-icon name="github" fill="currentColor" class="w-4 h-4" />
                    More projects on GitHub
                </a>
            </div>
        </div>

    </div>
</div>
