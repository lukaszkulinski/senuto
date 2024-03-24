<?php

declare(strict_types=1);

namespace Senuto\CommandHandler;

use Senuto\Command\CreatePostCommand;
use Senuto\Entity\Post;
use Senuto\Provider\UserProvider;
use Senuto\Repository\PostRepositoryInterface;

final class CreatePostCommandHandler
{
    public function __construct(
        private readonly UserProvider $userProvider,
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    public function __invoke(CreatePostCommand $command): void
    {
        $user = $this->userProvider->getUser();

        $post = new Post($user, $command->title, $command->content);
        $this->postRepository->save($post);
    }
}
