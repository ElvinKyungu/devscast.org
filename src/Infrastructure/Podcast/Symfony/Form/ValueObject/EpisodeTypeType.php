<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Symfony\Form\ValueObject;

use Domain\Podcast\ValueObject\EpisodeType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EpisodeTypeType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class EpisodeTypeType extends ChoiceType implements DataMapperInterface
{
    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'attr' => [
                'is' => 'app-select-choices',
            ],
            'data_class' => EpisodeType::class,
            'choices' => EpisodeType::TYPES,
            'empty_data' => null,
        ]);

        return $resolver;
    }

    /**
     * @param EpisodeType $viewData
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms)
    {
        $forms = iterator_to_array($forms);
        $forms['episode_type']->setData((string) $viewData);
    }

    /**
     * @param EpisodeType $viewData
     */
    public function mapFormsToData(\Traversable $forms, mixed &$viewData)
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = new EpisodeType(strval($forms['episode_type']->getData()));
        } catch (\InvalidArgumentException $e) {
            $forms['episode_type']->addError(new FormError($e->getMessage()));
        }
    }
}
