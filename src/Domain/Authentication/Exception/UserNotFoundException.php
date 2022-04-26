<?php

declare(strict_types=1);

namespace Domain\Authentication\Exception;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Class UserNotFoundException.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class UserNotFoundException extends CustomUserMessageAuthenticationException
{
    public function __construct()
    {
        parent::__construct(message: 'authentication.exceptions.user_not_found');
    }
}
