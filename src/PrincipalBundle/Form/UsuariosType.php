<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
        ->add('nombre',TextType::class,array("label"=>"nombre: ",
            "required"=>"required",
            "attr"=>array("class"=>"form-control")))
        ->add('email',EmailType::class,array("label"=>"Correo electronico: ",
            "required"=>"required",
            "attr"=>array("class"=>"form form-control")))
        ->add('password',PasswordType::class,array("label"=>"Contraseña: ",
            "required"=>"required",
            "attr"=>array("class"=>"form form-control")))
        ->add('Registrar',SubmitType::class,array("attr"=>array("class"=>"btn btn-primary")))
        
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\Usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'principalbundle_usuarios';
    }


}
