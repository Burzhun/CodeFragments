<?php
class Router{
    static function getUrlArray(){
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

        for($i= 0;$i < sizeof($scriptName);$i++)
        {
            if ($requestURI[$i]== $scriptName[$i]||$requestURI[$i] == "mysite")
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

    static function urltype($routing=null){
        if($routing==null){$routing=self::getUrlArray();}
        $type='34 ';
        if(count($routing)==2&&$routing[0]=='post'&&preg_match("/[0-9a-zA-Z.,!@%:;?]+/",$routing[1])){
            $type="post";
        }
        if(count($routing)<2){
            $type="index";
        }
        if(count($routing)==2&&$routing[0]=='new'){
            $type="new";
        }

        return $type;
    }
}