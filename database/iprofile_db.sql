-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 08:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_iprofile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `book_date` datetime NOT NULL,
  `book_time_start` varchar(100) NOT NULL,
  `book_time_end` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `title`, `book_date`, `book_time_start`, `book_time_end`, `email`, `created_at`) VALUES
(1, 22, 'GET A QUOTE', '2019-12-01 00:00:00', '08:15 PM', '08:15 PM', 'adalcr@gmail.com', '2019-12-19 16:25:37'),
(2, 22, 'Pop', '2019-12-30 00:00:00', '11:45 AM', '11:45 AM', 'tatifo.llc@gmail.com', '2019-12-27 02:55:47'),
(3, 81, 'fgf', '2019-12-30 00:00:00', '06:00 PM', '06:00 PM', 'drdefr@gmail.com', '2019-12-28 15:12:30'),
(4, 81, 'fgf', '2019-12-30 00:00:00', '06:00 PM', '06:00 PM', 'drdefr@gmail.com', '2019-12-28 15:13:22'),
(5, 81, 'fgf', '2019-12-30 00:00:00', '06:00 PM', '06:00 PM', 'drdefr@gmail.com', '2019-12-28 15:13:27'),
(6, 81, 'hnhbm', '2019-12-30 00:00:00', '06:00 PM', '06:00 PM', 'admin@demo.com', '2019-12-28 15:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `appoint_days`
--

CREATE TABLE `appoint_days` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `book_time_start` varchar(100) NOT NULL,
  `book_time_end` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoint_days`
--

INSERT INTO `appoint_days` (`id`, `user_id`, `day`, `book_time_start`, `book_time_end`, `created_at`) VALUES
(1, 30, 1, '10:00 AM', '04:00 PM', '2019-09-20 06:04:59'),
(2, 30, 3, '10:00 AM', '04:00 PM', '2019-09-20 06:04:59'),
(3, 30, 4, '10:00 AM', '04:00 PM', '2019-09-20 06:04:59'),
(4, 30, 5, '10:00 AM', '04:00 PM', '2019-09-20 06:04:59'),
(5, 30, 6, '10:00 AM', '04:00 PM', '2019-09-20 06:04:59'),
(6, 34, 1, '07:00 PM', '07:00 PM', '2019-09-20 09:13:34'),
(7, 34, 4, '07:00 PM', '07:00 PM', '2019-09-20 09:13:34'),
(8, 34, 7, '07:00 PM', '07:00 PM', '2019-09-20 09:13:34'),
(13, 29, 1, '01:30 AM', '01:30 AM', '2019-09-21 03:35:03'),
(14, 29, 2, '01:30 AM', '01:30 AM', '2019-09-21 03:35:03'),
(15, 29, 7, '01:30 AM', '01:30 AM', '2019-09-21 03:35:03'),
(16, 22, 3, '10:45 AM', '07:45 PM', '2019-11-30 11:45:11'),
(17, 22, 4, '10:45 AM', '07:45 PM', '2019-11-30 11:45:11'),
(18, 22, 5, '10:45 AM', '07:45 PM', '2019-11-30 11:45:11'),
(19, 22, 6, '10:45 AM', '07:45 PM', '2019-11-30 11:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fa_class` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `user_id`, `title`, `fa_class`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Microsoft Office', 'fab fa-microsoft', 'I\'m certified with microsift office.\r\nmy grade in Microsoft office test is A.', 0, 1, '2019-09-19 14:10:54', '2019-09-19 14:10:54'),
(2, 29, 'Vector Designer', 'fab fa-adobe', 'I got best performance certificate in Adobe illustrator.\r\nI\'m certified with Adobe Illustrator.', 0, 1, '2019-09-19 14:13:25', '2019-09-19 14:13:25'),
(3, 29, 'HTML', 'fab fa-html5', 'I won the HTML compitaipn at Province level.\r\nI\'m the Professional Web Designer (Front End).', 0, 1, '2019-09-19 14:15:12', '2019-09-19 14:15:12'),
(4, 22, 'BVC', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 1, '2019-09-20 09:35:21', '2019-09-20 09:35:21'),
(5, 22, 'HGJ', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:36:24', '2019-09-20 09:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `url`, `slug`, `tags`, `cat_id`, `image`, `thumb`, `description`, `status`, `created_date`, `updated_date`) VALUES
(1, 30, 'Digital Art Is The Only Serious Thing In The World', '', '', '1', 1, 'uploads/images/medium/post_1_30__medium.jpg', 'uploads/images/thumbnail/post_1_30__thumb.jpg', '<p></p><p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\n</p><p></p>', 1, '2019-09-20 05:46:45', '2019-09-20 05:49:15'),
(2, 30, 'The Artist Is The Only Person Who Is Never Serious', '', '', '', 1, 'uploads/images/medium/post_2_30__medium.jpg', 'uploads/images/thumbnail/post_2_30__thumb.jpg', '<p>\r\n\r\nFar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\n<br></p>', 1, '2019-09-20 05:52:24', '2019-09-20 05:52:24'),
(3, 34, 'cooking', '', '', '', 2, 'uploads/images/medium/post_3_34__medium.jpg', 'uploads/images/thumbnail/post_3_34__thumb.jpg', '', 1, '2019-09-20 09:12:09', '2019-09-20 09:18:59'),
(4, 34, 'cooking', '', '', '', 2, 'uploads/images/medium/post_4_34__medium.jpg', 'uploads/images/thumbnail/post_4_34__thumb.jpg', '', 1, '2019-09-20 09:12:33', '2019-09-20 09:21:54'),
(5, 22, 'BVC', '', '', '1', 3, 'uploads/images/medium/post_5_22__medium.jpg', 'uploads/images/thumbnail/post_5_22__thumb.jpg', '<p>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n<br></p><p>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n\r\n<br></p>', 1, '2019-09-20 09:33:41', '2019-11-29 03:15:06'),
(6, 22, 'HVAC TECHNICIAN', '', '', '2', 3, 'uploads/images/medium/post_6_22__medium.jpg', 'uploads/images/thumbnail/post_6_22__thumb.jpg', '<p>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n\r\n<br></p>', 1, '2019-09-20 09:34:17', '2019-09-20 09:34:17'),
(7, 29, 'Be a Good Programmer', '', '', 'progammer', 4, 'uploads/images/medium/post_7_29__medium.jpg', 'uploads/images/thumbnail/post_7_29__thumb.jpg', '<p>\r\n\r\n</p><p>In a study of 469 business units ranging from retail stores to large manufacturing facilities, Gallup found that units with managers who received strengths feedback showed 8.9% greater profitability post-intervention relative to units in which the manager received no feedback.</p><p>In short, employees who are given effective, positive feedback regularly are more engaged, productive, stay longer with the company and show greater profitability. </p>\r\n\r\n<br><p></p>', 1, '2019-09-21 02:57:45', '2019-09-21 02:57:45'),
(8, 29, 'Corel Draw Vector Designer', '', '', 'Vectoe,Designer,Corel draw', 5, 'uploads/images/medium/post_8_29__medium.jpg', 'uploads/images/thumbnail/post_8_29__thumb.jpg', '<p>\r\n\r\n</p><p>Most people think that giving positive feedback is simple. However, simply saying “Well done” or “Great job!” isn’t enough if you want to give a meaningful, productive feedback that will really stick with your employees and reinforce their positive behavior.</p><p>If you want your employees to learn and grow from your positive feedback, you should make sure that your feedback is always:</p>\r\n\r\n<br><p></p>', 1, '2019-09-21 03:00:57', '2019-09-21 03:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `user_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 30, 'Technology', 1, '2019-09-20 05:21:22', '2019-09-20 05:21:22'),
(2, 34, 'cooking', 1, '2019-09-20 09:10:59', '2019-09-20 09:10:59'),
(3, 22, 'Technology', 1, '2019-09-20 09:32:49', '2019-09-20 09:32:49'),
(4, 29, 'Coder', 1, '2019-09-21 02:54:55', '2019-09-21 02:54:55'),
(5, 29, 'Designer', 1, '2019-09-21 02:58:33', '2019-09-21 02:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `client_name`, `url`, `image`, `thumb`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Human Rights', 'www.humanrights.com', 'uploads/images/medium/client_1_29__medium.jpg', 'uploads/images/thumbnail/client_1_29__thumb.jpg', 1, '2019-09-19 14:21:20', '2019-09-21 03:27:35'),
(4, 29, 'Bootstrap', 'www.bootstrap.com', 'uploads/images/medium/client_4_29__medium.png', 'uploads/images/thumbnail/client_4_29__thumb.png', 1, '2019-09-21 03:34:03', '2019-09-21 03:34:03'),
(5, 22, 'Java', 'http://www.google.com', 'uploads/images/medium/client_5_22__medium.jpg', 'uploads/images/thumbnail/client_5_22__thumb.jpg', 1, '2019-11-13 10:04:43', '2019-11-13 10:06:10'),
(6, 22, 'asdf', 'laravel.com', 'uploads/images/medium/client_6_22__medium.jpg', 'uploads/images/thumbnail/client_6_22__thumb.jpg', 1, '2019-11-13 10:07:02', '2019-11-13 10:07:03'),
(7, 22, 'what', 'asdf', 'uploads/images/medium/client_7_22__medium.jpg', 'uploads/images/thumbnail/client_7_22__thumb.jpg', 1, '2019-11-13 10:07:55', '2019-11-13 10:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `created_date`, `updated_date`) VALUES
(1, 4, 'Hello Admin', 'hello@gmail.com', 'This is test for Admin', 'lkasdlf asdlfkja sdklfjasldfjasdf\nasdfjlakdfkajsfklajdf\na dfjlasdfj', '2019-11-12 16:50:31', '2019-11-12 16:50:31'),
(3, 22, 'Ali butt', 'zee@gmail.com', 'another', 'askdfhaldf alsdjflakdfjl adjflkasjdflkjasdf\nasdfklj afalsdfj ds\nf sdjflskjdflksjdlf jaf sldfjlskdjflskj flksjdlfkjsldfjslfjlf', '2019-11-12 16:51:47', '2019-11-12 16:51:47'),
(4, 4, 'Hamza', 'h@gmail.com', 'fake msg', 'asldlasjd flskdjflskjdfl sjdflj\nsdfsjdflksjdlfjsldfj\ns', '2019-11-12 16:52:21', '2019-11-12 16:52:21'),
(5, 22, 'Meer Ali', 'ali@gmail.com', 'new subject', 'askdfhaldf alsdjflakdfjl adjflka', '2019-11-12 17:23:10', '2019-11-12 17:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL DEFAULT 0,
  `sortname` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES
(1, 'AF', 'Afghanistan', 'afghanistan', 93, 1),
(2, 'AL', 'Albania', 'albania', 355, 1),
(3, 'DZ', 'Algeria', 'algeria', 213, 1),
(4, 'AS', 'American Samoa', 'american-samoa', 1684, 1),
(5, 'AD', 'Andorra', 'andorra', 376, 1),
(6, 'AO', 'Angola', 'angola', 244, 1),
(7, 'AI', 'Anguilla', 'anguilla', 1264, 1),
(8, 'AQ', 'Antarctica', 'antarctica', 0, 1),
(9, 'AG', 'Antigua And Barbuda', 'antigua-and-barbuda', 1268, 1),
(10, 'AR', 'Argentina', 'argentina', 54, 1),
(11, 'AM', 'Armenia', 'armenia', 374, 1),
(12, 'AW', 'Aruba', 'aruba', 297, 1),
(13, 'AU', 'Australia', 'australia', 61, 1),
(14, 'AT', 'Austria', 'austria', 43, 1),
(15, 'AZ', 'Azerbaijan', 'azerbaijan', 994, 1),
(16, 'BS', 'Bahamas The', 'bahamas-the', 1242, 1),
(17, 'BH', 'Bahrain', 'bahrain', 973, 1),
(18, 'BD', 'Bangladesh', 'bangladesh', 880, 1),
(19, 'BB', 'Barbados', 'barbados', 1246, 1),
(20, 'BY', 'Belarus', 'belarus', 375, 1),
(21, 'BE', 'Belgium', 'belgium', 32, 1),
(22, 'BZ', 'Belize', 'belize', 501, 1),
(23, 'BJ', 'Benin', 'benin', 229, 1),
(24, 'BM', 'Bermuda', 'bermuda', 1441, 1),
(25, 'BT', 'Bhutan', 'bhutan', 975, 1),
(26, 'BO', 'Bolivia', 'bolivia', 591, 1),
(27, 'BA', 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 387, 1),
(28, 'BW', 'Botswana', 'botswana', 267, 1),
(29, 'BV', 'Bouvet Island', 'bouvet-island', 0, 1),
(30, 'BR', 'Brazil', 'brazil', 55, 1),
(31, 'IO', 'British Indian Ocean Territory', 'british-indian-ocean-territory', 246, 1),
(32, 'BN', 'Brunei', 'brunei', 673, 1),
(33, 'BG', 'Bulgaria', 'bulgaria', 359, 1),
(34, 'BF', 'Burkina Faso', 'burkina-faso', 226, 1),
(35, 'BI', 'Burundi', 'burundi', 257, 1),
(36, 'KH', 'Cambodia', 'cambodia', 855, 1),
(37, 'CM', 'Cameroon', 'cameroon', 237, 1),
(38, 'CA', 'Canada', 'canada', 1, 1),
(39, 'CV', 'Cape Verde', 'cape-verde', 238, 1),
(40, 'KY', 'Cayman Islands', 'cayman-islands', 1345, 1),
(41, 'CF', 'Central African Republic', 'central-african-republic', 236, 1),
(42, 'TD', 'Chad', 'chad', 235, 1),
(43, 'CL', 'Chile', 'chile', 56, 1),
(44, 'CN', 'China', 'china', 86, 1),
(45, 'CX', 'Christmas Island', 'christmas-island', 61, 1),
(46, 'CC', 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 672, 1),
(47, 'CO', 'Colombia', 'colombia', 57, 1),
(48, 'KM', 'Comoros', 'comoros', 269, 1),
(49, 'CG', 'Republic Of The Congo', 'republic-of-the-congo', 242, 1),
(50, 'CD', 'Democratic Republic Of The Congo', 'democratic-republic-of-the-congo', 242, 1),
(51, 'CK', 'Cook Islands', 'cook-islands', 682, 1),
(52, 'CR', 'Costa Rica', 'costa-rica', 506, 1),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 'cote-divoire-ivory-coast', 225, 1),
(54, 'HR', 'Croatia (Hrvatska)', 'croatia-hrvatska', 385, 1),
(55, 'CU', 'Cuba', 'cuba', 53, 1),
(56, 'CY', 'Cyprus', 'cyprus', 357, 1),
(57, 'CZ', 'Czech Republic', 'czech-republic', 420, 1),
(58, 'DK', 'Denmark', 'denmark', 45, 1),
(59, 'DJ', 'Djibouti', 'djibouti', 253, 1),
(60, 'DM', 'Dominica', 'dominica', 1767, 1),
(61, 'DO', 'Dominican Republic', 'dominican-republic', 1809, 1),
(62, 'TP', 'East Timor', 'east-timor', 670, 1),
(63, 'EC', 'Ecuador', 'ecuador', 593, 1),
(64, 'EG', 'Egypt', 'egypt', 20, 1),
(65, 'SV', 'El Salvador', 'el-salvador', 503, 1),
(66, 'GQ', 'Equatorial Guinea', 'equatorial-guinea', 240, 1),
(67, 'ER', 'Eritrea', 'eritrea', 291, 1),
(68, 'EE', 'Estonia', 'estonia', 372, 1),
(69, 'ET', 'Ethiopia', 'ethiopia', 251, 1),
(70, 'XA', 'External Territories of Australia', 'external-territories-of-australia', 61, 1),
(71, 'FK', 'Falkland Islands', 'falkland-islands', 500, 1),
(72, 'FO', 'Faroe Islands', 'faroe-islands', 298, 1),
(73, 'FJ', 'Fiji Islands', 'fiji-islands', 679, 1),
(74, 'FI', 'Finland', 'finland', 358, 1),
(75, 'FR', 'France', 'france', 33, 1),
(76, 'GF', 'French Guiana', 'french-guiana', 594, 1),
(77, 'PF', 'French Polynesia', 'french-polynesia', 689, 1),
(78, 'TF', 'French Southern Territories', 'french-southern-territories', 0, 1),
(79, 'GA', 'Gabon', 'gabon', 241, 1),
(80, 'GM', 'Gambia The', 'gambia-the', 220, 1),
(81, 'GE', 'Georgia', 'georgia', 995, 1),
(82, 'DE', 'Germany', 'germany', 49, 1),
(83, 'GH', 'Ghana', 'ghana', 233, 1),
(84, 'GI', 'Gibraltar', 'gibraltar', 350, 1),
(85, 'GR', 'Greece', 'greece', 30, 1),
(86, 'GL', 'Greenland', 'greenland', 299, 1),
(87, 'GD', 'Grenada', 'grenada', 1473, 1),
(88, 'GP', 'Guadeloupe', 'guadeloupe', 590, 1),
(89, 'GU', 'Guam', 'guam', 1671, 1),
(90, 'GT', 'Guatemala', 'guatemala', 502, 1),
(91, 'XU', 'Guernsey and Alderney', 'guernsey-and-alderney', 44, 1),
(92, 'GN', 'Guinea', 'guinea', 224, 1),
(93, 'GW', 'Guinea-Bissau', 'guineabissau', 245, 1),
(94, 'GY', 'Guyana', 'guyana', 592, 1),
(95, 'HT', 'Haiti', 'haiti', 509, 1),
(96, 'HM', 'Heard and McDonald Islands', 'heard-and-mcdonald-islands', 0, 1),
(97, 'HN', 'Honduras', 'honduras', 504, 1),
(98, 'HK', 'Hong Kong S.A.R.', 'hong-kong-sar', 852, 1),
(99, 'HU', 'Hungary', 'hungary', 36, 1),
(100, 'IS', 'Iceland', 'iceland', 354, 1),
(101, 'IN', 'India', 'india', 91, 1),
(102, 'ID', 'Indonesia', 'indonesia', 62, 1),
(103, 'IR', 'Iran', 'iran', 98, 1),
(104, 'IQ', 'Iraq', 'iraq', 964, 1),
(105, 'IE', 'Ireland', 'ireland', 353, 1),
(106, 'IL', 'Israel', 'israel', 972, 1),
(107, 'IT', 'Italy', 'italy', 39, 1),
(108, 'JM', 'Jamaica', 'jamaica', 1876, 1),
(109, 'JP', 'Japan', 'japan', 81, 1),
(110, 'XJ', 'Jersey', 'jersey', 44, 1),
(111, 'JO', 'Jordan', 'jordan', 962, 1),
(112, 'KZ', 'Kazakhstan', 'kazakhstan', 7, 1),
(113, 'KE', 'Kenya', 'kenya', 254, 1),
(114, 'KI', 'Kiribati', 'kiribati', 686, 1),
(115, 'KP', 'Korea North', 'korea-north', 850, 1),
(116, 'KR', 'Korea South', 'korea-south', 82, 1),
(117, 'KW', 'Kuwait', 'kuwait', 965, 1),
(118, 'KG', 'Kyrgyzstan', 'kyrgyzstan', 996, 1),
(119, 'LA', 'Laos', 'laos', 856, 1),
(120, 'LV', 'Latvia', 'latvia', 371, 1),
(121, 'LB', 'Lebanon', 'lebanon', 961, 1),
(122, 'LS', 'Lesotho', 'lesotho', 266, 1),
(123, 'LR', 'Liberia', 'liberia', 231, 1),
(124, 'LY', 'Libya', 'libya', 218, 1),
(125, 'LI', 'Liechtenstein', 'liechtenstein', 423, 1),
(126, 'LT', 'Lithuania', 'lithuania', 370, 1),
(127, 'LU', 'Luxembourg', 'luxembourg', 352, 1),
(128, 'MO', 'Macau S.A.R.', 'macau-sar', 853, 1),
(129, 'MK', 'Macedonia', 'macedonia', 389, 1),
(130, 'MG', 'Madagascar', 'madagascar', 261, 1),
(131, 'MW', 'Malawi', 'malawi', 265, 1),
(132, 'MY', 'Malaysia', 'malaysia', 60, 1),
(133, 'MV', 'Maldives', 'maldives', 960, 1),
(134, 'ML', 'Mali', 'mali', 223, 1),
(135, 'MT', 'Malta', 'malta', 356, 1),
(136, 'XM', 'Man (Isle of)', 'man-isle-of', 44, 1),
(137, 'MH', 'Marshall Islands', 'marshall-islands', 692, 1),
(138, 'MQ', 'Martinique', 'martinique', 596, 1),
(139, 'MR', 'Mauritania', 'mauritania', 222, 1),
(140, 'MU', 'Mauritius', 'mauritius', 230, 1),
(141, 'YT', 'Mayotte', 'mayotte', 269, 1),
(142, 'MX', 'Mexico', 'mexico', 52, 1),
(143, 'FM', 'Micronesia', 'micronesia', 691, 1),
(144, 'MD', 'Moldova', 'moldova', 373, 1),
(145, 'MC', 'Monaco', 'monaco', 377, 1),
(146, 'MN', 'Mongolia', 'mongolia', 976, 1),
(147, 'MS', 'Montserrat', 'montserrat', 1664, 1),
(148, 'MA', 'Morocco', 'morocco', 212, 1),
(149, 'MZ', 'Mozambique', 'mozambique', 258, 1),
(150, 'MM', 'Myanmar', 'myanmar', 95, 1),
(151, 'NA', 'Namibia', 'namibia', 264, 1),
(152, 'NR', 'Nauru', 'nauru', 674, 1),
(153, 'NP', 'Nepal', 'nepal', 977, 1),
(154, 'AN', 'Netherlands Antilles', 'netherlands-antilles', 599, 1),
(155, 'NL', 'Netherlands The', 'netherlands-the', 31, 1),
(156, 'NC', 'New Caledonia', 'new-caledonia', 687, 1),
(157, 'NZ', 'New Zealand', 'new-zealand', 64, 1),
(158, 'NI', 'Nicaragua', 'nicaragua', 505, 1),
(159, 'NE', 'Niger', 'niger', 227, 1),
(160, 'NG', 'Nigeria', 'nigeria', 234, 1),
(161, 'NU', 'Niue', 'niue', 683, 1),
(162, 'NF', 'Norfolk Island', 'norfolk-island', 672, 1),
(163, 'MP', 'Northern Mariana Islands', 'northern-mariana-islands', 1670, 1),
(164, 'NO', 'Norway', 'norway', 47, 1),
(165, 'OM', 'Oman', 'oman', 968, 1),
(166, 'PK', 'Pakistan', 'pakistan', 92, 1),
(167, 'PW', 'Palau', 'palau', 680, 1),
(168, 'PS', 'Palestinian Territory Occupied', 'palestinian-territory-occupied', 970, 1),
(169, 'PA', 'Panama', 'panama', 507, 1),
(170, 'PG', 'Papua new Guinea', 'papua-new-guinea', 675, 1),
(171, 'PY', 'Paraguay', 'paraguay', 595, 1),
(172, 'PE', 'Peru', 'peru', 51, 1),
(173, 'PH', 'Philippines', 'philippines', 63, 1),
(174, 'PN', 'Pitcairn Island', 'pitcairn-island', 0, 1),
(175, 'PL', 'Poland', 'poland', 48, 1),
(176, 'PT', 'Portugal', 'portugal', 351, 1),
(177, 'PR', 'Puerto Rico', 'puerto-rico', 1787, 1),
(178, 'QA', 'Qatar', 'qatar', 974, 1),
(179, 'RE', 'Reunion', 'reunion', 262, 1),
(180, 'RO', 'Romania', 'romania', 40, 1),
(181, 'RU', 'Russia', 'russia', 70, 1),
(182, 'RW', 'Rwanda', 'rwanda', 250, 1),
(183, 'SH', 'Saint Helena', 'saint-helena', 290, 1),
(184, 'KN', 'Saint Kitts And Nevis', 'saint-kitts-and-nevis', 1869, 1),
(185, 'LC', 'Saint Lucia', 'saint-lucia', 1758, 1),
(186, 'PM', 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon', 508, 1),
(187, 'VC', 'Saint Vincent And The Grenadines', 'saint-vincent-and-the-grenadines', 1784, 1),
(188, 'WS', 'Samoa', 'samoa', 684, 1),
(189, 'SM', 'San Marino', 'san-marino', 378, 1),
(190, 'ST', 'Sao Tome and Principe', 'sao-tome-and-principe', 239, 1),
(191, 'SA', 'Saudi Arabia', 'saudi-arabia', 966, 1),
(192, 'SN', 'Senegal', 'senegal', 221, 1),
(193, 'RS', 'Serbia', 'serbia', 381, 1),
(194, 'SC', 'Seychelles', 'seychelles', 248, 1),
(195, 'SL', 'Sierra Leone', 'sierra-leone', 232, 1),
(196, 'SG', 'Singapore', 'singapore', 65, 1),
(197, 'SK', 'Slovakia', 'slovakia', 421, 1),
(198, 'SI', 'Slovenia', 'slovenia', 386, 1),
(199, 'XG', 'Smaller Territories of the UK', 'smaller-territories-of-the-uk', 44, 1),
(200, 'SB', 'Solomon Islands', 'solomon-islands', 677, 1),
(201, 'SO', 'Somalia', 'somalia', 252, 1),
(202, 'ZA', 'South Africa', 'south-africa', 27, 1),
(203, 'GS', 'South Georgia', 'south-georgia', 0, 1),
(204, 'SS', 'South Sudan', 'south-sudan', 211, 1),
(205, 'ES', 'Spain', 'spain', 34, 1),
(206, 'LK', 'Sri Lanka', 'sri-lanka', 94, 1),
(207, 'SD', 'Sudan', 'sudan', 249, 1),
(208, 'SR', 'Suriname', 'suriname', 597, 1),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 'svalbard-and-jan-mayen-islands', 47, 1),
(210, 'SZ', 'Swaziland', 'swaziland', 268, 1),
(211, 'SE', 'Sweden', 'sweden', 46, 1),
(212, 'CH', 'Switzerland', 'switzerland', 41, 1),
(213, 'SY', 'Syria', 'syria', 963, 1),
(214, 'TW', 'Taiwan', 'taiwan', 886, 1),
(215, 'TJ', 'Tajikistan', 'tajikistan', 992, 1),
(216, 'TZ', 'Tanzania', 'tanzania', 255, 1),
(217, 'TH', 'Thailand', 'thailand', 66, 1),
(218, 'TG', 'Togo', 'togo', 228, 1),
(219, 'TK', 'Tokelau', 'tokelau', 690, 1),
(220, 'TO', 'Tonga', 'tonga', 676, 1),
(221, 'TT', 'Trinidad And Tobago', 'trinidad-and-tobago', 1868, 1),
(222, 'TN', 'Tunisia', 'tunisia', 216, 1),
(223, 'TR', 'Turkey', 'turkey', 90, 1),
(224, 'TM', 'Turkmenistan', 'turkmenistan', 7370, 1),
(225, 'TC', 'Turks And Caicos Islands', 'turks-and-caicos-islands', 1649, 1),
(226, 'TV', 'Tuvalu', 'tuvalu', 688, 1),
(227, 'UG', 'Uganda', 'uganda', 256, 1),
(228, 'UA', 'Ukraine', 'ukraine', 380, 1),
(229, 'AE', 'United Arab Emirates', 'united-arab-emirates', 971, 1),
(230, 'GB', 'United Kingdom', 'united-kingdom', 44, 1),
(231, 'US', 'United States', 'united-states', 1, 1),
(232, 'UM', 'United States Minor Outlying Islands', 'united-states-minor-outlying-islands', 1, 1),
(233, 'UY', 'Uruguay', 'uruguay', 598, 1),
(234, 'UZ', 'Uzbekistan', 'uzbekistan', 998, 1),
(235, 'VU', 'Vanuatu', 'vanuatu', 678, 1),
(236, 'VA', 'Vatican City State (Holy See)', 'vatican-city-state-holy-see', 39, 1),
(237, 'VE', 'Venezuela', 'venezuela', 58, 1),
(238, 'VN', 'Vietnam', 'vietnam', 84, 1),
(239, 'VG', 'Virgin Islands (British)', 'virgin-islands-british', 1284, 1),
(240, 'VI', 'Virgin Islands (US)', 'virgin-islands-us', 1340, 1),
(241, 'WF', 'Wallis And Futuna Islands', 'wallis-and-futuna-islands', 681, 1),
(242, 'EH', 'Western Sahara', 'western-sahara', 212, 1),
(243, 'YE', 'Yemen', 'yemen', 967, 1),
(244, 'YU', 'Yugoslavia', 'yugoslavia', 38, 1),
(245, 'ZM', 'Zambia', 'zambia', 260, 1),
(246, 'ZW', 'Zimbabwe', 'zimbabwe', 263, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `degree_name`, `institution_name`, `from_date`, `to_date`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Matriculation', 'Govt. Municipal model high school Gujrat', '2013-02-01', '2015-02-01', 'I had passed Matriculation in science in Biology.\r\nI got 1st division in Matriculation.', 0, 1, '2019-09-19 13:48:21', '2019-09-19 13:48:21'),
(2, 29, 'Intermediate in Engineering', 'Punjab Group of colleges gujrat (PGC)', '2015-03-01', '2017-03-01', 'I had passed Intermediate in Fsc Pre Engineering.\r\nI got Seconf division in Gujranwala board.\r\n', 0, 1, '2019-09-19 13:51:13', '2019-09-19 13:51:13'),
(3, 29, 'BS (Hons)', 'University of Gujrat (U.O.G)', '2017-09-18', '0000-00-00', 'Now I\'m studing in university of gujrat in Information Technology.\r\n', 0, 1, '2019-09-19 13:53:49', '2019-09-19 13:53:49'),
(4, 30, 'Information Technology', 'University of Gujrat', '2017-09-03', '0000-00-00', 'Information technology (IT) is the use of computers to store, retrieve, transmit, and manipulate data, or information, often in the context of a business or other enterprise. IT is considered to be a subset of information and communications technology (ICT).', 1, 1, '2019-09-20 05:58:42', '2019-09-20 05:58:42'),
(5, 30, 'Computer Science', 'University of Gujrat', '2019-09-28', '2015-06-30', 'Computer science (sometimes called computation science or computing science, but not to be confused with computational science or software engineering) is the study of processes that interact with data and that can be represented as data in the form of programs. ', 2, 1, '2019-09-20 06:01:50', '2019-09-20 06:03:17'),
(6, 34, 'software engineering', 'uog', '2017-09-17', '2021-09-17', 'software engineering', 0, 1, '2019-09-20 09:08:51', '2019-09-20 09:08:51'),
(7, 34, 'software eng', 'uog', '2017-09-03', '2017-09-03', 'software eng', 0, 1, '2019-09-20 09:10:16', '2019-09-20 09:10:16'),
(8, 22, 'Computer Science', 'University of Lahore', '2012-03-04', '2014-04-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 1, '2019-09-20 09:10:55', '2019-09-20 09:10:55'),
(9, 22, 'Information Technology', 'University of Gujrat', '2013-04-05', '2012-03-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:12:30', '2019-09-20 09:12:30'),
(10, 22, 'MBA', 'PES', '2003-01-21', '2005-05-12', '', 0, 1, '2019-12-07 23:59:08', '2019-12-07 23:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `job_title`, `company_name`, `from_date`, `to_date`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Developer', 'Ozient Software and Technologies', '2019-05-01', '0000-00-00', 'I\'m front-end website designer. ', 25, 1, '2019-09-19 03:06:34', '2019-09-19 03:06:34'),
(2, 29, 'Logo Maker', 'Logo Architecture', '2018-04-01', '2018-07-01', 'I\'m professionaly user in Corel draw.', 30, 1, '2019-09-19 03:08:11', '2019-09-19 03:08:11'),
(3, 29, 'Designer', 'Office Designer', '2018-07-05', '2019-01-01', 'Working in Microsoft Office ', 50, 1, '2019-09-19 03:10:21', '2019-09-19 03:10:21'),
(4, 22, 'Website Developer', 'ABC', '2016-05-06', '2014-03-04', 'test experience added', 1, 1, '2019-09-20 09:09:10', '2019-11-12 22:10:27'),
(5, 22, 'Senior Accountant', 'ABC', '2013-03-05', '2018-04-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:09:48', '2019-09-20 09:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `controller` varchar(250) NOT NULL,
  `fa_class` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT -1,
  `display` tinyint(4) NOT NULL DEFAULT 1,
  `pricing_display` tinyint(4) NOT NULL DEFAULT 1,
  `is_profile_item` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Public profile page item?',
  `form_field_name` varchar(50) DEFAULT NULL COMMENT 'form field name in "users" table, for ON/OFF at profile page',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `controller`, `fa_class`, `description`, `sort_order`, `display`, `pricing_display`, `is_profile_item`, `form_field_name`, `created_date`, `updated_date`) VALUES
(1, 'Profile', 'user/profile', 'fa-paypal', 'user profile', 1, 1, 1, 0, NULL, '2019-08-22 20:08:37', '2019-09-16 06:18:01'),
(2, 'Education', 'user/education', 'fa-book', 'user education details', 4, 1, 1, 1, 'is_education', '2019-08-22 20:09:26', '2019-09-18 12:43:33'),
(3, 'Experience', 'user/experience', 'fa-briefcase', 'user experience details', 3, 1, 1, 1, 'is_experience', '2019-08-22 20:09:58', '2019-09-18 12:43:35'),
(5, 'Skills', 'user/skills', 'fa-cogs', 'user skills', 5, 1, 1, 1, 'is_skill', '2019-08-24 13:19:58', '2019-09-18 12:43:37'),
(6, 'Services', 'user/services', 'fa-cog', 'user services', 6, 1, 1, 1, 'is_service', '2019-08-24 13:20:34', '2019-09-18 12:43:39'),
(7, 'Portfolio', 'user/portfolio', 'fa-address-card', 'user portfolio', 7, 1, 1, 1, 'is_portfolio', '2019-08-24 13:22:28', '2019-09-18 12:43:41'),
(8, 'Blog', 'user/blog', 'fa-comment', 'user blog', 10, 1, 1, 1, 'is_blog', '2019-08-24 13:23:15', '2019-09-18 12:43:43'),
(9, 'Testimonials', 'user/testimonials', 'fa-comments-o', 'user testimonials', 12, 1, 1, 1, 'is_testimonial', '2019-08-24 13:23:54', '2019-09-18 12:43:51'),
(10, 'Appointments', 'user/appointment', 'fa-calendar', 'user appointments', 14, 1, 1, 1, 'is_app', '2019-08-24 13:24:32', '2019-09-18 14:25:32'),
(11, 'Contact Messages', 'user/contact', 'fa-envelope', 'user contact form', 16, 1, 1, 0, NULL, '2019-08-24 13:25:10', '2019-09-15 06:51:50'),
(12, 'Change Password', 'auth/change_password', 'fa-lock', 'user change password', 17, 0, 1, 0, NULL, '2019-08-24 13:25:55', '2019-09-15 06:52:11'),
(14, 'Logout', 'auth/logout', 'fa-circle-o text-danger', 'user logout', 18, 0, 1, 0, NULL, '2019-08-24 17:36:59', '2019-09-15 06:52:21'),
(15, 'My Packages', 'user/packages', 'fa-gift', 'user package info', 17, 1, 1, 0, NULL, '2019-08-30 21:30:15', '2019-09-16 06:14:44'),
(16, 'Awards', 'user/award', 'fa-trophy', 'user awards', 9, 1, 1, 1, 'is_award', '2019-09-03 17:21:17', '2019-09-18 12:43:54'),
(17, 'References', 'user/reference', 'fa-id-badge', 'user references', 13, 1, 1, 1, 'is_reference', '2019-09-03 19:32:22', '2019-09-18 12:43:56'),
(18, 'Interests', 'user/interest', 'fa-heart', 'user interests', 8, 1, 1, 1, 'is_interest', '2019-09-03 20:10:13', '2019-09-18 12:43:58'),
(19, 'Languages', 'user/language', 'fa-language', 'user languages', 9, 1, 1, 1, 'is_language', '2019-09-03 20:40:36', '2019-09-18 12:44:00'),
(20, 'Clients', 'user/clients', 'fa-users', 'user clients', 11, 1, 1, 1, 'is_client', '2019-09-03 21:00:58', '2019-09-18 12:44:02'),
(21, 'Layouts', 'user/layouts', 'fa-columns', 'user public profile layouts', 2, 1, 1, 0, NULL, '2019-09-09 22:14:22', '2019-09-16 06:05:43'),
(22, 'Payments', 'user/packages/payments', 'fa-dollar', 'user pyaments info', 17, 1, 1, 0, NULL, '2019-09-15 18:58:35', '2019-09-16 06:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fa_class` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `user_id`, `title`, `fa_class`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Gaming', 'fab fa-xbox', 'My hobby is gaming I\'m professional gamer.\r\nI won the PUBG tournament in my university.', 0, 1, '2019-09-19 14:00:42', '2019-09-19 14:03:03'),
(2, 29, 'Traveling', 'fas fa-plane-departure', 'I\'m also a traveler.\r\nI want to explore the world.', 0, 1, '2019-09-19 14:04:59', '2019-09-19 14:04:59'),
(3, 29, 'Photographer', 'fas fa-camera', 'I want to do some Photoshot.', 0, 1, '2019-09-19 14:05:59', '2019-09-19 14:05:59'),
(4, 29, 'History', 'fas fa-mosque', 'I\'m intersted in History books Reading.', 0, 1, '2019-09-19 14:08:39', '2019-09-19 14:08:39'),
(5, 22, 'BIM Modeller-Electrical', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 1, '2019-09-20 09:29:08', '2019-09-20 09:29:08'),
(6, 22, 'HVAC TECHNICIAN', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:29:32', '2019-09-20 09:29:32'),
(7, 22, 'BVC', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:32:13', '2019-09-20 09:32:13'),
(8, 22, 'HGJ', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 4, 1, '2019-09-20 09:32:32', '2019-09-20 09:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `user_id`, `title`, `level`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'English', 80, 0, 1, '2019-09-19 14:16:09', '2019-09-19 14:16:09'),
(2, 29, 'Urdu', 100, 0, 1, '2019-09-19 14:16:23', '2019-09-19 14:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'F' COMMENT 'F = Free, P = Paid',
  `thumb` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `name`, `type`, `thumb`, `created_date`, `updated_date`) VALUES
(2, 'Stylish (Premium)', 'P', 'uploads/images/thumbnail/profile_layout_2.png', '2019-09-11 18:32:25', '2019-09-15 04:42:43'),
(3, 'Default (Free)', 'F', 'uploads/images/thumbnail/profile_layout_3.png', '2019-09-13 19:15:18', '2019-09-15 04:42:22'),
(4, 'Go Green (Premium)', 'P', 'uploads/images/thumbnail/profile_layout_4.png', '2019-09-14 19:42:33', '2019-09-15 04:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` char(1) NOT NULL COMMENT 'F=Free, M=Monthly, Y=Yearly',
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `num_days` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `type`, `price`, `image`, `thumb`, `num_days`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 'Free.', 'F', 0, 'uploads/images/medium/package_1_4__medium.jpg', 'uploads/images/thumbnail/package_1_4__thumb.jpg', 0, 1, '2019-08-23 22:32:33', '2020-03-24 20:33:22'),
(2, 'Silver', 'M', 100, 'uploads/images/medium/package_2_4__medium.jpg', 'uploads/images/thumbnail/package_2_4__thumb.jpg', 30, 1, '2019-08-23 22:33:05', '2019-11-09 11:55:57'),
(3, 'Gold', 'Y', 115, 'uploads/images/medium/package_3_4__medium.jpg', 'uploads/images/thumbnail/package_3_4__thumb.jpg', 365, 1, '2019-08-23 22:33:40', '2019-12-27 09:44:35'),
(29, 'Platinum', 'Y', 150, 'uploads/images/medium/package_29_4__medium.jpg', 'uploads/images/thumbnail/package_29_4__thumb.jpg', 365, 1, '2020-01-21 11:20:51', '2020-01-21 06:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `package_features`
--

CREATE TABLE `package_features` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_features`
--

INSERT INTO `package_features` (`id`, `package_id`, `feature_id`, `created_date`) VALUES
(346, 2, 1, '2019-11-09 16:58:37'),
(347, 2, 21, '2019-11-09 16:58:37'),
(348, 2, 3, '2019-11-09 16:58:37'),
(349, 2, 2, '2019-11-09 16:58:37'),
(350, 2, 5, '2019-11-09 16:58:37'),
(351, 2, 6, '2019-11-09 16:58:37'),
(352, 2, 7, '2019-11-09 16:58:37'),
(353, 2, 8, '2019-11-09 16:58:37'),
(354, 2, 9, '2019-11-09 16:58:37'),
(355, 2, 17, '2019-11-09 16:58:37'),
(356, 2, 10, '2019-11-09 16:58:37'),
(357, 2, 11, '2019-11-09 16:58:37'),
(358, 2, 15, '2019-11-09 16:58:37'),
(359, 2, 22, '2019-11-09 16:58:37'),
(385, 3, 1, '2019-12-27 02:44:35'),
(386, 3, 21, '2019-12-27 02:44:35'),
(387, 3, 3, '2019-12-27 02:44:35'),
(388, 3, 2, '2019-12-27 02:44:35'),
(389, 3, 5, '2019-12-27 02:44:35'),
(390, 3, 6, '2019-12-27 02:44:35'),
(391, 3, 7, '2019-12-27 02:44:35'),
(392, 3, 18, '2019-12-27 02:44:35'),
(393, 3, 16, '2019-12-27 02:44:35'),
(394, 3, 19, '2019-12-27 02:44:35'),
(395, 3, 8, '2019-12-27 02:44:35'),
(396, 3, 20, '2019-12-27 02:44:35'),
(397, 3, 9, '2019-12-27 02:44:35'),
(398, 3, 17, '2019-12-27 02:44:35'),
(399, 3, 10, '2019-12-27 02:44:35'),
(400, 3, 11, '2019-12-27 02:44:35'),
(401, 3, 15, '2019-12-27 02:44:35'),
(402, 3, 22, '2019-12-27 02:44:35'),
(417, 0, 6, '2020-01-21 11:08:41'),
(418, 0, 19, '2020-01-21 11:08:41'),
(423, 27, 10, '2020-01-21 11:09:40'),
(424, 27, 11, '2020-01-21 11:09:40'),
(425, 28, 3, '2020-01-21 11:15:07'),
(426, 28, 7, '2020-01-21 11:15:07'),
(427, 28, 8, '2020-01-21 11:15:07'),
(482, 29, 2, '2020-01-21 11:21:55'),
(483, 30, 6, '2020-01-21 11:26:27'),
(492, 31, 1, '2020-01-21 11:51:08'),
(493, 31, 21, '2020-01-21 11:51:08'),
(494, 31, 3, '2020-01-21 11:51:08'),
(495, 31, 2, '2020-01-21 11:51:08'),
(496, 31, 5, '2020-01-21 11:51:08'),
(497, 31, 6, '2020-01-21 11:51:08'),
(498, 31, 7, '2020-01-21 11:51:08'),
(499, 31, 18, '2020-01-21 11:51:08'),
(500, 31, 16, '2020-01-21 11:51:08'),
(501, 31, 19, '2020-01-21 11:51:08'),
(502, 31, 8, '2020-01-21 11:51:08'),
(503, 31, 20, '2020-01-21 11:51:08'),
(504, 31, 9, '2020-01-21 11:51:08'),
(505, 31, 17, '2020-01-21 11:51:08'),
(506, 31, 10, '2020-01-21 11:51:08'),
(507, 31, 11, '2020-01-21 11:51:08'),
(508, 31, 15, '2020-01-21 11:51:08'),
(509, 31, 22, '2020-01-21 11:51:08'),
(517, 1, 1, '2020-03-25 01:33:22'),
(518, 1, 21, '2020-03-25 01:33:22'),
(519, 1, 2, '2020-03-25 01:33:22'),
(520, 1, 19, '2020-03-25 01:33:22'),
(521, 1, 8, '2020-03-25 01:33:22'),
(522, 1, 10, '2020-03-25 01:33:22'),
(523, 1, 15, '2020-03-25 01:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `sort_order` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `keywords`, `content`, `sort_order`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 'About Us', 'about-us', 'onjob about page', 'about, aboutus, about us', '<div>\r\n\r\n<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>\"Lorem\r\n ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\"</p><h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p>\"Sed\r\n ut perspiciatis unde omnis iste natus error sit voluptatem accusantium \r\ndoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo \r\ninventore veritatis et quasi architecto beatae vitae dicta sunt \r\nexplicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut \r\nodit aut fugit, sed quia consequuntur magni dolores eos qui ratione \r\nvoluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum \r\nquia dolor sit amet, consectetur, adipisci velit, sed quia non numquam \r\neius modi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam \r\ncorporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse \r\nquam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo \r\nvoluptas nulla pariatur?\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing \r\npleasure and praising pain was born and I will give you a complete \r\naccount of the system, and expound the actual teachings of the great \r\nexplorer of the truth, the master-builder of human happiness. No one \r\nrejects, dislikes, or avoids pleasure itself, because it is pleasure, \r\nbut because those who do not know how to pursue pleasure rationally \r\nencounter consequences that are extremely painful. Nor again is there \r\nanyone who loves or pursues or desires to obtain pain of itself, because\r\n it is pain, but because occasionally circumstances occur in which toil \r\nand pain can procure him some great pleasure. To take a trivial example,\r\n which of us ever undertakes laborious physical exercise, except to \r\nobtain some advantage from it? But who has any right to find fault with a\r\n man who chooses to enjoy a pleasure that has no annoying consequences, \r\nor one who avoids a pain that produces no resultant pleasure?\"</p>\r\n<h3>Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui \r\nblanditiis praesentium voluptatum deleniti atque corrupti quos dolores \r\net quas molestias excepturi sint occaecati cupiditate non provident, \r\nsimilique sunt in culpa qui officia deserunt mollitia animi, id est \r\nlaborum et dolorum fuga. Et harum quidem rerum facilis est et expedita \r\ndistinctio. Nam libero tempore, cum soluta nobis est eligendi optio \r\ncumque nihil impedit quo minus id quod maxime placeat facere possimus, \r\nomnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem \r\nquibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet\r\n ut et voluptates repudiandae sint et molestiae non recusandae. Itaque \r\nearum rerum hic tenetur a sapiente delectus, ut aut reiciendis \r\nvoluptatibus maiores alias consequatur aut perferendis doloribus \r\nasperiores repellat.\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"On the other hand, we denounce with righteous indignation and \r\ndislike men who are so beguiled and demoralized by the charms of \r\npleasure of the moment, so blinded by desire, that they cannot foresee \r\nthe pain and trouble that are bound to ensue; and equal blame belongs to\r\n those who fail in their duty through weakness of will, which is the \r\nsame as saying through shrinking from toil and pain. These cases are \r\nperfectly simple and easy to distinguish. In a free hour, when our power\r\n of choice is untrammelled and when nothing prevents our being able to \r\ndo what we like best, every pleasure is to be welcomed and every pain \r\navoided. But in certain circumstances and owing to the claims of duty or\r\n the obligations of business it will frequently occur that pleasures \r\nhave to be repudiated and annoyances accepted. The wise man therefore \r\nalways holds in these matters to this principle of selection: he rejects\r\n pleasures to secure other greater pleasures, or else he endures pains \r\nto avoid worse pains.\"</p>\r\n</div>', 2, 1, '2020-03-25 00:00:00', '0000-00-00 00:00:00'),
(5, 'Privacy Policy', 'privacy-policy', 'iprofile description here to help people know about us quickly', 'Privacy Policy of iProfile', '<div>\r\n\r\n<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>\"Lorem\r\n ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea \r\ncommodo consequat. Duis aute irure dolor in reprehenderit in voluptate \r\nvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint \r\noccaecat cupidatat non proident, sunt in culpa qui officia deserunt \r\nmollit anim id est laborum.\"</p><h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p>\"Sed\r\n ut perspiciatis unde omnis iste natus error sit voluptatem accusantium \r\ndoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo \r\ninventore veritatis et quasi architecto beatae vitae dicta sunt \r\nexplicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut \r\nodit aut fugit, sed quia consequuntur magni dolores eos qui ratione \r\nvoluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum \r\nquia dolor sit amet, consectetur, adipisci velit, sed quia non numquam \r\neius modi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam \r\ncorporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse \r\nquam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo \r\nvoluptas nulla pariatur?\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing \r\npleasure and praising pain was born and I will give you a complete \r\naccount of the system, and expound the actual teachings of the great \r\nexplorer of the truth, the master-builder of human happiness. No one \r\nrejects, dislikes, or avoids pleasure itself, because it is pleasure, \r\nbut because those who do not know how to pursue pleasure rationally \r\nencounter consequences that are extremely painful. Nor again is there \r\nanyone who loves or pursues or desires to obtain pain of itself, because\r\n it is pain, but because occasionally circumstances occur in which toil \r\nand pain can procure him some great pleasure. To take a trivial example,\r\n which of us ever undertakes laborious physical exercise, except to \r\nobtain some advantage from it? But who has any right to find fault with a\r\n man who chooses to enjoy a pleasure that has no annoying consequences, \r\nor one who avoids a pain that produces no resultant pleasure?\"</p>\r\n<h3>Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui \r\nblanditiis praesentium voluptatum deleniti atque corrupti quos dolores \r\net quas molestias excepturi sint occaecati cupiditate non provident, \r\nsimilique sunt in culpa qui officia deserunt mollitia animi, id est \r\nlaborum et dolorum fuga. Et harum quidem rerum facilis est et expedita \r\ndistinctio. Nam libero tempore, cum soluta nobis est eligendi optio \r\ncumque nihil impedit quo minus id quod maxime placeat facere possimus, \r\nomnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem \r\nquibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet\r\n ut et voluptates repudiandae sint et molestiae non recusandae. Itaque \r\nearum rerum hic tenetur a sapiente delectus, ut aut reiciendis \r\nvoluptatibus maiores alias consequatur aut perferendis doloribus \r\nasperiores repellat.\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"On the other hand, we denounce with righteous indignation and \r\ndislike men who are so beguiled and demoralized by the charms of \r\npleasure of the moment, so blinded by desire, that they cannot foresee \r\nthe pain and trouble that are bound to ensue; and equal blame belongs to\r\n those who fail in their duty through weakness of will, which is the \r\nsame as saying through shrinking from toil and pain. These cases are \r\nperfectly simple and easy to distinguish. In a free hour, when our power\r\n of choice is untrammelled and when nothing prevents our being able to \r\ndo what we like best, every pleasure is to be welcomed and every pain \r\navoided. But in certain circumstances and owing to the claims of duty or\r\n the obligations of business it will frequently occur that pleasures \r\nhave to be repudiated and annoyances accepted. The wise man therefore \r\nalways holds in these matters to this principle of selection: he rejects\r\n pleasures to secure other greater pleasures, or else he endures pains \r\nto avoid worse pains.\"</p>\r\n</div>', 1, 1, '2020-03-25 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `txn_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `payment_amount` varchar(50) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `admin_view` tinyint(4) NOT NULL DEFAULT 1,
  `payment_date` timestamp NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `txn_id`, `user_id`, `currency`, `payment_amount`, `payer_email`, `payment_status`, `package_id`, `admin_view`, `payment_date`, `created_date`) VALUES
(1, 'paypal', '0MU46597V3307705D', 24, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-08-28 19:12:58', '2019-08-29 00:12:18'),
(2, 'paypal', '4EA74253GU456471D', 24, 'USD', '115.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 3, 1, '2019-08-28 19:16:48', '2019-08-29 00:15:09'),
(3, 'paypal', '03N785956B627840B', 24, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-08-28 19:18:35', '2019-08-29 00:16:48'),
(4, 'paypal', '7W226802JC733740R', 24, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-08-28 20:38:34', '2019-08-29 01:36:52'),
(5, 'stripe', 'txn_1FCmUoHDx7jzBoS99huyR7kk', 24, 'USD', '100', 'waqas@gmail.com', 'succeeded', 2, 1, '2019-08-30 02:10:38', '2019-08-30 02:10:38'),
(6, 'stripe', 'txn_1FCmYjHDx7jzBoS9YyfnROg8', 24, 'USD', '115', 'ahmadwaqas@gmail.com', 'succeeded', 3, 1, '2019-08-30 02:14:41', '2019-08-30 02:14:41'),
(7, 'stripe', 'txn_1FCsVBHDx7jzBoS9WI5L0umr', 24, 'USD', '100', 'tessdfas@gmail.com', 'succeeded', 2, 1, '2019-08-30 08:35:25', '2019-08-30 08:35:25'),
(8, 'stripe', 'txn_1FCtDYHDx7jzBoS9LtkxNBWR', 24, 'USD', '100', 'ali@gmail.com', 'succeeded', 2, 1, '2019-08-30 09:21:14', '2019-08-30 09:21:14'),
(9, 'stripe', 'txn_1FCtFtHDx7jzBoS9knvXkAYY', 24, 'USD', '115', 'john@gmail.com', 'succeeded', 3, 1, '2019-08-30 09:23:39', '2019-08-30 09:23:39'),
(10, 'paypal', '3Y4636788L901692X', 24, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-08-30 19:10:48', '2019-08-31 00:10:18'),
(11, 'stripe', 'txn_1FDEvqHDx7jzBoS9qhQxP49s', 27, 'USD', '100', 'zee@gmail.com', 'succeeded', 2, 1, '2019-08-31 08:32:23', '2019-08-31 08:32:23'),
(12, 'stripe', 'txn_1FDFfaHDx7jzBoS9ZuqeBYnN', 27, 'USD', '100', 'asdfasf@gmail.com', 'succeeded', 2, 1, '2019-08-31 09:19:40', '2019-08-31 09:19:40'),
(13, 'stripe', 'txn_1FDQ5RHDx7jzBoS9zQPFY0m9', 24, 'USD', '100', 'g@gmail.com', 'succeeded', 2, 1, '2019-08-31 20:27:02', '2019-08-31 20:27:02'),
(14, 'stripe', 'txn_1FIetjHDx7jzBoS90IcA0Mvt', 24, 'USD', '100', 'test@gmail.com', 'succeeded', 2, 1, '2019-09-15 07:16:14', '2019-09-15 07:16:14'),
(15, 'stripe', 'txn_1FJ2i6HDx7jzBoS9U5BWeYXm', 24, 'USD', '100', 'fa@gmail.com', 'succeeded', 2, 1, '2019-09-16 08:41:46', '2019-09-16 08:41:46'),
(16, 'paypal', '7JF878696L613645E', 24, 'USD', '115.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 3, 1, '2019-09-16 18:06:37', '2019-09-16 14:06:44'),
(18, 'paypal', '9XC554612V4732723', 7, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '0000-00-00 00:00:00', '2019-09-16 15:37:17'),
(20, 'stripe', 'txn_1FJHkUHDx7jzBoS9jFBJu5l8', 22, 'USD', '100', 'ali@gmail.com', 'succeeded', 2, 1, '2019-09-16 15:48:03', '2019-09-16 15:48:03'),
(21, 'stripe', 'txn_1FJHlSHDx7jzBoS9vIYZpglj', 22, 'USD', '100', 'asdasdf@gmail.com', 'succeeded', 2, 1, '2019-09-16 15:49:02', '2019-09-16 15:49:02'),
(22, 'paypal', '5RR60477WJ427674F', 22, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-16 15:55:50', '2019-09-16 15:55:50'),
(23, 'paypal', '0AN2465466100171G', 25, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-16 16:00:11', '2019-09-16 16:00:11'),
(25, 'paypal', '6CP26064T5529552A', 7, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-16 16:01:58', '2019-09-16 16:01:58'),
(27, 'paypal', '1BD62590RK6254139', 26, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-16 16:05:21', '2019-09-16 16:05:21'),
(29, 'paypal', '0P463253433662633', 27, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-16 16:08:34', '2019-09-16 16:08:34'),
(30, 'stripe', 'txn_1FJlQOHDx7jzBoS9Mn9tyaqR', 24, 'USD', '115', 'dar@gmail.com', 'succeeded', 3, 1, '2019-09-17 23:26:26', '2019-09-17 23:26:26'),
(31, 'paypal', '4T707310572474705', 24, 'USD', '115.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 3, 1, '2019-09-17 23:42:00', '2019-09-17 23:42:00'),
(32, 'paypal', '1DL981055T596070F', 22, 'USD', '100.00', 'waqas.tariq-buyer@pucit.edu.pk', 'Completed', 2, 1, '2019-09-18 00:13:11', '2019-09-18 00:13:11'),
(33, 'stripe', 'txn_1FKKVwHDx7jzBoS9D86OKoH7', 29, 'USD', '115', 'abcd@gamil.com', 'succeeded', 3, 1, '2019-09-19 02:57:20', '2019-09-19 02:57:20'),
(34, 'stripe', 'txn_1FKilgHDx7jzBoS9KT140ZMX', 22, 'USD', '115', 'naumanahmedcs@gmail.com', 'succeeded', 3, 0, '2019-09-20 04:51:12', '2019-09-20 04:51:12'),
(35, 'stripe', 'txn_1Fo5ojHDx7jzBoS9HchqHSf9', 70, 'USD', '100', 'dar@gmail.com', 'Completed', 2, 1, '2019-12-10 10:19:45', '2019-12-10 10:19:45'),
(36, 'stripe', 'txn_1Fo626HDx7jzBoS95bwwomrh', 70, 'USD', '115', 'waqastariqdar@gmail.com', 'Completed', 3, 0, '2019-12-10 10:33:35', '2019-12-10 10:33:35'),
(37, 'stripe', 'txn_1FuFAZHDx7jzBoS9XVJNoIvd', 81, 'USD', '100', 'tatifo.llc@gmail.com', 'Completed', 2, 0, '2019-12-27 09:31:43', '2019-12-27 09:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(250) DEFAULT NULL,
  `project_url` varchar(250) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `user_id`, `project_name`, `project_url`, `from_date`, `to_date`, `cat_id`, `image`, `thumb`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 22, 'XYZ', 'http://www.google.com/', '2011-02-03', '2013-04-04', 1, 'uploads/images/medium/port_1_22__medium.jpg', 'uploads/images/thumbnail/port_1_22__thumb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 1, 1, '2019-09-20 09:25:00', '2019-09-20 09:25:00'),
(2, 22, 'ASD', 'http://www.google.com/', '2013-02-22', '2012-02-23', 1, 'uploads/images/medium/port_2_22__medium.jpg', 'uploads/images/thumbnail/port_2_22__thumb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 2, 1, '2019-09-20 09:25:52', '2019-09-20 09:25:52'),
(3, 22, 'TYU', 'http://www.google.com/', '2012-02-22', '2012-02-22', 2, 'uploads/images/medium/port_3_22__medium.jpg', 'uploads/images/thumbnail/port_3_22__thumb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 3, 1, '2019-09-20 09:26:38', '2019-09-20 09:26:38'),
(4, 22, 'GHJ', 'http://www.google.com/', '2012-02-22', '2014-03-31', 1, 'uploads/images/medium/port_4_22__medium.jpg', 'uploads/images/thumbnail/port_4_22__thumb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 4, 1, '2019-09-20 09:28:21', '2019-09-20 09:28:21'),
(5, 29, 'HTML Programing', '', '2015-01-10', '0000-00-00', 3, 'uploads/images/medium/port_5_29__medium.png', 'uploads/images/thumbnail/port_5_29__thumb.png', 'Don’t praise your employees just for the sake of it. People will see straight through you and your whole relationship will be ruined. Give positive feedback to your employees when you have a concrete reason. Be direct and honest. ', 25, 1, '2019-09-21 03:03:31', '2019-09-21 03:04:52'),
(6, 29, 'PHP Programing', '', '2018-10-01', '2017-01-05', 3, 'uploads/images/medium/port_6_29__medium.jpg', 'uploads/images/thumbnail/port_6_29__thumb.jpg', 'Make sure that your feedback is timely, given in-the moment. Don’t wait for a scheduled meeting or a performance review to give your employees positive feedback. Waiting to recognize your employees can leave them feeling as though their hard work has gone unnoticed. ', 10, 1, '2019-09-21 03:07:19', '2019-09-21 03:07:19'),
(7, 29, 'Python Programing', '', '2018-02-14', '2019-01-25', 3, 'uploads/images/medium/port_7_29__medium.png', 'uploads/images/thumbnail/port_7_29__thumb.png', 'If you want to make your feedback more impactful and powerful, frame your employees’ accomplishments in a bigger context. Explain the impact of their achievement on others (colleagues and customers) and link it to your company’s bottom line. ', 10, 1, '2019-09-21 03:09:33', '2019-09-21 03:09:33'),
(8, 29, 'Corel Draw Vector Designing', '', '2017-01-10', '0000-00-00', 4, 'uploads/images/medium/port_8_29__medium.jpeg', 'uploads/images/thumbnail/port_8_29__thumb.jpeg', 'If you want to make your feedback more impactful and powerful, frame your employees’ accomplishments in a bigger context. Explain the impact of their achievement on others (colleagues and customers) and link it to your company’s bottom line. ', 30, 1, '2019-09-21 03:12:25', '2019-09-21 03:12:25'),
(9, 29, 'Photo Shop Designer', '', '2018-02-01', '0000-00-00', 4, 'uploads/images/medium/port_9_29__medium.png', 'uploads/images/thumbnail/port_9_29__thumb.png', 'If you want to make your feedback more impactful and powerful, frame your employees’ accomplishments in a bigger context. Explain the impact of their achievement on others (colleagues and customers) and link it to your company’s bottom line. ', 20, 1, '2019-09-21 03:13:52', '2019-09-21 03:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `user_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 22, 'ABC', 1, '2019-09-20 09:22:16', '2019-09-20 09:22:16'),
(2, 22, 'ZXC', 1, '2019-09-20 09:22:22', '2019-09-20 09:22:22'),
(3, 29, 'Programing', 1, '2019-09-21 03:02:29', '2019-09-21 03:02:29'),
(4, 29, 'Designer', 1, '2019-09-21 03:10:09', '2019-09-21 03:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `user_id`, `name`, `phone`, `email`, `details`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Saad Ahmad', '3110882255', '17114156-077@uog.edu.pk', 'These brief narrative and APA parenthetical citations are only half of what’s needed. The full references, which include more information about the source, are found on the final page of the project.', 0, 1, '2019-09-19 14:18:30', '2019-09-19 14:18:30'),
(2, 29, 'Adil Hussain', '3110882255', 'saadbhatti888@gmail.com', 'Only a snippet is included in the body of the paper to provide the reader with a quick reference, easy enough to read and breeze over, without having to stop the flow of reading through the paper. Readers use the information in the narrative and APA format parenthetical citation to then flip to the reference page, to find the rest of the information about the source.', 0, 1, '2019-09-19 14:19:02', '2019-09-19 14:19:33'),
(3, 22, 'ZXC', '765675', 'example@d.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 1, '2019-09-20 09:47:02', '2019-09-20 09:47:02'),
(4, 22, 'ABC', '765675', 'example@d.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, '2019-09-20 09:48:02', '2019-09-20 09:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `screen_shots`
--

CREATE TABLE `screen_shots` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `is_active` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `screen_shots`
--

INSERT INTO `screen_shots` (`id`, `user_id`, `title`, `image`, `thumb`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 4, 'Premium Resume Desing', 'uploads/images/medium/sshot_1_4__medium.png', 'uploads/images/thumbnail/sshot_1_4__thumb.png', 1, '2019-09-20 02:29:10', '2019-09-20 02:29:10'),
(2, 4, 'Elegant Design', 'uploads/images/medium/sshot_2_4__medium.png', 'uploads/images/thumbnail/sshot_2_4__thumb.png', 1, '2019-09-20 02:29:42', '2019-09-20 02:29:42'),
(3, 4, 'Creative Design', 'uploads/images/medium/sshot_3_4__medium.png', 'uploads/images/thumbnail/sshot_3_4__thumb.png', 1, '2019-09-20 02:30:08', '2019-09-20 02:30:08'),
(6, 4, 'Mastering Neural Networks', 'uploads/images/medium/sshot_6_4__medium.png', 'uploads/images/thumbnail/sshot_6_4__thumb.png', 1, '2019-11-12 22:02:12', '2019-11-12 22:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_name` varchar(500) DEFAULT NULL,
  `fa_class` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `is_active` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `service_name`, `fa_class`, `details`, `image`, `thumb`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 4, 'Multiuser Resume Script', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'uploads/images/medium/serv_1_4__medium.png', 'uploads/images/thumbnail/serv_1_4__thumb.png', 1, '2019-09-20 02:37:50', '2019-11-02 17:29:00'),
(2, 4, 'Premium Resume Designs', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'uploads/images/medium/serv_2_4__medium.png', 'uploads/images/thumbnail/serv_2_4__thumb.png', 1, '2019-09-20 02:39:33', '2019-09-20 02:39:33'),
(3, 4, 'Complete User Panel', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'uploads/images/medium/serv_3_4__medium.png', 'uploads/images/thumbnail/serv_3_4__thumb.png', 0, '2019-09-20 02:41:16', '2019-12-07 22:01:02'),
(4, 22, 'HTML', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'uploads/images/medium/serv_4_22__medium.png', 'uploads/images/thumbnail/serv_4_22__thumb.png', 1, '2019-09-20 09:19:31', '2019-09-20 09:19:31'),
(5, 22, 'Python', 'fas fa-plane-departure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'uploads/images/medium/serv_5_22__medium.png', 'uploads/images/thumbnail/serv_5_22__thumb.png', 1, '2019-09-20 09:22:03', '2019-09-20 09:22:03'),
(6, 29, 'HTML Front End Designer', 'fab fa-html5', 'I\'m Professionaly HTML front end designer .\r\nI\'ve done many projects.\r\n', 'uploads/images/medium/serv_6_29__medium.png', 'uploads/images/thumbnail/serv_6_29__thumb.png', 1, '2019-09-21 02:30:43', '2019-09-21 02:35:25'),
(7, 29, 'Vector Designer', 'fas fa-draw-polygon', 'I\'m Professional in vector designing feild.\r\nI\'ve done many projects in this feild.\r\n', NULL, NULL, 1, '2019-09-21 02:39:03', '2019-09-21 02:39:03'),
(8, 29, 'Microsoft Office Specialst', 'fab fa-microsoft', 'I have done many projects in this feild.\r\nI\'m professionaly trained in this feild.\r\nI\'m also certified with microsoft.', NULL, NULL, 1, '2019-09-21 02:42:12', '2019-09-21 02:42:12'),
(9, 24, 'Travelling.', 'fas fa-plane-departure', 'lskjlfkjas dflakjsdflajsdflk asfjalsfj\r\nasdfklajsdlfjasldfjaldfj asdlfjsldfjsldjfladfjlakdjfwieuroieuoqieuldsjf alsdfjalsdfj', 'uploads/images/medium/serv_9_24__medium.jpg', 'uploads/images/thumbnail/serv_9_24__thumb.jpg', 1, '2019-11-02 18:11:05', '2019-11-02 18:14:17'),
(10, 22, 'Java', '', 'asdfasdf', NULL, NULL, 1, '2019-11-15 09:24:20', '2019-11-15 09:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL DEFAULT 0,
  `site_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `footer_about` text CHARACTER SET utf8 DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `email_from` varchar(100) NOT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `enable_captcha` tinyint(4) NOT NULL DEFAULT 0,
  `enable_registration` tinyint(4) NOT NULL DEFAULT 1,
  `is_show_user_profile` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'If its 0, then a user must be logged in to view any other user''s public profile page.',
  `recaptcha_site_key` varchar(255) DEFAULT NULL,
  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `recaptcha_lang` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `paypal_is_sandbox` tinyint(4) DEFAULT NULL,
  `paypal_sandbox_url` varchar(255) DEFAULT NULL,
  `paypal_live_url` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_cur_code` varchar(10) DEFAULT NULL,
  `stripe_secret_key` varchar(255) DEFAULT NULL,
  `stripe_publish_key` varchar(255) DEFAULT NULL,
  `default_language` varchar(255) DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `favicon`, `logo`, `keywords`, `description`, `footer_about`, `admin_email`, `mobile`, `copyright`, `email_from`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `facebook`, `instagram`, `twitter`, `linkedin`, `enable_captcha`, `enable_registration`, `is_show_user_profile`, `recaptcha_site_key`, `recaptcha_secret_key`, `recaptcha_lang`, `language`, `paypal_is_sandbox`, `paypal_sandbox_url`, `paypal_live_url`, `paypal_email`, `paypal_cur_code`, `stripe_secret_key`, `stripe_publish_key`, `default_language`, `updated_date`) VALUES
(1, 'iProfile - Multiuser Resume & Profile Builder', 'Build your online profile instantly.', 'uploads/images/thumbnail/f644dd616eab94f984c821e9090358f9_thumb.png', 'uploads/images/medium/logo_1_4__medium.png', 'resume,cv,vcard', 'Multiuser resume & profile management script', 'Freelancers and entrepreneurs use about.me to grow their audience and get more clients..', 'codeglamour1@gmail.com', '', '© 2020 All rights reserved..', 'no-reply@codeglamour.com', 'mail.codeglamour.com', 587, 'no-reply@codeglamour.com', '#pakistan@123', 'http://www.facebook.com/', 'http://www.instagram.com/', '', 'http://www.linkedin.com/', 0, 1, 1, '6Le0HZIUAAAAAGlN837KsF6nbXsjZ0KeU2q-TzY8', '6Le0HZIUAAAAABxzALAPxfn_EvPTQEkDtxZm2OxQ', 'en', 'en', 1, 'https://sandbox.paypal.com/cgi-bin/webscr', 'https://www.paypal.com/cgi-bin/webscr', 'nacreativeprogrammer-facilitator-1@gmail.com', 'USD', 'sk_test_TMbUaFbCy6vreanBfGa64frP00mxfxxHiv', 'pk_test_Vq7vPui3v2LZPWCzT9LBeaVv00RAS7HwZ1', 'english', '2020-03-24 19:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `site_languages`
--

CREATE TABLE `site_languages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `directory_name` varchar(100) NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_languages`
--

INSERT INTO `site_languages` (`id`, `user_id`, `display_name`, `directory_name`, `is_default`, `created_date`, `updated_date`) VALUES
(1, 4, 'English', 'english', 1, '2019-11-02 00:28:12', '2019-12-10 07:13:50'),
(7, 4, 'French', 'french', 0, '2019-11-02 19:20:00', '2019-12-04 00:42:40'),
(8, 4, 'kkk', 'oo', 0, '2019-12-17 12:00:01', '2019-12-17 19:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `skill_level` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `name`, `slug`, `skill_level`, `parent_id`, `order`, `status`, `created_date`, `updated_date`) VALUES
(1, 29, 'Coading', 'coading', NULL, 0, 25, 1, '2019-09-19 13:54:55', '2019-09-19 13:54:55'),
(2, 29, 'Python', 'python', 80, 1, 10, 1, '2019-09-19 13:55:26', '2019-09-19 13:55:26'),
(3, 29, 'PHP', 'php', 70, 1, 5, 1, '2019-09-19 13:55:51', '2019-09-19 13:55:51'),
(4, 29, 'C++', 'c', 100, 1, 10, 1, '2019-09-19 13:56:40', '2019-09-19 13:56:40'),
(5, 29, 'Designer', 'designer', NULL, 0, 30, 1, '2019-09-19 13:56:55', '2019-09-19 13:56:55'),
(6, 29, 'HTML', 'html', 100, 5, 10, 1, '2019-09-19 13:57:47', '2019-09-19 13:57:47'),
(7, 29, 'Corel Draw', 'corel-draw', 70, 5, 10, 1, '2019-09-19 13:58:05', '2019-09-19 13:58:05'),
(8, 29, 'Photo Shop', 'photo-shop', 50, 5, 10, 1, '2019-09-19 13:58:23', '2019-09-19 13:58:23'),
(9, 22, 'Coding', 'coding', NULL, 0, 0, 1, '2019-09-20 09:13:38', '2019-09-20 09:13:38'),
(10, 22, 'Front End', 'front-end', NULL, 0, 2, 1, '2019-09-20 09:13:55', '2019-09-20 09:13:55'),
(11, 22, 'Java', 'java', 80, 9, 1, 1, '2019-09-20 09:14:58', '2019-09-20 09:14:58'),
(12, 22, 'PHP', 'php', 80, 10, 2, 1, '2019-09-20 09:15:48', '2019-09-20 09:15:48'),
(13, 24, 'Coding', 'coding', NULL, 0, 0, 1, '2019-09-21 21:25:55', '2019-09-21 21:25:55'),
(14, 22, 'x', 'x', NULL, 0, 0, 1, '2019-12-27 01:12:54', '2019-12-27 01:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_title` varchar(150) NOT NULL,
  `client_name` varchar(500) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `feedback_title`, `client_name`, `image`, `feedback`, `thumb`, `status`, `created_date`, `updated_date`) VALUES
(1, 22, 'Experienced Programmer', 'ADS', 'uploads/images/medium/test_1_22__medium.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'uploads/images/thumbnail/test_1_22__thumb.jpg', 1, '2019-09-20 09:42:38', '2019-09-20 09:44:01'),
(2, 22, 'Good in time delivery', 'ZXC', 'uploads/images/medium/test_2_22__medium.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'uploads/images/thumbnail/test_2_22__thumb.jpg', 1, '2019-09-20 09:43:00', '2019-09-20 09:46:14'),
(3, 29, 'Exprienced Programmer', 'Josaf Mestron', 'uploads/images/medium/test_3_29__medium.jpg', 'I am a software developer and have been told by more than one employer that I do my work too slowly and make things more complicated than they have to be, and I have to change this as soon as possible but am having a hard time doing it alone.', 'uploads/images/thumbnail/test_3_29__thumb.jpg', 1, '2019-09-21 02:46:31', '2019-09-21 02:48:10'),
(4, 29, 'Good Behaviour', 'Mona Stuain', 'uploads/images/medium/test_4_29__medium.png', 'A Gallup’s study of 530 work units with productivity data found that teams with managers who received strengths feedback showed 12.5% greater productivity post-intervention than teams with managers who received no feedback. ', 'uploads/images/thumbnail/test_4_29__thumb.png', 1, '2019-09-21 02:53:18', '2019-09-21 02:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `country` int(11) UNSIGNED NOT NULL,
  `city` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `skype` varchar(50) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `is_premium` tinyint(4) NOT NULL DEFAULT 0,
  `is_portfolio` tinyint(4) NOT NULL DEFAULT 0,
  `is_blog` tinyint(4) NOT NULL DEFAULT 0,
  `is_testimonial` tinyint(4) NOT NULL DEFAULT 0,
  `is_app` tinyint(4) NOT NULL DEFAULT 0,
  `is_service` tinyint(4) NOT NULL DEFAULT 0,
  `is_skill` tinyint(4) NOT NULL DEFAULT 0,
  `is_education` tinyint(4) NOT NULL DEFAULT 0,
  `is_experience` tinyint(4) NOT NULL DEFAULT 0,
  `is_interest` tinyint(4) NOT NULL DEFAULT 0,
  `is_award` tinyint(4) NOT NULL DEFAULT 0,
  `is_language` tinyint(4) NOT NULL DEFAULT 0,
  `is_client` tinyint(4) NOT NULL DEFAULT 0,
  `is_reference` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `phone`, `image`, `thumb`, `designation`, `about_me`, `country`, `city`, `address`, `skype`, `whatsapp`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `is_active`, `is_verify`, `is_admin`, `is_premium`, `is_portfolio`, `is_blog`, `is_testimonial`, `is_app`, `is_service`, `is_skill`, `is_education`, `is_experience`, `is_interest`, `is_award`, `is_language`, `is_client`, `is_reference`, `token`, `password_reset_code`, `last_ip`, `created_date`, `updated_date`) VALUES
(4, 'admin', 'Code', 'Glamour', 'admin@gmail.com', '$2y$10$rHYvKenq9xtPHrvbmGBLXOwL6pGrb9X7lfpEA5TagrJ.t2pGk.JDS', '012 (9) 521453', 'uploads/images/medium/3a47554317146743646152f2bd38baf1_medium.jpg', 'uploads/images/thumbnail/3a47554317146743646152f2bd38baf1_thumb.jpg', '', 'about me section\r\nwrite detailed cover letter..\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien porttitor, dignissim quam sit amet, aliquam lorem. Fusce id ligula non risus mollis consectetur. Nam lobortis, erat quis pulvinar dignissim, velit ligula ullamcorper ipsum, at sodales elit odio at velit. Sed a est a quam mattis suscipit. Proin et faucibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien porttitor, dignissim quam sit amet, aliquam lorem. Fusce id ligula non risus mollis consectetur. Nam lobortis, erat quis pulvinar dignissim, velit ligula ullamcorper ipsum, at sodales elit odio at velit. Sed a est a quam mattis suscipit.', 231, 'NYC', 'street 1, region 1', '', '', '', '', '', '', '', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '99c5e07b4d5de9d18c350cdf64c5aa3d', '', NULL, '2019-07-16 03:07:21', '2020-03-24 19:46:41'),
(21, 'codeglamour', 'code', 'glamour', 'codeglamour1@gmail.com', '$2y$10$NN7zw07eNLzulELi1IKMYurNL20BHMCKRvqWcikKYJgOI0uboZR.K', '', '', '', '', '', 0, 'Lahore', '', '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', NULL, '2019-08-10 02:45:25', '2019-09-18 14:39:36'),
(22, 'user123', 'teste', 'sdfdf', 'demo@gmail.com', '$2y$10$NN7zw07eNLzulELi1IKMYurNL20BHMCKRvqWcikKYJgOI0uboZR.K', '60126543988', 'uploads/images/medium/ee1dfe07c37042e4ff3b087a04f2e22a_medium.jpg', 'uploads/images/thumbnail/ee1dfe07c37042e4ff3b087a04f2e22a_thumb.jpg', 'Business Development Manager', 'i do big business', 132, 'Kuala Lumpur', 'adf', 'www.skype.com', '60126543988', 'https://www.facebook.com', '', 'asdfasdf', '', 'uploads/resume/resume_22.pdf', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', NULL, '2019-08-10 03:01:00', '2020-03-24 20:26:40'),
(24, 'test100', 'Waqas', 'Dar.', 'kaforodi@simplemail.top', '$2y$10$NN7zw07eNLzulELi1IKMYurNL20BHMCKRvqWcikKYJgOI0uboZR.K', '012 - 5214 - 5454', 'uploads/images/medium/photo_24_24__medium.jpg', 'uploads/images/thumbnail/photo_24_24__thumb.jpg', 'Software Engineer', 'I am a talanted Freelance Graphic Designer and Illustrator. I design websites, logos, brochures, banners, book covers, and everything related to design and inspiration. I have graduated from International University of Design. Some of my works featured on international exhibition of design. ', 0, 'Gujrat', 'bksh', 'git-123', '+9230012345678', 'http://www.facebook.com', '', '', '', 'uploads/resume/resume_24.pdf', 1, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, '', '', NULL, '2019-08-24 13:01:51', '2019-12-09 15:24:55'),
(57, 'AbiodunA', 'Abiodun', 'Anifowose', 'aanifowose1@student.gsu.edu', '$2y$10$dSoRAAaPCfiUDSVBgO/Zj.90vNMmhmS0SbWEWdztGOOQfNPXzFimy', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'cfecdb276f634854f3ef915e2e980c31', '', '73.106.74.209', '2019-11-28 19:50:18', '2019-11-29 02:50:18'),
(75, 'JawadAliJamil', 'Jawad', 'Jamil', 'jawad.ali.jamil@outlook.com', '$2y$10$t.DtPcd3wNcQkoPR6mDN9uff2krtbpeMPSapNHtNhlawmFx/Z8kiK', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '39.41.130.21', '2019-12-17 05:39:07', '2019-12-17 12:39:50'),
(76, 'adminmadamsshop', 'venkat', 'rao', 'kvr1161@gmail.com', '$2y$10$Bu5vPcYrxplZfyZSr5MnFuYuCYUKjByhqhjONFnyLKfJOyvhNHc5u', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '106.212.226.213', '2019-12-17 22:01:14', '2019-12-18 05:01:35'),
(77, 'tester', 'fmfe', 'fdaefe', 'test@gmail.com', '$2y$10$q7nEgAnn9sw6TeNz7kjKuOGXAKoAi3GP3.lTpubYRfzdirP.UOHSG', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'e57c6b956a6521b28495f2886ca0977a', '', '177.126.10.33', '2019-12-18 19:59:50', '2019-12-19 02:59:50'),
(78, 'zarkezekiel', 'Ezekiel', 'Omondi', 'ezekielprogrammer@gmail.com', '$2y$10$GtA65jJfJxqLQcaW7y/NfekKxPH9H1sRumgABgQinlerJ0wI9nhdK', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '197.156.190.155', '2019-12-20 13:29:59', '2019-12-20 20:30:41'),
(79, 'Omar77', 'omar', 'alqeed', 'm9mmweb@gmail.com', '$2y$10$/enhXDsv5.x6dT.5rV9AXewPSKlIlp66M1MReQ.iLL5uQxAZfj2P.', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a760880003e7ddedfef56acb3b09697f', '', '188.248.83.113', '2019-12-21 09:33:38', '2019-12-21 16:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_layout`
--

CREATE TABLE `user_layout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_layout`
--

INSERT INTO `user_layout` (`id`, `user_id`, `layout_id`, `created_date`) VALUES
(3, 25, 3, '2019-09-17 23:13:21'),
(4, 26, 3, '2019-09-17 23:13:39'),
(5, 27, 3, '2019-09-17 23:13:57'),
(7, 21, 3, '2019-09-18 00:10:13'),
(10, 30, 3, '2019-09-20 05:04:48'),
(15, 29, 4, '2019-09-21 03:41:21'),
(22, 24, 4, '2019-11-05 00:56:31'),
(111, 78, 3, '2019-12-20 13:36:56'),
(121, 81, 2, '2019-12-27 03:33:32'),
(127, 22, 4, '2019-12-31 15:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_package`
--

CREATE TABLE `user_package` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_package`
--

INSERT INTO `user_package` (`id`, `user_id`, `package_id`, `expiry_date`, `created_date`) VALUES
(11, 21, 1, '0000-00-00', '2019-09-17 23:11:52'),
(12, 25, 1, '0000-00-00', '2019-09-17 23:13:21'),
(13, 26, 1, '0000-00-00', '2019-09-17 23:13:39'),
(14, 27, 1, '0000-00-00', '2019-09-17 23:13:57'),
(16, 24, 3, '2020-09-16', '2019-09-17 23:42:00'),
(18, 28, 1, '0000-00-00', '2019-09-19 02:31:29'),
(20, 30, 1, '0000-00-00', '2019-09-19 02:53:28'),
(21, 29, 3, '2020-09-18', '2019-09-19 02:57:20'),
(22, 31, 1, '0000-00-00', '2019-09-20 02:12:16'),
(23, 32, 1, '0000-00-00', '2019-09-20 03:38:24'),
(24, 22, 3, '2020-09-19', '2019-09-20 04:51:12'),
(25, 33, 1, '0000-00-00', '2019-09-20 08:54:24'),
(26, 34, 1, '0000-00-00', '2019-09-20 08:55:54'),
(27, 35, 1, '0000-00-00', '2019-09-21 00:54:28'),
(28, 36, 1, '0000-00-00', '2019-09-21 00:57:10'),
(29, 37, 1, '0000-00-00', '2019-09-21 01:01:22'),
(30, 38, 1, '0000-00-00', '2019-09-21 01:11:32'),
(31, 39, 1, '0000-00-00', '2019-09-21 01:14:56'),
(32, 40, 1, '0000-00-00', '2019-09-21 01:34:07'),
(33, 41, 1, '0000-00-00', '2019-09-21 01:37:18'),
(34, 42, 1, '0000-00-00', '2019-09-21 02:42:59'),
(35, 43, 1, '0000-00-00', '2019-09-21 03:01:20'),
(36, 44, 1, '0000-00-00', '2019-09-21 03:06:43'),
(37, 45, 1, '0000-00-00', '2019-09-21 03:16:54'),
(38, 46, 1, '0000-00-00', '2019-09-21 03:23:24'),
(39, 47, 1, '0000-00-00', '2019-09-21 03:26:21'),
(40, 48, 1, '0000-00-00', '2019-09-21 03:28:57'),
(41, 49, 1, '0000-00-00', '2019-09-21 03:36:58'),
(42, 50, 1, '0000-00-00', '2019-11-09 13:07:49'),
(43, 54, 1, '0000-00-00', '2019-11-09 17:24:14'),
(44, 55, 1, '0000-00-00', '2019-11-28 00:20:01'),
(45, 56, 1, '0000-00-00', '2019-11-28 09:39:21'),
(46, 57, 1, '0000-00-00', '2019-11-28 19:50:18'),
(47, 58, 1, '0000-00-00', '2019-12-01 12:30:57'),
(48, 59, 1, '0000-00-00', '2019-12-02 19:16:12'),
(49, 60, 1, '0000-00-00', '2019-12-03 04:42:26'),
(50, 61, 1, '0000-00-00', '2019-12-03 04:43:47'),
(51, 62, 1, '0000-00-00', '2019-12-03 06:52:47'),
(52, 63, 1, '0000-00-00', '2019-12-05 02:14:05'),
(53, 64, 1, '0000-00-00', '2019-12-05 09:28:44'),
(54, 65, 1, '0000-00-00', '2019-12-06 00:21:19'),
(55, 66, 1, '0000-00-00', '2019-12-06 11:34:13'),
(56, 67, 1, '0000-00-00', '2019-12-07 11:17:58'),
(57, 68, 1, '0000-00-00', '2019-12-08 19:55:33'),
(58, 69, 1, '0000-00-00', '2019-12-08 21:41:31'),
(61, 70, 3, '2020-12-09', '2019-12-10 03:33:35'),
(62, 71, 1, '0000-00-00', '2019-12-11 06:29:48'),
(63, 72, 1, '0000-00-00', '2019-12-11 15:07:33'),
(64, 73, 1, '0000-00-00', '2019-12-12 09:07:46'),
(65, 74, 1, '0000-00-00', '2019-12-13 12:39:43'),
(66, 75, 1, '0000-00-00', '2019-12-17 05:39:07'),
(67, 76, 1, '0000-00-00', '2019-12-17 22:01:14'),
(68, 77, 1, '0000-00-00', '2019-12-18 19:59:50'),
(69, 78, 1, '0000-00-00', '2019-12-20 13:29:59'),
(70, 79, 1, '0000-00-00', '2019-12-21 09:33:38'),
(71, 80, 1, '0000-00-00', '2019-12-24 11:44:50'),
(73, 81, 2, '2020-01-26', '2019-12-27 02:31:43'),
(74, 82, 1, '0000-00-00', '2019-12-30 11:48:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoint_days`
--
ALTER TABLE `appoint_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_features`
--
ALTER TABLE `package_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_name` (`user_id`,`name`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screen_shots`
--
ALTER TABLE `screen_shots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_languages`
--
ALTER TABLE `site_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_layout`
--
ALTER TABLE `user_layout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_package`
--
ALTER TABLE `user_package`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appoint_days`
--
ALTER TABLE `appoint_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `package_features`
--
ALTER TABLE `package_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screen_shots`
--
ALTER TABLE `screen_shots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_languages`
--
ALTER TABLE `site_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_layout`
--
ALTER TABLE `user_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user_package`
--
ALTER TABLE `user_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
