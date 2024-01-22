<?php

function sanitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data= stripslashes($data);

    return $data;
}

include "../include_dao.php";

$count = 0;
$Err = "";

// variables
$cat_id = $c_name=$contentPath = $imagePath = $desc = $remarks = "";

// Err variables
$cat_idErr = $c_nameErr= $c_fileErr =$c_imageErr = '';

$content = new content;

// if(isset($_SERVER['REQUEST_METHOD']) === "POST"){
    if(isset($_POST['submit'])){
        // category Id 
        if(!empty($_POST['cat_id']) && $_POST['cat_id'] != "" && $_POST['cat_id'] != "select"){
            $cat_id = $_POST['cat_id'];
            $count+=0;
        }
        else{
            $cat_idErr = "cat name is required";
            $count+=1;
        }

        // file Name
        if(!empty($_POST['c_name']) && $_POST['c_name'] !== ""){
            $name = sanitize($_POST['c_name']);
            $nameCheck = DAOFactory::getContentDAO()->queryByContentName($name);
            if(count($nameCheck) === 0){
                $c_name=$_POST['c_name'];
                $count+=0;
            }
            else{
                $c_nameErr = "Name already exists";
                $count+=1;
            }
        }
        else{
            $c_nameErr = "name is required";
            $count+=1;
        }

        // content path
        if(isset($_FILES['c_file']['name']) && $_FILES['c_file']['name'] !== ""){
            $file = $_FILES['c_file'];

            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];

            $pathinfo = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
            $file_path1 = "uploads/contentFile/";
            $timestamp = date("YmdHis");
            $f_name_split = explode(".",$file_name);
            if(count($f_name_split) <= 2){
                if(true){
                    $contentPath = $file_path1.$f_name_split[0].$timestamp.".".$pathinfo;
                }else{
                    $Err = "Allowed Formats Only";
                    $count+=1;
                }
            }
            else{
                $c_fileErr = "Multiple extention found";
                $count+=1;
            }    
        }

        // image path
        if(isset($_FILES['c_image']['name']) && $_FILES['c_image']['name'] !== ""){
            $image = $_FILES['c_image'];

            $image_name = $image['name'];
            $image_temp = $image['tmp_name'];

            $image_pathinfo = strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
            $image_path1 = "uploads/contentImage/";
            $timestamp = date("YmdHis");
            $i_name_split = explode(".",$image_name);
            if(count($i_name_split) <= 2){
                if(true){
                    $imagePath = $image_path1.$i_name_split[0]." "."-"." ".$timestamp.".".$image_pathinfo;
                }else{
                    $c_imageErr = "Allowed Formats Only";
                    $count+=1;
                }
            }
            else{
                $c_imageErr = "Multiple extention found";
                $count+=1;
            }    
        }

        // Description
        if(isset($_POST['desc']) && $_POST['desc'] !== ""){
            $desc = $_POST['desc'];
            $count += 0;
        }

        // remarks
        if(isset($_POST['remarks']) && $_POST['remarks'] !== ""){
            $remarks = $_POST['remarks'];
            $count += 0;
        }   

        // data insertion
        if($count == 0){
            $content->categoryId = sanitize($cat_id);
            $content->contentName = sanitize($c_name);
            $content->filePath = sanitize($contentPath);
            $content->imagePath = sanitize($imagePath);
            $content->uploadTime = date("ymdhis");
            $content->description = sanitize($desc);
            $content->remarks = sanitize($remarks);
            $content->status = "yes";

            $contentInsert=DAOFactory::getContentDAO()->insert($content);

            if($contentInsert){
                move_uploaded_file($file_temp,$contentPath);
                move_uploaded_file($image_temp,$imagePath);

                $Err = "data inserted successfully";
            }
            else{
                $Err = "data not inserted";
            }
        }    
        else{
            $Err = "mandatory fields";
        }
        
    }        
    else{
        $Err = "mandatory fields";
    }
// }

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/addContent.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main" id="main">
        <?php include "header.php"; include "sideMenu.php"; ?>

        <div class="add_container" id="add_container">
            <form id="addContent" action="" method="POST" enctype="multipart/form-data">

                <div class="sub_head">
                    <span id="span_H_Err">* <?php echo $Err; ?></span>
                </div>

                <!-- Category selection -->
                <section id="add_section">
                    <label for="cat_id">Select Categorie : </label>
                    <select name="cat_id" id="cat_id">
                        <option value="select">Select</option>
                        <?php
                            $cat_sql=DAOFactory::getCategoriesDAO()->queryAll();
                            // print_r($cat_sql);exit;

                            for($x=0;$x<=count($cat_sql)-1;$x++){ ?>
                            <option value="<?php echo $cat_sql[$x]->categoryId; ?>"><?php echo $cat_sql[$x]->categoryName; ?></option>   
                        <?php } ?>
                    </select>
                    <span id="span_Err"><?php echo $cat_idErr; ?></span>
                </section>
                
                <!-- Name of the file -->
                <section id="add_section">
                    <label for="c_name">Name of the file : </label>
                    <input type="text" name="c_name" id="c_name">
                    <span id="span_Err"><?php echo $c_nameErr; ?></span>
                </section>

                <!-- content path -->
                <section id="add_section">
                    <label for="c_file">Content File : </label>
                    <input type="file" name="c_file" id="c_file">
                    <span id="span_Err"><?php echo $c_fileErr; ?></span>
                </section>

                <!-- content image path -->
                <section id="add_section">
                    <label for="c_image">Content image : </label>
                    <input type="file" name="c_image" id="c_image">
                    <span id="span_Err"><?php echo $c_imageErr; ?></span>
                </section>

                <!-- Description -->
                <section id="add_section">
                    <label for="desc">About the file : </label>
                    <textarea name="desc" id="desc" cols="30" rows="1"></textarea>
                    <!-- <input type="textarea" name="desc" id="desc"> -->
                </section>

                <!-- Remarks -->
                <section id="add_section">
                    <label for="remarks">Remarks : </label>
                    <textarea name="remarks" id="remarks" cols="30" rows="1"></textarea>
                </section>

                <!-- submit -->
                <section id="add_section_submit" style="text-align:center;width:70%;">
                    <input type="submit" name="submit" id="submit">
                </section>
            </form>
        </div>
    </div>

</body>
</html>