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

        document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));
        document.getElementById(`${sectionId}-section`).classList.remove('hidden');
        document.querySelector('main')?.scrollTo({ top: 0 });

        this.updateNav(sectionId);

        if (pushState) {
            const url = new URL(window.location.href);
            url.hash = sectionId === 'home' ? '' : sectionId;
            history.pushState({ section: sectionId }, '', url);
        }
    }

    updateNav(sectionId) {
        document.querySelectorAll('[data-nav-link]').forEach(btn => {
            const active = btn.getAttribute('data-section') === sectionId;
            btn.setAttribute('aria-current', active ? 'page' : 'false');

            const icon = btn.querySelector('.nav-icon');
            const label = btn.querySelector('.nav-label');
            const bar = btn.querySelector('.nav-indicator');

            icon?.classList.toggle('text-[#f4c430]', active);
            icon?.classList.toggle('dark:text-[#f4c430]', active);
            icon?.classList.toggle('text-gray-400', !active);
            icon?.classList.toggle('dark:text-gray-500', !active);

            label?.classList.toggle('text-[#f4c430]', active);
            label?.classList.toggle('font-semibold', active);
            label?.classList.toggle('text-gray-400', !active);
            label?.classList.toggle('dark:text-gray-500', !active);

            bar?.classList.toggle('opacity-100', active);
            bar?.classList.toggle('opacity-0', !active);
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
            this.showSection(window.location.hash.slice(1) || 'home', false);
        });
    }
}

// ── Role Rotator ───────────────────────────────
class RoleRotator {
    constructor(el, roles) {
        this.el = el; this.roles = roles; this.idx = 0;
        this._i = null; this._t = null;
        if (el) this.start();
    }
    start() {
        this._i = setInterval(() => {
            this.el.style.opacity = '0';
            this._t = setTimeout(() => {
                this.idx = (this.idx + 1) % this.roles.length;
                this.el.textContent = this.roles[this.idx];
                this.el.style.opacity = '1';
            }, 800);  // wait for fade-out to finish before swapping text
        }, 4000);     // swap every 4 seconds
    }
    destroy() { clearInterval(this._i); clearTimeout(this._t); }
}

// ── Bootstrap ─────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const theme = new ThemeManager();
    document.getElementById('theme-toggle')?.addEventListener('click', () => theme.toggle());

    const nav = new NavigationManager();
    nav.bindEvents();
    nav.showSection(
        window.location.hash.slice(1) || document.body.dataset.initialSection || 'about',
        false
    );

    const rotator = new RoleRotator(
        document.getElementById('rotating-role'),
        ['Software Developer', 'Data Scientist']
    );
    window.addEventListener('beforeunload', () => rotator.destroy(), { once: true });
});
