<?php

declare(strict_types=1);

namespace Domain\Shared\Entity;

use Domain\Shared\ValueObject\Status;
use Domain\Shared\ValueObject\Visibility;

/**
 * Trait ContentPrivacyTrait.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
trait VisibilityTrait
{
    private ?Status $status = null;

    private ?Visibility $visibility = null;

    public function isAccessible(): bool
    {
        return $this->status->equals('published') &&
            $this->visibility->equals('public');
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getVisibility(): ?Visibility
    {
        return $this->visibility;
    }

    public function setVisibility(?Visibility $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }
}
