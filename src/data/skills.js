// ─────────────────────────────────────────────
// Your skills. Add, remove or reorder lines freely.
// ─────────────────────────────────────────────

// level: 1 Familiar · 2 Learning · 3 Comfortable · 4 Proficient · 5 Expert
// icon: an image in public/icons/ (or null for none)
export const coreSkills = [
    { name: 'Python', level: 4, icon: '/icons/python.jpg', category: 'Data & Automation' },
    { name: 'PHP / Laravel', level: 4, icon: '/icons/php-laravel.png', category: 'Backend' },
    { name: 'JavaScript', level: 3, icon: '/icons/js.png', category: 'Frontend' },
    { name: 'SQL / MySQL', level: 4, icon: '/icons/sql.jpg', category: 'Database' },
    { name: 'React', level: 3, icon: '/icons/react.png', category: 'Frontend' },
    { name: 'Tailwind CSS', level: 4, icon: '/icons/tailwind.png', category: 'Styling' },
    { name: 'Scikit-learn', level: 3, icon: '/icons/scikit.png', category: 'Machine Learning' },
    { name: 'Git / GitHub', level: 4, icon: '/icons/github.png', category: 'DevOps' },
];

export const levelLabels = { 1: 'Familiar', 2: 'Learning', 3: 'Comfortable', 4: 'Proficient', 5: 'Expert' };

export const tagGroups = [
    { label: 'Languages', tags: ['Python', 'PHP', 'JavaScript', 'Java', 'SQL', 'HTML5', 'CSS3'] },
    { label: 'Frameworks & Libs', tags: ['Laravel', 'React', 'Bootstrap', 'Tailwind CSS'] },
    { label: 'Data Science', tags: ['Pandas', 'NumPy', 'Matplotlib', 'Scikit-learn', 'Streamlit', 'Neural Networks', 'Data Visualisation'] },
    { label: 'Tools & DevOps', tags: ['Git', 'GitHub', 'GitLab', 'GitHub Actions', 'Vite', 'VS Code', 'Google Colab'] },
];

// fill: how many of the 5 dots are filled in
export const softSkills = [
    { name: 'Communication', label: 'Excellent', fill: 5 },
    { name: 'Teamwork', label: 'Excellent', fill: 5 },
    { name: 'Problem Solving', label: 'Strong', fill: 4 },
    { name: 'Adaptability', label: 'Strong', fill: 4 },
    { name: 'Time Management', label: 'Good', fill: 3 },
    { name: 'Fast Learner', label: 'Excellent', fill: 5 },
];

export const knowledgeAreas = [
    'Software Development',
    'Data Science & ML',
    'REST API Development',
    'Database Design',
    'Responsive Web Design',
    'Software Testing',
    'Systems Analysis',
    'IT Project Management',
    'Business Intelligence',
    'Version Control',
];
