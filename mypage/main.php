<?php
    include "../connect/connect.php";

  session_start();
  $session_youName = $_SESSION[ 'youName' ];
  if ( !isset( $session_youName ) ) {
    header( 'Location: ../login/login.php' );
  }
  $current_password = $_POST[ 'current_password' ];
  $new_password = $_POST[ 'new_password' ];
  $new_password_confirm = $_POST[ 'new_password_confirm' ];


  if ( !is_null( $current_password ) ) {
    $connect = mysqli_connect($host, $user, $pass, $db);
    // $sql = "SELECT youPass FROM myMember WHERE youName = '" . $session_youName . "';";
    $sql = "SELECT youPass FROM myMember WHERE youName = '$session_youName'";
    $result = $connect -> query($sql);

    while ( $jb_row = mysqli_fetch_array( $result ) ) {
      $encrypted_password = $jb_row[ 'youPass' ];
    }
    if ( password_verify( $current_password, $encrypted_password ) ) {
      if ( $new_password == $new_password_confirm ) {
        $encrypted_new_password = password_hash( $new_password, PASSWORD_DEFAULT);
        $sql_change_password = "UPDATE myMember SET youPass = ' . $encrypted_new_password . ' WHERE youName = ' . $session_youName . '";
        mysqli_query( $connect, $sql_change_password );
        header( 'Location: main-change-password-ok.php' );

      } else {
        $wp2 = 1;
      }
    } else {
      $wp1 = 1;
    }
  }
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
    <link rel="stylesheet" href="../assets/css/pageStyle/mypage.css">
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
            <div class="mypage_wrap">
                <div class="mypage_left">
                    <h2>MY PAGE</h2>
                    <div class="profile">
                        <img src="../assets/img/profile.svg" alt="프로필 이미지">
                    </div>
                    <div>
                        <?php if(isset($_SESSION['myMemberID'])){ ?>
                        <h4><?=$_SESSION['youName']?> 님</h4>
                        <?php } else { ?>
                        <a href="../login/login.php">로그인</a>
                        <?php } ?>
                    </div>

                    <button>나의 정보</button>
                </div>
                <div class="mypage_right">
                    <div class="tab_menu">
                        <div class="tab_btn">
                            <ul>
                                <li class="active"><a href="#">나만의 루트</a></li>
                                <li><a href="#">찜한 루트</a></li>
                                <li><a href="#">비밀번호 설정</a></li>
                                <li><a href="#">약관 정보</a></li>
                            </ul>
                        </div>
                        <div class="tab_cont">
                            <div class="cont">
                                <div class="my"><a href="#">
                                        <h3>우리집 앞 나만아는곳</h3>
                                        <p>나만 아는 곳이지롱 아무한테도 안알려 줘야지~~~ㅎㅎ</p>
                                        <div class="tag">
                                            <span>#우리집</span>
                                            <span>#밤산책</span>
                                        </div>
                                    </a></div>
                                <div class="my"><a href="#">
                                        <h3>파주시 임진각 관광지</h3>
                                        <p>평화로운 마음이 드는 코스</p>
                                        <div class="tag">
                                            <span>#힐링</span>
                                            <span>#휴가</span>
                                            <span>#산뜻</span>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="cont">
                                <div class="my"><a href="#">
                                        <h3>수원시 광교호수공원</h3>
                                        <p>밤산책 하러가기 좋은 코스</p>
                                        <div class="tag">
                                            <span>#데이트</span>
                                            <span>#밤산책</span>
                                        </div>
                                    </a></div>
                                <div class="my"><a href="#">
                                        <h3>화성시 제부도</h3>
                                        <p>주말에 가깝에 바닷바람 쐬러 가기 좋은 코스</p>
                                        <div class="tag">
                                            <span>#힐링</span>
                                            <span>#주말</span>
                                            <span>#서해안</span>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="cont">
                                <div class="member-form">
                                    <form name="change-password" action="main-change-password-ok.php" method="POST">
                                        <fieldset>
                                            <legend class="ir_so">비밀번호 변경 입력폼</legend>
                                            <div class="member-box">
                                                <div class="youPass">
                                                    <label for="youPass">비밀번호 변경</label>
                                                    <input type="password" name="current_password" id="current_password"
                                                        class="input_write" maxlength="20" placeholder="현재 비밀번호를 입력하세요"
                                                        autocomplete="off" required>
                                                </div>
                                                <div class="youPassC">
                                                    <label for="youPassC">비밀번호 변경</label>
                                                    <input type="password" name="new_password" id="new_password"
                                                        class="input_write" maxlength="20" placeholder="새 비밀번호를 입력하세요"
                                                        autocomplete="off" required>
                                                </div>
                                                <div class="youPassC">
                                                    <label for="youPassC">비밀번호 변경 확인</label>
                                                    <input type="password" name="new_password_confirm"
                                                        id="new_password_confirm" class="input_write" maxlength="20"
                                                        placeholder="다시 한 번 새 비밀번호를 입력하세요" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="change-btn">
                                            <button id="loginBtn" type="submit" class="btn_submit">확인</button>
                                        </div>
                                        <?php
                                            if ( $wp1 == 1 ) {
                                              echo "<p>현재 비밀번호가 틀렸습니다.</p>";
                                            }
                                            if ( $wp2 == 1 ) {
                                              echo "<p>새 비밀번호가 일치하지 않습니다.</p>";
                                            }
                                         ?>
                                        <!--submit하면 위에 aciton주소로 넘어가게끔-->
                                    </form>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="clause">
                                    <p><em>제1조. 목적</em><br>
                                        본 약관은 (주)디쉐어(이하 '회사'라 합니다.)가 각종 위치기반서비스(이하 통칭하여 ‘서비스’라 합니다)를 회사와 이용 계약을 체결한
                                        ‘고객’에게 제공하기 위하여 위치정보의보호 및 이용 등에 관한 법률의 규정에 의거 회사가 고객의 개인위치정보를 수집하고 제공함에 있어 필요한
                                        회사와 고객 간의 권리 및 의무, 기타 제반사항을 정함을 목적으로 합니다.
                                    </p><br>
                                    <p><em>제2조. 약관 외 준칙</em><br>
                                        본 약관에 명시되지 않은 사항에 대해서는 위치정보의 보호 및 이용 등에 관한 법률, 전기통신사업법, 정보통신망 이용촉진 및 정보보호 등에 관한
                                        법률 등 관계 법령과 회사가 별도로 정한 서비스의 세부이용지침 등의 규정에 따릅니다.</p>
                                    <br>
                                    <p><em>제3조. 회사의 연락처</em><br>
                                        회사의 상호, 주소, 전화 번호 그 밖의 연락처는 다음과 같습니다.
                                        <br>1. 상호: 주식회사 디쉐어
                                        <br>2. 주소: 서울특별시 강남구 테헤란로 70길 2000(대치동)
                                        <br>3. 대표전화: 080-2000-3000</p>
                                    <br>
                                    <p><em>제4조. 개인위치정보 수집에 관한 동의</em><br>
                                        회사는 위치기반서비스를 제공하기 위하여 고객의 개인위치정보를 수집하며, 고객은 본 약관에 동의함으로써 이에 동의한 것으로 간주됩니다.</p>

                                    <br>
                                    <p><em>제5조. 개인위치정보 수집에 관한 동의의 철회</em><br>
                                        고객은 서비스 해지 등의 방법을 통하여 개인위치정보의 수집에 관한 동의를 철회 할 수 있습니다.</p>
                                    <br>
                                    <p><em>제6조. 개인위치정보 수집방법</em><br>
                                        ① 회사는 GPS, DR, BLE 를 이용하여 운행정보 수집 장치를 통해 주기적, 간헐적 무선 전송 방식으로 위치 정보를 수집합니다.
                                        <br>② 제1항에서 정한 위치정보의 수집방법이 변경되는 경우 회사는 인터넷에 공지하거나 고객에게 통지합니다. 다만, 회사가 통제할 수 없는
                                        사유가 발생하여 사전 통지가 불가능한 경우에는 사후에 통지합니다.</p>

                                    <br>
                                    <p><em>제7조. 위치정보서비스의 내용</em><br>
                                        <br> ① 회사가 고객의 위치정보를 이용하여 제공하는 서비스 내용은 아래와 같습니다.
                                        <br>이용자 보호 및 부정 이용 방지 목적으로 개인위치정보주체 또는 이동성 있는 기기의 위치를 이용하여 권한없는 자의 비정상적인 서비스 이용
                                        시도 등을 차단
                                        <br>② 회사는 고객에게 새로운 서비스를 제공하기 위하여 수집된 위치정보를 이용 할 수 있습니다.</p>

                                    <br>
                                    <p><em>제8조. 개인위치정보의 제공</em><br>
                                        <br>① 방송통신위원회에 신고된 위치기반서비스사업자는 위치정보의 보호 및 이용 등에 관한 법률 제20조의 규정에 의거 동법에 따른
                                        개인위치정보주체의 동의를 얻어 회사에게 해당 개인위치 정보주체의 개인위치정보 제공을 요청 할 수 있습니다.
                                        <br>② 위치기반서비스사업자는 다음 각호의 사항을 갖추어 회사에게 개인위치정보를 요청하여야 합니다.
                                        <br>1. 개인위치정보주체의 동의를 얻은 사실
                                        <br>2. 개인위치정보의 범위 및 기간
                                        <br>③ 수사 목적으로 법령에 정해진 절차와 방법에 따라 수사 기관의 요구가 있는 경우 등에는 개인의 위치정보를 제공 할 수 있습니다.
                                        <br>④ 회사는 위치기반서비스사업자가 제1항의 규정에 의한 동의 없이 개인위치정보 주체의 개인위치정보를 요청하거나, 회사의 확인 결과
                                        개인위치정보주체의 개인위치정보의 제공에 관한 동의가 없는 것으로 판명되거나 또는 당해 요청이 관련 법령에 위배되는 요청으로 판단되는 경우 당해
                                        개인위치정보주체의 개인위치정보 제공을 거절할 수 있습니다.</p>
                                    <br>
                                    <p><em>제9조. 고객의 개인위치정보 보호</em><br>
                                        회사는 관련법령이 정하는 바에 따라서 고객의 개인위치정보를 보호하기 위하여 노력합니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--contents-->
    <footer>
        <?php
            include "../include/footer.php";
        ?>
    </footer>
    <!--footer-->

    <script>
        const tabBtn = document.querySelectorAll(".tab_btn ul li");
        const tabCont = document.querySelectorAll(".tab_cont .cont");

        tabBtn.forEach((element, index) => {
            element.addEventListener("click", function (el) {
                el.preventDefault();
                tabBtn.forEach(el => {
                    el.classList.remove("active");
                });
                element.classList.add("active");

                tabCont.forEach(el => {
                    el.style.display = "none";
                })
                tabCont[index].style.display = "block";
            });
        });
    </script>
</body>

</html>