<?php
class Router{
    static function getUrlArray(){
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

        for($i= 0;$i < sizeof($scriptName);$i++)
        {
            if ($requestURI[$i]== $scriptName[$i])
            {
                unset($requestURI[$i]);
            }
        }
        $array = array_values($requestURI);
        return $array;
    }

    static function pathtofolder(){
        $path=$_SERVER['SCRIPT_NAME'];
        $pos=strripos($path,'/');
        $path=substr($path,0,$pos+1);
        return $path;
    }

    static function urltype($routing){
        $type='';
        if(count($routing)==3&&$routing[1]=='post'&&preg_match("/[0-9a-zA-Z.,!@%:;?]+/",$routing[2])){
            $type="post";
        }
        if(count($routing)==1&&$routing[0]==''){
            $type="index";
        }
        if(count($routing)==2&&$routing[1]=='new'){
            $type="new";
        }

        return $type;
    }
}