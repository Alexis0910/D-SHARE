<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_GET['boardID'];

    $youUserName = $_POST['youUserName'];
    $youText = $_POST['youText'];
    $regTime = time();


    $sql = "INSERT INTO myComment(youUserName, youText, regTime) VALUES('$youUserName', '$youText', '$regTime')";

    $result = $connect -> query($sql);

    // if($result) {
    //     echo "INSERT INTO true";
    // } else {
    //     echo "INSERT INTO false";
    // }

    echo $boardID;
?>

<script>
    location.href = "../route-pop/routeView.php?routeID=";
</script>