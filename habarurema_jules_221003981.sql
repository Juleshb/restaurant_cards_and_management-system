-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 06:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `habarurema_jules_221003981`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `employerDetails` ()   BEGIN
    select * from employer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCarsDetails` ()   BEGIN
    SELECT SUM(`amount`) FROM payment;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustomersDetail` ()   BEGIN
    select * from customers;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `amountId` int(6) NOT NULL,
  `amount` int(6) NOT NULL,
  `amountDescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amountId`, `amount`, `amountDescription`) VALUES
(1, 1000, 'amount of one meal');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `names` varchar(250) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(250) NOT NULL DEFAULT 'UR student',
  `registedDate` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `names`, `phone`, `address`, `registedDate`, `email`, `password`) VALUES
(1, 'HABARUREMA MUZIMA', 7222222, 'RUKARA', '2022-07-26', 'haba@gmail.com', 'Jules2020'),
(14, 'MUKUNDWA JEAN', 782223273, 'RUKARA', '2022-12-07', 'kiki@gmail.com', 'k'),
(15, 'GAKURU JC', 780020113, 'TABA', '2022-12-07', 'gakuru@gmail.com', 'gakuru'),
(16, 'Bugingo Emmanuel', 789028283, 'KIGALI', '2022-12-07', 'emmy@gmail.com', 'k'),
(18, 'hhhh', 5555555, 'huye', '2023-01-11', 'mimi', 'nini');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerspaid`
-- (See below for the actual view)
--
CREATE TABLE `customerspaid` (
`customerID` int(11)
,`names` varchar(250)
,`email` varchar(100)
,`amount` int(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `userID` int(6) NOT NULL,
  `Names` varchar(250) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `roleId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`userID`, `Names`, `Email`, `Phone`, `Password`, `roleId`) VALUES
(1, 'Jules hb 250', 'habaruremajules@gmail.com', 789028283, 'kiki@2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `customerID` int(6) NOT NULL,
  `amount` int(6) NOT NULL,
  `paymentDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`customerID`, `amount`, `paymentDate`) VALUES
(14, 60000, '2022-12-07'),
(15, 30000, '2022-12-07'),
(16, 80000, '2022-12-07'),
(16, 60000, '2022-12-07'),
(16, 40000, '2022-12-07'),
(16, 50000, '2022-12-07'),
(18, 1000, '2023-02-16');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `AfterDelete` AFTER DELETE ON `payment` FOR EACH ROW BEGIN  
DELETE FROM customers WHERE customers.customerID=payment.customerID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissionId` int(6) NOT NULL,
  `permissionName` varchar(250) NOT NULL,
  `permissionDescription` varchar(250) NOT NULL,
  `permissionCreatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissionId`, `permissionName`, `permissionDescription`, `permissionCreatedDate`) VALUES
(1, 'you are allowed to manage all users', '', '2022-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `customerID` int(6) NOT NULL,
  `amountId` int(6) NOT NULL DEFAULT 1,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`customerID`, `amountId`, `time`) VALUES
(1, 1, '2022-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(6) NOT NULL,
  `roleName` varchar(50) NOT NULL,
  `roleDescription` varchar(250) NOT NULL,
  `roleCreatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`, `roleDescription`, `roleCreatedDate`) VALUES
(1, 'Adimin', 'admins allows to manage all users of the company', '2022-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `roles and permissions`
--

CREATE TABLE `roles and permissions` (
  `roleId` int(6) NOT NULL,
  `permissionId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles and permissions`
--

INSERT INTO `roles and permissions` (`roleId`, `permissionId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalamount`
-- (See below for the actual view)
--
CREATE TABLE `totalamount` (
`SUM(``amount``)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `customerspaid`
--
DROP TABLE IF EXISTS `customerspaid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerspaid`  AS SELECT `customers`.`customerID` AS `customerID`, `customers`.`names` AS `names`, `customers`.`email` AS `email`, `payment`.`amount` AS `amount` FROM (`customers` join `payment` on(`customers`.`customerID` = `payment`.`customerID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `totalamount`
--
DROP TABLE IF EXISTS `totalamount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalamount`  AS SELECT sum(`payment`.`amount`) AS `SUM(``amount``)` FROM `payment``payment`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`amountId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roles_ibfk_1` (`roleId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `Payment_ibfk_1` (`customerID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissionId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD KEY `Reservation_ibfk_1` (`customerID`),
  ADD KEY `Reservation1_ibfk_1` (`amountId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `roles and permissions`
--
ALTER TABLE `roles and permissions`
  ADD KEY `Roles and Permissions_ibfk_1` (`permissionId`),
  ADD KEY `Roles and Permission_ibfk_1` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `amountId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissionId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Reservation1_ibfk_1` FOREIGN KEY (`amountId`) REFERENCES `amount` (`amountId`),
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);

--
-- Constraints for table `roles and permissions`
--
ALTER TABLE `roles and permissions`
  ADD CONSTRAINT `Roles and Permission_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`),
  ADD CONSTRAINT `Roles and Permissions_ibfk_1` FOREIGN KEY (`permissionId`) REFERENCES `permissions` (`permissionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
