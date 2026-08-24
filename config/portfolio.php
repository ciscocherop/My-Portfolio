<?php

return [
    'name' => 'Cherop Sisco',
    'job_title' => 'Software Engineer',
    'description' => 'Cherop Sisco is a software engineer in Kampala, Uganda building structured, scalable applications across backend systems, APIs, modern frontend technologies, and AI data systems.',
    'url' => env('APP_URL', 'http://localhost'),
    'image' => '/image/profile.jpeg',
    'social_links' => [
        'https://github.com/ciscocherop',
        'https://www.linkedin.com/in/sisco-cherop-193477294/',
        'https://x.com/CiscoCherop',
        'https://wa.me/256703558174',
    ],
    'projects' => [
        [
            'title' => 'USSD Self-Medication System',
            'description' => 'A USSD system allowing users to connect with doctors and access health-related services. Implemented APIs, Python scripts, mobile system architecture, and database logic.',
            'url' => null,
            'tags' => ['Python', 'APIs', 'Database'],
            'type' => 'Group · Hackathon',
        ],
        [
            'title' => 'Mental Health Awareness Website — "Your Mind Matters"',
            'description' => 'A multi-page educational website promoting mental health awareness with a clean, responsive design. Led the full development process independently.',
            'url' => null,
            'tags' => ['HTML', 'CSS', 'Bootstrap'],
            'type' => 'Personal',
        ],
        [
            'title' => 'Sipi Falls Tourism Website',
            'description' => 'A dynamic tourism website promoting local tourism inspired by waterfalls from home. Full-stack development with both front-end and back-end features.',
            'url' => null,
            'tags' => ['HTML/CSS', 'JavaScript', 'PHP', 'SQL'],
            'type' => 'Personal',
        ],
        [
            'title' => "St. John's Church Management System",
            'description' => 'A web-based system to register and manage church members. Designed the dashboard, managed user registration flows, and implemented authentication features.',
            'url' => null,
            'tags' => ['Laravel', 'Tailwind CSS', 'PHP', 'SQL'],
            'type' => 'Group',
        ],
        [
            'title' => 'Autism Spectrum Disorder Prediction System',
            'description' => 'A machine learning model to predict ASD in young children using structured tabular data. Handled model deployment and participated in model training and testing.',
            'url' => null,
            'tags' => ['Python', 'Streamlit', 'Google Colab', 'ML'],
            'type' => 'Group · ML',
        ],
    ],
    'skills' => [
        [
            'heading' => 'Programming Languages',
            'items' => [
                ['emoji' => '🐍', 'name' => 'Python', 'description' => 'ML & Scripting'],
                ['emoji' => '☕', 'name' => 'Java', 'description' => 'OOP & Logic'],
                ['emoji' => '🌐', 'name' => 'JavaScript', 'description' => 'Web Interactivity'],
                ['emoji' => '🐘', 'name' => 'PHP', 'description' => 'Backend'],
                ['emoji' => '🗄️', 'name' => 'SQL', 'description' => 'Databases'],
            ],
        ],
        [
            'heading' => 'Web Development',
            'items' => [
                ['emoji' => '🏗️', 'name' => 'HTML & CSS', 'description' => 'Structure & Style'],
                ['emoji' => '🎨', 'name' => 'Tailwind CSS', 'description' => 'Utility-first UI'],
                ['emoji' => '🅱️', 'name' => 'Bootstrap', 'description' => 'Responsive Design'],
                ['emoji' => '⚡', 'name' => 'Laravel', 'description' => 'PHP Framework'],
            ],
        ],
        [
            'heading' => 'Tools & Platforms',
            'items' => [
                ['emoji' => '💻', 'name' => 'VS Code', 'description' => 'Code Editor'],
                ['emoji' => '🐙', 'name' => 'Git & GitHub', 'description' => 'Version Control'],
                ['emoji' => '🤖', 'name' => 'Google Colab', 'description' => 'ML Notebooks'],
                ['emoji' => '📊', 'name' => 'Streamlit', 'description' => 'ML Deployment'],
            ],
        ],
        [
            'heading' => 'AI & Data Science',
            'items' => [
                ['emoji' => '🧠', 'name' => 'Machine Learning', 'description' => 'Model training, testing, and deployment using Python libraries.'],
                ['emoji' => '📁', 'name' => 'Data Handling', 'description' => 'Working with structured datasets, cleaning, and analysis.'],
                ['emoji' => '🎨', 'name' => 'UI/UX Basics', 'description' => 'Designing intuitive, user-friendly interfaces with clean aesthetics.'],
            ],
        ],
    ],
];
