<?php
include "connection.php";
$id=$_GET['id'];
$query="SELECT * FROM tbl_category WHERE pk_int_id='$id'";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
if(isset($_POST["update"]))
{
    $strCategoryName=$_POST["categoryName"];
    $strCategoryDescription=$_POST["categoryDescription"];
    $query="UPDATE tbl_category SET vchr_category_name = '$strCategoryName',vchr_category_description = '$strCategoryDescription' WHERE pk_int_id='$id'";
    $result=mysqli_query($connection,$query);
    header('Location: test2.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="categoryName" value="<?php echo $row['vchr_category_name']; ?>"><br>
        <input type="text" name="categoryDescription" value="<?php echo $row['vchr_category_description']; ?>"><br>
        <input type="submit" name="update" value="update"><br>
    </form>
</body>
</html>

