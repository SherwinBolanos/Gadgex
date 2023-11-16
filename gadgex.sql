-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 08:57 AM
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
-- Database: `gadgex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL COMMENT 'cart items id',
  `session_id` int(11) NOT NULL COMMENT 'session id',
  `items_id` int(11) NOT NULL COMMENT 'items id',
  `cart_quantity` int(11) NOT NULL COMMENT 'cart quantity',
  `cart_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'cart date added',
  `cart_modified_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'cart date modified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_id`, `session_id`, `items_id`, `cart_quantity`, `cart_date_added`, `cart_modified_at`) VALUES
(1, 1, 1, 5, '2023-10-21 06:45:43', '2023-10-25 06:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL COMMENT 'Feedback I.D',
  `users_id` int(11) NOT NULL COMMENT 'Users I.D',
  `items_id` int(11) NOT NULL COMMENT 'Items I.D',
  `feeedback_details` varchar(250) NOT NULL COMMENT 'Feedback Details',
  `feedback_ratings` int(11) NOT NULL COMMENT 'Feedback Ratings',
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Feedback record Date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `users_id`, `items_id`, `feeedback_details`, `feedback_ratings`, `feedback_date`) VALUES
(1, 2, 1, 'Very goood sya OmG.I love the product!! Yeahh😎', 5, '2023-10-21 06:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL COMMENT 'items I.D',
  `items_name` varchar(250) NOT NULL COMMENT 'Items Name',
  `items_description` varchar(250) NOT NULL COMMENT 'Items Description',
  `cat_id` int(11) NOT NULL COMMENT 'Category I.D',
  `inventory_id` int(11) NOT NULL COMMENT 'Inventory I.D',
  `items_price` decimal(10,0) NOT NULL COMMENT 'Item Price',
  `dis_id` int(11) NOT NULL COMMENT 'Discount I.D',
  `items_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A=Active,\r\nX=Sold Out',
  `items_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Items date added',
  `items_modified_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Items Modified At',
  `items_deleted_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Items Deleted At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `items_name`, `items_description`, `cat_id`, `inventory_id`, `items_price`, `dis_id`, `items_status`, `items_date_added`, `items_modified_at`, `items_deleted_at`) VALUES
(1, 'Acer Nitro', 'The Acer Nitro series is a line of gaming laptops and desktops known for delivering robust gaming performance at competitive price points. These devices are designed for gamers and multimedia enthusiasts and typically feature powerful processors, ded', 1, 1, 70000, 1, 'A', '2023-10-21 06:04:49', '2023-10-31 06:01:40', '2023-10-30 06:04:49'),
(2, 'Asus', 'The Asus ROG Zephyrus S GX701 is a high-end gaming laptop known for its powerful performance, sleek design, and advanced features. It typically features top-tier processors, dedicated gaming graphics, a high-refresh-rate display, customizable RGB lig', 1, 1, 90000, 1, 'A', '2023-10-21 06:13:07', '2023-10-31 06:11:03', '2023-10-30 06:11:03'),
(3, 'Dell', 'The Dell XPS 17 is a high-end laptop known for its premium design and performance capabilities. It features powerful Intel Core i7 or i9 processors, dedicated graphics, a stunning InfinityEdge display with minimal bezels, and a 4K Ultra HD resolution', 1, 1, 100000, 1, 'A', '2023-10-21 06:15:08', '2023-10-31 06:13:44', '2023-10-29 06:13:44'),
(4, 'Amazon', 'The Amazon Echo is a smart speaker that combines premium audio quality with voice-controlled convenience. With built-in Amazon Alexa, it provides hands-free access to information, music, smart home control, and more. The Echo boasts a sleek design an', 2, 2, 50000, 1, 'A', '2023-10-21 06:16:59', '2023-10-29 06:15:34', '2023-10-31 06:15:34'),
(5, 'Google', 'Google smart speakers are designed to make your life easier and more connected. With the power of Google Assistant, they provide voice-controlled access to information, music, and smart home control. These speakers come in various sizes and styles to', 2, 2, 89000, 1, 'A', '2023-10-21 04:17:31', '2023-10-22 06:17:31', '2023-10-31 06:17:31'),
(6, 'Pear', 'The Pear Smart Speaker redefines your audio experience with cutting-edge technology and elegant design. This voice-activated speaker is not just for music; it\'s your gateway to a smarter, more connected home. With advanced voice recognition and integ', 2, 2, 100000, 1, 'A', '2023-10-21 06:21:02', '2023-10-23 03:19:29', '2023-10-30 23:38:29'),
(7, 'Samdance', 'Introducing the Samdance Smartphone, a masterpiece of technology and style. Designed to keep up with your fast-paced life, this cutting-edge device offers a blend of innovation and elegance.', 3, 3, 50000, 1, 'A', '2023-10-21 06:23:34', '2023-11-08 06:21:49', '2023-11-30 06:21:49'),
(8, 'Pear smartphone', 'The Pear Smartphone is a pinnacle of technology and style, designed to empower your digital life. With a perfect fusion of innovation and aesthetics, this cutting-edge device is here to exceed your expectations.', 3, 3, 90000, 1, 'A', '2023-10-21 06:26:22', '2023-10-27 06:25:11', '2023-11-22 06:25:11'),
(9, 'Fakeme', 'Discover innovation redefined with the Fakeme Smartphone. Designed for the modern world, this cutting-edge device seamlessly combines form and function, making it the ultimate companion for your digital lifestyle.', 3, 3, 70000, 1, 'A', '2023-10-21 06:32:48', '2023-11-16 06:31:39', '2023-12-25 06:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE `items_category` (
  `cat_id` int(11) NOT NULL COMMENT 'Category I.D',
  `cat_name` varchar(250) NOT NULL COMMENT 'Category name',
  `cat_description` varchar(250) NOT NULL COMMENT 'Category Description',
  `cat_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Category date added',
  `cat_modified_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Category modified at',
  `cat_deleted_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Category deleted at'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`cat_id`, `cat_name`, `cat_description`, `cat_date_added`, `cat_modified_at`, `cat_deleted_at`) VALUES
(1, 'Gaming Laptop', 'A gaming laptop is a high-performance portable computer designed specifically for playing video games. These laptops typically feature powerful processors, advanced graphics cards, high-refresh-rate displays, and ample RAM, all optimized to deliver a', '2023-10-21 04:58:59', '2023-10-21 04:58:59', '2023-10-21 04:58:59'),
(2, 'Smart Speaker', 'A smart speaker is a voice-activated, internet-connected device that can play music, answer questions, and perform a variety of tasks through voice commands. These speakers typically come equipped with virtual voice assistants like Amazon Alexa, Goog', '2023-10-21 04:58:59', '2023-10-21 04:58:59', '2023-10-21 04:58:59'),
(3, 'Gaming SmartPhone', 'A gaming smartphone is a mobile device specifically engineered for a superior gaming experience. These phones feature high-performance processors, fast refresh rate displays, advanced cooling systems, and optimized gaming modes. They are ideal for mo', '2023-10-21 04:58:59', '2023-10-21 04:58:59', '2023-10-21 04:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `items_discount`
--

CREATE TABLE `items_discount` (
  `dis_id` int(11) NOT NULL COMMENT 'Discount I.D',
  `dis_name` varchar(250) NOT NULL COMMENT 'Discount Name',
  `dis_description` varchar(250) NOT NULL COMMENT 'Discount Description',
  `dis_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'Discount status',
  `dis_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Discount date added',
  `dis_modified_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Discount modified at ',
  `dis_deleted_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Discount deleted at'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_discount`
--

INSERT INTO `items_discount` (`dis_id`, `dis_name`, `dis_description`, `dis_status`, `dis_date_added`, `dis_modified_at`, `dis_deleted_at`) VALUES
(1, '100% off', '\"100% off\" typically refers to a promotion or discount where the full price of a product or service is waived, resulting in the item being completely free. ', 'A', '2023-10-21 06:08:11', '2023-10-30 06:07:06', '2023-10-31 06:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `items_inventory`
--

CREATE TABLE `items_inventory` (
  `inventory_id` int(11) NOT NULL COMMENT 'Inventory I.D',
  `inventory_quantity` int(11) NOT NULL COMMENT 'Inventory quantity',
  `inventory_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Inventory date added',
  `inventory_modified_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Inventory modified at',
  `inventory_deleted_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Inventory deleted at'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_inventory`
--

INSERT INTO `items_inventory` (`inventory_id`, `inventory_quantity`, `inventory_date_added`, `inventory_modified_at`, `inventory_deleted_at`) VALUES
(1, 500, '2023-10-21 06:00:53', '2023-10-31 06:00:19', '2023-10-21 06:00:53'),
(2, 300, '2023-10-21 06:10:23', '2023-10-21 06:10:23', '2023-10-21 06:10:23'),
(3, 200, '2023-10-21 06:10:23', '2023-10-21 06:10:23', '2023-10-21 06:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL COMMENT 'Order I.D',
  `users_id` int(11) NOT NULL COMMENT 'Users I.D',
  `order_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Order Date Added',
  `order_total_amount` decimal(10,0) NOT NULL COMMENT 'total amount of the order',
  `address_id` int(11) NOT NULL COMMENT 'address I.D',
  `payment_details_id` int(11) NOT NULL COMMENT 'Payment Details I.D'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `users_id`, `order_date_added`, `order_total_amount`, `address_id`, `payment_details_id`) VALUES
(1, 2, '2023-10-21 06:37:17', 350000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL COMMENT 'Order Items I.D',
  `order_id` int(11) NOT NULL COMMENT 'Order I.D',
  `items_id` int(11) NOT NULL COMMENT 'Items I.D',
  `order_quantity` int(11) NOT NULL COMMENT 'Order Quantity',
  `order_price` decimal(10,0) NOT NULL COMMENT 'Order Price',
  `order_total_price` decimal(10,0) NOT NULL COMMENT 'Total order Price',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'date added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `order_id`, `items_id`, `order_quantity`, `order_price`, `order_total_price`, `date_added`) VALUES
(1, 1, 1, 5, 7000, 350000, '2023-10-21 06:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_details_id` int(11) NOT NULL COMMENT 'Payment Details I.D',
  `payment_id` int(11) NOT NULL COMMENT 'payment I.D',
  `payment_amount` decimal(10,0) NOT NULL COMMENT 'Payment amount',
  `payment_status` char(1) NOT NULL DEFAULT 'S' COMMENT 'transaction statuses: S=Succeed. F=Failed. P=Pending.',
  `payment_method` varchar(250) NOT NULL COMMENT 'Payment method Mastercard\r\nGoogle Pay\r\nPayPal\r\nApple Pay\r\nBank transfer\r\nCash\r\nDirect debit\r\nInstallment plan\r\nOnline Banking',
  `Payment_date_added` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Payment date added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_details_id`, `payment_id`, `payment_amount`, `payment_status`, `payment_method`, `Payment_date_added`) VALUES
(1, 1, 350000, 'P', 'Gcash', '2023-10-21 14:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL COMMENT 'Reports I.D',
  `users_id` int(11) NOT NULL COMMENT 'Users I.D',
  `items_id` int(11) NOT NULL COMMENT 'Items I.D',
  `report_type` char(3) NOT NULL DEFAULT 'A' COMMENT 'A =Inappropriate Content,\r\nB =Fake Product,\r\nC =Misleading Description,\r\nD =Counterfeit Goods,\r\nE =Copyright Infringement,\r\nF =Harassment or Abuse,\r\nG =Security Concerns,\r\nH =Spam or Phishing,\r\nI =Customer Support Request',
  `report_details` varchar(250) NOT NULL COMMENT 'Report Details',
  `report_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Report Date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `users_id`, `items_id`, `report_type`, `report_details`, `report_date`) VALUES
(1, 2, 1, 'A', 'pinapabawi daw ni pham masyado daw mahal', '2023-10-21 06:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `session_id`
--

CREATE TABLE `session_id` (
  `session_id` int(11) NOT NULL COMMENT 'session id',
  `users_id` int(11) NOT NULL COMMENT 'users Id',
  `session_total` int(11) NOT NULL COMMENT 'total items in the session',
  `session_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'session date added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_id`
--

INSERT INTO `session_id` (`session_id`, `users_id`, `session_total`, `session_date_added`) VALUES
(1, 2, 5, '2023-10-21 05:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL COMMENT 'User I.D',
  `username` varchar(250) NOT NULL COMMENT 'Username',
  `fullname` varchar(250) NOT NULL COMMENT 'Users Fullname',
  `email` varchar(250) NOT NULL COMMENT 'Users Email',
  `password` varchar(250) NOT NULL COMMENT 'Users Password',
  `user_date_added` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Users date added',
  `user_type` char(1) NOT NULL DEFAULT 'U' COMMENT 'Users type:\r\nU = User,\r\nA = Admin',
  `user_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'User Status:\r\nA =  Active,\r\nI = Inactive\r\nX = Banned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `fullname`, `email`, `password`, `user_date_added`, `user_type`, `user_status`) VALUES
(1, 'Mark', 'MARK VINCENT SALCEDO CARDINALO', 'mark@gmail.com', 'markkkkk', '2023-10-21 05:01:55', 'U', 'A'),
(2, 'Glorianne', 'GLORIANNE MARIE LUCILA ORDOÑA\r\n', 'glor@gmail.com', 'glooorrr', '2023-10-21 05:04:05', 'U', 'A'),
(3, 'phamela', 'PHAMELA SHANE BONAGUA MITRA', 'phamela@gmail.com', 'phamelaa', '2023-10-21 05:04:05', 'U', 'A'),
(4, 'Sherwinpogi', 'SHERWIN GILBERT BAÑAL BOLAÑOS', 'sherwin@gmail.com', 'Sherwinnnn', '2023-10-21 05:05:52', 'U', 'A'),
(5, 'jedmike', 'JED MIKE PAVIRECIO HERRERA', 'jedmike@gmail.com', 'jedmikkkee', '2023-10-21 05:05:52', 'U', 'A'),
(6, 'Virman', 'VIRMAN SILAO SILO JR.', 'virman@gmail.com', 'virrrrr', '2023-10-21 05:06:39', 'U', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `address_id` int(11) NOT NULL COMMENT 'Address I.D',
  `users_id` int(11) NOT NULL COMMENT 'Users I.D',
  `address` varchar(250) NOT NULL COMMENT 'Users Address',
  `city` varchar(250) NOT NULL COMMENT 'Users City',
  `postal_code` varchar(10) NOT NULL COMMENT 'Users Postal COde',
  `country` varchar(150) NOT NULL COMMENT 'Users Country',
  `telephone` int(15) NOT NULL COMMENT 'Users Telephone Number',
  `mobile` int(15) NOT NULL COMMENT 'Users Mobile NUmber',
  `location_details` varchar(250) NOT NULL COMMENT 'Users Deatiled Location'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`address_id`, `users_id`, `address`, `city`, `postal_code`, `country`, `telephone`, `mobile`, `location_details`) VALUES
(1, 2, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'sa harani sa plaza gayu HUHU'),
(2, 1, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'harayuu sa ligao  centro '),
(3, 3, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'bahalaka jan maghanap '),
(4, 4, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'sa centro lang'),
(5, 6, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'hanapin mo nalnag ako '),
(6, 5, 'Palapas', 'Ligao city', '4504', 'Philippiness', 1234567899, 1234567890, 'yeahhh😎');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL COMMENT 'Payment_I.D',
  `users_id` int(11) NOT NULL COMMENT 'Users I.D',
  `card_number` int(11) NOT NULL COMMENT 'Card NUmber',
  `card_holder_name` varchar(250) NOT NULL COMMENT 'Name of the Card owner',
  `card_cvv` varchar(250) NOT NULL COMMENT 'Password of the card'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `users_id`, `card_number`, `card_holder_name`, `card_cvv`) VALUES
(1, 2, 12345, 'glor', 'glorrr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`);

--
-- Indexes for table `items_category`
--
ALTER TABLE `items_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items_discount`
--
ALTER TABLE `items_discount`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `items_inventory`
--
ALTER TABLE `items_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_details_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `session_id`
--
ALTER TABLE `session_id`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'cart items id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Feedback I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'items I.D', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items_category`
--
ALTER TABLE `items_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Category I.D', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items_discount`
--
ALTER TABLE `items_discount`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Discount I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items_inventory`
--
ALTER TABLE `items_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Inventory I.D', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Order I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Order Items I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_details_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Payment Details I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Reports I.D', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session_id`
--
ALTER TABLE `session_id`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'session id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User I.D', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Address I.D', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Payment_I.D', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
