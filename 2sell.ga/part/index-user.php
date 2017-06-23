<nav class="android-navigation mdl-navigation">
<?php

$nav_user = $_SESSION["user"];  ?>
  <div class="mdl-navigation__link mdl-typography--text-uppercase"><?php echo "你好 ! $nav_user"; ?> </div>
    <a  href="user-date.php" class="mdl-navigation__link mdl-typography--text-uppercase" >會員中心</a>
    <a  href="product-update.php" class="mdl-navigation__link mdl-typography--text-uppercase" >刊登商品</a>
    <a  href="logout.php"z class="mdl-navigation__link mdl-typography--text-uppercase" href="">登出</a>
  </nav>
