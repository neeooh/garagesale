-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 02:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garagesale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `url`, `title`) VALUES
(1, 'products/manage', 'Produkty'),
(2, 'products/add', '+ Nowy produkt'),
(3, 'news/manage', 'Ogłoszenia'),
(4, 'news/add', '+ Nowe ogłoszenie'),
(5, 'headline/edit', 'Nagłówek'),
(6, 'settings/', 'Ustawienia'),
(7, 'tools/', '.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `new` tinyint(1) NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `auction` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` text NOT NULL,
  `path` text NOT NULL,
  `thumb_path` text NOT NULL,
  `main` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `ref`, `path`, `thumb_path`, `main`) VALUES
(1, '590e5968d7127', 'assets/images/590e5968d7127/surface-pro-2.jpg', 'assets/images/590e5968d7127/surface-pro-2_thumb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mod_jumbotron`
--

CREATE TABLE IF NOT EXISTS `mod_jumbotron` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `header` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `content` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_jumbotron`
--

INSERT INTO `mod_jumbotron` (`ID`, `header`, `content`, `enabled`) VALUES
(1, 'Welcome to the Garage Sale!', 'We hope you will find many interesting items in this shop.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `pinned` tinyint(1) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `slug`, `title`, `content`, `hidden`, `pinned`, `datetime`) VALUES
(1, 'psa-title', 'PSA Title', 'This is a Public Service Announcement. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada sodales nulla, sit amet posuere justo dapibus a. Aliquam pharetra, nulla at mollis facilisis, magna massa pellentesque libero, vitae dignissim tortor tortor id magna. Integer nec erat ipsum. Nunc iaculis felis fringilla nulla hendrerit tempus. Suspendisse placerat sed nibh vitae ultricies. Donec efficitur nisi eu fermentum lacinia. Maecenas vitae libero at metus aliquam facilisis. Integer ultricies tortor eget ex bibendum, ut maximus quam commodo. Aliquam mollis tristique velit, sed lobortis eros rutrum in. Nullam ullamcorper congue gravida. Sed sodales dolor dolor, vitae eleifend urna rutrum a. Integer non ex venenatis, maximus lectus quis, molestie dolor. Phasellus nunc ipsum, fringilla id mattis eu, euismod id leo. Vestibulum egestas velit a pellentesque feugiat. Proin sed scelerisque ligula.<br>', 0, 1, '2017-05-11 00:57:54'),
(2, 'this-is-another-news', 'This is another news', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada sodales nulla, sit amet posuere justo dapibus a. Aliquam pharetra, nulla at mollis facilisis, magna massa pellentesque libero, vitae dignissim tortor tortor id magna. Integer nec erat ipsum. Nunc iaculis felis fringilla nulla hendrerit tempus. Suspendisse placerat sed nibh vitae ultricies. Donec efficitur nisi eu fermentum lacinia. Maecenas vitae libero at metus aliquam facilisis. Integer ultricies tortor eget ex bibendum, ut maximus quam commodo. Aliquam mollis tristique velit, sed lobortis eros rutrum in. Nullam ullamcorper congue gravida. Sed sodales dolor dolor, vitae eleifend urna rutrum a. Integer non ex venenatis, maximus lectus quis, molestie dolor. Phasellus nunc ipsum, fringilla id mattis eu, euismod id leo. Vestibulum egestas velit a pellentesque feugiat. Proin sed scelerisque ligula<br>', 0, 0, '2017-05-11 00:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `description` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `price` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `images_ref` text NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `hidden_notes` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `images_ref`, `hidden`, `hidden_notes`) VALUES
(3, 'Surface Pro 2 128GB', 'test product description', '6.69', '590e5968d7127', 0, 'this is a hidden note');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contactPhone` text NOT NULL,
  `contactEmail` text NOT NULL,
  `contactExtraNotes` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `contactPhone`, `contactEmail`, `contactExtraNotes`) VALUES
(1, '0123456789', 'example@email.com', 'This space can be used to display extra information to the visitors of your website.');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_name` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `url`, `title`) VALUES
(1, '/', 'All products');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
