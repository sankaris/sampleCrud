<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$projectPath = realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../../..' );
/*$loader->registerNamespaces(array(
    // ...
    //'Propel' => __DIR__.'/../vendor/bundles',
    'Propel' => $projectPath .'/vendor/propel'
));
$loader->registerPrefixes(array(
    // ...
    'Phing'  => $projectPath .'/../vendor/phing/phing/classes/phing',
));*/

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
