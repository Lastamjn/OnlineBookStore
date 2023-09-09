<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
        <a href="index.php" class="logos"><img src="logo.png" width="70px"></a>
        
        <nav class="navbar" navbar-expand-lg>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <li><a href="">Welcome</a></li>
                    <li><a href="admin_login.html">lasta</a></li>
                </li>
            </ul>
            
        </nav>       
    </header>
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a href="index.php?insert_product" class="nav-link text-dark my-1">Insert Products</a></button>
                <a href="index.php?view_products" class="nav-link text-dark my-1">View Products</a></button>
                <a href="index.php?insert_category" class="nav-link text-dark my-1">Insert Categories</a></button>
                <a href="index.php?view_category" class="nav-link text-dark my-1">View Categories</a></button>
                <a href="" class="nav-link text-dark my-1">All Orders</a></button>
                <a href="" class="nav-link text-dark my-1">All Payments</a></button>
                <a href="" class="nav-link text-dark my-1">List Users</a></button>
                </li> 
            </ul>
        </div>
        <div class="col-md-9">
            <div class="container my-3">
                <?php
                    if(isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }

                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }

                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }

                    if(isset($_GET['edit_products'])){
                        include('edit_products.php');
                    }

                    if(isset($_GET['delete_products'])){
                        include('delete_products.php');
                    }

                    if(isset($_GET['view_category'])){
                        include('view_category.php');
                    }

                    if(isset($_GET['delete_category'])){
                        include('delete_category.php');
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
    padding-top: 105px;
    overflow-x:hidden;
}
.product_img{
    width: 100px;
    object-fit: contain;
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
header label{
    font-size: 20px;
    color: #333;
    cursor: pointer;
    display: none;
}
/* body .row ul{
    background: #cf9393;
    height: 100%;
} */
</style>
</html>