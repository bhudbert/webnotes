<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Notes;
use App\Entity\Technology;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,['label'=> 'Nom' ])
            ->add('content',CKEditorType::class,
                     [
                         'config' => array('toolbar' => 'standard'),
                         'label' => 'Description',
                         'attr' => ['class' => 'tinymce'],
                    ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Categorie'
            ])
            ->add('technology', EntityType::class, [
                'class' => Technology::class,
                'choice_label' => 'name',
                'label' => 'Tecnologie'
            ])
            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
            ->add('saveAndQuit', SubmitType::class, ['label' => 'Sauvegarder et Quitter'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Notes::class,
        ]);
    }
}
