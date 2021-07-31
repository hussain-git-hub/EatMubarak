-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 07:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfood_bak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `fld_id` int(10) NOT NULL,
  `fld_username` varchar(30) NOT NULL,
  `fld_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`fld_id`, `fld_username`, `fld_password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbfood`
--

CREATE TABLE `tbfood` (
  `food_id` int(11) NOT NULL,
  `fldvendor_id` int(11) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `cost` bigint(15) NOT NULL,
  `cuisines` varchar(50) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `fldimage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbfood`
--

INSERT INTO `tbfood` (`food_id`, `fldvendor_id`, `foodname`, `cost`, `cuisines`, `paymentmode`, `fldimage`) VALUES
(3, 22, 'shahi panner', 60, 'vegetable', 'COD', 'shahi.jpg'),
(4, 22, 'Pakistani plater', 100, 'lunch', 'COD', 'plater.jpg'),
(5, 23, 'Roll pratha', 100, ' fast food', 'COD', 'roll.jpg'),
(6, 23, 'Crust Pizza', 300, 'Fast food,large size', 'COD', 'pakistani.jpg'),
(7, 23, 'Beef Burger ', 350, 'Fast food', 'COD', 'photo-1534790566855-4cb788d389ec.jpg'),
(8, 22, 'Pasta', 170, 'Chinese', 'COD', '19931535_pates-a-la-sauce-tomate-et-basilic.jpg'),
(9, 22, 'Cheez Fries', 230, 'Fast Food', 'COD', 'image.jpg'),
(10, 23, 'shake', 170, 'drinks', 'COD', 'classic_snowball.jpg'),
(11, 23, 'cake', 450, 'dessert', 'COD', 'img_2018-07-13-10-58-02_5b4885ba9e40a.jpg'),
(12, 23, 'cake', 350, 'dessert', 'COD', 'download (1).jpg'),
(13, 23, 'molten choc', 530, 'dessert', 'COD', 'images.jpg'),
(14, 24, 'cheese sticks', 400, 'Fast Food', 'COD', 'mozzarella-cheese-sticks.jpg'),
(15, 24, 'flaming wings', 230, 'Fast Food', 'COD', '174.jpg'),
(16, 24, 'Cheese Sandwich', 300, 'Fast Food', 'COD', 'mac-and-cheese-grilled-cheese.jpg'),
(17, 24, 'Cheese Crunchy Pasta', 790, 'Chinese', 'COD', 'Bacon-and-cheese-pasta.jpg'),
(18, 25, 'Cheese lover Pizza', 700, 'Fast Food', 'COD', 'maxresdefault.jpg'),
(19, 25, 'pepperoni Pizza', 780, 'Fast Food', 'COD', 'image.jpg'),
(20, 25, 'Vegetable Pizza', 690, 'Fast Food', 'COD', 'Hot_Dog_Stuffed_Crust_Pizza.2e16d0ba.fill-1440x605.jpg'),
(21, 25, 'Crown crust ', 790, 'Fast Food', 'COD', '1394068564410.jpg'),
(23, 26, 'Caramel Macchiato', 560, 'drinks', 'COD', 'great-coffee-great-sevice.jpg'),
(24, 26, 'Hazelnut', 530, 'drinks', 'COD', 'download.jpg'),
(25, 26, 'Black Coffee', 470, 'drinks', 'COD', 'What-Is-Black-Coffee.jpg'),
(26, 26, 'Turkish Coffee', 480, 'drinks', 'COD', '38737621_1003563516492694_4277427688945221632_n-e1539950613399.jpg'),
(27, 26, 'Iced Coffee', 520, 'drinks', 'COD', 'Mocha-Coconut-Iced-Coffees-3.jpg'),
(28, 27, 'American Chicken Steak', 440, 'Fast Food', 'COD', 'm-rump_steak_new.jpg'),
(29, 27, 'Mexican Chicken Steak', 420, 'Fast Food', 'COD', 'chicken-fried-steak-recipe-with-gravy-on-plate.jpg'),
(30, 27, 'Black Pepper Chicken Steak', 449, 'Fast Food', 'COD', 'download (1).jpg'),
(31, 27, 'Fettuccine Arrabiata', 470, 'Chinese', 'COD', 'Pasta-Penne-allarrabbiata.jpg'),
(32, 28, 'Cappuccino / CafÃ© LattÃ©', 550, 'drinks', 'COD', 'download.jpg'),
(33, 28, 'Coffee of the Day ', 570, 'drinks', 'COD', 'Mocha-Coconut-Iced-Coffees-3.jpg'),
(34, 28, 'CafÃ© Mocha ', 670, 'drinks', 'COD', 'download (2).jpg'),
(35, 28, 'Caramelatte  ', 430, 'drinks', 'COD', 'What-Is-Black-Coffee.jpg'),
(37, 28, 'Mocha Caramelatte ', 650, 'drinks', 'COD', 'images (1).jpg'),
(38, 29, 'Mei Kong Hot chicken wings', 670, 'Chinese', 'COD', 'download (3).jpg'),
(40, 34, 'Caramel Macchiato ', 470, 'drinks', 'COD', 'download.jpg'),
(41, 34, 'Hazelnut', 520, 'drinks', 'COD', 'images.jpg'),
(42, 34, 'Black Coffee', 450, 'drinks', 'COD', 'What-Is-Black-Coffee.jpg'),
(43, 34, 'Turkish Coffee', 460, 'drinks', 'COD', '38737621_1003563516492694_4277427688945221632_n-e1539950613399.jpg'),
(44, 34, 'Iced Coffee ', 500, 'drinks', 'COD', 'images (1).jpg'),
(45, 30, 'shahi panner', 90, 'Fast Food', 'COD', 'download (3).jpg'),
(46, 30, 'Pakistani plater ', 110, 'Fast Food', 'COD', 'chicken-fried-steak-recipe-with-gravy-on-plate.jpg'),
(47, 30, 'Pasta ', 160, 'Chinese', 'COD', 'Pasta-Penne-allarrabbiata.jpg'),
(48, 30, 'Cheez Fries ', 240, 'Fast Food', 'COD', 'mozzarella-cheese-sticks.jpg'),
(49, 32, 'shahi panner', 110, 'Fast Food', 'COD', 'download (3).jpg'),
(50, 32, 'Pasta', 180, 'Chinese', 'COD', 'Bacon-and-cheese-pasta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `fld_cart_id` int(11) NOT NULL,
  `fld_product_id` bigint(11) NOT NULL,
  `fld_customer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`fld_cust_id`, `fld_name`, `fld_email`, `fld_mobile`, `password`) VALUES
(1, 'Ali', 'customer1@gmail.com', 7503515382, 'customer1'),
(2, 'sanjay', 'customer2@gmail.com', 7503515386, 'customer2'),
(3, 'saana', 'customer3@gmail.com', 7503515383, 'customer3'),
(4, 'mirab irfan', 'outfittersout@gmail.com', 3358770237, 'boyakashah789');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `fld_msg_id` int(10) NOT NULL,
  `fld_name` varchar(50) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_phone` bigint(10) DEFAULT NULL,
  `fld_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`fld_msg_id`, `fld_name`, `fld_email`, `fld_phone`, `fld_msg`) VALUES
(1, 'Rubab mughal', 'outfittersout@gmail.com', 0, 'best food');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `fld_order_id` int(10) NOT NULL,
  `fld_cart_id` bigint(10) NOT NULL,
  `fldvendor_id` bigint(10) DEFAULT NULL,
  `fld_food_id` bigint(10) DEFAULT NULL,
  `fld_email_id` varchar(50) DEFAULT NULL,
  `fld_payment` varchar(20) DEFAULT NULL,
  `fldstatus` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`fld_order_id`, `fld_cart_id`, `fldvendor_id`, `fld_food_id`, `fld_email_id`, `fld_payment`, `fldstatus`, `timestamp`) VALUES
(1, 1, 21, 1, 'customer3@gmail.com', '50', 'Delivered', '2020-12-16 14:09:15'),
(2, 2, 22, 3, 'customer3@gmail.com', '20', 'Out Of Stock', '2020-12-16 14:09:15'),
(3, 1, 22, 2, 'customer1@gmail.com', '50', 'Delivered', '2020-12-16 14:09:15'),
(4, 2, 23, 6, 'customer1@gmail.com', '300', 'In Process', '2020-12-16 14:09:15'),
(5, 2, 22, 4, 'customer1@gmail.com', '100', 'In Process', '2020-12-16 14:09:15'),
(6, 3, 23, 7, 'outfittersout@gmail.com', '50', 'cancelled', '2020-12-16 14:09:15'),
(7, 1, 22, 9, 'outfittersout@gmail.com', '230', 'cancelled', '2020-12-16 14:09:15'),
(8, 2, 23, 10, 'outfittersout@gmail.com', '170', 'cancelled', '2020-12-16 14:09:15'),
(9, 3, 22, 2, 'outfittersout@gmail.com', '70', 'In Process', '2020-12-16 14:09:15'),
(10, 4, 22, 2, 'outfittersout@gmail.com', '70', 'In Process', '2020-12-16 14:09:15'),
(11, 5, 22, 2, 'outfittersout@gmail.com', '70', 'In Process', '2020-12-16 14:09:15'),
(12, 1, 24, 17, 'outfittersout@gmail.com', '790', 'In Process', '2020-12-16 14:09:15'),
(13, 2, 26, 25, 'outfittersout@gmail.com', '470', 'In Process', '2020-12-16 14:09:15'),
(14, 3, 26, 24, 'outfittersout@gmail.com', '530', 'In Process', '2020-12-16 14:09:15'),
(15, 1, 24, 17, 'customer1@gmail.com', '790', 'cancelled', '2020-12-16 14:09:15'),
(16, 1, 24, 14, 'customer1@gmail.com', '400', 'In Process', '2020-12-16 19:35:43'),
(17, 1, 24, 15, 'customer3@gmail.com', '230', 'In Process', '2020-12-17 14:16:27'),
(18, 2, 27, 30, 'customer3@gmail.com', '449', 'In Process', '2020-12-17 14:16:52'),
(19, 3, 29, 38, 'customer3@gmail.com', '670', 'In Process', '2020-12-17 14:17:14'),
(20, 4, 34, 42, 'customer3@gmail.com', '450', 'Delivered', '2020-12-17 14:17:38'),
(21, 5, 32, 50, 'customer3@gmail.com', '180', 'In Process', '2020-12-17 14:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblreviews`
--

CREATE TABLE `tblreviews` (
  `fld_reviewID` int(11) NOT NULL,
  `fld_vendorID` int(11) NOT NULL,
  `fld_customerName` varchar(100) NOT NULL,
  `fld_review` varchar(200) NOT NULL,
  `fld_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreviews`
--

INSERT INTO `tblreviews` (`fld_reviewID`, `fld_vendorID`, `fld_customerName`, `fld_review`, `fld_rating`) VALUES
(14, 22, 'Shoaib', 'Food was delicious', 5),
(15, 22, 'Rubab', 'Service is a bit slow but food is nice.', 4),
(16, 22, 'Tamoor', 'Tasty', 4),
(20, 22, 'Shabi', 'Excellent', 5),
(21, 22, 'Sheheryar', 'Not satisfied.', 2),
(22, 22, 'Test', 'Test', 4),
(23, 23, 'Test', 'Testadadad asdahg asdhg asdhg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblvendor`
--

CREATE TABLE `tblvendor` (
  `fldvendor_id` int(10) NOT NULL,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_mob` varchar(11) NOT NULL,
  `fld_phone` varchar(13) NOT NULL,
  `fld_address` varchar(50) NOT NULL,
  `fld_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvendor`
--

INSERT INTO `tblvendor` (`fldvendor_id`, `fld_name`, `fld_email`, `fld_password`, `fld_mob`, `fld_phone`, `fld_address`, `fld_logo`) VALUES
(22, 'Hotel Radison', 'vendor1@gmail.com', 'vendor1', '03349783442', '051-14565457', 'Rawalpindi', '46388969.jpg'),
(23, 'Hot N Spicy', 'vendor2@gmail.com', 'vendor2', '03215798344', '051-4565457', 'C-33,PWD Islamabad', 'vendor2.jpg'),
(24, 'cheezious', 'cheezious@123gmail.com', 'cheezious123', '03316565788', '051-7676453', 'f7, Islamabad', 'Red Fork Restaurant Logo.png'),
(25, 'P for PIZZA', 'pizza@123', 'pizza123', '03358770237', '051-5656814', 'PWD,Islamabad', 'Black with Utensils Icon Restaurant Logo.png'),
(26, 'Second Cup', 'secondcup@789', 'pizza123', '03336789011', '051-588893', 'Bahria phase II', 'CPT10533587.jpg'),
(27, 'Cock & Bull', 'cocknbullpwd@gmail.com', 'cocknbull@789b', '0333876542', '051-7898456', 'PWD,Islamabad', 'White and Black Shape Hipster Logo.png'),
(28, '18 degree Cafe', '18degreecafe@gmail.com', '18degreecafe', '03467678900', '051-777490', 'PWD,Islamabad', 'Cafe and Bar Logo.png'),
(29, 'Mei Hong Loong', 'meihong@gmail.com', 'maihomh@789', '03348770237', '051-453339', 'Bahria phase III', 'Red Dragon Chinese Restaurant Logo.png'),
(30, 'Shinwari ', 'shinwari@gmail.com', 'shinwari@123', '03348770237', '051-7676453', 'PWD,Islamabad', 'Purple and Yellow Floral Dots Thaithai Restaurant Logo.png'),
(32, 'Tandoori', 'tandoori@gmail.com', 'tandoori123', '03357766821', '0517676453', 'PWD,Islamabad', 'Red Fork Restaurant Logo.png'),
(33, 'Taste Hub', 'tastehub786@gmail.com', 'tastehub@786', '03336789011', '0517676453', 'PWD,Islamabad', 'Red and Black Bowl Japanese Restaurant Logo.png'),
(34, 'Pappu Chai Wala', 'pappuchaiwala001@gmail.com', 'pappuchaiwala001', '03467678900', '0517875421', 'Bahria phase II', 'Brown and Turquoise Coffee Machine Cafe Logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbfood`
--
ALTER TABLE `tbfood`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `fldvendor_id` (`fldvendor_id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`fld_cart_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`fld_cust_id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`fld_msg_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`fld_order_id`);

--
-- Indexes for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD PRIMARY KEY (`fld_reviewID`);

--
-- Indexes for table `tblvendor`
--
ALTER TABLE `tblvendor`
  ADD PRIMARY KEY (`fldvendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `fld_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbfood`
--
ALTER TABLE `tbfood`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `fld_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `fld_msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `fld_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblreviews`
--
ALTER TABLE `tblreviews`
  MODIFY `fld_reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblvendor`
--
ALTER TABLE `tblvendor`
  MODIFY `fldvendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfood`
--
ALTER TABLE `tbfood`
  ADD CONSTRAINT `tbfood_ibfk_1` FOREIGN KEY (`fldvendor_id`) REFERENCES `tblvendor` (`fldvendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
