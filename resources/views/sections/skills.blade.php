@php
$coreSkills = [
  ['name'=>'Python',        'level'=>4,'icon'=>'/icons/pyhon.jpg',        'cat'=>'Data & Automation'],
  ['name'=>'PHP / Laravel', 'level'=>4,'icon'=>'/icons/php,laravel.png',  'cat'=>'Backend'],
  ['name'=>'JavaScript',    'level'=>3,'icon'=>'/icons/js.png',           'cat'=>'Frontend'],
  ['name'=>'SQL / MySQL',   'level'=>4,'icon'=>null,                      'cat'=>'Database'],
  ['name'=>'React',         'level'=>3,'icon'=>'/icons/react.png',        'cat'=>'Frontend'],
  ['name'=>'Tailwind CSS',  'level'=>4,'icon'=>'/icons/twailwind.png',    'cat'=>'Styling'],
  ['name'=>'Scikit-learn',  'level'=>3,'icon'=>'/icons/scikit.png',       'cat'=>'Machine Learning'],
  ['name'=>'Git / GitHub',  'level'=>4,'icon'=>'/icons/github.png',       'cat'=>'DevOps'],
];
$levelLabels = [1=>'Familiar',2=>'Learning',3=>'Comfortable',4=>'Proficient',5=>'Expert'];
$tagGroups = [
  ['label'=>'Languages',        'tags'=>['Python','PHP','JavaScript','Java','SQL','HTML5','CSS3']],
  ['label'=>'Frameworks & Libs','tags'=>['Laravel','React','Bootstrap','Tailwind CSS']],
  ['label'=>'Data Science',     'tags'=>['Pandas','NumPy','Matplotlib','Scikit-learn','Streamlit','Neural Networks','Data Visualisation']],
  ['label'=>'Tools & DevOps',   'tags'=>['Git','GitHub','GitLab','GitHub Actions','Vite','VS Code','Google Colab']],
];
$softSkills = [
  ['name'=>'Communication',   'label'=>'Excellent','fill'=>5],
  ['name'=>'Teamwork',        'label'=>'Excellent','fill'=>5],
  ['name'=>'Problem Solving', 'label'=>'Strong',   'fill'=>4],
  ['name'=>'Adaptability',    'label'=>'Strong',   'fill'=>4],
  ['name'=>'Time Management', 'label'=>'Good',     'fill'=>3],
  ['name'=>'Fast Learner',    'label'=>'Excellent','fill'=>5],
];
$knowledge = [
  'Software Development','Data Science & ML','REST API Development','Database Design',
  'Responsive Web Design','Software Testing','Systems Analysis','IT Project Management',
  'Business Intelligence','Version Control',
];
@endphp

<section id="skills-section" class="content-section hidden" aria-labelledby="skills-heading">

  <h2 id="skills-heading" class="text-title mb-1">Skills</h2>
  <div class="mb-8" style="width:2.5rem;height:2px;background:var(--color-accent);border-radius:999px;"></div>

  <div class="grid grid-cols-1 min-[900px]:grid-cols-2 gap-8">

    {{-- ── LEFT: Technical ── --}}
    <div class="space-y-7">

      {{-- Core proficiency bars --}}
      <div>
        <div class="section-head">
          <div class="section-head-icon" aria-hidden="true">
            <img src="/icons/software.png" alt="" class="w-5 h-5 object-contain">
          </div>
          <h3 class="text-section-label">Technical Proficiency</h3>
        </div>
        <div class="section-rule"></div>

        <ul class="space-y-4" aria-label="Technical skills">
          @foreach ($coreSkills as $s)
          <li class="card card-hover px-4 py-3.5">
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-2.5">
                @if($s['icon'])
                  <img src="{{ $s['icon'] }}" alt="{{ $s['name'] }} icon" class="w-6 h-6 rounded object-contain" aria-hidden="true">
                @else
                  <span class="w-6 h-6 rounded flex items-center justify-center text-sm" style="background:var(--color-border);">🗄️</span>
                @endif
                <div>
                  <span class="text-sm font-semibold" style="color:var(--color-text-primary);">{{ $s['name'] }}</span>
                  <span class="ml-1.5 text-xs" style="color:var(--color-text-muted);">{{ $s['cat'] }}</span>
                </div>
              </div>
              <span
                class="badge text-[10px]"
                style="font-size:0.6rem;"
              >{{ $levelLabels[$s['level']] }}</span>
            </div>
            <div
              class="progress-track"
              role="progressbar"
              aria-label="{{ $s['name'] }} — {{ $levelLabels[$s['level']] }}"
              aria-valuenow="{{ $s['level'] }}"
              aria-valuemin="0"
              aria-valuemax="5"
            >
              <div class="progress-fill" style="width:{{ ($s['level']/5)*100 }}%;"></div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>

      {{-- Tag groups --}}
      <div class="space-y-3">
        @foreach ($tagGroups as $g)
        <div class="card p-4">
          <p class="text-section-label mb-2.5">{{ $g['label'] }}</p>
          <div class="flex flex-wrap gap-1.5" role="list" aria-label="{{ $g['label'] }} technologies">
            @foreach ($g['tags'] as $tag)
              <span class="badge badge-hover" role="listitem">{{ $tag }}</span>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>

    </div>

    {{-- ── RIGHT: Soft Skills + Knowledge ── --}}
    <div class="space-y-7">

      {{-- Soft skills — 2-col qualitative cards --}}
      <div>
        <div class="section-head">
          <div class="section-head-icon" aria-hidden="true">🤝</div>
          <h3 class="text-section-label">Soft Skills</h3>
        </div>
        <div class="section-rule"></div>

        <ul class="grid grid-cols-2 gap-3" aria-label="Soft skills">
          @foreach ($softSkills as $s)
          <li class="card card-hover p-4 flex flex-col gap-2">
            <p class="text-sm font-semibold" style="color:var(--color-text-primary);">{{ $s['name'] }}</p>
            <div class="flex items-center gap-1" role="img" aria-label="{{ $s['name'] }}: {{ $s['label'] }}, {{ $s['fill'] }} of 5">
              @for ($i = 1; $i <= 5; $i++)
                <span class="w-2.5 h-2.5 rounded-full" style="background:{{ $i <= $s['fill'] ? 'var(--color-accent)' : 'var(--color-border)' }};"></span>
              @endfor
            </div>
            <span class="text-xs font-medium" style="color:var(--color-accent-text);">{{ $s['label'] }}</span>
          </li>
          @endforeach
        </ul>
      </div>

      {{-- Knowledge checklist --}}
      <div>
        <div class="section-head">
          <div class="section-head-icon" aria-hidden="true">📋</div>
          <h3 class="text-section-label">Knowledge Areas</h3>
        </div>
        <div class="section-rule"></div>

        <ul class="space-y-2.5" aria-label="Knowledge areas">
          @foreach ($knowledge as $item)
          <li class="flex items-center gap-3">
            <img src="/icons/tick.png" alt="" class="w-4 h-4 shrink-0 object-contain" aria-hidden="true">
            <span class="text-sm" style="color:var(--color-text-body);">{{ $item }}</span>
          </li>
          @endforeach
        </ul>
      </div>

    </div>
  </div>
</section>
