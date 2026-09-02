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
    isMobile() { return window.innerWidth < 1024; }

    showSection(sectionId, pushState = true) {
        if (!document.getElementById(`${sectionId}-section`)) sectionId = 'about';

        // Hide all, show target
        document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));
        document.getElementById(`${sectionId}-section`).classList.remove('hidden');

        // Scroll the right container to top
        if (this.isMobile()) {
            document.querySelector('.mobile-scroll')?.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            document.querySelector('main')?.scrollTo({ top: 0 });
        }

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

            btn.querySelector('.nav-icon')?.classList.toggle('text-[#f4c430]', active);
            btn.querySelector('.nav-icon')?.classList.toggle('text-gray-400', !active);
            btn.querySelector('.nav-label')?.classList.toggle('text-[#f4c430]', active);
            btn.querySelector('.nav-label')?.classList.toggle('font-semibold', active);
            btn.querySelector('.nav-label')?.classList.toggle('text-gray-400', !active);
            btn.querySelector('.nav-indicator')?.classList.toggle('opacity-100', active);
            btn.querySelector('.nav-indicator')?.classList.toggle('opacity-0', !active);
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
    constructor(roles) {
        this.roles = roles;
        this.idx = 0;
        this._i = null; this._t = null;
        this.start();
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

// ── Bootstrap ─────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {

    // Move sections from hidden source into the correct content area
    const source = document.getElementById('sections-source');
    const desktop = document.getElementById('content-area');
    const mobile = document.getElementById('content-area-mobile');

    if (source) {
        // Move all children into desktop content area
        if (desktop) {
            while (source.firstChild) {
                desktop.appendChild(source.firstChild);
            }
        }
        // For mobile, point to the same desktop content area
        // (mobile-scroll div wraps it — sections stay in DOM, just scroll context differs)
        if (mobile && desktop) {
            // On mobile, move content into mobile area instead
            if (window.innerWidth < 1024) {
                while (desktop.firstChild) {
                    mobile.appendChild(desktop.firstChild);
                }
            }
        }
    }

    // Theme
    const theme = new ThemeManager();
    document.getElementById('theme-toggle')?.addEventListener('click', () => theme.toggle());
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', () => theme.toggle());

    // Nav
    const nav = new NavigationManager();
    nav.bindEvents();
    nav.showSection(
        window.location.hash.slice(1) || document.body.dataset.initialSection || 'about',
        false
    );

    // Rotator
    const rotator = new RoleRotator(['Software Developer', 'Data Scientist']);
    window.addEventListener('beforeunload', () => rotator.destroy(), { once: true });
});
