@php
$education = [
  ['date'=>'Aug 2023 – Present','active'=>true, 'degree'=>'Bachelor of Business Computing','school'=>'Makerere University Business School','note'=>'Databases, Software Development, Business Intelligence, Systems Analysis, Software Engineering, IT Project Management'],
  ['date'=>'Sep 2025 Cohort',   'active'=>true, 'degree'=>'Certificate in Data Science &amp; Machine Learning','school'=>'Refactory Academy','note'=>'Data preprocessing, EDA, model development, evaluation and deployment with Python and Streamlit'],
  ['date'=>'2021 – 2022',       'active'=>false,'degree'=>'Uganda Advanced Certificate of Education','school'=>'John Paul Secondary School, Chelekura','note'=>null],
  ['date'=>'2015 – 2019',       'active'=>false,'degree'=>'Uganda Certificate of Education','school'=>'John Paul Secondary School, Chelekura','note'=>null],
];
$languages = [
  ['name'=>'English',   'dots'=>9,'label'=>'Fluent'],
  ['name'=>'Kupsabiny', 'dots'=>9,'label'=>'Native'],
  ['name'=>'Kiswahili', 'dots'=>5,'label'=>'Fair'],
  ['name'=>'Luganda',   'dots'=>3,'label'=>'Basic'],
];
$projects = [
  ['title'=>'Autism Prediction System',    'desc'=>'ML application predicting autism spectrum disorder traits from behavioural and demographic data. Full pipeline — preprocessing, EDA, model training, evaluation, and a Streamlit deployment.','github'=>'https://github.com/ciscocherop/Austim-Spectrum-Disorder-Prediction','live'=>null],
  ['title'=>'Sipi Falls Tourism Website',  'desc'=>'Responsive full-stack tourism platform showcasing Sipi Falls, its attractions, activities, and coffee experiences. Laravel backend with database-driven content.','github'=>null,'live'=>'https://sipifalls.resnetsystems.site/'],
  ['title'=>'Learning Management System',  'desc'=>'Collaborative LMS centralising educational content and user management. Contributed across frontend, backend, and database integration using React, Node.js, and PostgreSQL.','github'=>'https://github.com/CeaserTA/resnet_academy','live'=>null],
];
@endphp

<section id="resume-section" class="content-section hidden" aria-labelledby="resume-heading">

  <h2 id="resume-heading" class="text-title mb-1">
    Resume <span style="color:var(--color-text-muted); font-weight:400;">/ CV</span>
  </h2>
  <div class="mb-8" style="width:2.5rem; height:2px; background:var(--color-accent); border-radius:999px;"></div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    {{-- ── LEFT: Education + Languages ── --}}
    <div class="space-y-10">

      {{-- Education --}}
      <div>
        <div class="section-head">
          <div class="section-head-icon" aria-hidden="true">🎓</div>
          <h3 class="text-section-label">Education</h3>
        </div>
        <div class="section-rule"></div>

        <ol class="relative space-y-6" aria-label="Education history">
          <div class="timeline-line" aria-hidden="true"></div>
          @foreach ($education as $edu)
          <li class="pl-6 relative">
            <span
              class="absolute left-0 top-1.5 w-2.5 h-2.5 rounded-full"
              style="border: 2px solid var(--color-surface-card); background: {{ $edu['active'] ? 'var(--color-accent)' : 'var(--color-border)' }};"
              aria-hidden="true"
            ></span>
            <span
              class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold mb-1.5"
              style="border:1px solid {{ $edu['active'] ? 'var(--color-accent)' : 'var(--color-border)' }}; color:{{ $edu['active'] ? 'var(--color-accent-text)' : 'var(--color-text-muted)' }};"
            >{{ $edu['date'] }}</span>
            <p class="font-semibold text-sm" style="color:var(--color-text-primary);">{!! $edu['degree'] !!}</p>
            <p class="text-xs font-medium mt-0.5" style="color:var(--color-accent-text);">{{ $edu['school'] }}</p>
            @if ($edu['note'])
              <p class="text-xs mt-1 leading-relaxed" style="color:var(--color-text-muted);">{{ $edu['note'] }}</p>
            @endif
          </li>
          @endforeach
        </ol>
      </div>

      {{-- Languages --}}
      <div>
        <div class="section-head">
          <div class="section-head-icon" aria-hidden="true">🌍</div>
          <h3 class="text-section-label">Languages</h3>
        </div>
        <div class="section-rule"></div>

        <ul class="space-y-4" aria-label="Language proficiencies">
          @foreach ($languages as $lang)
          <li>
            <div class="flex items-center justify-between mb-1.5">
              <span class="text-sm font-medium" style="color:var(--color-text-primary);">{{ $lang['name'] }}</span>
              <span class="text-section-label">{{ $lang['label'] }}</span>
            </div>
            <div
              class="flex items-center gap-1"
              role="img"
              aria-label="{{ $lang['name'] }}: {{ $lang['label'] }}, {{ $lang['dots'] }} of 9"
            >
              @for ($i = 1; $i <= 9; $i++)
                <span
                  class="w-3 h-3 rounded-full"
                  style="background:{{ $i <= $lang['dots'] ? 'var(--color-accent)' : 'var(--color-border)' }};"
                ></span>
              @endfor
            </div>
          </li>
          @endforeach
        </ul>
      </div>

    </div>

    {{-- ── RIGHT: Projects ── --}}
    <div>
      <div class="section-head">
        <div class="section-head-icon" aria-hidden="true">🚀</div>
        <h3 class="text-section-label">Featured Projects</h3>
      </div>
      <div class="section-rule"></div>

      <ul class="space-y-4" aria-label="Featured projects">
        @foreach ($projects as $project)
        <li class="card card-hover p-5">
          <h4 class="font-semibold text-sm mb-1.5" style="color:var(--color-text-primary);">{{ $project['title'] }}</h4>
          <p class="text-xs leading-relaxed mb-3" style="color:var(--color-text-muted);">{{ $project['desc'] }}</p>
          <div class="flex items-center gap-4">
            @if ($project['github'])
              <a
                href="{{ $project['github'] }}"
                target="_blank" rel="noopener noreferrer"
                aria-label="{{ $project['title'] }} source code on GitHub"
                class="inline-flex items-center gap-1.5 text-xs font-semibold rounded px-0 py-0"
                style="color:var(--color-text-muted);"
                onmouseover="this.style.color='var(--color-accent-text)'"
                onmouseout="this.style.color='var(--color-text-muted)'"
              >
                <x-icon name="github" fill="currentColor" class="w-3.5 h-3.5" /> GitHub
              </a>
            @endif
            @if ($project['live'])
              <a
                href="{{ $project['live'] }}"
                target="_blank" rel="noopener noreferrer"
                aria-label="{{ $project['title'] }} live site"
                class="inline-flex items-center gap-1.5 text-xs font-semibold"
                style="color:var(--color-accent-text);"
                onmouseover="this.style.textDecoration='underline'"
                onmouseout="this.style.textDecoration='none'"
              >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Live Site
              </a>
            @endif
          </div>
        </li>
        @endforeach
      </ul>

      <div class="mt-5 text-center">
        <a
          href="https://github.com/ciscocherop"
          target="_blank" rel="noopener noreferrer"
          aria-label="View more projects on GitHub"
          class="btn btn-outline text-sm"
        >
          <x-icon name="github" fill="currentColor" class="w-4 h-4" />
          More on GitHub
        </a>
      </div>
    </div>

  </div>
</section>
