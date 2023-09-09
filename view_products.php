<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All Products</h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Book Image</th>
                <th>Book Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $get_products="select * from products";
                $result=mysqli_query($con, $get_products);
                $number=0;
                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $product_status=$row['status'];
                    $number++;
                    ?>
                     <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img'/></td>
                    <td><?php echo $product_price; ?>/-</td>
                    <td><?php
                        $get_count="select * from order_pending where product_id=$product_id";
                        $result_count=mysqli_query($con, $get_count);
                        $rows_count=mysqli_num_rows($result_count);
                        echo $rows_count;
                    ?></td>
                    <td><?php echo $product_status; ?></td>
                    <td><a href='index.php?edit_products' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_products=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>