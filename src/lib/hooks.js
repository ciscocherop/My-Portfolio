import { useCallback, useEffect, useState } from 'react';

export const prefersReducedMotion = () =>
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* Light/dark theme — index.html sets the initial class before paint */
export function useTheme() {
    const [theme, setTheme] = useState(() =>
        document.documentElement.classList.contains('dark') ? 'dark' : 'light'
    );

    useEffect(() => {
        document.documentElement.classList.toggle('dark', theme === 'dark');
        try { localStorage.setItem('theme', theme); } catch { /* storage blocked */ }
    }, [theme]);

    const toggle = useCallback(() => setTheme(t => (t === 'dark' ? 'light' : 'dark')), []);
    return [theme, toggle];
}

export function useMediaQuery(query) {
    const [matches, setMatches] = useState(() => window.matchMedia(query).matches);

    useEffect(() => {
        const mql = window.matchMedia(query);
        const onChange = () => setMatches(mql.matches);
        mql.addEventListener('change', onChange);
        return () => mql.removeEventListener('change', onChange);
    }, [query]);

    return matches;
}

/* Current section, kept in the URL hash so back/forward and shared links work */
export function useSection(ids) {
    const fromHash = useCallback(() => {
        const id = window.location.hash.slice(1);
        return ids.includes(id) ? id : ids[0];
    }, [ids]);

    const [section, setSection] = useState(fromHash);

    useEffect(() => {
        const onPop = () => setSection(fromHash());
        window.addEventListener('popstate', onPop);
        return () => window.removeEventListener('popstate', onPop);
    }, [fromHash]);

    const go = useCallback(id => {
        if (id === section) return;
        const url = new URL(window.location.href);
        url.hash = id === ids[0] ? '' : id;
        history.pushState(null, '', url);
        setSection(id);
    }, [ids, section]);

    return [section, go];
}

/* Cycles through words with a fade; stays on the first word for reduced-motion users */
export function useRotatingText(words, interval = 4000, fade = 800) {
    const [index, setIndex] = useState(0);
    const [visible, setVisible] = useState(true);

    useEffect(() => {
        if (words.length < 2 || prefersReducedMotion()) return;
        let timeout;
        const timer = setInterval(() => {
            setVisible(false);
            timeout = setTimeout(() => {
                setIndex(i => (i + 1) % words.length);
                setVisible(true);
            }, fade);
        }, interval);
        return () => { clearInterval(timer); clearTimeout(timeout); };
    }, [words, interval, fade]);

    return [words[index], visible];
}
