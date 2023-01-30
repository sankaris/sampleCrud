<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
//use Propel\PropelBundle\PropelBundle;
//use AppBundle\Model\Author;

$projectPath = realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../../..' );//echo $projectPath;die;
$modelPath = $projectPath . "/build/classes";
$schemaName = 'bookstore';


// Include the main Propel script
//require_once $projectPath;
//require_once $projectPath . '/lib/propel-1.5/runtime/lib/Propel.php';
require_once $projectPath .'/vendor/propel/propel1/runtime/lib/Propel.php';


// Initialize Propel with the runtime configuration
//Propel::init("'.$projectPath.'/build/conf/sampleCrud-conf.php");

// Add the generated 'classes' directory to the include path
//set_include_path("'.$projectPath.'/build/classes/'" . PATH_SEPARATOR . get_include_path());
set_include_path("'.$modelPath.'" . PATH_SEPARATOR . get_include_path());
//require_once $modelPath . "/bookstore/AuthorPeer.php";
//require_once $modelPath . "/bookstore/Author.php";

class HelloController extends Controller
{
    /**
     * @Route("msg",name="hello")
     */
    public function helloAction()
    {
        return new Response('Hello world!');
    }

    /**
     * @Route("index",name="index")
     */
   /* public function indexAction()
    {
        $author = new \Acme\LibraryBundle\Model\Author();
        $author->setFirstName('Jane');
        $author->setLastName('Austen');
        $author->save();
        $name = $author->getFirstName();
        return $this->render('AppBundle:sample:index.html.twig', array(
            'name' => $name, 'author' => $author)
        );
    }*/
}