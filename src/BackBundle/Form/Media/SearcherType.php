<?php

namespace BackBundle\Form\Media;

use BackBundle\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class SearcherType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => false,
            ])
            ->add('actors', Select2EntityType::class, [
                'required' => false,
                'multiple' => true,
                'remote_route' => 'person_actor_autocomplete',
                'class' => 'BackBundle\Entity\Person\Actor',
                'primary_key' => 'id',
                'minimum_input_length' => 2,
                'page_limit' => 10,
                'allow_clear' => true,
                'delay' => 250,
                'cache' => false,
                'language' => 'en',
                'placeholder' => 'Select an actor'])
            ->add('directors', Select2EntityType::class, [
                'required' => false,
                'multiple' => true,
                'remote_route' => 'person_director_autocomplete',
                'class' => 'BackBundle\Entity\Person\Director',
                'primary_key' => 'id',
                'minimum_input_length' => 2,
                'page_limit' => 10,
                'allow_clear' => true,
                'delay' => 250,
                'cache' => false,
                'language' => 'en',
                'placeholder' => 'Select a director'])
            ->add('search', SubmitType::class);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Media::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_media_searcher';
    }


}
