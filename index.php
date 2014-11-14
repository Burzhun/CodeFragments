<?php
    require_once('classes\db.php');
    require_once('Views.php');
    require_once ('template.php');
    require_once('classes\user.php');
    require_once('classes\router.php');
    require_once('classes\post.php');
    $routing=Router::getUrlArray();
    print_r($routing);
    $mainbody='';
    $urltype=Router::urltype($routing);
    if($urltype=='post'){
        echo $routing[2];
        $row=Post::getPostdata($routing[2]);
        print_r($row);
        $mainbody=Views::Post_to_html($row['id'],$row['type'],$row['title'],$row['description'],$row['text'],'','');
    }
    $logging_in_mistake='';
    $header=Views::header_form();
    session_start();
    if(isset($_POST['login'])&&isset($_POST['password'])){
        if(User::user_exists($_POST['login'],$_POST['password'])){
            $logging_in_mistake="Wrong e-mail or password";
        }
    }
    $html=createpage([],['css/styles.css','css/post.css'],'MainPage',$header,$mainbody,'','');
    echo $html;
