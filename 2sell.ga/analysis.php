<?php include_once ('part/session.php');?>

<?php include_once ('part/db.php');?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加購物金</title>

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
    <link rel="stylesheet" href="css/user.css">

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">儲值購物金</span>
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
  分析頁面
    </div>



<?php
//查詢分類商品總數
$a=array("3C","衣服","其他","書","鞋子","生活用品","交通工具");
$a1=array();

for ($i=0; $i <7 ; $i++) {

  $sql = "SELECT COUNT(product_category) FROM product WHERE product_category='$a[$i]'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  array_push($a1, "$row[0]");



}
 ?>

 <?php
 //查詢分類的總瀏覽次數
 $b=array("3C","衣服","其他","書","鞋子","生活用品","交通工具");
 $b1=array();
 for ($i=0; $i <7 ; $i++) {
   $sql = "SELECT SUM(product_visitor) FROM product WHERE product_category='$b[$i]'";
   $result = mysqli_query($link, $sql);
   $row = mysqli_fetch_array($result);
   array_push($b1, "$row[0]");
 }
  ?>
  <?php

  //查詢分類的總瀏覽次數
  $c=array("台北市","新北市","桃園市","臺南市","高雄市","新竹縣","苗栗縣"
,"彰化縣","南投縣","雲林縣","嘉義縣","屏東縣","宜蘭縣","花蓮縣"
,"臺東縣","澎湖縣");
  $c1=array();
  for ($i=0; $i <16 ; $i++) {
    $sql = "SELECT COUNT(product_address) FROM product WHERE product_address='$c[$i]'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    array_push($c1, "$row[0]");
  }
   ?>

  <div class="ttl" >
   分類商品數目

</div>

    <div class="read-it" style="width:50%;">
    <canvas id="myChart2" width="10" height="10"></canvas>
    </div>

  <div class="read-it" style="width:50%;">
  <canvas id="myChart" width="10" height="10"></canvas>
  </div>

    <div class="ttl" >
     分類商品總瀏覽次數
  </div>
  <div class="read-it" style="width:50%;">
  <canvas id="myChart3" width="10" height="10"></canvas>
  </div>

  <div class="read-it" style="width:50%;">
  <canvas id="myChart4" width="10" height="10"></canvas>
  </div>


      <div class="ttl" >
     不同地區的商品數量
    </div>
    <div class="read-it" style="width:100%;" >
    <canvas id="myChart5" ></canvas>
    </div>

  <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
          labels: ["3C", "衣服", "其他", "書", "鞋子", "生活用品", "交通工具"],
          datasets: [{
              label: '總數',
              data: [<?php echo "$a1[0]"; ?>,
                <?php echo "$a1[1]"; ?>,
                <?php echo "$a1[2]"; ?>,
                <?php echo "$a1[3]"; ?>,
                <?php echo "$a1[4]"; ?>,
                <?php echo "$a1[5]"; ?>,
                <?php echo "$a1[6]"; ?>],
              backgroundColor: [
                'rgba(152,245,255,0.8)',
                'rgba(255,152,245,0.8)',
                'rgba(214,152,255, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(194,255,152, 0.8)',
                'rgba(245,255,152, 0.8)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {

              xAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });

  var ctx = document.getElementById("myChart2").getContext('2d');
  var myChart2 = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ["3C", "衣服", "其他", "書", "鞋子", "生活用品", "交通工具"],
          datasets: [{
              label: '分類商品數目',
              data: [<?php echo "$a1[0]"; ?>,
                <?php echo "$a1[1]"; ?>,
                <?php echo "$a1[2]"; ?>,
                <?php echo "$a1[3]"; ?>,
                <?php echo "$a1[4]"; ?>,
                <?php echo "$a1[5]"; ?>,
                <?php echo "$a1[6]"; ?>],
              backgroundColor: [
                  'rgba(152,245,255,0.8)',
                  'rgba(255,152,245,0.8)',
                  'rgba(214,152,255, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(194,255,152, 0.8)',
                  'rgba(245,255,152, 0.8)'
              ],

              borderWidth: 1
          }]
      }

  });

  var ctx = document.getElementById("myChart3").getContext('2d');
  var myChart3 = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["3C", "衣服", "其他", "書", "鞋子", "生活用品", "交通工具"],
          datasets: [{
              label: '分類商品數目',
              data: [<?php echo "$b1[0]"; ?>,
                <?php echo "$b1[1]"; ?>,
                <?php echo "$b1[2]"; ?>,
                <?php echo "$b1[3]"; ?>,
                <?php echo "$b1[4]"; ?>,
                <?php echo "$b1[5]"; ?>,
                <?php echo "$b1[6]"; ?>],
              backgroundColor: [
                  'rgba(152,245,255,0.8)',
                  'rgba(255,152,245,0.8)',
                  'rgba(214,152,255, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(194,255,152, 0.8)',
                  'rgba(245,255,152, 0.8)'
              ],

              borderWidth: 1
          }]
      }

  });

  var ctx = document.getElementById("myChart4").getContext('2d');
  var myChart4 = new Chart(ctx, {
      type: 'radar',
      data: {
          labels: ["3C", "衣服", "其他", "書", "鞋子", "生活用品", "交通工具"],
          datasets: [{
              label: '分類商品數目',
              data: [<?php echo "$b1[0]"; ?>,
                <?php echo "$b1[1]"; ?>,
                <?php echo "$b1[2]"; ?>,
                <?php echo "$b1[3]"; ?>,
                <?php echo "$b1[4]"; ?>,
                <?php echo "$b1[5]"; ?>,
                <?php echo "$b1[6]"; ?>],
              backgroundColor: [
                  'rgba(152,245,255,0.8)',
                  'rgba(255,152,245,0.8)',
                  'rgba(214,152,255, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(194,255,152, 0.8)',
                  'rgba(245,255,152, 0.8)'
              ],

              borderWidth: 1
          }]
      }

  });


  var ctx = document.getElementById("myChart5").getContext('2d');
  var myChart5 = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["台北市","新北市","桃園市","臺南市","高雄市","新竹縣","苗栗縣"
        ,"彰化縣","南投縣","雲林縣","嘉義縣","屏東縣","宜蘭縣","花蓮縣"
        ,"臺東縣","澎湖縣"],
          datasets: [{
              label: '總數',
              data: [<?php echo "$c1[0]"; ?>,
                <?php echo "$c1[1]"; ?>,
                <?php echo "$c1[2]"; ?>,
                <?php echo "$c1[3]"; ?>,
                <?php echo "$c1[4]"; ?>,
                <?php echo "$c1[5]"; ?>,
                <?php echo "$c1[6]"; ?>,
                <?php echo "$c1[7]"; ?>,
                <?php echo "$c1[8]"; ?>,
                <?php echo "$c1[9]"; ?>,
                <?php echo "$c1[10]"; ?>,
                <?php echo "$c1[11]"; ?>,
                <?php echo "$c1[12]"; ?>,
                <?php echo "$c1[13]"; ?>,
                <?php echo "$c1[14]"; ?>,
                <?php echo "$c1[15]"; ?>
              ],
              backgroundColor: [
                <?php
for ($i=0; $i < 7 ; $i++) {
echo "
'rgba(152,245,255,0.8)',
'rgba(255,152,245,0.8)',
";
}
  ?>
                'rgba(152,245,255,0.8)',
                'rgba(255,152,245,0.8)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {

              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });


  </script>





        </div>  </div>


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
