# Implementation Plan: Portfolio Improvements

## Overview

This implementation plan breaks down the portfolio improvements into discrete coding tasks following Laravel best practices. The implementation will proceed in phases: project setup, theme management, performance optimization, contact form functionality, resume download, and about section. Each task builds incrementally, with property-based tests marked as optional sub-tasks that validate correctness properties from the design document.

## Tasks

- [ ] 1. Set up project structure and dependencies
  - Install Laravel 12 with PHP 8.2+ if not already present
  - Configure Vite 7 for asset bundling
  - Install Tailwind CSS 4 with dark mode configuration
  - Install Pest PHP with property testing plugin: `composer require --dev pestphp/pest-plugin-property-testing`
  - Set up testing environment and PHPUnit configuration
  - Create directory structure for services, repositories, and form requests
  - _Requirements: All (foundation for all features)_

- [ ] 2. Implement theme management system
  - [ ] 2.1 Create ThemeService class
    - Implement `getDefaultTheme()` method to detect system preference
    - Implement `applyThemeToResponse()` method for server-side theme hints
    - Add service provider registration
    - _Requirements: 1.5_
  
  - [ ] 2.2 Create JavaScript ThemeManager class
    - Implement theme detection from localStorage and system preferences
    - Implement `setTheme()`, `toggleTheme()`, and `applyTheme()` methods
    - Add smooth transition animations between themes
    - Wire up theme toggle button event listeners
    - _Requirements: 1.1, 1.2, 1.3, 1.4, 1.5, 1.6_
  
  - [ ]* 2.3 Write property test for theme toggle state transition
    - **Property 1: Theme Toggle State Transition**
    - **Validates: Requirements 1.2**
    - Test that clicking toggle always transitions to opposite theme
    - Run 100+ iterations with different starting states
  
  - [ ]* 2.4 Write property test for theme preference round trip
    - **Property 2: Theme Preference Round Trip**
    - **Validates: Requirements 1.3, 1.4**
    - Test that storing and retrieving theme returns same value
    - Run 100+ iterations with random theme values
  
  - [ ] 2.5 Update Blade layouts with theme toggle UI
    - Add theme toggle button to main layout header
    - Include ThemeManager JavaScript in layout
    - Apply Tailwind dark mode classes to all page elements
    - _Requirements: 1.1, 1.6_
  
  - [ ]* 2.6 Write unit tests for ThemeService
    - Test default theme detection with various system preferences
    - Test theme application to responses
    - Test edge cases: localStorage unavailable, corrupted values

- [ ] 3. Checkpoint - Verify theme system works
  - Ensure all tests pass, ask the user if questions arise.

- [ ] 4. Implement performance optimization
  - [ ] 4.1 Configure Vite for production optimization
    - Set up CSS and JavaScript minification
    - Configure code splitting for optimal loading
    - Enable cache busting with content hashing
    - Configure image optimization pipeline
    - _Requirements: 2.1, 2.7_
  
  - [ ] 4.2 Create PerformanceMiddleware for cache headers
    - Implement middleware to set cache-control headers for static assets
    - Configure 1-year max-age for versioned assets
    - Add compression headers (gzip/brotli)
    - Register middleware in HTTP kernel
    - _Requirements: 2.3_
  
  - [ ]* 4.3 Write property test for static asset cache headers
    - **Property 3: Static Asset Cache Headers**
    - **Validates: Requirements 2.3**
    - Test that all static assets have cache headers with max-age >= 31536000
    - Run 100+ iterations with different asset types
  
  - [ ] 4.4 Implement image lazy loading
    - Add `loading="lazy"` attribute to all below-fold images
    - Update Blade components to support lazy loading
    - Test lazy loading behavior in browser
    - _Requirements: 2.4_
  
  - [ ]* 4.5 Write property test for below-fold image lazy loading
    - **Property 4: Below-Fold Image Lazy Loading**
    - **Validates: Requirements 2.4**
    - Test that images below viewport have loading="lazy" attribute
    - Run 100+ iterations with different page layouts
  
  - [ ] 4.6 Optimize images and compress assets
    - Run image optimization on existing portfolio images
    - Configure Vite to compress CSS/JS bundles
    - Verify minified output in build directory
    - _Requirements: 2.1, 2.2_
  
  - [ ]* 4.7 Write unit tests for performance features
    - Test that minified assets exist in build output
    - Test cache headers on asset responses
    - Test lazy loading attributes on images
    - Verify Lighthouse performance score >= 90

- [ ] 5. Checkpoint - Verify performance optimizations
  - Ensure all tests pass, ask the user if questions arise.

- [ ] 6. Implement contact form functionality
  - [ ] 6.1 Create ContactFormRequest validation class
    - Define validation rules for name, email, subject, message fields
    - Set maximum lengths (name: 255, email: 255, subject: 255, message: 5000)
    - Add custom error messages for each validation rule
    - _Requirements: 3.2, 3.3, 3.4_
  
  - [ ]* 6.2 Write property test for required field validation
    - **Property 5: Required Field Validation**
    - **Validates: Requirements 3.2**
    - Test that submissions with missing fields always fail validation
    - Run 100+ iterations with random combinations of missing fields
  
  - [ ]* 6.3 Write property test for email format validation
    - **Property 6: Email Format Validation**
    - **Validates: Requirements 3.3**
    - Test that validator correctly identifies valid/invalid email formats
    - Run 100+ iterations with random email-like strings
  
  - [ ]* 6.4 Write property test for validation error messages
    - **Property 7: Validation Error Messages**
    - **Validates: Requirements 3.4**
    - Test that failed validations return specific error messages
    - Run 100+ iterations with different validation failures
  
  - [ ] 6.5 Create ContactService class
    - Implement `sendContactEmail()` method using Laravel Mail
    - Implement `logContactSubmission()` for audit trail
    - Add error handling for email delivery failures
    - _Requirements: 3.5_
  
  - [ ]* 6.6 Write property test for valid submission email dispatch
    - **Property 8: Valid Submission Email Dispatch**
    - **Validates: Requirements 3.5**
    - Test that valid submissions always dispatch email with all fields
    - Run 100+ iterations with random valid form data
  
  - [ ] 6.7 Create ContactController with show and store methods
    - Implement `show()` method to display contact form
    - Implement `store()` method to handle form submission
    - Add success message and form clearing on successful submission
    - Add error handling to preserve form data on server errors
    - _Requirements: 3.1, 3.6, 3.7, 3.10_
  
  - [ ]* 6.8 Write property test for successful submission response
    - **Property 9: Successful Submission Response**
    - **Validates: Requirements 3.6, 3.7**
    - Test that successful submissions return success message and clear form
    - Run 100+ iterations with random valid submissions
  
  - [ ]* 6.9 Write property test for server error data preservation
    - **Property 11: Server Error Data Preservation**
    - **Validates: Requirements 3.10**
    - Test that server errors preserve form data and show error message
    - Run 100+ iterations with simulated server errors
  
  - [ ] 6.10 Add rate limiting middleware to contact routes
    - Configure rate limiter: 3 requests per hour per IP
    - Add rate limit middleware to contact form route
    - Implement user-friendly rate limit error message
    - _Requirements: 3.9_
  
  - [ ]* 6.11 Write property test for rate limit enforcement
    - **Property 10: Rate Limit Enforcement**
    - **Validates: Requirements 3.9**
    - Test that 4th submission within 60 minutes is rejected
    - Run 100+ iterations with different timing patterns
  
  - [ ] 6.12 Create contact form Blade view
    - Build form with name, email, subject, message fields
    - Add CSRF token field
    - Display validation errors and success messages
    - Apply theme-aware styling with Tailwind dark mode
    - _Requirements: 3.1, 3.4, 3.6, 3.8_
  
  - [ ] 6.13 Add contact routes to web.php
    - Add GET route for contact form display
    - Add POST route for form submission with rate limiting
    - Ensure CSRF middleware is applied
    - _Requirements: 3.8_
  
  - [ ]* 6.14 Write unit tests for ContactController
    - Test successful form submission flow
    - Test validation failures with specific error cases
    - Test CSRF protection
    - Test rate limiting after 3 submissions
    - Test server error handling

- [ ] 7. Checkpoint - Verify contact form functionality
  - Ensure all tests pass, ask the user if questions arise.

- [ ] 8. Implement resume download functionality
  - [ ] 8.1 Create ResumeService class
    - Implement `getResumePath()` to locate resume file in storage
    - Implement `resumeExists()` to check file availability
    - Implement `getResumeFilename()` to generate proper filename
    - _Requirements: 4.3, 4.5, 4.6_
  
  - [ ] 8.2 Create ResumeController with download method
    - Implement `download()` method to serve PDF file
    - Set content-type header to "application/pdf"
    - Set filename header with owner name and "Resume"
    - Handle missing file scenario with 404 error
    - _Requirements: 4.2, 4.3, 4.4, 4.5_
  
  - [ ]* 8.3 Write property test for resume download response format
    - **Property 12: Resume Download Response Format**
    - **Validates: Requirements 4.2, 4.3, 4.4**
    - Test that download responses have correct content-type, filename, and contents
    - Run 100+ iterations with different resume files
  
  - [ ] 8.4 Add resume download route and UI button
    - Add GET route for resume download
    - Create download button in Blade layout/homepage
    - Apply theme-aware styling to button
    - _Requirements: 4.1_
  
  - [ ] 8.5 Set up resume file storage
    - Create storage directory for resume PDF
    - Add sample resume file for testing
    - Document process for updating resume file
    - _Requirements: 4.6_
  
  - [ ]* 8.6 Write unit tests for ResumeController
    - Test successful download with existing file
    - Test correct content-type and filename headers
    - Test 404 response when file missing
    - Test file permissions and read errors

- [ ] 9. Checkpoint - Verify resume download works
  - Ensure all tests pass, ask the user if questions arise.

- [ ] 10. Implement about section
  - [ ] 10.1 Create AboutRepository class
    - Implement `getContent()` to retrieve about text from storage
    - Implement `updateContent()` to save about text
    - Use file storage for easy content updates without deployment
    - _Requirements: 5.5_
  
  - [ ] 10.2 Create AboutController with show method
    - Implement `show()` method to display about section
    - Inject AboutRepository dependency
    - Handle content retrieval errors gracefully
    - _Requirements: 5.1_
  
  - [ ]* 10.3 Write property test for about content word count validation
    - **Property 13: About Content Word Count Validation**
    - **Validates: Requirements 5.2**
    - Test that content word count is between 100-300 words
    - Run 100+ iterations with random word counts
  
  - [ ] 10.4 Create about section Blade view
    - Build about section with proper typography and spacing
    - Apply theme-aware styling with Tailwind dark mode
    - Ensure readability in both light and dark themes
    - _Requirements: 5.1, 5.2, 5.3, 5.4_
  
  - [ ]* 10.5 Write property test for theme application to about section
    - **Property 14: Theme Application to About Section**
    - **Validates: Requirements 5.4**
    - Test that about section has theme-appropriate CSS classes
    - Run 100+ iterations with different theme states
  
  - [ ] 10.6 Add about route and navigation
    - Add GET route for about page or section
    - Add navigation link to about section
    - Ensure route is accessible from all pages
    - _Requirements: 5.1_
  
  - [ ] 10.7 Set up about content storage
    - Create storage file for about content
    - Add initial about content (100-300 words)
    - Document process for updating content
    - _Requirements: 5.2, 5.5_
  
  - [ ]* 10.8 Write unit tests for AboutRepository and AboutController
    - Test content retrieval and display
    - Test word count validation (under 100, 100-300, over 300)
    - Test theme class application
    - Test content update functionality
    - Test error handling for missing content

- [ ] 11. Final integration and testing
  - [ ] 11.1 Verify all features work together
    - Test theme toggle on all pages (home, about, contact)
    - Test contact form with theme styling
    - Test resume download button with theme styling
    - Test about section with theme styling
    - _Requirements: All_
  
  - [ ] 11.2 Run full test suite
    - Execute all unit tests: `php artisan test`
    - Execute all property tests with 100+ iterations
    - Verify all 14 correctness properties pass
    - Check test coverage (target: >80% line coverage)
  
  - [ ] 11.3 Run performance validation
    - Build production assets: `npm run build`
    - Verify minified CSS/JS file sizes
    - Run Lighthouse performance test (target: >=90 score)
    - Test page load time on simulated 3G connection
    - _Requirements: 2.5, 2.6_
  
  - [ ] 11.4 Create configuration documentation
    - Document environment variables needed (mail config, owner name)
    - Document file storage locations (resume, about content)
    - Document how to update resume and about content
    - Document rate limiting configuration

- [ ] 12. Final checkpoint - Complete implementation
  - Ensure all tests pass, ask the user if questions arise.

## Notes

- Tasks marked with `*` are optional property-based tests that can be skipped for faster MVP delivery
- Each task references specific requirements for traceability
- Property tests validate universal correctness properties from the design document
- Unit tests validate specific examples, edge cases, and integration points
- All property tests must run at least 100 iterations as specified in the design
- Checkpoints ensure incremental validation and provide opportunities for user feedback
- Implementation uses Laravel 12, PHP 8.2+, Tailwind CSS 4, and Vite 7 as specified in design
