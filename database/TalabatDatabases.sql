-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 11:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talabat_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CustomerID` int(255) NOT NULL,
  `Email` varchar(512) NOT NULL,
  `phone_no` varchar(512) NOT NULL,
  `fname` varchar(512) NOT NULL,
  `lname` varchar(512) NOT NULL,
  `gender` varchar(512) NOT NULL,
  `pass` varchar(512) NOT NULL,
  `UserName` varchar(512) NOT NULL,
  `Address` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Email`, `phone_no`, `fname`, `lname`, `gender`, `pass`, `UserName`, `Address`) VALUES
(4, 'abdelrhmanyasser123@gmail.com', '1127456338', 'Abdelrhman', 'Yasser', 'male', '12345', 'AbdelrhmanY10', '3 suliman st , Ain Shams'),
(12, 'abdelrhmanyasser@gmail.com', '01127456338', 'Abdelrhman', 'Yasser', 'male', 'Zamalek1911#', 'AbdelrhmanY11', '3 suliman st , Ain Shams');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `mail` varchar(512) NOT NULL,
  `ID` int(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `hiredate` date NOT NULL,
  `position` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `Age` int(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `gender` varchar(512) NOT NULL,
  `phone_number` varchar(512) NOT NULL,
  `Address` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`mail`, `ID`, `password`, `hiredate`, `position`, `name`, `Age`, `salary`, `gender`, `phone_number`, `Address`) VALUES
('ahmed@gmail.com', 3, 'Ahmed123#', '2021-03-30', 'Office Manageer', 'Ahmed Medhat', 21, 150000, 'male', '01234567891', '3 suliman st , Ain Shams');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `ID` int(255) NOT NULL,
  `resturantName` varchar(512) NOT NULL,
  `MealName` varchar(512) NOT NULL,
  `Price` int(255) NOT NULL,
  `details` varchar(512) NOT NULL,
  `mealimg` varchar(512) NOT NULL,
  `number_of_orders` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `resturantName`, `MealName`, `Price`, `details`, `mealimg`, `number_of_orders`) VALUES
(1, 'KFC', 'Grand Feast', 253, '12 Pcs of chicken + Large Fries + Large Coleslaw + 5 Buns + 1 ltr Drink + 2 Rizo', 'GrandFeast.png', 5),
(2, 'KFC', 'Super MAMA', 361, '21 pcs of Chicken + 3 Large Rice + 1 Large Coleslaw + 1 L Pepsi', 'SuperMamaMeal.png', 10),
(3, 'KFC', 'Triple Treat', 260, '3 Supreme sandwiches + 3 coleslaws + 3 Drinks', 'TripleTreat.png', 15),
(4, 'KFC', 'Mighty Love', 250, '2 Mighty Zinger Sandwiches + 2 Coleslaw + 1 L Drink', 'MightyLove.png', 25),
(5, 'Heart Attack', '9 Pieces Chicken', 190, '9 fried chicken pieces, served with large French fries, medium coleslaw and 3 bread', '9picesMeal.jpg', 20),
(6, 'McDonals', 'Share Box', 190, 'Pick 2 sandwiches from Big Mac (beef/chicken) and McChicken + 2 sandwiches from Beefburger, cheeseburger and Chicken MacDo + 2 regular fries + 1.25 liter Coke', 'sharebox.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tab`
--

DROP TABLE IF EXISTS `orders_tab`;
CREATE TABLE `orders_tab` (
  `Order_ID` int(255) NOT NULL,
  `Order_Date` date NOT NULL,
  `Customer_ID` int(255) NOT NULL,
  `ResturantName` varchar(512) NOT NULL,
  `Price` int(255) NOT NULL,
  `MealsQuantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_tab`
--

INSERT INTO `orders_tab` (`Order_ID`, `Order_Date`, `Customer_ID`, `ResturantName`, `Price`, `MealsQuantity`) VALUES
(1, '2021-04-02', 12, 'KFC', 1300, 5),
(3, '2021-04-02', 12, 'McDonals', 190, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resturant`
--

DROP TABLE IF EXISTS `resturant`;
CREATE TABLE `resturant` (
  `Rest_name` varchar(512) NOT NULL,
  `Rest_JoinDate` date NOT NULL,
  `Rest_ID` int(255) NOT NULL,
  `Rest_no_Orders` int(255) NOT NULL,
  `Rest_Img` varchar(512) NOT NULL,
  `phone_number` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resturant`
--

INSERT INTO `resturant` (`Rest_name`, `Rest_JoinDate`, `Rest_ID`, `Rest_no_Orders`, `Rest_Img`, `phone_number`) VALUES
('McDonals', '2008-11-11', 12580, 10, 'mc.png', '19991'),
('KFC', '2008-12-11', 12590, 5, 'kfc.png', '19019 '),
('Heart Attack', '2008-12-30', 12591, 5, 'heartattack.png', '15428');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `resturantName` (`resturantName`);

--
-- Indexes for table `orders_tab`
--
ALTER TABLE `orders_tab`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `ResturantName` (`ResturantName`);

--
-- Indexes for table `resturant`
--
ALTER TABLE `resturant`
  ADD PRIMARY KEY (`Rest_ID`),
  ADD UNIQUE KEY `Rest_name` (`Rest_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_tab`
--
ALTER TABLE `orders_tab`
  MODIFY `Order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resturant`
--
ALTER TABLE `resturant`
  MODIFY `Rest_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12593;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`resturantName`) REFERENCES `resturant` (`Rest_name`) ON DELETE CASCADE;

--
-- Constraints for table `orders_tab`
--
ALTER TABLE `orders_tab`
  ADD CONSTRAINT `orders_tab_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `orders_tab_ibfk_2` FOREIGN KEY (`ResturantName`) REFERENCES `resturant` (`Rest_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
