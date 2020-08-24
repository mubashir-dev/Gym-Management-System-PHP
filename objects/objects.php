<?php
//All Objects of All Classes Used in This Project
require_once"config/Database.php";
require_once"classes/login.php";
require_once"classes/Members.php";
//Objects of Classes
$db=new Database;
$con=$db->getConnection();
$Login=new login($con);
$member=new Members($con);
?>