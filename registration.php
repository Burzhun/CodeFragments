<?php
session_start();
require_once ('template.php');

require_once('classes\user.php');

$message="";
if(isset($_POST['email'])&&(isset($_POST['name']))&&isset($_POST['nickname'])&&isset($_POST['password']))
{
    if(!User::user_exists($_POST['email']))
    {
        User::AddUser($_POST['email'],$_POST['name'],$_POST['nickname'],$_POST['password']);
        $_SESSION["registration_confirmed"]="1";
        header('Location:registration_confirmed.php');

    }
    else{
        $_SESSION["registration_confirmed"]="0";
        $message="This e-mail has been already used";
    }
}
$form=$message.registration_forms::$registration_form;


$html=createpage([],['css/styles.css'],'Add article',$header,$form,'','');
echo $html;