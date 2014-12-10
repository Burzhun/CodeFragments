<?php
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

        case 'post':
            $title=Router::getUrlArray()[1];
            $post=new Post(Post::get_Post_by_title($title));
            $html=Views::Post($post,true,$user_id);
            $html.="</div>";
            return $html;
            break;
    }

}