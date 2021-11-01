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
    <link rel="stylesheet" href="../assets/css/pageStyle/kakao.css">
    <link rel="stylesheet" href="../assets/css/pageStyle/route_style.css">
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
                            <div class="map">
                                <div class="routeInfo">
                                    <span class="start"></span>
                                    <span class="dropby"></span>
                                    <span class="destination"></span>
                                    <div class="center">
                                        <a href="#">
                                            <p>루트등록</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="map_wrap">
                                   <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>
                                   <div class="hAddr">
                                       <span class="title">지도중심기준 행정동 주소정보</span>
                                       <!-- <span id="centerAddr"></span> -->
                                   </div>
                                </div>
                            </div>
                            <div class="desc_wrap">
                                <form action="createWriteSave.php" name="descWrite" method="post">
                                    <fieldset>
                                        <legend class="ir_so">소개 글쓰기 영역입니다.</legend>
                                        <div class="title">
                                            <label for="descTitle">제목</label>
                                            <input name="descTitle" id="descTitle" class="desc_title"
                                                placeholder="제목을 입력해주세요." required />
                                        </div>
                                        <div class="intro">
                                            <label for="descIntro">소개</label>
                                            <textarea name="descIntro" id="descIntro" rows="4" class="desc_intro"
                                                placeholder="나만의 루트를 사람들에게 소개해주세요!" style="resize: none"
                                                required></textarea>
                                        </div>
                                        <div class="tag">
                                            <label for="descTag">태그</label>
                                            <textarea name="descTag" id="descTag" rows="2" class="desc_tag"
                                                placeholder="태그를 입력해주세요! #힐링 #휴가" style="resize: none"
                                                required></textarea>
                                        </div>
                                    </fieldset>
                                    <div class="desc_btn_wrap">
                                        <button class="desc_btn" type="submit" value="등록하기">등록하기</button>
                                    </div>
                                </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=350d9c7df8ad330744f2f9c8ce42fe24"></script> -->
    <!-- services와 clusterer, drawing 라이브러리 불러오기 -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=350d9c7df8ad330744f2f9c8ce42fe24&libraries=services"></script>
    <script src="../assets/JS/kakao.js"></script>

</body>


</html>