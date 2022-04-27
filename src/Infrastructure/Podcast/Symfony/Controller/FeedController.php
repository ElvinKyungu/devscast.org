<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Symfony\Controller;

use Domain\Podcast\Repository\PodcastEpisodeRepositoryInterface;
use Infrastructure\Shared\Symfony\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FeedController.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
#[Route('/podcasts/feed.xml', name: 'podcast_feed_')]
final class FeedController extends AbstractController
{
    #[Route('feed.xml', name: 'index', methods: ['GET'], priority: 20)]
    public function index(PodcastEpisodeRepositoryInterface $repository): Response
    {
        $podcasts = $repository->findAvailableForFeed();
        $response = $this->render(
            view: 'domain/podcast/feed.xml.twig',
            parameters: [
                'podcasts' => $podcasts,
            ]
        );
        $response->headers->set('Content-Type', 'application/rss+xml; charset=utf-8');

        return $response;
    }
}
