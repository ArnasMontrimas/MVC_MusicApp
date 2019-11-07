<?php
include "header.php"; ?>
    <main>
        <?php
        include "Aside.php";
        ?>
        <section>
            <h1>Update Product</h1>
            <form action="../controller/index.php" method="post" id="update_product_form">
                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                <input type="hidden" name="action" value="update_product">
                <label for="productCode">Product Code:
                    <input type="text" name="productCode">
                </label>
                <br>
                <label for="productName">Product Name:
                    <input type="text" name="productName">
                </label>
                <br>
                <label for="listPrice">Price:
                    <input type="text" name="listPrice">
                </label>
                <br>
                <br>
                <label for="submit">&nbsp
                    <input type="submit" value="Update Product" name="submit">
                </label>
                <br>
            </form>
        </section>
    </main>
<?php include "footer.php"?>