-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2013 at 05:05 AM
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
  `ID_BACKEND_PAGE` int(11) NOT NULL,
  `ID_GROUP` int(11) NOT NULL,
  PRIMARY KEY (`ID_BACKEND_PAGE`,`ID_GROUP`),
  KEY `FK_RELATIONSHIP_15` (`ID_GROUP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backend_access`
--

INSERT INTO `backend_access` (`ID_BACKEND_PAGE`, `ID_GROUP`) VALUES
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `backend_page`
--

INSERT INTO `backend_page` (`ID_BACKEND_PAGE`, `ID_PARENT_BACKEND`, `NAME_BACKEND`, `ORDERING_BACKEND`, `LINK_BACKEND`, `ONLINE_BACKEND`, `DISPLAY_NAME`) VALUES
(1, NULL, 'konten', 1, NULL, 1, 'Manajemen Konten'),
(2, NULL, 'media', 2, NULL, 1, 'Manajemen Media'),
(3, NULL, 'previllage', 3, NULL, 1, 'Manajemen Pengguna dan Akses'),
(4, 1, 'Page', 1, NULL, 1, 'Halaman Depan'),
(5, 1, 'category-page', 2, NULL, 1, 'Kategori Halaman'),
(6, 1, 'article', 3, NULL, 1, 'Artikel'),
(7, 1, 'interactive', 4, NULL, 0, 'Interaktif'),
(8, 2, 'images', 1, NULL, 1, 'Media Gambar'),
(9, 2, 'video', 2, NULL, 1, 'Media Video'),
(10, 3, 'user', 1, NULL, 1, 'Pengguna'),
(11, 3, 'grup-previllage', 2, NULL, 1, 'Grup Pengguna dan Hak Akses'),
(12, 3, 'setting', 3, NULL, 1, 'Pengaturan'),
(13, 1, 'menu', 5, NULL, 1, 'Menu Halaman Depan'),
(14, 1, 'category-menu', 6, NULL, 1, 'Kategori Menu Halaman Depan');

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
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `ID_LANG` int(11) NOT NULL AUTO_INCREMENT,
  `LANG` varchar(255) DEFAULT NULL,
  `ORDERING_LANG` int(11) DEFAULT NULL,
  `ONLINE_LANG` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`ID_LANG`, `LANG`, `ORDERING_LANG`, `ONLINE_LANG`) VALUES
(1, 'indonesia', 1, 1),
(2, 'english', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `ID_HISTORY` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `IP_ADDRESS` varchar(255) DEFAULT NULL,
  `TIME` int(11) DEFAULT NULL,
  `SUCCESS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_HISTORY`),
  KEY `FK_RELATIONSHIP_9` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 1, 'home', NULL, 1, NULL, 1, NULL),
(2, 1, 'profile', NULL, 2, NULL, 1, NULL),
(8, 1, 'service', NULL, 3, NULL, 1, NULL),
(9, 1, 'project-client', NULL, 4, NULL, 1, NULL),
(10, 1, 'our-team', NULL, 5, NULL, 1, NULL),
(11, 1, 'news', NULL, 6, NULL, 1, NULL),
(12, 1, 'career', NULL, 7, NULL, 1, NULL),
(13, 1, 'contact-us', NULL, 8, NULL, 1, NULL);

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
(1, 'sidebar', 'Halaman Sidebar'),
(2, 'fixed-page', 'Halaman Fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menu_lang`
--

INSERT INTO `menu_lang` (`ID_MENU_LANG`, `ID_LANG`, `ID_MENU`, `TEXT_MENU`) VALUES
(1, 1, 1, 'Beranda'),
(2, 2, 1, 'Home'),
(3, 1, 2, 'Profil'),
(4, 2, 2, 'Profiles'),
(5, 1, 8, 'Servis'),
(6, 2, 8, 'Services'),
(7, 1, 9, 'Proyek dan Klien'),
(8, 2, 9, 'Projects and Clients'),
(9, 1, 10, 'Tim Kita'),
(10, 2, 10, 'Our Team'),
(11, 1, 11, 'Berita'),
(12, 2, 11, 'News'),
(13, 1, 12, 'Karir'),
(14, 2, 12, 'Career'),
(15, 1, 13, 'Kontak Kami'),
(16, 2, 13, 'Contact Us');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `ID_PAGE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_PAGE` varchar(255) DEFAULT NULL,
  `ONLINE_PAGE` int(11) DEFAULT NULL,
  `METADATA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_GROUP`, `JOIN_DATE`, `LAST_VISIT`, `USERNAME`, `PASSWORD`, `EMAIL`, `ACTIVE`) VALUES
(1, 1, NULL, NULL, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin@superadmin', 1),
(2, 3, NULL, NULL, 'editor', '5aee9dbd2a188839105073571bee1b1f', 'editor@editor', 1),
(3, 2, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `ID_GROUP` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(255) DEFAULT NULL,
  `GROUP_NAME` varchar(255) DEFAULT NULL,
  `DESCRIPTION` text,
  PRIMARY KEY (`ID_GROUP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`ID_GROUP`, `LEVEL`, `GROUP_NAME`, `DESCRIPTION`) VALUES
(1, '10000', 'Super Admin', 'bisa akses semua fitur'),
(2, '5000', 'Admin', NULL),
(3, '100', 'Editor', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `backend_access`
--
ALTER TABLE `backend_access`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ID_BACKEND_PAGE`) REFERENCES `backend_page` (`ID_BACKEND_PAGE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_GROUP`) REFERENCES `user_group` (`ID_GROUP`);

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
