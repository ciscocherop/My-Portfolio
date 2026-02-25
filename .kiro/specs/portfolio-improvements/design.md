# Design Document: Portfolio Improvements

## Overview

This design document outlines the technical implementation for five key improvements to a Laravel-based personal portfolio website: dark mode theming, performance optimization, contact form functionality, resume download capability, and an about section. The design leverages Laravel 12's modern features, Vite for asset bundling, Tailwind CSS 4 for styling, and follows Laravel best practices for maintainability and testability.

The implementation prioritizes user experience through fast page loads, smooth theme transitions, and accessible form interactions. All features are designed to be testable, maintainable, and deployable without requiring code changes for content updates.

## Architecture

### System Components

The portfolio improvements follow Laravel's MVC architecture with clear separation of concerns:

**Frontend Layer:**
- Blade templates for server-side rendering
- Tailwind CSS 4 with dark mode utilities for theming
- Vanilla JavaScript for theme toggle and form interactions
- Vite for asset bundling and optimization

**Application Layer:**
- Controllers for handling HTTP requests (ContactController, ResumeController)
- Form Request classes for validation (ContactFormRequest)
- Middleware for rate limiting and CSRF protection
- Service classes for business logic (ThemeService, ContactService)

**Data Layer:**
- File storage for resume PDF and about content
- Browser localStorage for theme preferences
- Mail system for contact form submissions
- Cache layer for performance optimization

### Technology Stack

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Tailwind CSS 4, Vanilla JavaScript
- **Build Tool:** Vite 7
- **Testing:** PHPUnit 11 for backend, property-based testing for validation logic
- **Mail:** Laravel Mail with configurable driver
- **Storage:** Laravel Filesystem for resume and content management

### Design Patterns

- **Repository Pattern:** For content management (AboutRepository)
- **Service Layer:** Business logic separation (ContactService, ThemeService)
- **Form Request Objects:** Validation encapsulation
- **Middleware Pipeline:** Rate limiting, CSRF protection
- **Strategy Pattern:** Theme detection (system preference vs stored preference)

## Components and Interfaces

### 1. Theme Management Component

**ThemeService**
```php
class ThemeService
{
    public function getDefaultTheme(Request $request): string
    public function applyThemeToResponse(Response $response, string $theme): Response
}
```

**JavaScript Theme Manager**
```javascript
class ThemeManager {
    constructor()
    getStoredTheme(): string|null
    getSystemTheme(): string
    setTheme(theme: string): void
    toggleTheme(): void
    applyTheme(theme: string): void
}
```

**Responsibilities:**
- Detect system theme preference via `prefers-color-scheme` media query
- Store and retrieve theme preference from localStorage
- Apply theme classes to document root
- Provide smooth transitions between themes

### 2. Performance Optimization Component

**Vite Configuration**
- Asset minification (CSS/JS)
- Code splitting for optimal loading
- Image optimization pipeline
- Cache busting with content hashing

**Laravel Response Optimization**
```php
class PerformanceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    // Sets cache headers for static assets
    // Implements compression headers
}
```

**Image Lazy Loading**
- Native `loading="lazy"` attribute on images
- Intersection Observer API for advanced cases
- Responsive image srcset for optimal sizing

**Responsibilities:**
- Minimize asset file sizes
- Set appropriate cache headers (1 year for versioned assets)
- Implement lazy loading for below-fold images
- Combine and minify CSS/JS files

### 3. Contact Form Component

**ContactController**
```php
class ContactController extends Controller
{
    public function show(): View
    public function store(ContactFormRequest $request): RedirectResponse
}
```

**ContactFormRequest**
```php
class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    public function rules(): array
    public function messages(): array
}
```

**ContactService**
```php
class ContactService
{
    public function sendContactEmail(array $data): bool
    public function logContactSubmission(array $data): void
}
```

**Responsibilities:**
- Validate form input (name, email, subject, message)
- Sanitize user input to prevent XSS
- Send email to portfolio owner
- Implement rate limiting (3 requests/hour per IP)
- Provide CSRF protection
- Display validation errors and success messages

### 4. Resume Download Component

**ResumeController**
```php
class ResumeController extends Controller
{
    public function download(): BinaryFileResponse|RedirectResponse
    private function getResumeFilename(): string
}
```

**ResumeService**
```php
class ResumeService
{
    public function getResumePath(): string|null
    public function resumeExists(): bool
    public function getResumeFilename(): string
}
```

**Responsibilities:**
- Serve PDF file with correct content-type headers
- Generate appropriate filename (e.g., "John_Doe_Resume.pdf")
- Handle missing file scenarios gracefully
- Allow file updates via storage system

### 5. About Section Component

**AboutRepository**
```php
class AboutRepository
{
    public function getContent(): string
    public function updateContent(string $content): bool
}
```

**AboutController**
```php
class AboutController extends Controller
{
    public function show(AboutRepository $repository): View
    public function update(Request $request, AboutRepository $repository): RedirectResponse
}
```

**Responsibilities:**
- Store about content in file or database
- Retrieve and display content
- Support content updates without deployment
- Apply theme-aware styling

## Data Models

### Theme Preference (Client-Side)

```javascript
{
    theme: "light" | "dark"  // Stored in localStorage as 'theme'
}
```

### Contact Form Submission

```php
[
    'name' => 'string|required|max:255',
    'email' => 'string|required|email|max:255',
    'subject' => 'string|required|max:255',
    'message' => 'string|required|max:5000'
]
```

### Resume File Metadata

```php
[
    'path' => 'storage/app/public/resume.pdf',
    'filename' => 'Owner_Name_Resume.pdf',
    'mime_type' => 'application/pdf',
    'size' => 'integer (bytes)'
]
```

### About Content

```php
[
    'content' => 'string (100-300 words)',
    'updated_at' => 'timestamp'
]
```

### Rate Limit Tracking

Laravel's built-in rate limiting uses cache:
```php
[
    'key' => 'contact_form:{ip_address}',
    'attempts' => 'integer',
    'expires_at' => 'timestamp'
]
```

