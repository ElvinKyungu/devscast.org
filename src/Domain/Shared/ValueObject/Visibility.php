<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Visibility.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Visibility
{
    public const VISIBILITY_LEVELS = ['public', 'private', 'unlisted'];

    private readonly string $visibility;

    public function __construct(string $visibility)
    {
        Assert::inArray($visibility, self::VISIBILITY_LEVELS);
        $this->visibility = $visibility;
    }

    public function __toString(): string
    {
        return $this->visibility;
    }

    public function equals(string|self $visibility): bool
    {
        if ($visibility instanceof self) {
            return $this->visibility === $visibility->visibility;
        }

        return $this->visibility === $visibility;
    }
}
