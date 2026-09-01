<x-mail::message>
# New Message from Your Portfolio

**Name:** {{ $contactData['name'] }}

**Email:** {{ $contactData['email'] }}

@if (!empty($contactData['subject']))
**Subject:** {{ $contactData['subject'] }}
@endif

**Message:**

{{ $contactData['message'] }}

---
*Sent from your portfolio contact form*
</x-mail::message>
