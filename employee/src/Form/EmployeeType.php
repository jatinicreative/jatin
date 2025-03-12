<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name',TextType::class,[
                'required' => false,
            ])
            ->add('last_name',TextType::class,[
                'required' => false,
            ])
            ->add('age',TextType::class,[
                'required' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Age is required.']),
                    new Assert\Positive(['message' => 'Age must be a positive number.']),

                ],
            ])
            ->add('hobby',ChoiceType::class,[
                'required' => false,
                'choices' => [
                    'Reading' => 'Reading',
                    'Writing' => 'Writing',
                    'Sleeping' => 'Sleeping',
                    'Speaking' => 'Speaking',
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('gender',ChoiceType::class,[
                'required' => false,
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Other' => 'Other',
                ],
                'placeholder' => 'Choose Gender',
            ])
            ->add('about',TextareaType::class,[
                'required' => false,
            ])
            ->add('salary',TextType::class,[
                'required' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Salary is required.']),
                    new Assert\Positive(['message' => 'Salary must be a positive number.']),
                ],
            ])
            ->add('role',TextType::class,[
                'required' => false,
            ])
            ->add('city',TextType::class,[
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
