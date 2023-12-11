<?php
 include "connection.php";
 if(isset($_POST["submit"]))
 {
    $strUserName=$_POST["username"];
    $strPassword=$_POST["password"];
    $strPhone=$_POST["phone"];
    $strEmail=$_POST["email"];
    $query="SELECT * FROM tbl_registration where vchr_user_name='$strUserName'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo"<script>alert('Sorry this user name is already taken please choose any other user name')</script>";
    }
    else
    {
        $strUserName=mysqli_real_escape_string($connection,$strUserName);
        $strPassword=mysqli_real_escape_string($connection,$strPassword);
        $strPhone=mysqli_real_escape_string($connection,$strPhone);
        $strEmail=mysqli_real_escape_string($connection,$strEmail);
        $hash="$2y$10$";
        $salt="qwerqwerqwerqwerqwerqw";
        $hash_salt=$hash . $salt;
        $strPassword=crypt($strPassword,$hash_salt);
        $query= "INSERT INTO tbl_registration(vchr_user_name,vchr_password,vchr_phone,vchr_email)
                VALUES('$strUserName','$strPassword','$strPhone','$strEmail')";
        $result = mysqli_query($connection,$query);
        if ($result) 
        {
            header('Location: login.php');
        } 
        else 
        {
            echo "Error: " . mysqli_error($connection);
        }
   }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script> 
</head>
<body>
    <form method="post" id="forms">
        <div class="main"> 
            <div class="type"><input type="text" id="username" name="username" placeholder="User Name"></div>
            <div class="type"><input type="password" name="password" placeholder="Password" id="123"></div>
            <div class="type"><input type="text" name="Confirm_password" placeholder="Confirm Password" id="222"></div>
            <div class="type"><input type="text" name="phone" placeholder="Phone Number"></div>
            <div class="type"><input type="email" name="email" placeholder="Email Id"></div>
            <div class="submit"><input type="submit" name="submit" value="Register"></div>
            <div class="link"><a href="login.php">Login Page</a></div>
        </div>
    </form>


<script>
    $(function(){
    $.validator.addMethod("customPassword", function(value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
      }, "Password must contain at least one lowercase letter, one uppercase letter, one special character, and have a minimum length of 8 characters");
  

    $("#forms").validate({
        rules:{
            username:{
                required:true,
                minlength:2,
            },
            password:{
                required:true,
                minlength:8,
                customPassword:true
            },
            confirm_password:{
                required:true,
                equalTo:'#123'
            },
            phone:{
                required:true,
                minlength:10,
                maxlength:10
            },
            email:{
                required:true,
                email:true


            },
            
        },
        messages:{
            username:{
                required:'enter a username',
                minlength:'enter more than two values'
            },
            password:{
                required:'enter password',
                minlength:'length more than 8'

            },
            confirm_password:{
                required:'enter password',
                minlength:"length more than 8",
                equalTo:'please enter the same password'
            },
            email:{
                required:'enter a email',
                email:'enter a valid email'
            },
            

        },
      
          
    });
    
})</script>
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
            margin:10px 0;
            padding: 10px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
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
            margin-bottom: 15px;
        }
        a {
            text-decoration: none;
            color: #3498db;
            margin: 0 10px;

        }
        .link {
            text-align: center;
        }

        a:hover {
            color: #a01ed3;
        }
        .error{
            color: rgb(255, 0, 0);
            display: block;
            text-align: start;
        }

    </style>
</body>
</html>

