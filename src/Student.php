<?php


class Student
{
protected $id;
protected $name;
protected $age;
protected $address;
public function __construct($name,$age,$address)
{
    $this->name=$name;
    $this->age=$age;
    $this->address=$address;
}

    /**
     * @param mixed $id
     */
    public function setId($id)
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
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}