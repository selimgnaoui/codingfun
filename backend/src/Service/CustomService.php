<?php


namespace App\Service;

use App\Entity\Coordinate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CustomService
{


    protected $mongohost;
    protected $username;
    protected $password;
    protected $database;

    public function __construct($mongohost,$username,$password,$database)
    {
     $this->mongohost=$mongohost;
     $this->username=$username;
     $this->password=$password;
     $this->database=$database;
    }


    public function connectTohost(){

return  new \MongoDB\Client('mongodb://'.$this->username.':'.$this->password.$this->mongohost.$this->database.'', array("authMechanism" => "SCRAM-SHA-1") );
    }


    public function fetchStudios($city,$minprice,$maxprice,$opened,$trainer){

$result = [];
$db = $this->connectTohost()->studios;
$collection = $db->studio;
$options = ['sort' => ['price' => 1]];

$condition = ($this->setMongoQuery($city,$minprice,$maxprice,$opened,$trainer));

$cursor = $collection->find($condition,$options);

foreach ($cursor as $item){
$result []=($item);
}
return $result;
    }

    public function setMongoQuery($city,$minprice=0,$maxprice=0,$opened=null,$trainer=null,$longitutde=null,$latitude=null){


        $filter=[];

        if ($city){
            $filter['city']= $city;
        }
        if ($opened) {
            $filter['openedalways']= true;
        }
        if ($trainer){
            $filter['trainer']= $trainer;
        }
        if ($minprice && $maxprice){
            $filter['price'] = array('$gt' => (int)$minprice, '$lt' => (int)$maxprice);
        }
        if ($minprice && !$maxprice){
            $filter['price'] = array('$gt' => (int)$minprice);
        }
        if ($maxprice && !$minprice){
            $filter['price'] = array('$lt' => (int)$maxprice);
        }
        if ($longitutde && $latitude){



          //  $filter['location']= array('$geoWithin' => array('$centerSphere' => (int)$maxprice));

        }



        return $filter;
    }


    public  function execute(Coordinate $coordinate){

        $radiusOfEarth = 3956; //avg radius of earth in miles
        $result = [];
        $db = $this->connectTohost()->studios;
        $collection = $db->studio;
        $query = array('location' =>
            array('$within' =>
                array('$centerSphere' =>
                    array(
                        array(floatval($coordinate->getLong()), floatval($coordinate->getLat())), floatval($coordinate->getRadius())/$radiusOfEarth
                    )
                )
            )
        );

        $cursor = $collection->find($query);
        foreach ($cursor as $item){
            $result []=($item);
        }
        return $result;

}

}