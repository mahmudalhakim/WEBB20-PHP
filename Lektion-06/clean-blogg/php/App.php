<?php

session_start();

require_once 'php/Post.php';

/*
// Skapa flera olika instanser (objekt) av klassen Post
$p1 = new Post(1, "Mahmud", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");
$p2 = new Post(2, "Kalle", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");

// Skriv ut info om ett objekt
var_dump( $p1 );

// Skriv ut objektet som array
print_r($p1->toArray());
*/

class App
{

    /******************
     * The Main Method
     */
    public static function main()
    {

        self::getMemes();
        //print_r($_SESSION);

        $posts = self::getPosts(10);

        self::renderPosts($posts);

    }

    /*****
     * En klassmetod som hämtar alla memes
     */
    public static function getMemes()
    {
        if(!isset($_SESSION['my_memes'])){
            $endpoint = "https://api.imgflip.com/get_memes";
            $json = file_get_contents($endpoint);
            $array = json_decode($json, true);
            $_SESSION['my_memes'] = $array['data']['memes'];
        }
    }

    /****
     * En klassmetod som genererar blogginlägg
     */
    public static function getPosts($count){
        $posts = array();

        for ($i=0; $i < $count; $i++) { 
            
            $random = rand(0, count( $_SESSION['my_memes']) - 1);

            $post = new Post(
                $i,
                "Mahmud Al Hakim",
                $_SESSION['my_memes'][$random]['name'],
                $_SESSION['my_memes'][$random]['url'],
            );

            array_push($posts, $post->toArray());
        }

        shuffle($posts);

        return $posts;

    }

    /****
     * En klassmetod som renderar data
     */
    public static function renderPosts($posts){

        $template = "";

        foreach($posts as $post){

            $template .= "
            <div class='post-preview'>
                <h2 class='post-title'>$post[title]</h2>
                <div>
                <img src='$post[image]' alt='$post[title]' class='img-fluid'>
                </div>
                <div class='post-subtitle'>$post[text]</div>
                <p class='post-meta'>
                    Posted by <a href='#'>$post[author]</a>
                </p>
            </div>
            <hr />";
        }
      
        echo $template;

    }

}
