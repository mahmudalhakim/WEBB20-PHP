<?php

session_start();

require_once 'php/Post.php';

class App
{
    public static function main()
    {
        self::getMemes();
        $array = self::getData();
        self::viewData($array);
    }

    /**
     * En klassmetod som hämtar titlar (name) och bilder från 
     * https://imgflip.com/api
     */
    public static function getMemes()
    {
        if (!isset($_SESSION['memes'])) {
            $endpoint = "https://api.imgflip.com/get_memes";
            $json = file_get_contents($endpoint);
            $array = json_decode($json, true);
            $_SESSION['memes'] = $array['data']['memes'];
            echo "<h1>Session created!<h1>";
        }
    }

    /**
     * Klassmetoden getData skapar en array som innehåller 10 inlägg
     * OBS! Varje inlägg är en array
     */
    public static function getData()
    {
        $bloggPosts = array();

        for ($index = 0; $index < 10; $index++) {
            $postObject = new Post("Mahmud Al Hakim", $index);
            $postArray = $postObject->toArray();
            array_push($bloggPosts, $postArray);
        }

        return $bloggPosts;
    }

    /**
     * Klassmetoden viewData skapar en mall (HTML-template)
     * och skickar mallen till klienten (webbläsare)
     */
    public static function viewData($array)
    {
        $template = "";

        foreach ($array as $postArray) {
            $template .= "
            <div class='post-preview'>
                <h2 class='post-title'>$postArray[title]</h2>
                <img src='$postArray[image]' alt='$postArray[title]' class='img-fluid'>
                <div class='post-subtitle'>$postArray[text]</div>
                <p class='post-meta'>Posted by $postArray[author]</p>
            </div>
            <hr>";
        }

        echo $template;
    }
}
