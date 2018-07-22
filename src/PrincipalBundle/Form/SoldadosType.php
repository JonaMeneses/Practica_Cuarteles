<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use PrincipalBundle\Entity\Cuarteles;

class SoldadosType extends AbstractType
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

        ->add('paterno',TextType::class,array("label"=>"Paterno: ",
            "required"=>"required",
            "attr"=>array("class"=>"form-control")))

        ->add('materno',TextType::class,array("label"=>"Materno: ",
                    "required"=>"required",
                    "attr"=>array("class"=>"form-control")))

        ->add('graduacion',TextType::class,array("label"=>"Graduacion: ",
                    "required"=>"required",
                    "attr"=>array("class"=>"form-control")))

        ->add('fkcodigocuerpo',EntityType::class,array("label"=>"Cuerpo: ",
                    "required"=>"required",
                    "class"=>"PrincipalBundle:CuerposEjercito",
                    "attr"=>array("class"=>"form-control")))

        ->add('fknumcompania',EntityType::class,array("label"=>"Compañia: ",
                    "required"=>"required",
                    "class"=>"PrincipalBundle:Companias",
                    "attr"=>array("class"=>"form-control")))

        ->add('fkcodigocuartel',EntityType::class,array("label"=>"Cuartel: ",
                    "required"=>"required",
                    "class"=>"PrincipalBundle:Cuarteles",
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
            'data_class' => 'PrincipalBundle\Entity\Soldados'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_soldados';
    }


}
