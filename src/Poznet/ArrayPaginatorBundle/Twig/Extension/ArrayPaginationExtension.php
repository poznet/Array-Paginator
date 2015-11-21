<?php
/**
 * Created by PhpStorm.
 * User: pozyc
 * Date: 20.11.2015
 * Time: 10:56
 */

namespace Poznet\ArrayPaginatorBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;


class ArrayPaginationExtension extends \Twig_Extension
{
    private $container;

    public function __construct(ContainerInterface $container){
        $this->container=$container;
    }


    public function getFunctions()
    {
        return array(
            'pagination' =>new \Twig_Function_Method($this, 'getPaginaation',array('is_safe' => array('html'))),
        );
    }



    public function getPaginaation(){
        return $this->container->get('poznet.array.paginator')->paginationForView();
    }
    public function getName()
    {
        return 'array.pagginatortwig.extension';
    }
}

