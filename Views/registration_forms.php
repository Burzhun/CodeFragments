<?php
class registration_forms{
    static public $log_in="<div id='login_form'>
    <form action='' method='post'>
    <input type='text' name='login' placeholder='E-Mail '>
    <input type='password' name='password' placeholder='password'>
    <button type='submit'>Ok</button>
    </form>
    <a href='registration.php'>Registration</a>
    </div>";

    static  public $log_out="
        <div id='login_form'>
          <a href='logout.php'>Logout</a>
        </div>";

    static  public $registration_form="
        <div id='registration_form'>
        <form action='' method='post'>
            E-mail<input type='email' name='email'><br>
            Name<input type='text' name='name'> <br>
            Nickname<input type='text' name='nickname'><br>
            Password <input type='password' name='password'><br>
            <button type='submit'>Ok</button>
            </form>
        </div>
    ";
}
