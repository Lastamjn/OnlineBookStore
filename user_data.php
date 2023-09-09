<!DOCTYPE>
<html>
    <head>
	    <title>insert</title>
	</head>
	<body>
	    <?php
		    $name=$_POST['name'];
            $address=$_POST['address'];
			$email=$_POST['email'];
            $number=$_POST['number'];
            $password=$_POST['password'];
			$con=mysqli_connect("localhost","root","","j_store");
			if(!$con)
			{
			    die('Sorry!Connection failed <br/>'.mysqli_error());
			}
			
			$sql="INSERT INTO user VALUES('".$name."','".$address."','".$email."','".$number."','".$password."')";
			if(mysqli_query($con,$sql))
			{
			    echo "Record inserted successfully <br/>";    
			}
			else
			{
			    echo "Error on inserting record <br/>".mysqli_error($con);
			}
			mysqli_close($con);
		?>
	</body>
</html>