<?php include_once ('part/session.php');?>

<?php include_once ('part/db.php');?>





  <?php

  $product_account = $_SESSION["user"] ;
  $product_id = "";   $product_address = "";
  $product_category = "";   $product_money = "";
  $product_tiitle = ""; $product_visitor = "";
  $product_photo = ""; $product_complete = "";
  $product_date = "";
  $product_describe = "";

  // 取得表單欄位值
  if ( isset($_POST["product_tiitle"]) )
     $product_tiitle = $_POST["product_tiitle"];
  if ( isset($_POST["product_category"]) )
     $product_category = $_POST["product_category"];
  if ( isset($_POST["product_money"]) )
        $product_money = $_POST["product_money"];
  if ( isset($_POST["product_describe"]) )
     $product_describe = $_POST["product_describe"];
     if ($product_describe==null) {
      $product_describe = "賣家無描述";
     }
  if ( isset($_POST["product_address"]) )
        $product_address = $_POST["product_address"];

     // 建立MySQL的資料庫連接
   include_once ('part/db.php');

     // 上傳檔案


     if (isset($_FILES["file"])) {

       $sql = "   SELECT MAX(product_id)product_id FROM product WHERE product_account ='$product_account'";
       $result = mysqli_query($link, $sql);
       $row = @mysqli_fetch_row($result);

       $postid = $row[0];
       $postid++;

        // 儲存上傳的檔案
        if ($_FILES["file"]["tmp_name"] !=null) {


        if ( copy($_FILES["file"]["tmp_name"],
                  $_FILES["file"]["name"])) {
           //分離名稱和副檔名
           list($name, $type) = explode(".", $_FILES["file"]["name"]);
           //移動修改檔名
           move_uploaded_file($_FILES["file"]["tmp_name"],"prouct-uploads/"."$product_account-$postid.$type");
           $product_photo = "prouct-uploads/$product_account-$postid.$type";




           //取得原始檔資訊,並且呼叫圖檔
           $gs = GetImageSize("$product_photo");

           if ($gs[2] == 1){$img1= ImageCreateFromGIF("$product_photo");}
           else if($gs[2] == 2){$img1= ImageCreateFromJPEG("$product_photo");}
           else if($gs[2] == 3){$img1= ImageCreateFromPNG("$product_photo");}

           //開新圖範圍,並且置入縮小後的影像
           $img2 = ImageCreatetruecolor(400, 200);
           ImageCopyResized($img2, $img1, 0, 0, 0, 0, 400, 200, $gs[0], $gs[1]);

           // 覆蓋原始圖檔並且釋放記憶體
           if($gs[2] == 1){ImageGIF($img2,$product_photo);}
           else if($gs[2] == 2){ImageJPEG($img2,$product_photo,90);}
           else if($gs[2] == 3){ImagePNG($img2,$product_photo);}
           ImageDestroy($img1);
           ImageDestroy($img2);
           unlink($_FILES["file"]["name"]);
              }
        else echo "檔案上傳失敗<br/>";
     }
     }

///上傳失敗

  if ( isset($_POST["product_tiitle"]) ){

    $sql ="INSERT INTO product (product_account,product_tiitle,product_category,product_photo,product_money,product_address,product_describe,product_visitor)
    VALUES ( '$product_account','$product_tiitle','$product_category','$product_photo','$product_money','$product_address','$product_describe','0')";  //新增資料
    mysqli_query($link, $sql);

  }



     mysqli_close($link); //關閉資料庫連結

     ?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新增商品</title>

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
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
    <script type="text/javascript" src="js/jeditable-add.js"></script>
    <script src="js/material.min.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/user.css">

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">新增商品</span>
          <div class="mdl-layout-spacer"></div>

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


    <div class="read-it">
    使用者可以新增物品
    </br>
    <div class="imp">圖片檔名將根據postid和帳號命名不會有重復問題</div>

    前後有空白時會自動移除在寫入資料庫
    </div>
    </div>
        </div>


        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">

            <form action="product-update.php" method="post" class="form login"  enctype="multipart/form-data" >

              <div class="form__field">
                <input id="login__username" class="form__input" type="text" name="product_tiitle" class="form__input" placeholder="輸入物品標題" required>
              </div>



              <div class="form__field">
                <input id="login__password"  class="form__input"type="text" name="product_money" class="form__input" placeholder="輸入欲售金額" required>
              </div>

              <div class="form__field">
<textarea placeholder="輸入物品描述..."cols="50" rows="5"  name="product_describe"></textarea>
              </div>
                  <div class="form__field">
                     <div class="select">
              <select name="product_address" >
    <option value ="台北市">設定地區</option>
    <option value ="台北市">台北市</option>
    <option value ="新北市">新北市</option>
    <option value="桃園市">桃園市</option>
    <option value="臺南市">臺南市</option>
    <option value="高雄市 ">高雄市 </option>
    <option value="新竹縣">新竹縣</option>
    <option value="苗栗縣">苗栗縣</option>
    <option value="彰化縣">彰化縣</option>
    <option value="南投縣">南投縣</option>
    <option value="雲林縣">雲林縣</option>
    <option value="嘉義縣">嘉義縣</option>
    <option value="屏東縣">屏東縣</option>
    <option value="宜蘭縣">宜蘭縣</option>
    <option value="花蓮縣">花蓮縣</option>
    <option value="臺東縣">臺東縣</option>
    <option value="澎湖縣">澎湖縣</option>
  </select></div>


  <div class="select">
       <select name="product_category" >

<option value="其他">設定分類</option>
<option value ="書">書</option>
<option value ="衣服">衣服</option>
<option value ="鞋子">鞋子</option>
<option value="生活用品">生活用品</option>
<option value="交通工具">交通工具</option>
<option value="3C ">3C </option>
<option value="其他">其他</option>
</select> </div>
</div>


<div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">上傳圖片</div>
    <div class="file-select-name" id="noFile">圖片路徑</div>
    <input type="file" name="file"id="chooseFile"/><hr/>
  </div>
</div>

 <script type="text/javascript">

 $("#chooseFile").bind("change", function() {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass("active");
    $("#noFile").text("No file chosen...");
  } else {
    $(".file-upload").addClass("active");
    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
  }
});



        </script>

  </br>



    <div class="form__field">
                <input type="submit" value="上架物品">
              </div>

            </form>





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


 <script type="text/javascript">

 $("#chooseFile").bind("change", function() {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass("active");
    $("#noFile").text("No file chosen...");
  } else {
    $(".file-upload").addClass("active");
    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
  }
});



        </script>
