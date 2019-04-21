<?php

namespace App\Library\Service;

class ApiService
{
    public function calculateRating($studios)
    {$res =[];
        foreach ($studios as $studio){

            // please read the readme to understnad why the mlz are added randomly
            $studio['mlz']=rand(1, 30);
            $rating = $this->getPointfrommlz($studio['mlz'])+$this->getPointfromtrainer($studio['trainer'])+$this->getPointfromshower($studio['shower']);
            $studio['rating']=$rating;
            $res []=$studio;
        }
        return $res;
    }


    public function getPointfromtrainer($trainer){
        switch ($trainer){
            case 'yes' : return 3 ;
            case 'no' : return 0 ;
            case  'onlyweekend' : return 1;
            default : return 0;
        }

    }
    public function getPointfrommlz($mlz){
        switch ($mlz){

            case 1 : return 4 ;
            case $mlz < 12 : return 1 ;
            case  $mlz>=24 : return 0;
            default : return 0;
        }
    }
    public function getPointfromshower($shower){
        switch ($shower){

            case 'true' : return 3 ;
            case 'false' : return 0 ;

            default : return 0;
        }
    }
}