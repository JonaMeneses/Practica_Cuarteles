<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrincipalController extends Controller
{
    
    public function PrincipalindexAction()
    {
    	return $this->render('PrincipalBundle:Principal:index.html.twig');
    }
    
}
