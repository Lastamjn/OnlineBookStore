<?php
    if(isset($_GET['delete_category'])){
        $delete_id=$_GET['delete_category'];
        
        $delete_category="Delete from categories where category_id=$delete_id";
        $result_product=mysqli_query($con, $delete_category);
        if($result_product){
            echo "<script>alert('Category deleted successfully')<script>";
            echo "<script>window.open('./index.php', '_self')<script>";
        }
    }
?>