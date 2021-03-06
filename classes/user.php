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

    static function checkuser($email,$password){
        $db=MyDatabase::getInstance();
        $email=$db->real_escape_string($email);
        $query="select hash,password,id from user where email='{$email}'";
        $result=MyDatabase::ReadQuery($query);
        if($result->num_rows==1){
            $password=$db->real_escape_string($password);
            $row=$result->fetch_assoc();
            $hash=$row['hash'];
            $password=sha1($hash.$password);
            if($password==$row['password']){
                return $row['id'];
            }
        }
        return false;
    }

    static function user_exists($email){
        $db=MyDatabase::getInstance();
        $email=$db->real_escape_string($email);
        $query="select id from user where email='{$email}'";
        $result=MyDatabase::ReadQuery($query);
        if($result->num_rows==0){
            return false;
        }
        return true;
    }

    static function createHash()
    {
        $hash=md5(mcrypt_create_iv(10,MCRYPT_DEV_RANDOM));
        return $hash;
    }
    static function AddUser($email,$login,$name,$password){
        $db=MyDatabase::getInstance();
        $email=$db->real_escape_string($email);
        $name=$db->real_escape_string($name);
        $login=$db->real_escape_string($login);
        $password=$db->real_escape_string($password);
        $hash=self::createHash();
        $password=sha1($hash.$password);
        $date=date('Y-m-d H:i:s');
        $query="insert into user(email,login,password,name,date,type,hash)
            values('{$email}','{$login}','{$password}','{$name}','{$date}','user','{$hash}')";
        $db->query($query);
    }
}