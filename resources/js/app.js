// Theme Management
class ThemeManager {
    constructor() {
        this.theme = this.getStoredTheme() || this.getSystemTheme();
        this.init();
    }

    getStoredTheme() {
        return localStorage.getItem('theme');
    }

    getSystemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    setTheme(theme) {
        this.theme = theme;
        localStorage.setItem('theme', theme);
        this.applyTheme(theme);
    }

    applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    toggleTheme() {
        const newTheme = this.theme === 'dark' ? 'light' : 'dark';
        this.setTheme(newTheme);
    }

    init() {
        this.applyTheme(this.theme);
    }
}

// Navigation Management
class NavigationManager {
    constructor() {
        this.currentSection = 'home';
        this.init();
    }

    showSection(sectionId, updateUrl = true) {
        const targetSection = document.getElementById(`${sectionId}-section`);
        if (!targetSection) {
            sectionId = 'home';
        }

        // Hide all sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('hidden');
        });

        // Show selected section
        document.getElementById(`${sectionId}-section`).classList.remove('hidden');
        this.currentSection = sectionId;
        this.updateActiveLink(sectionId);

        if (updateUrl) {
            const url = new URL(window.location.href);
            url.hash = sectionId === 'home' ? '' : sectionId;
            history.pushState({ section: sectionId }, '', url);
        }

        // Close mobile menu if open
        if (window.innerWidth < 1024) {
            this.closeMobileMenu();
        }
    }

    toggleMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    closeMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            sidebar.classList.add('-translate-x-full');
        }
    }

    updateActiveLink(sectionId) {
        document.querySelectorAll('[data-nav-link]').forEach(link => {
            if (link.getAttribute('data-section') === sectionId) {
                link.setAttribute('aria-current', 'page');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    }

    init() {
        // Navigation link clicks
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                const section = e.currentTarget.getAttribute('data-section');
                if (section) {
                    this.showSection(section);
                }
            });
        });

        window.addEventListener('popstate', () => {
            this.showSection(window.location.hash.slice(1) || 'home', false);
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                this.toggleMobileMenu();
            });
        }

    }
}

class RoleRotator {
    constructor(element, roles) {
        this.element = element;
        this.roles = roles;
        this.roleIndex = 0;
        this.intervalId = null;
        this.timeoutId = null;
        this.start();
    }

    start() {
        if (!this.element) {
            return;
        }

        this.intervalId = window.setInterval(() => {
            this.element.style.opacity = '0';
            this.timeoutId = window.setTimeout(() => {
                this.roleIndex = (this.roleIndex + 1) % this.roles.length;
                this.element.textContent = this.roles[this.roleIndex];
                this.element.style.opacity = '1';
            }, 500);
        }, 2500);
    }

    destroy() {
        if (this.intervalId) {
            window.clearInterval(this.intervalId);
        }
        if (this.timeoutId) {
            window.clearTimeout(this.timeoutId);
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize theme manager
    const themeManager = new ThemeManager();
    
    // Theme toggle button
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            themeManager.toggleTheme();
        });
    }


    // Initialize navigation
    const navigationManager = new NavigationManager();
    navigationManager.showSection(window.location.hash.slice(1) || document.body.dataset.initialSection || 'home', false);

    // Rotating role titles
    const roleRotator = new RoleRotator(
        document.getElementById('rotating-role'),
        ['Software Engineer', 'Web Developer', 'Backend Developer', 'AI Enthusiast']
    );

    window.addEventListener('beforeunload', () => roleRotator.destroy(), { once: true });
});
