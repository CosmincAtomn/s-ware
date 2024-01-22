<?php

include "../include_dao.php";

$Err = "";
$count = 0;

if(isset($_POST['submit'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $category= new categorie;

        if(!empty($_POST['cat_name']) && $_POST['cat_name'] !== ""){
            $c_name=$_POST['cat_name'];
            $cat_check = DAOFactory::getCategoriesDAO()->queryByCategoryName($c_name);

            if(count($cat_check) == 0){
                $cat_name=$_POST['cat_name'];
                $category->categoryName = htmlspecialchars(trim($cat_name));
                $count+=0;
            }
            else{
                $Err = "Category Already Exists";
                $count+=1;
            }
        }
        else{
            $Err = "Category Name is required";
            $count+=1;
        }
    }

    if($count == 0){
        $category->status="yes";
        $cat_sql=DAOFactory::getCategoriesDAO()->insert($category);
        $Err = "Data Inserted Successfully";
    }
    else{
        // $Err = "You Missed some mandatory fields";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/addCategory.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div class="main" id="main">
            <?php include "header.php"; include "sideMenu.php"; ?>

            <div class="add_container" id="add_container">
                <section id="add_section">
                    <span id="span_Err"><?php echo $Err; ?></span>
                </section>
            
                <section id="add_section">
                    <label for="cat_name">Category Name : </label>
                    <input type="text" name="cat_name" id="cat_name">
                </section>

                <section id="add_section">
                    <label for="submit">
                        <input type="submit" name="submit" id="submit">
                    </label>
                </section>
            </div>
        </div>    
    </form>    
</body>
</html>