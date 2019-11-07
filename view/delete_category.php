<?php  include "header.php" ?>

<main>
<?php include "Aside.php" ?>
    <section>
        <h1>Delete Category</h1>

        <form action="../controller/index.php" method="post" id="show_delete_category_form">
            <input type="hidden" name="action" value="delete_category">
            <br>
            <select name="category_id" class="">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category["categoryID"]; ?>">
                        <?php echo $category["categoryName"]; ?>
                    </option>
                <?php } ?>
            </select>
            <label for="submit">&nbsp;</label>
            <input type="submit" name="submit" value="Delete Category">
        </form>
    </section>
</main>