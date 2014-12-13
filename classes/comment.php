<?php
class Comment
{
    public $id,$text,$parent_comment_id,$post_id,$user_id,$children_comments;
    function Comment($id){
        $query="select * from comments where id={$id}";
        $result=MyDatabase::ReadQuery($query);
        $row=$result->fetch_assoc();
        $this->id=$id;
        $this->text=$row['text'];
        $this->post_id=$row['post_id'];
        $this->user_id=$row['user_id'];
        $query2="select * from comments where parent_comment_id={$id}";
        $result=MyDatabase::ReadQuery($query2);
        if($result->num_rows>0)
        {
            $array=array();
            while($row=$result->fetch_assoc())
            {
                $c_comment=new Comment($row['id']);
                $array[]=$c_comment;
            }
        }
        else{
            $array=null;
        }
        $this->children_comments=$array;
    }

    static function add_comment($text,$image,$user_id,$post_id,$parent_comment_id)
    {

        $query="insert into comments(text,post_id,user_id,image,parent_comment_id) values('{$text}',{$post_id},{$user_id},'{$image}',{$parent_comment_id})";
        MyDatabase::UpdateQuery($query);
    }
    static function comments_array($post_id){
        $query="select id from comments where post_id='{$post_id}' and parent_comment_id=0";
        $result=MyDatabase::ReadQuery($query);
        $comments_array=array();
        if($result) {
            while ($row = $result->fetch_assoc()) {
                $comment = new Comment($row['id']);
                $comments_array[] = $comment;
            }
        }
        return $comments_array;
    }
}