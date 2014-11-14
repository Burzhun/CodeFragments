<?php
require_once('Views\insert_form.php');
require_once('Views\header.php');
require_once('Views\registration_forms.php');
require_once('Views\post_page.php');
class Views{

    static function header_form(){
        $header=header_form();
        return $header;
    }

    static function insert_form(){
        $header=insert_form();
        return $header;
    }
    static  function log_in(){
        return registration_forms::$log_in;
    }
    static function log_out(){
        return registration_forms::$log_out;
    }
    static function registration_form(){
        return registration_forms::$registration_form;
    }
    static function Post_page($id,$type,$title,$description,$text,$image,$url){
        return Post_page($id,$type,$title,$description,$text,$image,$url);
    }

    static function Post_to_html($id,$type,$title,$description,$text,$image,$url){
        return Post_to_html($id,$type,$title,$description,$text,$image,$url);
    }
}