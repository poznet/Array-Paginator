# Array-Paginator
Simple Array Pagginator Bundle for  Symfony 2

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b1a607d6-a0e7-4979-b093-69876a34a237/big.png)](https://insight.sensiolabs.com/projects/b1a607d6-a0e7-4979-b093-69876a34a237)

As long as you paginate query elements ( using for example [KNP Paginator Bundle](https://github.com/KnpLabs/KnpPaginatorBundle) ) there is no problem, but sometimes there is a need  to paginate array elements in view. 

I got problem with implementation KNPPaginatorBundle to paginate elements of array , so i created  this. 

###Installation
Simple : 
`composer require poznet/arraypaginator`

###Usage

in parameters define how much element's you want to show on eah page : 
```
parameters:
    poznet_array_paginator:
      - perpage: 9
```

in Controller
```
$tab=array();
$pagination=$this->get('poznet.array.paginator')->paginate($tab);

return array('pagination'=>$pagination);
```        

in View
- render array elements as normally ( foreach ) 
- in place where you want to have pagination add twig function 
 `{{ pagination()  }} `
 

### TODO
in future : 
- some better routing (cofigured by parameters)
- using views togenerate pagination 

### Licence 
This Bundle is licensed under the MIT License. Feel free to contribute.
