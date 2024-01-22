<?php



?>  

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adminHome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form action="">
            <div class="container">
                <div class="container_head">
                    <!-- <span id="span_Err"><?php// echo $Err; ?></span>
                    <select name="" id=""></select>
                    <input type="text" name="searchText" id="searchText">
                    <input type="submit" name="searchSubmit" id="searchSubmit"> -->
                </div>

                <div class="container_items">
                    <table id="latest_table">
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
                            
                                $latest_sql = DAOFactory::getContentDao()->queryByContentName($value);

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>
</html>