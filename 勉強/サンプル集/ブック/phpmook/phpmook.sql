-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014 年 5 朁E08 日 21:52
-- サーバのバージョン： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpmook`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `url` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(25) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `articles`
--

INSERT INTO `articles` (`url`, `title`, `author`, `category`, `summary`, `updated`) VALUES
('http://codezine.jp/article/corner/328', '適材適所で使うPHPライブラリ	', '片渕彼富', 'PHP', '使いでのあるPHPライブラリについて紹介します。', '2009-10-19'),
('http://codezine.jp/article/corner/422', 'Android開発のためのJava SE再入門', '高江賢', 'Android', 'Javaでの開発の基礎となるJava SEを、実際にAndorid上で実行できるソースコードとともに解説します。', '2011-05-30'),
('http://codezine.jp/article/corner/484', '実例で学ぶASP.NET 4.5 Webフォーム', '高野将', 'ASP.NET', 'Webフォームの新機能について、実際の活用例をサンプルとともに紹介します。', '2013-05-27'),
('http://codezine.jp/article/corner/486', 'Web APIで楽々Androidアプリ', '高江賢', 'Android', '多種多様なWeb APIの紹介と、そのAPIを利用したサンプルアプリの制作を通じて、Androidアプリの実践的な開発を解説します。', '2013-06-06'),
('http://codezine.jp/article/corner/490', 'PHPエクステンションの作り方', 'coltware', 'PHP', 'PHPのエクステンションを作成する方法を紹介していきます。', '2013-07-22'),
('http://thinkit.co.jp/book/2012/04/12/3514', 'HTML5とあわせて知りたい周辺技術', '土井毅', 'HTML5', 'CSS3とSVGに注目して、HTML5の周辺技術を紹介します。', '2012-04-12'),
('http://thinkit.co.jp/book/2012/04/17/3517', '今さら聞けないHTML5総おさらい', '飯島聡', 'HTML5', 'HTML5について、従来との機能の違いや、新たに使えるようになった便利な機能などについて、解説していきます。', '2012-04-17'),
('http://thinkit.co.jp/book/2012/05/18/3548', 'HTML5の便利なTips100選', '山田祥寛', 'HTML5', 'HTML5の基本的なテクニックをTIPS形式でまとめた記事です。', '2012-05-18'),
('http://www.atmarkit.co.jp/ait/articles/1303/08/news072.html', 'ASP.NET 4.5新機能概説', '花田善仁', 'ASP.NET', 'ASP.NET 4.5も含めて、新機能や改善された機能を解説します。', '2013-03-08'),
('http://www.atmarkit.co.jp/ait/subtop/features/dotnet/app/jqmobile_index.html', 'jQuery Mobile入門', '山田祥寛', 'JavaScript', 'スマートフォン対応のフレームワーク／ライブラリであるjQuery Mobileの使い方を解説します。', '2012-01-20'),
('http://www.buildinsider.net/web/jquerymobileref', 'jQuery Mobile逆引きリファレンス', '山田祥寛', 'JavaScript', '目的別に引けるjQuery Mobileのリファレンス記事です。', '2014-01-09'),
('http://www.buildinsider.net/web/jqueryuiref', 'jQuery UI逆引きリファレンス', '山田祥寛', 'JavaScript', 'jQuery UIの基本機能を目的別リファレンスの形式でまとめた連載記事です。', '2013-07-11');

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `publish` varchar(15) NOT NULL,
  `published` date NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`isbn`, `title`, `price`, `publish`, `published`) VALUES
('978-4-7741-5878-5', 'AndroidエンジニアのためのモダンJava', 3360, '技術評論社', '2013-08-20'),
('978-4-7741-6127-3', 'iPhone／iPad開発ポケットリファレンス', 2919, '技術評論社', '2013-11-23'),
('978-4-7741-6296-6', 'Windows 8開発ポケットリファレンス', 3024, '技術評論社', '2014-02-19'),
('978-4-7981-3257-0', '独習ASP.NET 第4版', 3990, '翔泳社', '2013-07-22'),
('978-4-7981-3332-4', '10日でおぼえるjQuery入門教室 第2版', 2940, '翔泳社', '2013-10-07'),
('978-4-8222-9621-6', '書き込み式SQLのドリル 改訂新版', 2310, '日経BP社', '2013-04-22');

-- --------------------------------------------------------

--
-- テーブルの構造 `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータのダンプ `info`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `log_id_seq`
--

CREATE TABLE IF NOT EXISTS `log_id_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- テーブルのデータのダンプ `log_id_seq`
--

INSERT INTO `log_id_seq` (`sequence`) VALUES
(5);

-- --------------------------------------------------------

--
-- テーブルの構造 `mail_queue`
--

CREATE TABLE IF NOT EXISTS `mail_queue` (
  `id` bigint(20) NOT NULL,
  `create_time` datetime NOT NULL,
  `time_to_send` datetime NOT NULL,
  `sent_time` datetime NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recipient` text NOT NULL,
  `headers` text NOT NULL,
  `body` longtext NOT NULL,
  `try_sent` tinyint(4) NOT NULL,
  `delete_after_send` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `mail_queue_seq`
--

CREATE TABLE IF NOT EXISTS `mail_queue_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータのダンプ `mail_queue_seq`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータのダンプ `member`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `mail_queue_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータのダンプ `mail_queue_seq`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
