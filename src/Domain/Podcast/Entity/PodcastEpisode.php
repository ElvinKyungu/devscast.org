<?php

declare(strict_types=1);

namespace Domain\Podcast\Entity;

use Domain\Podcast\ValueObject\EpisodeType;
use Domain\Shared\Entity\IdentityTrait;
use Domain\Shared\Entity\ThumbnailTrait;
use Domain\Shared\Entity\TimestampTrait;
use Domain\Shared\Entity\VisibilityTrait;
use Domain\Shared\ValueObject\Status;
use Domain\Shared\ValueObject\Visibility;

/**
 * Class PodcastEpisode.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class PodcastEpisode
{
    use IdentityTrait;
    use ThumbnailTrait;
    use TimestampTrait;
    use VisibilityTrait;

    private ?string $uuid = null;

    private ?string $name = null;

    private ?string $slug = null;

    private ?int $duration = 1;

    private ?int $episode = null;

    private EpisodeType $episode_type;

    private ?string $description = null;

    private ?string $short_description = null;

    public function __construct()
    {
        $this->status = Status::draft();
        $this->visibility = Visibility::private();
        $this->episode_type = EpisodeType::full();
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getEpisode(): ?int
    {
        return $this->episode;
    }

    public function setEpisode(?int $episode): self
    {
        $this->episode = $episode;

        return $this;
    }

    public function getEpisodeType(): EpisodeType
    {
        return $this->episode_type;
    }

    public function setEpisodeType(EpisodeType $episode_type): self
    {
        $this->episode_type = $episode_type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }
}
