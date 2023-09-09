<?php
    $con=mysqli_connect("localhost","root","","book_store");
    if(!$con)
    {
        die(mysqli_error());
    }
    function getproducts(){
        global $con;
        if(!isset($_GET['category'])){
        $select_query="Select * from products order by rand() limit 0,12";
        $result_query=mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img class='card-img-top' src='./images/$product_image1' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p><b>Price: Rs.$product_price/-</b></p>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            </div>
                        </div>
                    </div>";
                    }
        }        
    }

    function get_unique_categories(){
        global $con;
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
        $select_query="Select * from products where category_id=$category_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center'>No stock for this category</h2>";
        }
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img class='card-img-top' src='./images/$product_image1' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p><b>Price: Rs.$product_price/-</b></p>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            </div>
                        </div>
                    </div>";
                    }
        }        
    }

    function getcategories(){
        global $con;
        $select_categories="Select * from categories";
                    $result_categories=mysqli_query($con, $select_categories);
                    // $row_data=mysqli_fetch_assoc($result_categories);
                    // echo $row_data['category_title'];
                    // echo $row_data['category_title'];
                    while($row_data=mysqli_fetch_assoc($result_categories)){
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
                        
                        echo "<li><a href='index.php?category=$category_id'>$category_title</a></li>";
                        
                    }
    }

    function search_product(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
        $search_query="Select * from products where product_keyword like '%$search_data_value%'";
        $result_query=mysqli_query($con, $search_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center'>No product found on this category</h2>";

            }
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img class='card-img-top' src='./images/$product_image1' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p><b>Price: Rs.$product_price/-</b></p>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            </div>
                        </div>
                        </div>";
                    }
        }
    }     

    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip; 
    
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address=getIPAddress();
            $get_product_id=$_GET['add_to_cart'];
            $select_query="Select * from cart_details where ip_address='$get_ip_address' and product_id=$get_product_id";
            $result_query=mysqli_query($con, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                echo "<script>alert('This product is already added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                $insert_query="insert into cart_details (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_address', 0)";
                $result_query=mysqli_query($con, $insert_query);
                echo "<script>alert('Product is added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    function cart_item(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address=getIPAddress();
            $select_query="Select * from cart_details where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
        }
            else{
                global $con;
                $get_ip_address=getIPAddress();
                $select_query="Select * from cart_details where ip_address='$get_ip_address'";
                $result_query=mysqli_query($con, $select_query);
                $num_of_rows=mysqli_num_rows($result_query);
            }
        echo $num_of_rows;
    }

    function total_cart_price(){
        global $con;
        $get_ip_address=getIPAddress();
        $total_price=0;
        $cart_query="select * from cart_details where ip_address='$get_ip_address'";
        $result=mysqli_query($con, $cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="select * from products where product_id='$product_id'";
            $result_products=mysqli_query($con, $select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }
?>