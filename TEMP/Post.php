<?php

/**
 * Post är en klass som beskriver blogginlägg
 */
class Post
{
    /**
     * Instansvariabler
     */
    private $author;
    private $title;
    private $image;
    private $text;

    /**
     * En konstruktor
     */
    public function __construct($author, $title, $image)
    {
        $this->author = $author;
        $this->title  = $title;
        $this->image  = $image;
        $this->text   = $this->getText();
    }

    /**
     * En instansmetod som konverterar ett objekt till en array
     */
    public function toArray()
    {
        $array = array(
            "author" => $this->author,
            "title"  => $this->title,
            "image"  => $this->image,
            "text"   => $this->text
        );

        return $array;
    }

    /**
     * En instansmetod som hämtar text från https://loripsum.net/
     */
    public function getText()
    {
        // OBS! loripsum har dålig prestanda
        // return "<p>lorem ipsum dolor sit amet, consectet</p>";
        $endpoint = "https://loripsum.net/api/2/short/headers";
        return file_get_contents($endpoint);
    }
}