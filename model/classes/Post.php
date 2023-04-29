<?php

class Post{

    private $id_post;
    private $title;
    private $content;
    private $picture;
    private $adress;
    private $datetime;

    

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
    
    public function setTitle($title){
        $this->title = $title;
    }

    public function getContent(){
        
    }
    

}