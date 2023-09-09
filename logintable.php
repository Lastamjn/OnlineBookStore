<html>
    <head><title>login</title></head>
    <body>
        <?php
            $con=mysqli_connect("localhost","root","","j_store");
			if(!$con)
			{
			    die('Sorry!Connection failed'.mysqli_error());
			}
			else
			{
			    echo "Successful connection <br/>";
			}
            $sql="CREATE TABLE login(
                email VARCHAR(30) NOT NULL,
                password VARCHAR(50))";
            if(mysqli_query($con,$sql))
			{
				echo"TABLE created successfully";
			}
			else
			{
				echo"Error creating table".mysqli_error($con);
			}
			mysqli_close($con);
        ?>
    </body>
</html>