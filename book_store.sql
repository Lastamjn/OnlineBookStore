-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 04:41 PM
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
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '::1', 0),
(3, '::1', 0),
(4, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fiction'),
(2, 'Non-Fiction'),
(3, 'Horror'),
(4, 'biography'),
(5, 'thriller');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(20) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'The Dust That Falls From Dreams', 'One hundred and one summers after the guns of August sounded, Louis de Bernieres gave us this poignant novel following the fates of three families through World War I. In so doing, he added a worthy entry to this year’s stories about bomber pilots with ch', ' Louis De Bernieres, The Dust That Falls From Dreams', 1, 'Fiction1.PNG', '', '', '1500', '2023-07-06 03:24:19', 'true'),
(2, 'The Mark and the Void', 'The global financial crisis has not inspired much comedy, but Paul Murray (who made this list in 2010 for his Irish-boarding-school charmer Skippy Dies) finds nihilistic humor in a band of bankers capitalizing on the post-crash chaos. His way in? A burned', 'Paul Murray, The Mark And The Void', 1, 'Fiction2.PNG', '', '', '1250', '2023-07-06 03:26:45', 'true'),
(3, 'The Witches, Stacy Schiff', 'Best-selling biographer Stacy Schiff (Cleopatra; the Pulitzer-winning Vera) aims her keen research skills at U.S. history in The Witches: Salem, 1692. With her impressive attention to detail and atmosphere, she conjures an eerie vision of the 17th century', 'The Witches, Stacy Schiff', 2, 'non1.jpg', '', '', '1850', '2023-07-06 03:29:05', 'true'),
(4, 'Between the World and Me, Ta-Nehisi Coates', 'In any other year, Ta-Nehisi Coates’s letter to his teenage son about being black in America—a nod to James Baldwin’s The Fire Next Time—would have been a compelling piece of commentary. This year, it has been an urgent, essential phenomenon as the nation', 'Between the World and Me, Ta-Nehisi Coates', 2, 'non2.jpg', '', '', '1775', '2023-07-06 03:31:17', 'true'),
(5, 'Harvest Home', 'After quitting his career as a Hollywood star, Thomas Tryon turned to writing and gave us a pair of bestselling horror novels. The Other may be better known, but Harvest Home is the true chiller. In classic New England Gothic style, a nice family relocate', 'Harvest Home, horror, thomas tryon', 3, 'horror1.jpg', '', '', '2550', '2023-07-06 03:33:42', 'true'),
(6, 'Harvest Home', 'After quitting his career as a Hollywood star, Thomas Tryon turned to writing and gave us a pair of bestselling horror novels. The Other may be better known, but Harvest Home is the true chiller. In classic New England Gothic style, a nice family relocate', 'Harvest Home, horror, thomas tryon', 3, 'horror1.jpg', '', '', '2550', '2023-07-06 03:35:31', 'true');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
