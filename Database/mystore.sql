-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'yasin vahora', 'yasin@gmail.com', '1234'),
(2, 'yasin vahora', 'yasin@gmail.com', '1234'),
(3, 'yasin vahora', 'yasin1234@gmail.com', '12345'),
(4, 'yasin vahora', 'aasif@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Amazon'),
(2, 'Facebook'),
(3, 'Apple'),
(6, 'Microsoft'),
(7, 'Samsung'),
(8, 'Google Plus'),
(9, 'Disney + Hostar'),
(12, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(100) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(1, '::1', 1),
(3, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(11, 'Dry Fruits'),
(12, 'Vegetables'),
(13, 'witamiv A based fruits'),
(14, 'juices'),
(15, 'Fashion'),
(16, 'Mobile Phone'),
(17, 'camera'),
(18, 'Categories');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 3, 772345894, 8, 5, 'pending'),
(2, 3, 1597845399, 9, 5, 'pending'),
(3, 3, 941243207, 9, 1, 'pending'),
(4, 3, 711211885, 3, 1, 'pending'),
(5, 3, 63732690, 9, 1, 'pending'),
(6, 3, 1945455883, 9, 1, 'pending'),
(7, 3, 2083834261, 4, 1, 'pending'),
(8, 3, 2116288148, 4, 1, 'pending'),
(9, 3, 267517222, 9, 1, 'pending'),
(10, 3, 83391050, 4, 1, 'pending'),
(11, 3, 960985012, 1, 1, 'pending'),
(12, 3, 1865161758, 1, 1, 'pending'),
(13, 3, 540256760, 4, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'comuter', 'computer of microsoft', 'pc,laptop', 1, 6, 'w11_N.png', 'windows7-laptop.png', ' windows10-laptop.png', '600', '2024-07-18 15:31:28', '1'),
(3, 'Think & Grow Rich', 'Think & Grow Rich - Premium: Classic all-time bestselling book on success, wealth management & personal growth by one of the greatest self-help authors, Napoleon Hill ', 'book , think and grow rich', 10, 1, '61b5aPmEhzL._SL1360_.jpg', '81U7EGrzvfL._SY466_.jpg', ' 71SaYL6XT4L._SL1500_.jpg', '180', '2024-07-19 13:17:50', '1'),
(4, 'iPhone 15 pro', 'iPhone 15 pro Apple smartphone. invented by Steve jobs.', 'iPhone, smartphone, matchbook pro', 1, 3, 'Apple-iPhone-15-Pro-Hero-Gear.webp', 'Apple-iPhone-15-Pro-lineup-Action-button-230912.jpg.large_2x.jpg', 'images.jfif', '100000', '2024-08-14 11:52:52', '1'),
(9, 'LIT Liquid Matte Lipstick', 'You found The One! Trust us, ladies, this liquid matte lipstick will be your new love!', 'Lip Makeup, Lip stick, Makeup', 15, 11, 'Dtrvw4.jpg', 'Dtrvw2.jpg', 'Dtrvw1.jpg', '299', '2024-08-15 08:05:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(12, 3, 600, 1865161758, 1, '2024-08-16 10:38:33', 'pending'),
(13, 3, 200000, 540256760, 1, '2024-08-22 06:02:56', 'Complate');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(2, 1, 772345894, 500000, 'Net Banking', '2024-08-15 08:06:56'),
(3, 3, 941243207, 299, 'Paypal', '2024-08-15 12:16:44'),
(4, 4, 711211885, 180, 'Cash On Delivary', '2024-08-16 05:34:44'),
(5, 5, 63732690, 299, 'Paypal', '2024-08-16 05:35:09'),
(6, 8, 2116288148, 100180, 'Net Banking', '2024-08-16 09:52:03'),
(7, 7, 2083834261, 100180, 'Net Banking', '2024-08-16 09:52:07'),
(8, 6, 1945455883, 100899, 'Net Banking', '2024-08-16 09:52:10'),
(9, 13, 540256760, 200000, 'Cash On Delivary', '2024-08-22 06:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_image` varchar(150) NOT NULL,
  `user_ip` varchar(150) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(3, 'yasin', 'yasin@gmail.com', '$2y$10$Hdf.dytB4kbuveM6ARwtEOfZ5pbZRaLMshrAN9jf.sOD4Oj7Q/M0S', 'Demo Image.jpg', '::1', 'Yasin\'s Demo Address', '6156132165'),
(6, 'Yasin Vohra', 'ysin1@gmail.com', '$2y$10$vzEAztpf456lepnQgg80N.3IbtTTR3rY75ToLH/Lin7Weh0ud7PdO', 'apple1.jpg', '::1', 'that is the ahead of any road side actually I don\'t know where have I live so don\'t ask me about my address', '5614986135'),
(7, 'yasin1234', 'yasin1234@gmail.com', '$2y$10$.ZveyWqikBc/R1Gt3mqF7OwAXMYdCAcWJ1LgDr8eBOFBLHVfbEhMa', 'admin.jpg', '::1', 'sdfdsv', '418545877');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
