<?php

require_once './model/classes/Post.php';

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{


    public function testGetAndSetTitle()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir un titre
        $title = 'Mon super titre';
        $post->setTitle($title);

        // Vérifier si le titre est correctement récupéré
        $this->assertEquals($title, $post->getTitle());
    }

    public function testGetAndSetResume()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir un résumé
        $resume = 'Ceci est un résumé';
        $post->setResume($resume);

        // Vérifier si le résumé est correctement récupéré
        $this->assertEquals($resume, $post->getResume());
    }

    public function testGetAndSetContent()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir un contenu
        $content = 'Ceci est le contenu du post';
        $post->setContent($content);

        // Vérifier si le contenu est correctement récupéré
        $this->assertEquals($content, $post->getContent());
    }

    public function testGetAndSetPicture()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir une image
        $picture = 'image.jpg';
        $post->setPicture($picture);

        // Vérifier si l'image est correctement récupérée
        $this->assertEquals($picture, $post->getPicture());
    }

    public function testGetAndSetAdress()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir une adresse
        $adress = '123 Rue du Post';
        $post->setAdress($adress);

        // Vérifier si l'adresse est correctement récupérée
        $this->assertEquals($adress, $post->getAdress());
    }

    public function testGetAndSetDatetime()
    {
        // Créer une instance de la classe Post
        $post = new Post();

        // Définir une date et heure
        $datetime = '2023-06-08 12:34:56';
        $post->setDatetime($datetime);

        // Vérifier si la date et heure sont correctement récupérées
        $this->assertEquals($datetime, $post->getDatetime());
    }
}
