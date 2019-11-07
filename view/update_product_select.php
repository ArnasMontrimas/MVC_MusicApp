<?php
include "header.php"; ?>
<main>
    <?php
    include "Aside.php";
    ?>
    <section>
        <h1>Update Product</h1>
        <form action="../controller/index.php" method="post" id="update_product_select">
            <input type="hidden" name="action" value="update_product_form">
            <label for="product_id">Products:
                <select name="product_id" class="">
                <?php foreach ($products as $product) { ?>
                    <option value="<?php echo $product["productID"]; ?>">
                        <?php echo $product["productCode"] . ": " . $product["productName"]; ?>
                    </option>
                <?php } ?>
                </select>
            </label>
            <label for="submit">&nbsp</label>
            <input type="submit" value="Update Product" name="submit">
            <br>
        </form>
    </section>
</main>
<?php include "footer.php"?>
