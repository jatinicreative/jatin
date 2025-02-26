<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class,[
                'required' => false,
            ])
            ->add('last_name', TextType::class,[
                'required' => false,
            ])
            ->add('age', TextType::class,[
                'required' => false,
            ])
            ->add('hobby',  ChoiceType::class, [
                'choices'  => [
                    'Reading' => 'Reading',
                    'Writing' => 'Writing',
                    'Sport' => 'Sport',
                    'Travel' => 'Travel',
                ],
                'expanded' => true,
                'multiple' => true,
                'required' => false,
            ])
            ->add('gender',  ChoiceType::class, [
                'choices'  => [
                    'Select Gender' => null,
                    'Male' => 'Male',
                    'Female' => 'Female',
                ],
                'required' => false,
            ] )
            ->add('about', TextareaType::class, [
                'attr' => ['class' => 'ckeditor'],
                'required' => false,
            ])
            ->add('salary', TextType::class,[
                'required' => false,
            ])
            ->add('role', TextType::class,[
                'required' => false,
            ])
            ->add('city', TextType::class,[
                'required' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
