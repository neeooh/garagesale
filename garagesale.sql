-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 06:12 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garagesale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `url`, `title`) VALUES
(1, 'products/manage', 'Produkty'),
(2, 'products/add', '+ Nowy produkt'),
(3, 'page/manage', 'Strony'),
(4, 'page/add', '+ Nowa strona'),
(5, 'headline/edit', 'Edytuj nagłówek'),
(6, 'settings/', 'Ustawienia'),
(7, 'tools/', '.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `product_id` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `auction` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`product_id`, `new`, `sold`, `auction`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0),
(3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ref` text NOT NULL,
  `path` text NOT NULL,
  `thumb_path` text NOT NULL,
  `main` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `ref`, `path`, `thumb_path`, `main`) VALUES
(1, '590e5968d7127', 'assets/images/590e5968d7127/surface-pro-2.jpg', 'assets/images/590e5968d7127/surface-pro-2_thumb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mod_jumbotron`
--

CREATE TABLE `mod_jumbotron` (
  `ID` int(11) NOT NULL,
  `header` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `content` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_jumbotron`
--

INSERT INTO `mod_jumbotron` (`ID`, `header`, `content`, `enabled`) VALUES
(1, 'Welcome to the Garage Sale!', 'We hope you will find many interesting items in this shop.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `hidden` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `slug`, `title`, `content`, `hidden`) VALUES
(8, 'test', 'test', 'page test<br>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `description` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `price` text CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `images_ref` text NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `hidden_notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `images_ref`, `hidden`, `hidden_notes`) VALUES
(1, 'test', 'test product<br>', '6.66', '590e5957545eb', 0, '<br>'),
(2, 'test', 'test product<br>', '6.66', '590e5963c433b', 0, '<br>'),
(3, 'test123', 'test product<br>', '6.669', '590e5968d7127', 0, 'test 333');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `contactPhone` text NOT NULL,
  `contactEmail` text NOT NULL,
  `contactExtraNotes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `contactPhone`, `contactEmail`, `contactExtraNotes`) VALUES
(1, '0123456789', 'abcreative@interia.pl', 'This space can be used to display extra information to the visitors of your website.');

-- --------------------------------------------------------

--
-- Table structure for table `settings-copy`
--

CREATE TABLE `settings-copy` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings-copy`
--

INSERT INTO `settings-copy` (`ID`, `name`, `value`) VALUES
(1, 'productQuestionEmail', 'abcreative@interia.pl');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_name` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_name`, `product_id`) VALUES
('main', 1),
('main', 2),
('main', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `url`, `title`) VALUES
(1, '/', 'All products');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_jumbotron`
--
ALTER TABLE `mod_jumbotron`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings-copy`
--
ALTER TABLE `settings-copy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mod_jumbotron`
--
ALTER TABLE `mod_jumbotron`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings-copy`
--
ALTER TABLE `settings-copy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
