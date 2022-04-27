<?php

declare(strict_types=1);

namespace Domain\Podcast\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class EpisodeType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class EpisodeType
{
    public const TYPES = ['Full', 'Bonus', 'Trailer'];
    public const TYPES_CHOICES = [
        'Full' => 'Full',
        'Bonus' => 'Bonus',
        'Trailer' => 'Trailer',
    ];

    private readonly string $episode_type;

    private function __construct(string $episode_type)
    {
        Assert::inArray($episode_type, self::TYPES);
        $this->episode_type = $episode_type;
    }

    public function __toString(): string
    {
        return $this->episode_type;
    }

    public static function full(): self
    {
        return new self('Full');
    }

    public static function bonus(): self
    {
        return new self('Bonus');
    }

    public static function trailer(): self
    {
        return new self('Trailer');
    }

    public static function fromString(string $type): self
    {
        return new self($type);
    }

    public function equals(string|self $episode_type): bool
    {
        if ($episode_type instanceof self) {
            return $this->episode_type === $episode_type->episode_type;
        }

        return $this->episode_type === $episode_type;
    }
}
