<section id="contact-section" class="content-section hidden" aria-labelledby="contact-heading">

  <h2 id="contact-heading" class="text-title mb-1">Get in Touch</h2>
  <p class="text-sm font-medium mb-8" style="color:var(--color-accent-text);">Let's build something together</p>

  {{-- Server-side success --}}
  @if (session('success'))
    <div
      role="status" aria-live="polite"
      class="mb-6 flex items-start gap-3 rounded-xl p-4"
      style="background:var(--color-success-bg); border:1px solid #BBF7D0;"
    >
      <svg class="w-5 h-5 shrink-0 mt-0.5" style="color:var(--color-success);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <p class="text-sm font-medium" style="color:#15803D;">{{ session('success') }}</p>
    </div>
  @endif

  {{-- Server-side error summary --}}
  @if ($errors->any())
    <div
      role="alert" aria-live="assertive"
      class="mb-6 flex items-start gap-3 rounded-xl p-4"
      style="background:var(--color-error-bg); border:1px solid #FECACA;"
    >
      <svg class="w-5 h-5 shrink-0 mt-0.5" style="color:var(--color-error);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <p class="text-sm font-medium" style="color:var(--color-error);">Please fix the errors below and try again.</p>
    </div>
  @endif

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    {{-- ── Contact info ── --}}
    <div class="space-y-3">
      <h3 class="text-section-label mb-4">Contact Information</h3>

      {{-- Email --}}
      <div class="card card-hover p-5">
        <p class="text-section-label mb-1.5">Email</p>
        <a
          href="mailto:{{ config('portfolio.email') }}"
          aria-label="Send an email to {{ config('portfolio.email') }}"
          class="text-sm font-medium break-all"
          style="color:var(--color-text-primary);"
          onmouseover="this.style.color='var(--color-accent-text)'"
          onmouseout="this.style.color='var(--color-text-primary)'"
        >{{ config('portfolio.email') }}</a>
      </div>

      {{-- Phone --}}
      <div class="card card-hover p-5">
        <p class="text-section-label mb-1.5">Phone</p>
        <a href="tel:+256784309829" aria-label="Call +256 784 309 829"
           class="block text-sm font-medium" style="color:var(--color-text-primary);"
           onmouseover="this.style.color='var(--color-accent-text)'"
           onmouseout="this.style.color='var(--color-text-primary)'"
        >+256 784 309 829</a>
        <a href="tel:+256703558174" aria-label="Call +256 703 558 174"
           class="block text-sm font-medium mt-1" style="color:var(--color-text-primary);"
           onmouseover="this.style.color='var(--color-accent-text)'"
           onmouseout="this.style.color='var(--color-text-primary)'"
        >+256 703 558 174</a>
      </div>

      {{-- Location --}}
      <div class="card p-5">
        <p class="text-section-label mb-1.5">Location</p>
        <p class="text-sm font-medium" style="color:var(--color-text-primary);">{{ config('portfolio.location') }}</p>
      </div>

      {{-- Social --}}
      <div class="card p-5">
        <p class="text-section-label mb-3">Find me on</p>
        <div class="flex gap-2">
          <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   aria-label="Cherop Sisco on GitHub" />
          <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" aria-label="Cherop Sisco on LinkedIn" />
          <x-social-link href="https://x.com/cherryCisco"                           title="X"        icon="twitter"  aria-label="Cherop Sisco on X" />
        </div>
      </div>
    </div>

    {{-- ── Form ── --}}
    <div>
      <h3 class="text-section-label mb-4">Send a Message</h3>

      <form
        id="contact-form"
        method="POST"
        action="{{ route('contact.store') }}"
        novalidate
        class="card p-6 space-y-4"
      >
        @csrf

        {{-- Name --}}
        <div>
          <label for="c-name" class="text-section-label mb-1.5 block">
            Your Name <span style="color:var(--color-error);" aria-hidden="true">*</span>
          </label>
          <input
            id="c-name" name="name" type="text"
            value="{{ old('name') }}" placeholder="John Doe"
            required maxlength="100" autocomplete="name"
            aria-required="true"
            class="form-input {{ $errors->has('name') ? 'error' : '' }}"
          >
          @error('name')
            <p id="c-name-err" role="alert" class="mt-1.5 text-xs flex items-center gap-1" style="color:var(--color-error);">
              <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        {{-- Email --}}
        <div>
          <label for="c-email" class="text-section-label mb-1.5 block">
            Email Address <span style="color:var(--color-error);" aria-hidden="true">*</span>
          </label>
          <input
            id="c-email" name="email" type="email"
            value="{{ old('email') }}" placeholder="john@example.com"
            required maxlength="150" autocomplete="email"
            aria-required="true"
            class="form-input {{ $errors->has('email') ? 'error' : '' }}"
          >
          @error('email')
            <p id="c-email-err" role="alert" class="mt-1.5 text-xs flex items-center gap-1" style="color:var(--color-error);">
              <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        {{-- Subject --}}
        <div>
          <label for="c-subject" class="text-section-label mb-1.5 block">Subject</label>
          <input
            id="c-subject" name="subject" type="text"
            value="{{ old('subject') }}" placeholder="Project collaboration…"
            class="form-input"
          >
        </div>

        {{-- Message --}}
        <div>
          <label for="c-message" class="text-section-label mb-1.5 block">
            Message <span style="color:var(--color-error);" aria-hidden="true">*</span>
          </label>
          <textarea
            id="c-message" name="message" rows="4"
            placeholder="Tell me about your project or idea…"
            required maxlength="2000"
            aria-required="true"
            class="form-input resize-none {{ $errors->has('message') ? 'error' : '' }}"
          >{{ old('message') }}</textarea>
          @error('message')
            <p id="c-message-err" role="alert" class="mt-1.5 text-xs flex items-center gap-1" style="color:var(--color-error);">
              <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        <button
          type="submit"
          id="contact-submit"
          class="btn btn-primary w-full"
        >
          <span id="submit-label">Send Message</span>
          <svg id="submit-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24" aria-hidden="true">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
          </svg>
        </button>

        <p class="text-center text-[10px]" style="color:var(--color-text-muted);">
          Fields marked <span style="color:var(--color-error);">*</span> are required
        </p>
      </form>
    </div>

  </div>
</section>
