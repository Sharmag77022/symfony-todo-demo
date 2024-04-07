<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('date_time', null, [
                'widget' => 'single_text'
            ])
            ->add('is_completed', CheckboxType::class, [
                'label' => false, // Hide the label
                'required' => false, // Optional: set to false if the checkbox is not required
                'data' => false, // Set default value to false (unchecked)
                'attr' => ['style' => 'display: none;'], // Hide the checkbox
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
