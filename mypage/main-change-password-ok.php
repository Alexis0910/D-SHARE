<?php
  session_start();
  $session_youName = $_SESSION[ 'youName' ];
  if ( is_null( $session_youName ) ) {
    header( 'Location: ../login/login.php' );
  }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/pageStyle/join_style.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/common.css">

    <title>Dshare</title>
    <style>
      .joinCheckInner h2 {
        font-size: 35px;
      }
    </style>
</head>

<body id="body">
    <main id="contentsJoinCheck">
        <section class="container">
            <article class="joinCheck-article">
                <div class="joinCheck">
                    <div class="joinCheckInner">
                        <h2>
                          <?php 
                            echo $session_youName;?>님, 비밀번호가 변경되었습니다.</h2>
                        <a href="../route-pop/routelist.php"><button>드라이브 코스 확인하러 가기</button></a>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <!-- //main -->

    <!--footer-->
    <footer>
        <?php
        include "../include/footer.php";
        ?>
    </footer>

</body>

</html>