<?php

// src/AppBundle/Form/TaskType.php

namespace AppBundle\Form;

use AppBundle\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', TextType::class)
                ->add('date', DateType::class)
                ->add('description', TextareaType::class)
                ->add('isbn', TextType::class)
                ->add('publishingHouse', TextType::class)
                ->add('originalTitle', TextType::class)
                ->add('submit', SubmitType::class, [
                    'label' => 'Next',
                    'attr' => [
                        'class' => 'btn-primary'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Book::class,
        ));
    }

}
