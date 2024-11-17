-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 10:10 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(2) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotline` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_send` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8_unicode_ci,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zalo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_footer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_work` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `website_name`, `doctor_name`, `slogan`, `website_intro`, `hotline`, `email`, `email_send`, `address`, `map`, `facebook`, `zalo`, `skype`, `logo`, `logo_footer`, `favicon`, `domain`, `youtube`, `time_work`, `seo_title`, `seo_keyword`, `seo_description`, `copyright`) VALUES
(2, 'PHÒNG KHÁM CƠ XƯƠNG KHỚP', 'PGS. TS. BS. CAO THANH NGỌC', 'Sức khoẻ của bạn – Sứ mệnh của chúng tôi', 'Sức khoẻ của bạn – Sứ mệnh của chúng tôi', '0913366533', 'bscaothanhngoc@gmail.com', NULL, '51/24  Nguyễn Trãi, Phường 2, Quận 5, TP. Hồ Chí Minh', NULL, 'https://www.facebook.com/pkcaothanhngoc', '0337138768', '', '/source/logo/Picture1.png', '/source/logo/logobsngoc.png', '/source/logo/Picture1.png', 'https://caothanhngoc.com/', '', '17:00 đến 19:30 | Thứ Hai – Tư – Sáu', 'PGS.TS.BS CAO THANH NGỌC', 'PGS.TS.BS CAO THANH NGỌC', 'PGS.TS.BS CAO THANH NGỌC', 'Copyright ©2024 PGS.TS.BS. CAO THANH NGỌC. All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_birth` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `year_of_birth`, `mail`, `sex`, `phone`, `address`, `city`, `note`, `created_at`) VALUES
(1, 'hoang thien', '2021', 'hoangthien@gmail.com', 'nam', '0903876240', '32a nguyen lo trach', 'thanh pho ho chi minh', 'test show thong tin', '2024-06-08 09:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `title`, `role`, `description`, `image`, `created_at`) VALUES
(1, 'TRẦN VĂN MINH ', 'PHÓ GIÁO SƯ, TIẾN SĨ', 'Phó giám đốc phụ trách Nội soi tiêu hóa ', '<p>Ch&agrave;o mừng qu&yacute; vị đến với ph&ograve;ng kh&aacute;m của ch&uacute;ng t&ocirc;i! Ch&uacute;ng t&ocirc;i h&acirc;n hạnh giới thiệu b&aacute;c sĩ Trần Văn Minh, một trong những chuy&ecirc;n gia h&agrave;ng đầu trong lĩnh vực y khoa.</p>\r\n<p>Với hơn 20 năm kinh nghiệm, b&aacute;c sĩ Minh đ&atilde; tốt nghiệp xuất sắc từ Đại học Y Dược Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; ho&agrave;n th&agrave;nh chương tr&igrave;nh đ&agrave;o tạo chuy&ecirc;n s&acirc;u tại c&aacute;c bệnh viện h&agrave;ng đầu quốc tế. &Ocirc;ng chuy&ecirc;n về chẩn đo&aacute;n v&agrave; điều trị c&aacute;c bệnh nội khoa phức tạp, lu&ocirc;n tận t&acirc;m v&agrave; nhiệt huyết trong việc chăm s&oacute;c sức khỏe cho bệnh nh&acirc;n.</p>\r\n<p>B&aacute;c sĩ Minh kh&ocirc;ng chỉ nổi tiếng với kiến thức s&acirc;u rộng m&agrave; c&ograve;n được bệnh nh&acirc;n tin tưởng v&agrave; y&ecirc;u mến nhờ phong c&aacute;ch l&agrave;m việc chuy&ecirc;n nghiệp, chu đ&aacute;o. &Ocirc;ng lu&ocirc;n cập nhật những tiến bộ mới nhất trong y học để mang đến cho bệnh nh&acirc;n những phương ph&aacute;p điều trị hiệu quả nhất. Ch&uacute;ng t&ocirc;i tin rằng với sự tận t&acirc;m v&agrave; kỹ năng xuất sắc của m&igrave;nh, b&aacute;c sĩ Trần Văn Minh sẽ mang lại những giải ph&aacute;p tối ưu cho sức khỏe của qu&yacute; vị.</p>', '/source/doctor/vu-van-khien-min.jpg', '2024-06-09 16:24:22'),
(3, 'NGUYỄN VĂN C', 'PHÓ GIÁO SƯ, TIẾN SĨ', 'Phó giám đốc phụ trách Nội soi tiêu hóa', '<p>Ch&agrave;o mừng qu&yacute; vị đến với ph&ograve;ng kh&aacute;m của ch&uacute;ng t&ocirc;i! Ch&uacute;ng t&ocirc;i h&acirc;n hạnh giới thiệu b&aacute;c sĩ Trần Văn Minh, một trong những chuy&ecirc;n gia h&agrave;ng đầu trong lĩnh vực y khoa.</p>\r\n<p>Với hơn 20 năm kinh nghiệm, b&aacute;c sĩ Minh đ&atilde; tốt nghiệp xuất sắc từ Đại học Y Dược Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; ho&agrave;n th&agrave;nh chương tr&igrave;nh đ&agrave;o tạo chuy&ecirc;n s&acirc;u tại c&aacute;c bệnh viện h&agrave;ng đầu quốc tế. &Ocirc;ng chuy&ecirc;n về chẩn đo&aacute;n v&agrave; điều trị c&aacute;c bệnh nội khoa phức tạp, lu&ocirc;n tận t&acirc;m v&agrave; nhiệt huyết trong việc chăm s&oacute;c sức khỏe cho bệnh nh&acirc;n.</p>\r\n<p>B&aacute;c sĩ Minh kh&ocirc;ng chỉ nổi tiếng với kiến thức s&acirc;u rộng m&agrave; c&ograve;n được bệnh nh&acirc;n tin tưởng v&agrave; y&ecirc;u mến nhờ phong c&aacute;ch l&agrave;m việc chuy&ecirc;n nghiệp, chu đ&aacute;o. &Ocirc;ng lu&ocirc;n cập nhật những tiến bộ mới nhất trong y học để mang đến cho bệnh nh&acirc;n những phương ph&aacute;p điều trị hiệu quả nhất. Ch&uacute;ng t&ocirc;i tin rằng với sự tận t&acirc;m v&agrave; kỹ năng xuất sắc của m&igrave;nh, b&aacute;c sĩ Trần Văn Minh sẽ mang lại những giải ph&aacute;p tối ưu cho sức khỏe của qu&yacute; vị.</p>', '/source/doctor/bac-ha1-300x300.jpg', '2024-06-09 16:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `info_doctors`
--

CREATE TABLE `info_doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_year` date NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_experience` text COLLATE utf8_unicode_ci,
  `education` text COLLATE utf8_unicode_ci,
  `membership` text COLLATE utf8_unicode_ci,
  `research` text COLLATE utf8_unicode_ci,
  `publications` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_doctors`
--

INSERT INTO `info_doctors` (`id`, `name`, `birth_year`, `degree`, `specialty_id`, `image_url`, `schedule_link`, `created_at`, `updated_at`, `position`, `work_experience`, `education`, `membership`, `research`, `publications`) VALUES
(1, 'TS BS.PHAN HUỲNH AN', '0000-00-00', 'Tiến sĩ - Bác sĩ', 1, '/source/doctor/vu-van-khien-min.jpg', 'https://example.com/schedule1', '2024-11-11 10:04:04', '2024-11-16 05:25:27', 'Trưởng khoa Phẫu thuật Hàm Mặt - Răng Hàm mặt', '1. 2011 - nay: Giảng viên Khoa Răng Hàm Mặt Đại học Y Dược TPHCM.\n2. 2014 - nay: Bác sĩ Khoa Phẫu thuật Hàm Mặt - Răng Hàm Mặt Bệnh viện Đại học Y Dược TPHCM.', '1. 2003 - 2009: Học Bác sĩ Răng Hàm Mặt tại Đại học Y Dược TPHCM.\n2. 2010 - 2013: Học Bác sĩ nội trú chuyên ngành Răng Hàm Mặt tại Đại học Y Dược TPHCM.\n3. 2018 - nay: Học Nghiên cứu sinh chuyên ngành Răng Hàm Mặt tại Đại học Y Dược TPHCM.', 'Hội viên Hội Phẫu thuật Tạo hình - Thẩm mỹ TPHCM.', '1. Đặc điểm lâm sàng và Xquang của bướu nguyên bào men.\n2. Liên quan giữa chân răng khôn và ống răng dưới - Đối chiếu trên phim toàn cảnh và phim Conebeam CT.', 'Liên quan giữa chân răng khôn và ống răng dưới - Đối chiếu trên phim toàn cảnh và phim Conebeam CT - Tạp chí Y học Tp Hồ Chí Minh 2018'),
(2, 'PGS TS. NGUYỄN VĂN B', '0000-00-00', 'Phó Giáo sư - Tiến sĩ', 2, '/source/doctor/vu-van-khien-min.jpg', 'https://example.com/schedule2', '2024-11-11 10:04:04', '2024-11-16 05:25:37', 'Giám đốc Trung tâm Tim mạch', '1. 2008 - nay: Giám đốc Trung tâm Tim mạch, Bệnh viện Đại học Y Dược TPHCM.\n2. 2015 - nay: Giảng viên Đại học Y Dược TPHCM.', '1. 2000 - 2004: Học Bác sĩ Tim mạch tại Đại học Y Dược TPHCM.\n2. 2005 - 2010: Học Thạc sĩ và Tiến sĩ chuyên ngành Tim mạch tại Đại học Y Dược TPHCM.', 'Hội viên Hội Tim mạch Việt Nam.', '1. Nghiên cứu về các phương pháp điều trị bệnh mạch vành.\n2. Các liệu pháp mới trong điều trị bệnh lý động mạch vành.', 'Bài báo về phương pháp điều trị mới cho bệnh nhân tim mạch - Tạp chí Tim mạch Việt Nam 2020'),
(3, 'BS. LÊ THỊ M', '0000-00-00', 'Bác sĩ', 3, '/source/doctor/vu-van-khien-min.jpg', 'https://example.com/schedule3', '2024-11-11 10:04:04', '2024-11-16 05:25:41', 'Bác sĩ chuyên khoa Nội tổng hợp', '1. 2010 - nay: Bác sĩ chuyên khoa Nội tổng hợp, Bệnh viện Từ Dũ.\n2. 2012 - nay: Giảng viên Đại học Y Dược TP.HCM.', '1. 2005 - 2010: Học Bác sĩ tại Đại học Y Dược TP.HCM.', 'Hội viên Hội Nội khoa TP.HCM.', '1. Nghiên cứu về bệnh lý viêm nhiễm đường tiêu hóa.\n2. Liệu pháp điều trị mới cho bệnh nhân viêm ruột.', 'Bài báo về các phương pháp điều trị viêm ruột - Tạp chí Y học TP.HCM 2021'),
(4, 'TS BS. NGUYỄN THỊ H', '0000-00-00', 'Tiến sĩ - Bác sĩ', 4, '/source/doctor/vu-van-khien-min.jpg', 'https://example.com/schedule4', '2024-11-11 10:06:14', '2024-11-16 05:25:46', 'Giám đốc Bệnh viện Phẫu thuật Thẩm mỹ', '1. 2010 - nay: Giám đốc Bệnh viện Phẫu thuật Thẩm mỹ Đại học Y Dược TPHCM.\n2. 2012 - nay: Giảng viên khoa Phẫu thuật Đại học Y Dược TPHCM.', '1. 2000 - 2005: Học Bác sĩ tại Đại học Y Dược TPHCM.\n2. 2006 - 2010: Học Thạc sĩ và Tiến sĩ chuyên ngành Phẫu thuật Thẩm mỹ tại Đại học Y Dược TPHCM.', 'Hội viên Hội Phẫu thuật Thẩm mỹ Việt Nam.', '1. Nghiên cứu về phương pháp phẫu thuật thẩm mỹ nâng ngực.\n2. Các kỹ thuật mới trong phẫu thuật thẩm mỹ khuôn mặt.', 'Bài viết về các kỹ thuật nâng ngực và phẫu thuật tạo hình khuôn mặt - Tạp chí Y học Thẩm mỹ 2022');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(3) UNSIGNED NOT NULL,
  `parent_id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orders` int(3) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'header',
  `target` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: tab hiện tại; 1: tab mới',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `image`, `icon`, `orders`, `type`, `target`, `status`) VALUES
(56, 0, 'Giới thiệu', 'gioi-thieu', '', NULL, 1, 'header', 0, 1),
(71, 0, 'Thông tin bệnh', '', '', NULL, 2, 'header', 0, 1),
(72, 0, 'Liên Hệ', 'lien-he', '', NULL, 6, 'header', 0, 1),
(73, 0, 'Tra cứu', '', '', NULL, 3, 'header', 0, 1),
(74, 71, 'Bệnh cơ xương khớp thường gặp', '', '', NULL, 1, 'header', 0, 1),
(75, 71, 'Bệnh tự miễn', '', '', NULL, 2, 'header', 0, 1),
(76, 73, 'Triệu chứng gợi ý bệnh', '', '', NULL, 1, 'header', 0, 1),
(77, 73, 'Thông tin bác sĩ', '', '', NULL, 2, 'header', 0, 1),
(78, 73, 'Lịch làm việc', '', '', NULL, 3, 'header', 0, 1),
(79, 0, 'Giải đáp', '', '', NULL, 4, 'header', 0, 1),
(80, 79, 'Thủ tục đăng ký', '', '', NULL, 1, 'header', 0, 1),
(81, 79, 'Vấn đề sức khỏe', '', '', NULL, 2, 'header', 0, 1),
(82, 71, 'VIêm khớp dạng thấp', '', '', NULL, 3, 'header', 0, 1),
(83, 71, 'Gút', '', '', NULL, 4, 'header', 0, 1),
(84, 71, 'Thoái hóa khớp gối', '', '', NULL, 5, 'header', 0, 1),
(85, 71, 'Loãng xương', '', '', NULL, 6, 'header', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `hot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `author`, `name`, `alias`, `view`, `thumbnail`, `caption`, `content`, `status`, `hot`, `created_at`, `title`, `keyword`, `description`) VALUES
(1, 3, 1, 'TCI đẩy lịch khám sớm từ 6h30 để thuận tiện cho người dân khi vào hè', 'tci-day-lich-kham-som-tu-6h30-de-thuan-tien-cho-nguoi-dan-khi-vao-he', 15, '/source/images/vvv.jpg', 'Nhằm tạo tối đa thuận tiện cho mọi khách đến thăm khám khi thời tiết đang vào hè, Hệ thống y tế Thu Cúc TCI thực hiện đẩy lịch khám lên sớm hơn, từ 6h30 hàng ngày. Lịch khám sớm bắt đầu...', '<h2>1. Đừng để bệnh tật trở th&agrave;nh g&aacute;nh nặng</h2>\r\n<p>C&oacute; thể n&oacute;i, y tế dự ph&ograve;ng đ&oacute;ng vai tr&ograve; quan trọng trong sự nghiệp bảo vệ, chăm s&oacute;c sức khỏe ban đầu v&agrave; n&acirc;ng cao sức khỏe cho người d&acirc;n. Đặt trong bối cảnh tỷ lệ mắc bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, th&igrave; việc tầm so&aacute;t sức khỏe chủ động l&agrave; rất cần thiết đối với mỗi người.</p>\r\n<p>Theo những số liệu điều tra gần đ&acirc;y, tại Việt Nam c&oacute; khoảng 23 triệu người mắc bệnh kh&ocirc;ng l&acirc;y nhiễm. Trong đ&oacute;:</p>\r\n<p>&ndash; Tăng huyết &aacute;p chiếm 26,2%</p>\r\n<p>&ndash; Đ&aacute;i th&aacute;o đường chiếm 7,06%</p>\r\n<p>&ndash; Bệnh phổi tắc nghẽn m&atilde;n t&iacute;nh chiếm 4,2%</p>\r\n<p>&ndash; V&agrave; khoảng 354.000 người mắc bệnh ung thư.</p>\r\n<p>Đứng trước g&aacute;nh nặng bệnh tật do c&aacute;c bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, Hệ thống Y tế Thu C&uacute;c TCI ti&ecirc;n phong trong lĩnh vực s&agrave;ng lọc sức khỏe chủ động v&agrave; đưa kh&aacute;i niệm&nbsp;<a href=\"https://benhvienthucuc.vn/tam-soat-ung-thu-gom-nhung-gi-quy-trinh-thuc-hien-ra-sao/\">tầm so&aacute;t ung thư</a>&nbsp;đến với rộng r&atilde;i người d&acirc;n.</p>\r\n<p>Hiểu đơn giản th&igrave; tầm so&aacute;t sức khỏe chủ động l&agrave; việc thực hiện c&aacute;c x&eacute;t nghiệm, kiểm tra sức khỏe định kỳ. Điều n&agrave;y gi&uacute;p ph&aacute;t hiện sớm c&aacute;c bệnh l&yacute; tiềm ẩn, ngay cả khi kh&ocirc;ng c&oacute; triệu chứng g&igrave;. Nhờ vậy, việc điều trị trở n&ecirc;n dễ d&agrave;ng v&agrave; hiệu quả hơn, đồng thời gi&uacute;p ngăn ngừa c&aacute;c biến chứng nguy hiểm.</p>\r\n<p>Lợi &iacute;ch thấy r&otilde; từ hoạt động n&agrave;y l&agrave; chất lượng cuộc sống được cải thiện. Tr&ecirc;n thực tế, chi ph&iacute; điều trị bệnh ở giai đoạn đầu thường thấp hơn nhiều so với giai đoạn muộn. Tầm so&aacute;t sức khỏe chủ động gi&uacute;p bạn nhận thức được t&igrave;nh trạng sức khỏe của bản th&acirc;n v&agrave; c&oacute; biện ph&aacute;p cải thiện lối sống để ph&ograve;ng ngừa bệnh tật. Khi biết được m&igrave;nh c&oacute; sức khỏe tốt, bạn sẽ cảm thấy an t&acirc;m v&agrave; tận hưởng cuộc sống một c&aacute;ch trọn vẹn hơn.</p>\r\n<div id=\"attachment_672268\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672268 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" alt=\"tầm so&aacute;t sức khỏe chủ động\" width=\"800\" height=\"500\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672268\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672268\" class=\"wp-caption-text\">Tầm so&aacute;t chủ động gi&uacute;p mỗi người dễ d&agrave;ng theo d&otilde;i t&igrave;nh trạng sức khỏe c&aacute; nh&acirc;n</p>\r\n</div>\r\n<h2><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span>2. L&yacute; do n&ecirc;n tầm so&aacute;t sức khỏe chủ động tại TCI</h2>\r\n<p>Khoa Ung bướu Singapore tại TCI l&agrave; đơn vị nghi&ecirc;n cứu, ph&aacute;t triển c&aacute;c g&oacute;i&nbsp;<a href=\"https://benhvienthucuc.vn/nen-lua-chon-kham-tien-man-kinh-o-dau-ha-noi-tot-va-uy-tin/\">kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư. Hệ thống g&oacute;i kh&aacute;m tại đ&acirc;y tương đối đa dạng v&agrave; khoa học, với nhiều g&oacute;i kh&aacute;m được thiết kế nhằm ph&aacute;t hiện sớm c&aacute;c nguy cơ ung thư kh&aacute;c nhau, nhờ đ&oacute; người d&acirc;n dễ d&agrave;ng h&igrave;nh dung v&agrave; lựa chọn.</p>\r\n<p>&ndash; Hơn 100 g&oacute;i kh&aacute;m từ cơ bản đến chuy&ecirc;n s&acirc;u.</p>\r\n<p>&ndash; Ứng dụng c&ocirc;ng nghệ, m&aacute;y m&oacute;c hiện đại, được nhập khẩu từ c&aacute;c nước c&oacute; nền y học ph&aacute;t triển tr&ecirc;n thế giới như: Nhật, Mỹ, Đức, Trung Quốc,&hellip;</p>\r\n<p>&ndash; Thăm kh&aacute;m v&agrave; tư vấn c&ugrave;ng đội ngũ y b&aacute;c sĩ gi&agrave;u kinh nghiệm trong lĩnh vực s&agrave;ng lọc ung bướu. Trường hợp&nbsp;<a href=\"https://benhvienthucuc.vn/giai-dap-dau-la-cach-phat-hien-ung-thu-som-hieu-qua/\">ph&aacute;t hiện ung thư</a>&nbsp;sau khi thăm kh&aacute;m sẽ được tư vấn c&ugrave;ng c&aacute;c b&aacute;c sĩ Singaore, nhằm t&igrave;m ra ph&aacute;c đồ điều trị ph&ugrave; hợp nhất.</p>\r\n<p>&ndash; Kh&ocirc;ng gian thăm kh&aacute;m l&yacute; tưởng, gi&uacute;p giảm thiểu &aacute;p lực cho người bệnh khi đi thăm kh&aacute;m.</p>\r\n<p>Giờ đ&acirc;y, người d&acirc;n c&oacute; thể kh&aacute;m, tầm so&aacute;t, v&agrave; điều trị ung thư c&ugrave;ng đội ngũ chuy&ecirc;n gia Ung bướu Singapore ngay tại Việt Nam. Chỉ với một g&oacute;i kh&aacute;m gồm đầy đủ c&aacute;c danh mục thiết yếu, b&aacute;c sĩ dễ d&agrave;ng chỉ điểm c&aacute;c dấu hiệu bệnh tiềm ẩn, theo d&otilde;i sự ph&aacute;t triển của bệnh l&yacute; nền, đồng thời c&oacute; hướng xử tr&iacute; kịp thời, gi&uacute;p n&acirc;ng cao hiệu quả điều trị cho người bệnh.</p>\r\n<p>Mỗi danh mục thăm kh&aacute;m đều c&oacute; sự hỗ trợ của m&aacute;y m&oacute;c, c&ocirc;ng nghệ hiện đại, mang lại hiệu quả chẩn đo&aacute;n ch&iacute;nh x&aacute;c. Tại TCI hiện đang sở hữu hệ thống trang thiết bị y tế ti&ecirc;n tiến, bao gồm hệ thống x&eacute;t nghiệm tự động Power Express, m&aacute;y chụp cộng hưởng từ 1.5T, m&aacute;y&nbsp;<a href=\"https://benhvienthucuc.vn/dieu-can-biet-khi-thuc-hien-phuong-phap-chup-ct-cat-lop/\">chụp cắt lớp</a>&nbsp;vi t&iacute;nh đa d&atilde;y, m&aacute;y chụp X-quang đa tư thế, m&aacute;y si&ecirc;u &acirc;m đa chiều, c&ocirc;ng nghệ nội soi ti&ecirc;u h&oacute;a kh&ocirc;ng đau &ndash; kh&ocirc;ng kh&oacute; chịu, c&ocirc;ng nghệ nội soi tai mũi họng ống mềm,&hellip; Ngo&agrave;i ra, mọi thắc mắc về t&igrave;nh trạng sức khỏe sẽ được tư vấn, giải đ&aacute;p trực tiếp bởi đội ngũ y b&aacute;c sĩ đầu ng&agrave;nh tại TCI.</p>\r\n<div id=\"attachment_672267\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672267 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" alt=\"tầm so&aacute;t sức khỏe tại TCI\" width=\"800\" height=\"533\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672267\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672267\" class=\"wp-caption-text\">TCI c&oacute; đầy đủ năng lực thực hiện c&aacute;c hoạt động tầm so&aacute;t sức khỏe định kỳ</p>\r\n</div>\r\n<h2><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span>3. Săn deal sức khỏe &ldquo;n&oacute;ng bỏng tay&rdquo; từ TCI</h2>\r\n<p>Đồng h&agrave;nh c&ugrave;ng người d&acirc;n trong chăm s&oacute;c sức khỏe chủ động, Thu C&uacute;c TCI mang tới đa dạng g&oacute;i tầm so&aacute;t sức khỏe ph&ugrave; hợp với nhiều đối tượng. Được nghi&ecirc;n cứu v&agrave; x&acirc;y dựng bởi đội ngũ b&aacute;c sĩ&nbsp; c&oacute; hơn 30 năm kinh nghiệm s&agrave;ng lọc sức khỏe chủ động, c&aacute;c g&oacute;i kh&aacute;m bao gồm đầy đủ danh mục kiểm tra thiết yếu, nhằm đ&aacute;nh gi&aacute; t&igrave;nh trạng sức khỏe tổng qu&aacute;t từ đầu đến ch&acirc;n, từ trong ra ngo&agrave;i. Th&aacute;ng 5 n&agrave;y, Thu C&uacute;c TCI triển khai loạt ưu đ&atilde;i hấp dẫn d&agrave;nh cho kh&aacute;ch h&agrave;ng đăng k&yacute; v&agrave; sử dụng c&aacute;c&nbsp;<a href=\"https://benhvienthucuc.vn/goi-kham-suc-khoe-tong-quat-dinh-ky-nang-cao/\">g&oacute;i kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư.</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><strong>Tầm so&aacute;t sức khỏe tại cơ sở 32 Đại Từ</strong></h3>\r\n<p>&ndash; Giảm 35% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 40% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><strong>T</strong><strong>ầm so&aacute;t sức khỏe t</strong><strong>ại cơ sở 286 Thụy Khu&ecirc; v&agrave; 216 Trần Duy Hưng</strong></h3>\r\n<p>&ndash; Giảm 30% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 35% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<p>Chương tr&igrave;nh &aacute;p dụng cho kh&aacute;ch mua v&agrave; sử dụng c&aacute;c g&oacute;i tầm so&aacute;t sức khỏe từ ng&agrave;y 01/05/2024 &ndash; 31/05/2024.</p>', 1, 0, '2024-06-03 14:56:14', 'TCI đẩy lịch khám sớm từ 6h30 để thuận tiện cho người dân khi vào hè', '', ''),
(2, 2, 1, 'Chủ động cuộc sống nhờ tầm soát sức khỏe', 'chu-dong-cuoc-song-nho-tam-soat-suc-khoe', 31, '/source/images/fff.jpg', 'Tầm soát sức khỏe chủ động là chìa khóa cho một cuộc sống khỏe mạnh và viên mãn. Tháng 5 này, Hệ thống Y tế Thu Cúc TCI tặng ưu đãi lên tới 40% khi đăng ký các gói khám tổng quát,...', '<h2>1. Đừng để bệnh tật trở th&agrave;nh g&aacute;nh nặng</h2>\r\n<p>C&oacute; thể n&oacute;i, y tế dự ph&ograve;ng đ&oacute;ng vai tr&ograve; quan trọng trong sự nghiệp bảo vệ, chăm s&oacute;c sức khỏe ban đầu v&agrave; n&acirc;ng cao sức khỏe cho người d&acirc;n. Đặt trong bối cảnh tỷ lệ mắc bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, th&igrave; việc tầm so&aacute;t sức khỏe chủ động l&agrave; rất cần thiết đối với mỗi người.</p>\r\n<p>Theo những số liệu điều tra gần đ&acirc;y, tại Việt Nam c&oacute; khoảng 23 triệu người mắc bệnh kh&ocirc;ng l&acirc;y nhiễm. Trong đ&oacute;:</p>\r\n<p>&ndash; Tăng huyết &aacute;p chiếm 26,2%</p>\r\n<p>&ndash; Đ&aacute;i th&aacute;o đường chiếm 7,06%</p>\r\n<p>&ndash; Bệnh phổi tắc nghẽn m&atilde;n t&iacute;nh chiếm 4,2%</p>\r\n<p>&ndash; V&agrave; khoảng 354.000 người mắc bệnh ung thư.</p>\r\n<p>Đứng trước g&aacute;nh nặng bệnh tật do c&aacute;c bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, Hệ thống Y tế Thu C&uacute;c TCI ti&ecirc;n phong trong lĩnh vực s&agrave;ng lọc sức khỏe chủ động v&agrave; đưa kh&aacute;i niệm&nbsp;<a href=\"https://benhvienthucuc.vn/tam-soat-ung-thu-gom-nhung-gi-quy-trinh-thuc-hien-ra-sao/\">tầm so&aacute;t ung thư</a>&nbsp;đến với rộng r&atilde;i người d&acirc;n.</p>\r\n<p>Hiểu đơn giản th&igrave; tầm so&aacute;t sức khỏe chủ động l&agrave; việc thực hiện c&aacute;c x&eacute;t nghiệm, kiểm tra sức khỏe định kỳ. Điều n&agrave;y gi&uacute;p ph&aacute;t hiện sớm c&aacute;c bệnh l&yacute; tiềm ẩn, ngay cả khi kh&ocirc;ng c&oacute; triệu chứng g&igrave;. Nhờ vậy, việc điều trị trở n&ecirc;n dễ d&agrave;ng v&agrave; hiệu quả hơn, đồng thời gi&uacute;p ngăn ngừa c&aacute;c biến chứng nguy hiểm.</p>\r\n<p>Lợi &iacute;ch thấy r&otilde; từ hoạt động n&agrave;y l&agrave; chất lượng cuộc sống được cải thiện. Tr&ecirc;n thực tế, chi ph&iacute; điều trị bệnh ở giai đoạn đầu thường thấp hơn nhiều so với giai đoạn muộn. Tầm so&aacute;t sức khỏe chủ động gi&uacute;p bạn nhận thức được t&igrave;nh trạng sức khỏe của bản th&acirc;n v&agrave; c&oacute; biện ph&aacute;p cải thiện lối sống để ph&ograve;ng ngừa bệnh tật. Khi biết được m&igrave;nh c&oacute; sức khỏe tốt, bạn sẽ cảm thấy an t&acirc;m v&agrave; tận hưởng cuộc sống một c&aacute;ch trọn vẹn hơn.</p>\r\n<div id=\"attachment_672268\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672268 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" alt=\"tầm so&aacute;t sức khỏe chủ động\" width=\"800\" height=\"500\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672268\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672268\" class=\"wp-caption-text\">Tầm so&aacute;t chủ động gi&uacute;p mỗi người dễ d&agrave;ng theo d&otilde;i t&igrave;nh trạng sức khỏe c&aacute; nh&acirc;n</p>\r\n</div>\r\n<h2><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span>2. L&yacute; do n&ecirc;n tầm so&aacute;t sức khỏe chủ động tại TCI</h2>\r\n<p>Khoa Ung bướu Singapore tại TCI l&agrave; đơn vị nghi&ecirc;n cứu, ph&aacute;t triển c&aacute;c g&oacute;i&nbsp;<a href=\"https://benhvienthucuc.vn/nen-lua-chon-kham-tien-man-kinh-o-dau-ha-noi-tot-va-uy-tin/\">kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư. Hệ thống g&oacute;i kh&aacute;m tại đ&acirc;y tương đối đa dạng v&agrave; khoa học, với nhiều g&oacute;i kh&aacute;m được thiết kế nhằm ph&aacute;t hiện sớm c&aacute;c nguy cơ ung thư kh&aacute;c nhau, nhờ đ&oacute; người d&acirc;n dễ d&agrave;ng h&igrave;nh dung v&agrave; lựa chọn.</p>\r\n<p>&ndash; Hơn 100 g&oacute;i kh&aacute;m từ cơ bản đến chuy&ecirc;n s&acirc;u.</p>\r\n<p>&ndash; Ứng dụng c&ocirc;ng nghệ, m&aacute;y m&oacute;c hiện đại, được nhập khẩu từ c&aacute;c nước c&oacute; nền y học ph&aacute;t triển tr&ecirc;n thế giới như: Nhật, Mỹ, Đức, Trung Quốc,&hellip;</p>\r\n<p>&ndash; Thăm kh&aacute;m v&agrave; tư vấn c&ugrave;ng đội ngũ y b&aacute;c sĩ gi&agrave;u kinh nghiệm trong lĩnh vực s&agrave;ng lọc ung bướu. Trường hợp&nbsp;<a href=\"https://benhvienthucuc.vn/giai-dap-dau-la-cach-phat-hien-ung-thu-som-hieu-qua/\">ph&aacute;t hiện ung thư</a>&nbsp;sau khi thăm kh&aacute;m sẽ được tư vấn c&ugrave;ng c&aacute;c b&aacute;c sĩ Singaore, nhằm t&igrave;m ra ph&aacute;c đồ điều trị ph&ugrave; hợp nhất.</p>\r\n<p>&ndash; Kh&ocirc;ng gian thăm kh&aacute;m l&yacute; tưởng, gi&uacute;p giảm thiểu &aacute;p lực cho người bệnh khi đi thăm kh&aacute;m.</p>\r\n<p>Giờ đ&acirc;y, người d&acirc;n c&oacute; thể kh&aacute;m, tầm so&aacute;t, v&agrave; điều trị ung thư c&ugrave;ng đội ngũ chuy&ecirc;n gia Ung bướu Singapore ngay tại Việt Nam. Chỉ với một g&oacute;i kh&aacute;m gồm đầy đủ c&aacute;c danh mục thiết yếu, b&aacute;c sĩ dễ d&agrave;ng chỉ điểm c&aacute;c dấu hiệu bệnh tiềm ẩn, theo d&otilde;i sự ph&aacute;t triển của bệnh l&yacute; nền, đồng thời c&oacute; hướng xử tr&iacute; kịp thời, gi&uacute;p n&acirc;ng cao hiệu quả điều trị cho người bệnh.</p>\r\n<p>Mỗi danh mục thăm kh&aacute;m đều c&oacute; sự hỗ trợ của m&aacute;y m&oacute;c, c&ocirc;ng nghệ hiện đại, mang lại hiệu quả chẩn đo&aacute;n ch&iacute;nh x&aacute;c. Tại TCI hiện đang sở hữu hệ thống trang thiết bị y tế ti&ecirc;n tiến, bao gồm hệ thống x&eacute;t nghiệm tự động Power Express, m&aacute;y chụp cộng hưởng từ 1.5T, m&aacute;y&nbsp;<a href=\"https://benhvienthucuc.vn/dieu-can-biet-khi-thuc-hien-phuong-phap-chup-ct-cat-lop/\">chụp cắt lớp</a>&nbsp;vi t&iacute;nh đa d&atilde;y, m&aacute;y chụp X-quang đa tư thế, m&aacute;y si&ecirc;u &acirc;m đa chiều, c&ocirc;ng nghệ nội soi ti&ecirc;u h&oacute;a kh&ocirc;ng đau &ndash; kh&ocirc;ng kh&oacute; chịu, c&ocirc;ng nghệ nội soi tai mũi họng ống mềm,&hellip; Ngo&agrave;i ra, mọi thắc mắc về t&igrave;nh trạng sức khỏe sẽ được tư vấn, giải đ&aacute;p trực tiếp bởi đội ngũ y b&aacute;c sĩ đầu ng&agrave;nh tại TCI.</p>\r\n<div id=\"attachment_672267\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672267 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" alt=\"tầm so&aacute;t sức khỏe tại TCI\" width=\"800\" height=\"533\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672267\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672267\" class=\"wp-caption-text\">TCI c&oacute; đầy đủ năng lực thực hiện c&aacute;c hoạt động tầm so&aacute;t sức khỏe định kỳ</p>\r\n</div>\r\n<h2><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span>3. Săn deal sức khỏe &ldquo;n&oacute;ng bỏng tay&rdquo; từ TCI</h2>\r\n<p>Đồng h&agrave;nh c&ugrave;ng người d&acirc;n trong chăm s&oacute;c sức khỏe chủ động, Thu C&uacute;c TCI mang tới đa dạng g&oacute;i tầm so&aacute;t sức khỏe ph&ugrave; hợp với nhiều đối tượng. Được nghi&ecirc;n cứu v&agrave; x&acirc;y dựng bởi đội ngũ b&aacute;c sĩ&nbsp; c&oacute; hơn 30 năm kinh nghiệm s&agrave;ng lọc sức khỏe chủ động, c&aacute;c g&oacute;i kh&aacute;m bao gồm đầy đủ danh mục kiểm tra thiết yếu, nhằm đ&aacute;nh gi&aacute; t&igrave;nh trạng sức khỏe tổng qu&aacute;t từ đầu đến ch&acirc;n, từ trong ra ngo&agrave;i. Th&aacute;ng 5 n&agrave;y, Thu C&uacute;c TCI triển khai loạt ưu đ&atilde;i hấp dẫn d&agrave;nh cho kh&aacute;ch h&agrave;ng đăng k&yacute; v&agrave; sử dụng c&aacute;c&nbsp;<a href=\"https://benhvienthucuc.vn/goi-kham-suc-khoe-tong-quat-dinh-ky-nang-cao/\">g&oacute;i kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư.</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><strong>Tầm so&aacute;t sức khỏe tại cơ sở 32 Đại Từ</strong></h3>\r\n<p>&ndash; Giảm 35% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 40% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><strong>T</strong><strong>ầm so&aacute;t sức khỏe t</strong><strong>ại cơ sở 286 Thụy Khu&ecirc; v&agrave; 216 Trần Duy Hưng</strong></h3>\r\n<p>&ndash; Giảm 30% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 35% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<p>Chương tr&igrave;nh &aacute;p dụng cho kh&aacute;ch mua v&agrave; sử dụng c&aacute;c g&oacute;i tầm so&aacute;t sức khỏe từ ng&agrave;y 01/05/2024 &ndash; 31/05/2024.</p>', 1, 0, '2024-06-03 14:56:43', 'Chủ động cuộc sống nhờ tầm soát sức khỏe', '', ''),
(3, 1, 1, 'THU CÚC TCI THÔNG BÁO LỊCH LÀM VIỆC DỊP 30/4, 1/5/2024', 'thu-cuc-tci-thong-bao-lich-lam-viec-dip-304-152024', 41, '/source/images/bbbbbb.jpg', 'Dịp lễ 30/4 và 1/5 sắp đến, Hệ thống Y tế Thu Cúc TCI kính chúc Quý khách, Quý bệnh nhân một kỳ nghỉ lễ vui, khỏe bên gia đình, những người thân yêu. Nhằm phục vụ nhu cầu khám chữa bệnh, chăm...', '<h2>1. Đừng để bệnh tật trở th&agrave;nh g&aacute;nh nặng</h2>\r\n<p>C&oacute; thể n&oacute;i, y tế dự ph&ograve;ng đ&oacute;ng vai tr&ograve; quan trọng trong sự nghiệp bảo vệ, chăm s&oacute;c sức khỏe ban đầu v&agrave; n&acirc;ng cao sức khỏe cho người d&acirc;n. Đặt trong bối cảnh tỷ lệ mắc bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, th&igrave; việc tầm so&aacute;t sức khỏe chủ động l&agrave; rất cần thiết đối với mỗi người.</p>\r\n<p>Theo những số liệu điều tra gần đ&acirc;y, tại Việt Nam c&oacute; khoảng 23 triệu người mắc bệnh kh&ocirc;ng l&acirc;y nhiễm. Trong đ&oacute;:</p>\r\n<p>&ndash; Tăng huyết &aacute;p chiếm 26,2%</p>\r\n<p>&ndash; Đ&aacute;i th&aacute;o đường chiếm 7,06%</p>\r\n<p>&ndash; Bệnh phổi tắc nghẽn m&atilde;n t&iacute;nh chiếm 4,2%</p>\r\n<p>&ndash; V&agrave; khoảng 354.000 người mắc bệnh ung thư.</p>\r\n<p>Đứng trước g&aacute;nh nặng bệnh tật do c&aacute;c bệnh kh&ocirc;ng l&acirc;y nhiễm ng&agrave;y c&agrave;ng gia tăng tại Việt Nam, Hệ thống Y tế Thu C&uacute;c TCI ti&ecirc;n phong trong lĩnh vực s&agrave;ng lọc sức khỏe chủ động v&agrave; đưa kh&aacute;i niệm&nbsp;<a href=\"https://benhvienthucuc.vn/tam-soat-ung-thu-gom-nhung-gi-quy-trinh-thuc-hien-ra-sao/\">tầm so&aacute;t ung thư</a>&nbsp;đến với rộng r&atilde;i người d&acirc;n.</p>\r\n<p>Hiểu đơn giản th&igrave; tầm so&aacute;t sức khỏe chủ động l&agrave; việc thực hiện c&aacute;c x&eacute;t nghiệm, kiểm tra sức khỏe định kỳ. Điều n&agrave;y gi&uacute;p ph&aacute;t hiện sớm c&aacute;c bệnh l&yacute; tiềm ẩn, ngay cả khi kh&ocirc;ng c&oacute; triệu chứng g&igrave;. Nhờ vậy, việc điều trị trở n&ecirc;n dễ d&agrave;ng v&agrave; hiệu quả hơn, đồng thời gi&uacute;p ngăn ngừa c&aacute;c biến chứng nguy hiểm.</p>\r\n<p>Lợi &iacute;ch thấy r&otilde; từ hoạt động n&agrave;y l&agrave; chất lượng cuộc sống được cải thiện. Tr&ecirc;n thực tế, chi ph&iacute; điều trị bệnh ở giai đoạn đầu thường thấp hơn nhiều so với giai đoạn muộn. Tầm so&aacute;t sức khỏe chủ động gi&uacute;p bạn nhận thức được t&igrave;nh trạng sức khỏe của bản th&acirc;n v&agrave; c&oacute; biện ph&aacute;p cải thiện lối sống để ph&ograve;ng ngừa bệnh tật. Khi biết được m&igrave;nh c&oacute; sức khỏe tốt, bạn sẽ cảm thấy an t&acirc;m v&agrave; tận hưởng cuộc sống một c&aacute;ch trọn vẹn hơn.</p>\r\n<div id=\"attachment_672268\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672268 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" alt=\"tầm so&aacute;t sức khỏe chủ động\" width=\"800\" height=\"500\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672268\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-3.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672268\" class=\"wp-caption-text\">Tầm so&aacute;t chủ động gi&uacute;p mỗi người dễ d&agrave;ng theo d&otilde;i t&igrave;nh trạng sức khỏe c&aacute; nh&acirc;n</p>\r\n</div>\r\n<h2><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span><span id=\"2-Ly-do-nen-tam-soat-suc-khoe-chu-dong-tai-TCI\" class=\"ez-toc-section\"></span>2. L&yacute; do n&ecirc;n tầm so&aacute;t sức khỏe chủ động tại TCI</h2>\r\n<p>Khoa Ung bướu Singapore tại TCI l&agrave; đơn vị nghi&ecirc;n cứu, ph&aacute;t triển c&aacute;c g&oacute;i&nbsp;<a href=\"https://benhvienthucuc.vn/nen-lua-chon-kham-tien-man-kinh-o-dau-ha-noi-tot-va-uy-tin/\">kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư. Hệ thống g&oacute;i kh&aacute;m tại đ&acirc;y tương đối đa dạng v&agrave; khoa học, với nhiều g&oacute;i kh&aacute;m được thiết kế nhằm ph&aacute;t hiện sớm c&aacute;c nguy cơ ung thư kh&aacute;c nhau, nhờ đ&oacute; người d&acirc;n dễ d&agrave;ng h&igrave;nh dung v&agrave; lựa chọn.</p>\r\n<p>&ndash; Hơn 100 g&oacute;i kh&aacute;m từ cơ bản đến chuy&ecirc;n s&acirc;u.</p>\r\n<p>&ndash; Ứng dụng c&ocirc;ng nghệ, m&aacute;y m&oacute;c hiện đại, được nhập khẩu từ c&aacute;c nước c&oacute; nền y học ph&aacute;t triển tr&ecirc;n thế giới như: Nhật, Mỹ, Đức, Trung Quốc,&hellip;</p>\r\n<p>&ndash; Thăm kh&aacute;m v&agrave; tư vấn c&ugrave;ng đội ngũ y b&aacute;c sĩ gi&agrave;u kinh nghiệm trong lĩnh vực s&agrave;ng lọc ung bướu. Trường hợp&nbsp;<a href=\"https://benhvienthucuc.vn/giai-dap-dau-la-cach-phat-hien-ung-thu-som-hieu-qua/\">ph&aacute;t hiện ung thư</a>&nbsp;sau khi thăm kh&aacute;m sẽ được tư vấn c&ugrave;ng c&aacute;c b&aacute;c sĩ Singaore, nhằm t&igrave;m ra ph&aacute;c đồ điều trị ph&ugrave; hợp nhất.</p>\r\n<p>&ndash; Kh&ocirc;ng gian thăm kh&aacute;m l&yacute; tưởng, gi&uacute;p giảm thiểu &aacute;p lực cho người bệnh khi đi thăm kh&aacute;m.</p>\r\n<p>Giờ đ&acirc;y, người d&acirc;n c&oacute; thể kh&aacute;m, tầm so&aacute;t, v&agrave; điều trị ung thư c&ugrave;ng đội ngũ chuy&ecirc;n gia Ung bướu Singapore ngay tại Việt Nam. Chỉ với một g&oacute;i kh&aacute;m gồm đầy đủ c&aacute;c danh mục thiết yếu, b&aacute;c sĩ dễ d&agrave;ng chỉ điểm c&aacute;c dấu hiệu bệnh tiềm ẩn, theo d&otilde;i sự ph&aacute;t triển của bệnh l&yacute; nền, đồng thời c&oacute; hướng xử tr&iacute; kịp thời, gi&uacute;p n&acirc;ng cao hiệu quả điều trị cho người bệnh.</p>\r\n<p>Mỗi danh mục thăm kh&aacute;m đều c&oacute; sự hỗ trợ của m&aacute;y m&oacute;c, c&ocirc;ng nghệ hiện đại, mang lại hiệu quả chẩn đo&aacute;n ch&iacute;nh x&aacute;c. Tại TCI hiện đang sở hữu hệ thống trang thiết bị y tế ti&ecirc;n tiến, bao gồm hệ thống x&eacute;t nghiệm tự động Power Express, m&aacute;y chụp cộng hưởng từ 1.5T, m&aacute;y&nbsp;<a href=\"https://benhvienthucuc.vn/dieu-can-biet-khi-thuc-hien-phuong-phap-chup-ct-cat-lop/\">chụp cắt lớp</a>&nbsp;vi t&iacute;nh đa d&atilde;y, m&aacute;y chụp X-quang đa tư thế, m&aacute;y si&ecirc;u &acirc;m đa chiều, c&ocirc;ng nghệ nội soi ti&ecirc;u h&oacute;a kh&ocirc;ng đau &ndash; kh&ocirc;ng kh&oacute; chịu, c&ocirc;ng nghệ nội soi tai mũi họng ống mềm,&hellip; Ngo&agrave;i ra, mọi thắc mắc về t&igrave;nh trạng sức khỏe sẽ được tư vấn, giải đ&aacute;p trực tiếp bởi đội ngũ y b&aacute;c sĩ đầu ng&agrave;nh tại TCI.</p>\r\n<div id=\"attachment_672267\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-672267 entered litespeed-loaded\" src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" alt=\"tầm so&aacute;t sức khỏe tại TCI\" width=\"800\" height=\"533\" data-lazyloaded=\"1\" aria-describedby=\"caption-attachment-672267\" data-src=\"https://cdn.benhvienthucuc.vn/wp-content/uploads/2024/04/chu-dong-khoe-chu-dong-cuoc-song-nho-tam-soat-dinh-ky-2.jpg\" data-ll-status=\"loaded\" />\r\n<p id=\"caption-attachment-672267\" class=\"wp-caption-text\">TCI c&oacute; đầy đủ năng lực thực hiện c&aacute;c hoạt động tầm so&aacute;t sức khỏe định kỳ</p>\r\n</div>\r\n<h2><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span><span id=\"3-San-deal-suc-khoe-%E2%80%9Cnong-bong-tay%E2%80%9D-tu-TCI\" class=\"ez-toc-section\"></span>3. Săn deal sức khỏe &ldquo;n&oacute;ng bỏng tay&rdquo; từ TCI</h2>\r\n<p>Đồng h&agrave;nh c&ugrave;ng người d&acirc;n trong chăm s&oacute;c sức khỏe chủ động, Thu C&uacute;c TCI mang tới đa dạng g&oacute;i tầm so&aacute;t sức khỏe ph&ugrave; hợp với nhiều đối tượng. Được nghi&ecirc;n cứu v&agrave; x&acirc;y dựng bởi đội ngũ b&aacute;c sĩ&nbsp; c&oacute; hơn 30 năm kinh nghiệm s&agrave;ng lọc sức khỏe chủ động, c&aacute;c g&oacute;i kh&aacute;m bao gồm đầy đủ danh mục kiểm tra thiết yếu, nhằm đ&aacute;nh gi&aacute; t&igrave;nh trạng sức khỏe tổng qu&aacute;t từ đầu đến ch&acirc;n, từ trong ra ngo&agrave;i. Th&aacute;ng 5 n&agrave;y, Thu C&uacute;c TCI triển khai loạt ưu đ&atilde;i hấp dẫn d&agrave;nh cho kh&aacute;ch h&agrave;ng đăng k&yacute; v&agrave; sử dụng c&aacute;c&nbsp;<a href=\"https://benhvienthucuc.vn/goi-kham-suc-khoe-tong-quat-dinh-ky-nang-cao/\">g&oacute;i kh&aacute;m sức khỏe</a>&nbsp;v&agrave; tầm so&aacute;t ung thư.</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-32-Dai-Tu\" class=\"ez-toc-section\"></span><strong>Tầm so&aacute;t sức khỏe tại cơ sở 32 Đại Từ</strong></h3>\r\n<p>&ndash; Giảm 35% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 40% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<h3><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><span id=\"Tam-soat-suc-khoe-tai-co-so-286-Thuy-Khue-va-216-Tran-Duy-Hung\" class=\"ez-toc-section\"></span><strong>T</strong><strong>ầm so&aacute;t sức khỏe t</strong><strong>ại cơ sở 286 Thụy Khu&ecirc; v&agrave; 216 Trần Duy Hưng</strong></h3>\r\n<p>&ndash; Giảm 30% cho tất cả kh&aacute;ch h&agrave;ng</p>\r\n<p>&ndash; Giảm 35% cho nh&oacute;m từ 2 kh&aacute;ch h&agrave;ng trở l&ecirc;n</p>\r\n<p>Chương tr&igrave;nh &aacute;p dụng cho kh&aacute;ch mua v&agrave; sử dụng c&aacute;c g&oacute;i tầm so&aacute;t sức khỏe từ ng&agrave;y 01/05/2024 &ndash; 31/05/2024.</p>', 1, 0, '2024-06-03 14:57:43', 'THU CÚC TCI THÔNG BÁO LỊCH LÀM VIỆC DỊP 30/4, 1/5/2024', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8_unicode_ci,
  `orders` int(3) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent_id`, `name`, `alias`, `banner`, `thumbnail`, `link`, `introduction`, `orders`, `title`, `keyword`, `description`, `status`, `created_at`) VALUES
(1, 0, 'Bệnh khớp chuyển hóa', 'benh-khop-chuyen-hoa', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-03 07:53:37'),
(2, 0, 'Bệnh lý tự miễn', 'benh-ly-tu-mien', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-03 07:53:48'),
(3, 0, 'Hoạt động thể chất', 'hoat-dong-the-chat', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-03 07:53:57'),
(4, 0, 'Điều chỉnh chế độ ăn uống', 'dieu-chinh-che-do-an-uong', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-03 07:54:05'),
(5, 0, 'Điều trị thuốc sinh học', 'dieu-tri-thuoc-sinh-hoc', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-03 07:54:15'),
(6, 0, 'Các xét nghiệm hình ảnh học', 'cac-xet-nghiem-hinh-anh-hoc', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '2024-06-05 15:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_providers`
--

CREATE TABLE `oauth_providers` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_providers`
--

INSERT INTO `oauth_providers` (`id`, `name`) VALUES
(1, 'facebook'),
(2, 'google');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `author`, `name`, `alias`, `view`, `thumbnail`, `caption`, `content`, `status`, `created_at`, `title`, `keyword`, `description`) VALUES
(1, 1, 'Chính sách bảo mật', 'chinh-sach-bao-mat', 367, '/source/image4.jpeg', 'Chính sách bảo mậtbb', '<p>Ch&iacute;nh s&aacute;ch bảo mậtbbb</p>', 1, '2023-11-22 19:54:17', 'Chính sách bảo mật', 'Chính sách bảo mậtbb', 'Chính sách bảo mậtbb'),
(2, 1, 'Chính sách bảng quyền', 'chinh-sach-bang-quyen', 361, '/source/dulich1.png', 'Chính sách bảng quyền', '<p>Ch&iacute;nh s&aacute;ch bảng quyền</p>', 1, '2023-11-22 19:55:02', 'Chính sách bảng quyền', 'Chính sách bảng quyền', 'Chính sách bảng quyền'),
(3, 1, 'Chính sách quảng cáo', 'chinh-sach-quang-cao', 461, '/source/image4.jpeg', 'Chính sách quảng cáo', '<p>Ch&iacute;nh s&aacute;ch quảng c&aacute;o</p>', 1, '2023-11-22 19:55:28', 'Chính sách quảng cáo', 'Chính sách quảng cáo', 'Chính sách quảng cáo'),
(4, 1, 'Giới thiệu', 'gioi-thieu', 0, '/source/image4.jpeg', '', '', 1, '2023-11-22 19:55:28', 'Chính sách quảng cáo', 'Chính sách quảng cáo', 'Chính sách quảng cáo');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_patients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `type`, `time`, `available_type`, `number_of_patients`, `location`, `describe`, `created_at`) VALUES
(1, 'Khám NỘI CƠ XƯƠNG KHỚP', '5000000', 'khong co', '120', 'co dinh', '2', 'tp.Hochiminh', 'dsfgshgdfjhfgj', '2024-06-12 23:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `orders` int(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `name`, `caption`, `image`, `orders`, `status`, `created_at`) VALUES
(2, 'slide trang chủ', NULL, NULL, NULL, 1, '2024-06-07 03:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow_slides`
--

CREATE TABLE `slideshow_slides` (
  `id` int(5) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slideshow_id` int(5) DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow_slides`
--

INSERT INTO `slideshow_slides` (`id`, `link`, `slideshow_id`, `url`) VALUES
(7, '', 2, '/source/banner/bg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name`) VALUES
(1, 'Thẩm mỹ da'),
(2, 'Da liễu'),
(3, 'Hình ảnh học can thiệp'),
(4, 'Hậu môn - Trực tràng'),
(5, 'Hen-COPD'),
(6, 'Mắt'),
(7, 'Nam Khoa'),
(8, 'Nội tiết'),
(9, 'Ngoại tim mạch'),
(10, 'Phổi'),
(11, 'Phụ khoa'),
(12, 'Tạo hình - Thẩm mỹ'),
(13, 'Tai mũi họng'),
(14, 'Tiết niệu'),
(15, 'Tiêu hóa - Gan mật'),
(16, 'Tiểu phẫu'),
(17, 'Tim mạch'),
(18, 'Y học gia đình'),
(19, 'Viêm gan');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(2) NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `content`) VALUES
(1, '<p style=\"text-align: justify;\">&bull;&nbsp; C&aacute;c bệnh khớp tho&aacute;i h&oacute;a g&acirc;y đau khớp gối (tho&aacute;i h&oacute;a khớp gối), đau cổ v&agrave; lưng (tho&aacute;i h&oacute;a cột sống),&hellip;</p>\r\n<p style=\"text-align: justify;\">&bull;&nbsp; Bệnh l&yacute; phần mềm v&agrave; rối loạn ngo&agrave;i khớp g&acirc;y đau vai (vi&ecirc;m g&acirc;n cơ ch&oacute;p xoay), đau ng&oacute;n (vi&ecirc;m g&acirc;n gấp ng&oacute;n tay), đau cổ tay (vi&ecirc;m mỏm tr&acirc;m quay), đau khuỷu (vi&ecirc;m lồi cầu c&aacute;nh tay), đau g&oacute;t ch&acirc;n (vi&ecirc;m c&acirc;n gan ch&acirc;n), t&ecirc; tay (hội chứng ống cổ tay), g&acirc;y đau lưng lan ch&acirc;n (đau thần kinh toạ, tho&aacute;t vị đĩa đệm)&nbsp;v&agrave;&nbsp; một số vị tr&iacute; g&acirc;n cơ kh&aacute;c</p>\r\n<p style=\"text-align: justify;\">&bull;&nbsp; C&aacute;c bệnh khớp tự miễn hoặc bệnh tổ chức li&ecirc;n kết g&acirc;y sưng đau v&agrave; biến dạng khớp (vi&ecirc;m khớp dạng thấp), đau khớp, ban da v&agrave; sang thương da (lupus, vi&ecirc;m khớp vảy nến), đau lưng v&agrave; cứng lưng (vi&ecirc;m cột sống d&iacute;nh khớp), đa khớp v&agrave; d&agrave;y cứng da (xơ cứng b&igrave;), đau cơ v&agrave; yếu cơ (vi&ecirc;m đau cơ/vi&ecirc;m da cơ), bệnh still,&hellip;</p>\r\n<p style=\"text-align: justify;\">&bull;&nbsp; C&aacute;c bệnh khớp chuyển h&oacute;a g&acirc;y sưng đau khớp: vi&ecirc;m khớp g&uacute;t, vi&ecirc;m khớp giả g&uacute;t&hellip;</p>\r\n<p style=\"text-align: justify;\">&bull;&nbsp; Lo&atilde;ng xương v&agrave; c&aacute;c biến chứng li&ecirc;n quan</p>\r\n<p style=\"text-align: justify;\">&bull;&nbsp; Tư vấn điều trị tho&aacute;i h&oacute;a khớp v&agrave; vi&ecirc;m g&acirc;n bằng liệu ph&aacute;p hyaludronic acid (chất nhờn), huyết tương gi&agrave;u tiểu cầu (PRP)&hellip;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_year` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(2) NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `working_plan` text COLLATE utf8_unicode_ci,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_verify` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_deletable` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_forgot_at` datetime DEFAULT NULL,
  `last_ip` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `full_name`, `birth_year`, `gender`, `email`, `mobile_no`, `password`, `address`, `working_plan`, `role`, `is_active`, `is_verify`, `is_admin`, `is_visible`, `is_deletable`, `token`, `password_reset_code`, `password_forgot_at`, `last_ip`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, '/source/logo/avatar-01.jpg', 'admin', NULL, 0, 'admin@gmail.com', '0981756679', 'd4bbb3a97066a55da7bc1005809bead9', NULL, '[{\"date\":\"0\",\"start\":null,\"end\":null,\"checked\":0},{\"date\":\"1\",\"start\":\"16:33\",\"end\":\"17:33\",\"checked\":1},{\"date\":\"2\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"3\",\"start\":\"14:33\",\"end\":\"15:33\",\"checked\":1},{\"date\":\"4\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"5\",\"start\":\"12:34\",\"end\":\"13:33\",\"checked\":1},{\"date\":\"6\",\"start\":\"\",\"end\":\"\",\"checked\":0}]', 1, 1, 1, 0, 1, 1, '8722c8f495dcee23f39d5519735e1f71', NULL, NULL, NULL, '2019-12-17 14:47:35', '2018-12-12 09:46:11', '2018-12-12 09:46:11'),
(2, NULL, NULL, 'Nguyễn Văn A', NULL, 0, 'abc@gmail.com', NULL, '$2y$10$dDe0/6sQof6V0IseNLV/.ePQB87zXRSEZhSNgtL/3G8RtCF0JblvO', NULL, '[{\"date\":\"0\",\"start\":null,\"end\":null,\"checked\":0},{\"date\":\"1\",\"start\":\"16:33\",\"end\":\"17:33\",\"checked\":1},{\"date\":\"2\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"3\",\"start\":\"14:33\",\"end\":\"15:33\",\"checked\":1},{\"date\":\"4\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"5\",\"start\":\"12:34\",\"end\":\"13:33\",\"checked\":1},{\"date\":\"6\",\"start\":\"\",\"end\":\"\",\"checked\":0}]', 2, 1, 0, 0, 1, 1, 'ea4b47f29f0030a6162b40662ff91c70', NULL, NULL, NULL, NULL, '2024-06-13 11:00:04', '2024-06-13 11:00:04'),
(3, NULL, NULL, 'Nguyễn Văn B', NULL, 0, 'ac@gmail.com', NULL, '$2y$10$znaDZl2XQgchVfNWyAjXaOYnE2zhe2CXnt6SO5dP8PiJiv1dXj67O', NULL, '[{\"date\":\"0\",\"start\":null,\"end\":null,\"checked\":0},{\"date\":\"1\",\"start\":\"16:33\",\"end\":\"17:33\",\"checked\":1},{\"date\":\"2\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"3\",\"start\":\"14:33\",\"end\":\"15:33\",\"checked\":1},{\"date\":\"4\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"5\",\"start\":\"12:34\",\"end\":\"13:33\",\"checked\":1},{\"date\":\"6\",\"start\":\"\",\"end\":\"\",\"checked\":0}]', 2, 1, 0, 0, 1, 1, 'a209ca7b50dcaab2db7c2d4d1223d4d5', NULL, NULL, NULL, NULL, '2024-06-13 11:13:43', '2024-06-13 11:13:43'),
(4, NULL, NULL, 'Nguyễn Văn C', NULL, 0, 'abn@gmail.com', NULL, '$2y$10$OHFgTvFwzEuMcpoI1O7X1eZqMZHBVfp1MC8pAWG7Bgx3mE54Yd8D6', NULL, '[{\"date\":\"0\",\"start\":null,\"end\":null,\"checked\":0},{\"date\":\"1\",\"start\":\"16:33\",\"end\":\"17:33\",\"checked\":1},{\"date\":\"2\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"3\",\"start\":\"14:33\",\"end\":\"15:33\",\"checked\":1},{\"date\":\"4\",\"start\":\"\",\"end\":\"\",\"checked\":0},{\"date\":\"5\",\"start\":\"12:34\",\"end\":\"13:33\",\"checked\":1},{\"date\":\"6\",\"start\":\"\",\"end\":\"\",\"checked\":0}]', 3, 1, 0, 0, 1, 1, 'f60bb6bb4c96d4df93c51bd69dcc15a0', NULL, NULL, NULL, NULL, '2024-06-13 22:01:56', '2024-06-13 22:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deletable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `status`, `is_deletable`) VALUES
(1, 'Quản trị', 1, 1),
(2, 'Bác sĩ', 1, 1),
(3, 'Thứ ký', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_oauth_provider`
--

CREATE TABLE `user_oauth_provider` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `oauth_provider_id` int(2) UNSIGNED NOT NULL,
  `oauth_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_doctors`
--
ALTER TABLE `info_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow_slides`
--
ALTER TABLE `slideshow_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_oauth_provider`
--
ALTER TABLE `user_oauth_provider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info_doctors`
--
ALTER TABLE `info_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slideshow_slides`
--
ALTER TABLE `slideshow_slides`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_oauth_provider`
--
ALTER TABLE `user_oauth_provider`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
