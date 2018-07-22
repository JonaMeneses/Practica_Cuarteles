<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Usuarios;
use PrincipalBundle\Form\UsuariosType;
use Symfony\Component\HttpFoundation\Request;


class UsuariosController extends Controller
{


    public function loginAction()
    {
    	$authenticationUtils=$this->get("security.authentication_utils");
		$error=$authenticationUtils->getLastAuthenticationError();
		$lastUsername=$authenticationUtils->getLastUsername();

		$u=$this->getUser();

		if($u !=null)
		{
			$role=$u->getRole();
			if($role=="ROLE_ADMIN")
			{
                return $this->render('PrincipalBundle:Principal:index.html.twig',array("Usuario"=>$u->getRole()));
            }else{
                return $this->render('PrincipalBundle:Usuarios:index.html.twig',array("Usuario"=>$u->getRole()));
            }
         
		}

		return $this->render('PrincipalBundle:Usuarios:login.html.twig');
    }

    public function registroAction(Request $request)
    {
    	$user=new Usuarios();
    	$form=$this->createForm(UsuariosType::class,$user);
    	$form->handleRequest($request);
    	if($form->isSubmitted())
    	{
    		if($form->isValid())
    		{
    			$em=$this->getDoctrine()->getEntityManager();
    			$query=$em->createQuery("Select u From PrincipalBundle:Usuarios u Where u.email=:email")->setParameter("email",$form->get("email")->getData());
    			$resultado=$query->getResult();
    			if(count($resultado)==0)
    			{
    				$user->setRole("ROLE_USER");
    				$factory=$this->get("security.encoder_factory");
    				$encoder=$factory->getEncoder($user);
    				$p=$encoder->encodePassword($form->get("password")->getData(),$user->getSalt());
    				$user->setPassword($p);
    				$em->persist($user);
    				$flush=$em->flush();
    				if($flush==null)
    				{
    					$status="Se registro exitosamente";
    					return $this->render("PrincipalBundle:Usuarios:login.html.twig");

    				}else{
    					$status="No se registro correctamente";
    				}

    			}else{
    				$status="El usuario ya existe";
    			}
    		}else{
    			$status="Registro invalido";
    		}
    	}

    	return $this->render("PrincipalBundle:Usuarios:adduser.html.twig",
    		array("form"=>$form->createView()));
    }
    
}