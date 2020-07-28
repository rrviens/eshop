-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 08:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beybladesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nuotrauka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `nuotrauka`) VALUES
(1, 'Beyblade Burst', '/e-shop/img/beybladeburst.png'),
(2, 'Hasbro', '/e-shop/img/hasbrologo.png'),
(3, 'Takara Tomy', '/e-shop/img/TakaraTomyLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(11) NOT NULL,
  `kategorija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `adresas` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorijos`
--

INSERT INTO `kategorijos` (`id`, `kategorija`, `parent`, `adresas`) VALUES
(1, 'Beyblade Burst', 0, '/e-shop/index.php'),
(2, 'Hasbro', 0, '/e-shop/beylocker.php'),
(3, 'Takara Tomy', 0, '/e-shop/takara-tomy.php');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`) VALUES
(7, 15, 20.50, '2019-01-09 16:20:25', '2019-01-09 16:20:25'),
(8, 15, 20.50, '2019-01-09 17:07:06', '2019-01-09 17:07:06'),
(9, 15, 20.50, '2019-01-09 18:16:05', '2019-01-09 18:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produktai`
--

CREATE TABLE `produktai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kaina` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `metai` int(4) NOT NULL,
  `nuotrauka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprasymas` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produktai`
--

INSERT INTO `produktai` (`id`, `pavadinimas`, `kaina`, `brand`, `metai`, `nuotrauka`, `aprasymas`, `featured`, `details`) VALUES
(1, 'Valtryek Wing Accel', '20.50', 1, 2015, '/e-shop/img/BB_Valtryek Wing Accel.jpg', 'Valtryek Wing Accel, known as Valkyrie Wing Accel (ヴァルキリー・ウイング・アクセル, Varukirī Uingu Akuseru) in Japan, is an Attack Type Beyblade released as part of the Burst System. It was first released as a DX Starter in Japan on July 18th, 2015 for 20 EURO and was later released in western countries as a part of the Valtryek & Unicrest Dual Pack.', 1, 1),
(2, 'Dragoon Storm Wing Xtreme', '30.00', 1, 2016, '/e-shop/img/BB_Dragoon_Storm_Hasbro.png', 'Dragoon Storm Wing Xtreme (ドラグーンストーム・ウイング・エクストリーム, Doragūn Sutōmu Uingu Ekusutorīmu) is an Attack Type Beyblade released as part of Beyblade\'s 15th Anniversary for the Burst System. It was released as a CoroCoro Exclusive Booster in Japan in November 2016 and was also later released as a wbba. It was later released in western countries as a part of the Dragoon Storm & Dranzer S Dual Pack.', 1, 2),
(3, 'Beyblade God Entry Set', '25.90', 1, 2018, '/e-shop/img/BB_B-76_gV.png', 'Beyblade Burst Evolution, known in Japan as Beyblade Burst God (ベイブレードバースト神, Beiburēdo Bāsuto Kami (Goddo)), is the second season of Beyblade Burst, and the ninth season of Beyblade overall. The season began airing on TV Tokyo on April 3, 2017 and concluded on March 26, 2018. Episodes aired every Monday at 5:55pm JST on TV Tokyo.', 1, 3),
(19, 'Spryzen S2 Knuckle Unite', '14.99', 2, 2016, '/e-shop/img/hesbro-Storm-Spriggan.jpg', 'Spryzen S2 is an overall elliptical Energy Layer designed for Balance, which somewhat resembles its predecessor, Spryzen. In the center of the Layer is a beast looking to the right, meant to represent its Japanese namesake; the spriggan, a legendary beast of Cornish Faery Lore.', 7, 19),
(20, 'Roktavor R2 Gravity Revolve', '38.50', 2, 2016, '/e-shop/img/hasbro-RisingRagnarukGR.jpg', 'Roktavor R2 is a Stamina Type Energy Layer that features an elliptical shape akin to its predecessor Roktavor. Like its predecessor, the Layer\'s wings are molded into the visage of a head on either side, matching the anime\'s rendition of the Layer\'s beast; a winged demon. The placement of these wings is where the majority of the Layer\'s weight is, creating a high Outward Weight Distribution and Flywheel Effect which bolsters Roktavor R2\'s Stamina. While this may imply high Stamina potential, these wings also make up the primary points of contact, creating a recoil heavy design that severely diminishes the Stamina benefits of its Outward Weight Distribution and Flywheel Effect. While the high recoil of the elliptical shape and the wings may imply high Attack potential, the Takara Tomy release of Rising Ragnaruk features weak teeth that are unable to withstand the aforementioned recoil, meaning that this Layer is prone to losses by Burst.\r\n\r\n', 7, 20),
(21, 'Evipero Wing Needle', '15.60', 2, 2015, '/e-shop/img/Hasbro_Evipero.png', 'Evipero is a round Energy Layer designed for Defense that features a coiled serpent around the perimeter and molding around the center akin to the Iris of the eye, like the Layer\'s Japanese namesake; Evileye.\r\n\r\nThe perimeter features twelve blades, that at first glance appears to create a rough, high recoil design. However, the direction of the blades means that impacts are instead deflected off of Evipero, reducing recoil. Furthermore the Takara Tomy release of Evil-eye feature four teeth of medium length, allowing the Layer to withstand the recoil it does produce.', 7, 21),
(22, 'Dead Phoenix 0 Atomic', '30.20', 3, 2019, '/e-shop/img/tt-deadphoenix.jpg', '0 is a symmetrical Forge Disc that\'s elliptical in shape in order to facilitate a Disc Frame. Each side features one protrusion, each wide and smooth enough to almost make the Forge Disc perfectly circular if not for the notches needed to add a Disc Frame and a molded \"0\" on each side. The protrusions extend further and are thicker than most other Forge Discs which makes 0 the heaviest Forge Disc at the time of writing and implies high Outward Weight Distribution and Stamina potential. In reality however, more weight is focused towards the center, which creates Centralized Weight Distribution that reduces its Stamina to that of 2\'s. As such, 0 is outclassed by 7 for Stamina Combinations but 0\'s greater weight makes it ideal for Attack and Defense Combinations. Furthermore, the round shape of 0 creates high Life After Death, even without the use of Disc Frames such as Cross. While the weight can increase the risk of Bursts, the weight of most SwitchStrike/God Layers and Cho-Z Layers can compensate.', 8, 22),
(23, 'Roktavor Heavy Survive\r\n', '16.80', 3, 2016, '/e-shop/img/tt-ragnaruk.jpg', 'Roktavor is a rugged looking Energy Layer that bears a striking resemblance to Seaborg\'s Whale Attacker, featuring two flat, blunt protrusions with smaller, pointier trailing edges. Unlike most other Energy Layers that incorporate some sort of slope or relief, Roktavor has a nearly-uniform thickness throughout the Layer. The majority of Roktavor\'s weight is packed behind its two primary contact points, which, coupled with the shape of these protrusions, provide the Layer with a considerable amount of Burst Attack. However, these same features also subject Roktavor to large amounts of rotational recoil during a collision as well. As Ragnaruk has only three average sized teeth and one small tooth, is is unable to handle its own recoil and tends to Burst quite often, making it practically nonviable in competitive play.', 8, 23),
(24, 'Valtryek V2 Boost Variable', '40.99', 3, 2016, '/e-shop/img/tt-VictoryValkyrieBV.jpg', 'Like its predecessor Valtryek, Valtryek V2 is an Attack Type Energy Layer that has three upward slanted wings that are great at Knocking Out opponents, but falls behind its predecessor at giving Bursts. Unlike Valkyrie\'s teeth, the Japanese release of Victory Valkyrie features teeth that have no problem with wear due to them having greater width, following the model first introduced with Xcalibur. The teeth are also very tall, which makes the Victory Valkyrie Combination able to withstand its own recoil and avoid potential Self-Bursts, which made this Layer a Top-Tier choice for Attack Combinations.', 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(15, 'Rapolas', ' Vasiliauskas', 'rviens1@gmail.com', 'rviens', '$2y$10$zi5u6Ix3CRvmB35lWnCYDenrr0U/mnr8ZVMdR6iFK/FHZZf.Nqo9O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produktai`
--
ALTER TABLE `produktai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produktai`
--
ALTER TABLE `produktai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
