import { profile } from '../data/profile';
import { whatsappLink } from '../lib/format';
import { Icon, SocialLink } from './ui';

const allSocials = [
    ...profile.socials,
    { name: 'WhatsApp', icon: 'whatsapp', url: whatsappLink(profile.whatsapp) },
];

function Avatar({ size }) {
    return (
        <div className={`relative ${size} mx-auto`}>
            <img
                src={profile.photo}
                alt={`Portrait of ${profile.name}`}
                className="w-full h-full rounded-full object-cover"
                style={{ border: '3px solid var(--color-accent)', boxShadow: '0 6px 20px rgba(232,168,0,0.25)' }}
            />
            <span className="avail-dot absolute bottom-1.5 right-1.5" style={{ border: '2px solid var(--color-surface-card)' }} />
        </div>
    );
}

function Identity() {
    return (
        <div>
            {/* The page's single H1 */}
            <h1 className="text-lg font-bold leading-tight" style={{ color: 'var(--color-text-primary)' }}>{profile.name}</h1>
            <p className="text-sm font-medium mt-1" style={{ color: 'var(--color-accent-text)' }}>{profile.title}</p>
            <p className="text-xs mt-1 flex items-center justify-center gap-1" style={{ color: 'var(--color-text-muted)' }}>
                <img src="/icons/location.png" alt="" className="w-3.5 h-3.5 object-contain" aria-hidden="true" />
                {profile.location}
            </p>
        </div>
    );
}

function Badges() {
    return (
        <div className="flex flex-wrap justify-center gap-1.5">
            {profile.badges.map(b => (
                <span key={b.label} className="badge">
                    <img src={b.icon} alt="" className="w-3.5 h-3.5 object-contain inline-block rounded" aria-hidden="true" />
                    {b.label}
                </span>
            ))}
        </div>
    );
}

function Socials() {
    return (
        <div className="flex justify-center gap-2">
            {allSocials.map(s => <SocialLink key={s.name} {...s} />)}
        </div>
    );
}

function Documents({ className }) {
    return profile.documents.map((doc, i) => (
        <a
            key={doc.file}
            href={doc.file}
            {...(doc.download ? { download: true } : { target: '_blank', rel: 'noopener noreferrer' })}
            className={`btn ${i === 0 ? 'btn-primary' : 'btn-outline'} ${className}`}
        >
            <Icon name="download" className="w-3.5 h-3.5" /> {doc.label}
        </a>
    ));
}

/* Left-hand panel on desktop */
export function ProfilePanel({ onNavigate }) {
    return (
        <div
            className="shrink-0 w-72 xl:w-80 h-full overflow-y-auto flex flex-col items-center justify-center p-7"
            style={{ background: 'var(--color-surface-card)', borderRight: '1px solid var(--color-border)' }}
        >
            <div className="w-full text-center space-y-4">
                <Avatar size="w-32 h-32" />
                <Identity />
                <div className="panel-divider" />
                <Badges />
                <Socials />
                <div className="space-y-2 w-full">
                    <Documents className="w-full text-xs" />
                    <button
                        type="button"
                        onClick={() => onNavigate('contact')}
                        className="btn btn-ghost w-full text-sm border-2"
                        style={{ borderColor: 'var(--color-accent)', color: 'var(--color-accent-text)' }}
                    >
                        <Icon name="mail" className="w-4 h-4" /> Contact Me
                    </button>
                </div>
            </div>
        </div>
    );
}

/* Card at the top of the page on mobile */
export function ProfileCard() {
    return (
        <div className="px-4 pt-5 pb-6 text-center space-y-4" style={{ background: 'var(--color-surface-card)', borderBottom: '1px solid var(--color-border)' }}>
            <Avatar size="w-24 h-24" />
            <Identity />
            <div className="panel-divider" />
            <Badges />
            <Socials />
            <div className="grid grid-cols-1 min-[400px]:grid-cols-2 gap-2">
                <Documents className="text-xs py-2 whitespace-normal" />
            </div>
        </div>
    );
}

/* Small header bar on mobile */
export function MobileHeader({ children }) {
    return (
        <header
            className="fixed inset-x-0 top-0 z-50 flex items-center justify-between px-4 py-3"
            style={{ background: 'var(--color-surface-card)', borderBottom: '1px solid var(--color-border)' }}
        >
            <div className="flex items-center gap-3 min-w-0">
                <img
                    src={profile.photo}
                    alt=""
                    className="w-9 h-9 rounded-full object-cover shrink-0"
                    style={{ border: '2px solid var(--color-accent)' }}
                />
                <div className="min-w-0">
                    <p className="text-sm font-semibold truncate" style={{ color: 'var(--color-text-primary)' }}>{profile.name}</p>
                    <p className="text-[10px] font-medium truncate" style={{ color: 'var(--color-accent-text)' }}>{profile.title}</p>
                </div>
            </div>
            {children}
        </header>
    );
}
