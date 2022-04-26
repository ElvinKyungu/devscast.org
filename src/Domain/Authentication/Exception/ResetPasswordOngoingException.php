<?php

declare(strict_types=1);

namespace Domain\Authentication\Exception;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Class ResetPasswordOngoingException.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class ResetPasswordOngoingException extends CustomUserMessageAuthenticationException
{
    public function __construct()
    {
        parent::__construct(message: 'authentication.exceptions.reset_password_ongoing_request');
    }
}
