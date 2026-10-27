/* Small building blocks shared across sections */

export function Icon({ name, filled = false, className = 'w-5 h-5', style }) {
    return (
        <svg
            className={className}
            style={style}
            fill={filled ? 'currentColor' : 'none'}
            stroke={filled ? undefined : 'currentColor'}
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <use href={`/icons/sprite.svg#${name}`} />
        </svg>
    );
}

export function SocialLink({ name, icon, url }) {
    return (
        <a
            href={url}
            title={name}
            aria-label={`Cherop Sisco on ${name}`}
            target="_blank"
            rel="noopener noreferrer"
            className="social-link"
        >
            <Icon name={icon} filled className="w-3.5 h-3.5" />
        </a>
    );
}

export function SectionTitle({ id, children, subtitle }) {
    return (
        <>
            <h2 id={id} tabIndex={-1} className="text-title mb-1">
                {children}
                {subtitle && <span style={{ color: 'var(--color-text-muted)', fontWeight: 400 }}> {subtitle}</span>}
            </h2>
            <div className="mb-8" style={{ width: '2.5rem', height: 2, background: 'var(--color-accent)', borderRadius: 999 }} />
        </>
    );
}

/* Round icon + uppercase label + divider line */
export function SubHeading({ icon, emoji, children }) {
    return (
        <>
            <div className="section-head">
                <div className="section-head-icon" aria-hidden="true">
                    {icon ? <img src={icon} alt="" className="w-5 h-5 object-contain rounded" /> : emoji}
                </div>
                <h3 className="text-section-label">{children}</h3>
            </div>
            <div className="section-rule" />
        </>
    );
}

/* A row of dots, e.g. ●●●●○ */
export function Dots({ filled, total, size = 'w-3 h-3', label }) {
    return (
        <div className="flex items-center gap-1" role="img" aria-label={label}>
            {Array.from({ length: total }, (_, i) => (
                <span
                    key={i}
                    className={`${size} rounded-full`}
                    style={{ background: i < filled ? 'var(--color-accent)' : 'var(--color-border)' }}
                />
            ))}
        </div>
    );
}

export function ThemeToggle({ theme, onToggle, className = '' }) {
    return (
        <button
            type="button"
            onClick={onToggle}
            aria-label={theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'}
            className={`btn btn-ghost ${className}`}
        >
            {/* Sun: shown in dark mode */}
            <svg className="w-5 h-5 hidden dark:block" style={{ color: 'var(--color-accent)' }} fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            {/* Moon: shown in light mode */}
            <svg className="w-5 h-5 block dark:hidden" style={{ color: 'var(--color-text-muted)' }} fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    );
}
