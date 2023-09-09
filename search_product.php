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
            <div class="row">
                <h1>asdf</h1>
                <h3>asdf</h3>
                <?php
                    search_product();
                    get_unique_categories();
                ?>
            </div>
        </div>
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