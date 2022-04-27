<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Visibility.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class Visibility implements \Stringable
{
    public const VISIBILITIES = ['public', 'private', 'unlisted'];
    public const VISIBILITIES_CHOICES = [
        'public' => 'public',
        'private' => 'private',
        'unlisted' => 'unlisted',
    ];

    private readonly string $visibility;

    private function __construct(string $visibility)
    {
        Assert::inArray($visibility, self::VISIBILITIES);
        $this->visibility = $visibility;
    }

    public function __toString(): string
    {
        return $this->visibility;
    }

    public static function private(): self
    {
        return new self('private');
    }

    public static function public(): self
    {
        return new self('public');
    }

    public static function unlisted(): self
    {
        return new self('unlisted');
    }

    public static function fromString(string $visibility): self
    {
        return new self($visibility);
    }

    public function equals(string|self $visibility): bool
    {
        if ($visibility instanceof self) {
            return $this->visibility === $visibility->visibility;
        }

        return $this->visibility === $visibility;
    }
}
