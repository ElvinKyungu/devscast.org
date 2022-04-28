<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Status.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Status implements \Stringable
{
    public const STATUS = ['draft', 'published', 'reviewing'];
    public const STATUS_CHOICES = [
        'draft' => 'draft',
        'published' => 'published',
        'reviewing' => 'reviewing',
    ];

    private readonly string $status;

    public function __construct(string $status)
    {
        Assert::inArray($status, self::STATUS);
        $this->status = $status;
    }

    public function __toString(): string
    {
        return $this->status;
    }

    public static function fromString(string $status): self
    {
        return new self($status);
    }

    public static function draft(): self
    {
        return new self('draft');
    }

    public static function published(): self
    {
        return new self('published');
    }

    public static function reviewing(): self
    {
        return new self('reviewing');
    }

    public function equals(string|self $status): bool
    {
        if ($status instanceof self) {
            return $this->status === $status->status;
        }

        return $this->status === $status;
    }
}
