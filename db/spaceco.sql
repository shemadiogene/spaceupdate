-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 11:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaceco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `passwords`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `adminnotification`
--

CREATE TABLE `adminnotification` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `notTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminnotification`
--

INSERT INTO `adminnotification` (`id`, `content`, `notTime`, `status`) VALUES
(1, 'New Message', '2021-02-21 21:28:39', 'read'),
(2, 'New company created account', '2021-02-18 14:19:46', 'unread'),
(3, 'New company created account', '2021-02-21 21:28:30', 'read'),
(4, 'New company created account', '2021-02-22 07:27:58', 'unread'),
(5, 'New company created account', '2021-02-24 10:19:20', 'unread'),
(6, 'New Message', '2022-10-07 15:23:50', 'read'),
(7, 'New company created account', '2021-03-07 21:48:02', 'read'),
(8, 'New company created account', '2022-10-07 15:28:20', 'unread'),
(9, 'New Message', '2022-10-12 07:35:04', 'unread'),
(10, 'New company created account', '2022-10-12 08:55:50', 'read'),
(11, 'New company created account', '2022-10-12 09:25:55', 'unread'),
(12, 'New company created account', '2022-10-14 09:03:47', 'unread'),
(13, 'New Message', '2022-11-12 08:21:57', 'read'),
(14, 'New Message', '2022-11-22 15:05:52', 'unread'),
(15, 'New Message', '2023-01-09 09:53:22', 'unread'),
(16, 'New Message', '2023-01-11 08:47:11', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `comName` varchar(255) DEFAULT NULL,
  `comEmail` varchar(255) DEFAULT NULL,
  `comLocation` varchar(255) DEFAULT NULL,
  `comPhone` int(11) DEFAULT NULL,
  `comUsername` varchar(255) DEFAULT NULL,
  `comPassword` varchar(255) DEFAULT NULL,
  `comTIN` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `coStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `comName`, `comEmail`, `comLocation`, `comPhone`, `comUsername`, `comPassword`, `comTIN`, `thumbnail`, `coStatus`) VALUES
(11, 'Nyamata Rent Ltd', 'nyama@spaceco.com', 'Bugesera, East', 788890071, 'com1', '123', 'TIN-R4333', '6340432d70aee.jpg', 'Approved'),
(12, 'Muhanga Apartment', 'askigali@gmail.com', 'Muhanga, Gitarama Road', 781992725, 'com2', '123', 'TIN-930245', '63404302800fc.jpg', 'Approved'),
(15, 'Rwanda Rwmpl', 'email', 'Rwampala', 342342342, 'comn', 'fineandfine', '12345', '602f8482503aa.jpg', 'Approved'),
(16, 'Airtel Rwanda', 'airtelworld@gmail.com', 'Kigali, Kakiru', 733333300, 'air', '123', 'AIR-438823', '60335cfe9085d.jpg', 'Approved'),
(18, 'Test Co 100', 'test1@spaceco.com', 'Kigal, Rwanda', 2147483647, 'co1', '123', '483094', '604549d1154a0.jpg', 'Approved'),
(20, 'ihema', 'ihema@gmail.com', 'rwanda', 786665432, 'ihema@gmail.com', '07866654326340438da7e5f', 'T5673', '6340438da7e6c.jpg', 'Approved'),
(21, 'ukwezi', 'ijuru@gmail.com', 'gasabo', 2147483647, 'ihema', '123', 'T123', '634045944b361.jpg', 'Approved'),
(22, 'urwego', 'urwego@gmail.com', 'kicukiro', 789444532, 'urwego', '123', 'T-3242', '63467d2ead4b5.jpg', 'Approved'),
(23, 'CHIK', 'chick@gmail.com', 'nyarugenge', 789345527, 'chick', '123', 'T-2233', '6346882395399.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `conotification`
--

CREATE TABLE `conotification` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `notTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `companyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conotification`
--

INSERT INTO `conotification` (`id`, `content`, `notTime`, `status`, `companyId`) VALUES
(1, 'New customer booked sales space', '2021-02-21 19:45:33', 'read', 11),
(2, 'New customer booked Rent space', '2021-02-21 19:47:13', 'unread', 11),
(3, 'New customer booked sales space', '2021-02-24 07:59:46', 'unread', 11),
(4, 'New customer booked sales space', '2021-02-24 08:02:21', 'unread', 11),
(5, 'New customer booked Rent space', '2021-02-24 08:38:04', 'unread', 11),
(6, 'New customer booked Rent space', '2021-02-26 08:29:25', 'read', 11),
(7, 'New customer booked Rent space', '2021-02-26 08:29:23', 'read', 11),
(8, 'New customer booked Rent space', '2021-02-26 08:29:22', 'read', 11),
(9, 'New customer booked Rent space', '2021-02-26 08:29:21', 'read', 11),
(10, 'New customer booked sales space', '2021-02-26 08:29:19', 'read', 11),
(11, 'New customer booked sales space', '2021-02-26 08:45:55', 'unread', 11),
(12, 'New customer booked Rent space', '2021-02-26 08:59:50', 'unread', 11),
(13, 'New customer booked Rent space', '2021-02-26 09:07:56', 'unread', 11),
(14, 'New customer booked Rent space', '2021-02-26 09:08:30', 'unread', 11),
(15, 'New customer booked sales space', '2021-02-26 09:46:56', 'unread', 11),
(16, 'New customer booked Rent space', '2021-02-26 09:48:34', 'unread', 11),
(17, 'New customer booked sales space', '2021-02-26 09:55:43', 'unread', 11),
(18, 'New customer booked sales space', '2021-03-07 21:51:29', 'unread', 18),
(19, 'New customer booked Rent space', '2022-10-07 14:56:28', 'unread', 11),
(20, 'New customer booked Rent space', '2022-10-12 07:39:28', 'unread', 11),
(21, 'New customer booked Rent space', '2022-10-12 08:51:33', 'unread', 22),
(22, 'New customer booked Rent space', '2022-10-14 08:50:37', 'unread', 22),
(23, 'New customer booked Rent space', '2022-10-14 09:09:39', 'unread', 23),
(24, 'New customer booked Rent space', '2022-11-13 15:58:12', 'unread', 11),
(25, 'New customer booked Rent space', '2022-11-13 16:08:23', 'unread', 22),
(26, 'New customer booked Rent space', '2022-11-13 16:12:36', 'unread', 11),
(27, 'New customer booked Rent space', '2022-11-20 16:33:32', 'unread', 23),
(28, 'New customer booked Rent space', '2022-11-22 14:48:09', 'unread', 23),
(29, 'New customer booked Rent space', '2022-12-02 09:51:24', 'unread', 11),
(30, 'New customer booked Rent space', '2022-12-02 10:22:08', 'unread', 22),
(31, 'New customer booked Rent space', '2022-12-02 11:00:15', 'unread', 22),
(32, 'New customer booked Rent space', '2022-12-02 11:04:19', 'unread', 22),
(33, 'New customer booked Rent space', '2022-12-02 11:15:31', 'unread', 22),
(34, 'New customer booked Rent space', '2022-12-02 11:20:38', 'unread', 22),
(35, 'New customer booked Rent space', '2022-12-02 11:28:52', 'unread', 22),
(36, 'New customer booked Rent space', '2022-12-02 11:42:17', 'unread', 22),
(37, 'New customer booked sales space', '2022-12-24 18:32:51', 'unread', 11),
(38, 'New customer booked sales space', '2022-12-24 18:34:42', 'unread', 11),
(39, 'New customer booked sales space', '2022-12-24 18:38:33', 'unread', 11),
(40, 'New customer booked sales space', '2022-12-24 18:40:02', 'unread', 11),
(41, 'New customer booked sales space', '2022-12-24 18:41:14', 'unread', 11),
(42, 'New customer booked sales space', '2022-12-24 18:43:09', 'unread', 11),
(43, 'New customer booked sales space', '2022-12-24 19:02:22', 'unread', 11),
(44, 'New customer booked sales space', '2022-12-24 19:03:38', 'unread', 11),
(45, 'New customer booked sales space', '2022-12-24 19:20:44', 'unread', 11),
(46, 'New customer booked sales space', '2022-12-24 19:50:04', 'unread', 11),
(47, 'New customer booked sales space', '2022-12-24 19:54:31', 'unread', 11),
(48, 'New customer booked sales space', '2022-12-24 19:55:54', 'unread', 11),
(49, 'New customer booked sales space', '2022-12-24 19:57:47', 'unread', 11),
(50, 'New customer booked sales space', '2022-12-24 19:59:22', 'unread', 11),
(51, 'New customer booked sales space', '2022-12-24 20:12:55', 'unread', 11),
(52, 'New customer booked Rent space', '2022-12-24 21:04:42', 'unread', 11),
(53, 'New customer booked Rent space', '2022-12-24 21:13:16', 'unread', 11),
(54, 'New customer booked Rent space', '2022-12-24 21:17:25', 'unread', 11),
(55, 'New customer booked Rent space', '2023-01-05 08:40:18', 'unread', 22),
(56, 'New customer booked Rent space', '2023-01-05 08:45:29', 'unread', 22),
(57, 'New customer booked Rent space', '2023-01-05 08:48:11', 'unread', 22),
(58, 'New customer booked Rent space', '2023-01-05 09:00:09', 'unread', 22),
(59, 'New customer booked Rent space', '2023-01-05 09:42:26', 'unread', 22),
(60, 'New customer booked sales space', '2023-01-05 10:02:15', 'unread', 22),
(61, 'New customer booked Rent space', '2023-01-05 12:36:53', 'unread', 22),
(62, 'New customer booked Rent space', '2023-01-05 12:48:19', 'unread', 22),
(63, 'New customer booked Rent space', '2023-01-05 12:57:14', 'unread', 22),
(64, 'New customer booked Rent space', '2023-01-05 13:01:40', 'unread', 22),
(65, 'New customer booked Rent space', '2023-01-05 13:03:57', 'unread', 22),
(66, 'New customer booked Rent space', '2023-01-05 13:05:45', 'unread', 22),
(67, 'New customer booked Rent space', '2023-01-05 13:08:10', 'unread', 22),
(68, 'New customer booked sales space', '2023-01-05 13:10:06', 'unread', 22),
(69, 'New customer booked Rent space', '2023-01-05 13:33:04', 'unread', 22),
(70, 'New customer booked sales space', '2023-01-09 09:22:03', 'unread', 11),
(71, 'New customer booked Rent space', '2023-01-09 11:16:18', 'unread', 22),
(72, 'New customer booked Rent space', '2023-01-09 11:29:24', 'unread', 22),
(73, 'New customer booked Rent space', '2023-01-09 11:32:14', 'unread', 22),
(74, 'New customer booked sales space', '2023-01-09 11:40:22', 'unread', 22),
(75, 'New customer booked Rent space', '2023-01-11 07:59:38', 'unread', 23),
(76, 'New customer booked Rent space', '2023-01-11 08:05:37', 'unread', 23),
(77, 'New customer booked Rent space', '2023-01-11 08:19:52', 'unread', 23),
(78, 'New customer booked Rent space', '2023-01-11 08:28:45', 'unread', 23),
(79, 'New customer booked sales space', '2023-01-11 08:52:51', 'unread', 22),
(80, 'New customer booked Rent space', '2023-01-11 10:20:00', 'unread', 22);

-- --------------------------------------------------------

--
-- Table structure for table `contactco`
--

CREATE TABLE `contactco` (
  `id` int(11) NOT NULL,
  `fullnames` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status1` varchar(11) NOT NULL,
  `companyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactco`
--

INSERT INTO `contactco` (`id`, `fullnames`, `email`, `content`, `status1`, `companyId`) VALUES
(1, 'Hello', 'kigalirwanda@gmail.com', 'Muraho neza???', 'read', 11),
(2, 'Hello Company', 'email@gmail.com', 'Rwanda and rwanda with Rwandan,, we love you, we want to work hard for you, thanks for testing scripts', 'read', 11),
(3, 'bigwi', 'bigwi@gmail.com', 'rdfgh', 'read', 11),
(4, 'shema', 'bigwi@gmail.com', 'i want to by this house', 'read', 11),
(5, 'shema', 'bigwi@gmail.com', 'ydsyn,acgausybcdshgcz ', 'read', 11),
(6, 'bigwi', 'bigwi@gmail.com', 'dyhdjIDGIga', 'unread', 11);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullnames` varchar(255) DEFAULT NULL,
  `emails` varchar(255) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  `sentAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullnames`, `emails`, `subjects`, `messages`, `sentAt`, `status1`) VALUES
(1, 'My Names', 'mynames@gmail.com', 'Rwanda with Rwandans', 'Rwanda has great mountains and beautiful', '2021-02-18 13:39:02', 'read'),
(2, 'ubwino', 'ubwino@gmail.com', 'Aisha ecoute moi', 'Hello Aisha,,, it\'s pretty song i\'ve ever listened to', '2021-02-21 21:03:32', 'read'),
(3, 'check', 'no@gmail.com', 'Rwanda and Kigali', 'Kigali Kigali', '2021-02-18 17:31:16', 'read'),
(4, 'vid', 'vid@gmail.com', 'Rwas', 'Hello rwans', '2021-02-19 09:33:27', 'read'),
(5, 'Sheihk', 'hamdan@gmail.com', 'Rwans vis vis', 'Hello Test and great test', '2022-10-07 15:23:27', 'read'),
(6, 'Diane', 'diane@gmail.com', 'hello Rwanda', 'Helo for testing,', '2022-10-07 15:23:12', 'read'),
(7, 'ntama', 'intama@gmail.com', 'asking informations', 'helooooo', '2022-10-12 07:35:22', 'read'),
(8, 'shema', 'nkerabigwi6@gmail.com', 'hello', 'hello there', '2022-10-20 15:06:48', 'read'),
(9, 'furaha', 'furaha@gmail.com', 'asking informations', 'how are you', '2022-12-02 09:17:35', 'read'),
(10, 'furaha', 'furaha@gmail.com', '', 'sesgfsajdhlksajcgyfnbvnmalkjfz', '2023-01-09 09:54:41', 'read'),
(11, 'eva', 'tuyisengeevaliste532@gmail.com', 'asking informations', 'asdfghj tyuqtqyt8q fegd fwdywyew fgdfe ewudyew gwew yytiqewqi geghqwq jwjwhge hhwhe ggweg j    wygeewjw ewuyuw ygwgewyuw gehwjjw ewuwh jwe ', '2023-01-11 11:44:47', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullnames` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cusLocation` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `reserveStatus` varchar(100) NOT NULL,
  `offId` int(11) NOT NULL,
  `reserveId` varchar(100) NOT NULL,
  `companyId` int(11) NOT NULL,
  `transaction_id` varchar(250) DEFAULT NULL,
  `resTime` date NOT NULL DEFAULT current_timestamp(),
  `approvedAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullnames`, `phoneNumber`, `email`, `cusLocation`, `checkin`, `checkout`, `reserveStatus`, `offId`, `reserveId`, `companyId`, `transaction_id`, `resTime`, `approvedAt`) VALUES
(83, 'shema', '0786653000', 'evaliste@gmail.com', 'kigali', '2023-01-11', '2023-01-31', 'SUCCESS', 10, '40041700982347561', 22, '14ce6561-c166-4a8a-af58-d64bd818cf8c', '2023-01-11', '2023-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `rooms` varchar(100) NOT NULL,
  `propertyId` varchar(255) NOT NULL,
  `area` varchar(100) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `saleStatus` varchar(100) NOT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `companyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `location`, `contact`, `price`, `rooms`, `propertyId`, `area`, `descriptions`, `status`, `saleStatus`, `thumnail`, `photo1`, `photo2`, `photo3`, `companyId`) VALUES
(1, 'New Range Appartments', 'Kigali Gasabo', '0788617724', 260, '43', 'NEW RANGE APPARTMENTS202102112021', '10', 'We\'re proud to be Rwanda, ', 'Sales', 'reserve', '60338aa9bbd31.jpg', '60338aa9bbd35.jpg', '60338aa9bbd36.jpg', '60338aa9bbd37.jpg', 11),
(2, 'Rwanda Academy', 'Kigali, Gacuriro', '0788729234', 550, '150', 'RWANDA ACADEMY FOR GROUP202102112021', '300', 'Lorem epsom with great text for sampling', 'Rent', 'reserve', '6033891f0dec7.jpg', '6033891f0deca.jpg', '6033891f0decb.jpg', '6033891f0decc.jpg', 11),
(3, 'Gacuriro Appartment', 'Gasabo, KG 1', '0788346723', 10, '100', 'GACURIRO APPARTMENT202102112021', '159', 'Rwanda, with Rwanda', 'Rent', 'reserve', '60338bcdf1aed.jpg', '60338bcdf1af4.jpg', '60338bcdf1af7.jpg', '60338bcdf1afb.jpg', 11),
(4, 'Test FIle', 'NYARUTARAMA', '404830840380', 84032, '40932', 'TEST FILE202103182021', '48309', 'Some descriptions', 'Rent', 'reserve', '60454ab351eec.jpg', '60454ab351ef1.jpg', '60454ab351ef2.jpg', '60454ab351ef3.jpg', 18),
(5, 'Urwego', 'kicukiro', '0789262341', 10, '5', 'URWEGO202210222022', '12', 'it has every thing,', 'Sales', 'reserve', '634d28de2ce5f.jpg', '634d28de2ce65.jpg', '634d28de2ce67.jpg', '634d28de2ce69.jpg', 22),
(6, 'CHIK', 'Nyarugenge', '2507222546734', 10, '50', 'CHIK202210232022', '300', 'ffdhjdkjhwqkjhdgw', 'Rent', 'reserve', '634689c68a090.jpg', '634689c68a0b1.jpg', '634689c68a0bd.jpg', '634689c68a0c4.jpg', 23),
(7, 'chich rooms', 'f2-324/chick', '078999934345', 10, '5', 'CHICH ROOMS202211222022', '80', 'this is good spaces', 'Sales', 'reserve', '6371164045c68.jpg', '6371164045c6e.jpg', '6371164045c6f.jpg', '6371164045c70.jpg', 22),
(8, 'F3 325', 'F3, ROOM 325', '0788546270', 200, '3', 'F3 325202211232022', '80', 'GOOD SPACE', 'Rent', 'reserve', '637a5ce566c3d.jpg', '637a5ce566d30.jpg', '637a5ce566d32.jpg', '637a5ce566d33.jpg', 23),
(9, 'Umuyenzi house', 'Kimironko', '0789332425', 10, '2', 'UMUYENZI HOUSE202212222022', '80', 'GOOD SPACE ', 'Rent', 'reserve', '6389d0df4ffb6.jpg', '6389d0df4ffbf.jpg', '6389d0df4ffc3.jpg', '6389d0df4ffc4.jpg', 22),
(10, 'm peace plaza f15', 'Nyarugenge', '0789452542', 10, '5', 'M PEACE PLAZA F15202301222023', '30', 'has every thing', 'Rent', 'reserved', '63bbe1a392958.jpg', '63bbe1a39295d.jpg', '63bbe1a39295e.jpg', '63bbe1a39295f.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `phone`, `address`, `dob`, `username`, `passwords`, `profile`) VALUES
(1, 'Fuadi', 'renemucyo@gmail.com', '984237492834', 'Kigali Rwanda', '2021-03-26', 'user1', '123', 'avatar-male.jpg'),
(2, 'shema', 'nkerabigwi6@gmail.com', '0789223264', 'kigali', '2000-12-02', 'bigwi', '123', 'avatar-male'),
(3, 'furaha', 'huraha@gamail.com', '0789555654', 'kigali', '2002-04-23', 'furaha', '123', 'avatar-male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminnotification`
--
ALTER TABLE `adminnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comTIN` (`comTIN`);

--
-- Indexes for table `conotification`
--
ALTER TABLE `conotification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyId` (`companyId`);

--
-- Indexes for table `contactco`
--
ALTER TABLE `contactco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyId` (`companyId`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reserveId` (`reserveId`),
  ADD KEY `offId` (`offId`),
  ADD KEY `companyId` (`companyId`) USING BTREE;

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `propertyId` (`propertyId`),
  ADD KEY `companyId` (`companyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminnotification`
--
ALTER TABLE `adminnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `conotification`
--
ALTER TABLE `conotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `contactco`
--
ALTER TABLE `contactco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conotification`
--
ALTER TABLE `conotification`
  ADD CONSTRAINT `conotification_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contactco`
--
ALTER TABLE `contactco`
  ADD CONSTRAINT `contactco_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`offId`) REFERENCES `offices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
