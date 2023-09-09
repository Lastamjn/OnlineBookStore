<?php
    include('includes/connect.php');
    include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .cart_img{
        width: 80px;
        height: 80px;
        object-fit: contain;
        }
    </style>
</head>
<body>
<header>
        <a href="index.php" class="logos"><img src="logo.png" width="70px"></a>
        <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar"><img src="menu.png" width="30px" height="30px"></label>

        <nav class="navbar" navbar-expand-lg>
            <ul>
                <li><a>Categories</a>
                <ul>
                <?php
                    getcategories();
                ?>
                </ul>
                </li>
                <li><a href="about.php">About Us</a></li>
                <li class="nav-item"><a href="users_area/user_login.html">Login</a></li>
                <li><a href="cart.php"><img src="cart.png" width="30px" height="30px"><sup><?php cart_item(); ?></sup></a></li>
                
            </ul>
            
        </nav>       
    </header>
        <div class="row">
        <div class="col-md-12">
        <div class="container">
            <div class="row pt-20px">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    <?php
                        global $con;
                        $get_ip_address=getIPAddress();
                        $total_price=0;
                        $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                        $result=mysqli_query($con, $cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                    <tbody>";
                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_products="select * from products where product_id='$product_id'";
                            $result_products=mysqli_query($con, $select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                       
                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php
                            $get_ip_address=getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_products_quantity=mysqli_query($con, $update_cart);
                                $total_price=$total_price*$quantities;
                            }
                        ?>
                        <td><?php echo $price_table ?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <input class="px-3 py-2 border-0 mx-3" name="update_cart" type="submit" value="Update Cart">
                            <!-- <button class="px-3 py-2 border-0 mx-3">Remove</button> -->
                            <input class="px-3 py-2 border-0 mx-3" name="remove_cart" type="submit" value="Remove Cart">
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    else{
                        echo "<h2 class='text-center'>Cart is empty</h2>";
                    }
                    ?>
                </tbody>
                </table>
                <div class="d-flex mb-3">
                    <?php
                        $get_ip_address=getIPAddress();
                        $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                        $result=mysqli_query($con, $cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "<h4 class='px-3'>Total: <strong> $total_price/-</strong></h4>
                            <button class='px-3 py-2 border-0 mx-3'><a href='checkout.php' class='text-dark text-decoration-none'>Checkout</a></button>";
                        }
                        ?>
            </div>
        </div>
                <?php
                    get_unique_categories();
                    cart();
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip;  
                ?>
        </div>
        </form>

        <?php
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete from cart_details where product_id=$remove_id";
                        $run_delete=mysqli_query($con, $delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php', '_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=remove_cart_item();
        ?>
        
        <?php include("./includes/footer.php") ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: Arial, Helvetica, sans-serif;
    text-transform: capitalize;
    text-decoration: none;
}
body{
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    padding-top: 100px;
}
header{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: #cf9393;
    box-shadow: 0 5px 10px #000;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
}
header .logos{
    font-weight: bolder;
    font-size: 25px;
    color: #333;
}
header .search{
    display: block;
    align-items: center;
    font-weight: bolder;
    font-size: 18px;
}
header .navbar ul{
    display: inline-block;
    list-style-type: none;
}
header .navbar ul li{
    position: relative;
    float: left;
}
header .navbar ul li a{
    font-size: 20px;
    padding: 20px;
    color: #000;
    display: block;
    text-decoration: none;
}
header .navbar ul li a:hover{
    color: #fff;
}
header .navbar ul li a:hover img{
    transform: scale(1.2);
}
header .navbar ul li ul{
    position: absolute;
    left: 0;
    width: 150px;
    background: #cf9393;
    display: none;
}
header .navbar ul li:Focus-within > ul,
header .navbar ul li:hover > ul{
    display: initial;
}
#menu-bar{
    display: none;
}
header label{
    font-size: 20px;
    color: #333;
    cursor: pointer;
    display: none;
}


@media(max-width:991px){
    header{
        padding: 20px;
    }
    header label{
        display: initial;
    }
    header .navbar{
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #cf9393;
        border-top: 1px solid #000;
        display: none;
    }
    header .navbar ul li{
        width: 100%;
    }
    header .navbar ul li ul{
        position: relative;
        width: 100%;
    }
    header .navbar ul li ul li{
        background: #caa0a0;
    }
    #menu-bar:checked ~ .navbar{
        display: initial;
    }
}
</style>
</html>