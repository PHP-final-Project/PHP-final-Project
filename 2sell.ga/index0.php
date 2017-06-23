
<?php
session_start();?>
<?php include_once ('part/db.php');?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2sell-二手物拍賣</title>

    <!-- Page styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/index.css">

  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">

            <a  href="index.php" class="title-logo" >2sell</a>


          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field">
            </div>
          </div>
          <!-- Navigation -->

						<?php



            if ( isset($_SESSION['login_session']) )
            {




  if (  $_SESSION["user"]=="admin")  {
 include_once ('part/index-admin.php');
}
else {
include_once ('part/index-user.php');
}


  }

          else {
        include_once ('part/index-visitor.php');
          }








						?>



          <span class="android-mobile-title mdl-layout-title">
            <div class="title-logo"> 2sell </div>
        </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
          <a href="logout.php">   <li class="mdl-menu__item">登出</li> </a>
          </ul>
        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <div class="column-logo"> 2sell </div>
      </span>


        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">書</a>
          <a class="mdl-navigation__link" href="">衣服</a>
          <a class="mdl-navigation__link" href="">鞋子</a>
          <a class="mdl-navigation__link" href="">生活用品</a>
          <a class="mdl-navigation__link" href="">交通工具</a>
          <a class="mdl-navigation__link" href="">3C</a>
          <a class="mdl-navigation__link" href="">其他</a>
            </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">
          <div class="logo-font android-slogan">Sorry , 商品功能未完成</div>
          <div class="logo-font android-sub-slogan">
            已完成的功能:
            登入/登出/註冊/使用者及管理者後台

</br>
未完成的功能:
商品刊登/顯示,收藏,下標

        </div>

          <img src="images/sorry.png" style="padding-top: 50px;  ">

          </div>
        </div>

        <footer class="android-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">

            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Top
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>

          <div class="mdl-mega-footer--middle-section">
            <p class="mdl-typography--font-light">2sell: © 2017 </p>
            <p class="mdl-typography--font-light">二手物交易網</p>
          </div>


        </footer>
      </div>
    </div>
    <script src="js/material.min.js"></script>


  </body>
</html>
