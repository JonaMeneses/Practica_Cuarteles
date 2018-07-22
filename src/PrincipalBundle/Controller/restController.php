<?php

namespace PrincipalBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrincipalBundle\Entity\Cuarteles;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class restController extends FOSRestController
{
    
    

  
    public function getCuartelAction(){
      $cuarteles = $this->getDoctrine()->getRepository("PrincipalBundle:Cuarteles")
            ->findAll();
       /* $arreglojson=(array('Cuarteles'=>array($cuarteles->getNombre)));
        return new JsonResponse($rreglojson);
*/

$serializer = $this->container->get('serializer');
$reports = $serializer->serialize(array("Cuarteles"=>$cuarteles), 'json');

return new Response($reports);

    }

  

    

    
}