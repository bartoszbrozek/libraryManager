<?php

// src/AppBundle/Form/TaskType.php

namespace AppBundle\Form;

use AppBundle\Entity\BookAuthor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookAuthorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('idAuthor', EntityType::class, array(
                    'class' => 'AppBundle:Author',
                    'choice_label' => 'name',
                    'label' => 'Author'
                ))
                ->add('idRole', EntityType::class, array(
                    'class' => 'AppBundle:Role',
                    'choice_label' => 'name',
                    'label' => 'Role'
                ))
                ->add('idBook', EntityType::class, array(
                    'class' => 'AppBundle:Book',
                    'choice_label' => 'idBook',
                ))
                ->add('submit', SubmitType::class, [
                    'label' => 'Finish',
                    'attr' => [
                        'class' => 'btn-primary'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => BookAuthor::class,
        ));
    }

}
