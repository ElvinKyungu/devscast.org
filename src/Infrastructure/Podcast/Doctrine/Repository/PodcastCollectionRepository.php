<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Podcast\Entity\PodcastCollection;
use Domain\Podcast\Repository\PodcastCollectionRepositoryInterface;
use Infrastructure\Shared\Doctrine\Repository\AbstractRepository;

/**
 * Class PodcastCollectionRepository.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class PodcastCollectionRepository extends AbstractRepository implements PodcastCollectionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PodcastCollection::class);
    }
}
