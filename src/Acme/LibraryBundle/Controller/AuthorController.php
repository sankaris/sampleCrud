<?php

namespace Acme\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Propel\PropelBundle\PropelBundle;

use Acme\LibraryBundle\Model\Author;
use Acme\LibraryBundle\Model\AuthorQuery;

class AuthorController extends Controller{

    /**
     * @Route("msg",name="message")
     */
    public function helloAction()
    {
        return new Response('Hello world! New Bundle');
    }


    /**
     * @Route("author/create",name="new")
     */
    public function indexAction()
    {
        $author = new Author();
        $author->setFirstName('Robert');
        $author->setLastName('Austen');
        $author->save();
        $name = $author->getFirstName();
        return $this->render('AcmeLibraryBundle:Default:index.html.twig', array(
            'name' => $name, 'author' => $author)
        );
    }

    /**
     * @Route("author/{id}",name="show")
     */
    public function showAction($id){
        $author = AuthorQuery::create()->findPk($id);
        if(!$author){
            throw $this->createNotFoundException("No Author Found for id ".$id);
        }
        return $this->render('AcmeLibraryBundle:Default:show.html.twig',array(
            'author'=>$author)
        );
    }

    /**
     * @Route("author/edit/{id}",name="update")
     */
    public function updateAction($id){
        $author = AuthorQuery::create()->findPk($id);
        if(!$author){
            throw $this->createNotFoundException("No Author Found for id ".$id);
        }
        $author->setLastName("Johnson");
        $author->save();
        return $this->render('AcmeLibraryBundle:Default:show.html.twig',array(
            'author'=>$author)
        );
    }

    /**
     * @Route("author/delete/{id}",name="delete")
     */
    public function deleteAction($id){
        $author = AuthorQuery::create()->findPk($id);
        if(!$author){
            throw $this->createNotFoundException("No Author Found for id ".$id);
        }
        $author->delete();
        listAction();
    }

    /**
     * @Route("list",name="showAll")
     */
    public function listAction(){
        $authors = AuthorQuery::create()->find();
        if(!$authors){
            throw $this->createNotFoundException("No Author Found");
        }
        return $this->render('AcmeLibraryBundle:Default:list.html.twig',array(
            'author' => $authors)
        );
    }
}