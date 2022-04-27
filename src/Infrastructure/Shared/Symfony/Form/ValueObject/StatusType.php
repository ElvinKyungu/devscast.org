<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Symfony\Form\ValueObject;

use Domain\Shared\ValueObject\Status;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class StatusType.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class StatusType extends ChoiceType implements DataMapperInterface
{
    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'attr' => [
                'is' => 'app-select-choices',
            ],
            'data_class' => Status::class,
            'choices' => Status::STATUS,
            'empty_data' => null,
        ]);

        return $resolver;
    }

    /**
     * @param Status $viewData
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms)
    {
        $forms = iterator_to_array($forms);
        $forms['status']->setData((string) $viewData);
    }

    /**
     * @param Status $viewData
     */
    public function mapFormsToData(\Traversable $forms, mixed &$viewData)
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = new Status(strval($forms['status']->getData()));
        } catch (\InvalidArgumentException $e) {
            $forms['status']->addError(new FormError($e->getMessage()));
        }
    }
}
