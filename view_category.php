<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All Categories</h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr class='text-center'>
                <th>SNo</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select_cat="select * from categories";
                $result=mysqli_query($con, $select_cat);
                $number=0;
                while($row=mysqli_fetch_assoc($result)){
                    $category_id=$row['category_id'];
                    $category_title=$row['category_title'];
                    $number++;
                    ?>
                     <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $category_title; ?></td>
                    <td><a href='' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>