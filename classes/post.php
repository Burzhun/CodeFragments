<?php
require_once('db.php');
class Post{
    public $id;
    public $title;
    public $description;
    public $type;
    public $text;
    public $image;
    public $url;
    function Post($id){
        $array=self::GetPostById($id)->fetch_assoc();
        $this->id=$id;
        $this->image=$array['image'];
        $this->text=$array['text'];
        $this->type=$array['type'];
        $this->url=$array['url'];
        $this->description=$array['description'];
    }

    static function GetPostById($id){
        $db=MyDatabase::getInstance();
        $id=$db->real_escape_string($id);
        return MyDatabase::ReadQuery("select * from post where id={$id}");
    }

    static function AddPost($title,$description,$type,$text='',$image='',$url='',$tags){
        $date=date('Y-m-d H:i:s');
        $db=MyDatabase::getInstance();
        $title=$db->real_escape_string($title);
        if($text!='') $text=$db->real_escape_string($text);
        if($image!='')$image=$db->real_escape_string($image);
        if($url!='') $url=$db->real_escape_string($url);
        if($description!='') $url=$db->real_escape_string($description);
        MyDatabase::UpdateQuery("insert into post(title,type,description,text,image,date,url,tags) values
              ('{$title}','{$type}','{$description}','{$text}','{$image}','{$date}','{$url}','{$tags}')");
    }

    static function getPostdata($title){
        $db=MyDatabase::getInstance();
        $title=$db->real_escape_string($title);
        $result=MyDatabase::ReadQuery("select * from post where title='{$title}'");
        $row=$result->fetch_assoc();
        return $row;
    }

    static function getMaxId(){
        $result=MyDatabase::ReadQuery('select id from post order by id desc limit 1');
        if($result){
            $res=$result->fetch_assoc();
            if($res){
                return $res['id'];
            }
        }
        return 0;
    }


}
