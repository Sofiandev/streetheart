<?php

class User
{

    private $id_user;
    private $name;
    private $pseudo;
    private $mail;
    private $age;
    private $password;


    //Getters & Setters
    public function getIdUser()
    {
        return  $this->id_user;
    }

    public function getName()
    {
        return  $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPseudo()
    {
        return  $this->pseudo;
    }
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getMail()
    {
        return  $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getPassword()
    {
        return  $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
