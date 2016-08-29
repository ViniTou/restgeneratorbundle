<?php


namespace Voryx\RESTGeneratorBundle\Form\Type;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Voryx\RESTGeneratorBundle\Form\DataTransformer\ArrayToIdTransformer;


/**
 * Class VoryxEntityType
 * @package Voryx\RESTGeneratorBundle\Form\Type
 */
class VoryxEntityType extends EntityType
{
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $viewTransformer = new ArrayToIdTransformer($this->registry->getManager(), null);
//        $builder->addViewTransformer($viewTransformer);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'invalid_message' => 'The selected entity does not exist',
            )
        );
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return EntityType::class;
    }
}
