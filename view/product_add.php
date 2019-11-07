<?php
    include "header.php"; ?>
<main>
<?php
    include "Aside.php";
?>
    <section>
        <h1>Add Product</h1>
        <form action="../controller/index.php" method="post" id="add_product_form">
            <input type="hidden" name="action" value="add_product">
            <label for="category_id">Category: </label>
            <select name="category_id" class="">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category["categoryID"]; ?>">
                        <?php echo $category["categoryName"]; ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <label for="code">Code:</label>
            <input type="text" name="code" placeholder="Enter Product Code" required>
            <br>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="Enter Product Name" required>
            <br>
            <label for="price">Price: </label>
            <input type="text" name="price" placeholder="Enter Product List Price" required>
            <br><br>
            <label for="submit">&nbsp;</label>
            <input type="submit" value="Add Product" name="submit">
            <br>
        </form>
    </section>
</main>
<?php include "footer.php"?>
