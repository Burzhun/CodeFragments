<?php
session_start();

require_once ('template.php');
require_once('Views.php');
require_once('classes\user.php');

if(isset($_SESSION['registration_confirmed'])&&$_SESSION['registration_confirmed']==1){
    $form="
        <div id='registration_confirmed'>
            <p>Account has been created.</p>
            <p>Now you can return to the main page.</p>
            <a href='index.php'>Main Page</a>
        </div>
    ";
    $_SESSION['registration_confirmed']=0;
    $header=Views::header_form();
    $page->add_css(['css/post.css'])->add_javascript([])->set_title('Main Page')->mainbody($form);
    $html=$page->CreatePage();
    echo $html;
}
else{
    header('Location:index.php');
}