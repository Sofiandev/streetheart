<?php


class Category
{
    private $id_category;
    private $name;

    public function getIdCategory()
    {
      return $this->id_category;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}
