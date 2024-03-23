<?php

declare(strict_types=1);

namespace Senuto\Email\Message;

final class NewCommentMessage extends AbstractMessage
{
    public function getSubject(): string
    {
        return 'Your post has new comment';
    }

    public function getHtmlTemplate(): string
    {
        return 'email/post/new_comment/email.html.twig';
    }

    public function getTextTemplate(): string
    {
        return 'email/post/new_comment/email.txt.twig';
    }
}
