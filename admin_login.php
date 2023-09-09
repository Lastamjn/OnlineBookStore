<html>
	<head>
		<title>login</title>
	</head>
	<body>
		<?php
	        $email=$_POST['email'];
	        $password=$_POST['password'];
			$con=mysqli_connect("localhost","root","","j_store");
			if(!$con)
			{
			    die('Sorry!Connection failed'.mysqli_error());
			}
		
            $query="SELECT * FROM user where email='".$email."' and password='".$password."'";	
	        $result=mysqli_query($con,$query);
	        if(mysqli_num_rows($result)==0)
	        {
		        session_start();  //session starts here
  		        $_SESSION['u']=$email;  //here 'u' is the variable of session
                header("location:index.php");
		        exit();
	        }
	        else
	        {	
				// echo "Invalid";
		        echo "<html>
			            <head>
			                <script type='text/javascript'>
			                    function show_alert()
			                    {
				                    alert('Username or Password is Wrong.!');
			                    }
			                </script>
			            </head>";
			            echo "<body onLoad=show_alert()>";	
			                include("login.html");				
			            echo"</body></html>";
			            exit();
	        }
		?>
	</body>
</html>