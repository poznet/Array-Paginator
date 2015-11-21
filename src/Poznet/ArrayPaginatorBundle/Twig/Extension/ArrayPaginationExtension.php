<?php
/**
 * Created by PhpStorm.
 * User: pozyc
 * Date: 20.11.2015
 * Time: 10:56
 */

namespace Poznet\ArrayPaginatorBundle\Twig\Extension;

use Poznet\ArrayPaginatorBundle\Services\ArrayPaginator as Paginator;


class ArrayPaginationExtension extends \Twig_Extension
{
    private $paginator;

    public function __construct(Paginator $paginator){
        $this->paginator=$paginator;
    }


    public function getFunctions()
    {
        return array(
            'pagination' =>new \Twig_Function_Method($this, 'getPaginaation',array('is_safe' => array('html'))),
        );
    }



    public function getPaginaation(){
        return $this->paginator->paginationForView();
    }
    public function getName()
    {
        return 'array.pagginatortwig.extension';
    }
}

