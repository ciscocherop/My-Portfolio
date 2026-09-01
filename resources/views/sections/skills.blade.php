@php
$coreSkills = [
    ['name' => 'Python',        'level' => 4, 'emoji' => '🐍', 'category' => 'Data & Automation'],
    ['name' => 'PHP / Laravel', 'level' => 4, 'emoji' => '⚡', 'category' => 'Backend'],
    ['name' => 'JavaScript',    'level' => 3, 'emoji' => '🌐', 'category' => 'Frontend'],
    ['name' => 'SQL / MySQL',   'level' => 4, 'emoji' => '🗄️', 'category' => 'Database'],
    ['name' => 'React',         'level' => 3, 'emoji' => '⚛️', 'category' => 'Frontend'],
    ['name' => 'Tailwind CSS',  'level' => 4, 'emoji' => '🪄', 'category' => 'Styling'],
    ['name' => 'Scikit-learn',  'level' => 3, 'emoji' => '🧠', 'category' => 'Machine Learning'],
    ['name' => 'Git / GitHub',  'level' => 4, 'emoji' => '🐙', 'category' => 'DevOps'],
];
$levelLabels = [1 => 'Familiar', 2 => 'Learning', 3 => 'Comfortable', 4 => 'Proficient', 5 => 'Expert'];

$tagGroups = [
    ['label' => 'Languages',         'tags' => ['Python', 'PHP', 'JavaScript', 'Java', 'SQL', 'HTML5', 'CSS3']],
    ['label' => 'Frameworks & Libs', 'tags' => ['Laravel', 'React', 'Bootstrap', 'Tailwind CSS']],
    ['label' => 'Data Science',      'tags' => ['Pandas', 'NumPy', 'Matplotlib', 'Scikit-learn', 'Streamlit', 'Neural Networks', 'Data Visualisation']],
    ['label' => 'Tools & DevOps',    'tags' => ['Git', 'GitHub', 'GitLab', 'GitHub Actions', 'Vite', 'VS Code', 'Google Colab']],
];

// percentage out of 100
$softSkills = [
    ['name' => 'Communication',    'pct' => 95],
    ['name' => 'Teamwork',         'pct' => 95],
    ['name' => 'Problem Solving',  'pct' => 90],
    ['name' => 'Adaptability',     'pct' => 85],
    ['name' => 'Time Management',  'pct' => 80],
    ['name' => 'Fast Learner',     'pct' => 95],
];

$knowledge = [
    'Software Development',
    'Data Science & ML',
    'REST API Development',
    'Database Design',
    'Responsive Web Design',
    'Software Testing',
    'Systems Analysis',
    'IT Project Management',
    'Business Intelligence',
    'Version Control',
];

// SVG circle math: radius=28, circumference = 2πr ≈ 175.9
$r = 28;
$circ = round(2 * M_PI * $r, 2);
@endphp

<div id="skills-section" class="content-section hidden">

    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">Skills</h2>
    <div class="w-10 h-0.5 bg-[#f4c430] rounded-full mb-10"></div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- ══ LEFT: Technical Skills ══ --}}
        <div class="space-y-8">

            {{-- Core proficiencies --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">💻</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Technical</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="space-y-4">
                    @foreach ($coreSkills as $skill)
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <div class="flex items-center gap-2">
                                <span class="text-base leading-none">{{ $skill['emoji'] }}</span>
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $skill['name'] }}</span>
                                <span class="text-[10px] text-gray-400 dark:text-gray-500">· {{ $skill['category'] }}</span>
                            </div>
                            <span class="text-[10px] font-semibold text-[#f4c430] shrink-0">{{ $levelLabels[$skill['level']] }}</span>
                        </div>
                        <div class="w-full bg-gray-100 dark:bg-gray-700 rounded-full h-1.5 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#f4c430] to-[#e0b020] rounded-full"
                                 style="width: {{ ($skill['level'] / 5) * 100 }}%"
                                 role="progressbar"
                                 aria-valuenow="{{ $skill['level'] }}"
                                 aria-valuemin="0" aria-valuemax="5">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Tag groups --}}
            <div class="space-y-4">
                @foreach ($tagGroups as $group)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2.5">{{ $group['label'] }}</p>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach ($group['tags'] as $tag)
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-[#f4c430]/10 text-[#b8900a] dark:text-[#f4c430] border border-[#f4c430]/20 hover:bg-[#f4c430]/20 hover:scale-105 transition-all duration-150 cursor-default">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        {{-- ══ RIGHT: Soft Skills (pie cards) + Knowledge ══ --}}
        <div class="space-y-8">

            {{-- Soft skills as circular progress cards --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">🤝</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Soft Skills</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="grid grid-cols-3 gap-3">
                    @foreach ($softSkills as $skill)
                    @php
                        $offset = $circ - ($skill['pct'] / 100) * $circ;
                    @endphp
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-3 shadow-sm flex flex-col items-center gap-2 hover:border-[#f4c430] transition-colors duration-200">
                        {{-- SVG circular progress --}}
                        <svg width="70" height="70" viewBox="0 0 70 70" class="-rotate-90">
                            {{-- track --}}
                            <circle cx="35" cy="35" r="{{ $r }}"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="5"
                                    class="text-gray-100 dark:text-gray-700"/>
                            {{-- progress --}}
                            <circle cx="35" cy="35" r="{{ $r }}"
                                    fill="none"
                                    stroke="#f4c430"
                                    stroke-width="5"
                                    stroke-linecap="round"
                                    stroke-dasharray="{{ $circ }}"
                                    stroke-dashoffset="{{ $offset }}"/>
                        </svg>
                        {{-- percentage label sits over the svg --}}
                        <div class="-mt-12 mb-3 text-sm font-bold text-gray-900 dark:text-white">{{ $skill['pct'] }}%</div>
                        <p class="text-[11px] font-medium text-gray-600 dark:text-gray-400 text-center leading-tight">{{ $skill['name'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Knowledge checklist --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">📋</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Knowledge</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="space-y-2.5">
                    @foreach ($knowledge as $item)
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#f4c430] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
