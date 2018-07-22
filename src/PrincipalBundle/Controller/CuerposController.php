<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\CuerposEjercito;
use PrincipalBundle\Form\CuerposEjercitoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class CuerposController extends Controller
{
    
     private $session;

    public function __construct()
    {
        $this->session=new Session();
    }

    public function addCuerpoAction(Request $request)
    {
    	$CE= new CuerposEjercito();
    	$form=$this->createForm(CuerposEjercitoType::class,$CE);
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
    				$estatus="Cuerpo Agregado Correctamente";
    				$this->session->getFlashBag()->add("estatus",$estatus);
    				return $this->redirectToRoute("listadoCuerpo");
    			}else{
    				$estatus="Cuerpo no agregado";
    					$this->session->getFlashBag()->add("estatus",$estatus);

    			}
    		}
    	}

		return $this->render('PrincipalBundle:CuerpoEjercito:addCuerpo.html.twig',
			array("form"=>$form->createView()));
    }

    public function listadoCuerposAction()
    {
    	$em=$this->getDoctrine()->getEntityManager();
    	$Cuerpos=$em->getRepository("PrincipalBundle:CuerposEjercito")->findAll();

     	return $this->render("PrincipalBundle:CuerpoEjercito:listadoCuerpo.html.twig",
    		array("Cuerpos"=>$Cuerpos));
    }

    public function deleteCuerpoAction($id){
    	$em=$this->getDoctrine()->getEntityManager();
    	$Cuerpo=$em->getRepository("PrincipalBundle:CuerposEjercito")->find($id);
    	$em->remove($Cuerpo);
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

    	return $this->redirectToRoute("listadoCuerpo");
    }
    public function editCuerpoAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $cuerp=$em->getRepository("PrincipalBundle:CuerposEjercito")->find($id);

        $cuer=$this->createForm(CuerposEjercitoType::class,$cuerp);
        $cuer->handleRequest($request);

        if($cuer->isSubmitted())
        {
            if($cuer->isValid())
            {
                $em=$this->getDoctrine()->getEntityMAnager();
                $cuerp->setDenominacion($cuer->get("denominacion")->getData());
                $em->persist($cuerp);
                $flush=$em->flush();

                if($flush==null)
                {
                    $estatus="Cuerpo Editado Correctamente";
                    $this->session->getFlashBag()->add("estatus",$estatus);
                    return $this->redirectToRoute("listadoCuerpo");
                }else{
                    $estatus="Formato no se modifico";
                        $this->session->getFlashBag()->add("estatus",$estatus);

                }
            }
        }
return $this->render('PrincipalBundle:CuerpoEjercito:editCuerpo.html.twig',
            array("Cuerpos"=>$cuer->createView()));

    }
}