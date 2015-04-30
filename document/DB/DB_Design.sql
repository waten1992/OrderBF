-- 主机: localhost
-- 生成日期: 2015 年 04 月 21 日 12:16
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `orderbf`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` char(11) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `passwd`, `email`,`address`) VALUES
('15975379150', 'waten1992', 'waten1992@gmail.com','广大B15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS `orders_slave` (
  `order_id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(11) NOT NULL DEFAULT '',
  `item_id` varchar(8) NOT NULL DEFAULT '',
  `quantity` int(10) unsigned DEFAULT '1',
  `price` decimal(4,1) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`,`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;


CREATE TABLE IF NOT EXISTS `orders_master` (
  `order_id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` float(5,2) DEFAULT '0.0',
  `pay_pattern` tinyint(1) unsigned DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0',
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `items` (
  `item_id` varchar(8) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` decimal(4,1) NOT NULL,
  `quantity` int(10) unsigned DEFAULT '1',
  `capacity` int(10) unsigned DEFAULT '1',
  `pd_explain` varchar(20) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
