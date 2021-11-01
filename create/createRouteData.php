<?php
    include "../connect/connect.php";

    // for( $i=1; $i<=100; $i++ ){
    //     $regTime = time();

    //     $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardContent, boardView, regTime) 
    //     VALUES ('2', '게시판 제목입니다.${i}', '게시글 ${i}번째 내용입니다.', '1', '$regTime')";
    
    //     $result = $connect -> query($sql);

    //     if( $result ){
    //         echo "true";
    //     } else {
    //         echo "false";
    //     }

    // }

    $regTime = time();

    $sql = "INSERT INTO myRoute(myMemberID, routeTitle, routeContent, routeView, routeStartX, routeStartY, routeEndX, routeEndY, routeMidX, routeMidY, routeTags, regTime) 
    VALUES ('1', '안산시 중앙동', '중앙동입니다.', '1', '37.31629770190333', '126.83915009768897', '37.31889889422171', '126.83710819702891', '37.31848337281475', '126.84643341726408', '안산시, 고잔동', '$regTime');";

    $result = $connect -> query($sql);

    if ($result) {
        echo "true";
    } else {
        echo "false";
    }

?>