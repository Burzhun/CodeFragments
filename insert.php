<?php
    require_once('template.php');
    require_once('Views.php');
    $page=new Page();
    $page->add_css(['css/post.css'])->add_javascript(['js/insert_post.js'])->set_title('Main Page')->mainbody(Views::insert_form());
    echo $page->CreatePage();
    ?>
