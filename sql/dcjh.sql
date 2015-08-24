-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 年 08 月 04 日 02:23
-- 伺服器版本: 5.5.39
-- PHP 版本： 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `dcjh`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(11) NOT NULL,
  `bookname` text COLLATE utf8_unicode_ci NOT NULL,
  `user` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`id`, `bookname`, `user`) VALUES
(1, 'test', 'admin'),
(2, 'ssss', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `url`
--

CREATE TABLE IF NOT EXISTS `url` (
`id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` text NOT NULL,
  `book` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `url`
--

INSERT INTO `url` (`id`, `name`, `url`, `book`, `user`) VALUES
(1, 'å¤§æ©‹åœ‹ä¸­é¦–é ', 'http://www.dcjh.tn.edu.tw/dcjh', 'test', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `root` int(11) NOT NULL DEFAULT '2',
  `username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `email`, `root`, `username`) VALUES
(1, 'admin', 'admin', 'wyes3584371@gmail.com', 0, 'ç®¡ç†å“¡');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `url`
--
ALTER TABLE `url`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `url`
--
ALTER TABLE `url`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
