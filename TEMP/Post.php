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
    public function __construct($author, $index)
    {
        $this->author = $author;
        $this->title  = $this->getTitle($index);
        $this->image  = $this->getImage($index);
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
     * En instansmetod som hämtar en bild (bildens URL)
     */
    public function getImage($index)
    {
        // return "https://picsum.photos/800/300";
        $meme = $_SESSION['memes'][$index];
        $url = $meme['url'];
        return $url;
    }

    /**
     * En instansmetod som hämtar titel 
     */
    public function getTitle($index)
    {
        $meme = $_SESSION['memes'][$index];
        return $meme['name'];
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
