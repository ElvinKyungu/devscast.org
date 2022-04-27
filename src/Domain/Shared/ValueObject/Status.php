<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObject;

use Webmozart\Assert\Assert;

/**
 * Class Status.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class Status
{
    public const STATUS = ['draft', 'published', 'reviewing'];

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

    public function equals(string|self $status): bool
    {
        if ($status instanceof self) {
            return $this->status === $status->status;
        }

        return $this->status === $status;
    }
}
