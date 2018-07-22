<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CuartelesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre',TextType::class,array("label"=>"Nombre: ",
            "required"=>"required",
            "attr"=>array("class"=>"form-control")))
        ->add('ubicacion',TextareaType::class,array("label"=>"Ubicacion: ",
            "required"=>"required",
            "attr"=>array("class"=>"form-control")))
        ->add('Guardar',SubmitType::class,array("attr"=>array("class"=>"btn btn-success")))
       ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Cuarteles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_cuarteles';
    }


}
