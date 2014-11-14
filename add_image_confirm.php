<?php
require_once('classes/db.php');
require_once('classes/post.php');
if(isset($_POST['title'])&&isset($_FILES['image'])&&isset($_POST['tags'])){
    $db=MyDatabase::getInstance();
    $file=$_FILES['image'];
    $description='';
    if(isset($_POST['description'])){
        $description=$db->real_escape_string($_POST['description']);
    }
    $tags=$db->real_escape_string($_POST['tags']);
    $title=$db->real_escape_string($_POST['title']);
    $image=$_FILES['image'];
    $ext='';
    switch($image['type'])
    {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/jpg': $ext = 'jpg'; break;
        case 'image/gif': $ext = 'gif'; break;
        case 'image/png': $ext = 'png'; break;
    }
    if($ext){
        $id=Post::getMaxId()+1;
        $name=$id.'.'.$ext;
        MyDatabase::UpdateQuery("insert into post(title,description,image,type) values('{$title}','{$description}','{$name}','image')");
        move_uploaded_file($image['tmp_name'],'images/'.$name);
    }
}
header('Location:index.php');