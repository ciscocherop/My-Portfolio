<section id="about-section" class="content-section" aria-labelledby="about-heading">

  {{-- ── Greeting ── --}}
  <div class="mb-10">
    <p class="text-section-label mb-3" style="color:var(--color-accent-text);">👋 Hello, I'm</p>

    <div class="text-display mb-3" id="about-heading">Cherop Sisco</div>

    {{-- Rotating role --}}
    <div class="flex items-baseline gap-2 flex-wrap mb-2">
      <span class="text-xl font-semibold" style="color:var(--color-text-body);">Junior</span>
      <span
        id="rotating-role"
        class="text-xl font-bold"
        style="color:var(--color-accent-text); transition: opacity 0.8s ease;"
        aria-live="polite"
        aria-atomic="true"
      >Software Developer</span>
    </div>
    <p class="text-sm font-medium" style="color:var(--color-text-muted);">Data Science &amp; Machine Learning</p>
  </div>

  {{-- ── Tagline ── --}}
  <p class="text-title mb-8" style="color:var(--color-text-body);">
    Building with technology.<br>
    <span style="color:var(--color-accent-text);">Solving with data.</span>
  </p>

  {{-- ── Stats ── --}}
  <div class="grid grid-cols-3 gap-3 mb-10 max-w-xs">
    @foreach ([['5+','Projects'],['8+','Skills'],['∞','Curiosity']] as [$n,$l])
    <div class="card text-center py-4 px-2">
      <p class="text-2xl font-bold" style="color:var(--color-accent-text);">{{ $n }}</p>
      <p class="text-xs mt-1" style="color:var(--color-text-muted);">{{ $l }}</p>
    </div>
    @endforeach
  </div>

  {{-- ── Bio ── --}}
  <div class="space-y-3 mb-8">
    <div class="card p-5 card-hover">
      <p class="text-body">
        I am a <strong style="color:var(--color-accent-text);">Business Computing graduate</strong> with a strong interest
        in software development, data science, and machine learning. My academic background combines
        <strong style="color:var(--color-text-primary);">business knowledge with technology</strong>,
        giving me a broad foundation in programming, databases, web and mobile development, business intelligence,
        systems analysis, software engineering, and IT project management.
      </p>
    </div>
    <div class="card p-5 card-hover">
      <p class="text-body">
        Alongside my degree, I have developed practical skills in
        <strong style="color:var(--color-accent-text);">Data Science and Machine Learning</strong> — working with Python,
        data analysis, visualisation, predictive modelling, and machine learning algorithms. I enjoy taking
        real-world problems, understanding underlying needs, and turning them into practical technology solutions.
      </p>
    </div>
  </div>

  {{-- ── What I Do ── --}}
  <h2 class="text-title mb-4">What I Do</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-8">
    @foreach ([
      ['/icons/software.png', 'Software Development',      'Building web and application solutions with React, JavaScript, Laravel, PHP, and RESTful APIs.'],
      ['/icons/datascience.jpg', 'Data Science &amp; ML',  'Uncovering insights and building predictive solutions with Python, Pandas, Scikit-learn, and Streamlit.'],
      [null,                  'Business &amp; Technology', 'Bridging business understanding and technical execution to create solutions that deliver real value.'],
    ] as [$icon, $title, $desc])
    <div class="card card-hover p-5 flex flex-col gap-2">
      @if($icon)
        <img src="{{ $icon }}" alt="" class="w-8 h-8 object-contain" aria-hidden="true">
      @else
        <span class="text-2xl" role="img" aria-hidden="true">💼</span>
      @endif
      <h3 class="font-semibold text-sm" style="color:var(--color-text-primary);">{!! $title !!}</h3>
      <p class="text-xs leading-relaxed" style="color:var(--color-text-muted);">{{ $desc }}</p>
    </div>
    @endforeach
  </div>

  {{-- ── Quote ── --}}
  <blockquote class="mb-8 pl-4 py-1" style="border-left:3px solid var(--color-accent);">
    <p class="text-body italic">"I enjoy turning real-world problems into practical technology solutions that create meaningful value."</p>
  </blockquote>

  {{-- ── CTAs ── --}}
  <div class="flex flex-wrap gap-3">
    <button data-section="skills"  class="nav-link btn btn-primary">View My Skills →</button>
    <button data-section="contact" class="nav-link btn btn-outline">Let's Talk →</button>
  </div>

</section>
