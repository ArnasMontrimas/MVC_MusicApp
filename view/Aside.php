

<aside>
    <h2>Categories</h2>
    <nav>
        <ul id="nav">
            <?php

            foreach($categories as $category) { ?>
            <li>
                <a href="?category_id=<?php echo $category["categoryID"]; ?>"><?php echo $category["categoryName"]; ?></a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</aside>
