<?php

declare(strict_types=1);

namespace Domain\Podcast\Entity;

use Domain\Shared\Entity\IdentityTrait;
use Domain\Shared\Entity\TimestampTrait;

/**
 * Class PodcastCollection.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class PodcastCollection
{
    use IdentityTrait;
    use TimestampTrait;
}
