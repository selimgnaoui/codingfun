<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{

    protected  $id;
    protected $name;
    protected $trainer;
    protected $weopened;
    protected $city;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTrainer()
    {
        return $this->trainer;
    }

    /**
     * @param mixed $trainer
     */
    public function setTrainer($trainer): void
    {
        $this->trainer = $trainer;
    }

    /**
     * @return mixed
     */
    public function getWeopened()
    {
        return $this->weopened;
    }

    /**
     * @param mixed $weopened
     */
    public function setWeopened($weopened): void
    {
        $this->weopened = $weopened;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }


}
