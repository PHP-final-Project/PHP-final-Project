<?php session_start();  ?>
<?php include_once ('part/db.php');?>


<?php $product_id = $_GET['product_id'] ;?>




<?php

//瀏覽物數
$sql = "SELECT product_visitor FROM product WHERE product_id='$product_id' ";
$query = mysqli_query($link, $sql);
$row = mysqli_fetch_row($query);
$row[0]++;
$sql = "UPDATE product SET product_visitor='$row[0]'  WHERE product_id='$product_id' ";
$query = mysqli_query($link, $sql);
 ?>




 <?php
 if ( isset($_SESSION['login_session']) )
 {$comment_user = $_SESSION["user"];}
 else { $comment_user="訪客留言" ;}



 if ( isset($_POST["comment_text"]) )
  $comment_text = $_POST["comment_text"];



 	 if ( isset($_POST["comment_text"]) ) {
     $sql ="INSERT INTO comment (comment_post,comment_user,comment_text)
     VALUES ( '$product_id','$comment_user','$comment_text')";  //新增資料
     mysqli_query($link, $sql);
 	 }


 ?>








<?php

if ( isset($_SESSION['login_session']) )
{
$user=$_SESSION["user"];

if (  $_SESSION["user"]=="admin")  {

  $love_say="管理員無此功能";
  $collection_say="管理原無此功能";
}
else {
  $sql = "SELECT * FROM love where love_product = '$product_id'&& love_account = '$user'";
  $result = mysqli_query($link, $sql);
  $row = @mysqli_fetch_row($result);
  if ( $row[0]!=null)
   {
     $love_say="你覺得這很讚";
   }
      else {
     $love_say="<i class='fa fa-thumbs-up' aria-hidden='true'></i>&nbsp;&nbsp;讚";
   }

   $sql = "SELECT * FROM collection where collection_product = '$product_id'&& collection_account = '$user'";
   $result = mysqli_query($link, $sql);
   $row = @mysqli_fetch_row($result);
   if ( $row[0]!=null)
    {
      $collection_say="已經收藏";
    }
    else {
      $collection_say="<i class='fa fa-heart' aria-hidden='true'></i>&nbsp;&nbsp;收藏";
    }


  }

}


else {
  $love_say="需登入才能使用此功能";
  $collection_say="需登入才能使用此功能";

}


?>


<?php



 ?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>使用者資料</title>

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="js/material.min.js"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">


  </head>

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




    <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
      <i class="material-icons">more_vert</i>
    </button>
    <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
    <a href="logout.php">   <li class="mdl-menu__item">登出</li> </a>
    </ul>
  </div>
  <body>
    <div id="overflow" class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">


    <?php include_once ('part/index-nav-lefe.php');?>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100" >



        <div class="mdl-grid demo-content">


            <?php

                        // 顯示欄位名稱 不顯示管理員帳號資料
                        $sql = "SELECT   * FROM product where  product_id='$product_id'";
                        $query = mysqli_query($link, $sql);
                        $total_fields = mysqli_num_fields($query);

                        while ($row = mysqli_fetch_row($query)) {
                           echo "<div class='single-post'> ";
                           echo "<div class='is-post'> ";
                           echo "<div class='product_tiitle'>物品標題 " .$row[3]. "</div>";
                           echo "<div class='product_photo'>

                         <img  src=$row[4] >

                           </div>";
                           echo "<div class='product_describe'>物品描述" .$row[5]. "</div>";
                           echo "<div class='product_money'>金額:" .$row[7]. "</div>";
                           echo "<div class='product_account'>賣家:" .$row[1]. "</div>";
                           echo "<div class='product_category' >分類:" .$row[2]. "</div>";
                           echo "<div class='product_address' >所在地:" .$row[6]. "</div>";

                        }



echo "
<div class='my-box'>
<a href='love.php?product_id=$product_id'>
<div class='my-btn-b'>
$love_say
</div> </a></div> ";
   echo "



<div class='my-box'>
<a  href='collection.php?product_id=$product_id'>
<div class='my-btn-a' id='r1'>
$collection_say
</div> </a>
</div>
   ";
   echo "</div>";
   echo "</div>";
                        	 ?>




                           <div class="mdl-grid demo-content">


                                   <div class="single-post"> <div class="is-post">



                                                  <div class="product_describe">


                                                    <form action="single.php?product_id=<?php echo "$product_id"; ?>" method="post"  class="form login">



                                                      <div class="form__field">
                                                    <textarea placeholder="輸入留言內容...."cols="50" rows="5"  name="comment_text"></textarea>
                                                      </div>


                                                      <div class="form__field">
                                                        <input type="submit" value="留言">
                                                      </div>

                                                    </form>








                                                  </div>


                          </div></div>



                          <?php

                                      // 顯示欄位名稱 不顯示管理員帳號資料
                                      $sql = "SELECT   * FROM comment where comment_post	 = $product_id ";
                                      $query = mysqli_query($link, $sql);
                                      $total_fields = mysqli_num_fields($query);

                                      while ($row = mysqli_fetch_row($query)) {
                                         echo "<div class='index-post' style='width: 100%!important;'> ";
                                         echo "<div class='is-post'> ";
                                        echo "<div class='list_user' style='padding-bottom: 50px;'> <br>" .$row[3]. "</div>";
                                        echo "<div class='list_user' style='padding-bottom: 50px;'> 留言者:" .$row[2]. "</div>";

                                         echo "</div>";
                                         echo "</div>";
                                      }
                                         ?>

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
