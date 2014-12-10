<?php
require_once('Views.php');
require_once('classes\router.php');
require_once('classes\user.php');

class Page{
    private  $javascript;
    private $css;
    private $title,$header,$mainbody,$rightside,$footer,$error_message,$user;
    function Page(){
        $path=Router::pathtofolder();
        $this->javascript="<script src='{$path}js/jquery-2.0.3.min.js'></script>";
        $this->javascript.="<script src='{$path}js/main.js'></script>";
        $this->css="<link rel='stylesheet' type='text/css' href='{$path}css/styles.css'/>";
        $this->header=Views::header_form();
        $this->rightside="";
        $this->mainbody="";
        $this->footer="";
        $this->error_message="";
        $user=null;
    }
    public function add_javascript($javascript){
        $path=Router::pathtofolder();
        $links="";
        foreach($javascript as $item)
        {
            $item=$path.$item;
            $links.="<script src='{$item}'></script>";
        }
        $this->javascript.=$links;
        return $this;
    }
    public function add_css($css){
        $path=Router::pathtofolder();
        $links="";
        foreach ($css as $item) {
            $item=$path.$item;
            $links.="<link rel='stylesheet' type='text/css' href='{$item}'/>";
        }
        $this->css.=$links;
        return $this;
    }
    public function set_title($title){
        $this->title=$title;
        return $this;
    }
    public function mainbody($mainbody){
        $this->mainbody=$mainbody;
        return $this;
    }
    public function rightside($rightside){
        $this->rightside=$rightside;
        return $this;
    }
    public function footer($footer){
        $this->footer=$footer;
        return $this;
    }
    public function user($user){
        $this->user=$user;
        return $this;
    }
    public function CreatePage(){
        $html="<html> <head><title>{$this->title}</title>{$this->css}{$this->javascript}</head>";
        $login_form='';
        if(!isset($_SESSION['user_id'])||$_SESSION['user_id']==''){
            $login_form=Views::log_in($this->error_message);
        }
        else{
            $user=new User($_SESSION['user_id']);
            $login_form=Views::log_out();
        }
        $html.="<body>
         <div id='header'>{$this->header}</div>
        {$login_form}
        <div id='mainbody'>{$this->mainbody}</div>
        <div id='rightside'>{$this->rightside}</div>
        <div id='footer'>{$this->footer}</div>
        </body></html>";
        return $html;
    }
}
