<?php

 /****
  * This is the controller php file possible passed values of $action and $category_id
  *
  * 1) None - then this is the index page so show the default category (categoryID=1)
  * 2) POST input ->
  * 3) GET input
  */

 //Need the following files to connect TO DB and to make Functions available

    require "../model/database.php";
    require "../model/Product_db.php";
    require "../model/Category_db.php";

    //A Variable 'action' is needed, it can be passed by POST, GET or not at all
    //If not at all then make action = default of list_products

    $action = filter_input(INPUT_POST, "action");
    if ($action == NULL){
        $action = filter_input(INPUT_GET, "action");
        if ($action == NULL) {
            $action = "list_products";
        }
    }

    //Now depending on what the value of action perform the following

    switch ($action) {
        case "list_products":
        //No value of action passed
            $category_id = filter_input(INPUT_GET, "category_id", FILTER_VALIDATE_INT);
            if ($category_id == NULL || $category_id == false) {
                $category_id = 1; //Default setting
            }
        //Ok we have a value for $category_id - get the name, get all categories (for menu)

            $category_name = get_category_name($category_id); //Function in model/category_db.php
            $categories = get_categories();                   //Function in model/category_db.php
        //Get the products for the category
            $products = get_products_by_category($category_id); //Function in model/products_db.php
            include "../view/product_list.php";
            break;

        case "delete_product":
        //Ok action is to delete a product, the and the category_id
            $product_id = filter_input(INPUT_POST, "product_id", FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);

            if ($action == NULL || $category_id == false || $product_id == NULL || $product_id == false){
                $error = "Missing or incorrect product_id or category_id";
                include "../view/error.php";
            }
            else {
                delete_product($product_id);    //Function in model/product_db.php
                header("Location: .?category_id=$category_id");
            }
            break;

        case "show_add_form":
        //Add a product display the form from the link at teh bottom of the product_list page
            $categories = get_categories();
            include "../view/product_add.php";
            break;

        case "add_product":
        //Add the product -> action on the add product form
            $category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);
            $code = filter_input(INPUT_POST, "code");
            $name = filter_input(INPUT_POST, "name");
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);

            if ($category_id == NULL || $category_id == FALSE || $code == NULL || $name == NULL || $price == FALSE) {
                //echo $_SERVER["REQUEST_URI"]; //Request URL For TroubleShooting.
                $error = "Invalid product data. Check all fields and try again";
                include "../view/Error.php";
            }
            else {
                add_products($category_id, $code, $name, $price);   //Function in model/product_db.php
                header("Location: .?category_id=$category_id");
            }
            break;
        
        case "show_add_category_form":
        //Display the add category form on the page;
            $categories = get_categories();
            include "../view/category_add.php";
            break;

        case "add_category":
        //Action on the category_add brings you here.
            $categories = get_categories();
            $category_name = filter_input(INPUT_POST, "category_name");
            $bool = true;

            if($category_name == NULL || $category_name == FALSE) {
                $error = "Invalid category data. Check all fields and try again first letter cant be capital!";
                include "../view/Error.php";
            }
            foreach($categories as $category) {
                if($category_name == $category["categoryName"]){
                    $bool = false;
                    $error = "Category already exists try a different name";
                    include "../view/Error.php";
                    break;
                }
            };
            if ($bool == true) {
                add_category($category_name);  //Function in category_add.php
                header("Location: .?category_id=$category_id");
            }
            break;

        case "show_delete_category_form":
            $categories = get_categories();
            include "../view/delete_category.php";
            break;

        case "delete_category":
            $categoryID = filter_input(INPUT_POST, "category_id");
            delete_product_by_categoryID($categoryID);
            delete_category($categoryID);
            header("Location: .?category_id=$category_id");
            break;

        case "update_product_select":
            $categories = get_categories();
            $products = list_products();
            include "../view/update_product_select.php";
            break;

        case "update_product_form":
            $categories = get_categories();
            $product_id = filter_input(INPUT_POST, "product_id");

            if ($product_id == NULL || $product_id == FALSE) {
                $error = "Select a product to update (None was selected)";
                include "../view/Error.php";
            }
            include "../view/update_product_form.php";
            break;

        case "update_product":
            $category_name = "Guitars";
            $products = get_products_by_category(1);
            $bool = false;
            $categories = get_categories();
            $all_products = list_products();
            $product_id = $_POST["product_id"];
            $productName = filter_input(INPUT_POST, "productName");
            $productCode = filter_input(INPUT_POST, "productCode");
            $listPrice = filter_input(INPUT_POST, "listPrice");

            if ($productName == FALSE || $productName == NULL || $productCode == FALSE || $productCode == NULL || $listPrice == FALSE || $listPrice == NULL ) {
                $bool = true;
                $error = "One of the inputs entered is invalid try again";
                include "../view/Error.php";
            }
            foreach ($all_products as $product) {
                if ($product["productCode"] == $productCode ){
                    $bool = true;
                    $error = "Product Code Already Exists try a different one";
                    include "../view/Error.php";
                    break;
                }
            }
            if ($bool == false) {
                update_product($product_id, $productCode, $productName, $listPrice);
                include "../view/product_list.php";
            }

            break;
    }
