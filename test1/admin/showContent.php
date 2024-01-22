<?php

include "../include_dao.php";

$Err = "";

$content_all = DAOFactory::getContentDAO()->queryAll();

    if(isset($_REQUEST['text']) && $_REQUEST['text'] !== "" && !isset($_REQUEST["select"])){
        $text=base64_decode($_REQUEST['text']);
        $content_all = DAOFactory::getContentDAO()->queryByText($text);

    }
    elseif(isset($_REQUEST["select"]) && $_REQUEST["select"] !== "" && !isset($_REQUEST["text"])){
        $select = base64_decode($_REQUEST['select']);
        $content_all = DAOFactory::getContentDAO()->queryByCategoryId($select);                
    }
    elseif(isset($_REQUEST['text']) && $_REQUEST['text'] !== "" && isset($_REQUEST["select"]) && $_REQUEST["select"] !== ""){
        $text=base64_decode($_REQUEST['text']);
        $select = base64_decode($_REQUEST['select']);
        $content_all = DAOFactory::getContentDAO()->queryByCategoryContentName($select,$text);
    }
    else{
        $content_all = DAOFactory::getContentDAO()->queryAll();
    }


if(isset($_POST['searchSubmit'])){
    if(isset($_POST['searchText']) && $_POST['searchText'] !== "" && $_POST["searchSelect"] == "select" || $_POST["searchSelect"]  == "" || !isset($_POST["searchSelect"]) ){
        $text=$_POST['searchText'];
        header("location:showContent.php?text=".base64_encode($text));

    }
    elseif(isset($_POST["searchSelect"]) && $_POST["searchSelect"] !== "select" && $_POST["searchText"] === "" && empty($_POST["searchText"])){
        $select = $_POST['searchSelect'];
        header("location:showContent.php?select=".base64_encode($select));
              
    }
    elseif(isset($_POST['searchText']) && $_POST['searchText'] !== "" && isset($_POST["searchSelect"]) && $_POST["searchSelect"] !== "select"){
        $text=$_POST['searchText'];
        $select = $_POST['searchSelect'];
        header("location:showContent.php?text=".base64_encode($text)."&select=".base64_encode($select));
    }
    else{
        $Err = "no Option selected";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/showContent.css">
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
                    <select name="searchSelect" id="searchSelect">
                        <option value="select">select</option>
                        <?php 
                            $cat_option = DAOFactory::getCategoriesDAO()->queryAll();

                            for($x=0;$x<=count($cat_option)-1;$x++){ ?>
                                <option value="<?php echo $cat_option[$x]->categoryId; ?>"><?php echo $cat_option[$x]->categoryName; ?></option>
                        <?php
                            }
                         ?>
                    </select>
                    <input type="text" name="searchText" id="searchText">
                    <input type="submit" name="searchSubmit" id="searchSubmit">
                </div>

                <div class="container_items">
                    <table id = "show_table">
                        <thead>
                            <th>Content Id</th>
                            <th>Category Id</th>
                            <th>Content Name</th>
                            <th>File</th>
                            <th>Image</th>
                            <th>Upload Time</th>
                            <th>Description</th>
                            <th>Remarks</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                                // $content_all = DAOFactory::getContentDAO()->queryAll();
                                // print_r($content_all);
                                
                                for($x=0;$x<=count($content_all)-1;$x++){ ?>
                                    <tr>
                                        <td><?php echo $content_all[$x]->contentId; ?></td>
                                        <td>
                                            <?php 
                                            $catByContent = DAOFactory::getCategoriesDAO()->load($content_all[$x]->categoryId);
                                            echo $catByContent->categoryName;
                                            ?>
                                        </td>
                                        <td><?php echo $content_all[$x]->contentName; ?></td>
                                        <td>
                                            <?php
                                                $f_path = explode("/",$content_all[$x]->filePath);
                                                $f_path = array_reverse($f_path);
                                                echo $f_path[0];
                                            ?>
                                            <a download href="<?php echo $content_all[$x]->filePath; ?>">\|/</a>
                                        </td>
                                        <td>
                                            <?php
                                                if(isset($content_all[$x]->imagePath) && $content_all[$x]->imagePath !== ""){ ?>
                                                    <img src="<?php echo $content_all[$x]->imagePath; ?>" width="100" height="70" alt="File image">
                                                <?php }
                                                else{
                                                    echo "";
                                                } ?>
                                        </td>
                                        <td><?php echo $content_all[$x]->uploadTime; ?></td>
                                        <td><?php echo $content_all[$x]->description; ?></td>
                                        <td><?php echo $content_all[$x]->remarks; ?></td>
                                        <td><?php echo $content_all[$x]->status; ?></td>
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
