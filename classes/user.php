<?php
require_once('db.php');
class User
{
    public $id;
    private $usertype;
    private $date;
    function User($id){
        $this->id=$id;
        $parameters=self::getUserParameters($id);
        $this->usertype=$parameters['type'];
        $this->date=$parameters['date'];
    }
    static function  getUserParameters($id){
        $db=MyDatabase::getInstance();
        $query="select * from user where id={$id}";
        $result=$db->query($query);
        $db->close();
        if($result){
            while($row=$result->fetch_assoc()){
                return $row;
            }
        }
        else{
            return null;
        }
    }
     static function user_exists($email)
     {
         $db=MyDatabase::getInstance();
         $email=$db->real_escape_string($email);
         $query="select count(*) from user where email='{$email}'";
         $result=$db->query($query);
         $count=0;
         $db->close();
         if($result){
            while($row=$result->fetch_assoc()) {
                $count = $row['count(*)'];
            }
         }
         if($count>0)
         {
             return true;
         }
         else return false;
     }
    static function createHash()
    {
        $hash=md5(mcrypt_create_iv(10,MCRYPT_DEV_RANDOM));
        return $hash;
    }
    static function AddUser($email,$name,$nickname,$password){
        $db=MyDatabase::getInstance();
        $email=$db->real_escape_string($email);
        $name=$db->real_escape_string($name);
        $nickname=$db->real_escape_string($nickname);
        $password=$db->real_escape_string($password);
        $hash=self::createHash();
        $password=sha1($hash.$password);
        $date=date('Y-m-d H:i:s');
        $query="insert into user(email,nickname,password,name,date,type,hash)
            values('{$email}','{$nickname}','{$password}','{$name}','{$date}','user','{$hash}')";
        echo $query;
        $db->query($query);
    }
}