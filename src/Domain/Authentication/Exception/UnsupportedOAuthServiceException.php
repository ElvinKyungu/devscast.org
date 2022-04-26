<?php

declare(strict_types=1);

namespace Domain\Authentication\Exception;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Class UnsupportedOAuthServiceException.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class UnsupportedOAuthServiceException extends CustomUserMessageAuthenticationException
{
    public function __construct(string $service)
    {
        $this->setSafeMessage(
            messageKey: 'authentication.exceptions.unsupported_oauth_service',
            messageData: [
                '%service%' => $service,
            ]
        );
        parent::__construct();
    }
}
