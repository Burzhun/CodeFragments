<?php
require_once('Views.php');
require_once('classes\router.php');

function createpage($javascript,$css,$title,$header,$mainbody,$rightside,$footer,$error_message,$user=null)
{
    $path=Router::pathtofolder();
    $links="<script src='{$path}js/jquery-2.0.3.min.js'></script>";
    foreach($javascript as $item)
    {
        $item=$path.$item;
        $links.="<script src='{$item}'></script>";
    }
    foreach ($css as $item) {
        $item=$path.$item;
        $links.="<link rel='stylesheet' type='text/css' href='{$item}'/>";
    }
    $html="<html> <head><title>{$title}</title>{$links}</head>";
    $login_form='';
    if($user==null){
        $login_form=Views::log_in($error_message);
    }
    if($header=''){$header=Views::header_form();}
    $html.="<body>
         <div id='header'>{$header}</div>
        {$login_form}
        <div id='mainbody'>{$mainbody}</div>
        <div id='rightside'>{$rightside}</div>
        <div id='footer'>{$footer}</div>
    </body></html>";
    return $html;
}