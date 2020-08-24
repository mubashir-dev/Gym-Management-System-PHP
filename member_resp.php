<?php
require_once 'objects/objects.php';
$member->name=$_POST["name"];
$member->gender=$_POST["gender"];
$member->Address=$_POST["Address"];
$member->contact=$_POST["contact"];
$member->joining_date=$_POST["date"];
$member->fee_amount=$_POST["fee"];
$status = $member->add_member();
if( $status === 'success'){
	echo "MEMBER SUCCESSFULLY ADDED";
}
else if( $status === 'error')
{
	echo "ERROR OCCUAR";	
}