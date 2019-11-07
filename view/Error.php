<!DOCTYPE html>
<?php

include "header.php"; ?>
<main>
    <h1>Error Page</h1>

    <section>
        <?php
            $error_msg = filter_input(INPUT_GET, "msg");
            if ($error_msg == NULL) {
                echo "Error is: " . $error;
            }
            else {
                echo "Error is: " . $error_msg;
            }
        ?>
    </section>
    <p class="last_paragraph">
        <a href="../controller/index.php?action=list_products">Return Home</a>
    </p>
</main>
<?php include "footer.php"; ?>
