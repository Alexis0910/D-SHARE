<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $routeID = $_GET['routeID'];
    $routeID = $connect -> real_escape_string($routeID);

    $sql = "DELETE FROM myRoute WHERE myRouteID = {$routeID}";
    $connect -> query($sql);

    if($result == true){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        //echo "<pre>";
        //var_dump($_SESSION);
        //echo "</pre>";
    } ($result == false)     
?>


<script>
    location.href = "../route-pop/routelist.php";
</script>