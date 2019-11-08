-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 10:48 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekhayafoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `burger`
--

CREATE TABLE `burger` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `img_url` varchar(30) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `burger`
--

INSERT INTO `burger` (`id`, `name`, `img_url`, `price`, `qty`) VALUES
(1, 'Thender Chicken', 'TENDERCRISPCHICKEN.png', '80', 200),
(2, 'Tasty Smash Burger', 'Tasty Smash Burger.jpg', '80', 200),
(3, 'Spicy Chicken Burger', 'spicy chicken burger 2.jpg', '60', 200),
(4, 'Salad Burger', 'Salad Burger.png', '50', 200),
(5, 'McFeats Spicy Burger', 'McFeats-Spicy.png', '70', 200),
(6, 'Durban Flavour', 'impossibileburger.jpg', '60', 200),
(7, 'Double Whooper Burger', 'Double Whooper burger.png', '80', 200),
(8, 'King Burger', 'category burgers.jpg', '60', 200),
(9, 'Junior Chicken Burger', 'Bigmall Messenger.jpg', '50', 200),
(10, 'American Burger', 'All american burger.jpg', '80', 200);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `img_url` varchar(60) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `img_url`, `price`, `qty`) VALUES
(1, '2L Thums Up', '2 Thums Up.jpg', '20', 127),
(2, '2L Coca-Cola Coke', '2L Coke.jpg', '20', 127),
(3, '2L Fanta Grape', '2L Fanta Grape.jpg', '20', 127),
(4, '2L Lemon Twist', '2L Lemon Twist.jpg', '20', 127),
(5, '2L Pepsi', '2L Pepsi.jpg', '20', 127),
(6, '2L Sprite', '2L Sprite.jpg', '20', 127),
(7, '2L Stoney', '2L Stoney.jpg', '20', 127),
(8, '2L Tab', '2L Tab.jpg', '20', 127),
(9, '750ml Coca-Cola Coke', '750ml Coca-cola cold drink.jpg', '15', 127),
(10, '750ml Fanta Grape', '750ml Fanta Grape.jpg', '15', 127),
(11, '750ml Pepsi', '750ml Pepsi.jpg', '15', 127),
(12, '750ml Sprite', '750ml Sprite.jpg', '15', 127),
(13, '750ml Stoney', '750ml Stoney.jpg', '15', 127),
(14, '750ml Fanta Apple', 'Fanta Apple.jpg', '15', 127);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `order_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `vat` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`order_id`, `date`, `vat`, `total`) VALUES
(1, '0000-00-00 00:00:00', '36', '240'),
(3, '2019-09-07 18:10:47', '29', '190'),
(4, '2019-09-07 18:41:19', '30', '200'),
(5, '2019-09-20 16:34:26', '101', '675'),
(6, '2019-10-14 19:54:25', '96', '640'),
(7, '2019-10-15 08:33:35', '63', '420'),
(8, '2019-10-15 08:39:30', '59', '390');

-- --------------------------------------------------------

--
-- Table structure for table `sharing`
--

CREATE TABLE `sharing` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `img_url` varchar(30) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sharing`
--

INSERT INTO `sharing` (`id`, `name`, `img_url`, `price`, `qty`) VALUES
(1, '11 Piece Bucket', '11-pc bucket.jpg', '200', 127),
(2, 'Family treat', 'Family treat.jpg', '220', 127),
(3, 'Ribs and Wings', 'ribs-and-wings.jpg', '195', 127),
(4, 'Fino Platter', 'Fino Platter.jpg', '170', 127),
(5, 'Grilled Quarter Chicken', 'Grilled Quarter Chicken.jpg', '100', 127),
(6, 'Maple Glazed Hot Wings', 'Maple Glazed hot wings.jpg', '120', 127),
(7, 'Peri Peri Chicken', 'Peri Peri Chicken.jpg', '180', 127),
(8, 'Spur T Bone Steak', 'Spur T Bone steak.png', '210', 127),
(9, 'Big Six', 'Big Six.jpg', '145', 127);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_url` (`img_url`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_url` (`img_url`),
  ADD UNIQUE KEY `brand` (`name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `sharing`
--
ALTER TABLE `sharing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_url` (`img_url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sharing`
--
ALTER TABLE `sharing`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
