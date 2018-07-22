<?php

namespace PrincipalBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Companias;
use PrincipalBundle\Form\CompaniasType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class CompaniasController extends Controller
{
    
     private $session;

    public function __construct()
    {
        $this->session=new Session();
    }

    public function addCompaniaAction(Request $request)
    {
    	$CE= new Companias();
    	$form=$this->createForm(CompaniasType::class,$CE);
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
    				$estatus="Compañia Agregado Correctamente";
    				$this->session->getFlashBag()->add("estatus",$estatus);
    				return $this->redirectToRoute("listadoCompania");
    			}else{
    				$estatus="Compania no agregado";
    					$this->session->getFlashBag()->add("estatus",$estatus);

    			}
    		}
    	}

		return $this->render('PrincipalBundle:Companias:addCompania.html.twig',
			array("form"=>$form->createView()));
    }

    public function listadoCompaniasAction()
    {
    	$em=$this->getDoctrine()->getEntityManager();
    	$Companias=$em->getRepository("PrincipalBundle:Companias")->findAll();

     	return $this->render("PrincipalBundle:Companias:listadoCompania.html.twig",
    		array("Companias"=>$Companias));
    }

    public function deleteCompaniaAction($id){
    	$em=$this->getDoctrine()->getEntityManager();
    	$Compania=$em->getRepository("PrincipalBundle:Companias")->find($id);
    	$em->remove($Compania);
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

    	return $this->redirectToRoute("listadoCompania");
    }
    public function editCompaniaAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $compania=$em->getRepository("PrincipalBundle:Companias")->find($id);

        $form=$this->createForm(CompaniasType::class,$compania);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getEntityMAnager();
                $compania->setActividad($form->get("actividad")->getData());
                $em->persist($compania);
                $flush=$em->flush();

                if($flush==null)
                {
                    $estatus="Compañia Editada Correctamente";
                    $this->session->getFlashBag()->add("estatus",$estatus);
                    return $this->redirectToRoute("listadoCompania");
                }else{
                    $estatus="Compañia no se modifico";
                        $this->session->getFlashBag()->add("estatus",$estatus);

                }
            }
        }
return $this->render('PrincipalBundle:Companias:editCompania.html.twig',
            array("form"=>$form->createView()));

    }
}