<?php

class Post
{

    private $id_post;
    private $title;
    private $resume;
    private $content;
    private $picture;
    private $adress;
    private $datetime;
    private $id_user;


    // add all doc
    /**
     * Get the value of post identifier
     * @return int
     */
    public function getIdPost()
    {
        return $this->id_post;
    }

    /**
     * Get the value of title
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getResume()
    {
        return $this->resume;
    }
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPicture()
    {
        return $this->picture;
    }
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function  setIdUSer($id_user)
    {
        $this->id_user = $id_user;
    }
}
