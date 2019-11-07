<?php

function get_categories()
{
    global $db;
    $query = "SELECT * FROM categories ORDER BY categoryID";

    $statement = $db -> prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        // Redirect to error page passing the error message;
        header("Location:../view/Error.php?msg=" . $ex->getMessage());
    }

    $categories = $statement -> fetchAll();
    $statement->closeCursor();

    return $categories;
};

function get_category_name($category_id)
{
    /************************************************
     * Function to get all category names from DB
     * Parameters: the category ID
     * Returns: the category name for the ID
     ************************************************/

    global $db;

    $query = "SELECT * FROM categories WHERE categoryID = :category_id";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":category_id", $category_id);

    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
    }

    $category = $statement -> fetch();
    $category_name = $category["categoryName"];
    $statement -> closeCursor();

    return $category_name;
};

function add_category($category_name) 
{
    global $db;

    $query = "INSERT INTO categories (categoryID, categoryName) VALUES (NULL, :categoryName)";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":categoryName", $category_name);

    try {
        $statement -> execute();
    }
    catch (PDOexception $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    $statement -> closeCursor();
};

function delete_category($categoryID) 
{
    global $db;

    $query = "DELETE FROM categories WHERE categoryID = :categoryID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":categoryID", $categoryID);

    try {
        $statement -> execute();
    }
    catch (PDOexception $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    $statement -> closeCursor();
};
