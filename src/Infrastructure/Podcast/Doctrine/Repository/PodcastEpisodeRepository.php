<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Podcast\Entity\PodcastEpisode;
use Domain\Podcast\Repository\PodcastEpisodeRepositoryInterface;
use Domain\Shared\ValueObject\Status;
use Domain\Shared\ValueObject\Visibility;
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

    public function findAvailableForFeed(): array
    {
        /** @var PodcastEpisode[] $result */
        $result = $this->createQueryBuilder('pe')
            ->where('pe.status = :status')
            ->andWhere('pe.visibility = :visibility')
            ->setParameter('status', Status::published())
            ->setParameter('visibility', Visibility::public())
            ->getQuery()
            ->getResult();

        return $result;
    }
}
