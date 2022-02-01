-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2022 at 04:45 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `adminPass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `adminPass`) VALUES
(1, 'admin101', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodId` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `images` varchar(550) NOT NULL,
  `cart_D` text NOT NULL,
  `Cart_Q` int(11) NOT NULL,
  `Price` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prodId`, `userID`, `images`, `cart_D`, `Cart_Q`, `Price`) VALUES
(1, 1, 2, './Images/Products/Tshirt/T1.png', 'Migos Culture Black', 1, '80.00'),
(24, 2, 1, './Images/Products/Tshirt/T2.jpg', 'Octopus Dark Yellow Black', 1, '80.00'),
(23, 3, 1, './Images/Products/Tshirt/T3.jpg', 'Black Long Sleeve T-shirt', 1, '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `emailAddr` text NOT NULL,
  `mobileNo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `emailAddr`, `mobileNo`) VALUES
(1, 'Spha Dlodlo', '0817078976', 'vusimuzidlodlo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Surname` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `userPass` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Name`, `Surname`, `Email`, `userPass`) VALUES
(1, 'Vusi', 'Dlodlo', 'vusimuzidlodlo@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Dumisane', 'Ngubane', 'dumisane@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cusName` text NOT NULL,
  `cusSurname` text NOT NULL,
  `userName` text NOT NULL,
  `email` text NOT NULL,
  `cusAddress` text NOT NULL,
  `CountryName` text NOT NULL,
  `Statename` text NOT NULL,
  `ZipCode` text NOT NULL,
  `CardName` text NOT NULL,
  `CardNo` text NOT NULL,
  `ExpDate` text NOT NULL,
  `Cvv` text NOT NULL,
  `pName` text NOT NULL,
  `pTotal` text NOT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` text NOT NULL,
  `CostPrice` decimal(15,2) NOT NULL,
  `Quantity` decimal(10,0) NOT NULL,
  `SellPrice` decimal(15,2) NOT NULL,
  `product_image` text NOT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Description`, `CostPrice`, `Quantity`, `SellPrice`, `product_image`, `category`) VALUES
(1, 'Migos Culture Black', '80.00', '8', '79.99', './Images/Products/Tshirt/T1.png', 'T-shirt'),
(2, 'Octopus Dark Yellow Black', '80.00', '8', '79.99', './Images/Products/Tshirt/T2.jpg', 'T-shirt'),
(3, 'Black Long Sleeve T-shirt', '80.00', '8', '79.99', './Images/Products/Tshirt/T3.jpg', 'T-shirt'),
(4, 'Multicolor Dashiki', '80.00', '8', '79.99', './Images/Products/Tshirt/T4.jpg', 'T-shirt'),
(5, 'Cross Grey', '80.00', '8', '79.99', './Images/Products/Tshirt/T5.jpg', 'T-shirt'),
(6, 'Guess Grey', '80.00', '8', '79.99', './Images/Products/Tshirt/T6.jpg', 'T-shirt'),
(7, 'Unlock Code Black', '80.00', '8', '79.99', './Images/Products/Tshirt/T7.jpg', 'T-shirt'),
(8, 'Cool Graphic Black', '80.00', '8', '79.99', './Images/Products/Tshirt/T8.jpg', 'T-shirt'),
(9, 'Black Cap', '150.00', '5', '149.00', './Images/Products/Caps/C1.jpg', 'Caps'),
(10, 'White Polo Cap', '150.00', '8', '149.00', './Images/Products/Caps/C2.png', 'Caps'),
(11, 'Addids Snapnback', '150.00', '2', '149.00', './Images/Products/Caps/C3.jpg', 'Caps'),
(12, 'Hurley Phantom 4_0 Cap', '150.00', '3', '149.00', './Images/Products/Caps/C4.jpg', 'Caps'),
(13, 'Alien Ware Buckethat', '150.00', '4', '149.00', './Images/Products/Caps/C5.jpg', 'Caps'),
(14, 'Camo Snapback', '150.00', '6', '149.00', './Images/Products/Caps/C6.png', 'Caps'),
(15, 'Street Hiphop Black Caps ', '150.00', '7', '149.00', './Images/Products/Caps/C7.jpg', 'Caps'),
(16, 'Peep Black Cap', '150.00', '5', '149.00', './Images/Products/Caps/C8.jpg', 'Caps'),
(17, 'Sport R,B&W Jacket', '200.00', '10', '199.99', './Images/Products/Jackets/J1.jpg', 'Jackets'),
(18, 'Flux Navy Jacket', '200.00', '9', '199.99', './Images/Products/Jackets/J2.png', 'Jackets'),
(19, 'Flux Grey Jacket', '200.00', '4', '199.99', './Images/Products/Jackets/J3.png', 'Jackets'),
(20, 'Flux Red Jacket', '200.00', '4', '199.99', './Images/Products/Jackets/J4.JPG', 'Jackets'),
(21, 'Africa Navy Hoodie', '200.00', '3', '199.99', './Images/Products/Jackets/J5.jpg', 'Jackets'),
(22, 'Fgf Yellow Jacket', '200.00', '6', '199.99', './Images/Products/Jackets/J6.jpg', 'Jackets'),
(23, 'Red and Yellow Jacket', '200.00', '2', '199.99', './Images/Products/Jackets/J7.jpg', 'Jackets'),
(24, 'Grey Unisex Jacket', '200.00', '5', '199.99', './Images/Products/Jackets/J8.jpg', 'Jackets'),
(25, 'Alien Ware Buckethat', '130.00', '6', '129.99', './Images/Products/Buckethats/B1.jpg', 'Buckethats'),
(26, 'Fire Buckethat', '130.00', '3', '129.99', './Images/Products/Buckethats/B2.jpg', 'Buckethats'),
(27, 'Abstract Buckethat', '130.00', '5', '129.99', './Images/Products/Buckethats/B3.jpg', 'Buckethats'),
(28, 'Smiley Buckethat', '130.00', '2', '129.99', './Images/Products/Buckethats/B4.jpg', 'Buckethats'),
(29, 'Smiley Buckethat', '130.00', '7', '129.99', './Images/Products/Buckethats/B5.jpg', 'Buckethats'),
(30, 'O Pirates Buckethat', '130.00', '2', '129.99', './Images/Products/Buckethats/B6.jpg', 'Buckethats'),
(31, 'Nail and Steel styled Buckethat', '130.00', '6', '129.99', './Images/Products/Buckethats/B7.jpg', 'Buckethats'),
(32, 'Northface Buckethat', '130.00', '4', '129.99', './Images/Products/Buckethats/B8.jpg', 'Buckethats');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
