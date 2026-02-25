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


## Correctness Properties

*A property is a characteristic or behavior that should hold true across all valid executions of a system—essentially, a formal statement about what the system should do. Properties serve as the bridge between human-readable specifications and machine-verifiable correctness guarantees.*

### Property Reflection

After analyzing all acceptance criteria, I identified the following redundancies and consolidations:

**Redundancy Analysis:**
- Properties 1.3 and 1.4 (theme persistence and loading) can be combined into a single round-trip property
- Properties 4.2, 4.3, and 4.4 (resume download format, filename, headers) can be combined into a comprehensive download property
- Property 1.6 (theme application to all elements) is implicitly tested by property 1.2 (theme switching) and 5.4 (about section theme adaptation)
- Properties 3.6 and 3.7 (success message and form clearing) can be combined into a single property about successful submission behavior

**Consolidated Properties:**
The following properties represent the unique, non-redundant validation requirements:

### Property 1: Theme Toggle State Transition

*For any* current theme state (light or dark), clicking the theme toggle should transition the document to the opposite theme state.

**Validates: Requirements 1.2**

### Property 2: Theme Preference Round Trip

*For any* theme selection (light or dark), storing the preference and then retrieving it should return the same theme value.

**Validates: Requirements 1.3, 1.4**

### Property 3: Static Asset Cache Headers

*For any* static asset request (CSS, JS, images), the HTTP response should include appropriate cache-control headers with a max-age of at least 31536000 seconds (1 year).

**Validates: Requirements 2.3**

### Property 4: Below-Fold Image Lazy Loading

*For any* image element that is positioned below the initial viewport, the HTML should include the `loading="lazy"` attribute.

**Validates: Requirements 2.4**

### Property 5: Required Field Validation

*For any* contact form submission with one or more empty required fields (name, email, subject, message), the validation should fail and return errors for each missing field.

**Validates: Requirements 3.2**

### Property 6: Email Format Validation

*For any* string input to the email field, the validator should correctly identify whether it matches valid email format according to RFC 5322 standards.

**Validates: Requirements 3.3**

### Property 7: Validation Error Messages

*For any* form submission that fails validation, the response should contain specific error messages corresponding to each validation failure.

**Validates: Requirements 3.4**

### Property 8: Valid Submission Email Dispatch

*For any* valid contact form submission, the system should dispatch an email containing all form fields (name, email, subject, message) to the configured recipient address.

**Validates: Requirements 3.5**

### Property 9: Successful Submission Response

*For any* successful contact form submission, the response should include a success message and the form should be in a cleared state (empty fields).

**Validates: Requirements 3.6, 3.7**

### Property 10: Rate Limit Enforcement

*For any* IP address, after 3 contact form submissions within a 60-minute window, the 4th submission attempt should be rejected with a rate limit error.

**Validates: Requirements 3.9**

### Property 11: Server Error Data Preservation

*For any* contact form submission that encounters a server error, the response should preserve the submitted form data and display an error message.

**Validates: Requirements 3.10**

### Property 12: Resume Download Response Format

*For any* resume download request when the file exists, the response should be a binary file with content-type "application/pdf", a filename containing the owner's name and "Resume", and the correct file contents.

**Validates: Requirements 4.2, 4.3, 4.4**

### Property 13: About Content Word Count Validation

*For any* about section content, the word count should be between 100 and 300 words inclusive.

**Validates: Requirements 5.2**

### Property 14: Theme Application to About Section

*For any* theme state (light or dark), the about section should have CSS classes or styles that correspond to that theme.

**Validates: Requirements 5.4**

## Error Handling

### Theme Management Errors

**localStorage Unavailable:**
- Fallback to system theme preference
- Continue operation without persistence
- Log warning for debugging

**Invalid Theme Value:**
- Default to 'light' theme
- Clear corrupted localStorage value
- Apply valid theme immediately

### Performance Optimization Errors

**Asset Build Failures:**
- Fail build process with clear error messages
- Prevent deployment of unoptimized assets
- Log specific asset causing failure

**Image Optimization Failures:**
- Serve original image if optimization fails
- Log error for manual review
- Continue page rendering

### Contact Form Errors

**Validation Failures:**
- Return 422 Unprocessable Entity status
- Provide field-specific error messages
- Preserve user input for correction
- Highlight invalid fields in UI

**Rate Limit Exceeded:**
- Return 429 Too Many Requests status
- Display user-friendly message with retry time
- Log attempt for security monitoring

**Email Delivery Failures:**
- Log error with full context
- Display generic error to user (don't expose mail config)
- Queue for retry if using queue system
- Alert administrator of persistent failures

**CSRF Token Mismatch:**
- Return 419 Page Expired status
- Prompt user to refresh and resubmit
- Preserve form data if possible

**Server Errors (500):**
- Log full exception details
- Display user-friendly error message
- Preserve form data in session
- Redirect back to form with data

### Resume Download Errors

**File Not Found:**
- Return 404 Not Found status
- Display clear message: "Resume is currently unavailable"
- Log error for administrator attention
- Provide alternative contact method

**File Read Errors:**
- Return 500 Internal Server Error
- Log detailed error information
- Display generic error to user
- Alert administrator

**Invalid File Type:**
- Prevent upload of non-PDF files
- Validate MIME type on upload
- Display error during file management

### About Section Errors

**Content Retrieval Failures:**
- Display fallback content or empty state
- Log error for investigation
- Continue page rendering
- Provide admin notification

**Content Update Failures:**
- Return validation errors to admin
- Preserve attempted content
- Log error details
- Prevent partial updates

### General Error Handling Principles

1. **User-Facing Errors:** Always provide clear, actionable messages
2. **Logging:** Log all errors with sufficient context for debugging
3. **Security:** Never expose sensitive system details in error messages
4. **Graceful Degradation:** Continue operation when non-critical features fail
5. **Monitoring:** Track error rates for proactive issue detection

## Testing Strategy

### Dual Testing Approach

This feature requires both unit testing and property-based testing for comprehensive coverage:

**Unit Tests** focus on:
- Specific examples of correct behavior
- Edge cases (missing files, empty localStorage, etc.)
- Integration points between components
- Error conditions and exception handling
- Middleware behavior (CSRF, rate limiting)

**Property-Based Tests** focus on:
- Universal properties that hold for all inputs
- Validation logic across many random inputs
- Round-trip properties (theme persistence, form data)
- Comprehensive input coverage through randomization

Both approaches are complementary and necessary. Unit tests catch concrete bugs and verify specific scenarios, while property tests verify general correctness across a wide input space.

### Property-Based Testing Configuration

**Framework:** We'll use **Pest PHP with Pest Property Testing plugin** for Laravel property-based tests.

Installation:
```bash
composer require --dev pestphp/pest-plugin-property-testing
```

**Configuration:**
- Each property test must run a minimum of 100 iterations
- Each test must include a comment tag referencing the design property
- Tag format: `// Feature: portfolio-improvements, Property {number}: {property_text}`

**Example Property Test Structure:**
```php
// Feature: portfolio-improvements, Property 6: Email Format Validation
it('correctly validates email formats across random inputs', function () {
    // Generate 100+ random email-like strings
    // Test that validator correctly identifies valid vs invalid
})->repeat(100);
```

### Unit Testing Strategy

**Theme Management Tests:**
- Test theme toggle functionality with specific light/dark values
- Test localStorage read/write with mock storage
- Test system preference detection with mock media queries
- Test theme application to DOM elements
- Edge case: localStorage unavailable
- Edge case: corrupted theme value in storage
- Edge case: no stored preference (system default)

**Performance Optimization Tests:**
- Verify minified assets exist in build output
- Check cache headers on asset responses
- Verify lazy loading attributes on images
- Test image optimization in build pipeline
- Example: CSS file is minified (no unnecessary whitespace)
- Example: JS file is minified (no comments, shortened names)

**Contact Form Tests:**
- Test validation with valid complete form data
- Test validation with missing required fields
- Test validation with invalid email formats
- Test CSRF token requirement
- Test rate limiting after 3 submissions
- Test email dispatch with valid data
- Test success response and form clearing
- Test error response with data preservation
- Edge case: empty form submission
- Edge case: extremely long message (5000+ chars)
- Edge case: special characters in fields
- Edge case: SQL injection attempts (sanitization)

**Resume Download Tests:**
- Test successful download with existing file
- Test correct content-type header
- Test filename format
- Test response when file missing
- Edge case: file exists but is corrupted
- Edge case: file permissions issue

**About Section Tests:**
- Test content retrieval and display
- Test word count validation (100-300 words)
- Test theme class application
- Test content update functionality
- Edge case: content under 100 words
- Edge case: content over 300 words
- Edge case: empty content

### Integration Testing

**Full User Flows:**
1. Visitor arrives → system theme detected → theme applied → toggle works → preference persists
2. Visitor fills form → validation passes → email sent → success shown → form cleared
3. Visitor clicks download → file served → correct headers → proper filename
4. Page load → assets cached → images lazy loaded → performance metrics met

**Cross-Feature Testing:**
- Theme toggle works on all pages (home, about, contact)
- Contact form respects theme styling
- Resume download button respects theme styling
- About section respects theme styling

### Performance Testing

**Metrics to Verify:**
- Initial page load < 2 seconds (simulated 3G connection)
- Lighthouse performance score ≥ 90
- Asset sizes: CSS < 50KB, JS < 100KB (minified + gzipped)
- Image optimization: 70-80% size reduction with acceptable quality
- Cache hit rate > 95% for returning visitors

**Tools:**
- Lighthouse CI for automated performance testing
- WebPageTest for detailed performance analysis
- Laravel Telescope for backend performance monitoring

### Test Organization

```
tests/
├── Feature/
│   ├── ThemeManagementTest.php
│   ├── ContactFormTest.php
│   ├── ResumeDownloadTest.php
│   ├── AboutSectionTest.php
│   └── PerformanceTest.php
├── Unit/
│   ├── Services/
│   │   ├── ThemeServiceTest.php
│   │   ├── ContactServiceTest.php
│   │   └── ResumeServiceTest.php
│   ├── Requests/
│   │   └── ContactFormRequestTest.php
│   └── Repositories/
│       └── AboutRepositoryTest.php
└── Property/
    ├── ThemePropertyTest.php
    ├── ContactFormPropertyTest.php
    ├── ResumePropertyTest.php
    └── AboutPropertyTest.php
```

### Continuous Integration

All tests must pass before deployment:
```bash
php artisan test --parallel
npm run build
php artisan lighthouse:test
```

**Coverage Goals:**
- Line coverage: > 80%
- Branch coverage: > 75%
- Property tests: 100 iterations minimum per property
- All 14 correctness properties must have corresponding property tests
