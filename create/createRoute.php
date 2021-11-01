<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myRoute (";
    $sql .= "myRouteID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "routeTitle varchar(50) NOT NULL,";
    $sql .= "routeContent longtext NOT NULL,";
    $sql .= "routeView int(10) unsigned NOT NULL,";
    $sql .= "routeStartX double unsigned NOT NULL,";
    $sql .= "routeStartY double unsigned NOT NULL,";
    $sql .= "routeEndX double unsigned NOT NULL,";
    $sql .= "routeEndY double unsigned NOT NULL,";
    $sql .= "routeMidX double unsigned NOT NULL,";
    $sql .= "routeMidY double unsigned NOT NULL,";
    $sql .= "routeTags varchar(300) NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (myRouteID)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if($result) {
        echo "Create Board True";
    } else {
        echo "Create Board false";
    }
?>