<?php

declare(strict_types=1);

namespace Domain\Authentication\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Username.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class Username
{
    private const MIN_LENGTH = 5;

    private const FORMAT = '/^[a-z\d_\-]+$/';

    private readonly ?string $username;

    public function __construct(string $username)
    {
        Assert::notEmpty($username, 'authentication.validations.empty_username');
        Assert::minLength($username, self::MIN_LENGTH, 'authentication.validations.short_username');
        Assert::regex($username, self::FORMAT, 'authentication.validations.invalid_username_pattern');

        $this->username = $username;
    }

    public function __toString(): string
    {
        return $this->username;
    }

    public function equals(string|self $username): bool
    {
        if ($username instanceof self) {
            return $this->username === $username->username;
        }

        return $this->username === $username;
    }
}
