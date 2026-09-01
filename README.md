# Cherop Sisco — Personal Portfolio

A personal portfolio website built with **Laravel**, **Tailwind CSS**, and **Vite**. It showcases my work, skills, education, and provides a contact form that delivers messages directly to my inbox via Gmail SMTP.

**Live site:** _coming soon (Railway)_

---

## Sections

- **About** — Introduction, bio, and what I do
- **Resume** — Education, featured projects, and languages
- **Skills** — Technical proficiencies, toolkit, soft skills, and knowledge
- **Contact** — Contact form + direct contact info

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12, PHP |
| Frontend | Blade, Tailwind CSS v4, Vite |
| Mail | Gmail SMTP |
| Font | Poppins (Google Fonts) |
| Icons | Custom SVG sprite |
| Hosting | Railway |

---

## Local Setup

```bash
# Clone the repo
git clone https://github.com/ciscocherop/My-Portfolio.git
cd My-Portfolio

# Install dependencies
composer install
npm install

# Environment
cp .env.example .env
php artisan key:generate

# Build assets
npm run build

# Run locally
php artisan serve
```

### Mail setup (Gmail SMTP)

In your `.env`:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=smtps
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your_gmail@gmail.com
MAIL_PASSWORD=your_gmail_app_password
MAIL_FROM_ADDRESS="your_gmail@gmail.com"
MAIL_FROM_NAME="Your Name Portfolio"
MAIL_OWNER_ADDRESS="your_gmail@gmail.com"
```

Generate a Gmail App Password at [myaccount.google.com/security](https://myaccount.google.com/security) (requires 2FA enabled).

---

## CV Downloads

Two tailored CVs are available for download directly from the profile panel:
- **Software Developer CV** — `/public/cv/cherop-sisco-cv.pdf`
- **Data Science CV** — `/public/cv/sisco_cv-DS.docx`

---

## Author

**Cherop Sisco**
- GitHub: [@ciscocherop](https://github.com/ciscocherop)
- LinkedIn: [sisco-cherop](https://www.linkedin.com/in/sisco-cherop-193477294/)
- X: [@cherryCisco](https://x.com/cherryCisco)
- Email: siscocherop668@gmail.com
