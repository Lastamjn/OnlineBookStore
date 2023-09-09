<html>
    <head>
        <title>validate</title>
    </head>
    <body>
        <?php
            $name=$_POST['name'];
            $address=$_POST['address'];
			$email=$_POST['email'];
            $number=$_POST['number'];
            $password=$_POST['password'];
            $default=$_POST;
            $flag=0;
            if(strlen($name)==0){
                $m1="Please enter your name";
                $flag=1;
            }
            if(strlen($name)<3){
                $m2="Name must be atleast 3 character";
                $flag=1;
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $m3="Email must be in validate form";
                $flag=1;
            }
            if(!preg_match("98[0-9]{8}/",$phone)){
                $m4="Phone number must contain 10 digit and must start from 98";
                $flag=1;
            }
            if(strlen($address)==0){
                $m5="Please enter your name";
                $flag=1;
            }
            if($flag==0){
                print "Successful";
            }
            else{
                print '<form action="$.SERVER[PHP_SELF]" method="post">
                Name:<input type="text" name="name" value="'.htmlentities($default["name"]).'">';
                if(isset($m1))
                    print "<font color='red'>$m1</font>";
                if(isset($m2))
                    print "<font color='red'>$m2</font>";
                print '<br/><br/>
                Email:<input type="text" name="email" value="'.htmlentities($default["email"]).'">';
                if(isset($m3))
                    print "<font color='red'>$m3</font>";
                print '<br/><br/>
                Number:<input type="text" name="number" value="'.htmlentities($default["number"]).'">';
                if(isset($m4))
                    print "<font color='red'>$m4</font>";
                print '<br/><br/>
                Address:<input type="text" name="address" value="'.htmlentities($default["address"]).'">';
                if(isset($m5))
                    print "<font color='red'>$m5</font>";
                print '<br/><br/>
                <input type="submit" value="submit">
                </form>';
            }
        ?>
    </body>
</html>