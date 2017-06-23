-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017 年 06 月 22 日 16:56
-- 伺服器版本: 5.5.52-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `2sell-ga`
--

-- --------------------------------------------------------

--
-- 資料表結構 `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(50) NOT NULL,
  `collection_account` varchar(50) COLLATE utf8_bin NOT NULL,
  `collection_product` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_account`, `collection_product`) VALUES
(9, 'test', '48'),
(10, 'test', '47'),
(19, 'admin', '50'),
(20, 'test', '50'),
(21, 'test', '59'),
(22, 'test', '66');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_post` int(10) NOT NULL,
  `comment_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `comment_text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_post`, `comment_user`, `comment_text`) VALUES
(12, 50, 'test', '測試 ~~~~~'),
(13, 50, 'admin', '品質優良'),
(14, 54, 'admin', '色調簡潔'),
(15, 58, 'test', '經典收藏，難得一見'),
(16, 52, 'admin', '+\r\n'),
(17, 54, 'admin', '757');

-- --------------------------------------------------------

--
-- 資料表結構 `love`
--

CREATE TABLE `love` (
  `love_id` int(11) NOT NULL,
  `love_account` int(11) NOT NULL,
  `love_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_account` varchar(50) COLLATE utf8_bin NOT NULL,
  `product_category` varchar(20) COLLATE utf8_bin NOT NULL,
  `product_tiitle` text COLLATE utf8_bin NOT NULL,
  `product_photo` varchar(50) COLLATE utf8_bin NOT NULL,
  `product_describe` text COLLATE utf8_bin NOT NULL,
  `product_address` text COLLATE utf8_bin NOT NULL,
  `product_money` varchar(10) COLLATE utf8_bin NOT NULL,
  `product_visitor` varchar(10) COLLATE utf8_bin NOT NULL,
  `product_complete` int(5) NOT NULL,
  `product_date` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`product_id`, `product_account`, `product_category`, `product_tiitle`, `product_photo`, `product_describe`, `product_address`, `product_money`, `product_visitor`, `product_complete`, `product_date`) VALUES
(50, 'test', '鞋子', 'Nike KD8 Bright Crimson 杜蘭特8代球鞋 男女款', 'prouct-uploads/test-1.jpg', '鞋子描述 Nike KD8 Bright Crimson 杜蘭特8代球鞋 男女款', '花蓮縣', '1750', '77', 0, ''),
(52, 'test', '3C', 'ACER 宏碁筆記型電腦', 'prouct-uploads/test-52.jpg', '處理器：Intel Atom x5-Z8350(up to 1.92 GHz) \r\n記憶體：2G DDR3L 1600 (on board) \r\n硬碟：32G eMMC \r\n作業系統：Windows 10 家用版 64 bit ', '宜蘭縣', '18222', '26', 0, ''),
(54, 'a1033345', '衣服', '女裝 條紋上衣', 'prouct-uploads/a1033345-1.jpg', '條紋一字領上衣 寬鬆舒適', '台北市', '250', '9', 0, ''),
(55, 'a1033345', '衣服', '男女裝 芝麻街短袖上衣', 'prouct-uploads/a1033345-55.jpg', '芝麻街ELMO 男女皆宜', '新北市', '300', '5', 0, ''),
(56, 'a1033345', '衣服', '男女裝 熊本熊短T', 'prouct-uploads/a1033345-56.jpg', '夏季新款 原創動漫周邊 男女裝 KUMAMON 熊本熊 短T', '高雄市 ', '299', '0', 0, ''),
(57, 'tyng', '衣服', '男女裝 愛迪達ADIDAS上衣', 'prouct-uploads/tyng-1.jpg', '男女皆適合 ADIDAS 黑色愛迪達短T ', '苗栗縣', '580', '6', 0, ''),
(58, 'tyng', '書', '書籍 失物之書', 'prouct-uploads/tyng-58.jpg', '失物之書 約八成新 無摺痕', '彰化縣', '500', '11', 0, ''),
(59, 'tyng', '書', '書籍 生命清單', 'prouct-uploads/tyng-59.jpg', '生命清單 獨家插畫版 約九成新 去年底購入', '雲林縣', '360', '15', 0, ''),
(60, 'tyng', '鞋子', '鞋子 SBENU', 'prouct-uploads/tyng-60.JPG', '韓劇憤怒MOM的贊助商品 IU宋再臨代言', '臺東縣', '1200', '46', 0, ''),
(61, 'tyng', '鞋子', '鞋子 LEBORN', 'prouct-uploads/tyng-61.JPG', 'LEBORN慢跑鞋 顏色為簡約歐風 \r\n鞋款的系列以國家來區分，有倫敦、巴黎等，但只是顏色的不同而已', '宜蘭縣', '1500', '3', 0, ''),
(62, 'tyng', '生活用品', '生活用品 KITTY眼鏡袋', 'prouct-uploads/tyng-62.jpg', '內含棉質布面塑膠板防止眼鏡刮、壓傷\r\n塑膠板為可拆取式設計，眼鏡包可搖身一變時尚手拿包，是可愛又時髦的單品', '臺南市', '190', '36', 0, ''),
(64, 'tyng', '3C ', '3C 音響播放器', 'prouct-uploads/tyng-64.jpg', 'iPhone /iPad／iPod 裝置連結設計，鬧鐘／時鐘／睡眠預設， 5 組環境音場預設模式。', '台北市', '10680', '59', 0, ''),
(65, 'tyng', '交通工具', '交通工具 豐田RAV4', 'prouct-uploads/tyng-65.jpg', '國內指導價：17.98—26.98萬\r\n高速油耗：7.6L/100km\r\n城市油耗：9L/100km\r\n綜合油耗：7.6L/100km', '新竹縣', '99999', '3', 0, ''),
(66, 'tyng', '交通工具', '交通工具 馬自達CX-3', 'prouct-uploads/tyng-66.jpg', '高速油耗：6.5L/100km\r\n城市油耗：11.8L/100km\r\n綜合油耗：8.4L/100km', '臺南市', '88888', '6', 0, ''),
(67, 'a1033345', '書', '書籍 我的第一套好好吃食育繪本', 'prouct-uploads/a1033345-57.jpg', '出版社：天下雜誌 / 作者：吉田隆子 共3書', '苗栗縣', '240', '0', 0, ''),
(68, 'a1033345', '書', '書籍 我的環保書', 'prouct-uploads/a1033345-68.jpg', '出版社：科育 共3書\r\n愛地球，從閱讀出發吧！', '屏東縣', '360', '0', 0, ''),
(69, 'a1033345', '鞋子', '鞋子 tods豆豆鞋', 'prouct-uploads/a1033345-69.jpg', 'tods為義大利著名的鞋類品牌\r\n鞋子講求舒適度高，毫無壓力\r\n', '南投縣', '1240', '4', 0, ''),
(70, 'a1033345', '生活用品', '生活用品 小雪靴鑰匙圈', 'prouct-uploads/a1033345-70.png', '紫色 粉紅色各1 幾乎全新', '雲林縣', '50', '2', 0, ''),
(71, 'sandy', '書', '書籍 有趣書籍', 'prouct-uploads/sandy-1.jpeg', '即使再不愛閱讀的小孩，也會被這兩套書吸引，因為有趣比有用更重要', '桃園市', '150', '5', 0, ''),
(72, 'sandy', '書', '書籍 會模仿的大象', 'prouct-uploads/sandy-72.jpg', '會模仿的大象 日本兒童繪畫書籍', '雲林縣', '350', '0', 0, ''),
(73, 'sandy', '書', '書籍 有聲書', 'prouct-uploads/sandy-73.png', '日本巧虎有聲書 可愛繪本', '澎湖縣', '600', '8', 0, ''),
(74, 'sandy', '衣服', '衣服 愛迪達衣服', 'prouct-uploads/sandy-74.jpg', '灰橘色愛迪達拼色條紋字母 幾乎全新', '澎湖縣', '760', '0', 0, ''),
(75, 'sandy', '衣服', '衣服 黃色小鴨', 'prouct-uploads/sandy-75.jpg', '前後都有可愛黃小鴨圖案的T恤，作為情侶裝或親子裝都很適合', '宜蘭縣', '400', '7', 0, ''),
(76, 'sandy', '衣服', '衣服 淘寶平價春裝', 'prouct-uploads/sandy-76.jpeg', '雙層荷葉邊 襯衫上衣 淘寶購入 約8成新', '屏東縣', '200', '0', 0, ''),
(77, 'sandy', '鞋子', '鞋子 多拉A夢童鞋', 'prouct-uploads/sandy-77.jpg', '多拉A夢童鞋 粉紅藍各1 約7成新', '屏東縣', '400', '4', 0, ''),
(78, 'sandy', '鞋子', '鞋子 Sneaker', 'prouct-uploads/sandy-78.jpg', 'Sneaker鞋款 紅色 僅試穿過一次', '彰化縣', '1800', '0', 0, ''),
(79, 'sandy', '鞋子', '鞋子 0EE3W00白色帆布鞋', 'prouct-uploads/sandy-79.jpeg', '0EE3W00白色帆布鞋 百搭好穿小白鞋', '高雄市 ', '680', '1', 0, ''),
(80, 'sandy', '生活用品', '生活用品 德國雙人牌16cm湯鍋', 'prouct-uploads/sandy-80.jpg', '德國雙人牌16cm湯鍋 未用過 幾乎全新', '桃園市', '3000', '3', 0, ''),
(81, 'sandy', '生活用品', '生活用品 KITTY櫻花用具', 'prouct-uploads/sandy-81.jpg', '日本限定 KITTY櫻花用具 未使用過 幾乎全新', '澎湖縣', '700', '3', 0, ''),
(82, 'sandy', '生活用品', '生活用品 Blessing For You 輕巧包', 'prouct-uploads/sandy-82.jpeg', 'Blessing For You 輕巧包 韓國設計製造', '花蓮縣', '1000', '1', 0, ''),
(83, 'sandy', '交通工具', '交通工具 賓士GLA', 'prouct-uploads/sandy-83.jpg', '賓士GLA \r\n高速油耗：6.7L/100km\r\n城市油耗：12.4L/100km\r\n綜合油耗：9L/100km', '澎湖縣', '68000', '1', 0, ''),
(84, 'sandy', '交通工具', '交通工具 斯巴魯XV', 'prouct-uploads/sandy-84.jpg', '斯巴魯XV\r\n高速油耗：6.9L/100km\r\n城市油耗：12.4L/100km\r\n綜合油耗：9L/100km', '嘉義縣', '78550', '1', 0, ''),
(85, 'sandy', '交通工具', '交通工具 機車', 'prouct-uploads/sandy-85.jpeg', '造型特殊 不耗油 約8成新', '臺東縣', '100000', '2', 0, ''),
(87, 'sandy', '3C ', '3C SONY手錶', 'prouct-uploads/sandy-86.jpg', 'SONY手錶  \r\n能用藍芽技術連結使用Android系統的智慧型手機，還可以提醒使用者撥打電話、連結臉書跟推特，甚至能控制戴錶者手機的音樂資料庫。', '嘉義縣', '1100', '0', 0, ''),
(88, 'sandy', '3C ', '3C forte two耳機', 'prouct-uploads/sandy-88.jpg', 'forte two耳機 幾乎全新 音質佳', '苗栗縣', '2000', '0', 0, ''),
(89, 'sandy', '3C ', '3C 相機', 'prouct-uploads/sandy-89.jpg', '索尼長焦4K黑卡相機RX10 III 約8成新 ', '宜蘭縣', '3800', '0', 0, ''),
(90, 'sandy', '3C ', '3C Siri智能音箱', 'prouct-uploads/sandy-90.jpg', 'Siri智能音箱 約9成新 ', '新北市', '5000', '4', 0, ''),
(91, 'yjps565522', '書', '書籍 理想家2025', 'prouct-uploads/yjps565522-1.jpg', '理想家2025 幾乎全新', '台北市', '250', '0', 0, ''),
(92, 'yjps565522', '書', '書籍 兒童書籍', 'prouct-uploads/yjps565522-92.jpeg', '數位兒童作家所著 共6本 約8成新', '臺南市', '1230', '0', 0, ''),
(93, 'yjps565522', '書', '書籍 哈利波特', 'prouct-uploads/yjps565522-93.jpeg', '哈利波特全套書籍 一次購買只要2000元 約8成新', '彰化縣', '2300', '4', 0, ''),
(94, 'yjps565522', '衣服', '男裝 HUMMEL Hummel', 'prouct-uploads/yjps565522-94.jpg', 'HUMMEL Hummel 短長袖吸收汗水乾燥，網眼polo 衫 幾乎全新', '雲林縣', '880', '0', 0, ''),
(95, 'yjps565522', '衣服', '衣服 童裝', 'prouct-uploads/yjps565522-95.jpeg', '童裝兩件組 適合年齡約3-5歲 8成新', '台北市', '560', '0', 0, ''),
(96, 'yjps565522', '衣服', '衣服 短褲', 'prouct-uploads/yjps565522-96.jpg', '後拉鍊側邊打摺花苞短褲 紅色 約9成新', '苗栗縣', '340', '0', 0, ''),
(97, 'yjps565522', '衣服', '衣服 羽球短褲', 'prouct-uploads/yjps565522-97.jpg', '羽球短褲 僅試穿 顏色灰色', '新竹縣', '1450', '1', 0, ''),
(98, 'yjps565522', '鞋子', '鞋子 SPERRY X LIBERTY', 'prouct-uploads/yjps565522-98.jpg', 'SPERRY X LIBERTY限量聯名鞋款 僅試穿', '雲林縣', '3500', '0', 0, ''),
(99, 'yjps565522', '鞋子', '鞋子 asos 紅麂皮德比鞋', 'prouct-uploads/yjps565522-99.jpg', 'asos 紅麂皮德比鞋/牛津鞋 紅色 約8成新', '臺東縣', '2100', '0', 0, ''),
(100, 'yjps565522', '鞋子', '鞋子 愛迪達鞋', 'prouct-uploads/yjps565522-100.jpg', '愛迪達板鞋 僅試穿', '臺東縣', '4500', '0', 0, ''),
(101, 'yjps565522', '鞋子', '鞋子 Chloé黑白麂皮條紋草編鞋', 'prouct-uploads/yjps565522-101.jpg', 'Chloé黑白麂皮條紋草編鞋 最新款 約9成新', '臺東縣', '5500', '0', 0, ''),
(102, 'yjps565522', '生活用品', '生活用品 打洞器 壓花器', 'prouct-uploads/yjps565522-102.jpg', '日本製 ❤ 正版 Arnest可愛笑臉表情 飯糰 海苔打洞器 壓花器', '花蓮縣', '80', '0', 0, ''),
(103, 'yjps565522', '生活用品', '生活用品 IKEA BEDDINGE 三人沙發床', 'prouct-uploads/yjps565522-103.jpg', 'IKEA BEDDINGE 三人沙發床 約使用一年 8成新', '花蓮縣', '9900', '0', 0, ''),
(104, 'yjps565522', '生活用品', '生活用品 瓦斯爐', 'prouct-uploads/yjps565522-104.jpg', 'OPAX 莊頭北崁入式安全瓦斯爐 約9成新', '屏東縣', '8000', '0', 0, ''),
(105, 'yjps565522', '生活用品', '生活用品 女性包包', 'prouct-uploads/yjps565522-105.jpg', 'doodoo2017新款韓版百搭簡約女包 幾乎全新', '雲林縣', '888', '0', 0, ''),
(106, 'yjps565522', '生活用品', '生活用品 保溫瓶', 'prouct-uploads/yjps565522-106.jpg', '老虎老虎不銹鋼瓶2入800 毫升 黑粉红色各1 未使用過', '南投縣', '1500', '0', 0, ''),
(107, 'yjps565522', '交通工具', '交通工具 KissFAQ', 'prouct-uploads/yjps565522-107.jpg', 'KissFAQ機車 約8成新 車齡一年', '苗栗縣', '50000', '0', 0, ''),
(108, 'yjps565522', '交通工具', '交通工具 BSA Regal', 'prouct-uploads/yjps565522-108.jpg', 'BSA Regal機車 幾乎全新 ', '高雄市 ', '45000', '0', 0, ''),
(109, 'yjps565522', '交通工具', '交通工具 Many125', 'prouct-uploads/yjps565522-109.png', 'KYMCO 光陽機車 Many125 8成新 ', '嘉義縣', '66000', '0', 0, ''),
(110, 'yjps565522', '3C ', '3C 手機架', 'prouct-uploads/yjps565522-110.jpg', 'S3 S4 NOTE 2 iphone5 htc butterfly new one 手機架', '桃園市', '990', '0', 0, ''),
(111, 'yjps565522', '3C ', '3C 手機殼', 'prouct-uploads/yjps565522-111.jpg', 'IPHONE 手機殼 幾乎全新', '彰化縣', '220', '0', 0, ''),
(112, 'yjps565522', '3C ', '3C 電腦鍵盤', 'prouct-uploads/yjps565522-112.jpg', '電腦鍵盤 約9成新 已清潔乾淨無明顯灰塵', '花蓮縣', '850', '0', 0, ''),
(113, 'yjps565522', '3C ', '3C 滑鼠', 'prouct-uploads/yjps565522-113.jpg', '羅技M105 光學滑鼠 約9成新', '台北市', '1300', '0', 0, ''),
(114, 'yjps565522', '3C ', '3C 手機', 'prouct-uploads/yjps565522-114.jpg', 'HTC Desire A17 約9成新 附玻璃保護貼', '花蓮縣', '6000', '0', 0, ''),
(116, 'yjps565522', '其他', '餅乾', 'prouct-uploads/yjps565522-116.jpg', '雷蒙德夾心餅乾(巧克力)', '台北市', '50', '37', 0, ''),
(118, 'yjps565522', '其他', '肥皂禮盒', 'prouct-uploads/yjps565522-117.jpg', '肥皂禮盒 巧克力造型', '雲林縣', '780', '0', 0, ''),
(119, 'yjps565522', '其他', '手環', 'prouct-uploads/yjps565522-119.jpg', '創意手錶可愛精緻復古 皮革+ 繡花+ 手工燙鑽 約8成新', '澎湖縣', '100', '0', 0, ''),
(120, 'yjps565522', '其他', '手環', 'prouct-uploads/yjps565522-120.png', 'Rebel at Heart 系列，黑鑽石串珠-賽車輪壓紋串珠手環 幾乎全新', '新竹縣', '660', '0', 0, ''),
(121, 'a1033345', '其他', '手錶', 'prouct-uploads/a1033345-71.jpeg', '索尼FES Watch墨水屏手錶 約8成新', '臺南市', '7500', '0', 0, ''),
(122, 'a1033345', '其他', '馬克杯', 'prouct-uploads/a1033345-122.jpg', '馬克杯兩入 未使用過 適合情侶閨蜜', '桃園市', '88', '0', 0, ''),
(123, 'a1033345', '其他', 'KITTY保濕化妝水', 'prouct-uploads/a1033345-123.jpg', 'KITTY肌研保濕化妝水 使用約一成 ', '臺南市', '300', '0', 0, ''),
(124, 'a1033345', '其他', '化妝品組', 'prouct-uploads/a1033345-124.jpg', 'MISSHA與LINE合作推出熊大系列化妝品組 幾乎全新', '宜蘭縣', '2400', '0', 0, ''),
(125, 'a1033345', '其他', '化妝包 媽媽包', 'prouct-uploads/a1033345-125.jpg', '可充當化妝包 媽媽包等 約9成新', '臺東縣', '99', '0', 0, ''),
(126, 'tyng', '其他', '帳篷', 'prouct-uploads/tyng-67.jpg', '超輕硅膠專業徒步帳篷 約8成新', '新竹縣', '7800', '0', 0, ''),
(127, 'tyng', '其他', '烤麵包機', 'prouct-uploads/tyng-127.jpg', '110v多士爐110伏多士爐烤面包機吐司機 約9成新', '苗栗縣', '650', '5', 0, ''),
(128, 'tyng', '其他', '烤麵包機', 'prouct-uploads/tyng-128.jpg', '110v多士爐110伏多士爐烤面包機吐司機 約9成新', '苗栗縣', '650', '0', 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `users_id` int(10) NOT NULL,
  `users_account` varchar(12) COLLATE utf8_bin NOT NULL,
  `users_password` varchar(10) COLLATE utf8_bin NOT NULL,
  `users_phone` varchar(12) COLLATE utf8_bin NOT NULL,
  `users_address` text COLLATE utf8_bin NOT NULL,
  `users_email` varchar(30) COLLATE utf8_bin NOT NULL,
  `users_money` int(20) NOT NULL,
  `users_photo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`users_id`, `users_account`, `users_password`, `users_phone`, `users_address`, `users_email`, `users_money`, `users_photo`) VALUES
(2, 'admin', '123', '666', ' 1', '', 0, ''),
(5, 'bbb1', '電話1', '電話111', 'taiwan', 'dsdsad@fsdf.sa', 999, ''),
(7, 'test', '123', '0988755', '高雄市 楠梓區 1大雄南路', '44@GMAIL.COM', 14814, ''),
(11, 'hello', '123', 'taiwan14', '北韓', '', 999, ''),
(12, 'good', '12345', '061234141', '美國', '', 999, ''),
(13, 'root', '111', '06123', 'taiwan', '點我修改資料', 999, ''),
(14, 'yy', '889', '097881264', '台北市', '', 0, ''),
(15, 'a1033345', 'a10141212', '0912547869', '高雄市楠梓區高雄大學路700號', 'a1033345@nuk.edu.tw', 0, ''),
(16, 'tyng', 'aa10141212', '0978452698', '高雄市楠梓區大學26街', '', 0, ''),
(17, 'sandy', '12121212', '0987546584', '屏東縣東港鎮船頭里船頭路1號', '', 0, ''),
(18, 'yjps565522', 'yjps565522', '0987451236', '台北市文山區興隆路153號', '', 0, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 資料表索引 `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`love_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用資料表 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用資料表 AUTO_INCREMENT `love`
--
ALTER TABLE `love`
  MODIFY `love_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
