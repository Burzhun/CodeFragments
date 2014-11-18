<?php
function log_in($error)
{
    $path=Router::pathtofolder();
    $html = "<div id='login_form'>
    <form action='' method='post'>
    <input type='text' name='email' placeholder='E-Mail '>
    <input type='password' name='password' placeholder='password'>
    <p>{$error}</p>
    <button type='submit'>Ok</button>
    </form>
    <a href='{$path}registration.php'>Registration</a>
    </div>";
    return $html;
}
function log_out(){
    $path=Router::pathtofolder();
    $html = "<div id='login_form'>
          <a href='{$path}logout.php'>Logout</a>
        </div>";
    return $html;
}

function registration_form()
{
    $path=Router::pathtofolder();
    $html = "<div id='registration_form'>
    <form action='' method='post'>
        E-mail<input type='email' name='email'><br>
        Login<input type='text' name='login'> <br>
        Name<input type='text' name='name'><br>
        Password <input type='password' name='password'><br>
        <button type='submit'>Ok</button>
        </form>
    </div>
    ";
    return $html;
}

