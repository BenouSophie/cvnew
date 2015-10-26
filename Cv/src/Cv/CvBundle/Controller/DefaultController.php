<?php

namespace Cv\CvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CvCvBundle:Default:index.html.twig', array('name' => $name));
    }
}
