<?php
require_once "objects/objects.php";
if($_POST)
{
$Login->username=$_POST["email"];
$Login->password=$_POST["password"];
if($Login->login($_POST))
{
header("Location:Dashboard.php");
}
else
{
    echo "error";
}
}
else
{
    header("Location:index.php");
}
?>