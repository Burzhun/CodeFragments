<?php
require_once('comments_controller.php');

function Page_content($routing,$user_id=''){
    $url_type=Router::getUrlArray($routing);
    $content='';
    $user=new User($user_id);
    switch($routing)
    {
        case 'index':
            $query="select * from post ORDER by recent_rating desc limit 10";
            $res=MyDatabase::ReadQuery($query);
            $html="";
            while($row=$res->fetch_assoc()){
                $post=new Post($row);
                $html.=Views::Post($post,false,$user_id);
            }
            $html.="</div>";
            return $html;
            break;

        case 'best_day':
            $query="select * from post where hour(timediff(now(),date))<24 order by rating desc limit 10";
            $res=MyDatabase::ReadQuery($query);
            $html="";
            while($row=$res->fetch_assoc()){
                $post=new Post($row);
                $html.=Views::Post($post,false,$user_id);
            }
            $html.="</div>";
            return $html;
            break;

        case 'best_week':
            $query="select * from post where floor(hour(timediff(now(),date))/24)<37 order by rating desc limit 10";
            $res=MyDatabase::ReadQuery($query);
            $html="";
            while($row=$res->fetch_assoc()){
                $post=new Post($row);
                $html.=Views::Post($post,false,$user_id);
            }
            $html.="</div>";
            return $html;
            break;


        case 'best_month':
            $query="select * from post where hour(timediff(now(),date))*24<31 order by rating desc limit 10";
            $res=MyDatabase::ReadQuery($query);
            $html="";
            while($row=$res->fetch_assoc()){
                $post=new Post($row);
                $html.=Views::Post($post,false,$user_id);
            }
            $html.="</div>";
            return $html;
            break;

        case 'post':
            $title=Router::getUrlArray()[1];
            $post=new Post(Post::get_Post_by_title($title));
            $html=Views::Post($post,true,$user_id);
            $html.=Views::Comments(Comment::comments_array($post->id));
            return $html;
            break;
    }

}