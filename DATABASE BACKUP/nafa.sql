-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nafa`
--

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `AUDIT_ID` varchar(100) NOT NULL,
  `SVC_NO` varchar(100) NOT NULL,
  `ACTION` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `ACCOUNT` varchar(20) NOT NULL,
  `DATE_TIME` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`AUDIT_ID`, `SVC_NO`, `ACTION`, `DESCRIPTION`, `ACCOUNT`, `DATE_TIME`) VALUES
('STMF12410', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-08 07:52:15.000000'),
('STMF92499', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-08 07:49:16.000000'),
('STMM12418', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-11 10:57:04.000000'),
('STMM22421', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-11 10:56:30.000000'),
('STMS12411', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-09 03:50:46.000000'),
('STMS12412', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-09 02:55:07.000000'),
('STMS22421', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-09 03:51:06.000000'),
('STMS52458', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-09 02:55:25.000000'),
('STMT12410', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-07 06:41:11.000000'),
('STMT12411', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-07 07:59:14.000000'),
('STMT12412', 'testAdmin', 'archive', 'testAdmin archived a signal document with ref->NAF/531/HQ, dtg->DTG test, control no->test control no, document date->2024-02-27 and subject->CIS MATTERS - REQ FOR CIS EQPT STATUS IN YOUR AOR', 'ADMIN', '2024-03-07 07:53:46.000000'),
('STMT12413', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:28:12.000000'),
('STMT12414', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-07 11:20:04.000000'),
('STMT12416', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:26:07.000000'),
('STMT12417', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 08:07:32.000000'),
('STMT12418', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:25:37.000000'),
('STMT12419', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 06:45:11.000000'),
('STMT22420', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:25:54.000000'),
('STMT22421', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-07 06:39:42.000000'),
('STMT22428', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:28:38.000000'),
('STMT32430', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 06:42:11.000000'),
('STMT32435', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 11:59:34.000000'),
('STMT32438', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:30:35.000000'),
('STMT42441', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:21:19.000000'),
('STMT42442', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 17:16:53.000000'),
('STMT42444', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:29:59.000000'),
('STMT42447', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-07 11:20:42.000000'),
('STMT42449', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:24:42.000000'),
('STMT52454', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:26:19.000000'),
('STMT52458', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 06:40:44.000000'),
('STMT52459', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-07 11:41:13.000000'),
('STMT62461', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-07 17:19:54.000000'),
('STMT62464', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-07 06:45:07.000000'),
('STMT72470', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-07 06:40:57.000000'),
('STMT72476', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:21:38.000000'),
('STMT82480', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-07 07:52:01.000000'),
('STMT82486', 'testAdmin', 'Retrieve', 'testAdmin retrieved all the documents (1) from the archive', 'ADMIN', '2024-03-07 11:21:31.000000'),
('STMW12410', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 13:45:20.000000'),
('STMW12413', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 16:31:28.000000'),
('STMW12414', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 13:40:40.000000'),
('STMW12417', 'testAdmin', 'create', 'testAdmin created a new pers of type->OFFR and svc no->testSuperEditor', 'ADMIN', '2024-03-06 16:28:45.000000'),
('STMW12418', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 15:49:54.000000'),
('STMW12419', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 16:19:41.000000'),
('STMW22420', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 15:41:55.000000'),
('STMW22423', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 16:19:57.000000'),
('STMW22424', 'testAdmin', 'create', 'testAdmin created a new pers of type->OFFR and svc no->testAdminfsfdsfs', 'ADMIN', '2024-03-06 16:32:03.000000'),
('STMW22426', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 13:46:44.000000'),
('STMW32435', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-06 13:15:12.000000'),
('STMW52452', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 13:48:06.000000'),
('STMW52456', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 16:19:36.000000'),
('STMW52457', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 15:41:46.000000'),
('STMW62466', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 15:50:11.000000'),
('STMW92492', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 16:37:26.000000'),
('STMW92494', 'testAdmin', 'Login', 'testAdmin Logged in', 'ADMIN', '2024-03-06 16:23:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BRANCH_CODE` varchar(100) NOT NULL,
  `BRANCH` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BRANCH_CODE`, `BRANCH`, `REMARK`) VALUES
('AIR SEC', 'AIR SEC', 'NIL'),
('CAB', 'ACCT &amp; BUD', 'NIL'),
('CAcE', 'AcE', 'NIL'),
('CAI', 'AIR INT', 'NIL'),
('CCIS', 'CIS', 'NIL'),
('CLOG', 'LOG', 'NIL'),
('CMS', 'MED SVCS', 'NIL'),
('COA', 'ADMIN', 'NIL'),
('COPP', 'POL &amp; PLANS', 'NIL'),
('COSE', 'STANEVAL', 'NIL'),
('CTOP', 'TRG &amp; OPS', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `directorates`
--

CREATE TABLE `directorates` (
  `DIRECTORATE_CODE` varchar(100) NOT NULL,
  `DIRECTORATE` varchar(100) NOT NULL,
  `BRANCH_CODE` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directorates`
--

INSERT INTO `directorates` (`DIRECTORATE_CODE`, `DIRECTORATE`, `BRANCH_CODE`, `REMARK`) VALUES
('DCOMMS', 'DCOMMS', 'CCIS', 'NIL'),
('DEW', 'DEW', 'CCIS', 'NIL'),
('DIT', 'DIT', 'CCIS', 'NIL'),
('DSPACE', 'DSPACE', 'CCIS', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `DOCUMENT_ID` varchar(100) NOT NULL,
  `DOCUMENT_TYPE` varchar(100) NOT NULL,
  `SUBJECT` varchar(500) NOT NULL,
  `PRE_REF` varchar(20) NOT NULL,
  `REF_NO` varchar(20) NOT NULL,
  `POST_REF` varchar(20) NOT NULL,
  `REF` varchar(50) NOT NULL,
  `BODY` varchar(10000) NOT NULL,
  `DIRECTORATE_ID` varchar(20) NOT NULL,
  `SY_CLASS` varchar(20) NOT NULL,
  `DOCUMENT_DATE` date NOT NULL,
  `DATE_ARCHIVED` date NOT NULL,
  `TIME` time(6) NOT NULL,
  `DTG` varchar(50) NOT NULL,
  `CONTROL_NO` varchar(20) NOT NULL,
  `FILE_PATH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`DOCUMENT_ID`, `DOCUMENT_TYPE`, `SUBJECT`, `PRE_REF`, `REF_NO`, `POST_REF`, `REF`, `BODY`, `DIRECTORATE_ID`, `SY_CLASS`, `DOCUMENT_DATE`, `DATE_ARCHIVED`, `TIME`, `DTG`, `CONTROL_NO`, `FILE_PATH`) VALUES
('65e9647a7a3d2', 'Signal', 'CIS MATTERS - REQ FOR CIS EQPT STATUS IN YOUR AOR', 'NAF', '321', 'DIT', 'NAF/531/HQ', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit tristique proin taciti a et.Vestibulum curae fermentum ligula per neque scelerisque ad, integer congue lacinia aliquam fames volutpat mus, turpis facilisi eros bibendum nisl tortor.Varius convallis taciti aenean et finibus egestas sapien ipsum, conubia ac proin commodo venenatis interdum arcu mollis, nec vel gravida fermentum per velit primis.Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit tristique proin taciti a et.Vestibulum curae fermentum ligula per neque scelerisque ad, integer congue lacinia aliquam fames volutpat mus, turpis facilisi eros bibendum nisl tortor.Varius convallis taciti aenean et finibus egestas sapien ipsum, conubia ac proin commodo venenatis interdum arcu mollis, nec vel gravida fermentum per velit primis. Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit tristi', 'DIT', 'TOP SECRET', '2024-02-27', '2024-02-29', '07:53:46.000000', 'DTG test', 'test control no', '../uploads/65e9647a7d830_atest document.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nominal`
--

CREATE TABLE `nominal` (
  `PERS_TYPE` varchar(20) NOT NULL,
  `SVC_NO` varchar(20) NOT NULL,
  `RANK` varchar(20) NOT NULL,
  `INITIALS` varchar(20) NOT NULL,
  `SURNAME` varchar(100) NOT NULL,
  `SPECIALTY_TRADE` varchar(100) NOT NULL,
  `PRESENT_UNIT` varchar(50) NOT NULL,
  `DTOS` date NOT NULL,
  `DOB` date NOT NULL,
  `LAST_UNIT` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nominal`
--

INSERT INTO `nominal` (`PERS_TYPE`, `SVC_NO`, `RANK`, `INITIALS`, `SURNAME`, `SPECIALTY_TRADE`, `PRESENT_UNIT`, `DTOS`, `DOB`, `LAST_UNIT`, `EMAIL`, `PHONE`, `REMARK`) VALUES
('OFFR', 'test', 'SQN LDR', 'test', 'test', 'IT', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-28', '2024-02-28', '341 COMMS GP', 'xyz@airforce.mil.ng', '07054634234', 'NIL'),
('OFFR', 'test1', 'AIR CDRE', 'test1', 'test1', 'COMMS', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-26', '2024-02-28', '341 COMMS GP', 'test@airforce.mil.ng', '07054634234', 'NIL'),
('AIRMAN', 'test2', 'SGT', 'test2', 'test2', 'IT', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-27', '2024-03-01', '341 COMMS GP', 'xyz@airforce.mil.ng', '07054634234', 'NIL'),
('OFFR', 'testAdminfsfdsfs', 'AIR CDRE', 'test', 'test', 'IT', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-27', '2024-03-08', '341 COMMS GP', 'xyz@airforce.mil.ng', '07054634234', 'NIL2'),
('OFFR', 'testSuperEditor', 'SQN LDR', 'test1', 'xyz', 'IT', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-27', '2024-03-02', '341 COMMS GP', 'drrr@airforce.mil.ng', '07054634234', 'NIL'),
('OFFR', 'xyz', 'FLT LT', 'xyz', 'xyz', 'IT', 'ARCHIVING CENTRE(HQ NAF)', '2024-02-27', '2024-02-29', '341 COMMS GP', 'xyz@airforce.mil.ng', '07054634234', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `refno`
--

CREATE TABLE `refno` (
  `REF_NO_ID` varchar(20) NOT NULL,
  `REF_NO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refno`
--

INSERT INTO `refno` (`REF_NO_ID`, `REF_NO`) VALUES
('312', '312'),
('321', '321'),
('530', '530'),
('531', '531');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SVC_NO` varchar(20) NOT NULL,
  `USER_ROLE` varchar(20) NOT NULL,
  `ACCOUNT` varchar(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `RANK` varchar(20) NOT NULL,
  `INITIALS` varchar(20) NOT NULL,
  `SURNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SVC_NO`, `USER_ROLE`, `ACCOUNT`, `PASSWORD`, `RANK`, `INITIALS`, `SURNAME`) VALUES
('testAdmin', 'ADMIN', 'ADMIN', 'testAdmin', 'FLT LT', 'testAdmin', 'testAdmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`AUDIT_ID`),
  ADD KEY `userId` (`SVC_NO`),
  ADD KEY `SVC_NO` (`SVC_NO`),
  ADD KEY `UNIT_CODE` (`ACCOUNT`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BRANCH_CODE`);

--
-- Indexes for table `directorates`
--
ALTER TABLE `directorates`
  ADD PRIMARY KEY (`DIRECTORATE_CODE`),
  ADD KEY `BRANCH_CODE` (`BRANCH_CODE`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD KEY `DIRECTORATE_ID` (`DIRECTORATE_ID`);

--
-- Indexes for table `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`SVC_NO`);

--
-- Indexes for table `refno`
--
ALTER TABLE `refno`
  ADD PRIMARY KEY (`REF_NO_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SVC_NO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD CONSTRAINT `audittrail_ibfk_1` FOREIGN KEY (`SVC_NO`) REFERENCES `users` (`SVC_NO`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`DIRECTORATE_ID`) REFERENCES `directorates` (`DIRECTORATE_CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
