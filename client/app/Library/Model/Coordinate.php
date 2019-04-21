<?php
namespace App\Library\Model;

class Coordinate
{
    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong($long): void
    {
        $this->long = $long;
    }

    /**
     * @return mixed
     */
    public function getLati()
    {
        return $this->lati;
    }

    /**
     * @param mixed $lati
     */
    public function setLati($lati): void
    {
        $this->lati = $lati;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius): void
    {
        $this->radius = $radius;
    }
 protected $long;
 protected $lati;
 protected $radius;
}