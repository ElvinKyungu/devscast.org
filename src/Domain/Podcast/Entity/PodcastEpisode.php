<?php

declare(strict_types=1);

namespace Domain\Podcast\Entity;

use Domain\Podcast\ValueObject\EpisodeType;
use Domain\Shared\Entity\IdentityTrait;
use Domain\Shared\Entity\ThumbnailTrait;
use Domain\Shared\Entity\TimestampTrait;
use Domain\Shared\Entity\VisibilityTrait;

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

    private ?string $uuid;

    private ?string $name = null;

    private ?string $slug = null;

    private ?int $duration = 1;

    private ?int $episode = null;

    private ?EpisodeType $episode_type = null;

    private ?string $description = null;

    private ?string $short_description = null;
}
