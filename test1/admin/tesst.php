<?php

        if(isset($_REQUEST['text']) && $_REQUEST['text'] !== "" && !isset($_REQUEST["select"])){
            $text=$_REQUEST['text'];
            $content_all = DAOFactory::getContentDAO()->queryByContentName($text);

        }
        elseif(isset($_REQUEST["select"]) && $_REQUEST["select"] !== "" && !isset($_REQUEST["text"])){
            $select = $_REQUEST['select'];
            $content_all = DAOFactory::getContentDAO()->queryByCategoryId($select);                
        }
        elseif(isset($_REQUEST['text']) && $_REQUEST['text'] !== "" && isset($_REQUEST["select"]) && $_REQUEST["select"] !== ""){
            $text=$_REQUEST['text'];
            $select = $_REQUEST['select'];
            $content_all = DAOFactory::getContentDAO()->queryByCategoryContentName($select,$text);
        }
        else{
            $content_all = DAOFactory::getContentDAO()->queryAll();
        }

?>


<?php

        if(isset())

?>