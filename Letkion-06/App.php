<?php

include 'Post.php';

// Skapa flera olika instanser (objekt) av klassen Post
$p1 = new Post(1, "Mahmud", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");
$p2 = new Post(2, "Kalle", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");
$p3 = new Post(3, "Yasmin", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");
$p4 = new Post(4, "Erik", "Lorem Ipsum", "https://i.imgflip.com/30b1gx.jpg");

// Skriv ut info om ett objekt
var_dump( $p1 );

// Skriv ut objektet som array
print_r($p1->toArray());