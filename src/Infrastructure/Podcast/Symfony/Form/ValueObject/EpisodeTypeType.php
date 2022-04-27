<?php

declare(strict_types=1);

namespace Infrastructure\Podcast\Symfony\Form\ValueObject;

use Domain\Podcast\ValueObject\EpisodeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EpisodeTypeType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class EpisodeTypeType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('episode_type', ChoiceType::class, [
            'multiple' => false,
            'choices' => EpisodeType::TYPES_CHOICES,
        ])->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => EpisodeType::class,
            'empty_data' => null,
        ]);

        return $resolver;
    }

    /**
     * @param EpisodeType $viewData
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms): void
    {
        $forms = iterator_to_array($forms);
        $forms['episode_type']->setData((string) $viewData);
    }

    /**
     * @param EpisodeType $viewData
     */
    public function mapFormsToData(\Traversable $forms, mixed &$viewData): void
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = EpisodeType::fromString(strval($forms['episode_type']->getData()));
        } catch (\InvalidArgumentException $e) {
            $forms['episode_type']->addError(new FormError($e->getMessage()));
        }
    }
}
