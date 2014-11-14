<?php
    require_once('template.php');
    require_once('Views.php');
    $header=Views::header_form();
    $insert_form=Views::insert_form();
    $html=createpage(['js/insert_post.js'],['css/styles.css','css/insert.css'],'Add article',$header,$insert_form,'','');
    echo $html;
?>
