<?php

function header_form()
{
    $path=Router::pathtofolder();
    $header = "
    <div id='header'>
        <span class='menu'><a href='{$path}index.php'>Home</a> </span>
        <span class='menu'><a href='{$path}insert.php'>Add article</a> </span>
    </div>";
    return $header;
}



?>