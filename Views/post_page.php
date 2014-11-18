<?php
function Post_page($id,$type,$title,$description,$text,$image,$url)
{
    $html='';
    switch($type) {
        case 'text':
            $html = "<div class='post_page'>
                     <span>{$title}</span><br>
                    <div class='description'>{$description}</div><br>
                    <div class='post_text'>{$text}</div>
                 </div>";
            break;
        case 'image':
            $html="<div class='post_page'>
                    <span>{$title}</span><br>
                    <div class='description'>{$description}</div><br>
                    <img src='{images/$image}'>
                </div>";
            break;
    }
    return $html;
}

function Post_to_html($id,$type,$title,$description,$text,$image,$url){
    $path=Router::pathtofolder();
    switch($type) {
        case 'text':
            $html = "<div class='post'>
                    <a href='{$path}post/{$title}'> <span class='title'>{$title}</span><br></a>
                    <div class='description'>{$description}</div><br>
                    <div class='post_text'>{$text}</div>
                 </div>";
            break;
        case 'image':
            $html="<div class='post'>
                    <span>{$title}</span><br>
                    <div class='description'>{$description}</div><br>
                    <img src='{images/$image}'>
                </div>";
            break;
    }
    return $html;

}