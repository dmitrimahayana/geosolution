-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 07:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `geosolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `backend_access`
--

CREATE TABLE IF NOT EXISTS `backend_access` (
  `ID_BACKEND_ACCESS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_BACKEND_PAGE` int(11) NOT NULL,
  `ID_GROUP` int(11) NOT NULL,
  PRIMARY KEY (`ID_BACKEND_ACCESS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `backend_access`
--

INSERT INTO `backend_access` (`ID_BACKEND_ACCESS`, `ID_BACKEND_PAGE`, `ID_GROUP`) VALUES
(4, 10, 1),
(5, 11, 1),
(7, 13, 1),
(8, 14, 1),
(9, 15, 1),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(17, 8, 4),
(19, 13, 4),
(20, 8, 1),
(23, 8, 3),
(25, 13, 3),
(26, 14, 3),
(27, 16, 1),
(28, 16, 2),
(30, 8, 6),
(31, 7, 1),
(32, 7, 2),
(33, 8, 2),
(34, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `backend_page`
--

CREATE TABLE IF NOT EXISTS `backend_page` (
  `ID_BACKEND_PAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PARENT_BACKEND` int(11) DEFAULT NULL,
  `NAME_BACKEND` varchar(255) DEFAULT NULL,
  `ORDERING_BACKEND` int(11) DEFAULT NULL,
  `LINK_BACKEND` varchar(255) DEFAULT NULL,
  `ONLINE_BACKEND` int(11) DEFAULT NULL,
  `DISPLAY_NAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_BACKEND_PAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `backend_page`
--

INSERT INTO `backend_page` (`ID_BACKEND_PAGE`, `ID_PARENT_BACKEND`, `NAME_BACKEND`, `ORDERING_BACKEND`, `LINK_BACKEND`, `ONLINE_BACKEND`, `DISPLAY_NAME`) VALUES
(1, NULL, 'konten', 1, '#', 1, 'Manajemen Konten'),
(2, NULL, 'media', 2, '#', 1, 'Manajemen Media'),
(3, NULL, 'previllage', 3, '#', 1, 'Manajemen Pengguna dan Akses'),
(4, 1, 'page', 1, 'page/manage', 1, 'Halaman Depan'),
(5, 1, 'category-page', 2, 'category-page/manage', 0, 'Kategori Halaman'),
(6, 1, 'article', 3, 'article/manage', 0, 'Artikel'),
(7, 2, 'interactive', 4, 'interactive/manage', 1, 'Interaktif'),
(8, 2, 'images', 1, 'images/manage', 1, 'Media Gambar'),
(9, 2, 'video', 2, 'video/manage', 1, 'Media Video'),
(10, 3, 'user', 1, 'user/manage', 1, 'Pengguna'),
(11, 3, 'user_group', 2, 'user_group/manage', 1, 'Grup Pengguna dan Hak Akses'),
(12, 3, 'setting', 3, 'setting/manage', 1, 'Pengaturan'),
(13, 1, 'menu', 5, 'menu/manage', 1, 'Menu Halaman Depan'),
(14, 1, 'menu_category', 6, 'menu_category/manage', 1, 'Kategori Menu Halaman Depan'),
(15, 1, 'lang', 7, 'lang/manage', 1, 'Bahasa'),
(16, 3, 'message', 10, 'message/manage', 1, 'Pesan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_media_images`
--

CREATE TABLE IF NOT EXISTS `detail_media_images` (
  `ID_IMAGE` int(11) NOT NULL,
  `ID_PAGE` int(11) NOT NULL,
  PRIMARY KEY (`ID_IMAGE`,`ID_PAGE`),
  KEY `FK_RELATIONSHIP_11` (`ID_PAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_media_videos`
--

CREATE TABLE IF NOT EXISTS `detail_media_videos` (
  `ID_VIDEO` int(11) NOT NULL,
  `ID_PAGE` int(11) NOT NULL,
  PRIMARY KEY (`ID_VIDEO`,`ID_PAGE`),
  KEY `FK_RELATIONSHIP_13` (`ID_PAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interactive`
--

CREATE TABLE IF NOT EXISTS `interactive` (
  `ID_INTERACTIVE` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) NOT NULL,
  `IMAGES` varchar(255) NOT NULL,
  `LINK` varchar(255) NOT NULL,
  `DATE` int(11) NOT NULL,
  `IS_ONLINE` int(11) NOT NULL,
  PRIMARY KEY (`ID_INTERACTIVE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `interactive`
--

INSERT INTO `interactive` (`ID_INTERACTIVE`, `NAMA`, `IMAGES`, `LINK`, `DATE`, `IS_ONLINE`) VALUES
(10, 'safety-kit', 'AA-Road-Safety-Kit.jpg', '6', 1386487615, 1),
(11, 'gps-handheld', 'GPS%20Handheld.jpg', '11', 1386487609, 1),
(12, 'gps-map', 'gps%20maps.jpg', '11', 1386487600, 1),
(13, 'gps-geodetik', 'GPS%20Geodetic.JPG', '11', 1386487594, 1),
(14, 'waterpass', 'Waterpass.jpg', '15', 1386487586, 1),
(15, 'total-station', 'Total%20Station.jpg', '12', 1386487578, 1);

-- --------------------------------------------------------

--
-- Table structure for table `interactive_lang`
--

CREATE TABLE IF NOT EXISTS `interactive_lang` (
  `ID_INTERACTIVE_LANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INTERACTIVE` int(11) NOT NULL,
  `ID_LANG` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`ID_INTERACTIVE_LANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `interactive_lang`
--

INSERT INTO `interactive_lang` (`ID_INTERACTIVE_LANG`, `ID_INTERACTIVE`, `ID_LANG`, `TITLE`, `DESCRIPTION`) VALUES
(8, 10, 1, 'Alat Keamanan', ''),
(9, 10, 2, 'Safety Kit', ''),
(10, 11, 1, 'GPS Handheld', ''),
(11, 11, 2, 'GPS Handheld', ''),
(12, 12, 1, 'GPS Map', ''),
(13, 12, 2, 'GPS Map', ''),
(14, 13, 1, 'GPS Geodetik', ''),
(15, 13, 2, 'GPS Geodetik', ''),
(16, 14, 1, 'Waterpass', ''),
(17, 14, 2, 'Waterpass', ''),
(18, 15, 1, 'Total Station', ''),
(19, 15, 2, 'Total Station', '');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `ID_LANG` int(11) NOT NULL AUTO_INCREMENT,
  `LANG` varchar(255) DEFAULT NULL,
  `ORDERING_LANG` int(11) DEFAULT NULL,
  `ONLINE_LANG` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`ID_LANG`, `LANG`, `ORDERING_LANG`, `ONLINE_LANG`) VALUES
(1, 'indonesia', 1, 1),
(2, 'english', 2, 1),
(4, 'jerman', 3, 0),
(5, 'jepang', 4, 0),
(6, 'china', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `ID_HISTORY` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `IP_ADDRESS` varchar(255) DEFAULT NULL,
  `TIME` int(11) DEFAULT NULL,
  `IS_ONLINE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_HISTORY`),
  KEY `FK_RELATIONSHIP_9` (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`ID_HISTORY`, `ID_USER`, `IP_ADDRESS`, `TIME`, `IS_ONLINE`) VALUES
(1, 1, '127.0.0.1', 1386484678, 0),
(2, 1, '127.0.0.1', 1386484832, 1),
(3, 1, '127.0.0.1', 1386484858, 0),
(4, 7, '127.0.0.1', 1386484861, 1),
(5, 7, '127.0.0.1', 1386485426, 0),
(6, 7, '127.0.0.1', 1386485430, 1),
(7, 7, '127.0.0.1', 1386485437, 0),
(8, 1, '127.0.0.1', 1386485442, 1),
(9, 1, '127.0.0.1', 1386485293, 1),
(10, 1, '127.0.0.1', 1386487690, 0),
(11, 1, '127.0.0.1', 1386487721, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tracker`
--

CREATE TABLE IF NOT EXISTS `login_tracker` (
  `ID_TRACKER` int(11) NOT NULL AUTO_INCREMENT,
  `IP_ADDRESS` varchar(255) DEFAULT NULL,
  `FIRST_TIME` int(11) DEFAULT NULL,
  `FAILURE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TRACKER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login_tracker`
--

INSERT INTO `login_tracker` (`ID_TRACKER`, `IP_ADDRESS`, `FIRST_TIME`, `FAILURE`) VALUES
(4, '::1', NULL, 0),
(5, '127.0.0.1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

CREATE TABLE IF NOT EXISTS `media_images` (
  `ID_IMAGE` int(11) NOT NULL AUTO_INCREMENT,
  `IMAGE_NAME` varchar(255) DEFAULT NULL,
  `EXT` varchar(255) DEFAULT NULL,
  `LINK_VIDEO` varchar(255) DEFAULT NULL,
  `THUMBNAIL` varchar(255) DEFAULT NULL,
  `WIDTH` int(11) DEFAULT NULL,
  `HEIGHT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IMAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media_videos`
--

CREATE TABLE IF NOT EXISTS `media_videos` (
  `ID_VIDEO` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_VIDEO` varchar(255) DEFAULT NULL,
  `LINK_VIDEO` varchar(255) DEFAULT NULL,
  `ONLINE_VIDEO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_VIDEO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MENU_CATEGORY` int(11) DEFAULT NULL,
  `NAME_MENU` varchar(255) DEFAULT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `ORDERING_MENU` int(11) DEFAULT NULL,
  `LINK_MENU` varchar(255) DEFAULT NULL,
  `ONLINE_MENU` int(11) DEFAULT NULL,
  `METADATA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MENU`),
  KEY `FK_RELATIONSHIP_5` (`ID_MENU_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `ID_MENU_CATEGORY`, `NAME_MENU`, `ID_PARENT`, `ORDERING_MENU`, `LINK_MENU`, `ONLINE_MENU`, `METADATA`) VALUES
(1, 1, 'home', NULL, 1, 'http://localhost/geosolution/home', 1, NULL),
(2, 1, 'profile', NULL, 2, 'http://localhost/geosolution/profile', 1, ''),
(8, 1, 'service', NULL, 3, 'http://localhost/geosolution/service', 1, ''),
(9, 1, 'project', NULL, 4, 'http://localhost/geosolution/project', 1, ''),
(13, 1, 'about', NULL, 5, 'http://localhost/geosolution/about', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE IF NOT EXISTS `menu_category` (
  `ID_MENU_CATEGORY` int(11) NOT NULL AUTO_INCREMENT,
  `CODE_CATEGORY` varchar(255) DEFAULT NULL,
  `NAME_CATEGORY` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MENU_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`ID_MENU_CATEGORY`, `CODE_CATEGORY`, `NAME_CATEGORY`) VALUES
(1, 'sidebar', 'halaman-sidebar'),
(2, 'fixed-page', 'halaman-fixed');

-- --------------------------------------------------------

--
-- Table structure for table `menu_lang`
--

CREATE TABLE IF NOT EXISTS `menu_lang` (
  `ID_MENU_LANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LANG` int(11) DEFAULT NULL,
  `ID_MENU` int(11) DEFAULT NULL,
  `TEXT_MENU` text,
  PRIMARY KEY (`ID_MENU_LANG`),
  KEY `FK_RELATIONSHIP_1` (`ID_LANG`),
  KEY `FK_RELATIONSHIP_2` (`ID_MENU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `menu_lang`
--

INSERT INTO `menu_lang` (`ID_MENU_LANG`, `ID_LANG`, `ID_MENU`, `TEXT_MENU`) VALUES
(3, 1, 2, 'Profil'),
(4, 2, 2, 'Profiles'),
(5, 1, 8, 'layanan'),
(6, 2, 8, 'Services'),
(7, 1, 9, 'Proyek'),
(8, 2, 9, 'Projects'),
(15, 1, 13, 'Kontak Kami'),
(16, 2, 13, 'Contact Us'),
(17, 1, 1, 'Beranda'),
(18, 2, 1, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PARENT` int(11) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `SUBJECT` varchar(25) NOT NULL,
  `TEXT_MESSAGE` text NOT NULL,
  `TIME_MESSAGE` int(11) NOT NULL,
  `IS_READ` int(11) NOT NULL,
  PRIMARY KEY (`ID_MESSAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID_MESSAGE`, `ID_PARENT`, `USERNAME`, `SUBJECT`, `TEXT_MESSAGE`, `TIME_MESSAGE`, `IS_READ`) VALUES
(1, 0, 'skywrath', 'Ask Forum', 'min ane tanya ini yang ngelola forum sapa', 1, 1),
(2, 1, 'superadmin', 'Ask Forum', 'yang ngelola moderator', 2, 1),
(3, 1, 'skywrath', 'Ask Forum', 'kok moderator sih? bukannya ada admin sendiri ya?', 3, 1),
(4, 0, 'naix', 'event', 'min ada event apa tahun depan?', 2, 1),
(10, 4, 'superadmin', 'event', '<p><img src="source/1388639_3483409941636_1921234198_n.jpg" alt="1388639_3483409941636_1921234198_n" width="406" height="406" /></p>\r\n<p>DIRETIDE</p>\r\n<p>salam admin</p>', 1384379247, 1),
(11, 1, 'superadmin', 'Ask Forum', '<p>yayayaya</p>\r\n<p><img src="source/1396685_3483409861634_584648354_n.jpg" alt="1396685_3483409861634_584648354_n" /><img src="source/1390733_747475428611942_579983825_n.jpg" alt="1390733_747475428611942_579983825_n" /></p>', 1384376703, 1),
(12, 4, 'superadmin', 'event', '<p><img src="upload/thumbs/1388639_3483409941636_1921234198_n.jpg" alt="1388639_3483409941636_1921234198_n" /></p>', 1384377631, 1),
(13, 4, 'superadmin', 'event', '<p><img src="upload/1388639_3483409941636_1921234198_n.jpg" alt="1388639_3483409941636_1921234198_n" width="309" height="309" /></p>', 1384377795, 1),
(14, 4, 'superadmin', 'event', '<p><img src="upload/1420613_3483407101565_603242691_n.jpg" alt="1420613_3483407101565_603242691_n" width="330" height="330" /></p>', 1384377925, 1),
(15, 1, 'superadmin', 'Ask Forum', '<p><img src="upload/903143_730786106947541_23833316_o.jpg" alt="903143_730786106947541_23833316_o" width="413" height="203" /></p>', 1384377955, 1),
(16, 4, 'superadmin', 'event', '<p><img src="upload/999618_454073384692926_619824450_n.jpg" alt="999618_454073384692926_619824450_n" /></p>', 1384378509, 1),
(17, 1, 'superadmin', 'Ask Forum', '<p><img src="upload/1396685_3483409861634_584648354_n.jpg" alt="1396685_3483409861634_584648354_n" width="229" height="229" /></p>', 1384376625, 1),
(18, 4, 'superadmin', 'event', '<p><img src="upload/1420613_3483407101565_603242691_n.[1].jpg" alt="1420613_3483407101565_603242691_n.[1]" width="178" height="178" /></p>', 1384376639, 1),
(19, 1, 'superadmin', 'Ask Forum', '<p><img alt="" src="http://localhost/geosolution/upload/images/Candice-Swanepoel-Wallpapers%20(1).jpg" style="height:75px; width:100px" /></p>\r\n\r\n<p>semangat kk</p>\r\n', 1385664525, 1),
(20, 1, 'superadmin', 'Ask Forum', '<p><img alt="" src="http://localhost/geosolution/upload/images/funny-baby-love-pictures-1080p-hd-wallpaper.jpg" style="height:133px; width:200px" /></p>\r\n', 1385734729, 1),
(21, 4, 'superadmin', 'event', '<p><img alt="" src="http://localhost/geosolution/upload/images/Programmer-Wallpapers.jpg" style="height:56px; width:100px" /></p>\n', 1385739302, 1),
(22, 1, 'superadmin', 'Ask Forum', '<p>hahaha</p>\r\n', 1385739517, 1),
(25, 0, 'dmitri ivanovsky', 'testing', 'asdasdasdsa mantra', 1386485068, 1),
(26, 0, 'demit', 'testing', 'wrawrawrar', 1386485478, 1),
(27, 26, 'demit', 'testing', 'sasdsas', 1386485516, 1),
(28, 25, 'dmitri ivanovsky', 'testing', 'qweqweq', 1386485524, 1),
(29, 25, 'dmitri ivanovsky', 'testing', 'fafaaaafa', 1386485540, 1),
(30, 25, 'superadmin', 'testing', '<p>opo</p>\r\n', 1386485968, 1),
(31, 25, 'dmitri ivanovsky', 'testing', 'berhasil gak?', 1386485488, 1),
(32, 25, 'dmitri ivanovsky', 'testing', 'yessss!!!', 1386485529, 1),
(33, 25, 'dmitri ivanovsky', 'testing', 'sek', 1386485618, 1),
(34, 26, 'demit', 'testing', 'test lagi', 1386485667, 1),
(35, 26, 'superadmin', 'testing', '<p>mantap gan</p>\r\n', 1386485690, 1),
(40, 4, 'naix', 'event', 'sadsas', 1386486298, 1),
(41, 4, 'superadmin', 'event', '<p>gaplek i kon</p>\r\n', 1386486323, 1),
(42, 1, 'skywrath', 'Ask Forum', 'gan kok habis event nya????', 1386486373, 1),
(43, 1, 'superadmin', 'Ask Forum', '<p>lah salahmu nak kok mewek</p>\r\n\r\n<p><img alt="" src="http://localhost/geosolution/upload/images/logo%20geosolution.png" style="width: 256px; height: 256px;" /></p>\r\n', 1386486415, 1),
(44, 1, 'skywrath', 'Ask Forum', 'huhuhuhu sedih T.T', 1386486458, 0),
(45, 1, 'skywrath', 'Ask Forum', 'bikin event baru lagi dong min', 1386486490, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `ID_PAGE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_PAGE` varchar(255) DEFAULT NULL,
  `TIME_PAGE` int(11) NOT NULL,
  `ONLINE_PAGE` int(11) DEFAULT NULL,
  `METADATA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID_PAGE`, `NAME_PAGE`, `TIME_PAGE`, `ONLINE_PAGE`, `METADATA`) VALUES
(3, 'profile', 1386486825, 1, 'profil,profile'),
(4, 'service', 1386486544, 1, 'service,servis'),
(6, 'project', 1386484583, 1, 'client,klien'),
(11, 'about', 1386486784, 1, 'about,tentang'),
(12, 'pemetaan-topografi', 1386486786, 1, ''),
(13, 'survey-gps', 1386487265, 1, ''),
(14, 'gis', 1386484358, 1, 'gis'),
(15, 'survey-batimetri-hidrografi', 1386487276, 1, ''),
(16, 'rental-alat-survey', 1386487292, 1, ''),
(17, 'service-survice', 1386487299, 1, ''),
(18, 'pelatihan', 1386487305, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `page_lang`
--

CREATE TABLE IF NOT EXISTS `page_lang` (
  `ID_PAGE_LANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LANG` int(11) DEFAULT NULL,
  `ID_PAGE` int(11) DEFAULT NULL,
  `CONTENT` text,
  `TITLE_` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGE_LANG`),
  KEY `FK_RELATIONSHIP_3` (`ID_LANG`),
  KEY `FK_RELATIONSHIP_4` (`ID_PAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `page_lang`
--

INSERT INTO `page_lang` (`ID_PAGE_LANG`, `ID_LANG`, `ID_PAGE`, `CONTENT`, `TITLE_`) VALUES
(5, 1, 3, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Hubungi kami</h4>\r\n\r\n<ul>\r\n	<li><strong>Telephone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Alamat :</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8 well">\r\n<div class="spacer30">&nbsp;</div>\r\n\r\n<form action="#" method="post" name="comment-form">\r\n<div class="row">\r\n<div class="span8">Kami adalah perusahaan dibidang Geodesi yang memberikan layanan untuk sebuah proyek proyek pembangunan nasional</div>\r\n\r\n<div class="span8"><br />\r\n<img src="http://localhost/geosolution/upload/images/img10.png" /></div>\r\n</div>\r\n</form>\r\n</div>\r\n', 'profil'),
(6, 2, 3, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;Contact us</h4>\r\n\r\n<ul>\r\n	<li><strong>Phone : </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Address:</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8 well">\r\n<div class="spacer30">&nbsp;</div>\r\n\r\n<form action="#" method="post" name="comment-form">\r\n<div class="row">\r\n<div class="span8">We are a company that provides services field surveyor for a national development projects<br />\r\n&nbsp;</div>\r\n\r\n<div class="span8"><img src="http://localhost/geosolution/upload/images/img10.png" /></div>\r\n</div>\r\n</form>\r\n</div>\r\n', 'profile'),
(7, 1, 4, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Hubungi kami</h4>\r\n\r\n<ul>\r\n	<li><strong>Telephone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Alamat :</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8 well">\r\n<h3>&nbsp;&nbsp;Apa yang kami kerjakan</h3>\r\n\r\n<div class="accordion" id="accordion2">\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseOne">1. Pemetaan Topografi</a></div>\r\n\r\n<div class="accordion-body collapse in" id="collapseOne">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Pemetaan Topografi</h5>\r\n\r\n<p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>\r\n<a href="http://localhost/geosolution/pemetaan-topografi/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseTwo">2. Survey GPS</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseTwo">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Survey GPS</h5>\r\n\r\n<p>Melakukan pemetaan bentuk dan ukuran bumi yang dilakukan secara terestris (menggunakan peralatan manual) dan ekstra terestris (menggunakan bantuan satelit penginderaan jauh dan GPS/Global Positioning System)</p>\r\n<a href="http://localhost/geosolution/survey-gps/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseThree">3. GIS</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseThree">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/gis.png" style="width: 200px; height: 150px;" />\r\n<h5>GIS</h5>\r\n\r\n<p>Metode penyampaian informasi secara grafis yang menggabungkan peta dengan data-data lapangan sehingga lebih mudah dipahami dan dianalisa. Data GIS dapat dimanfaatkan sebagai acuan perencanaan pembangunan, bank data atau alat pemantau pembangunan.</p>\r\n<a href="http://localhost/geosolution/gis/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseFour">4. Survey Batimetri/Hidrografi</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseFour">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Survey Batimetri/Hidrografi</h5>\r\n\r\n<p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>\r\n<a href="http://localhost/geosolution/survey-batimetri-hidrografi/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapse5">5. Rental Alat Survey</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapse5">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Rental Alat Survey</h5>\r\n\r\n<p>Sebagai perusahaan yang bergerak di bidang survey pemetaan, PT JSK melayani kebutuhan alat survey baik digital maupun manual dengan sistem harian maupun bulanan. Pemenuhan kebutuhan peralatan survey ini juga bisa dilakukan dengan sistem sewa beli maupun penjualan alat second denga harga yang kompetitif. Selain perwatan yang memenuhi standart, PT JSK secara berkala melakukan kalibrasi pada setiap unit alat survey untuk menjamin keakuratan data sessuai dengan tingkat ketelitian yang diharapkan.</p>\r\n<a href="http://localhost/geosolution/rental-alat-survey/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapsesix">6. Service Survice</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapsesix">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Waterpass.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Service Survice</h5>\r\n\r\n<p>Salah satu layanan di PT JSK addalah menyediakan surveyor lengkap dengan Total Station untuk melaksanakan pekerjaan sesuai dengan kebutuhan pemakai jasa. PT JSK menjamin kemampuan dan kesinambungan keberadaan personil dan unit kerja di lokasi pekerjaan sesuai dengan kelas atau paketnya.</p>\r\n<a href="http://localhost/geosolution/service-survice/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseseven">7. Pelatihan</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseseven">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 200px; height: 150px;" />\r\n<h5>Pelatihan</h5>\r\n\r\n<p>Pelatihan Total Station adalah merupakan wadah peningkatan kemampuan surveyor di bidang pengukuran praktis sesuai kebutuhan. PT JSK dengan dukungan personal, unit kerja dan komputasi yang memadai siap menjalin kerjasama dengan pihak-pihak yang bermaksud mengadakan pelatihan Total Station.</p>\r\n<a href="http://localhost/geosolution/pelatihan/1">Selengkapnya</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'layanan'),
(8, 2, 4, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Contact us</h4>\r\n\r\n<ul>\r\n	<li><strong>Phone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Address:</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8 well">\r\n<h3>&nbsp; What we do</h3>\r\n\r\n<div class="accordion" id="accordion2">\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseOne">1. Topografi Mapping</a></div>\r\n\r\n<div class="accordion-body collapse in" id="collapseOne">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Topografi Mapping</h5>\r\n\r\n<p>Creating topographic maps / earth relief (show all elements that exist above the Earth''s surface both natural and man-made elements)</p>\r\n<a href="http://localhost/geosolution/pemetaan-topografi/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseTwo">2. GPS Survey</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseTwo">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 200px; height: 150px;" />\r\n<h5>GPS Survey</h5>\r\n\r\n<p>Mapping the shape and size of the terrestrial earth is done (using hand tools) and extra-terrestrial (using the help of satellite remote sensing and GPS / Global Positioning System)</p>\r\n<a href="http://localhost/geosolution/survey-gps/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseThree">3. GIS</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseThree">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/gis.png" style="width: 200px; height: 150px;" />\r\n<h5>GIS</h5>\r\n\r\n<p>Delivery methods that combine graphical information with a map of the data so that the field is more easily understood and analyzed. GIS data can be used as a reference for development planning, data bank or building monitoring tool.</p>\r\n<a href="http://localhost/geosolution/gis/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseFour">4. Batimetri/Hidrografi Survey</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseFour">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Batimetri/Hidrografi Survey</h5>\r\n\r\n<p>Surveying / mapping the ocean to identify potential contained in these waters. Initially this survey is required for navigation purposes, but is now in line with the growing use of marine resources, this survey is also required for the purpose / function as the wider areas: Fisheries, Tourism, Port Development is also a gas pipeline or submarine cable.</p>\r\n<a href="http://localhost/geosolution/survey-batimetri-hidrografi/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapse5">5. Equipment Survey Rental</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapse5">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Equipment Survey Rental</h5>\r\n\r\n<p>As a company engaged in the field of survey mapping, PT JSK serve the needs of both digital survey tools or manual with daily or monthly system.\r\nMeeting the needs of the survey equipment can also be done on a lease purchase and sale of second tool premises at competitive prices.\r\nBesides perwatan who meet the standard, PT JSK periodically perform calibration on each unit of survey tools to ensure the accuracy of the data sessuai the level of accuracy expected.</p>\r\n<a href="http://localhost/geosolution/rental-alat-survey/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapsesix">6. Service Survice</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapsesix">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Waterpass.jpg" style="width: 200px; height: 150px;" />\r\n<h5>Service Survice</h5>\r\n\r\n<p>One service in PT JSK addalah provide complete surveyor with Total Station to carry out the work in accordance with the needs of service users. PT JSK ensure the continued existence and capabilities of personnel and units of work at the job site in accordance with the class or package.</p>\r\n<a href="http://localhost/geosolution/service-survice/2">More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="accordion-group">\r\n<div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseseven">7. Training</a></div>\r\n\r\n<div class="accordion-body collapse" id="collapseseven">\r\n<div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 200px; height: 150px;" />\r\n<h5>Training</h5>\r\n\r\n<p>Total Training Station is a container capacity building surveyors in the field of practical measurements as needed.\r\nPT JSK with personal support, work units and adequate computing ready to work together with the parties who intend to Total Station training.</p>\r\n<a href="http://localhost/geosolution/pelatihan/2">More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'service'),
(14, 4, 4, '', 'Insert Title'),
(15, 5, 4, '', 'Insert Title'),
(16, 6, 4, '', 'china tok'),
(17, 5, 3, '<p>1</p>', 'jepang'),
(18, 6, 3, '<p>2</p>', 'china'),
(19, 4, 3, '<p><img src="http://localhost/geosolution/source/1390733_747475428611942_579983825_n.jpg" alt="1390733_747475428611942_579983825_n" /></p>', 'new jerman'),
(23, 1, 6, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Hubungi kami</h4>\r\n\r\n<ul>\r\n	<li><strong>Telephone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Alamat :</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8 well">\r\n<h3 class="heading-success">Proyek Terakhir</h3>\r\n\r\n<div class="carousel btleft" id="latest-work">\r\n<div class="carousel-wrapper">\r\n<ul class="portfolio-home da-thumbs">\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="index.php"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Pemetaan Topografi</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Survei GPS</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/gis.png" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>GIS</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 267px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Survey Batimetri/Hidrografi</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Rental Alat Survey</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Waterpass.jpg" style="width: 267px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Service Survice</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Pelatihan</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 'Project'),
(24, 2, 6, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Hubungi kami</h4>\r\n\r\n<ul>\r\n	<li><strong>Telephone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Alamat :</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="span8">\r\n<h3 class="heading-success">Proyek Terakhir</h3>\r\n\r\n<div class="carousel btleft" id="latest-work">\r\n<div class="carousel-wrapper">\r\n<ul class="portfolio-home da-thumbs">\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="index.php"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Pemetaan Topografi</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Survei GPS</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/gis.png" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>GIS</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 267px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Survey Batimetri/Hidrografi</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Rental Alat Survey</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Waterpass.jpg" style="width: 267px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Service Survice</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="thumbnail">\r\n	<div class="image-wrapp"><img alt="Portfolio name" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 800px; height: 200px;" title="" />\r\n	<article class="da-animate da-slideFromRight" style="display: block;"><a class="link_post" href="portfolio-detail.html"><img alt="" src="http://localhost/geosolution/assets/img/icons/link_post_icon.png" /></a> <span><a class="zoom" data-pretty="prettyPhoto" href="http://localhost/geosolution/assets/img/dummies/big1.jpg"><img alt="Portfolio name" src="http://localhost/geosolution/assets/img/icons/zoom_icon.png" title="Portfolio name" /></a></span></article>\r\n	</div>\r\n\r\n	<div class="caption">\r\n	<h5>Pelatihan</h5>\r\n	</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 'Project'),
(33, 1, 11, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;&nbsp;Hubungi kami</h4>\r\n\r\n<ul>\r\n	<li><strong>Telephone: </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Alamat :</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n', 'tentang kami'),
(34, 2, 11, '<div class="span3 well">\r\n<div class="widget">\r\n<h4>&nbsp;Contact us</h4>\r\n\r\n<ul>\r\n	<li><strong>Phone : </strong>\r\n\r\n	<p>+62 821 4379 0711</p>\r\n	</li>\r\n	<li><strong>Email : </strong>\r\n	<p>geosolution@live.com</p>\r\n	</li>\r\n	<li><strong>Address:</strong>\r\n	<p>Jalan Keputih Tegal Timur N0. 7<br />\r\n	Sukolilo, Surabaya&nbsp;</p>\r\n	</li>\r\n	<li><strong>Twitter: </strong>\r\n	<p>@geosolution_SBY</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="googleMap" style="width:270px;height:200px;">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n', 'about us'),
(35, 1, 12, '<p><img alt="" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 600px; height: 448px;" /></p>\r\n\r\n<p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>\r\n', 'Pemetaan Topografi'),
(36, 2, 12, '<p><img alt="" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 600px; height: 448px;" /></p>\r\n\r\n<p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>\r\n', 'Pemetaan Topografi'),
(37, 1, 13, '<p><img alt="" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 600px; height: 800px;" /></p>\r\n\r\n<p>Melakukan pemetaan bentuk dan ukuran bumi yang dilakukan secara terestris (menggunakan peralatan manual) dan ekstra terestris (menggunakan bantuan satelit penginderaan jauh dan GPS/Global Positioning System)</p>\r\n', 'Survey GPS'),
(38, 2, 13, '<p><img alt="" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 600px; height: 800px;" /></p>\r\n\r\n<p>Melakukan pemetaan bentuk dan ukuran bumi yang dilakukan secara terestris (menggunakan peralatan manual) dan ekstra terestris (menggunakan bantuan satelit penginderaan jauh dan GPS/Global Positioning System)</p>\r\n', 'Survey GPS'),
(39, 1, 14, '<p><img alt="" src="http://localhost/geosolution/upload/images/gis.png" style="width: 600px; height: 480px;" /></p>\r\n\r\n<p>Metode penyampaian informasi secara grafis yang&nbsp; menggabungkan peta dengan data-data lapangan sehingga lebih mudah dipahami dan dianalisa. Data GIS dapat dimanfaatkan sebagai acuan perencanaan pembangunan, bank data atau alat pemantau pembangunan.</p>\r\n', 'GIS'),
(40, 2, 14, '<p><img alt="" src="http://localhost/geosolution/upload/images/gis.png" style="width: 600px; height: 480px;" /></p>\r\n\r\n<p>Metode penyampaian informasi secara grafis yang&nbsp; menggabungkan peta dengan data-data lapangan sehingga lebih mudah dipahami dan dianalisa. Data GIS dapat dimanfaatkan sebagai acuan perencanaan pembangunan, bank data atau alat pemantau pembangunan.</p>\r\n', 'GIS'),
(41, 1, 15, '<p><img alt="" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 600px; height: 450px;" /></p>\r\n\r\n<p>Survey/pemetaan laut untuk mengidentifikasikan potensi-potensi yang terdapat di perairan tersebut. Awalnya survey ini dibutuhkan untuk keperluan navigasi, namun kini sejalan dengan berkembangnya pemanfaatan sumberdaya kelautan, survey ini juga dibutuhkan untuk keperluan/fungsi yang lebih luas seperti pada bidang: Perikanan, Pariwisata, Pembangunan Pelabuhan juga pemasangan pipa gas atau kabel bawah laut.</p>\r\n', 'Survey Batimetri/Hidrografi'),
(42, 2, 15, '<p><img alt="" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 600px; height: 450px;" /></p>\r\n\r\n<p>Survey/pemetaan laut untuk mengidentifikasikan potensi-potensi yang terdapat di perairan tersebut. Awalnya survey ini dibutuhkan untuk keperluan navigasi, namun kini sejalan dengan berkembangnya pemanfaatan sumberdaya kelautan, survey ini juga dibutuhkan untuk keperluan/fungsi yang lebih luas seperti pada bidang: Perikanan, Pariwisata, Pembangunan Pelabuhan juga pemasangan pipa gas atau kabel bawah laut.</p>\r\n', 'Survey Batimetri/Hidrografi'),
(43, 1, 16, '<p><img alt="" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 600px; height: 381px;" /></p>\r\n\r\n<p>Sebagai perusahaan yang bergerak di bidang survey pemetaan, PT JSK melayani kebutuhan alat survey baik digital maupun manual dengan sistem harian maupun bulanan.<br />\r\nPemenuhan kebutuhan peralatan survey ini juga bisa dilakukan dengan sistem sewa beli maupun penjualan alat second denga harga yang kompetitif.<br />\r\nSelain perwatan yang memenuhi standart, PT JSK secara berkala melakukan kalibrasi pada setiap unit alat survey untuk menjamin keakuratan data sessuai dengan tingkat ketelitian yang diharapkan.<br />\r\n&nbsp;</p>\r\n', 'Rental Alat Survey'),
(44, 2, 16, '<p><img alt="" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 600px; height: 381px;" /></p>\r\n\r\n<p>Sebagai perusahaan yang bergerak di bidang survey pemetaan, PT JSK melayani kebutuhan alat survey baik digital maupun manual dengan sistem harian maupun bulanan.<br />\r\nPemenuhan kebutuhan peralatan survey ini juga bisa dilakukan dengan sistem sewa beli maupun penjualan alat second denga harga yang kompetitif.<br />\r\nSelain perwatan yang memenuhi standart, PT JSK secara berkala melakukan kalibrasi pada setiap unit alat survey untuk menjamin keakuratan data sessuai dengan tingkat ketelitian yang diharapkan.<br />\r\n&nbsp;</p>\r\n', 'Rental Alat Survey'),
(45, 1, 17, '<p>Salah satu layanan di PT JSK addalah menyediakan surveyor lengkap dengan Total Station untuk melaksanakan pekerjaan sesuai dengan kebutuhan pemakai jasa. PT JSK menjamin kemampuan dan kesinambungan keberadaan personil dan unit kerja di lokasi pekerjaan sesuai dengan kelas atau paketnya.<br />\r\n&nbsp;</p>\r\n', 'Service Survice'),
(46, 2, 17, '<p>Salah satu layanan di PT JSK addalah menyediakan surveyor lengkap dengan Total Station untuk melaksanakan pekerjaan sesuai dengan kebutuhan pemakai jasa. PT JSK menjamin kemampuan dan kesinambungan keberadaan personil dan unit kerja di lokasi pekerjaan sesuai dengan kelas atau paketnya.<br />\r\n&nbsp;</p>\r\n', 'Service Survice'),
(47, 1, 18, '<p><img alt="" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 600px; height: 397px;" /></p>\r\n\r\n<p>Pelatihan Total Station adalah merupakan wadah peningkatan kemampuan surveyor di bidang pengukuran praktis sesuai kebutuhan.<br />\r\nPT JSK dengan dukungan personal, unit kerja dan komputasi yang memadai siap menjalin kerjasama dengan pihak-pihak yang bermaksud mengadakan pelatihan Total Station.</p>\r\n', 'Pelatihan'),
(48, 2, 18, '<p><img alt="" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 600px; height: 397px;" /></p>\r\n\r\n<p>Pelatihan Total Station adalah merupakan wadah peningkatan kemampuan surveyor di bidang pengukuran praktis sesuai kebutuhan.<br />\r\nPT JSK dengan dukungan personal, unit kerja dan komputasi yang memadai siap menjalin kerjasama dengan pihak-pihak yang bermaksud mengadakan pelatihan Total Station.</p>\r\n', 'Pelatihan');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `ID_SETTING` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_SETTING` varchar(255) DEFAULT NULL,
  `VALUE` text,
  PRIMARY KEY (`ID_SETTING`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_GROUP` int(11) DEFAULT NULL,
  `JOIN_DATE` int(11) DEFAULT NULL,
  `LAST_VISIT` int(11) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `FK_RELATIONSHIP_6` (`ID_GROUP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_GROUP`, `JOIN_DATE`, `LAST_VISIT`, `USERNAME`, `PASSWORD`, `EMAIL`, `ACTIVE`) VALUES
(1, 1, 1383350400, 1386487721, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'de2.mit.goekiel.tc@gmail.com', 1),
(2, 3, 1383350400, 1384378364, 'editor', '5aee9dbd2a188839105073571bee1b1f', 'editor@editor', 1),
(3, 1, 1383350400, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dmitri.mahayana@gmail.com', 1),
(7, 2, 1386484856, 1386485430, 'kontributor', 'aa871ff83895d81aa1ecd566e1bd11ec', 'de2.mit.goekiel.tc@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `ID_GROUP` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` int(255) DEFAULT NULL,
  `GROUP_NAME` varchar(255) DEFAULT NULL,
  `DESCRIPTION` text,
  PRIMARY KEY (`ID_GROUP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`ID_GROUP`, `LEVEL`, `GROUP_NAME`, `DESCRIPTION`) VALUES
(1, 10000, 'super-admin', '<p>bisa akses semua fitur<br />\r\nhahahahaha</p>\r\n'),
(2, 5000, 'admin', '<p>admin biasa</p>\r\n'),
(3, 100, 'editor', ''),
(6, 10, 'kontributor', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_media_images`
--
ALTER TABLE `detail_media_images`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_IMAGE`) REFERENCES `media_images` (`ID_IMAGE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_PAGE`) REFERENCES `page` (`ID_PAGE`);

--
-- Constraints for table `detail_media_videos`
--
ALTER TABLE `detail_media_videos`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_VIDEO`) REFERENCES `media_videos` (`ID_VIDEO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_PAGE`) REFERENCES `page` (`ID_PAGE`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_MENU_CATEGORY`) REFERENCES `menu_category` (`ID_MENU_CATEGORY`);

--
-- Constraints for table `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_LANG`) REFERENCES `lang` (`ID_LANG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`);

--
-- Constraints for table `page_lang`
--
ALTER TABLE `page_lang`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_LANG`) REFERENCES `lang` (`ID_LANG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_PAGE`) REFERENCES `page` (`ID_PAGE`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_GROUP`) REFERENCES `user_group` (`ID_GROUP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
