<div id="contact-section" class="content-section hidden">
    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Get in Touch</h2>
    <p class="text-[#a07800] dark:text-[#f4c430] font-medium mb-8">Let's build something together</p>

    {{-- Success message --}}
    @if (session('success'))
        <div role="status" aria-live="polite"
             class="mb-6 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 dark:border-green-800 dark:bg-green-900/20 p-4">
            <svg class="w-5 h-5 text-green-600 dark:text-green-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Error summary --}}
    @if ($errors->any())
        <div role="alert" aria-live="assertive"
             class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 dark:border-red-800 dark:bg-red-900/20 p-4">
            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm text-red-600 dark:text-red-400 font-medium">Please fix the errors below before sending.</p>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Contact info --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Contact Information</h3>

            {{-- Email --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-[#f4c430] transition-colors duration-200">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-1">Email</p>
                <a href="mailto:{{ config('portfolio.email') }}" aria-label="Send email to {{ config('portfolio.email') }}"
                   class="text-sm font-medium text-gray-900 dark:text-white hover:text-[#a07800] dark:hover:text-[#f4c430] transition-colors break-all">
                    {{ config('portfolio.email') }}
                </a>
            </div>

            {{-- Phone --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm hover:border-[#f4c430] transition-colors duration-200">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-2">Phone</p>
                <a href="tel:+256784309829" aria-label="Call +256 784 309 829"
                   class="block text-sm font-medium text-gray-900 dark:text-white hover:text-[#a07800] dark:hover:text-[#f4c430] transition-colors">
                    +256 784 309 829
                </a>
                <a href="tel:+256703558174" aria-label="Call +256 703 558 174"
                   class="block text-sm font-medium text-gray-900 dark:text-white hover:text-[#a07800] dark:hover:text-[#f4c430] transition-colors mt-1">
                    +256 703 558 174
                </a>
            </div>

            {{-- Location --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-1">Location</p>
                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ config('portfolio.location') }}</p>
            </div>

            {{-- Social --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-3">Find me on</p>
                <div class="flex gap-3">
                    <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   aria-label="Visit Cherop Sisco on GitHub" />
                    <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" aria-label="Visit Cherop Sisco on LinkedIn" />
                    <x-social-link href="https://x.com/cherryCisco"                           title="X"        icon="twitter"  aria-label="Visit Cherop Sisco on X" />
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Send a Message</h3>
            <form id="contact-form" method="POST" action="{{ route('contact.store') }}" novalidate
                  class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm space-y-4">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="contact-name"
                           class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1.5">
                        Your Name <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <input id="contact-name" name="name" type="text"
                           value="{{ old('name') }}" placeholder="John Doe"
                           required maxlength="100"
                           aria-required="true"
                           aria-describedby="{{ $errors->has('name') ? 'name-error' : '' }}"
                           class="w-full px-4 py-3 border rounded-lg text-sm
                                  bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                  placeholder-gray-400 outline-none transition-all
                                  {{ $errors->has('name') ? 'border-red-400 focus:ring-2 focus:ring-red-300' : 'border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]' }}">
                    @error('name')
                        <p id="name-error" role="alert" class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="contact-email"
                           class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1.5">
                        Email Address <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <input id="contact-email" name="email" type="email"
                           value="{{ old('email') }}" placeholder="john@example.com"
                           required maxlength="150"
                           aria-required="true"
                           aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}"
                           class="w-full px-4 py-3 border rounded-lg text-sm
                                  bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                  placeholder-gray-400 outline-none transition-all
                                  {{ $errors->has('email') ? 'border-red-400 focus:ring-2 focus:ring-red-300' : 'border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]' }}">
                    @error('email')
                        <p id="email-error" role="alert" class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Subject --}}
                <div>
                    <label for="contact-subject"
                           class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1.5">
                        Subject
                    </label>
                    <input id="contact-subject" name="subject" type="text"
                           value="{{ old('subject') }}" placeholder="Project collaboration..."
                           class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg text-sm
                                  bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                  placeholder-gray-400 outline-none transition-all
                                  focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]">
                </div>

                {{-- Message --}}
                <div>
                    <label for="contact-message"
                           class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1.5">
                        Message <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <textarea id="contact-message" name="message" rows="4"
                              placeholder="Tell me about your project or idea..."
                              required maxlength="2000"
                              aria-required="true"
                              aria-describedby="{{ $errors->has('message') ? 'message-error' : '' }}"
                              class="w-full px-4 py-3 border rounded-lg text-sm
                                     bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                     placeholder-gray-400 outline-none transition-all resize-none
                                     {{ $errors->has('message') ? 'border-red-400 focus:ring-2 focus:ring-red-300' : 'border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]' }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p id="message-error" role="alert" class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" id="contact-submit"
                        class="w-full px-4 py-3 bg-[#f4c430] hover:bg-[#d4a017] active:scale-[.98]
                               text-gray-900 font-semibold rounded-lg transition-all duration-150
                               flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed">
                    <span id="submit-label">Send Message</span>
                    <svg id="submit-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </button>

                <p class="text-[10px] text-gray-400 dark:text-gray-500 text-center">
                    Fields marked <span class="text-red-500">*</span> are required
                </p>
            </form>
        </div>
    </div>
</div>
