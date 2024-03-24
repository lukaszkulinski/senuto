<?php

declare(strict_types=1);

namespace Senuto\Email\Factory;

use App\Email\Message\MessageInterface;

final class EmailFactory
{
    public function __construct(
        private readonly MailerInterface $mailer,
    ) {
    }

    /**
     * @param array<string, mixed> $context
     */
    public function send(
        MessageInterface $message,
        Address|string $to,
        array $context = []
    ): void {
        $email = new TemplatedEmail();
        $email
            ->subject(
                $this->sanitizeSubject($message->getSubject())
            )
            ->htmlTemplate($message->getHtmlTemplate())
            ->textTemplate($message->getTextTemplate())
            ->to($to)
            ->context($context)
        ;

        $this->mailer->send($email);
    }

    private function sanitizeSubject(string $rawRender): string
    {
        return trim((string) preg_replace('/\s+/', ' ', $rawRender));
    }
}
