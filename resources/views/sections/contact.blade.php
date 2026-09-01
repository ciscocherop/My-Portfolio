<div id="contact-section" class="content-section hidden">
    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Get in Touch</h2>
    <p class="text-[#f4c430] font-medium mb-8">Let's build something together</p>

    @if (session('success'))
        <div role="status" class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Contact Information</h3>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">Email</p>
                <a href="mailto:{{ config('portfolio.email') }}"
                   class="text-gray-900 dark:text-white font-medium hover:text-[#f4c430] transition-colors">
                    {{ config('portfolio.email') }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-2">Phone</p>
                <a href="tel:+256784309829" class="block text-gray-900 dark:text-white font-medium hover:text-[#f4c430] transition-colors text-sm">+256 784 309 829</a>
                <a href="tel:+256703558174" class="block text-gray-900 dark:text-white font-medium hover:text-[#f4c430] transition-colors text-sm mt-1">+256 703 558 174</a>
            </div>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">Location</p>
                <p class="text-gray-900 dark:text-white font-medium">{{ config('portfolio.location') }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide mb-3">Find me on</p>
                <div class="flex gap-3">
                    <x-social-link href="https://github.com/ciscocherop"                       title="GitHub"   icon="github"   />
                    <x-social-link href="https://www.linkedin.com/in/sisco-cherop-193477294/" title="LinkedIn" icon="linkedin" />
                    <x-social-link href="https://x.com/cherryCisco"                           title="Twitter"  icon="twitter"  />
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-5">Send a Message</h3>
            <form method="POST" action="{{ route('contact.store') }}"
                  class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm space-y-4">
                @csrf
                @foreach([
                    ['name',    'Your Name',     'text',  'John Doe',                100],
                    ['email',   'Email Address', 'email', 'john@example.com',         150],
                    ['subject', 'Subject',       'text',  'Project collaboration...', null],
                ] as [$field, $label, $type, $placeholder, $maxlength])
                <div>
                    <label for="contact-{{ $field }}"
                           class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">
                        {{ $label }}
                    </label>
                    <input id="contact-{{ $field }}" name="{{ $field }}" type="{{ $type }}"
                           value="{{ old($field) }}" placeholder="{{ $placeholder }}"
                           @if(in_array($field, ['name','email'])) required @endif
                           @if($maxlength) maxlength="{{ $maxlength }}" @endif
                           class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg
                                  bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                  placeholder-gray-400
                                  focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]
                                  outline-none transition-all">
                    @error($field)
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                @endforeach

                <div>
                    <label for="contact-message"
                           class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">
                        Message
                    </label>
                    <textarea id="contact-message" name="message" rows="4"
                              placeholder="Tell me about your project or idea..." required maxlength="2000"
                              class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-lg
                                     bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white
                                     placeholder-gray-400
                                     focus:ring-2 focus:ring-[#f4c430]/50 focus:border-[#f4c430]
                                     outline-none transition-all resize-none">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full px-4 py-3 bg-[#f4c430] hover:bg-[#e0b020] active:scale-[.98]
                               text-gray-900 font-semibold rounded-lg transition-all duration-150">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
