import { about, profile } from '../data/profile';
import { projects } from '../data/projects';
import { coreSkills } from '../data/skills';
import { RichText } from '../lib/format';
import { useRotatingText } from '../lib/hooks';

const stats = [
    [`${projects.length}+`, 'Projects'],
    [`${coreSkills.length}+`, 'Skills'],
    ['∞', 'Curiosity'],
];

export default function About({ onNavigate }) {
    const [role, roleVisible] = useRotatingText(profile.roles);

    return (
        <section className="content-section" aria-labelledby="about-heading">
            {/* Greeting */}
            <div className="mb-10">
                <p className="text-section-label mb-3" style={{ color: 'var(--color-accent-text)' }}>👋 Hello, I'm</p>
                <h2 id="about-heading" tabIndex={-1} className="text-display mb-3">{profile.name}</h2>
                <div className="flex items-baseline gap-2 flex-wrap mb-2">
                    <span className="text-xl font-semibold" style={{ color: 'var(--color-text-body)' }}>Junior</span>
                    <span
                        className="text-xl font-bold"
                        style={{ color: 'var(--color-accent-text)', opacity: roleVisible ? 1 : 0, transition: 'opacity 0.8s ease' }}
                        aria-live="polite"
                        aria-atomic="true"
                    >
                        {role}
                    </span>
                </div>
                <p className="text-sm font-medium" style={{ color: 'var(--color-text-muted)' }}>{profile.subtitle}</p>
            </div>

            {/* Tagline */}
            <p className="text-title mb-8" style={{ color: 'var(--color-text-body)' }}>
                {about.tagline[0]}<br />
                <span style={{ color: 'var(--color-accent-text)' }}>{about.tagline[1]}</span>
            </p>

            {/* Stats */}
            <div className="grid grid-cols-3 gap-3 mb-10 max-w-xs">
                {stats.map(([value, label]) => (
                    <div key={label} className="card text-center py-4 px-2">
                        <p className="text-2xl font-bold" style={{ color: 'var(--color-accent-text)' }}>{value}</p>
                        <p className="text-xs mt-1" style={{ color: 'var(--color-text-muted)' }}>{label}</p>
                    </div>
                ))}
            </div>

            {/* Bio */}
            <div className="space-y-3 mb-8">
                {about.bio.map((paragraph, i) => (
                    <div key={i} className="card card-hover p-5">
                        <p className="text-body"><RichText text={paragraph} /></p>
                    </div>
                ))}
            </div>

            {/* What I Do */}
            <h3 className="text-title mb-4">What I Do</h3>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-3 mb-8">
                {about.services.map(s => (
                    <div key={s.title} className="card card-hover p-5 flex flex-col gap-2">
                        {s.icon
                            ? <img src={s.icon} alt="" className="w-8 h-8 object-contain" aria-hidden="true" />
                            : <span className="text-2xl" aria-hidden="true">{s.emoji}</span>}
                        <h4 className="font-semibold text-sm" style={{ color: 'var(--color-text-primary)' }}>{s.title}</h4>
                        <p className="text-xs leading-relaxed" style={{ color: 'var(--color-text-muted)' }}>{s.description}</p>
                    </div>
                ))}
            </div>

            {/* Quote */}
            <blockquote className="mb-8 pl-4 py-1" style={{ borderLeft: '3px solid var(--color-accent)' }}>
                <p className="text-body italic">"{about.quote}"</p>
            </blockquote>

            {/* CTAs */}
            <div className="flex flex-wrap gap-3">
                <button type="button" onClick={() => onNavigate('skills')} className="btn btn-primary">View My Skills →</button>
                <button type="button" onClick={() => onNavigate('contact')} className="btn btn-outline">Let's Talk →</button>
            </div>
        </section>
    );
}
