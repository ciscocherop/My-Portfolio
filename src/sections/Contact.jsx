import { useRef, useState } from 'react';
import { profile } from '../data/profile';
import { telLink, whatsappLink } from '../lib/format';
import { SocialLink } from '../components/ui';

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const EMPTY = { name: '', email: '', subject: '', message: '' };

function validate(field, value) {
    const v = value.trim();
    if (field === 'subject') return '';
    if (!v) return 'This field is required.';
    if (field === 'email' && !EMAIL_PATTERN.test(v)) return 'Please enter a valid email address.';
    return '';
}

function ErrorIcon() {
    return (
        <svg className="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
            <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clipRule="evenodd" />
        </svg>
    );
}

function Field({ id, label, required, error, children }) {
    return (
        <div>
            <label htmlFor={id} className="text-section-label mb-1.5 block">
                {label} {required && <span style={{ color: 'var(--color-error)' }} aria-hidden="true">*</span>}
            </label>
            {children}
            {error && (
                <p id={`${id}-err`} className="mt-1.5 text-xs flex items-center gap-1" style={{ color: 'var(--color-error)' }}>
                    <ErrorIcon /> {error}
                </p>
            )}
        </div>
    );
}

function Banner({ kind, children }) {
    const ok = kind === 'success';
    return (
        <div
            role={ok ? 'status' : 'alert'}
            className="mb-6 flex items-start gap-3 rounded-xl p-4"
            style={{
                background: ok ? 'var(--color-success-bg)' : 'var(--color-error-bg)',
                border: `1px solid ${ok ? 'var(--color-success)' : 'var(--color-error)'}`,
            }}
        >
            <svg className="w-5 h-5 shrink-0 mt-0.5" style={{ color: ok ? 'var(--color-success)' : 'var(--color-error)' }} fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d={ok ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'} />
            </svg>
            <p className="text-sm font-medium" style={{ color: ok ? 'var(--color-success)' : 'var(--color-error)' }}>{children}</p>
        </div>
    );
}

function ContactForm() {
    const [values, setValues] = useState(EMPTY);
    const [errors, setErrors] = useState({});
    const [status, setStatus] = useState('idle'); // idle | sending | success | error
    const formRef = useRef(null);

    const onChange = e => {
        const { name, value } = e.target;
        setValues(v => ({ ...v, [name]: value }));
        if (errors[name] !== undefined) setErrors(errs => ({ ...errs, [name]: validate(name, value) }));
    };

    const onBlur = e => {
        const { name, value } = e.target;
        setErrors(errs => ({ ...errs, [name]: validate(name, value) }));
    };

    const onSubmit = async e => {
        e.preventDefault();

        const found = Object.fromEntries(Object.keys(values).map(k => [k, validate(k, values[k])]));
        setErrors(found);
        const firstBad = Object.keys(found).find(k => found[k]);
        if (firstBad) {
            formRef.current.elements[firstBad].focus();
            return;
        }

        setStatus('sending');
        try {
            const res = await fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                body: JSON.stringify({
                    access_key: profile.web3formsKey,
                    from_name: 'Portfolio contact form',
                    subject: values.subject.trim() || `New message from ${values.name.trim()}`,
                    name: values.name.trim(),
                    email: values.email.trim(),
                    message: values.message.trim(),
                    botcheck: formRef.current.elements.botcheck.checked,
                }),
            });
            const data = await res.json();
            if (!data.success) throw new Error(data.message);
            setStatus('success');
            setValues(EMPTY);
            setErrors({});
        } catch {
            setStatus('error');
        }
    };

    const inputProps = name => ({
        id: `c-${name}`,
        name,
        value: values[name],
        onChange,
        onBlur,
        'aria-invalid': errors[name] ? true : undefined,
        'aria-describedby': errors[name] ? `c-${name}-err` : undefined,
        className: `form-input ${errors[name] ? 'error' : ''}`,
    });

    return (
        <>
            {status === 'success' && <Banner kind="success">Thanks for reaching out. Your message has been sent.</Banner>}
            {status === 'error' && (
                <Banner kind="error">
                    Sorry, your message couldn't be sent. Please try again, or email me at {profile.email}.
                </Banner>
            )}

            <form ref={formRef} onSubmit={onSubmit} noValidate className="card p-6 space-y-4">
                {/* Hidden from people; bots that tick it are rejected by Web3Forms */}
                <input type="checkbox" name="botcheck" className="hidden" tabIndex={-1} autoComplete="off" />

                <Field id="c-name" label="Your Name" required error={errors.name}>
                    <input {...inputProps('name')} type="text" placeholder="John Doe" maxLength={100} autoComplete="name" aria-required="true" />
                </Field>

                <Field id="c-email" label="Email Address" required error={errors.email}>
                    <input {...inputProps('email')} type="email" placeholder="john@example.com" maxLength={150} autoComplete="email" aria-required="true" />
                </Field>

                <Field id="c-subject" label="Subject">
                    <input {...inputProps('subject')} type="text" placeholder="Project collaboration…" maxLength={150} />
                </Field>

                <Field id="c-message" label="Message" required error={errors.message}>
                    <textarea {...inputProps('message')} rows={4} placeholder="Tell me about your project or idea…" maxLength={2000} aria-required="true" className={`${inputProps('message').className} resize-none`} />
                </Field>

                <button type="submit" disabled={status === 'sending'} className="btn btn-primary w-full">
                    {status === 'sending' ? 'Sending…' : 'Send Message'}
                    {status === 'sending' && (
                        <svg className="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                            <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z" />
                        </svg>
                    )}
                </button>

                <p className="text-center text-[10px]" style={{ color: 'var(--color-text-muted)' }}>
                    Fields marked <span style={{ color: 'var(--color-error)' }}>*</span> are required
                </p>
            </form>
        </>
    );
}

function InfoCard({ label, children }) {
    return (
        <div className="card card-hover p-5">
            <p className="text-section-label mb-1.5">{label}</p>
            {children}
        </div>
    );
}

export default function Contact() {
    return (
        <section className="content-section" aria-labelledby="contact-heading">
            <h2 id="contact-heading" tabIndex={-1} className="text-title mb-1">Get in Touch</h2>
            <p className="text-sm font-medium mb-8" style={{ color: 'var(--color-accent-text)' }}>Let's build something together</p>

            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div className="space-y-3">
                    <h3 className="text-section-label mb-4">Contact Information</h3>

                    <InfoCard label="Email">
                        <a href={`mailto:${profile.email}`} className="link text-sm font-medium break-all">{profile.email}</a>
                    </InfoCard>

                    <InfoCard label="Phone">
                        <a href={telLink(profile.phone)} className="link block text-sm font-medium">{profile.phone}</a>
                    </InfoCard>

                    <InfoCard label="WhatsApp">
                        <a href={whatsappLink(profile.whatsapp)} target="_blank" rel="noopener noreferrer" className="link block text-sm font-medium">
                            {profile.whatsapp}
                        </a>
                    </InfoCard>

                    <InfoCard label="Location">
                        <p className="text-sm font-medium" style={{ color: 'var(--color-text-primary)' }}>{profile.location}</p>
                    </InfoCard>

                    <div className="card p-5">
                        <p className="text-section-label mb-3">Find me on</p>
                        <div className="flex gap-2">
                            {profile.socials.map(s => <SocialLink key={s.name} {...s} />)}
                        </div>
                    </div>
                </div>

                <div>
                    <h3 className="text-section-label mb-4">Send a Message</h3>
                    <ContactForm />
                </div>
            </div>
        </section>
    );
}
