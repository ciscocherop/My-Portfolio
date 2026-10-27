import { coreSkills, knowledgeAreas, levelLabels, softSkills, tagGroups } from '../data/skills';
import { Dots, SectionTitle, SubHeading } from '../components/ui';

function CoreSkill({ skill }) {
    const label = levelLabels[skill.level];
    return (
        <li className="card card-hover px-4 py-3.5">
            <div className="flex items-center justify-between mb-2">
                <div className="flex items-center gap-2.5">
                    {skill.icon
                        ? <img src={skill.icon} alt="" className="w-6 h-6 rounded object-contain" aria-hidden="true" />
                        : <span className="w-6 h-6 rounded" style={{ background: 'var(--color-border)' }} aria-hidden="true" />}
                    <div>
                        <span className="text-sm font-semibold" style={{ color: 'var(--color-text-primary)' }}>{skill.name}</span>
                        <span className="ml-1.5 text-xs" style={{ color: 'var(--color-text-muted)' }}>{skill.category}</span>
                    </div>
                </div>
                <span className="badge" style={{ fontSize: '0.6rem' }}>{label}</span>
            </div>
            <div
                className="progress-track"
                role="progressbar"
                aria-label={`${skill.name} — ${label}`}
                aria-valuenow={skill.level}
                aria-valuemin={0}
                aria-valuemax={5}
            >
                <div className="progress-fill" style={{ width: `${(skill.level / 5) * 100}%` }} />
            </div>
        </li>
    );
}

export default function Skills() {
    return (
        <section className="content-section" aria-labelledby="skills-heading">
            <SectionTitle id="skills-heading">Skills</SectionTitle>

            <div className="grid grid-cols-1 min-[900px]:grid-cols-2 gap-8">
                {/* Technical */}
                <div className="space-y-7">
                    <div>
                        <SubHeading icon="/icons/software.png">Technical Proficiency</SubHeading>
                        <ul className="space-y-4" aria-label="Technical skills">
                            {coreSkills.map(s => <CoreSkill key={s.name} skill={s} />)}
                        </ul>
                    </div>

                    <div className="space-y-3">
                        {tagGroups.map(group => (
                            <div key={group.label} className="card p-4">
                                <p className="text-section-label mb-2.5">{group.label}</p>
                                <ul className="flex flex-wrap gap-1.5" aria-label={`${group.label} technologies`}>
                                    {group.tags.map(tag => <li key={tag} className="badge badge-hover">{tag}</li>)}
                                </ul>
                            </div>
                        ))}
                    </div>
                </div>

                {/* Soft skills + Knowledge */}
                <div className="space-y-7">
                    <div>
                        <SubHeading emoji="🤝">Soft Skills</SubHeading>
                        <ul className="grid grid-cols-2 gap-3" aria-label="Soft skills">
                            {softSkills.map(s => (
                                <li key={s.name} className="card card-hover p-4 flex flex-col gap-2">
                                    <p className="text-sm font-semibold" style={{ color: 'var(--color-text-primary)' }}>{s.name}</p>
                                    <Dots filled={s.fill} total={5} size="w-2.5 h-2.5" label={`${s.name}: ${s.label}, ${s.fill} of 5`} />
                                    <span className="text-xs font-medium" style={{ color: 'var(--color-accent-text)' }}>{s.label}</span>
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div>
                        <SubHeading emoji="📋">Knowledge Areas</SubHeading>
                        <ul className="space-y-2.5" aria-label="Knowledge areas">
                            {knowledgeAreas.map(item => (
                                <li key={item} className="flex items-center gap-3">
                                    <img src="/icons/tick.png" alt="" className="w-4 h-4 shrink-0 object-contain" aria-hidden="true" />
                                    <span className="text-sm" style={{ color: 'var(--color-text-body)' }}>{item}</span>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    );
}
