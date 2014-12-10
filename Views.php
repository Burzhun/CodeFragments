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
    static  function log_in($error){
        return log_in($error);
    }
    static function log_out(){
        return log_out();
    }
    static function registration_form(){
        return registration_form();
    }

    static function Post($post,$separately,$user_id){
        return post_html($post,$separately,$user_id);
    }
}