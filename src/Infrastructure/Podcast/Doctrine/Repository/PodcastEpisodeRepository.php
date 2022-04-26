<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Podcast\Entity\PodcastEpisode;
use Domain\Podcast\Repository\PodcastEpisodeRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * Class PodcastCollectionRepository.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class PodcastEpisodeRepository extends AbstractRepository implements PodcastEpisodeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PodcastEpisode::class);
    }
}
