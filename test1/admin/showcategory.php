<?php

include "../include_dao.php";

$Err = "";

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/showCategory.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form action="" method="POST" id="show_form">
            <?php include "header.php"; include "sideMenu.php"; ?>
            <div class="container">
                <div class="container_head">
                    <span id="span_Err"><?php echo $Err; ?></span>
                    <button type="button" name="add_cat" id="add_cat"><i class="fa fa-add"></i><a href="addCategory.php" >+</a></button>
                </div>

                <div class="container_items">
                    <table id = "show_table">
                        <thead>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>status</th>
                        </thead>
                        <tbody>
                            <?php
                                $cat_all = DAOFactory::getCategoriesDAO()->queryAll();
                                // print_r($cat_all);
                                
                                for($x=0;$x<=count($cat_all)-1;$x++){ ?>
                                    <tr>
                                        <td><?php echo $cat_all[$x]->categoryId; ?></td>
                                        <td><?php echo $cat_all[$x]->categoryName; ?></td>
                                        <td><?php echo $cat_all[$x]->status; ?></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>
</html>