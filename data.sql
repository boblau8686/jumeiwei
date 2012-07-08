-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 07 月 08 日 09:33
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jumeiwei`
--

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `customer_id`, `realname`, `address`, `telephone`, `email`, `create_time`, `is_del`) VALUES
(1, 1, '文刀', '测试地址', '13912345678', 'test@domain.com', '2012-05-08 14:50:10', 0),
(2, 0, '234', '232', '234', '1532', '2012-05-22 15:09:53', 0),
(3, 0, 'waef', 'fwef', 'awef', 'wef', '2012-05-22 15:12:52', 0),
(4, 0, '收货人', '地址', '电话', '邮箱', '2012-05-22 15:15:22', 0),
(5, 1, '收货人', '地址', '电话', '邮箱', '2012-05-22 15:18:31', 0),
(6, 1, 'awgawef', 'faweawe', 'ae23fawe', 'gaewf', '2012-07-01 10:08:14', 1),
(7, 1, 'fwefwef', 'efewef', '1e2e1', '21e21e', '2012-07-01 13:15:06', 0),
(8, 1, '收货人', '中山北路3064弄绿洲广场A座28层', '4008805296', 'service@jiuyou365.com', '2012-07-01 13:37:57', 0);

--
-- 转存表中的数据 `business`
--

INSERT INTO `business` (`id`, `name`, `description`, `address`, `logo`, `status`, `range`, `bottom_price`, `start_time`, `end_time`, `create_time`, `is_del`) VALUES
(1, '湘汁乡味（蒸膳美）', '原蛊蒸饭', '长寿路常德路路口', NULL, 1, '上青佳园', 10, '00:00:00', '00:00:00', '2012-05-08 14:56:18', NULL);

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`id`, `customer_id`, `obj_id`, `obj_type`, `create_time`, `is_del`) VALUES
(1, 1, 1, 1, '2012-05-12 16:53:25', 0),
(2, 1, 1, 2, '2012-05-12 16:53:25', 0);

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `head_pic`, `email`, `nickname`, `mobile`, `score`, `create_time`, `is_del`) VALUES
(1, 'username', 'password', 'head_pic', 'test@domain', '昵称', 'mobile', 1000, '2012-05-07 14:52:26', 0),
(2, 'test', 'test', '', NULL, NULL, NULL, 0, '2012-07-01 13:43:58', 0),
(3, 'test2', 'test2', '', NULL, NULL, NULL, 0, '2012-07-01 13:45:43', 0),
(4, 'test3', 'test3', '', NULL, NULL, NULL, 0, '2012-07-01 14:05:34', 0),
(5, 'test3', 'test3', '', NULL, NULL, NULL, 0, '2012-07-01 14:08:12', 0);

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `picture`, `grade`, `category_id`, `ordered_num`, `collected_num`, `description`, `score`, `create_time`, `is_del`) VALUES
(1, '测试食品', '20.00', NULL, NULL, 1, 100, 200, '这是一个测试食品', 20, '2012-05-08 14:52:43', 0);

--
-- 转存表中的数据 `food_category`
--

INSERT INTO `food_category` (`id`, `business_id`, `name`, `create_time`, `is_del`) VALUES
(1, 1, '测试分类1', '2012-05-08 14:53:38', 0);

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `order_sn`, `customer_id`, `order_status`, `address_id`, `deliver_time`, `remark`, `amount`, `create_time`, `confirm_time`, `shipping_time`, `is_del`) VALUES
(1, '201205081', 1, 0, 1, '23:00', '不要辣', 100, '2012-05-08 14:24:12', NULL, NULL, 0),
(2, '201205201', 1, 1, 1, '23:00', '不要辣', 100, '2012-05-20 14:32:12', NULL, NULL, 0),
(3, '201205202', 1, 2, 1, '23:00', '不要辣', 100, '2012-05-20 14:33:12', NULL, NULL, 0),
(4, '201205203', 1, 4, 1, '23:00', '不要辣', 100, '2012-05-20 14:34:12', NULL, NULL, 0);

--
-- 转存表中的数据 `order_food`
--

INSERT INTO `order_food` (`id`, `order_id`, `food_id`, `num`, `is_del`) VALUES
(1, 1, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
