<html>
  <head>
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  </head>
  <body>
    <div class="register">
    <a href="../index.php"><img src="../logo.png" class="logo"></a>
      <h1>Sign Up</h1>
      <form method="post" action="user_login.html">
        <p>Username</p>
        <input type="text" name="user_username" placeholder="Enter Your Full Name">
        <p>Address</p>
        <input type="text" name="user_address" placeholder="Enter Your Address">
        <p>Email</p>
        <input type="text" name="user_address" placeholder="Enter Your Email">
        <p>Phone Number</p>
        <input type="text" name="user_mobile" placeholder="Enter Your Number">
        <p>Password</p>
        <input type="password" name="user_password" placeholder="Enter Your Password"><br>
        <input type="submit" value="Sign Up"><br>
        <h>Already have account?<h>
        <a href="user_login.html">Login</a>
      </form>
    </div>
    <?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_address=$_POST['user_address'];
        $user_email=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_password=$_POST['user_password'];
        $user_ip=getIPAddress();

        $select_query="Select * from user_table where username='$user_username'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username already exist')</script>";
        }
        else{
             //move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="insert into user_table (username, user_email, user_password, user_ip, user_address, user_mobile) values('$user_username', '$user_email', '$user_password', '$user_ip', '$user_address', '$user_mobile')";
        $sql_execute=mysqli_query($con,$insert_query);
       
        }
    }
?>

  </body>
  <style>
    body{
    margin:0;
    padding:0;
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
    background-color: #efd9d9;
    border-radius: 5px;
}
    .register{
    width: 320px;
    height: 600px;
    background: #292828;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.logo{
    width: 90px;
    height: 90px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin:0;
    padding:0 0 20px;
    text-align: center;
    font-size: 22px;
}
.register p{
    margin:0;
    padding:0;
    font-weight: bold;
}
.register input{
    width: 100%;
    margin-bottom: 20px;
}
.register input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.register input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #4e4a4a;
    color: #fff;
    font-size: 18px;
    border-radius: 50px;
}
.register input[type="submit"]:hover
{
    cursor: pointer;
    background: #fff;
    color: #000;
}
.register a{
    text-decoration: none;
    font-size: 14px;
    line-height: 20px;
    color: darkgray;
}
.register a:hover{
    color: #fff;
}
  </style>
</html>

