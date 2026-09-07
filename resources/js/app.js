/* ─────────────────────────────────────────────
   Utility — respect prefers-reduced-motion
───────────────────────────────────────────── */
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* ─────────────────────────────────────────────
   ThemeManager
───────────────────────────────────────────── */
class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || this.systemTheme();
        this.apply(this.theme, false);
    }
    systemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    apply(theme, animate = true) {
        this.theme = theme;
        if (!animate || prefersReducedMotion) {
            document.documentElement.classList.toggle('dark', theme === 'dark');
        } else {
            document.documentElement.classList.toggle('dark', theme === 'dark');
        }
        localStorage.setItem('theme', theme);
        // Update ARIA on toggle buttons
        document.querySelectorAll('#theme-toggle, #theme-toggle-mobile').forEach(btn => {
            btn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        });
    }
    toggle() { this.apply(this.theme === 'dark' ? 'light' : 'dark'); }
}

/* ─────────────────────────────────────────────
   NavigationManager
───────────────────────────────────────────── */
class NavigationManager {
    constructor() {
        this._sections = ['about', 'resume', 'skills', 'contact'];
        this._current = null;
    }

    isMobile() { return window.innerWidth < 1024; }

    showSection(id, pushState = true) {
        // Fallback to first section if unknown id
        if (!this._sections.includes(id)) id = 'about';
        if (id === this._current) return;
        this._current = id;

        // Show/hide
        document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));
        const target = document.getElementById(`${id}-section`);
        if (!target) return;
        target.classList.remove('hidden');

        // Scroll to top
        if (this.isMobile()) {
            const scroll = document.querySelector('.mobile-scroll');
            if (scroll) scroll.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
        } else {
            const main = document.getElementById('main-content');
            if (main) main.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
        }

        this._updateNav(id);

        // Move focus to the section heading (assistive tech announces the new content)
        const heading = target.querySelector('[id$="-heading"], h2');
        if (heading) {
            heading.setAttribute('tabindex', '-1');
            heading.focus({ preventScroll: true });
        }

        // History
        if (pushState) {
            const url = new URL(window.location.href);
            url.hash = id === 'about' ? '' : id;
            history.pushState({ section: id }, '', url);
        }

        // Re-init contact form if navigating to contact
        if (id === 'contact') setTimeout(initContactForm, 30);
    }

    _updateNav(id) {
        document.querySelectorAll('[data-nav-link]').forEach(btn => {
            const active = btn.getAttribute('data-section') === id;
            btn.setAttribute('aria-current', active ? 'page' : 'false');

            const icon = btn.querySelector('.nav-icon');
            const label = btn.querySelector('.nav-label');
            const bar = btn.querySelector('.nav-indicator');

            if (icon) {
                icon.style.color = active ? 'var(--color-accent)' : 'var(--color-text-muted)';
            }
            if (label) {
                label.style.color = active ? 'var(--color-accent-text)' : 'var(--color-text-muted)';
                label.style.fontWeight = active ? '700' : '600';
            }
            if (bar) {
                bar.style.opacity = active ? '1' : '0';
            }
            btn.style.background = active
                ? 'color-mix(in srgb, var(--color-accent) 10%, transparent)'
                : '';
        });
    }

    bindEvents() {
        // Click — all [data-section] elements
        document.querySelectorAll('[data-section]').forEach(el => {
            el.addEventListener('click', e => {
                const s = e.currentTarget.getAttribute('data-section');
                if (s) this.showSection(s);
            });
        });

        // Keyboard — arrow keys on the nav group
        document.querySelectorAll('[data-nav-link]').forEach(btn => {
            btn.addEventListener('keydown', e => {
                const all = [...document.querySelectorAll('[data-nav-link]')];
                const idx = all.indexOf(btn);
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    all[(idx + 1) % all.length]?.focus();
                }
                if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    e.preventDefault();
                    all[(idx - 1 + all.length) % all.length]?.focus();
                }
            });
        });

        // Browser back/forward
        window.addEventListener('popstate', () => {
            this.showSection(window.location.hash.slice(1) || 'about', false);
        });
    }
}

/* ─────────────────────────────────────────────
   RoleRotator — respects reduced-motion
───────────────────────────────────────────── */
class RoleRotator {
    constructor(roles) {
        this.roles = roles;
        this.idx = 0;
        this._i = null;
        this._t = null;
        if (!prefersReducedMotion) this.start();
    }
    getEl() { return document.getElementById('rotating-role'); }
    start() {
        this._i = setInterval(() => {
            const el = this.getEl();
            if (!el) return;
            el.style.opacity = '0';
            this._t = setTimeout(() => {
                this.idx = (this.idx + 1) % this.roles.length;
                const el2 = this.getEl();
                if (el2) { el2.textContent = this.roles[this.idx]; el2.style.opacity = '1'; }
            }, 800);
        }, 4000);
    }
    destroy() { clearInterval(this._i); clearTimeout(this._t); }
}

/* ─────────────────────────────────────────────
   Contact form — inline validation + spinner
───────────────────────────────────────────── */
function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form || form._bound) return;
    form._bound = true;

    const submitBtn = document.getElementById('contact-submit');
    const submitLbl = document.getElementById('submit-label');
    const spinner = document.getElementById('submit-spinner');

    function getErrId(field) { return field.id + '-inline-err'; }

    function clearErr(field) {
        field.classList.remove('error');
        document.getElementById(getErrId(field))?.remove();
    }

    function showErr(field, msg) {
        field.classList.add('error');
        let p = document.getElementById(getErrId(field));
        if (!p) {
            p = document.createElement('p');
            p.id = getErrId(field);
            p.role = 'alert';
            p.className = 'mt-1.5 text-xs flex items-center gap-1';
            p.style.color = 'var(--color-error)';
            p.innerHTML = `<svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span></span>`;
            field.parentNode.appendChild(p);
        }
        p.querySelector('span').textContent = msg;
    }

    function validateField(field) {
        if (!field.required) { clearErr(field); return true; }
        if (field.validity.valueMissing) { showErr(field, 'This field is required.'); return false; }
        if (field.validity.typeMismatch && field.type === 'email') { showErr(field, 'Please enter a valid email address.'); return false; }
        if (field.validity.tooLong) { showErr(field, `Max ${field.maxLength} characters.`); return false; }
        clearErr(field);
        return true;
    }

    form.querySelectorAll('input, textarea').forEach(field => {
        field.addEventListener('blur', () => { if (field.dataset.touched) validateField(field); });
        field.addEventListener('input', () => {
            field.dataset.touched = '1';
            if (field.dataset.touched) validateField(field);
        });
    });

    form.addEventListener('submit', e => {
        let valid = true;
        form.querySelectorAll('input[required], textarea[required]').forEach(f => {
            f.dataset.touched = '1';
            if (!validateField(f)) valid = false;
        });
        if (!valid) {
            e.preventDefault();
            // Focus the first error field
            const first = form.querySelector('.error');
            if (first) first.focus();
            return;
        }
        if (submitBtn) {
            submitBtn.disabled = true;
            if (submitLbl) submitLbl.textContent = 'Sending…';
            if (spinner) spinner.classList.remove('hidden');
        }
    });
}

/* ─────────────────────────────────────────────
   Bootstrap
───────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {

    /* 1. Move sections from the hidden source into the right container */
    const source = document.getElementById('sections-source');
    const desktop = document.getElementById('content-area');
    const mobile = document.getElementById('content-area-mobile');

    if (source) {
        const target = (window.innerWidth < 1024 && mobile) ? mobile : desktop;
        if (target) {
            while (source.firstChild) target.appendChild(source.firstChild);
        }
        // If sections landed in desktop but we're on mobile, move them
        if (window.innerWidth < 1024 && mobile && desktop && desktop.children.length) {
            while (desktop.firstChild) mobile.appendChild(desktop.firstChild);
        }
    }

    /* 2. Theme */
    const theme = new ThemeManager();
    document.getElementById('theme-toggle')?.addEventListener('click', () => theme.toggle());
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', () => theme.toggle());

    /* 3. Navigation */
    const nav = new NavigationManager();
    nav.bindEvents();
    nav.showSection(
        window.location.hash.slice(1) || document.body.dataset.initialSection || 'about',
        false
    );

    /* 4. Role rotator */
    const rotator = new RoleRotator(['Software Developer', 'Data Scientist']);
    window.addEventListener('beforeunload', () => rotator.destroy(), { once: true });

    /* 5. Contact form init */
    initContactForm();
});
