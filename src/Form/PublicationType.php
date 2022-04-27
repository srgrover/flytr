<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('text', TextType::class, [
//
//                'class' => 'pruebas',
//
//            ])

            ->add('text', TextType::class, [
                'label' => false,
                "required" => "required",
                "attr" => [
                    "class" => "input-feed-new",
                    "placeholder" => "Cuéntale al mundo lo que piensas... o no"
                ]
            ])

            /*->add('imagen')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
