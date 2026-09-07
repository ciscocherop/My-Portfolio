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

// Qualitative labels instead of percentages
$softSkills = [
    ['name' => 'Communication',    'label' => 'Excellent', 'fill' => 5],
    ['name' => 'Teamwork',         'label' => 'Excellent', 'fill' => 5],
    ['name' => 'Problem Solving',  'label' => 'Strong',    'fill' => 4],
    ['name' => 'Adaptability',     'label' => 'Strong',    'fill' => 4],
    ['name' => 'Time Management',  'label' => 'Good',      'fill' => 3],
    ['name' => 'Fast Learner',     'label' => 'Excellent', 'fill' => 5],
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
@endphp

<div id="skills-section" class="content-section hidden">

    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">Skills</h2>
    <div class="w-10 h-0.5 bg-[#f4c430] rounded-full mb-10"></div>

    {{-- Stack to single column below 900px, two columns above --}}
    <div class="grid grid-cols-1 min-[900px]:grid-cols-2 gap-8">

        {{-- ══ LEFT: Technical ══ --}}
        <div class="space-y-8">

            {{-- Core proficiencies — larger rows, more vertical spacing --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">💻</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Technical</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="space-y-5">
                    @foreach ($coreSkills as $skill)
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3.5 shadow-sm">
                        <div class="flex items-center justify-between mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="text-xl leading-none">{{ $skill['emoji'] }}</span>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $skill['name'] }}</span>
                                    <span class="ml-1.5 text-xs text-gray-400 dark:text-gray-500">{{ $skill['category'] }}</span>
                                </div>
                            </div>
                            <span class="text-xs font-semibold text-[#a07800] dark:text-[#f4c430] shrink-0 bg-[#f4c430]/10 px-2 py-0.5 rounded-full">
                                {{ $levelLabels[$skill['level']] }}
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#f4c430] to-[#d4a017] rounded-full"
                                 style="width: {{ ($skill['level'] / 5) * 100 }}%"
                                 role="progressbar"
                                 aria-label="{{ $skill['name'] }} — {{ $levelLabels[$skill['level']] }}"
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
                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-3">{{ $group['label'] }}</p>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach ($group['tags'] as $tag)
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-[#f4c430]/10 text-[#a07800] dark:text-[#f4c430] border border-[#f4c430]/20 hover:bg-[#f4c430]/20 hover:scale-105 transition-all duration-150 cursor-default">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        {{-- ══ RIGHT: Soft Skills + Knowledge ══ --}}
        <div class="space-y-8">

            {{-- Soft skills — qualitative cards --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-full border-2 border-[#f4c430] flex items-center justify-center shrink-0">
                        <span class="text-lg">🤝</span>
                    </div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-700 dark:text-gray-300">Soft Skills</h3>
                </div>
                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 mb-6"></div>

                <div class="grid grid-cols-2 gap-3">
                    @foreach ($softSkills as $skill)
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 shadow-sm flex flex-col gap-2 hover:border-[#f4c430] transition-colors duration-200">
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">{{ $skill['name'] }}</p>
                        {{-- Dot indicator --}}
                        <div class="flex items-center gap-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="w-2.5 h-2.5 rounded-full {{ $i <= $skill['fill'] ? 'bg-[#f4c430]' : 'bg-gray-200 dark:bg-gray-600' }}"></span>
                            @endfor
                        </div>
                        <span class="text-xs font-medium text-[#a07800] dark:text-[#f4c430]">{{ $skill['label'] }}</span>
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

                <div class="space-y-3">
                    @foreach ($knowledge as $item)
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 shrink-0 text-[#a07800] dark:text-[#f4c430]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
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
