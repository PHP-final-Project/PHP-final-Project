<?php include_once ('part/session.php');?>

<?php include_once ('part/db.php');?>


  <?php
  $users_account = $_SESSION["search_user"] ;


  $users_address  = "";
  $users_phone  = "";
  $really = "" ;
$search_user = "" ;


  if ( isset($_POST["search_user"]) )
  {
    $_SESSION["search_user"] = $_POST["search_user"];
    $search_user = $_SESSION["search_user"] ;

    $sql = "SELECT * FROM users WHERE users_account='$search_user'";
    // 執行SQL查詢
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    // 是否有查詢到使用者記錄
    if ( $total_records > 0 ) {
      $really =  "找到帳號";

    } else {  // 登入失敗
      $really ="查無使用者!" ;
    }
   }




if ( isset($_POST["users_password"]) )
{
    $users_password = $_POST["users_password"];
    if ($users_password != null){
    $sql = "UPDATE users SET users_password = '$users_password'
     WHERE users_account='$users_account'";
    $result = mysqli_query($link,$sql)or die ("無法更新".mysql_error());
  }
}
if ( isset($_POST["users_phone"]) )
{
    $users_phone = $_POST["users_phone"];
    if ($users_phone != null){
    $sql = "UPDATE users SET users_phone = '$users_phone'
     WHERE users_account='$users_account'";
    $result = mysqli_query($link,$sql)or die ("無法更新".mysql_error());
  }
}

if ( isset($_POST["users_address"]) )
{
    $users_address = $_POST["users_address"];
    if ($users_address != null){
    $sql = "UPDATE users SET users_address = '$users_address'
     WHERE users_account='$users_account'";
    $result = mysqli_query($link,$sql)or die ("無法更新".mysql_error());
  }
}
if ( isset($_POST["users_money"]) )
{
    $users_money = $_POST["users_money"];
    if ($users_money != null){
    $sql = "UPDATE users SET users_money = '$users_money'
     WHERE users_account='$users_account'";
    $result = mysqli_query($link,$sql)or die ("無法更新".mysql_error());
  }
}


  ?>





<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>修改使用者資料</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">修改資料</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <a href="logout.php" <li class="mdl-menu__item">登出</li></a>



          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.svg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>你好 ! <?php echo $_SESSION["user"]; ?></span>

          </div>
        </header>

      <?php
      if ( $_SESSION["user"]=="admin")
      include_once ('part/admin-nav.php');
      else
      include_once ('part/user-nav.php');
      ?>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <?php
            //顯示使用者資料
            $users_account = $_SESSION["search_user"] ;

            $users_password = "";
            $sql = "SELECT * FROM users where users_account = '$users_account'";
            $result = mysqli_query($link, $sql);

            $row = @mysqli_fetch_row($result);
            echo "</br>$really";
            echo "</br>個人資料";
            echo "<table  class='container' >";

            echo "<tr> <td>帳號</td>  <td>密碼</td>  <td>電話</td> <td>地址</td> <td>購物金</td>   </tr> ";
            echo "<tr>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
  echo "</tr> ";
  echo "</table>";



             ?>
            <form action="admin-date-edit.php" method="post" class="form login">


              <div >
                  <input  type="text" name="users_password"  placeholder="密碼" >
              </div>

              <div >
                  <input  type="text" name="users_phone"  placeholder="手機" >
              </div>

              <div >
                  <input  type="text" name="users_address"  placeholder="地址" >
              </div>

              <div >
                  <input  type="text" name="users_money"  placeholder="購物金" >
              </div>


              <div >
                <input type="submit" value="修改資料">
              </div>


<input type="button" value="刪除使用者" onclick="location.href='delete-user.php'">
          </div>


        </div>
      </main>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white">
            <circle cx=0.5 cy=0.5 r=0.40 fill="black">
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5>
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)">
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3">
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	">
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	">
            </g>
          </g>
        </defs>
      </svg>
      <script src="js/material.min.js"></script>
  </body>
</html>
