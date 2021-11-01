<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

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
    <link rel="stylesheet" href="../assets/css/pageStyle/route_style.css">
</head>

<style>
    body {
        font-family: 'S-CoreDream' !important;
    }
</style>

<body>
    <div id="skip">
        <a class="ir_so" href="#contents">컨텐츠 바로가기</a>   
        <a class="ir_so" href="#footer">푸터 바로가기</a>
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
                    <?php
                        $searchKeyword = $_GET['searchKeyword'];
                        $searchOption = $_GET['searchOption'];
                        //echo $searchOption, $searchKeyword;


                        if ($searchKeyword == '' || $searchKeyword == null) {
                            echo "<p>검색어가 없습니다.</p>";
                        }
                    ?>
                    <div class="board">
                        <div class="board-search">
                            <form action="routeSearch.php" name="boardSearch" method="get">
                                <fieldset>
                                    <select name="searchOption" id="searchOption" class="form-select">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                    <legend class="ir_so">게시한 검색 영역</legend>
                                    <input type="search" name="searchKeyword" class="form-search"
                                        placeholder="검색어를 입력하세요" aria-label="search" required>
                                    <button type="submit" action="routeSearch.php" class="form-btn">검색</button>
                                </fieldset>
                            </form>
                        </div>
                        <div class="route">
                            <div class="route_wrap">

                                <?php
                                    $searchKeyword = $connect->real_escape_string($searchKeyword);
                                    $searchOption = $connect->real_escape_string($searchOption);

                                    $sql = "SELECT r.myRouteID, r.routeTitle, r.routeContent, m.youUserName, r.regTime, r.routeTags FROM myMember m JOIN myRoute r ON (m.myMemberID = r.myMemberID)";

                                    switch ($searchOption) {
                                        case 'title':
                                            $sql .= "WHERE r.routeTitle LIKE '%{$searchKeyword}%' ORDER BY myRouteID DESC LIMIT 10";
                                            break;
                                        case 'content':
                                            $sql .= "WHERE r.routeContent LIKE '%{$searchKeyword}%' ORDER BY myRouteID DESC LIMIT 10";
                                            break;
                                        case 'name':
                                            $sql .= "WHERE m.youUserName LIKE '%{$searchKeyword}%' ORDER BY myRouteID DESC LIMIT 10";
                                            break;
                                    }

                                    $result = $connect->query($sql);

                                    if($result){
                                        $count = $result -> num_rows;
                                        echo "<p class='pBlock'>총 " . $count . "건이 검색되었습니다.</p>";

                                        if($count > 0){
                                            for($i=1; $i<=$count; $i++){
                                                $info = $result -> fetch_array(MYSQLI_ASSOC);

                                                $tag = explode('#', $info["routeTags"]);

                                                echo "<div class='routeBox'><a href='routeView.php?routeID={$info['myRouteID']}'>";
                                                echo "<div class='routeBox_top'>";
                                                echo "<h3>".$info['routeTitle']."</h3>";
                                                echo "<p>".date('Y-m-d H:i', $info['regTime'])."</p></div>";
                                                echo "<div class='routeBox_middle'><p>".$info['routeContent']."</p></div></a>";
                                                echo "<div class='routeBox_bottom'>";
                                                for ($j = 1; $j < count($tag); $j++) {
                                                    echo "<a href='#'><span>#".$tag[$j]."</span></a>";
                                                }
                                                echo "</div></div>";
                                            }
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="board-page">
                            <h3 class="ir_so">페이지넘기기</h3>
                            <?php
                                // $sql = "SELECT count(myRouteID) FROM myRoute";
                                // $result = $connect -> query($sql);

                                // $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
                                // $boardTotalCount = $boardTotalCount['count(myRouteID)'];

                                // //echo "전체 갯수: .$boardTotalCount";

                                // //총 페이지 수
                                // $boardTotalPage = ceil($boardTotalCount/$numView);

                                // // echo "총 페이지 수 :" .$boardTotalPage;

                                // // 1 2 3 4 5 6 7 8 9 10 11
                                // //현재 페이지를 기준으로 보여주고 싶은 갯수 설정
                                // $pageView = 4;
                                // $startPage = $page - $pageView;
                                // $endPage = $page + $pageView;

                                // //처음페이지 초기화 
                                // if($startPage < 1) $startPage = 1;

                                // //마지막 페이지 초기화
                                // if($endPage >= $boardTotalPage) $endPage = $boardTotalPage;
                                
                                // echo "<ul>";

                                // //이전 페이지
                                // if( $page != 1 ){
                                //     $prevPage = $page - 1;
                                //     echo "<li><a href='routelist.php?page={$prevPage}'><</a></li>";
                                // }


                                // for( $i=$startPage; $i<=$endPage; $i++ ){
                                //     $active = '';
                                //     if($i == $page) $active = "active";

                                //     echo "<li class='{$active}'><a href='routelist.php?page={$i}'>{$i}</a></li>";
                                // }

                                // //다음페이지
                                // if( $page != $endPage ){
                                //     $nextPage = $page + 1;
                                //     echo "<li><a href='routelist.php?page={$nextPage}'>></a></li>";
                                // }

                                // echo "</ul>";
                            ?>
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

    </script>
    <script>
        // document.querySelectorAll(".img").forEach(el => {
        //     el.addEventListener("click", function(e){
        //         e.preventDefault();
        //         this.classList.toggle("active");
        //     })
        // })

        // $(".like").click(function () {
        //     if ($(".like").hasClass("active")) {
        //         $(".like").removeClass("active");
        //     } else {
        //         $(".like").addClass("active");
        //     }
        // });
        $(".like").click(function () {
            let target = $(this);
            if (target.hasClass("active")) {
                target.removeClass("active");
            } else {
                target.addClass("active");
            }
        });

        // $(".routeBox_top h3::after").click(function () {
        //     if ($(".routeBox_top h3::after").hasClass("active")) {
        //         $(".routeBox_top h3::after").removeClass("active");
        //     } else {
        //         $(".routeBox_top h3::after").addClass("active");
        //     }
        // });
        $(".mark").click(function () {
            let target = $(this);
            if (target.hasClass("active")) {
                target.removeClass("active");
            } else {
                target.addClass("active");
            }
        });
    </script>
</body>

</html>