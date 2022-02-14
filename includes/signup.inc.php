<?php

if(isset($_POST["submit"]))
{
    //Grabing Data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    include "../classes/signup.classes.php";
    include "../classes/signup-contr.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
}