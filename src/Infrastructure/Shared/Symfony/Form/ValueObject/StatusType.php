<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Symfony\Form\ValueObject;

use Domain\Shared\ValueObject\Status;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class StatusType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class StatusType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('status', ChoiceType::class, [
            'choices' => Status::STATUS_CHOICES,
        ])->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'choices' => Status::STATUS_CHOICES,
            'empty_data' => null,
        ]);

        return $resolver;
    }

    /**
     * @param Status $viewData
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms): void
    {
        $forms = iterator_to_array($forms);
        $forms['status']->setData((string) $viewData);
    }

    /**
     * @param Status $viewData
     */
    public function mapFormsToData(\Traversable $forms, mixed &$viewData): void
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = Status::fromString(strval($forms['status']->getData()));
        } catch (\InvalidArgumentException $e) {
            $forms['status']->addError(new FormError($e->getMessage()));
        }
    }
}
