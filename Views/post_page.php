<?php
function post_html($post,$separately,$user_id)
{
    $html="<div id='posts'>";
    $div_rating="";
    if($user_id!=''){
        $user_rating=Post::user_rating($user_id,$post->id);
        //$user_rating=0;
        $div_rating="<div_ratings>";
        switch($user_rating) {
            case 0:
                $div_rating.="<span>0</span>";
                break;
            case 1:
                $div_rating.="<span>1</span>";
                break;
        }
        $div_rating.="</div>";
    }

    if($separately){
        switch($post->type)
        {
            case 'text':
                $html.= "<div class='post_page'>
                 <span>{$post->title}</span><br>
                <div class='description'>{$post->description}</div><br>
                <div class='post_text'>{$post->text}</div>";
                break;
            case 'image':
                $html.="<div class='post_page'>
                <span>{$post->title}</span><br>
                <div class='description'>{$post->description}</div><br>
                <img src='{images/$post->image}'>";
                break;
        }
    }
    else{
        $path=Router::pathtofolder();
        switch($post->type) {
            case 'text':
                $html.= "<div class='post'>
                    <a href='{$path}post/{$post->title}'> <span class='title'>{$post->title}</span><br></a>
                    <div class='description'>{$post->description}</div><br>
                    <div class='post_text'>{$post->text}</div>";
                break;
            case 'image':
                $html.="<div class='post'>
                    <a href='{$path}post/{$post->title}'> <span class='title'>{$post->title}</span><br></a>
                    <div class='description'>{$post->description}</div><br>
                    <a href='{$path}post/{$post->title}'><img src='{images/$post->image}'></a>";
                break;
        }
    }
    $html.=$div_rating."</div>";

    return $html;
}