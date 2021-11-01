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
    <link rel="stylesheet" href="../assets/css/pageStyle/tmap.css">
    <!-- <link rel="stylesheet" href="../assets/css/pageStyle/creatRoute.css"> -->
    <style>

    </style>
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
                                <h1>루트 등록하기</h1>
                                <h3>나만 알고 있는 루트를 사람들과 공유해보세요!</h3>
                            </div>
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
                                                    for="checkbox1"
                                                    ></label
                                                    >
                                                    <br />
                                                    <input
                                                    type="checkbox"
                                                    name="checkbox2"
                                                    id="checkbox2"
                                                    value="true"
                                                    /><label for="checkbox2"></label>
                                                </p>
                                            </div>
                                            <a href="#">
                                                <button id="navigate">안내 시작</button>
                                            </a>
                                        </div>
                                    </div> 
                                </div>
                                <!-- tmap시작 -->
                                <div id="container">
                                    <div class="option-bar">

                                    </div>

                                    <div class="main">
                                      <div class="main__header">
                                        <span class="main__header__result"> </span>
                                      </div>
                                      <div class="main__map main__map-empty" id="map"></div>
                                    </div>
                                  </div>
                                <!-- //tmap -->
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


    <script src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=l7xx46c00b11477744339549d3160f8ae14a"></script>
    <script src="../assets/JS/data.js"></script>
    <script src="../assets/JS/whentogo.js"></script>
    <script src="../assets/JS/findpath.js"></script>
    <script src="../assets/JS/logic.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
<!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=350d9c7df8ad330744f2f9c8ce42fe24"></script> -->


</body>


</html>