// ─────────────────────────────────────────────
// Your personal details. Edit freely.
// Wrap words in **double stars** to make them bold.
// ─────────────────────────────────────────────

export const profile = {
    name: 'Cherop Sisco',
    title: 'Software Developer & Data Scientist',
    location: 'Kampala, Uganda',
    photo: '/image/portfolio.jpeg',

    // Words that rotate after "Junior" on the About page
    roles: ['Software Developer', 'Data Scientist'],
    subtitle: 'Data Science & Machine Learning',

    // Small pills under your photo
    badges: [
        { icon: '/icons/graduate.jpg', label: 'Business Computing' },
        { icon: '/icons/tick.png', label: 'Open to Work' },
        { icon: '/icons/world.jpg', label: 'Remote · Onsite' },
    ],

    email: 'siscocherop668@gmail.com',
    phone: '+256 784 309 829',
    whatsapp: '+256 703 558 174',

    socials: [
        { name: 'GitHub', icon: 'github', url: 'https://github.com/ciscocherop' },
        { name: 'LinkedIn', icon: 'linkedin', url: 'https://www.linkedin.com/in/sisco-cherop-193477294/' },
        { name: 'X', icon: 'twitter', url: 'https://x.com/cherryCisco' },
    ],

    // Files live in public/cv/. The first one is the main (yellow) button.
    documents: [
        { label: 'Download CV', file: '/cv/cherop-sisco-cv.pdf', download: true },
        { label: 'Data Science Certificate', file: '/cv/certificate-data-science.pdf', download: false },
    ],

    // Paste the access key Web3Forms emailed you (see README)
    web3formsKey: 'YOUR_WEB3FORMS_ACCESS_KEY',
};

export const about = {
    tagline: ['Building with technology.', 'Solving with data.'],

    bio: [
        'I am a **Business Computing graduate** with a strong interest in software development, data science, and machine learning. My academic background combines **business knowledge with technology**, giving me a broad foundation in programming, databases, web and mobile development, business intelligence, systems analysis, software engineering, and IT project management.',
        'Alongside my degree, I have developed practical skills in **Data Science and Machine Learning** — working with Python, data analysis, visualisation, predictive modelling, and machine learning algorithms. I enjoy taking real-world problems, understanding underlying needs, and turning them into practical technology solutions.',
    ],

    // "What I Do" cards — use an image `icon` or an `emoji`
    services: [
        {
            icon: '/icons/software.png',
            title: 'Software Development',
            description: 'Building web and application solutions with React, JavaScript, Laravel, PHP, and RESTful APIs.',
        },
        {
            icon: '/icons/datascience.jpg',
            title: 'Data Science & ML',
            description: 'Uncovering insights and building predictive solutions with Python, Pandas, Scikit-learn, and Streamlit.',
        },
        {
            emoji: '💼',
            title: 'Business & Technology',
            description: 'Bridging business understanding and technical execution to create solutions that deliver real value.',
        },
    ],

    quote: 'I enjoy turning real-world problems into practical technology solutions that create meaningful value.',
};
