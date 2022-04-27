<?php

declare(strict_types=1);

namespace Domain\Shared\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Trait ThumbnailTrait.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
trait ThumbnailTrait
{
    private ?File $thumbnail_file = null;

    private ?string $thumbnail_url = null;

    private ?int $thumbnail_size = null;

    private ?array $thumbnail_dimensions = [];

    private ?string $thumbnail_type = null;

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(?string $thumbnail_url): self
    {
        $this->thumbnail_url = $thumbnail_url;

        return $this;
    }

    public function getThumbnailSize(): ?int
    {
        return $this->thumbnail_size;
    }

    public function setThumbnailSize(?int $thumbnail_size): self
    {
        $this->thumbnail_size = $thumbnail_size;

        return $this;
    }

    public function getThumbnailType(): ?string
    {
        return $this->thumbnail_type;
    }

    public function setThumbnailType(?string $thumbnail_type): self
    {
        $this->thumbnail_type = $thumbnail_type;

        return $this;
    }

    public function getThumbnailFile(): ?File
    {
        return $this->thumbnail_file;
    }

    public function setThumbnailFile(?File $thumbnail_file): self
    {
        $this->thumbnail_file = $thumbnail_file;
        if ($this->thumbnail_file instanceof UploadedFile) {
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getThumbnailDimensions(): array
    {
        if (null === $this->thumbnail_dimensions) {
            return [];
        }

        return $this->thumbnail_dimensions;
    }

    public function setThumbnailDimensions(?array $thumbnail_dimensions = null): self
    {
        if (null === $thumbnail_dimensions) {
            $this->thumbnail_dimensions = [];
        } else {
            $this->thumbnail_dimensions = $thumbnail_dimensions;
        }

        return $this;
    }
}
