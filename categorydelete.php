<?php
include "connection.php";
$intDeleteCategory=$_GET['id'];
echo $intDeleteCategory;
$query="DELETE FROM tbl_category WHERE pk_int_id='$intDeleteCategory' ";
$result=mysqli_query($connection,$query);
 header('Location: test2.php');
?>