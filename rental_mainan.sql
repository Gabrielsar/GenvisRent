-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 02:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mainan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `c_name`) VALUES
(1, 'Educational Toys'),
(2, 'Lego'),
(3, 'Ride-On Cars'),
(4, 'Utilities');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(14) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email`, `password`, `nama`, `alamat`, `no_telepon`, `role_id`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'Banten', '081212154', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `img_path` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `name`, `price`, `qty`, `img_path`, `description`) VALUES
(1, 1, 'Wooden Block', 20000, 5, 'woodenBlock.jpg', 'Balok kayu yang membantu meningkatkan kreativitas anak-anak balita'),
(2, 1, 'Taxi Wooden Puzzle', 10000, 5, 'taxiWoodenPuzzle.jpg', 'Puzzle berbentuk taxi yang bisa membantu meningkatkan pola pikir anak'),
(3, 1, 'Wooden Beads', 15000, 5, 'woodenBeads.jpg', 'Melatih koordinasi mata dengan tangan, motorik, kognitif, dan persepsi visual anak'),
(4, 1, 'Alphabet Puzzle', 10000, 5, 'alphabetPuzzle.jpg', 'Puzzle yang dapat membuat si anak menjadi mahir dalam alfabet'),
(5, 2, 'Lego Classic 11001', 6000, 5, 'legoClassic.jpg', 'Lego Classic yang menumbuhkan kreativitas anak, mengasah kemampuan motorik dan spasial anak'),
(6, 2, 'Lego Minecraft', 6000, 5, 'legoMinecraft.jpg', 'Lego bertema minecraft yang membantu memaksimalkan kemampuan berpikir anak balita'),
(7, 2, 'Lego Friends', 5000, 5, 'legoFriends.jpg', 'Lego yang memudahkan anak-anak untuk berinteraksi dengan orang lain'),
(8, 2, 'Lego Toy Story 4', 8000, 5, 'legoToyStory.jpg', 'Lego bertema Toy Story yang sangat menarik untuk dirakit bersama'),
(9, 3, 'Red Devil Wheels Car', 15000, 5, 'redDevilCar.jpg', 'Mobil dorong anak-anak berwarna merah yang dilengkapi dengan tempat duduk yang sangat nyaman untuk dikendarai'),
(10, 3, 'Minions Yellow Car', 10000, 5, 'mobilMinion.jpg', 'Mobil dorong bertema minions yang sangat terkenal di dalam film Despicable Me'),
(11, 3, 'Suzuki White 234', 12000, 5, 'suzukiWhiteCar.jpg', 'Mobil dorong berwarna putih berbentuk seperti mobil suzuki yang asli'),
(12, 3, 'SMJ 572', 12000, 5, 'smj572.jpg', 'Mobil dorong berwarna hijau yang sangat digemari oleh anak-anak'),
(13, 4, 'Musical Walker', 50000, 5, 'musicalWalker.jpg', 'Walker yang dilengkapi dengan musik dapat membuat si balita merasa nyaman'),
(14, 4, 'Baby Jumper', 35000, 5, 'babyJumper.jpg', 'Jumper yang dilengkapi gantungan mainan di atasnya yang membuat si balita ingin terus melompat'),
(15, 4, 'Stroller Baby Does', 60000, 5, 'babyStroller.jpg', 'Stroller 4 roda yang dilengkapi dengan penutup kepala dan posisi stroller dapat diatur menjadi posisi tidur rata, setengah tidur, dan duduk.'),
(16, 4, 'Baby Car Seat', 75000, 5, 'babyCarSeat.jpg', 'Tempat duduk yang digunakan didalam mobil yang dikhususkan untuk balita ketika bepergian sehingga melindungi keselamatan anak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
