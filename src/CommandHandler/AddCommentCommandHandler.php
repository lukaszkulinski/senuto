<?php

declare(strict_types=1);

namespace Senuto\CommandHandler;

use Senuto\Command\AddCommentCommand;
use Senuto\Entity\Comment;
use Senuto\Provider\UserProvider;
use Senuto\Query\PostQueryInterface;
use Senuto\Repository\CommentRepositoryInterface;
use Senuto\Repository\PostRepositoryInterface;
use Senuto\Service\CommandBusInterface;

final class AddCommentCommandHandler
{
    public function __construct(
        private readonly UserProvider $userProvider,
        private readonly PostQueryInterface $postQuery,
        private readonly PostRepositoryInterface $postRepository,
        private readonly CommentRepositoryInterface $commentRepository,
        private readonly CommandBusInterface $commandBus,
    ) {
    }

    public function __invoke(AddCommentCommand $command): void
    {
        $user = $this->userProvider->getUser();
        $post = $this->postQuery->getById($command->postId);

        $comment = new Comment($user, $command->content);
        $this->commentRepository->save($comment);

        $post->addComment($comment);
        $this->postRepository->save($post);

        $this->commandBus->dispatch(new SendNewCommentEmail(
            $post->getAuthor()->getEmail()
        ));
    }
}
