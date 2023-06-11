<?php

class Comment
{
    private $id_comment;
    private $content;
    private $datetime;
    private $id_user;
    private $id_post;


    public function getIdComment()
    {
        return $this->id_comment;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function setIdUser($id_user){
        $this->id_user = $id_user;
    }

    public function getIdPost(){
        return $this->id_post;
    }

    public function setIdPost($id_post){
        $this->id_post = $id_post;
    }
}
