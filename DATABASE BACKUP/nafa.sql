-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 12:59 PM
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
('STMW12412', 'testAdmin', 'Logout', 'testAdmin Logged out', 'ADMIN', '2024-03-06 12:57:45.000000'),
('STMW12415', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-06 12:56:59.000000'),
('STMW12419', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-06 12:57:09.000000'),
('STMW32430', 'testAdmin', 'visit', 'testAdmin visited the adminUsers page', 'ADMIN', '2024-03-06 12:56:52.000000'),
('STMW72475', 'testAdmin', 'failed delete attempt', 'testAdmin tried deleting a user named  testAdmin', 'ADMIN', '2024-03-06 12:56:56.000000');

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
