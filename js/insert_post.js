$(document).ready(function(){
    $(".post_type_item").click(function(){
        var n=$(this).index();
        $('.insert_form_item').hide();
        $('.insert_form_item').eq(n).show();

    });
});
function CheckTextForm(){

    var text=$('#text_form .Text').val();
    var description=$('#text_form .Description').val();
    var tags=$('#text_form .tags').val();
    var title=$('#text_form .Title').val();
    var pattern=/[0-9a-zA-Z]+,[0-9a-zA-Z]+[0-9a-zA-Z,]+/g;
    if(title!=''&&text!=''&&pattern.test(tags)){
        return true;
    }
    else{
        $('#text_form #title_confirmed').text('');
        $('#text_form #text_confirmed').text('');
        $('#text_form #tags_confirmed').text('');

        if(title.length==''){$('#text_form #title_confirmed').text('Title');}
        if(text==''){$('#text_form #text_confirmed').text('Text');}
        if(!pattern.test(tags)){$('#text_form #tags_confirmed').text('Tags');}
        return false;
    }
}