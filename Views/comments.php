<?php
function subcomments($comment,$index){
    if($index==1){
        $html="<div class='root_comment' index='{$index}'>
        <div class='comment_text'>{$comment->text}</div>
        ";
    }
    else{
        $html="<div class='comment' index='{$index}'>
        <div class='comment_text'>{$comment->text}</div>
        ";
    }

    if($comment->children_comments){
        $comments=$comment->children_comments;
        $index++;
        foreach($comments as $comment1){
            $html.=subcomments($comment1,$index);
        }
    }
    $html.="</div>";
    return $html;
}
function comments($comments){
    $html="<div id='comments'>";
    foreach($comments as $comment)
    {
        $index=1;
        $html.=subcomments($comment,$index);
    }
    $html.="</div>";
    return $html;
}