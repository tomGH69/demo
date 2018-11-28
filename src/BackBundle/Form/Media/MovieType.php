<?php

namespace BackBundle\Form\Media;

use BackBundle\Entity\Person\Actor;
use BackBundle\Form\ImageType;
use BackBundle\Form\Person\ActorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class MovieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('length')
            ->add('title')
            ->add('description')
            ->add('year')
            ->add('image', ImageType::class)
            ->add('actor', EntityType::class,
                ['mapped'=>false, 'class'=>Actor::class])
            ->add('actors', CollectionType::class, [
                'entry_type' => ActorType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false])
            ->add('directors', Select2EntityType::class, [
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
                'placeholder' => 'Select a director']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Media\Movie',
            'validation_groups' => array('create'),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_media_movie';
    }


}
