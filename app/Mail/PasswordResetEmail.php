<?php
namespace App\Mail;
use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected PasswordReset $passwordReset;
    /**
     * Create a new message instance.
     */
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Reset Email',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            htmlString: '<a href="' . $this->passwordReset['reset_url'] . '" target="_blank">Reset password</a>',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
