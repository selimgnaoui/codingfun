<?php

// src/Controller/LuckyController.php
namespace App\Controller;
use App\Entity\Coordinate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\CustomService;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class MainController extends  Controller
{

    /**
     * @Route("/search/{city}/{opened}/{trainer}/{minprice}/{maxprice}", defaults={"city"=null,"maxprice"=null,"minprice"=null,"opened"=null,"trainer"=null})
         */
    public function fetchEntries($city,$minprice=null,$maxprice=null,$opened=null,$trainer=null)
    {




        $customservice= $this->get('customservice');

        $result = ($customservice->fetchStudios($city,$minprice,$maxprice,$opened,$trainer));

        return new JsonResponse($result);

    }
    /**
     * @Route("/searchlocation/{long}/{lati}/{radius}")
     */
    public function seachRadius($long=0,$lati=0,$radius=0){
        $coordinate=new Coordinate();
        $coordinate->setLat($lati);
        $coordinate->setLong($long);
        $coordinate->setRadius($radius);
        $customservice= $this->get('customservice');
        $result = $customservice->execute($coordinate);
        return new JsonResponse($result);
    }
}