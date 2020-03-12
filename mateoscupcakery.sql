-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 10:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mateoscupcakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `contact_no`) VALUES
(9, 'Jing Balili', 'Poblacion Ondol, Loboc', '5379043'),
(10, 'Ydol Balili', 'Poblacion Ondol, Loboc', '3447867'),
(11, 'Saf Balili', 'Villaflor, Loboc', '5557790'),
(12, 'Marcfe Salvador', 'Jimili-an,Loboc', '2347689'),
(13, 'Mark Sotto', 'Agape, Bohol', '3445678'),
(14, 'Kristen Stewart', 'Alegria, Loboc', '09332726546');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_type` varchar(50) NOT NULL,
  `order_dp_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_date`, `order_type`, `order_dp_date`, `order_status`, `user_id`) VALUES
(155, 12, '2015-10-10 02:23:55', 'Pick Up', '2015-10-11', 'Completed', 1),
(157, 10, '2015-10-10 02:26:26', 'Pick Up', '2015-10-10', 'Completed', 1),
(160, 9, '2015-10-10 02:53:59', 'Delivery', '2015-10-10', 'Completed', 1),
(188, 10, '2015-10-10 16:30:16', 'Pick Up', '2015-10-10', 'Now Baking', 1),
(189, 11, '2015-10-10 16:31:59', 'Pick Up', '2015-10-12', 'In Process', 1),
(190, 9, '2015-10-10 19:20:30', 'Pick Up', '2015-10-10', 'Completed', 1),
(191, 14, '2015-10-10 19:32:03', 'Delivery', '2015-10-11', 'In Process', 1),
(192, 9, '2015-10-10 19:39:06', 'Pick Up', '2015-10-17', 'In Process', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
`order_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=338 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `product_id`, `order_id`, `quantity`) VALUES
(326, 23, 187, 1),
(327, 18, 188, 1),
(328, 19, 188, 3),
(329, 18, 189, 1),
(330, 23, 189, 2),
(331, 18, 190, 1),
(332, 19, 190, 1),
(333, 21, 191, 1),
(334, 22, 191, 3),
(336, 20, 192, 1),
(337, 21, 192, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `product_picture` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `description`, `status`, `product_picture`) VALUES
(19, 'Carrot Cupcake', 25, 'Flavorful with grated carrots and nuts and are frosted with a delicious cream cheese frosting.   ', 'Available', 'carrot1.jpg'),
(20, 'Chocolate Cupcake', 20, 'Simple, yet really delicious chocolate cupcakes. ', 'Available', 'chocolate.jpg'),
(21, 'Rocky Road Cupcake', 25, 'Gooey, crunchy, decadent little cupcakes with big chocolate flavor', 'Available', 'rocky_road.jpg'),
(22, 'Vanilla Cupcake', 25, 'Wonderfully sweet and buttery and are frosted with a lovely Buttercream', 'Available', 'vanilla1.jpg'),
(23, 'Ube Cupcake', 25, 'Moist ube cupcakes filled with ube jam', 'Available', 'ube1.jpg'),
(24, 'Blueberry Cupcake', 30, 'Bursting with vanilla, juicy blueberries, and a hint a lemon', 'Available', 'blueberry2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Josafe', 'Balili', 'JBalili', 'invincible88');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
 ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=338;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
