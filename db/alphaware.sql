-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 07:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphaware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `email`, `message`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_size`, `product_image`, `brand`, `category`) VALUES
(3, 'PLAYBOY CASUAL PANTS', '12000', 'M', 'bottom1.jpg', 'PLAYBOY', 'bottom'),
(4, 'THE NORTH FACE SUN STASH HAT', '12000', 'M', 'cap1.jpg', 'THE NORTH FACE', 'cap'),
(6, 'HARAJUKU BEAR HOODIE', '13000', 'M', 'top1.jpg', 'HARAJUKU', 'top'),
(7, 'jeans', '15000', 'M', 'bottom5.jpg', 'ELLE', 'bottom'),
(8, 'Beechfield Herringbone Cap', '18000', 'freesize', 'cap2.jpg', 'Beechfield Herringbone', 'cap'),
(9, 'Floral Lace Dress', '18000', 'M', 'top2.jpg', 'YENKYE', 'top'),
(10, 'Champion jogger pants', '18000', '10', 'bottom6.jpg', 'Champion', 'bottom'),
(11, 'Supreme Washed Chino Twill Camp Cap', '18000', 'freesize', 'cap3.jpg', 'Supreme Washed', 'cap'),
(13, 'Fear of God Essentials Hoodie', '10000', 'M', 'top4.jpg', 'Essentials', 'top'),
(14, 'Pull&Bear Pleated Skirt', '12000', 'M', 'bottom7.jpg', 'Pull&Bear', 'bottom'),
(15, 'Polo Ralph Lauren Baseball Cap', '12000', 'freesize', 'cap4.jpg', 'Polo', 'cap'),
(16, 'Los Angeles Hoodie', '12000', 'M', 'top5.jpg', 'Los Angeles', 'top'),
(17, 'Demon Slayer Swetpants', '12000', '8', 'bottom8.jpg', 'DS', 'bottom'),
(19, 'Brixton Vega Cap', '8000', '9', 'cap5.jpg', 'Brixton', 'cap'),
(20, 'astronaut hoodie', '8000', '10', 'top6.jpg', 'DTF', 'top'),
(21, 'Giorgio Armani', '8000', 'M', 'bottom12.jpg', 'Giorgio Armani', 'bottom'),
(26, 'Adidas Cap', '15000', 'freesize', 'cap7.jpg', 'Adidas', 'cap'),
(28, 'Shein Zip Up Hoodie', '18000', '9', 'top7.jpg', 'Shein', 'top'),
(29, 'Alondra Long Skirt', '10000', '9', 'bottom13.jpg', 'Alondra', 'bottom'),
(30, 'Letter C Baseball Vintage Cap', '8000', 'freesize', 'cap8.jpg', 'Shengang', 'cap'),
(31, 'California', '10000', 'M', 'top9.jpg', 'Essentials', 'top'),
(157, 'Womens High Waist Plaid Skirt ', '10000', '9', 'bottom14.jpg', 'TheUnknown', 'feature'),
(21561, 'Cat Ears Pilot Glass Cap', '15000', '10', 'cap9.jpg', 'Chlorina', 'feature'),
(51292, 'botton t-shirt', '10000', 'M', 'top10.jpg', 'AS', 'feature'),
(358159, 'Vanessa Seward Burton', '8000', 'M', 'bottom15.jpg', 'VSB', 'feature'),
(431860, 'PLAYBOY CASUAL PANTS', '12000', 'M', 'bottom2.jpg', 'PLAYBOY', 'feature'),
(961461, 'Aelfric Eden Varsity Jacket', '9000', 'M', 'top12.jpg', 'Aelfric Eden', 'feature');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `qty`) VALUES
(1, 71339, 20),
(2, 82631, 30),
(3, 3, 20),
(4, 4, 20),
(5, 6, 20),
(6, 7, 20),
(7, 8, 20),
(8, 9, 20),
(9, 10, 19),
(10, 11, 23),
(11, 13, 20),
(12, 14, 20),
(13, 15, 20),
(14, 16, 20),
(15, 17, 20),
(16, 19, 20),
(17, 20, 20),
(18, 21, 20),
(19, 26, 13),
(20, 28, 20),
(21, 29, 18),
(22, 30, 20),
(23, 31, 20),
(26, 431860, 40),
(27, 21561, 30),
(28, 358159, 30),
(29, 157, 25),
(30, 51292, 20),
(31, 961461, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_stat` varchar(100) NOT NULL,
  `order_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transacton_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transacton_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `transacton_detail_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
