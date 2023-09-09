<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keyword=$_POST['product_keyword'];
        $product_category=$_POST['product_category'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        $product_image1=$_FILES['product_image1']['name'];
        // $product_image2=$_FILES['product_image2']['name'];
        // $product_image3=$_FILES['product_image3']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        // $temp_image2=$_FILES['product_image2']['tmp_name'];
        // $temp_image3=$_FILES['product_image3']['tmp_name'];

        if($product_title=='' or $product_keyword=='' or $product_category=='' or $product_price=='' or $product_image1==''){
            echo "<script>alert('Please fill all the required fills')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            // move_uploaded_file($temp_image2,"./product_images/$product_image2");
            // move_uploaded_file($temp_image3,"./product_images/$product_image3");

            $insert_products="insert into products (product_title, product_description, product_keyword, category_id, product_image1, product_price, date, status) values ('$product_title', '$product_description', '$product_keyword', '$product_category', '$product_image1', '$product_price', NOW(), '$product_status')";
            $result_query=mysqli_query($con, $insert_products);
            if($result_query){
                echo "<script>alert('Product has been inserted successfully')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-20 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off">
            </div>

            <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off">
            </div>

            <div class="form-outline mb-4 w-20 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                        $select_query="Select * from categories";
                        $result_query=mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                    
                </select>
            </div>

            <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!-- <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control">
            </div>
            <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_image3" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control">
            </div> -->

            <div class="form-outline mb-4 w-20 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-20 m-auto">
                <input type="submit" name="insert_product" class="btn mb-3 px-2" value="Insert Product">
            </div>
        </form>
    </div>
</body>
<style>
    body{
        overflow-x:hidden;
    }
</style>
</html>