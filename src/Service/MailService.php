<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTestEmail(): void
    {
        try {
            $email = (new Email())
                ->from('test@example.com')
                ->to('recipient@example.com')
                ->subject('Test MailHog')
                ->text('Ceci est un test avec MailHog.');
    
            $this->mailer->send($email);
            dump('E-mail envoyé avec succès !');
        } catch (\Exception $e) {
            dump('Erreur : ' . $e->getMessage());
        }
    }
}
