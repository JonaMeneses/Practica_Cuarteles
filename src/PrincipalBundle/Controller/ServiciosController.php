<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Servicios;
use PrincipalBundle\Form\ServiciosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class ServiciosController extends Controller
{
    
     private $session;

    public function __construct()
    {
        $this->session=new Session();
    }

    public function addServicioAction(Request $request)
    {
    	$CE= new Servicios();
    	$form=$this->createForm(ServiciosType::class,$CE);
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
    				$estatus="Servicio Agregado Correctamente";
    				$this->session->getFlashBag()->add("estatus",$estatus);
    				return $this->redirectToRoute("listadoServicio");
    			}else{
    				$estatus="Servicio no agregado";
    					$this->session->getFlashBag()->add("estatus",$estatus);

    			}
    		}
    	}

		return $this->render('PrincipalBundle:Servicios:addServicio.html.twig',
			array("form"=>$form->createView()));
    }

    public function listadoServiciosAction()
    {
    	$em=$this->getDoctrine()->getEntityManager();
    	$Servicios=$em->getRepository("PrincipalBundle:Servicios")->findAll();

     	return $this->render("PrincipalBundle:Servicios:listadoServicio.html.twig",
    		array("Servicios"=>$Servicios));
    }

    public function deleteServicioAction($id){
    	$em=$this->getDoctrine()->getEntityManager();
    	$Servicio=$em->getRepository("PrincipalBundle:Servicios")->find($id);
    	$em->remove($Servicio);
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

    	return $this->redirectToRoute("listadoServicio");
    }
    public function editServicioAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $servicio=$em->getRepository("PrincipalBundle:Servicios")->find($id);

        $form=$this->createForm(ServiciosType::class,$servicio);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getEntityMAnager();
                $servicio->setDescripcion($form->get("descripcion")->getData());
                $em->persist($servicio);
                $flush=$em->flush();

                if($flush==null)
                {
                    $estatus="Registro Editado Correctamente";
                    $this->session->getFlashBag()->add("estatus",$estatus);
                    return $this->redirectToRoute("listadoServicio");
                }else{
                    $estatus="Registro no se modifico";
                        $this->session->getFlashBag()->add("estatus",$estatus);

                }
            }
        }
return $this->render('PrincipalBundle:Servicios:editServicio.html.twig',
            array("form"=>$form->createView()));

    }
}