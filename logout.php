<?php
require_once 'objects/objects.php';
session_start();
if(isset($_SESSION['logged_in'])){

	$_SESSION = []; // assignig an empty array to $_session varible
	//this delete she session from from xampp/tmp directory
	session_destroy();

	header('location: index.php');

}
else{
	header('location: index.php');
}