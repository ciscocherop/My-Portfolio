<?php

namespace Tests\Feature;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_valid_contact_message_is_sent_to_the_site_owner(): void
    {
        Mail::fake();
        config(['mail.owner_address' => 'owner@example.com']);

        $response = $this->post('/contact', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'I would like to discuss a project.',
        ]);

        $response->assertRedirect('/#contact');
        $response->assertSessionHas('success');
        Mail::assertSent(ContactMessageMail::class, function (ContactMessageMail $mail): bool {
            return $mail->hasTo('owner@example.com')
                && $mail->contactData['name'] === 'Jane Doe'
                && $mail->contactData['email'] === 'jane@example.com';
        });
    }

    public function test_invalid_contact_message_is_rejected(): void
    {
        Mail::fake();

        $response = $this->from('/#contact')->post('/contact', [
            'name' => '',
            'email' => 'not-an-email',
            'message' => str_repeat('x', 2001),
        ]);

        $response->assertRedirect('/#contact');
        $response->assertSessionHasErrors(['name', 'email', 'message']);
        Mail::assertNothingSent();
    }
}
