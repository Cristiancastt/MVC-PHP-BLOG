<?php
require_once('utils/Session.php');
if(Session::loggedIn())
{
    header("Location: views/private/index.php");
}
else
{
    header("Location: views/public/index.php");
}
?>