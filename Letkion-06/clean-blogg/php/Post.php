<?php

/*************************************
 * 
 * En klass som beskriver blogginlägg
 * 
 */

class Post
{

    /**
     * Instansvariabler (ej static)
     */
    private $id;
    private $title;
    private $image;
    private $author;
    private $text;

    /**
     * En konstruktor (skapar ett objekt)
     */
    public function __construct($id, $author, $title, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->author = $author;
        $this->text = $this->getText();
    }

    /**
     * En instansmetod som genererar texter
     */
    public function getText()
    {
        // return "Lorem ipsum dolor sit amet, consectetur adipiscing elit";

        $endpoint = "https://loripsum.net/api/2/short/headers";
        return file_get_contents($endpoint);
    }

    /**
     * En instansmetod som skapar konverterar objekt till array
     */
    public function toArray()
    {
        $array = array(
            "id" => $this->id,
            "title" => $this->title,
            "image" => $this->image,
            "author" => $this->author,
            "text" => $this->text
        );

        return $array;
    }
}
