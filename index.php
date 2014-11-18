<?php
    require_once('classes\db.php');
    require_once('Views.php');
    require_once ('template.php');
    require_once('classes\user.php');
    require_once('classes\router.php');
    require_once('classes\post.php');
    session_start();

    $routing=Router::getUrlArray();

    $mainbody='';
    $urltype=Router::urltype($routing);
    if($urltype=='post'){
        $row=Post::getPostdata($routing[1]);
        print_r($row);
        $mainbody=Views::Post_to_html($row['id'],$row['type'],$row['title'],$row['description'],$row['text'],'','');
    }
    $error_message='';

    if(isset($_POST['login'])&&isset($_POST['password'])){
        $id=User::checkuser($_POST['login'],$_POST['password']);
        if($id){
            $_SESSION=$id;
        }
        else{
            $error_message="Wrong e-mail or password";
        }
    }
    $html=createpage([],['css/styles.css','css/post.css'],'MainPage',$mainbody,'','','','');
    echo $html;