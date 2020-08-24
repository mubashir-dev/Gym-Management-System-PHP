<?php
require_once "objects/objects.php";
$member->mem_id=$_POST["id"];
if($member->mem_id_exist())
{
    if($member->delete_member())
    {
        echo "MEMBER RECORED SUCCESSFULLY DELETED";
    }
    else
    {
        echo "ERROR OCCURED";
    }
}
else
{
    echo "MEMBER ID NOT EXIST IN RECORED";
}

?>