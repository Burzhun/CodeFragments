<?php
session_start();
require_once ('template.php');
require_once('classes\user.php');

$message="";
if(isset($_POST['email'])&&(isset($_POST['login']))&&isset($_POST['name'])&&isset($_POST['password']))
{
    if(!User::user_exists($_POST['email']))
    {
        User::AddUser($_POST['email'],$_POST['login'],$_POST['name'],$_POST['password']);
        $_SESSION["registration_confirmed"]="1";
        header('Location:registration_confirmed.php');
    }
    else{
        $_SESSION["registration_confirmed"]="0";
        $message="This e-mail has been already used";
    }
}
$header=Views::header_form();
$form=$message.Views::registration_form();
$page=new Page();
$page->add_css(['css/post.css'])->add_javascript([])->set_title('Main Page')->mainbody($form);
$html=$page->CreatePage();
echo $html;