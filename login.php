<?php
 include "connection.php";
 if(isset($_POST["submit"]))
 {
    $strUserName=$_POST["username"];
    $strPassword=$_POST["password"];
    $strUserName=mysqli_real_escape_string($connection,$strUserName);
    $strPassword=mysqli_real_escape_string($connection,$strPassword);
    $hash="$2y$10$";
    $salt="qwerqwerqwerqwerqwerqw";
    $hash_salt=$hash . $salt;
    $strPassword=crypt($strPassword,$hash_salt);

    $query="SELECT * FROM tbl_registration WHERE pk_int_id= 1 AND vchr_user_name='$strUserName' AND vchr_password='$strPassword'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)==1)
    {
        header('Location: admindashboard.php');
    }
    else
    {
        $query="SELECT * FROM tbl_registration where vchr_user_name='$strUserName' AND vchr_password='$strPassword'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)==1)
        {
            header('Location: userdashboard.php');
        }
        else
        {
            echo"<script>alert('Sorry Invalid User Name or password')</script>";
        }
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
   
</head>
<body>
    <div class="main">
        <form method="post">
        <div class="type"><input type="text" name="username" placeholder="User Name"></div>
        <div class="type"><input type="password" name="password" placeholder="Password"></div>
        <div class="Submit"><input type="submit" name="submit" value="Login"></div>
        <div class="link">
            <a href="registration.php">New user</a>
            <span>|</span>
            <a href="Forget.html">Forget Password</a>
        </div>
        </form>
    </div>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('food-background2.jpg'); /* Add the 'url()' function and provide the correct image path */
            background-size: cover; /* Adjust this property based on your design preferences */
            background-position: center; /* Adjust this property based on your design preferences */
        }

        .main {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            
        }

        .type {
            margin:10px 0px;
            padding: 10px;
            width: 300px;
            text-align: center;
            
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-top: 15px;
        }

        .Submit {
            margin: 20px 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .link {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #3498db;
            margin: 0 10px;
        }

        a:hover {
            color: #a01ed3;
        }
    </style>
</body>
</html>
