<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Symfony\Form\ValueObject;

use Domain\Shared\ValueObject\Visibility;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class VisibilityType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class VisibilityType extends ChoiceType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('visibility', ChoiceType::class, [
            'multiple' => false,
            'choices' => Visibility::VISIBILITIES_CHOICES,
        ])->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => Visibility::class,
            'empty_data' => null,
        ]);

        return $resolver;
    }

    /**
     * @param Visibility $viewData
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms): void
    {
        $forms = iterator_to_array($forms);
        $forms['visibility']->setData((string) $viewData);
    }

    /**
     * @param Visibility $viewData
     */
    public function mapFormsToData(\Traversable $forms, mixed &$viewData): void
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = Visibility::fromString(strval($forms['visibility']->getData()));
        } catch (\InvalidArgumentException $e) {
            $forms['visibility']->addError(new FormError($e->getMessage()));
        }
    }
}
