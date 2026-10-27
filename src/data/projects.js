// ─────────────────────────────────────────────
// Your projects. To add one, copy a { ... } block,
// paste it at the top of the list and change the text.
//
//   featured: true  → shown on the Resume page
//   github / live   → links (use null if there isn't one)
// ─────────────────────────────────────────────

export const projects = [
    {
        title: 'Autism Prediction System',
        description: 'ML application predicting autism spectrum disorder traits from behavioural and demographic data. Full pipeline — preprocessing, EDA, model training, evaluation, and a Streamlit deployment.',
        tags: ['Python', 'Streamlit', 'Scikit-learn'],
        github: 'https://github.com/ciscocherop/Austim-Spectrum-Disorder-Prediction',
        live: null,
        featured: true,
    },
    {
        title: 'Sipi Falls Tourism Website',
        description: 'Responsive full-stack tourism platform showcasing Sipi Falls, its attractions, activities, and coffee experiences. Laravel backend with database-driven content.',
        tags: ['Laravel', 'PHP', 'SQL'],
        github: null,
        live: 'https://sipifalls.resnetsystems.site/',
        featured: true,
    },
    {
        title: 'Learning Management System',
        description: 'Collaborative LMS centralising educational content and user management. Contributed across frontend, backend, and database integration using React, Node.js, and PostgreSQL.',
        tags: ['React', 'Node.js', 'PostgreSQL'],
        github: 'https://github.com/CeaserTA/resnet_academy',
        live: null,
        featured: true,
    },
    {
        title: 'USSD Self-Medication System',
        description: 'A USSD system allowing users to connect with doctors and access health-related services. Implemented APIs, Python scripts, mobile system architecture, and database logic.',
        tags: ['Python', 'APIs', 'Database'],
        github: null,
        live: null,
        featured: false,
    },
    {
        title: 'Mental Health Awareness Website — "Your Mind Matters"',
        description: 'A multi-page educational website promoting mental health awareness with a clean, responsive design. Led the full development process independently.',
        tags: ['HTML', 'CSS', 'Bootstrap'],
        github: null,
        live: null,
        featured: false,
    },
    {
        title: "St. John's Church Management System",
        description: 'A web-based system to register and manage church members. Designed the dashboard, managed user registration flows, and implemented authentication features.',
        tags: ['Laravel', 'Tailwind CSS', 'PHP', 'SQL'],
        github: null,
        live: null,
        featured: false,
    },
];
