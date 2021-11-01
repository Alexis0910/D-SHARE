<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myLike (";
    $sql .= "rg_id int(11) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "myMemberID int(20) unsigned NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (rg_id)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Like True";
    }else{
        echo "Create Like False";
    }
?>