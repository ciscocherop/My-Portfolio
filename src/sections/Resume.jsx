import { profile } from '../data/profile';
import { projects } from '../data/projects';
import { education, languages } from '../data/resume';
import { Dots, Icon, SectionTitle, SubHeading } from '../components/ui';

const github = profile.socials.find(s => s.icon === 'github');

function EducationItem({ item }) {
    const color = item.active ? 'var(--color-accent)' : 'var(--color-border)';
    return (
        <li className="pl-6 relative">
            <span
                className="absolute left-0 top-1.5 w-2.5 h-2.5 rounded-full"
                style={{ border: '2px solid var(--color-surface-card)', background: color }}
                aria-hidden="true"
            />
            <span
                className="inline-block px-2 py-0.5 rounded text-[10px] font-semibold mb-1.5"
                style={{ border: `1px solid ${color}`, color: item.active ? 'var(--color-accent-text)' : 'var(--color-text-muted)' }}
            >
                {item.date}
            </span>
            <p className="font-semibold text-sm" style={{ color: 'var(--color-text-primary)' }}>{item.degree}</p>
            <p className="text-xs font-medium mt-0.5" style={{ color: 'var(--color-accent-text)' }}>{item.school}</p>
            {item.note && <p className="text-xs mt-1 leading-relaxed" style={{ color: 'var(--color-text-muted)' }}>{item.note}</p>}
        </li>
    );
}

function ProjectCard({ project }) {
    return (
        <li className="card card-hover p-5">
            <h4 className="font-semibold text-sm mb-1.5" style={{ color: 'var(--color-text-primary)' }}>{project.title}</h4>
            <p className="text-xs leading-relaxed mb-3" style={{ color: 'var(--color-text-muted)' }}>{project.description}</p>
            {project.tags?.length > 0 && (
                <div className="flex flex-wrap gap-1.5 mb-3">
                    {project.tags.map(tag => <span key={tag} className="badge">{tag}</span>)}
                </div>
            )}
            <div className="flex items-center gap-4">
                {project.github && (
                    <a
                        href={project.github}
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label={`${project.title} source code on GitHub`}
                        className="link-muted inline-flex items-center gap-1.5 text-xs font-semibold"
                    >
                        <Icon name="github" filled className="w-3.5 h-3.5" /> GitHub
                    </a>
                )}
                {project.live && (
                    <a
                        href={project.live}
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label={`${project.title} live site`}
                        className="link-accent inline-flex items-center gap-1.5 text-xs font-semibold"
                    >
                        <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Live Site
                    </a>
                )}
            </div>
        </li>
    );
}

export default function Resume() {
    const featured = projects.filter(p => p.featured);

    return (
        <section className="content-section" aria-labelledby="resume-heading">
            <SectionTitle id="resume-heading" subtitle="/ CV">Resume</SectionTitle>

            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {/* Education + Languages */}
                <div className="space-y-10">
                    <div>
                        <SubHeading icon="/icons/graduate.jpg">Education</SubHeading>
                        <div className="relative">
                            <div className="timeline-line" aria-hidden="true" />
                            <ol className="space-y-6" aria-label="Education history">
                                {education.map(item => <EducationItem key={item.degree} item={item} />)}
                            </ol>
                        </div>
                    </div>

                    <div>
                        <SubHeading icon="/icons/world.jpg">Languages</SubHeading>
                        <ul className="space-y-4" aria-label="Language proficiencies">
                            {languages.map(lang => (
                                <li key={lang.name}>
                                    <div className="flex items-center justify-between mb-1.5">
                                        <span className="text-sm font-medium" style={{ color: 'var(--color-text-primary)' }}>{lang.name}</span>
                                        <span className="text-section-label">{lang.label}</span>
                                    </div>
                                    <Dots filled={lang.dots} total={9} label={`${lang.name}: ${lang.label}, ${lang.dots} of 9`} />
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>

                {/* Projects */}
                <div>
                    <SubHeading icon="/icons/github.png">Featured Projects</SubHeading>
                    <ul className="space-y-4" aria-label="Featured projects">
                        {featured.map(p => <ProjectCard key={p.title} project={p} />)}
                    </ul>
                    {github && (
                        <div className="mt-5 text-center">
                            <a href={github.url} target="_blank" rel="noopener noreferrer" className="btn btn-outline text-sm">
                                <Icon name="github" filled className="w-4 h-4" /> More on GitHub
                            </a>
                        </div>
                    )}
                </div>
            </div>
        </section>
    );
}
