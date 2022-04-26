<?php

declare(strict_types=1);

namespace Domain\Authentication\Exception;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Class TooManyLoginAttemptsException.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class TooManyLoginAttemptsException extends CustomUserMessageAuthenticationException
{
    public function __construct()
    {
        parent::__construct(message: 'authentication.exceptions.too_many_login_attempts');
    }
}
