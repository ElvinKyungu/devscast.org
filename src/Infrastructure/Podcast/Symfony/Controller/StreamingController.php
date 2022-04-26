<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Symfony\Controller;

use Infrastructure\Shared\Symfony\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StreamingController.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
#[Route('/podcasts/streaming', name: 'podcast_streaming_')]
final class StreamingController extends AbstractController
{
    #[Route('/{filename}', name: 'index', methods: ['GET'], priority: 10)]
    public function __invoke(string $filename): Response
    {
        try {
            $path = strval($this->getParameter('podcast.upload_path'));

            return new BinaryFileResponse("{$path}/{$filename}");
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            throw new NotFoundHttpException();
        }
    }
}
