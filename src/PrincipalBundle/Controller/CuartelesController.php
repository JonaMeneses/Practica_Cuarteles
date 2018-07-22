<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Cuarteles;
use PrincipalBundle\Form\CuartelesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CuartelesController extends Controller
{
    
     private $session;

    public function __construct()
    {
        $this->session=new Session();
    }

    public function addCuartelAction(Request $request)
    {
    	$CE= new Cuarteles();
    	$form=$this->createForm(CuartelesType::class,$CE);
    	$form->handleRequest($request);

    	if($form->isSubmitted())
    	{
    		if($form->isValid())
    		{
    			$em=$this->getDoctrine()->getEntityMAnager();
    			$em->persist($CE);
    			$flush=$em->flush();

    			if($flush==null)
    			{
    				$estatus="Cuartel Agregado Correctamente";
    				$this->session->getFlashBag()->add("estatus",$estatus);
    				return $this->redirectToRoute("listadoCuartel");
    			}else{
    				$estatus="Cuartel no agregado";
    					$this->session->getFlashBag()->add("estatus",$estatus);

    			}
    		}
    	}

		return $this->render('PrincipalBundle:Cuarteles:addCuartel.html.twig',
			array("form"=>$form->createView()));
    }

    public function listadoCuartelesAction()
    {
    	$em=$this->getDoctrine()->getEntityManager();
    	$Cuarteles=$em->getRepository("PrincipalBundle:Cuarteles")->findAll();

     	return $this->render("PrincipalBundle:Cuarteles:listadoCuartel.html.twig",
    		array("Cuarteles"=>$Cuarteles));
    }

    public function deleteCuartelAction($id){
    	$em=$this->getDoctrine()->getEntityManager();
    	$Cuartel=$em->getRepository("PrincipalBundle:Cuarteles")->find($id);
    	$em->remove($Cuartel);
    	$flush=$em->flush();

    	if($flush==null)
    	{
    		$estatus="registro eliminado con exito";

    	}
    	else
    	{
    		$estatus="El registro no de elimino";
    	}

    	$this->session->getFlashBag()->add("estatus",$estatus);

    	return $this->redirectToRoute("listadoCuartel");
    }
    public function editCuartelAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $cuartel=$em->getRepository("PrincipalBundle:Cuarteles")->find($id);

        $form=$this->createForm(CuartelesType::class,$cuartel);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getEntityMAnager();
                $cuartel->setNombre($form->get("nombre")->getData());
                $cuartel->setUbicacion($form->get("ubicacion")->getData());
                $em->persist($cuartel);
                $flush=$em->flush();

                if($flush==null)
                {
                    $estatus="Registro Editado Correctamente";
                    $this->session->getFlashBag()->add("estatus",$estatus);
                    return $this->redirectToRoute("listadoCuartel");
                }else{
                    $estatus="Registro no se modifico";
                        $this->session->getFlashBag()->add("estatus",$estatus);

                }
            }
        }
return $this->render('PrincipalBundle:Cuarteles:editCuartel.html.twig',
            array("form"=>$form->createView()));

    }
}