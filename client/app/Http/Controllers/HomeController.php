<?php

namespace App\Http\Controllers;
use App\Library\Model\Coordinate;
use GuzzleHttp\Client;
use App\Studio;
use Illuminate\Http\Request;
use App\Library\Service;
class HomeController extends Controller
{
    public function showWelcomepage (){

        $studio = new Studio();
        return view('welcome',['studio' => $studio ]);
    }

    public  function submitform(Request $request,Service\ApiService $customServiceInstance){

        $minprice=($request->minprice !=null) ? $request->minprice  : 0;
        $maxprice=($request->maxprice !=null) ? $request->maxprice  : 0;
        $city=strtolower($request->city);
        $trainer = $request->trainer;
        $opened=$request->openedalways;

        $res=app('App\Classes\Crudfunction')->fetchApi($city,$opened,$trainer,$minprice,$maxprice);

        $arr =$customServiceInstance->calculateRating(json_decode($res->getBody()->getContents(), true));

        return view('studioslist',['studios' => $arr ]);

    }


    public function displayAll(Service\ApiService $customServiceInstance){

        $res=app('App\Classes\Crudfunction')->fetchAll();

        $arr =$customServiceInstance->calculateRating(json_decode($res->getBody()->getContents(), true));

        return view('studioslist',['studios' => $arr ]);
    }

    public function radiussearch(Request $request,Service\ApiService $customServiceInstance){
           $coordinate=new Coordinate();
        if($request->method()=='POST'){

            $coordinate->setLong($request->longitutde);
            $coordinate->setLati($request->latitude);
            $coordinate->setRadius($request->radius);

            $res=app('App\Classes\Crudfunction')->fetchbyRadius($coordinate);

            $arr =$customServiceInstance->calculateRating(json_decode($res->getBody()->getContents(), true));

            return view('studioslist',['studios' => $arr ]);


        }



       return view('umkreissuche');
}
}