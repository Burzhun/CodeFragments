<?php
 function insert_form()
{
    $insert_form = "
        <div id='insert_form'>
            <div id='post_type'>
                <span class='post_type_item' >Text</span>
                <span class='post_type_item' >Image</span>
                <span class='post_type_item' >link</span>
            </div>
            <div class='insert_form_item' id='text_form'>
                <form action='insert_text_confirm.php' method='post'>
                    <input type='text' name='Title' placeholder='Title' class='Title' style='margin-bottom: 1px;'>
                    <p><span id='title_confirmed' style='color: red'></span></p>
                    <textarea name='Description' placeholder='Description' height='100px' class='Description'></textarea><br>
                    <textarea name='Text' placeholder='Text' class='Text' style='height: 250px;'></textarea><br>
                    <p><span id='text_confirmed' style='color: red'></span></p>
                    <input type='text' name='tags' placeholder='tags' class='tags'><br>
                    <p><span id='tags_confirmed' style='color: red'></span></p>
                    <button type='submit' onclick='return CheckTextForm()'>Ok</button>
                </form>
            </div>
            <div class='insert_form_item'   style='display:none;'>
                <form action='add_image_confirm.php' method='post' enctype='multipart/form-data'>
                    <input type='text' name='title'><br>
                    <textarea name='description'></textarea><br>
                    <input type='file' name='image'><br>
                    <input type='text' name='tags' placeholder='tags'><br>
                    <button type='submit' >Ok</button>
                </form>
            </div>
        </div>
    ";
    return $insert_form;
}