<?php
/**
 * Created by PhpStorm.
 * User: pozyc
 * Date: 20.11.2015
 * Time: 10:29
 */

namespace Poznet\ArrayPaginatorBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;


class ArrayPaginator
{

    private $target;
    private $perpage=20;
    private $pages;
    private $count;
    private $page=0;
    private $param;
    private $request_stack;


    public function __construct(RequestStack $request_stack,$param=null){
        $this->request_stack=$request_stack;
        $this->param=$param;

            if(!empty($this->param[0]['perpage'] ))
                $this->perpage=$this->param[0]['perpage'] ;


    }

    public function paginate(Array $target ){

        $this->target=$target;
        $this->count=count($target);
        $this->pages=ceil($this->count/$this->perpage);
        $request=$this->request_stack->getCurrentRequest();
        $strona=$request->get('strona');

        if($strona){
            $this->page=$strona;
            $output=array_slice($this->target,(int)($this->page*$this->perpage),$this->perpage);
        }else{
            $output=array_slice($this->target,(int)($this->page*$this->perpage),$this->perpage);
        }


        return $output;

    }

    public function paginationForView(){
        $output='';
        $request=$this->request_stack->getCurrentRequest();

        for($i=0;$i<$this->pages;$i++){
            if($i==$request->get('strona')){
                $output .= '<span class="current">' . ($i + 1) . '</span>';
            }else {
                $link= $request->getBaseUrl() . $request->getPathInfo();
                if($i>0)
                     $link.= '?strona=' . $i ;

                $output .= '<span class="page"><a href="'.$link.'">' . ($i + 1) . '</a></span>';
            }
        }
        return $output;

    }
}

