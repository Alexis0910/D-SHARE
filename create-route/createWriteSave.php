<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $routeTitle = $_POST['descTitle'];
    $routeContent = $_POST['descIntro'];
    $routeTag = $_POST['descTag'];

    // echo $boardTitle, $boardContent;

    $myMemberID = $_SESSION['myMemberID'];
    $routeTitle = $connect -> real_escape_string($routeTitle);
    $routeContent = $connect -> real_escape_string($routeContent);
    $routeView = 0;
    $routeStartX = 0;
    $routeStartY = 0;
    $routeEndX = 0;
    $routeEndY = 0;
    $routeMidX = 0;
    $routeMidY = 0;
    $routeTag  = $connect -> real_escape_string($routeTag);
    $regTime = time();

    //데이터 입력
    $sql = "INSERT INTO myRoute(myMemberID, routeTitle, routeContent, routeView, routeStartX, routeStartY, routeEndX, routeEndY, routeMidX, routeMidY, routeTags, regTime) ";
    $sql .= "VALUES ('$myMemberID', '$routeTitle', '$routeContent', '$routeView', '$routeStartX', '$routeStartY', '$routeEndX', '$routeEndY', '$routeMidX', '$routeMidY', '$routeTag', '$regTime');";

    $result = $connect -> query($sql);

    if( $result ){
        echo "goood";
    } else {
        echo "BAD";
    }
?>
<script>
    location.href = "../route-pop/routelist.php";
</script>