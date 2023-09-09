<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include('index.php');
    ?>
    <div class="row">
        <div class="col-md-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a href="insert_product.php" class="nav-link text-dark my-1">Insert Products</a></button>
                <a href="" class="nav-link text-dark my-1">View Products</a></button>
                <a href="home.php?insert_category" class="nav-link text-dark my-1">Insert Categories</a></button>
                <a href="" class="nav-link text-dark my-1">View Categories</a></button>
                <a href="" class="nav-link text-dark my-1">All Orders</a></button>
                <a href="" class="nav-link text-dark my-1">All Payments</a></button>
                <a href="" class="nav-link text-dark my-1">List Users</a></button>
                </li> 
            </ul>
        </div>
        <div class="col-md-9">
            <div class="container my-2">
                <?php
                    if(isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html> 