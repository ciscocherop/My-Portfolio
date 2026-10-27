/* "+256 784 309 829" → "tel:+256784309829" */
export const telLink = number => `tel:${number.replace(/[^\d+]/g, '')}`;

/* "+256 703 558 174" → "https://wa.me/256703558174" */
export const whatsappLink = number => `https://wa.me/${number.replace(/\D/g, '')}`;

/* Renders **bold** segments of a string as <strong> */
export function RichText({ text }) {
    return text.split(/\*\*(.+?)\*\*/g).map((part, i) =>
        i % 2 === 1
            ? <strong key={i} style={{ color: 'var(--color-accent-text)' }}>{part}</strong>
            : part
    );
}
