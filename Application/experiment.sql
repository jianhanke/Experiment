-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019-09-29 12:15:22
-- 服务器版本： 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `experiment`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `Aid` int(10) NOT NULL,
  `Apwd` varchar(50) NOT NULL,
  `Aname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`Aid`, `Apwd`, `Aname`) VALUES
(1, '1', 'root');

-- --------------------------------------------------------

--
-- 表的结构 `chapter`
--

CREATE TABLE `chapter` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `to_image` varchar(50) DEFAULT NULL,
  `to_course` int(5) DEFAULT NULL,
  `doc` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `chapter`
--

INSERT INTO `chapter` (`id`, `name`, `to_image`, `to_course`, `doc`, `video`) VALUES
(1, 'MySql第一章节', 'a236a0d909cd', 1, 'MySql/MySql第一章节/1.htm', 'MySql/MySql第一章节/1.mp4'),
(2, 'MySql的第二章节', 'a236a0d909cd', 1, 'MySql/MySql的第二章节/2.htm', 'MySql/MySql的第二章节/2.mp4'),
(3, 'MySql第三个章节', 'a236a0d909cd', 1, NULL, NULL),
(4, 'Oracle第一个章节', '3f4e02e760ff', 2, NULL, NULL),
(5, 'Oracle章节第二个', '3f4e02e760ff', 2, NULL, NULL),
(6, 'Oracle章节第三个', '3f4e02e760ff', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `cid` int(5) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `introduce` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `to_teacher_id` int(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`cid`, `cname`, `introduce`, `status`, `to_teacher_id`, `img`) VALUES
(1, 'MySql', '简单的MySql数据库', 1, 1, '1.jpg'),
(2, 'Oracle', 'Oracle数据库操作', 1, 1, '2.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `docker_container`
--

CREATE TABLE `docker_container` (
  `id` int(5) NOT NULL,
  `Container_id` varchar(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `Image_id` varchar(20) NOT NULL,
  `ip_num` int(5) DEFAULT NULL,
  `to_chapter` varchar(50) DEFAULT NULL,
  `doc` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `docker_container`
--

INSERT INTO `docker_container` (`id`, `Container_id`, `student_id`, `ip`, `Image_id`, `ip_num`, `to_chapter`, `doc`, `video`, `note`) VALUES
(1, '', 100, NULL, '', 1, NULL, NULL, NULL, NULL),
(37, '1296288cd2', 1, '172.19.0.2', '3f4e02e760ff', 2, '4', NULL, NULL, NULL),
(38, 'a2f3bd151a', 1, '172.19.0.3', '3f4e02e760ff', 3, '5', NULL, NULL, NULL),
(39, 'ed0f5527e9', 1, '172.19.0.4', 'cdcc3b59a03d', 4, NULL, NULL, NULL, NULL),
(40, '62525e7fd3', 1, '172.19.0.5', 'a236a0d909cd', 5, '1', NULL, NULL, NULL),
(41, '1557b7a383', 1, '172.19.0.6', 'a236a0d909cd', 6, '2', NULL, NULL, NULL),
(42, '186396f4d5', 1, '172.19.0.7', 'a236a0d909cd', 7, '3', NULL, NULL, NULL),
(43, '2edc65fcbb', 1, '172.19.0.8', 'aa0f8f0efbde', 8, NULL, NULL, NULL, NULL),
(44, 'ef5b960310', 1, '172.19.0.9', '3f4e02e760ff', 9, '6', NULL, NULL, NULL),
(45, 'b7b7d14958', 1, '172.19.0.10', '950cddbcac8d', 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `docker_image`
--

CREATE TABLE `docker_image` (
  `Image_id` varchar(20) NOT NULL,
  `name` longtext,
  `time` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `docker_image`
--

INSERT INTO `docker_image` (`Image_id`, `name`, `time`, `status`) VALUES
('3f4e02e760ff', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_my_oracle', NULL, 1),
('6cc5a06c0f2d', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_desktop_false_hadoop', NULL, 1),
('950cddbcac8d', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_desktop_auto_docker', NULL, 1),
('a236a0d909cd', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_my_mysql', NULL, 1),
('aa0f8f0efbde', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/ssh_base_desktop_auto', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `experiment`
--

CREATE TABLE `experiment` (
  `Eid` int(5) NOT NULL,
  `Ename` varchar(50) NOT NULL,
  `goal` longtext,
  `theory` longtext,
  `environment` longtext,
  `image_id` varchar(20) DEFAULT NULL,
  `outcome_model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `experiment`
--

INSERT INTO `experiment` (`Eid`, `Ename`, `goal`, `theory`, `environment`, `image_id`, `outcome_model`) VALUES
(1, 'Hadoop实验', '学会搭建PHP', '了解web', 'Apache,php,Mysql', 'cdcc3b59a03d', 'my.jpg'),
(2, 'Linux操作', 'PHP连接数据库', '连接Mysql', 'Mysql,PHP', 'aa0f8f0efbde', '2.jpg'),
(3, 'Docker命令行', NULL, NULL, NULL, '950cddbcac8d', '3.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `Sid` int(10) NOT NULL,
  `Sname` varchar(50) DEFAULT NULL,
  `Sage` int(3) DEFAULT NULL,
  `Ssex` varchar(3) DEFAULT NULL,
  `Stele` bigint(11) DEFAULT NULL,
  `Spwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`Sid`, `Sname`, `Sage`, `Ssex`, `Stele`, `Spwd`) VALUES
(1, 'root', 32, '男', 1, '1'),
(2, '测试', 66, '男', 322432432, '2'),
(174804050, '小王', 20, '女', 18337299830, '1'),
(174804055, '张三', 33, '男', 13952468542, '1');

-- --------------------------------------------------------

--
-- 表的结构 `student_chapter`
--

CREATE TABLE `student_chapter` (
  `sid` int(10) DEFAULT NULL,
  `cid` int(5) DEFAULT NULL,
  `upload_file` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `student_experiment`
--

CREATE TABLE `student_experiment` (
  `Sid` int(10) NOT NULL,
  `Eid` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `IS_avtive` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student_experiment`
--

INSERT INTO `student_experiment` (`Sid`, `Eid`, `status`, `IS_avtive`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 1),
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_containerwithstuandexper`
-- (See below for the actual view)
--
CREATE TABLE `view_containerwithstuandexper` (
`id` int(5)
,`Container_id` varchar(100)
,`student_id` int(10)
,`ip` varchar(15)
,`Image_id` varchar(20)
,`ip_num` int(5)
,`Sid` int(10)
,`Sname` varchar(50)
,`name` longtext
,`Eid` int(5)
,`Ename` varchar(50)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_coursetochapter`
-- (See below for the actual view)
--
CREATE TABLE `view_coursetochapter` (
`id` int(5)
,`name` varchar(50)
,`to_image` varchar(50)
,`to_course` int(5)
,`cname` varchar(50)
);

-- --------------------------------------------------------

--
-- 视图结构 `view_containerwithstuandexper`
--
DROP TABLE IF EXISTS `view_containerwithstuandexper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_containerwithstuandexper`  AS  select `t1`.`id` AS `id`,`t1`.`Container_id` AS `Container_id`,`t1`.`student_id` AS `student_id`,`t1`.`ip` AS `ip`,`t1`.`Image_id` AS `Image_id`,`t1`.`ip_num` AS `ip_num`,`t2`.`Sid` AS `Sid`,`t2`.`Sname` AS `Sname`,`t3`.`name` AS `name`,`t4`.`Eid` AS `Eid`,`t4`.`Ename` AS `Ename` from (((`docker_container` `t1` join `student` `t2`) join `docker_image` `t3`) join `experiment` `t4`) where ((`t1`.`student_id` = `t2`.`Sid`) and (`t1`.`Image_id` = `t3`.`Image_id`) and (`t1`.`Image_id` = `t4`.`image_id`)) ;

-- --------------------------------------------------------

--
-- 视图结构 `view_coursetochapter`
--
DROP TABLE IF EXISTS `view_coursetochapter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_coursetochapter`  AS  select `t1`.`id` AS `id`,`t1`.`name` AS `name`,`t1`.`to_image` AS `to_image`,`t1`.`to_course` AS `to_course`,`t2`.`cname` AS `cname` from (`chapter` `t1` join `course` `t2`) where (`t2`.`cid` = `t1`.`to_course`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `docker_container`
--
ALTER TABLE `docker_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docker_image`
--
ALTER TABLE `docker_image`
  ADD PRIMARY KEY (`Image_id`);

--
-- Indexes for table `experiment`
--
ALTER TABLE `experiment`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `student_experiment`
--
ALTER TABLE `student_experiment`
  ADD PRIMARY KEY (`Sid`,`Eid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `docker_container`
--
ALTER TABLE `docker_container`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- 使用表AUTO_INCREMENT `experiment`
--
ALTER TABLE `experiment`
  MODIFY `Eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `Sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174804056;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
