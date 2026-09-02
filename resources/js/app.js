// ── Theme Manager ──────────────────────────────
class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || this.systemTheme();
        this.apply(this.theme);
    }
    systemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    apply(theme) {
        this.theme = theme;
        document.documentElement.classList.toggle('dark', theme === 'dark');
        localStorage.setItem('theme', theme);
    }
    toggle() { this.apply(this.theme === 'dark' ? 'light' : 'dark'); }
}

// ── Navigation Manager ─────────────────────────
class NavigationManager {
    showSection(sectionId, pushState = true) {
        if (!document.getElementById(`${sectionId}-section`)) sectionId = 'about';

        // Hide all sections
        document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));

        // Show the target section
        const section = document.getElementById(`${sectionId}-section`);
        section.classList.remove('hidden');

        // On mobile — clone section content into mobile content area
        const mobileArea = document.getElementById('content-area-mobile');
        if (mobileArea && window.innerWidth < 1024) {
            mobileArea.innerHTML = section.innerHTML;
            // Re-bind nav buttons inside cloned content
            mobileArea.querySelectorAll('[data-section]').forEach(el => {
                el.addEventListener('click', e => {
                    const s = e.currentTarget.getAttribute('data-section');
                    if (s) this.showSection(s);
                });
            });
            // Scroll mobile body to top of content
            const mobileBody = document.querySelector('.lg\\:hidden.pt-16');
            if (mobileBody) mobileBody.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // On desktop — scroll content area to top
        document.querySelector('main')?.scrollTo({ top: 0 });

        this.updateNav(sectionId);

        if (pushState) {
            const url = new URL(window.location.href);
            url.hash = sectionId === 'about' ? '' : sectionId;
            history.pushState({ section: sectionId }, '', url);
        }
    }

    updateNav(sectionId) {
        document.querySelectorAll('[data-nav-link]').forEach(btn => {
            const active = btn.getAttribute('data-section') === sectionId;
            btn.setAttribute('aria-current', active ? 'page' : 'false');

            const icon  = btn.querySelector('.nav-icon');
            const label = btn.querySelector('.nav-label');
            const bar   = btn.querySelector('.nav-indicator');

            if (icon) {
                icon.classList.toggle('text-[#f4c430]', active);
                icon.classList.toggle('text-gray-400',  !active);
                icon.classList.toggle('dark:text-gray-500', !active);
            }
            if (label) {
                label.classList.toggle('text-[#f4c430]', active);
                label.classList.toggle('font-semibold',  active);
                label.classList.toggle('text-gray-400',  !active);
                label.classList.toggle('dark:text-gray-500', !active);
            }
            if (bar) {
                bar.classList.toggle('opacity-100', active);
                bar.classList.toggle('opacity-0',   !active);
            }
            btn.classList.toggle('bg-[#f4c430]/10', active);
        });
    }

    bindEvents() {
        document.querySelectorAll('[data-section]').forEach(el => {
            el.addEventListener('click', e => {
                const s = e.currentTarget.getAttribute('data-section');
                if (s) this.showSection(s);
            });
        });
        window.addEventListener('popstate', () => {
            this.showSection(window.location.hash.slice(1) || 'about', false);
        });
    }
}

// ── Role Rotator ───────────────────────────────
class RoleRotator {
    constructor(selector, roles) {
        this.selector = selector;
        this.roles    = roles;
        this.idx      = 0;
        this._i = null;
        this._t = null;
        this.start();
    }

    getEl() { return document.getElementById(this.selector); }

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

// ── Bootstrap ─────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {

    // Theme — bind both desktop and mobile toggles
    const theme = new ThemeManager();
    document.getElementById('theme-toggle')?.addEventListener('click',        () => theme.toggle());
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', () => theme.toggle());

    // Navigation
    const nav = new NavigationManager();
    nav.bindEvents();
    nav.showSection(
        window.location.hash.slice(1) || document.body.dataset.initialSection || 'about',
        false
    );

    // Role rotator — works on both desktop and mobile
    const rotator = new RoleRotator('rotating-role', ['Software Developer', 'Data Scientist']);
    window.addEventListener('beforeunload', () => rotator.destroy(), { once: true });
});
