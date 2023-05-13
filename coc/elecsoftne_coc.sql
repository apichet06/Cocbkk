-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 25 พ.ค. 2020 เมื่อ 11:26 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.12-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elecsoftne_coc`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `card_db`
--

CREATE TABLE `card_db` (
  `No` int(8) NOT NULL,
  `Tag_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Barcode_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QR_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Group_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `card_db`
--

INSERT INTO `card_db` (`No`, `Tag_Name`, `Barcode_ID`, `QR_ID`, `Group_ID`) VALUES
(1, 'M20001', '20001', 'M20001', '1'),
(2, 'M20002', '20002', 'M20002', '1'),
(3, 'M20003', '20003', 'M20003', '1'),
(4, 'M20004', '20004', 'M20004', '1'),
(5, 'M20005', '20005', 'M20005', '1'),
(6, 'M20006', '20006', 'M20006', '1'),
(7, 'M20007', '20007', 'M20007', '1'),
(8, 'M20008', '20008', 'M20008', '1'),
(9, 'M20009', '20009', 'M20009', '1'),
(10, 'M20010', '20010', 'M20010', '1'),
(11, 'M20011', '20011', 'M20011', '1'),
(12, 'M20012', '20012', 'M20012', '1'),
(13, 'M20013', '20013', 'M20013', '1'),
(14, 'M20014', '20014', 'M20014', '1'),
(15, 'M20015', '20015', 'M20015', '1'),
(16, 'M20016', '20016', 'M20016', '1'),
(17, 'M20017', '20017', 'M20017', '1'),
(18, 'M20018', '20018', 'M20018', '1'),
(19, 'M20019', '20019', 'M20019', '1'),
(20, 'M20020', '20020', 'M20020', '1'),
(21, 'M20021', '20021', 'M20021', '1'),
(22, 'M20022', '20022', 'M20022', '1'),
(23, 'M20023', '20023', 'M20023', '1'),
(24, 'M20024', '20024', 'M20024', '1'),
(25, 'M20025', '20025', 'M20025', '1'),
(26, 'M20026', '20026', 'M20026', '1'),
(27, 'M20027', '20027', 'M20027', '1'),
(28, 'M20028', '20028', 'M20028', '1'),
(29, 'M20029', '20029', 'M20029', '1'),
(30, 'M20030', '20030', 'M20030', '1'),
(31, 'M20031', '20031', 'M20031', '1'),
(32, 'M20032', '20032', 'M20032', '1'),
(33, 'M20033', '20033', 'M20033', '1'),
(34, 'M20034', '20034', 'M20034', '1'),
(35, 'M20035', '20035', 'M20035', '1'),
(36, 'M20036', '20036', 'M20036', '1'),
(37, 'M20037', '20037', 'M20037', '1'),
(38, 'M20038', '20038', 'M20038', '1'),
(39, 'M20039', '20039', 'M20039', '1'),
(40, 'M20040', '20040', 'M20040', '1'),
(41, 'M20041', '20041', 'M20041', '1'),
(42, 'M20042', '20042', 'M20042', '1'),
(43, 'M20043', '20043', 'M20043', '1'),
(44, 'M20044', '20044', 'M20044', '1'),
(45, 'M20045', '20045', 'M20045', '1'),
(46, 'M20046', '20046', 'M20046', '1'),
(47, 'M20047', '20047', 'M20047', '1'),
(48, 'M20048', '20048', 'M20048', '1'),
(49, 'M20049', '20049', 'M20049', '1'),
(50, 'M20050', '20050', 'M20050', '1'),
(51, 'M20051', '20051', 'M20051', '1'),
(52, 'M20052', '20052', 'M20052', '1'),
(53, 'M20053', '20053', 'M20053', '1'),
(54, 'M20054', '20054', 'M20054', '1'),
(55, 'M20055', '20055', 'M20055', '1'),
(56, 'M20056', '20056', 'M20056', '1'),
(57, 'M20057', '20057', 'M20057', '1'),
(58, 'M20058', '20058', 'M20058', '1'),
(59, 'M20059', '20059', 'M20059', '1'),
(60, 'M20060', '20060', 'M20060', '1'),
(61, 'M20061', '20061', 'M20061', '1'),
(62, 'M20062', '20062', 'M20062', '1'),
(63, 'M20063', '20063', 'M20063', '1'),
(64, 'M20064', '20064', 'M20064', '1'),
(65, 'M20065', '20065', 'M20065', '1'),
(66, 'M20066', '20066', 'M20066', '1'),
(67, 'M20067', '20067', 'M20067', '1'),
(68, 'M20068', '20068', 'M20068', '1'),
(69, 'M20069', '20069', 'M20069', '1'),
(70, 'M20070', '20070', 'M20070', '1'),
(71, 'M20071', '20071', 'M20071', '1'),
(72, 'M20072', '20072', 'M20072', '1'),
(73, 'M20073', '20073', 'M20073', '1'),
(74, 'M20074', '20074', 'M20074', '1'),
(75, 'M20075', '20075', 'M20075', '1'),
(76, 'M20076', '20076', 'M20076', '1'),
(77, 'M20077', '20077', 'M20077', '1'),
(78, 'M20078', '20078', 'M20078', '1'),
(79, 'M20079', '20079', 'M20079', '1'),
(80, 'M20080', '20080', 'M20080', '1'),
(81, 'M20081', '20081', 'M20081', '1'),
(82, 'M20082', '20082', 'M20082', '1'),
(83, 'M20083', '20083', 'M20083', '1'),
(84, 'M20084', '20084', 'M20084', '1'),
(85, 'M20085', '20085', 'M20085', '1'),
(86, 'M20086', '20086', 'M20086', '1'),
(87, 'M20087', '20087', 'M20087', '1'),
(88, 'M20088', '20088', 'M20088', '1'),
(89, 'M20089', '20089', 'M20089', '1'),
(90, 'M20090', '20090', 'M20090', '1'),
(91, 'M20091', '20091', 'M20091', '1'),
(92, 'M20092', '20092', 'M20092', '1'),
(93, 'M20093', '20093', 'M20093', '1'),
(94, 'M20094', '20094', 'M20094', '1'),
(95, 'M20095', '20095', 'M20095', '1'),
(96, 'M20096', '20096', 'M20096', '1'),
(97, 'M20097', '20097', 'M20097', '1'),
(98, 'M20098', '20098', 'M20098', '1'),
(99, 'M20099', '20099', 'M20099', '1'),
(100, 'M20100', '20100', 'M20100', '1'),
(101, 'M20101', '20101', 'M20101', '1'),
(102, 'M20102', '20102', 'M20102', '1'),
(103, 'M20103', '20103', 'M20103', '1'),
(104, 'M20104', '20104', 'M20104', '1'),
(105, 'M20105', '20105', 'M20105', '1'),
(106, 'M20106', '20106', 'M20106', '1'),
(107, 'M20107', '20107', 'M20107', '1'),
(108, 'M20108', '20108', 'M20108', '1'),
(109, 'M20109', '20109', 'M20109', '1'),
(110, 'M20110', '20110', 'M20110', '1'),
(111, 'M20111', '20111', 'M20111', '1'),
(112, 'M20112', '20112', 'M20112', '1'),
(113, 'M20113', '20113', 'M20113', '1'),
(114, 'M20114', '20114', 'M20114', '1'),
(115, 'M20115', '20115', 'M20115', '1'),
(116, 'M20116', '20116', 'M20116', '1'),
(117, 'M20117', '20117', 'M20117', '1'),
(118, 'M20118', '20118', 'M20118', '1'),
(119, 'M20119', '20119', 'M20119', '1'),
(120, 'M20120', '20120', 'M20120', '1'),
(121, 'M20121', '20121', 'M20121', '1'),
(122, 'M20122', '20122', 'M20122', '1'),
(123, 'M20123', '20123', 'M20123', '1'),
(124, 'M20124', '20124', 'M20124', '1'),
(125, 'M20125', '20125', 'M20125', '1'),
(126, 'M20126', '20126', 'M20126', '1'),
(127, 'M20127', '20127', 'M20127', '1'),
(128, 'M20128', '20128', 'M20128', '1'),
(129, 'M20129', '20129', 'M20129', '1'),
(130, 'M20130', '20130', 'M20130', '1'),
(131, 'M20131', '20131', 'M20131', '1'),
(132, 'M20132', '20132', 'M20132', '1'),
(133, 'M20133', '20133', 'M20133', '1'),
(134, 'M20134', '20134', 'M20134', '1'),
(135, 'M20135', '20135', 'M20135', '1'),
(136, 'M20136', '20136', 'M20136', '1'),
(137, 'M20137', '20137', 'M20137', '1'),
(138, 'M20138', '20138', 'M20138', '1'),
(139, 'M20139', '20139', 'M20139', '1'),
(140, 'M20140', '20140', 'M20140', '1'),
(141, 'M20141', '20141', 'M20141', '1'),
(142, 'M20142', '20142', 'M20142', '1'),
(143, 'M20143', '20143', 'M20143', '1'),
(144, 'M20144', '20144', 'M20144', '1'),
(145, 'M20145', '20145', 'M20145', '1'),
(146, 'M20146', '20146', 'M20146', '1'),
(147, 'M20147', '20147', 'M20147', '1'),
(148, 'M20148', '20148', 'M20148', '1'),
(149, 'M20149', '20149', 'M20149', '1'),
(150, 'M20150', '20150', 'M20150', '1'),
(151, 'M20151', '20151', 'M20151', '1'),
(152, 'M20152', '20152', 'M20152', '1'),
(153, 'M20153', '20153', 'M20153', '1'),
(154, 'M20154', '20154', 'M20154', '1'),
(155, 'M20155', '20155', 'M20155', '1'),
(156, 'M20156', '20156', 'M20156', '1'),
(157, 'M20157', '20157', 'M20157', '1'),
(158, 'M20158', '20158', 'M20158', '1'),
(159, 'M20159', '20159', 'M20159', '1'),
(160, 'M20160', '20160', 'M20160', '1'),
(161, 'M20161', '20161', 'M20161', '1'),
(162, 'M20162', '20162', 'M20162', '1'),
(163, 'M20163', '20163', 'M20163', '1'),
(164, 'M20164', '20164', 'M20164', '1'),
(165, 'M20165', '20165', 'M20165', '1'),
(166, 'M20166', '20166', 'M20166', '1'),
(167, 'M20167', '20167', 'M20167', '1'),
(168, 'M20168', '20168', 'M20168', '1'),
(169, 'M20169', '20169', 'M20169', '1'),
(170, 'M20170', '20170', 'M20170', '1'),
(171, 'M20171', '20171', 'M20171', '1'),
(172, 'M20172', '20172', 'M20172', '1'),
(173, 'M20173', '20173', 'M20173', '1'),
(174, 'M20174', '20174', 'M20174', '1'),
(175, 'M20175', '20175', 'M20175', '1'),
(176, 'M20176', '20176', 'M20176', '1'),
(177, 'M20177', '20177', 'M20177', '1'),
(178, 'M20178', '20178', 'M20178', '1'),
(179, 'M20179', '20179', 'M20179', '1'),
(180, 'M20180', '20180', 'M20180', '1'),
(181, 'M20181', '20181', 'M20181', '1'),
(182, 'M20182', '20182', 'M20182', '1'),
(183, 'M20183', '20183', 'M20183', '1'),
(184, 'M20184', '20184', 'M20184', '1'),
(185, 'M20185', '20185', 'M20185', '1'),
(186, 'M20186', '20186', 'M20186', '1'),
(187, 'M20187', '20187', 'M20187', '1'),
(188, 'M20188', '20188', 'M20188', '1'),
(189, 'M20189', '20189', 'M20189', '1'),
(190, 'M20190', '20190', 'M20190', '1'),
(191, 'M20191', '20191', 'M20191', '1'),
(192, 'M20192', '20192', 'M20192', '1'),
(193, 'M20193', '20193', 'M20193', '1'),
(194, 'M20194', '20194', 'M20194', '1'),
(195, 'M20195', '20195', 'M20195', '1'),
(196, 'M20196', '20196', 'M20196', '1'),
(197, 'M20197', '20197', 'M20197', '1'),
(198, 'M20198', '20198', 'M20198', '1'),
(199, 'M20199', '20199', 'M20199', '1'),
(200, 'M20200', '20200', 'M20200', '1'),
(201, 'M20201', '20201', 'M20201', '1'),
(202, 'M20202', '20202', 'M20202', '1'),
(203, 'M20203', '20203', 'M20203', '1'),
(204, 'M20204', '20204', 'M20204', '1'),
(205, 'M20205', '20205', 'M20205', '1'),
(206, 'M20206', '20206', 'M20206', '1'),
(207, 'M20207', '20207', 'M20207', '1'),
(208, 'M20208', '20208', 'M20208', '1'),
(209, 'M20209', '20209', 'M20209', '1'),
(210, 'M20210', '20210', 'M20210', '1'),
(211, 'M20211', '20211', 'M20211', '1'),
(212, 'M20212', '20212', 'M20212', '1'),
(213, 'M20213', '20213', 'M20213', '1'),
(214, 'M20214', '20214', 'M20214', '1'),
(215, 'M20215', '20215', 'M20215', '1'),
(216, 'M20216', '20216', 'M20216', '1'),
(217, 'M20217', '20217', 'M20217', '1'),
(218, 'M20218', '20218', 'M20218', '1'),
(219, 'M20219', '20219', 'M20219', '1'),
(220, 'M20220', '20220', 'M20220', '1'),
(221, 'M20221', '20221', 'M20221', '1'),
(222, 'M20222', '20222', 'M20222', '1'),
(223, 'M20223', '20223', 'M20223', '1'),
(224, 'M20224', '20224', 'M20224', '1'),
(225, 'M20225', '20225', 'M20225', '1'),
(226, 'M20226', '20226', 'M20226', '1'),
(227, 'M20227', '20227', 'M20227', '1'),
(228, 'M20228', '20228', 'M20228', '1'),
(229, 'M20229', '20229', 'M20229', '1'),
(230, 'M20230', '20230', 'M20230', '1'),
(231, 'M20231', '20231', 'M20231', '1'),
(232, 'M20232', '20232', 'M20232', '1'),
(233, 'M20233', '20233', 'M20233', '1'),
(234, 'M20234', '20234', 'M20234', '1'),
(235, 'M20235', '20235', 'M20235', '1'),
(236, 'M20236', '20236', 'M20236', '1'),
(237, 'M20237', '20237', 'M20237', '1'),
(238, 'M20238', '20238', 'M20238', '1'),
(239, 'M20239', '20239', 'M20239', '1'),
(240, 'M20240', '20240', 'M20240', '1'),
(241, 'M20241', '20241', 'M20241', '1'),
(242, 'M20242', '20242', 'M20242', '1'),
(243, 'M20243', '20243', 'M20243', '1'),
(244, 'M20244', '20244', 'M20244', '1'),
(245, 'M20245', '20245', 'M20245', '1'),
(246, 'M20246', '20246', 'M20246', '1'),
(247, 'M20247', '20247', 'M20247', '1'),
(248, 'M20248', '20248', 'M20248', '1'),
(249, 'M20249', '20249', 'M20249', '1'),
(250, 'M20250', '20250', 'M20250', '1'),
(251, 'M20251', '20251', 'M20251', '1'),
(252, 'M20252', '20252', 'M20252', '1'),
(253, 'M20253', '20253', 'M20253', '1'),
(254, 'M20254', '20254', 'M20254', '1'),
(255, 'M20255', '20255', 'M20255', '1'),
(256, 'M20256', '20256', 'M20256', '1'),
(257, 'M20257', '20257', 'M20257', '1'),
(258, 'M20258', '20258', 'M20258', '1'),
(259, 'M20259', '20259', 'M20259', '1'),
(260, 'M20260', '20260', 'M20260', '1'),
(261, 'M20261', '20261', 'M20261', '1'),
(262, 'M20262', '20262', 'M20262', '1'),
(263, 'M20263', '20263', 'M20263', '1'),
(264, 'M20264', '20264', 'M20264', '1'),
(265, 'M20265', '20265', 'M20265', '1'),
(266, 'M20266', '20266', 'M20266', '1'),
(267, 'M20267', '20267', 'M20267', '1'),
(268, 'M20268', '20268', 'M20268', '1'),
(269, 'M20269', '20269', 'M20269', '1'),
(270, 'M20270', '20270', 'M20270', '1'),
(271, 'M20271', '20271', 'M20271', '1'),
(272, 'M20272', '20272', 'M20272', '1'),
(273, 'M20273', '20273', 'M20273', '1'),
(274, 'M20274', '20274', 'M20274', '1'),
(275, 'M20275', '20275', 'M20275', '1'),
(276, 'M20276', '20276', 'M20276', '1'),
(277, 'M20277', '20277', 'M20277', '1'),
(278, 'M20278', '20278', 'M20278', '1'),
(279, 'M20279', '20279', 'M20279', '1'),
(280, 'M20280', '20280', 'M20280', '1'),
(281, 'M20281', '20281', 'M20281', '1'),
(282, 'M20282', '20282', 'M20282', '1'),
(283, 'M20283', '20283', 'M20283', '1'),
(284, 'M20284', '20284', 'M20284', '1'),
(285, 'M20285', '20285', 'M20285', '1'),
(286, 'M20286', '20286', 'M20286', '1'),
(287, 'M20287', '20287', 'M20287', '1'),
(288, 'M20288', '20288', 'M20288', '1'),
(289, 'M20289', '20289', 'M20289', '1'),
(290, 'M20290', '20290', 'M20290', '1'),
(291, 'M20291', '20291', 'M20291', '1'),
(292, 'M20292', '20292', 'M20292', '1'),
(293, 'M20293', '20293', 'M20293', '1'),
(294, 'M20294', '20294', 'M20294', '1'),
(295, 'M20295', '20295', 'M20295', '1'),
(296, 'M20296', '20296', 'M20296', '1'),
(297, 'M20297', '20297', 'M20297', '1'),
(298, 'M20298', '20298', 'M20298', '1'),
(299, 'M20299', '20299', 'M20299', '1'),
(300, 'M20300', '20300', 'M20300', '1'),
(301, 'M20301', '20301', 'M20301', '1'),
(302, 'M20302', '20302', 'M20302', '1'),
(303, 'M20303', '20303', 'M20303', '1'),
(304, 'M20304', '20304', 'M20304', '1'),
(305, 'M20305', '20305', 'M20305', '1'),
(306, 'M20306', '20306', 'M20306', '1'),
(307, 'M20307', '20307', 'M20307', '1'),
(308, 'M20308', '20308', 'M20308', '1'),
(309, 'M20309', '20309', 'M20309', '1'),
(310, 'M20310', '20310', 'M20310', '1'),
(311, 'M20311', '20311', 'M20311', '1'),
(312, 'M20312', '20312', 'M20312', '1'),
(313, 'M20313', '20313', 'M20313', '1'),
(314, 'M20314', '20314', 'M20314', '1'),
(315, 'M20315', '20315', 'M20315', '1'),
(316, 'M20316', '20316', 'M20316', '1'),
(317, 'M20317', '20317', 'M20317', '1'),
(318, 'M20318', '20318', 'M20318', '1'),
(319, 'M20319', '20319', 'M20319', '1'),
(320, 'M20320', '20320', 'M20320', '1'),
(321, 'M20321', '20321', 'M20321', '1'),
(322, 'M20322', '20322', 'M20322', '1'),
(323, 'M20323', '20323', 'M20323', '1'),
(324, 'M20324', '20324', 'M20324', '1'),
(325, 'M20325', '20325', 'M20325', '1'),
(326, 'M20326', '20326', 'M20326', '1'),
(327, 'M20327', '20327', 'M20327', '1'),
(328, 'M20328', '20328', 'M20328', '1'),
(329, 'M20329', '20329', 'M20329', '1'),
(330, 'M20330', '20330', 'M20330', '1'),
(331, 'M20331', '20331', 'M20331', '1'),
(332, 'M20332', '20332', 'M20332', '1'),
(333, 'M20333', '20333', 'M20333', '1'),
(334, 'M20334', '20334', 'M20334', '1'),
(335, 'M20335', '20335', 'M20335', '1'),
(336, 'M20336', '20336', 'M20336', '1'),
(337, 'M20337', '20337', 'M20337', '1'),
(338, 'M20338', '20338', 'M20338', '1'),
(339, 'M20339', '20339', 'M20339', '1'),
(340, 'M20340', '20340', 'M20340', '1'),
(341, 'M20341', '20341', 'M20341', '1'),
(342, 'M20342', '20342', 'M20342', '1'),
(343, 'M20343', '20343', 'M20343', '1'),
(344, 'M20344', '20344', 'M20344', '1'),
(345, 'M20345', '20345', 'M20345', '1'),
(346, 'M20346', '20346', 'M20346', '1'),
(347, 'M20347', '20347', 'M20347', '1'),
(348, 'M20348', '20348', 'M20348', '1'),
(349, 'M20349', '20349', 'M20349', '1'),
(350, 'M20350', '20350', 'M20350', '1'),
(351, 'M20351', '20351', 'M20351', '1'),
(352, 'M20352', '20352', 'M20352', '1'),
(353, 'M20353', '20353', 'M20353', '1'),
(354, 'M20354', '20354', 'M20354', '1'),
(355, 'M20355', '20355', 'M20355', '1'),
(356, 'M20356', '20356', 'M20356', '1'),
(357, 'M20357', '20357', 'M20357', '1'),
(358, 'M20358', '20358', 'M20358', '1'),
(359, 'M20359', '20359', 'M20359', '1'),
(360, 'M20360', '20360', 'M20360', '1'),
(361, 'M20361', '20361', 'M20361', '1'),
(362, 'M20362', '20362', 'M20362', '1'),
(363, 'M20363', '20363', 'M20363', '1'),
(364, 'M20364', '20364', 'M20364', '1'),
(365, 'M20365', '20365', 'M20365', '1'),
(366, 'M20366', '20366', 'M20366', '1'),
(367, 'M20367', '20367', 'M20367', '1'),
(368, 'M20368', '20368', 'M20368', '1'),
(369, 'M20369', '20369', 'M20369', '1'),
(370, 'M20370', '20370', 'M20370', '1'),
(371, 'M20371', '20371', 'M20371', '1'),
(372, 'M20372', '20372', 'M20372', '1'),
(373, 'M20373', '20373', 'M20373', '1'),
(374, 'V20001', '', 'V20001', '1'),
(375, 'V20002', '', 'V20002', '1'),
(376, 'V20003', '', 'V20003', '1'),
(377, 'V20004', '', 'V20004', '1'),
(378, 'V20005', '', 'V20005', '1'),
(379, 'V20006', '', 'V20006', '1'),
(380, 'V20007', '', 'V20007', '1'),
(381, 'V20008', '', 'V20008', '1'),
(382, 'V20009', '', 'V20009', '1'),
(383, 'V20010', '', 'V20010', '1'),
(384, 'V20011', '', 'V20011', '1'),
(385, 'V20012', '', 'V20012', '1'),
(386, 'V20013', '', 'V20013', '1'),
(387, 'V20014', '', 'V20014', '1'),
(388, 'V20015', '', 'V20015', '1'),
(389, 'V20016', '', 'V20016', '1'),
(390, 'V20017', '', 'V20017', '1'),
(391, 'V20018', '', 'V20018', '1'),
(392, 'V20019', '', 'V20019', '1'),
(393, 'V20020', '', 'V20020', '1'),
(394, 'V20021', '', 'V20021', '1'),
(395, 'V20022', '', 'V20022', '1'),
(396, 'V20023', '', 'V20023', '1'),
(397, 'V20024', '', 'V20024', '1'),
(398, 'V20025', '', 'V20025', '1'),
(399, 'V20026', '', 'V20026', '1'),
(400, 'V20027', '', 'V20027', '1'),
(401, 'V20028', '', 'V20028', '1'),
(402, 'V20029', '', 'V20029', '1'),
(403, 'V20030', '', 'V20030', '1'),
(404, 'V20031', '', 'V20031', '1'),
(405, 'V20032', '', 'V20032', '1'),
(406, 'V20033', '', 'V20033', '1'),
(407, 'V20034', '', 'V20034', '1'),
(408, 'V20035', '', 'V20035', '1'),
(409, 'V20036', '', 'V20036', '1'),
(410, 'V20037', '', 'V20037', '1'),
(411, 'V20038', '', 'V20038', '1'),
(412, 'V20039', '', 'V20039', '1'),
(413, 'V20040', '', 'V20040', '1'),
(414, 'V20041', '', 'V20041', '1'),
(415, 'V20042', '', 'V20042', '1'),
(416, 'V20043', '', 'V20043', '1'),
(417, 'V20044', '', 'V20044', '1'),
(418, 'V20045', '', 'V20045', '1'),
(419, 'V20046', '', 'V20046', '1'),
(420, 'V20047', '', 'V20047', '1'),
(421, 'V20048', '', 'V20048', '1'),
(422, 'V20049', '', 'V20049', '1'),
(423, 'V20050', '', 'V20050', '1'),
(424, 'V20051', '', 'V20051', '1'),
(425, 'V20052', '', 'V20052', '1'),
(426, 'V20053', '', 'V20053', '1'),
(427, 'V20054', '', 'V20054', '1'),
(428, 'V20055', '', 'V20055', '1'),
(429, 'V20056', '', 'V20056', '1'),
(430, 'V20057', '', 'V20057', '1'),
(431, 'V20058', '', 'V20058', '1'),
(432, 'V20059', '', 'V20059', '1'),
(433, 'V20060', '', 'V20060', '1'),
(434, 'V20061', '', 'V20061', '1'),
(435, 'V20062', '', 'V20062', '1'),
(436, 'V20063', '', 'V20063', '1'),
(437, 'V20064', '', 'V20064', '1'),
(438, 'V20065', '', 'V20065', '1'),
(439, 'V20066', '', 'V20066', '1'),
(440, 'V20067', '', 'V20067', '1'),
(441, 'V20068', '', 'V20068', '1'),
(442, 'V20069', '', 'V20069', '1'),
(443, 'V20070', '', 'V20070', '1'),
(444, 'V20071', '', 'V20071', '1'),
(445, 'V20072', '', 'V20072', '1'),
(446, 'V20073', '', 'V20073', '1'),
(447, 'V20074', '', 'V20074', '1'),
(448, 'V20075', '', 'V20075', '1'),
(449, 'V20076', '', 'V20076', '1'),
(450, 'V20077', '', 'V20077', '1'),
(451, 'V20078', '', 'V20078', '1'),
(452, 'V20079', '', 'V20079', '1'),
(453, 'V20080', '', 'V20080', '1'),
(454, 'V20081', '', 'V20081', '1'),
(455, 'V20082', '', 'V20082', '1'),
(456, 'V20083', '', 'V20083', '1'),
(457, 'V20084', '', 'V20084', '1'),
(458, 'V20085', '', 'V20085', '1'),
(459, 'V20086', '', 'V20086', '1'),
(460, 'V20087', '', 'V20087', '1'),
(461, 'V20088', '', 'V20088', '1'),
(462, 'V20089', '', 'V20089', '1'),
(463, 'V20090', '', 'V20090', '1'),
(464, 'V20091', '', 'V20091', '1'),
(465, 'V20092', '', 'V20092', '1'),
(466, 'V20093', '', 'V20093', '1'),
(467, 'V20094', '', 'V20094', '1'),
(468, 'V20095', '', 'V20095', '1'),
(469, 'V20096', '', 'V20096', '1'),
(470, 'V20097', '', 'V20097', '1'),
(471, 'V20098', '', 'V20098', '1'),
(472, 'V20099', '', 'V20099', '1'),
(473, 'V20100', '', 'V20100', '1'),
(474, 'V20101', '', 'V20101', '1'),
(475, 'V20102', '', 'V20102', '1'),
(476, 'V20103', '', 'V20103', '1'),
(477, 'V20104', '', 'V20104', '1'),
(478, 'V20105', '', 'V20105', '1'),
(479, 'V20106', '', 'V20106', '1'),
(480, 'V20107', '', 'V20107', '1'),
(481, 'V20108', '', 'V20108', '1'),
(482, 'V20109', '', 'V20109', '1'),
(483, 'V20110', '', 'V20110', '1'),
(484, 'V20111', '', 'V20111', '1'),
(485, 'V20112', '', 'V20112', '1'),
(486, 'V20113', '', 'V20113', '1'),
(487, 'V20114', '', 'V20114', '1'),
(488, 'V20115', '', 'V20115', '1'),
(489, 'V20116', '', 'V20116', '1'),
(490, 'V20117', '', 'V20117', '1'),
(491, 'V20118', '', 'V20118', '1'),
(492, 'V20119', '', 'V20119', '1'),
(493, 'V20120', '', 'V20120', '1'),
(494, 'V20121', '', 'V20121', '1'),
(495, 'V20122', '', 'V20122', '1'),
(496, 'V20123', '', 'V20123', '1'),
(497, 'V20124', '', 'V20124', '1'),
(498, 'V20125', '', 'V20125', '1'),
(499, 'V20126', '', 'V20126', '1'),
(500, 'V20127', '', 'V20127', '1'),
(501, 'V20128', '', 'V20128', '1'),
(502, 'V20129', '', 'V20129', '1'),
(503, 'V20130', '', 'V20130', '1'),
(504, 'V20131', '', 'V20131', '1'),
(505, 'V20132', '', 'V20132', '1'),
(506, 'V20133', '', 'V20133', '1'),
(507, 'V20134', '', 'V20134', '1'),
(508, 'V20135', '', 'V20135', '1'),
(509, 'V20136', '', 'V20136', '1'),
(510, 'V20137', '', 'V20137', '1'),
(511, 'V20138', '', 'V20138', '1'),
(512, 'V20139', '', 'V20139', '1'),
(513, 'V20140', '', 'V20140', '1'),
(514, 'V20141', '', 'V20141', '1'),
(515, 'V20142', '', 'V20142', '1'),
(516, 'V20143', '', 'V20143', '1'),
(517, 'V20144', '', 'V20144', '1'),
(518, 'V20145', '', 'V20145', '1'),
(519, 'V20146', '', 'V20146', '1'),
(520, 'V20147', '', 'V20147', '1'),
(521, 'V20148', '', 'V20148', '1'),
(522, 'V20149', '', 'V20149', '1'),
(523, 'V20150', '', 'V20150', '1'),
(524, 'V20151', '', 'V20151', '1'),
(525, 'V20152', '', 'V20152', '1'),
(526, 'V20153', '', 'V20153', '1'),
(527, 'V20154', '', 'V20154', '1'),
(528, 'V20155', '', 'V20155', '1'),
(529, 'V20156', '', 'V20156', '1'),
(530, 'V20157', '', 'V20157', '1'),
(531, 'V20158', '', 'V20158', '1'),
(532, 'V20159', '', 'V20159', '1'),
(533, 'V20160', '', 'V20160', '1'),
(534, 'V20161', '', 'V20161', '1'),
(535, 'V20162', '', 'V20162', '1'),
(536, 'V20163', '', 'V20163', '1'),
(537, 'V20164', '', 'V20164', '1'),
(538, 'V20165', '', 'V20165', '1'),
(539, 'V20166', '', 'V20166', '1'),
(540, 'V20167', '', 'V20167', '1'),
(541, 'V20168', '', 'V20168', '1'),
(542, 'V20169', '', 'V20169', '1'),
(543, 'V20170', '', 'V20170', '1'),
(544, 'V20171', '', 'V20171', '1'),
(545, 'V20172', '', 'V20172', '1'),
(546, 'V20173', '', 'V20173', '1'),
(547, 'V20174', '', 'V20174', '1'),
(548, 'V20175', '', 'V20175', '1'),
(549, 'V20176', '', 'V20176', '1'),
(550, 'Visitor1', '21001', '21001', '2'),
(551, 'Visitor2', '21002', '21002', '2'),
(552, 'Visitor3', '21003', '21003', '2'),
(553, 'Visitor4', '21004', '21004', '2'),
(554, 'Visitor5', '21005', '21005', '2'),
(555, 'Visitor6', '21006', '21006', '2'),
(556, 'Visitor7', '21007', '21007', '2'),
(557, 'Visitor8', '21008', '21008', '2'),
(558, 'Visitor9', '21009', '21009', '2'),
(559, 'Visitor10', '21010', '21010', '2'),
(560, 'Visitor11', '21011', '21011', '2'),
(561, 'Visitor12', '21012', '21012', '2'),
(562, 'Visitor13', '21013', '21013', '2'),
(563, 'Visitor14', '21014', '21014', '2'),
(564, 'Visitor15', '21015', '21015', '2'),
(565, 'Visitor16', '21016', '21016', '2'),
(566, 'Visitor17', '21017', '21017', '2'),
(567, 'Visitor18', '21018', '21018', '2'),
(568, 'Visitor19', '21019', '21019', '2'),
(569, 'Visitor20', '21020', '21020', '2'),
(570, 'Visitor21', '21021', '21021', '2'),
(571, 'Visitor22', '21022', '21022', '2'),
(572, 'Visitor23', '21023', '21023', '2'),
(573, 'Visitor24', '21024', '21024', '2'),
(574, 'Visitor25', '21025', '21025', '2'),
(575, 'Visitor26', '21026', '21026', '2'),
(576, 'Visitor27', '21027', '21027', '2'),
(577, 'Visitor28', '21028', '21028', '2'),
(578, 'Visitor29', '21029', '21029', '2'),
(579, 'Visitor30', '21030', '21030', '2');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `group_db`
--

CREATE TABLE `group_db` (
  `Group_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Group_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `group_db`
--

INSERT INTO `group_db` (`Group_ID`, `Group_Name`) VALUES
('1', 'Member'),
('2', 'Visitor');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `trans_db`
--

CREATE TABLE `trans_db` (
  `No` int(10) NOT NULL,
  `Tag_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Barcode_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QR_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Group_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Track_In` datetime NOT NULL,
  `Track_Out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `trans_db`
--

INSERT INTO `trans_db` (`No`, `Tag_Name`, `Barcode_ID`, `QR_ID`, `Group_ID`, `Track_In`, `Track_Out`) VALUES
(1, 'M20003', '20003', 'M20003', '1', '2020-05-24 08:47:21', '2020-05-24 08:58:17'),
(2, 'M20232', '20232', 'M20232', '1', '2020-05-24 08:49:52', '2020-05-24 09:51:36'),
(3, 'M20157', '20157', 'M20157', '1', '2020-05-24 08:50:18', '2020-05-24 11:10:57'),
(4, 'M20138', '20138', 'M20138', '1', '2020-05-24 08:50:50', '2020-05-24 11:11:15'),
(5, 'M20137', '20137', 'M20137', '1', '2020-05-24 08:51:06', '2020-05-24 09:36:39'),
(6, 'M20335', '20335', 'M20335', '1', '2020-05-24 08:53:16', '2020-05-24 11:13:37'),
(7, 'M20333', '20333', 'M20333', '1', '2020-05-24 08:54:53', '0000-00-00 00:00:00'),
(8, 'M20010', '20010', 'M20010', '1', '2020-05-24 08:55:06', '0000-00-00 00:00:00'),
(9, 'M20208', '20208', 'M20208', '1', '2020-05-24 08:55:19', '0000-00-00 00:00:00'),
(10, 'M20028', '20028', 'M20028', '1', '2020-05-24 08:55:30', '0000-00-00 00:00:00'),
(11, 'M20063', '20063', 'M20063', '1', '2020-05-24 08:55:33', '0000-00-00 00:00:00'),
(12, 'M20052', '20052', 'M20052', '1', '2020-05-24 08:55:57', '0000-00-00 00:00:00'),
(13, 'M20051', '20051', 'M20051', '1', '2020-05-24 08:56:05', '0000-00-00 00:00:00'),
(14, 'M20042', '20042', 'M20042', '1', '2020-05-24 08:56:11', '0000-00-00 00:00:00'),
(15, 'M20231', '20231', 'M20231', '1', '2020-05-24 08:56:17', '0000-00-00 00:00:00'),
(16, 'M20101', '20101', 'M20101', '1', '2020-05-24 08:56:53', '0000-00-00 00:00:00'),
(17, 'Visitor1', '21001', '21001', '2', '2020-05-24 08:57:26', '0000-00-00 00:00:00'),
(18, 'Visitor2', '21002', '21002', '2', '2020-05-24 08:57:32', '0000-00-00 00:00:00'),
(19, 'M20159', '20159', 'M20159', '1', '2020-05-24 08:57:56', '0000-00-00 00:00:00'),
(20, 'M20039', '20039', 'M20039', '1', '2020-05-24 08:58:44', '2020-05-24 09:03:12'),
(21, 'M20011', '20011', 'M20011', '1', '2020-05-24 08:59:00', '0000-00-00 00:00:00'),
(22, 'M20027', '20027', 'M20027', '1', '2020-05-24 08:59:08', '0000-00-00 00:00:00'),
(23, 'M20017', '20017', 'M20017', '1', '2020-05-24 08:59:25', '2020-05-24 09:04:28'),
(24, 'M20357', '20357', 'M20357', '1', '2020-05-24 08:59:36', '0000-00-00 00:00:00'),
(25, 'M20021', '20021', 'M20021', '1', '2020-05-24 08:59:52', '0000-00-00 00:00:00'),
(26, 'M20013', '20013', 'M20013', '1', '2020-05-24 08:59:59', '0000-00-00 00:00:00'),
(27, 'M20115', '20115', 'M20115', '1', '2020-05-24 09:00:07', '0000-00-00 00:00:00'),
(28, 'M20149', '20149', 'M20149', '1', '2020-05-24 09:00:24', '0000-00-00 00:00:00'),
(29, 'M20160', '20160', 'M20160', '1', '2020-05-24 09:00:30', '0000-00-00 00:00:00'),
(30, 'M20166', '20166', 'M20166', '1', '2020-05-24 09:00:36', '2020-05-24 10:15:50'),
(31, 'M20320', '20320', 'M20320', '1', '2020-05-24 09:00:53', '0000-00-00 00:00:00'),
(32, 'M20323', '20323', 'M20323', '1', '2020-05-24 09:01:02', '0000-00-00 00:00:00'),
(33, 'M20336', '20336', 'M20336', '1', '2020-05-24 09:01:13', '0000-00-00 00:00:00'),
(34, 'M20301', '20301', 'M20301', '1', '2020-05-24 09:01:20', '0000-00-00 00:00:00'),
(35, 'M20300', '20300', 'M20300', '1', '2020-05-24 09:01:28', '0000-00-00 00:00:00'),
(36, 'M20009', '20009', 'M20009', '1', '2020-05-24 09:01:34', '0000-00-00 00:00:00'),
(37, 'M20148', '20148', 'M20148', '1', '2020-05-24 09:01:41', '0000-00-00 00:00:00'),
(38, 'M20108', '20108', 'M20108', '1', '2020-05-24 09:01:55', '0000-00-00 00:00:00'),
(39, 'M20030', '20030', 'M20030', '1', '2020-05-24 09:02:07', '2020-05-24 09:26:46'),
(40, 'M20031', '20031', 'M20031', '1', '2020-05-24 09:02:20', '0000-00-00 00:00:00'),
(41, 'M20142', '20142', 'M20142', '1', '2020-05-24 09:02:29', '0000-00-00 00:00:00'),
(42, 'M20230', '20230', 'M20230', '1', '2020-05-24 09:02:46', '0000-00-00 00:00:00'),
(43, 'M20034', '20034', 'M20034', '1', '2020-05-24 09:03:02', '0000-00-00 00:00:00'),
(44, 'M20016', '20016', 'M20016', '1', '2020-05-24 09:03:41', '0000-00-00 00:00:00'),
(45, 'M20207', '20207', 'M20207', '1', '2020-05-24 09:03:53', '0000-00-00 00:00:00'),
(46, 'M20035', '20035', 'M20035', '1', '2020-05-24 09:04:42', '0000-00-00 00:00:00'),
(47, 'M20290', '20290', 'M20290', '1', '2020-05-24 09:05:30', '0000-00-00 00:00:00'),
(48, 'M20168', '20168', 'M20168', '1', '2020-05-24 09:06:08', '0000-00-00 00:00:00'),
(49, 'M20012', '20012', 'M20012', '1', '2020-05-24 09:06:24', '0000-00-00 00:00:00'),
(50, 'M20308', '20308', 'M20308', '1', '2020-05-24 09:06:42', '0000-00-00 00:00:00'),
(51, 'M20238', '20238', 'M20238', '1', '2020-05-24 09:06:51', '0000-00-00 00:00:00'),
(52, 'M20008', '20008', 'M20008', '1', '2020-05-24 09:07:10', '0000-00-00 00:00:00'),
(53, 'M20313', '20313', 'M20313', '1', '2020-05-24 09:07:43', '0000-00-00 00:00:00'),
(54, 'M20209', '20209', 'M20209', '1', '2020-05-24 09:08:04', '0000-00-00 00:00:00'),
(55, 'M20271', '20271', 'M20271', '1', '2020-05-24 09:08:10', '2020-05-24 09:24:36'),
(56, 'M20314', '20314', 'M20314', '1', '2020-05-24 09:09:09', '0000-00-00 00:00:00'),
(57, 'M20015', '20015', 'M20015', '1', '2020-05-24 09:09:54', '0000-00-00 00:00:00'),
(58, 'M20285', '20285', 'M20285', '1', '2020-05-24 09:10:07', '0000-00-00 00:00:00'),
(59, 'M20155', '20155', 'M20155', '1', '2020-05-24 09:10:14', '2020-05-24 09:36:06'),
(60, 'M20316', '20316', 'M20316', '1', '2020-05-24 09:10:40', '0000-00-00 00:00:00'),
(61, 'M20005', '20005', 'M20005', '1', '2020-05-24 09:10:54', '2020-05-24 09:57:52'),
(62, 'M20329', '20329', 'M20329', '1', '2020-05-24 09:11:06', '0000-00-00 00:00:00'),
(63, 'M20326', '20326', 'M20326', '1', '2020-05-24 09:11:17', '0000-00-00 00:00:00'),
(64, 'M20296', '20296', 'M20296', '1', '2020-05-24 09:11:33', '0000-00-00 00:00:00'),
(65, 'M20163', '20163', 'M20163', '1', '2020-05-24 09:11:54', '0000-00-00 00:00:00'),
(66, 'M20259', '20259', 'M20259', '1', '2020-05-24 09:12:30', '0000-00-00 00:00:00'),
(67, 'M20319', '20319', 'M20319', '1', '2020-05-24 09:13:20', '0000-00-00 00:00:00'),
(68, 'M20041', '20041', 'M20041', '1', '2020-05-24 09:13:31', '0000-00-00 00:00:00'),
(69, 'M20284', '20284', 'M20284', '1', '2020-05-24 09:13:42', '0000-00-00 00:00:00'),
(70, 'M20044', '20044', 'M20044', '1', '2020-05-24 09:13:55', '0000-00-00 00:00:00'),
(71, 'M20327', '20327', 'M20327', '1', '2020-05-24 09:14:08', '0000-00-00 00:00:00'),
(72, 'M20321', '20321', 'M20321', '1', '2020-05-24 09:14:16', '0000-00-00 00:00:00'),
(73, 'M20342', '20342', 'M20342', '1', '2020-05-24 09:16:06', '0000-00-00 00:00:00'),
(74, 'M20346', '20346', 'M20346', '1', '2020-05-24 09:16:11', '0000-00-00 00:00:00'),
(75, 'M20006', '20006', 'M20006', '1', '2020-05-24 09:16:18', '0000-00-00 00:00:00'),
(76, 'M20370', '20370', 'M20370', '1', '2020-05-24 09:17:07', '0000-00-00 00:00:00'),
(77, 'M20007', '20007', 'M20007', '1', '2020-05-24 09:17:21', '0000-00-00 00:00:00'),
(78, 'M20020', '20020', 'M20020', '1', '2020-05-24 09:17:30', '0000-00-00 00:00:00'),
(79, 'M20029', '20029', 'M20029', '1', '2020-05-24 09:17:52', '0000-00-00 00:00:00'),
(80, 'M20036', '20036', 'M20036', '1', '2020-05-24 09:18:09', '0000-00-00 00:00:00'),
(81, 'M20014', '20014', 'M20014', '1', '2020-05-24 09:18:18', '0000-00-00 00:00:00'),
(82, 'M20337', '20337', 'M20337', '1', '2020-05-24 09:18:36', '0000-00-00 00:00:00'),
(83, 'M20174', '20174', 'M20174', '1', '2020-05-24 09:18:50', '2020-05-24 09:30:07'),
(84, 'M20032', '20032', 'M20032', '1', '2020-05-24 09:19:07', '0000-00-00 00:00:00'),
(85, 'M20315', '20315', 'M20315', '1', '2020-05-24 09:19:42', '0000-00-00 00:00:00'),
(86, 'M20171', '20171', 'M20171', '1', '2020-05-24 09:20:13', '0000-00-00 00:00:00'),
(87, 'M20105', '20105', 'M20105', '1', '2020-05-24 09:20:33', '0000-00-00 00:00:00'),
(88, 'Visitor3', '21003', '21003', '2', '2020-05-24 09:20:51', '0000-00-00 00:00:00'),
(89, 'Visitor4', '21004', '21004', '2', '2020-05-24 09:20:53', '0000-00-00 00:00:00'),
(90, 'Visitor5', '21005', '21005', '2', '2020-05-24 09:20:56', '0000-00-00 00:00:00'),
(91, 'M20235', '20235', 'M20235', '1', '2020-05-24 09:21:06', '0000-00-00 00:00:00'),
(92, 'M20356', '20356', 'M20356', '1', '2020-05-24 09:21:29', '2020-05-24 10:27:05'),
(93, 'M20033', '20033', 'M20033', '1', '2020-05-24 09:21:54', '0000-00-00 00:00:00'),
(94, 'M20253', '20253', 'M20253', '1', '2020-05-24 09:22:03', '0000-00-00 00:00:00'),
(95, 'M20272', '20272', 'M20272', '1', '2020-05-24 09:22:29', '0000-00-00 00:00:00'),
(96, 'M20060', '20060', 'M20060', '1', '2020-05-24 09:22:37', '0000-00-00 00:00:00'),
(97, 'M20002', '20002', 'M20002', '1', '2020-05-24 09:22:46', '0000-00-00 00:00:00'),
(98, 'M20065', '20065', 'M20065', '1', '2020-05-24 09:22:57', '0000-00-00 00:00:00'),
(99, 'M20054', '20054', 'M20054', '1', '2020-05-24 09:23:07', '0000-00-00 00:00:00'),
(100, 'M20001', '20001', 'M20001', '1', '2020-05-24 09:23:46', '2020-05-24 09:50:39'),
(101, 'M20262', '20262', 'M20262', '1', '2020-05-24 09:24:10', '0000-00-00 00:00:00'),
(102, 'M20140', '20140', 'M20140', '1', '2020-05-24 09:24:27', '0000-00-00 00:00:00'),
(103, 'M20274', '20274', 'M20274', '1', '2020-05-24 09:24:59', '0000-00-00 00:00:00'),
(104, 'M20025', '20025', 'M20025', '1', '2020-05-24 09:25:21', '0000-00-00 00:00:00'),
(105, 'M20092', '20092', 'M20092', '1', '2020-05-24 09:26:41', '0000-00-00 00:00:00'),
(106, 'M20093', '20093', 'M20093', '1', '2020-05-24 09:26:43', '0000-00-00 00:00:00'),
(107, 'M20164', '20164', 'M20164', '1', '2020-05-24 09:26:51', '0000-00-00 00:00:00'),
(108, 'M20128', '20128', 'M20128', '1', '2020-05-24 09:27:01', '0000-00-00 00:00:00'),
(109, 'M20176', '20176', 'M20176', '1', '2020-05-24 09:27:20', '0000-00-00 00:00:00'),
(110, 'M20136', '20136', 'M20136', '1', '2020-05-24 09:27:23', '0000-00-00 00:00:00'),
(111, 'M20365', '20365', 'M20365', '1', '2020-05-24 09:27:34', '0000-00-00 00:00:00'),
(112, 'M20175', '20175', 'M20175', '1', '2020-05-24 09:27:59', '0000-00-00 00:00:00'),
(113, 'M20165', '20165', 'M20165', '1', '2020-05-24 09:28:08', '0000-00-00 00:00:00'),
(114, 'M20192', '20192', 'M20192', '1', '2020-05-24 09:28:55', '0000-00-00 00:00:00'),
(115, 'Visitor6', '21006', '21006', '2', '2020-05-24 09:29:12', '0000-00-00 00:00:00'),
(116, 'M20174', '20174', 'M20174', '1', '2020-05-24 09:30:58', '0000-00-00 00:00:00'),
(117, 'M20174', '20174', 'M20174', '1', '2020-05-24 09:31:20', '0000-00-00 00:00:00'),
(118, 'M20024', '20024', 'M20024', '1', '2020-05-24 09:32:26', '0000-00-00 00:00:00'),
(119, 'M20023', '20023', 'M20023', '1', '2020-05-24 09:33:15', '0000-00-00 00:00:00'),
(120, 'M20026', '20026', 'M20026', '1', '2020-05-24 09:35:25', '0000-00-00 00:00:00'),
(121, 'M20178', '20178', 'M20178', '1', '2020-05-24 09:35:56', '0000-00-00 00:00:00'),
(122, 'M20264', '20264', 'M20264', '1', '2020-05-24 09:37:16', '0000-00-00 00:00:00'),
(123, 'M20084', '20084', 'M20084', '1', '2020-05-24 09:38:43', '0000-00-00 00:00:00'),
(124, 'M20087', '20087', 'M20087', '1', '2020-05-24 09:39:17', '0000-00-00 00:00:00'),
(125, 'M20086', '20086', 'M20086', '1', '2020-05-24 09:39:29', '0000-00-00 00:00:00'),
(126, 'Visitor7', '21007', '21007', '2', '2020-05-24 09:39:49', '0000-00-00 00:00:00'),
(127, 'Visitor8', '21008', '21008', '2', '2020-05-24 09:39:51', '0000-00-00 00:00:00'),
(128, 'M20019', '20019', 'M20019', '1', '2020-05-24 09:40:00', '0000-00-00 00:00:00'),
(129, 'M20085', '20085', 'M20085', '1', '2020-05-24 09:40:19', '0000-00-00 00:00:00'),
(130, 'M20137', '20137', 'M20137', '1', '2020-05-24 09:44:26', '0000-00-00 00:00:00'),
(131, 'M20155', '20155', 'M20155', '1', '2020-05-24 09:44:31', '0000-00-00 00:00:00'),
(132, 'M20030', '20030', 'M20030', '1', '2020-05-24 09:44:34', '0000-00-00 00:00:00'),
(133, 'M20271', '20271', 'M20271', '1', '2020-05-24 09:44:37', '0000-00-00 00:00:00'),
(134, 'M20017', '20017', 'M20017', '1', '2020-05-24 09:44:40', '0000-00-00 00:00:00'),
(135, 'M20003', '20003', 'M20003', '1', '2020-05-24 09:45:03', '0000-00-00 00:00:00'),
(136, 'M20318', '20318', 'M20318', '1', '2020-05-24 09:48:56', '0000-00-00 00:00:00'),
(137, 'M20179', '20179', 'M20179', '1', '2020-05-24 09:49:47', '0000-00-00 00:00:00'),
(138, 'M20022', '20022', 'M20022', '1', '2020-05-24 09:50:33', '0000-00-00 00:00:00'),
(139, 'M20232', '20232', 'M20232', '1', '2020-05-24 09:51:53', '2020-05-24 10:01:33'),
(140, 'M20234', '20234', 'M20234', '1', '2020-05-24 09:52:56', '0000-00-00 00:00:00'),
(141, 'M20229', '20229', 'M20229', '1', '2020-05-24 09:56:27', '0000-00-00 00:00:00'),
(142, 'M20005', '20005', 'M20005', '1', '2020-05-24 09:57:58', '0000-00-00 00:00:00'),
(143, 'M20130', '20130', 'M20130', '1', '2020-05-24 09:59:46', '0000-00-00 00:00:00'),
(144, 'M20232', '20232', 'M20232', '1', '2020-05-24 10:01:38', '0000-00-00 00:00:00'),
(145, 'M20166', '20166', 'M20166', '1', '2020-05-24 10:24:16', '0000-00-00 00:00:00'),
(146, 'M20348', '20348', 'M20348', '1', '2020-05-24 10:27:03', '0000-00-00 00:00:00'),
(147, 'M20356', '20356', 'M20356', '1', '2020-05-24 10:27:16', '0000-00-00 00:00:00'),
(148, 'M20157', '20157', 'M20157', '1', '2020-05-24 11:11:03', '0000-00-00 00:00:00'),
(149, 'M20138', '20138', 'M20138', '1', '2020-05-24 11:11:18', '0000-00-00 00:00:00'),
(150, 'M20335', '20335', 'M20335', '1', '2020-05-24 11:13:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_db`
--
ALTER TABLE `card_db`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `trans_db`
--
ALTER TABLE `trans_db`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_db`
--
ALTER TABLE `card_db`
  MODIFY `No` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT for table `trans_db`
--
ALTER TABLE `trans_db`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;