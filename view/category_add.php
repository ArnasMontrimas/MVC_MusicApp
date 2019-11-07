<?php  include "header.php" ?>

<main>
<?php include "Aside.php" ?>
    <section>
        <h1>Add Category</h1>

        <form action="../controller/index.php" method="post" id="add_category_form">
            <input type="hidden" name="action" value="add_category">
            <br>
            <label for="name">Name:</label>
            <input type="text" name="category_name" placeholder="Enter Category Name" required>
            <br><br>
            <label for="submit">&nbsp;</label>
            <input type="submit" name="submit" value="Add Category">
        </form>
    </section>
</main>