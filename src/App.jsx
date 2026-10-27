import { useEffect, useRef } from 'react';
import { useMediaQuery, useSection, useTheme, prefersReducedMotion } from './lib/hooks';
import { ThemeToggle } from './components/ui';
import { BottomNav, SideNav } from './components/Nav';
import { MobileHeader, ProfileCard, ProfilePanel } from './components/Profile';
import About from './sections/About';
import Resume from './sections/Resume';
import Skills from './sections/Skills';
import Contact from './sections/Contact';

const SECTIONS = [
    { id: 'about', label: 'About', icon: 'user', Component: About },
    { id: 'resume', label: 'Resume', icon: 'document', Component: Resume },
    { id: 'skills', label: 'Skills', icon: 'bulb', Component: Skills },
    { id: 'contact', label: 'Contact', icon: 'mail', Component: Contact },
];
const IDS = SECTIONS.map(s => s.id);

export default function App() {
    const isDesktop = useMediaQuery('(min-width: 1024px)');
    const [theme, toggleTheme] = useTheme();
    const [section, go] = useSection(IDS);
    const mainRef = useRef(null);
    const isFirstRender = useRef(true);

    // On section change: scroll to top and move focus to the new heading for screen readers
    useEffect(() => {
        if (isFirstRender.current) { isFirstRender.current = false; return; }
        const behavior = prefersReducedMotion() ? 'auto' : 'smooth';
        if (isDesktop) mainRef.current?.scrollTo({ top: 0, behavior });
        else window.scrollTo({ top: 0, behavior });
        document.getElementById(`${section}-heading`)?.focus({ preventScroll: true });
    }, [section]); // eslint-disable-line react-hooks/exhaustive-deps

    const { Component } = SECTIONS.find(s => s.id === section);
    // key remounts the section so its entrance animation replays
    const content = <Component key={section} onNavigate={go} />;

    return (
        <>
            <a href="#main-content" className="skip-link">Skip to main content</a>

            {isDesktop ? (
                <div className="flex h-screen overflow-hidden">
                    <SideNav items={SECTIONS} current={section} onNavigate={go}>
                        <ThemeToggle theme={theme} onToggle={toggleTheme} className="p-2.5 rounded-xl" />
                    </SideNav>
                    <ProfilePanel onNavigate={go} />
                    <main
                        id="main-content"
                        ref={mainRef}
                        tabIndex={-1}
                        className="flex-1 overflow-y-auto min-h-0"
                        style={{ background: 'var(--color-surface)' }}
                    >
                        <div className="p-8 xl:p-12">
                            <div className="max-w-3xl mx-auto">{content}</div>
                        </div>
                    </main>
                </div>
            ) : (
                <>
                    <MobileHeader>
                        <ThemeToggle theme={theme} onToggle={toggleTheme} className="p-2 rounded-lg shrink-0" />
                    </MobileHeader>
                    <div style={{ paddingTop: '3.75rem', paddingBottom: '4.5rem', minHeight: '100vh', background: 'var(--color-surface)' }}>
                        <ProfileCard />
                        <main id="main-content" tabIndex={-1} className="px-4 py-6">
                            <div className="max-w-2xl mx-auto">{content}</div>
                        </main>
                    </div>
                    <BottomNav items={SECTIONS} current={section} onNavigate={go} />
                </>
            )}
        </>
    );
}
