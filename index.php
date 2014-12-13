<?php
    require_once('classes\db.php');
    require_once('Views.php');
    require_once ('template.php');
    require_once('classes\user.php');
    require_once('classes\router.php');
    require_once('classes\post.php');
    require_once('Controllers\Page_controller.php');
    require_once('Views/post_page.php');
    require_once('classes/comment.php');
    session_start();
    $routing=Router::urltype();
    $_SESSION['previous_page']=$_SERVER['REQUEST_URI'];
    $error_message='';
    $user_id='';
    print_r(Router::getUrlArray());

    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    if(isset($_POST['email'])&&isset($_POST['password'])&&(!isset($_SESSION['user_id'])||$_SESSION['user_id']=='')){
        $id=User::checkuser($_POST['email'],$_POST['password']);
        print_r($id);
        if(User::checkuser($_POST['email'],$_POST['password'])){
            $_SESSION['user_id']=$id;
            header('Location:'.$_SERVER['REQUEST_URI']);
        }
        else{
            $error_message="Wrong e-mail or password";
        }
    }
    $page=new Page();

    $page->add_css(['css/post.css'])->add_javascript([])->set_title('Main Page')->mainbody(Page_content($routing,$user_id));
    $html=$page->CreatePage();
    echo $error_message;
    echo $html;