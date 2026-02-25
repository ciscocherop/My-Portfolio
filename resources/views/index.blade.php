<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <style>
        :root{ --bg:#f7fafc; --card:#ffffff; --accent:#0f172a; --muted:#6b7280 }
        html,body{height:100%;margin:0;font-family:Inter,system-ui,Segoe UI,Roboto,'Helvetica Neue',Arial}
        body{background:var(--bg);color:var(--accent);-webkit-font-smoothing:antialiased}
        .container{max-width:1000px;margin:40px auto;padding:20px}
        /* Hero card */
        .hero-card{display:flex;gap:24px;background:var(--card);border-radius:12px;padding:24px;align-items:center;box-shadow:0 6px 18px rgba(2,6,23,0.06)}
        .hero-photo{flex:0 0 220px;height:220px;border-radius:12px;overflow:hidden;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e2e8f0,#fff)}
        .hero-photo img{width:100%;height:100%;object-fit:cover;display:block}
        .hero-content{flex:1;min-width:0}
        .label{font-weight:800;font-size:14px;letter-spacing:0.04em;color:var(--accent);margin:0 0 8px}
        .name{font-size:28px;font-weight:700;margin:0}
        .title{font-size:16px;color:var(--muted);margin:6px 0 12px}
        .desc{color:#374151;line-height:1.5;margin:0}
        /* Sections */
        section{margin-top:40px}
        .section-inner{background:var(--card);padding:18px;border-radius:10px;box-shadow:0 6px 12px rgba(2,6,23,0.04)}
        /* Responsive */
        @media (max-width:720px){
            .hero-card{flex-direction:column;text-align:center}
            .hero-photo{width:160px;height:160px}
            .hero-content{padding:8px}
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Home / Hero -->
        <main id="home" class="hero-card" role="main">
            <div class="hero-photo">
                <!-- Replace the src with your actual photo in public/images/profile.jpg -->
                <img src="/images/profile.jpg" alt="Profile photo">
            </div>
            <div class="hero-content">
                <p class="label">My portfolio</p>
                <h1 class="name">Your Name</h1>
                <div class="title">Software Engineer</div>
                <p class="desc">I'm a software engineer who builds web applications with a focus on clean, maintainable code and delightful user experiences. I enjoy building full-stack features and learning new technologies.</p>
            </div>
        </main>

        <!-- About Me -->
        <section id="about">
            <div class="section-inner">
                <h2>About Me</h2>
                <p>Short introduction about yourself. Replace this text with your background, interests, and what you do.</p>
            </div>
        </section>

        <!-- Skills -->
        <section id="skills">
            <div class="section-inner">
                <h2>Skills</h2>
                <p>List your skills (e.g., JavaScript, PHP, Laravel, Vue, React, SQL).</p>
            </div>
        </section>

        <!-- Projects -->
        <section id="projects">
            <div class="section-inner">
                <h2>Projects</h2>
                <p>Showcase a few projects with short descriptions and links to repos or live demos.</p>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="section-inner">
                <h2>Contact</h2>
                <p>Provide your email, social links, or a contact form.</p>
            </div>
        </section>
    </div>
</body>
</html>