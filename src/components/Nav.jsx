import { Icon } from './ui';

/* Arrow keys move focus between nav buttons */
function onArrowKeys(e) {
    const keys = { ArrowDown: 1, ArrowRight: 1, ArrowUp: -1, ArrowLeft: -1 };
    if (!(e.key in keys)) return;
    e.preventDefault();
    const all = [...e.currentTarget.parentElement.querySelectorAll('[data-nav-link]')];
    const next = (all.indexOf(e.currentTarget) + keys[e.key] + all.length) % all.length;
    all[next].focus();
}

function NavButton({ item, active, onNavigate, desktop }) {
    return (
        <button
            type="button"
            data-nav-link
            onClick={() => onNavigate(item.id)}
            onKeyDown={onArrowKeys}
            aria-current={active ? 'page' : undefined}
            title={item.label}
            className={desktop
                ? 'relative flex flex-col items-center gap-1 px-3 py-3 rounded-xl'
                : 'flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg'}
        >
            {desktop && (
                <span className="nav-indicator absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 rounded-r opacity-0" style={{ background: 'var(--color-accent)' }} />
            )}
            <Icon name={item.icon} className="w-5 h-5 nav-icon" />
            <span className={`nav-label font-semibold ${desktop ? 'text-[9px] uppercase tracking-wide' : 'text-[10px]'}`}>
                {item.label}
            </span>
        </button>
    );
}

export function SideNav({ items, current, onNavigate, children }) {
    return (
        <aside
            className="shrink-0 w-[4.5rem] flex flex-col items-center py-8 gap-8 h-full"
            style={{ background: 'var(--color-surface-card)', borderRight: '1px solid var(--color-border)' }}
        >
            {children}
            <nav className="flex flex-col gap-2 flex-1" aria-label="Main navigation">
                {items.map(item => (
                    <NavButton key={item.id} item={item} active={item.id === current} onNavigate={onNavigate} desktop />
                ))}
            </nav>
        </aside>
    );
}

export function BottomNav({ items, current, onNavigate }) {
    return (
        <nav
            className="fixed inset-x-0 bottom-0 z-50 flex items-center justify-around px-2 py-1"
            style={{ background: 'var(--color-surface-card)', borderTop: '1px solid var(--color-border)' }}
            aria-label="Main navigation"
        >
            {items.map(item => (
                <NavButton key={item.id} item={item} active={item.id === current} onNavigate={onNavigate} />
            ))}
        </nav>
    );
}
