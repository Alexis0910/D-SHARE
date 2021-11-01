<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dshare</title>

    <!--style-->
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <!-- <link rel="stylesheet" href="../assets/css/route_style.css"> -->
    <link rel="stylesheet" href="../assets/css/pageStyle/tmap.css">
</head>

<body>
    <div id="skip">
        <a class="ir_so" href="#contents">컨텐츠 바로가기</a>
        <a class="ir_so" href="footer">푸터 바로가기</a>
    </div>
    <!--//skip-->
    <header id="header">
        <?php 
            include "../include/header.php";
            
        ?>
    </header>
    <!--//header-->
    <main id="contents">
        <section class="container">
            <h2 class="ir_so">드라이브코스</h2>
            <article class="content-article">
                <div class="boardType">
                    <div class="board">

                        <div class="routeView">
                            <div class="routeViewDesc">
                                <?php
                                    $routeID = $_GET['routeID'];

                                    $sql = "SELECT r.routeTitle, r.routeContent, m.youUserName FROM myRoute r JOIN myMember m ON(r.myMemberID = m.myMemberID) 
                                        WHERE r.myRouteID = {$routeID}";

                                    $result = $connect -> query($sql);

                                    if ($result) {
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                                        echo "<h1>".$info['routeTitle']."</h1>";
                                        echo "<span></span>";
                                        echo "<h5>".$info['youUserName']."</h5>";
                                        echo "<h3>".$info['routeContent']."</h3>";
                                        // echo "<h3>" . date('Y-m-d H:i', $info['regTime']) . "</h3>";
                                    }
                                ?>

                                <!-- <h1>파주시 임진각 관광지</h1>
                                <span></span>
                                <h5>UserName</h5>
                                <h3>평화로운 마음이 드는 코스. 도착지 주변에 평화랜드가 있어 유원지 구경하기에도 좋고, 주변에 유명한 베이커리 카페가 있다.</h3> -->
                            </div>

                            <!-- 안내, 지도묶음 -->
                            <div id="mapWrap">
                                <div class="map">
                                    <div class="routeInfo">
                                        <button id="start"></button>
                                        <button id="dropby"></button>
                                        <button id="destination"></button>
                                        <div class="center">
                                            <div class="option-bar__column__checkbox">
                                                <p>
                                                    <input type="checkbox" name="checkbox1" id="checkbox1" /><label
                                                        for="checkbox1"></label>
                                                    <br />
                                                    <input type="checkbox" name="checkbox2" id="checkbox2"
                                                        value="true" /><label for="checkbox2"></label>
                                                </p>
                                            </div>
                                            <a href="#">
                                                <button id="navigate">안내 시작</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- tmap-->
                                <div id="container">
                                    <div class="option-bar">
                                    </div>
                                    <div class="Tmapmain">
                                        <div class="main__header">
                                            <span class="main__header__result"> </span>
                                        </div>
                                        <div class="main__map main__map-empty" id="map"></div>
                                    </div>
                                </div>
                                <!-- //tmap -->
                            </div>
                            <div class="interation">
                                <div class="heart">
                                    <div class="like"></div>
                                    <p>1,234</p>

                                    <?php 
                                        $routeID = $_GET['routeID'];

                                        $sql = "SELECT myMemberID FROM myRoute WHERE myRouteID = {$routeID};";

                                        $result = $connect -> query($sql);

                                        $info = $result -> fetch_array(MYSQLI_ASSOC);

                                        if( $info['myMemberID'] == $_SESSION['myMemberID'] ){ ?>
                                                    <a href="routeDelete.php?routeID=<?= $_GET['routeID'] ?>"
                                                        onclick="if(!confirm('정말 삭제하시겠습니까?')){return false;}"><button
                                                            class="delete">삭제하기</button></a>
                                                    <?php
                                        } else {
                                        }
                                    ?>
                                </div>

                                <div class="tags">
                                    <!-- <a href="#"> <span>#힐링</span></a>
                                    <a href="#"> <span>#휴가</span></a>
                                    <a href="#"> <span>#산뜻</span></a>
                                    <a href="#"> <span>#여름</span></a> -->
                                    <?php
                                        $routeID = $_GET['routeID'];

                                        $sql = "SELECT routeTags FROM myRoute WHERE myRouteID = {$routeID}";

                                        $result = $connect -> query($sql);

                                        if ($result) {
                                            $info = $result->fetch_array(MYSQLI_ASSOC);

                                            // var_dump($info["routeTags"]);

                                            $tag = explode('#', $info["routeTags"]);

                                            for ($i = 1; $i < count($tag); $i++) {
                                                echo "<a href='#'><span>#".$tag[$i]."</span></a>";
                                            }

                                            // echo "<a href='#'><span>".$temp[1]."</span></a>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="comments">
                                <h4>Comments</h4>
                                <input type="input" name="comment" class="form-comment" placeholder="댓글을 입력해주세요." />
                                <button>확인</button>
                            </div> -->

                            <div id="comment">
                                <!-- 댓글 쓰기 -->
                                <div class="comment-form">
                                    <form action="../comment/commentSave.php" method="post" name="comment">
                                        <fieldset>
                                            <legend class="ir_so">댓글 영역</legend>
                                            <h4>Comments</h4>
                                            <div class="comment-wrap">
                                                <!-- <div>
                                                    <label for="youUserName" class="ir_so">이름</label>
                                                    <input type="text" name="youUserName" id="youUserName" class="input_write2" placeHolder="이름" autocomplete="off" maxlength="10" required>
                                                </div> -->
                                                <div class="text">
                                                    <label for="youText" class="ir_so">댓글</label>
                                                    <input type="text" name="youText" id="youText" class="input_write2"
                                                        placeHolder="댓글을 입력해주세요" autocomplete="off" required>
                                                </div>
                                                <button class="btn_submit" type="submit" value="확인">확인</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <!-- 댓글 보기 -->
                                <div class="comment-list">
                                    <?php
                                        include "../connect/connect.php";

                                        $sql = "SELECT * FROM myComment LIMIT 10";
                                        $result = $connect -> query($sql);

                                        // echo "<pre>";
                                        // var_dump(mysqli_fetch_array($result));
                                        // echo "</pre>";

                                        while($info = mysqli_fetch_array($result)){
                                    ?>
                                    <div class="list">
                                        <div class="list-info">
                                            <div class="list-cont01">
                                                <img src="../assets/img/profile.svg" alt="프로필 사진">
                                                <span class="name"><?=$info['youUserName']?></span>
                                            </div>
                                            <div class="list-cont02">
                                                <p><?=$info['youText']?></p>
                                                <span class="date"><?=date('Y-m-d H:i', $info['regTime'])?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                    <!-- <div>
                                        <p>저 신청하겠습니다!</p>
                                        <div>
                                            <img src="https://coop97.github.io/dothome21/class/img/img11.jpg" alt="순두부 아이스크림">
                                            <span>황기우</span>
                                            <span>2021-09-16</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <!--contents-->
    <footer>
        <?php
            include "../include/footer.php";
        ?>
    </footer>
    <!--footer-->

    <script
        src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=l7xx46c00b11477744339549d3160f8ae14a">
    </script>
    <script src="../assets/JS/data.js"></script>
    <script src="../assets/JS/whentogo.js"></script>
    <script src="../assets/JS/findpath.js"></script>
    <script src="../assets/JS/logic.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=350d9c7df8ad330744f2f9c8ce42fe24"></script> -->
</body>
<script>
    $(".like").click(function () {
        if ($(".like").hasClass("active")) {
            $(".like").removeClass("active");
        } else {
            $(".like").addClass("active");
        }
    });
</script>


</html>