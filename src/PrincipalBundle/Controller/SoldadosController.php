<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Soldados;
use PrincipalBundle\Form\SoldadosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class SoldadosController extends Controller
{
    
     private $session;

    public function __construct()
    {
        $this->session=new Session();
    }

    public function addSoldadoAction(Request $request)
    {
    	$CE= new Soldados(); 
    	$form=$this->createForm(SoldadosType::class,$CE);
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
    				$estatus="Soldado Agregado Correctamente";
    				$this->session->getFlashBag()->add("estatus",$estatus);
    				return $this->redirectToRoute("listadoSoldado");
    			}else{
    				$estatus="Soldado no agregado";
    					$this->session->getFlashBag()->add("estatus",$estatus);

    			}
    		}
    	}

		return $this->render('PrincipalBundle:Soldados:addSoldado.html.twig',
			array("form"=>$form->createView()));
    }

    public function listadoSoldadosAction()
    {
    	$em=$this->getDoctrine()->getEntityManager();
    	$soldados=$em->getRepository("PrincipalBundle:Soldados")->findAll();

     	return $this->render("PrincipalBundle:Soldados:listadoSoldado.html.twig",
    		array("Soldados"=>$soldados));
    }

    public function deleteSoldadoAction($id){
    	$em=$this->getDoctrine()->getEntityManager();
    	$Soldado=$em->getRepository("PrincipalBundle:Soldados")->find($id);
    	$em->remove($Soldado);
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

    	return $this->redirectToRoute("listadoSoldado");
    }
    public function editSoldadoAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $soldado=$em->getRepository("PrincipalBundle:Soldados")->find($id);

        $form=$this->createForm(SoldadosType::class,$soldado);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getEntityMAnager();
                $soldado->setNombre($form->get("nombre")->getData());
                $soldado->setPaterno($form->get("paterno")->getData());
                $soldado->setMaterno($form->get("materno")->getData());
                $soldado->setGraduacion($form->get("graduacion")->getData());
                $soldado->setFkcodigocuerpo($form->get("fkcodigocuerpo")->getData());
                $soldado->setFknumcompania($form->get("fknumcompania")->getData());
                $soldado->setFkcodigocuartel($form->get("fkcodigocuartel")->getData());

                $em->persist($soldado);
                $flush=$em->flush();

                if($flush==null)
                {
                    $estatus="Registro Editado Correctamente";
                    $this->session->getFlashBag()->add("estatus",$estatus);
                    return $this->redirectToRoute("listadoSoldado");
                }else{
                    $estatus="Registro no se modifico";
                        $this->session->getFlashBag()->add("estatus",$estatus);

                }
            }
        }
return $this->render('PrincipalBundle:Soldados:editSoldado.html.twig',
            array("form"=>$form->createView()));

    }
}