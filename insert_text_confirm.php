<?php
require_once('classes/db.php');
require_once('classes/user.php');
require_once('classes/post.php');
if(isset($_POST['Title'])&&isset($_POST['Description'])&&isset($_POST['Text'])&&isset($_POST['tags'])){
    $db=MyDatabase::getInstance();
    $text=$db->real_escape_string($_POST['Text']);
    $title=$db->real_escape_string($_POST['Title']);
    $tags=$db->real_escape_string($_POST['tags']);
    $description=$db->real_escape_string($_POST['Description']);
    $type='text';
    $image='';
    $url='';
    Post::AddPost($title,$description,$type,$text,$image,$url,$tags);

}