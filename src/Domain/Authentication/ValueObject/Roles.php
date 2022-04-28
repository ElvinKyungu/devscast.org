<?php

declare(strict_types=1);

namespace Domain\Authentication\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Role.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Roles implements \Stringable
{
    public const ROLES = ['ROLE_ADMIN', 'ROLE_USER', 'ROLE_SUPER_ADMIN'];
    public const ROLES_CHOICES = [
        'ROLE_ADMIN' => 'ROLE_ADMIN',
        'ROLE_USER' => 'ROLE_USER',
        'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
    ];

    private readonly array $roles;

    private function __construct(array $roles = ['ROLE_USER'])
    {
        foreach ($roles as $role) {
            Assert::inArray($role, self::ROLES);
        }

        $roles[] = 'ROLE_USER';
        $this->roles = array_unique($roles);
    }

    public function __toString(): string
    {
        return implode(',', $this->roles);
    }

    public function toArray(): array
    {
        return $this->roles;
    }

    public static function fromArray(array $roles): self
    {
        return new self($roles);
    }

    public static function superAdmin(): self
    {
        return new self(['ROLE_SUPER_ADMIN']);
    }

    public static function regularUser(): self
    {
        return new self();
    }

    public function equals(array|self $roles): bool
    {
        if ($roles instanceof self) {
            return empty(array_diff($this->roles, $roles->roles));
        }

        return empty(array_diff($this->roles, $roles));
    }

    public function contains(string $role): bool
    {
        return in_array($role, $this->roles, true);
    }
}
