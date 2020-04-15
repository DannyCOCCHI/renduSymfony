<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Titre de l\'article'
                )
            ])
            ->add('accroche', TextType::class, [
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Accroche de l\'article'
                )
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de l\'article',
                'required' => false
            ])
            ->add('contenu', CKEditorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
