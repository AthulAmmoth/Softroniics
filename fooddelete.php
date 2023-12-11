<?php
include "connection.php";
$intDeleteFood=$_GET['id'];
$query="DELETE FROM tbl_dishes WHERE pk_int_id='$intDeleteFood' ";
$result=mysqli_query($connection,$query);
 header('Location: test2.php#dishes');
?>