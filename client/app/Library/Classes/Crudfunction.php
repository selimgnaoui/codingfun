<?php

namespace App\Library\Classes;

use App\Library\Model\Coordinate;
use GuzzleHttp\Client;

class Crudfunction
{
  protected $endpoint;
  protected $client;
  protected $radiusseach;
  public function __construct($endpoint,Client $client,$radiusseach)
  {
   $this->endpoint=$endpoint;
   $this->client=$client;
   $this->radiusseach=$radiusseach;
  }


  public function fetchApi($city=null,$opened=null,$trainer=null,$minprice=null,$maxprice=null,$method='GET'){

     return  $res = $this->client->request($method, $this->endpoint.'/'.$city.'/'.$opened.'/'.$trainer.'/'.$minprice.'/'.$maxprice);
  }

    public function fetchAll($method='GET'){
        return $res = $this->client->request($method, $this->endpoint);
    }

    public function fetchbyRadius(Coordinate $coordinate,$method='GET'){
        return $res = $this->client->request($method, $this->radiusseach.'/'.$coordinate->getLong().'/'.$coordinate->getLati().'/'.$coordinate->getRadius());
    }
}