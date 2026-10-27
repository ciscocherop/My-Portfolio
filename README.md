# Cherop Sisco — Personal Portfolio

A personal portfolio website built with **React**, **Tailwind CSS** and **Vite**.

**Live site:** _coming soon_

---

## ✏️ How to update the content

All the text on the site lives in **`src/data/`**. You never need to touch the
components or CSS to change what the site says.

| I want to…                                 | Edit this file          |
|--------------------------------------------|-------------------------|
| Add / change a project                     | `src/data/projects.js`  |
| Add / change a skill, soft skill, tag      | `src/data/skills.js`    |
| Add education or a language                | `src/data/resume.js`    |
| Change bio, email, phone, socials, CV file | `src/data/profile.js`   |

**Example — add a new project:** open `src/data/projects.js`, copy one `{ ... },`
block, paste it at the top of the list and change the text:

```js
{
    title: 'My New App',
    description: 'What it does and what I built.',
    tags: ['React', 'Firebase'],
    github: 'https://github.com/ciscocherop/my-new-app',
    live: null,          // or 'https://my-new-app.vercel.app'
    featured: true,      // true = shown on the Resume page
},
```

**Images / files:** put icons in `public/icons/`, photos in `public/image/` and
CVs in `public/cv/`, then refer to them as `/icons/name.png`, `/cv/file.pdf`, etc.

After editing, run `npm run dev` to check it, then commit and push. If the site
is connected to Vercel or Netlify, it updates itself within a minute.

---

## 🚀 Running it locally

```bash
npm install     # first time only
npm run dev     # opens a live-reloading preview at http://localhost:5173
npm run build   # makes the final site in dist/ (Vercel/Netlify do this for you)
```

`npm run dev` is only a preview server for your own computer while you work.
The real site is plain HTML/CSS/JS files, so it can be hosted for free.

---

## 📬 Contact form (Web3Forms)

The form sends messages to your email through [Web3Forms](https://web3forms.com):

1. Go to web3forms.com, enter `siscocherop668@gmail.com` and click **Create Access Key**.
2. Copy the key from the email they send you.
3. Paste it into `web3formsKey` in `src/data/profile.js`.

The key is safe to have in public code — it can only send messages to your inbox.

---

## 🌍 Deploying (free)

1. Push this repo to GitHub.
2. Sign in to [vercel.com](https://vercel.com) with GitHub → **Add New Project** →
   pick `My-Portfolio`. It detects Vite automatically; click **Deploy**.
3. Every push to `main` now redeploys the site.

---

## Project structure

```
src/
  data/         ← your content (edit these)
  sections/     ← About, Resume, Skills, Contact pages
  components/   ← shared pieces: nav, profile panel, icons
  lib/          ← small helpers (theme, navigation, formatting)
  index.css     ← design tokens, colours, dark mode
public/         ← images, icons, CV files
```

---

## Author

**Cherop Sisco**
- GitHub: [@ciscocherop](https://github.com/ciscocherop)
- LinkedIn: [sisco-cherop](https://www.linkedin.com/in/sisco-cherop-193477294/)
- X: [@cherryCisco](https://x.com/cherryCisco)
- Email: siscocherop668@gmail.com
