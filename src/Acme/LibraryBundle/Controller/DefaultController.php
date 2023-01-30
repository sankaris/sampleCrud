<?php

namespace Acme\LibraryBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller{
    public function indexAction($name){
        return $this->render('AcmeLibraryBundle:Default:index.html.twig', array('name' => $name));
    }
}
