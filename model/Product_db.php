<?php
function get_products_by_category($category_id)
{
    /****************************************************
     * Function to get all products by category from DB
     * Parameters: the category ID
     * Returns query array of all products for the ID
     ****************************************************/

    global $db;

    $query = "SELECT * FROM products WHERE categoryID = :category_id ORDER BY productID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":category_id", $category_id);

    try {
        $statement -> execute();        
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    
    $products = $statement -> fetchAll();
    $statement -> closeCursor();
    
    return $products;
}
function get_product($product_id)
{
    
    global $db;
    
    $query = "SELECT * FROM products WHERE productID = :productID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":product-id", $product_id);
    
    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    $product = $statement;
    $statement -> closeCursor();
    
    return $product;
}
function delete_product($product_id)
{
    
    global $db;
    
    $query = "DELETE FROM products WHERE productID = :product_id";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":product_id", $product_id);
    
    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    
    $statement -> closeCursor();
    
}

function delete_product_by_categoryID($category_id)
{

    global $db;

    $query = "DELETE FROM products WHERE categoryID = :categoryID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":categoryID", $category_id);

    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }

    $statement -> closeCursor();

}

function add_products($category_id, $code, $name, $price)
{
    
    global $db;
    
    $query = "INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (:category_id, :code, :name, :price)";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":category_id", $category_id);
    $statement -> bindValue(":code", $code);
    $statement -> bindValue(":name", $name);
    $statement -> bindValue(":price", $price);
    
    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location:../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }
    
    $statement -> closeCursor();
}

function list_products()
{
    global $db;

    $query = "SELECT * FROM products;";
    $statement = $db -> prepare($query);

    try {
        $statement -> execute();
    }
    catch (PDOexception $ex) {
        header("Location: ../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }

    $all_products = $statement -> fetchAll();
    $statement -> closeCursor();

    return $all_products;
};

function update_product($productID, $productCode, $productName, $listPrice)
{
    global $db;

    $query = "UPDATE products SET productCode = :productCode, productName = :productName, listPrice = :listPrice WHERE productID = :productID";
    $statement = $db -> prepare($query);
    $statement -> bindValue(":productID", $productID);
    $statement -> bindValue(":productCode", $productCode);
    $statement -> bindValue(":productName", $productName);
    $statement -> bindValue(":listPrice", $listPrice);


    try {
        $statement -> execute();
    }
    catch (PDOException $ex) {
        header("Location: ../view/Error.php?msg=" . $ex -> getMessage());
        exit();
    }

    $statement -> closeCursor();
};
