<?php

session_start();

require_once 'Post.php';

class App
{
    public static function main()
    {
        self::getMemes();
        $posts = self::getPosts(2);
        self::viewPosts($posts);
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
     * Klassmetoden getPosts skapar en array som innehåller 10 inlägg
     * OBS! Varje inlägg är en array
     */
    public static function getPosts($count)
    {
       // print_r($_SESSION);
        $posts = array();

        for ($index = 0; $index < $count; $index++) {
            $postObject = new Post(
                "Mahmud Al Hakim", 
                $_SESSION['memes'][$index]['name'],
                $_SESSION['memes'][$index]['url']
            );
            $postArray = $postObject->toArray();
            array_push($posts, $postArray);
        }

        return $posts;
    }

    /**
     * Klassmetoden viewPosts skapar en mall (HTML-template)
     * och skickar mallen till klienten (webbläsare)
     */
    public static function viewPosts($posts)
    {
        $template = "";

        foreach ($posts as $post) {
            $template .= "
            <div class='post-preview'>
                <h2 class='post-title'>$post[title]</h2>
                <img src='$post[image]' alt='$post[title]' class='img-fluid'>
                <div class='post-subtitle'>$post[text]</div>
                <p class='post-meta'>Posted by $post[author]</p>
            </div>
            <hr>";
        }

        echo $template;
    }
}


App::main();
