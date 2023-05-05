-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 12:51 PM
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
-- Database: `art_patio`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyevent`
--

CREATE TABLE `applyevent` (
  `application Id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `eventOwner` int(11) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applyevent`
--

INSERT INTO `applyevent` (`application Id`, `event_id`, `user_id`, `art_id`, `eventOwner`, `approval`) VALUES
(19, 68, 40, 16, 46, 0),
(20, 72, 61, 23, 58, 1),
(21, 72, 61, 25, 58, 1),
(22, 72, 61, 24, 58, 1),
(23, 72, 61, 27, 58, 1),
(24, 72, 61, 28, 58, 1),
(25, 72, 60, 20, 58, 1),
(26, 72, 60, 21, 58, 1),
(27, 72, 60, 22, 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `artID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `material` varchar(50) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `initalbid` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `img` varchar(400) NOT NULL,
  `year` year(4) NOT NULL DEFAULT current_timestamp(),
  `approval` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `bidding_time` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`artID`, `user_id`, `title`, `type`, `material`, `height`, `width`, `price`, `bid_amount`, `initalbid`, `description`, `img`, `year`, `approval`, `votes`, `owner`, `status`, `delivery_status`, `bidding_time`) VALUES
(8, 40, 'Silver', 'Abstract', 'Digital Art', 700, 500, '1000', 200, '800', 'Silver Logo', '570374.jpg', 2023, 1, 6, '44', 'Sold', 0, 5),
(9, 40, 'Invaitational', 'Abstract', 'Digital Art', 700, 500, '2000', 200, '1200', 'Poster Design', 'wallpaperflare.com_wallpaper(2).jpg', 2023, 1, 2, '44', 'Sold', 0, 5),
(10, 40, 'Cyberpunk', 'Landscape', 'Digital Art', 700, 500, '3000', 200, '1200', 'Cyber Jump', 'Screenshot 2023-03-10 234819.png', 2023, 1, 0, '44', 'Sold', 0, 5),
(12, 40, 'q1231', '23123', '123123', 123123, 1321231, '1000', 200, '123123', '23123', '1162203.jpg', 2023, 1, 0, '47', 'Sold', 0, 5),
(13, 40, 'Girl in Saree', 'Digital Art', 'Digital Tool', 800, 1200, '1000', 500, '1200', 'Girl in Saree', 'Spixiiii_sunnyleone_in_saree_ad98225a-5bf3-495f-9262-ec01dbbe69d7.png', 2023, 1, 2, '47', 'Sold', 0, 5),
(14, 40, 'Counter Strick', 'Gaming', 'Digital Tool', 800, 1200, '1000', 300, '1000', 'Gaming Vibe', 'cropped-3840-2160-653557.png', 2023, 1, 1, '47', 'Sold', 0, 5),
(15, 40, 'World', 'Digital Art', 'Digital Tool', 800, 1200, '2000', 500, '2000', 'Cyber Verse', 'Screenshot 2023-03-10 235010.png', 2023, 1, 0, '47', 'Sold', 0, 5),
(16, 40, 'Flame', 'Fire', 'Digital Tool', 1000, 1500, '5000', 500, '3000', 'Scorpion on fire', '516677.jpg', 2023, 1, 1, NULL, 'Available', 0, 5),
(17, 50, 'Chill Caster', 'Fighting', 'Digital Tool', 1000, 1500, '5000', 500, '3000', 'Subzero', '2.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(18, 40, 'Red', 'Abstract', 'Acrylic', 1080, 1920, '6500', 500, '6500', 'Color of life', 'slider1.jpg', 2023, 1, 33, '44', 'Sold', 0, 5),
(20, 60, 'Peace', 'Abstract', 'Pencil', 800, 400, '3000', 300, '1200', 'Find your own peace ', 'sketch.png', 2023, 1, 31, NULL, 'Available', 0, 5),
(21, 60, 'Taylor Swift', 'Portrait', 'Pencil', 500, 400, '1800', 100, '900', 'Portrait of Taylor Swift', 'tylor swift.png', 2023, 1, 0, NULL, 'Available', 0, 5),
(22, 60, 'The GOAT', 'Portrait', 'Pencil', 600, 550, '1800', 200, '1200', 'The man, the myth, The legend', 'Messi.png', 2023, 1, 0, '44', 'Sold', 0, 5),
(23, 61, 'Your Path', 'Abstract', 'Pencil', 600, 600, '3500', 400, '2000', 'Choose your own path. Do What your instinct leads to ', 'shishir1.jpg', 2023, 1, 33, NULL, 'Available', 0, 5),
(24, 61, 'Reflection', 'Abstract', 'Charcoal', 500, 500, '3000', 300, '2400', 'Sometimes your Reflection defines you', 'shishir2.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(25, 61, 'Alert', 'Abstract', 'Pencil', 800, 500, '2000', 150, '1000', 'Red Alert for You', 'shishir3.jpg', 2023, 1, 1, NULL, 'Available', 0, 5),
(26, 61, 'Humayun Ahmed', 'Digital Art', 'Digital', 600, 600, '2200', 350, '1500', 'One of the finest Writer of Bangladesh', 'shishir5.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(27, 61, 'GOAT', 'Portrait', 'Pencil', 800, 600, '1000', 100, '200', 'Finest of our generation', 'shishir4.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(28, 61, 'Covid 19', 'Abstract', 'Digital', 500, 500, '3000', 200, '2200', 'A life changing time for all. COVID!!!', 'shishir6.jpg', 2023, 1, 1, '44', 'Sold', 0, 5),
(29, 40, 'Color of Life', 'Abstract', 'Acrylic', 800, 600, '3500', 300, '2500', 'Make your life colorful and see the world in a colorful way\r\n', 'k1.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(30, 40, 'The Lost city', 'Landscape', 'Watercolor', 800, 700, '3000', 200, '2000', 'The lost ancient city ', 'k2.jpg', 2023, 1, 0, NULL, 'Available', 0, 5),
(31, 40, 'U & ME', 'Abstract', 'Crayon', 600, 1200, '2000', 200, '1000', 'Rain You and me', 'k3.jpg', 2023, 1, 0, NULL, 'Available', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bid_count` int(11) NOT NULL,
  `last_bid_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `art_id`, `user_id`, `bid_count`, `last_bid_time`) VALUES
(30, 8, 44, 0, '2023-04-13 18:43:04'),
(31, 13, NULL, 0, NULL),
(32, 12, NULL, 0, NULL),
(33, 16, NULL, 0, NULL),
(34, 9, NULL, 0, NULL),
(35, 17, NULL, 0, NULL),
(36, 18, 44, 0, '2023-05-01 16:28:20'),
(38, 20, NULL, 0, NULL),
(39, 22, 44, 0, '2023-05-03 06:41:52'),
(40, 21, NULL, 0, NULL),
(41, 23, NULL, 0, NULL),
(42, 28, NULL, 0, NULL),
(43, 25, 44, 1, '2023-05-03 09:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date NOT NULL,
  `endTime` time NOT NULL,
  `priceTicket` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `img` varchar(400) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '1234',
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `user_id`, `eventname`, `startDate`, `startTime`, `endDate`, `endTime`, `priceTicket`, `description`, `img`, `password`, `approval`) VALUES
(67, 46, 'Pokemon Show', '2023-05-01', '23:00:00', '2023-05-02', '23:30:00', '200', 'A show for kids and Pokemon Lovers', '3.jpg', '1234', 1),
(68, 46, 'Six SIege', '2023-05-02', '10:00:00', '2023-05-03', '22:00:00', '400', 'Gaming Fest', '23.jpg', '1234', 1),
(70, 49, 'CS-Go', '2023-04-02', '11:11:00', '2023-04-03', '13:00:00', '400', 'Gaming Fest for CS- PROs', 'AK.png', '1234', 1),
(71, 49, 'Gaming Event', '2023-05-01', '23:00:00', '2023-05-02', '23:30:00', '500', 'Gaming Fest ', '609118.jpg', '1234', 1),
(72, 58, 'Color of Arts', '2023-05-02', '10:00:00', '2023-05-03', '22:00:00', '500', 'Set your color in your Artwork. join us in our adventure and showcase your work', 'eventbanner.png', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fav_id`, `user_id`, `art_id`) VALUES
(5, 45, 9),
(6, 45, 8),
(7, 44, 9),
(9, 40, 8),
(11, 47, 13),
(12, 47, 14),
(13, 44, 18),
(14, 40, 18);

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE `follower` (
  `id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`id`, `following_id`, `follower_id`) VALUES
(17, 49, 40),
(18, 49, 50),
(45, 59, 58),
(46, 40, 60),
(47, 40, 61),
(48, 59, 61);

-- --------------------------------------------------------

--
-- Table structure for table `ticketbuy`
--

CREATE TABLE `ticketbuy` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketbuy`
--

INSERT INTO `ticketbuy` (`purchase_id`, `user_id`, `event_id`) VALUES
(2, 44, 67),
(4, 44, 68),
(6, 47, 67),
(7, 47, 68),
(8, 44, 70),
(9, 44, 71),
(10, 59, 72);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `conatact` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `dp` varchar(500) NOT NULL,
  `description` varchar(200) NOT NULL,
  `currancy` int(50) NOT NULL,
  `followers` int(11) NOT NULL,
  `requestCurrency` int(11) NOT NULL,
  `requestedCurrency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `name`, `email`, `password`, `address`, `conatact`, `category`, `dp`, `description`, `currancy`, `followers`, `requestCurrency`, `requestedCurrency`) VALUES
(1, 'Syed', 'syed@gmail.com', '1234', 'Dhaka', '', 'Admin', '', '', 0, 0, 0, 0),
(40, 'Kabir', 'k@gmail.com', '1234', 'Dhaka', '01711672116', 'Artist', 'k.JPG', 'An art lover and devoted whole life towards art', 772315, 1, 0, 0),
(44, 'Sazin', 's@gmail.com', '1234', 'Dhaka', '01624830751', 'Customer', 'DSC_0383.JPG', '', 28200, 0, 0, 0),
(45, 'Rakib Hasan', 'r@gmail.com', '1234', 'Cumilla', '', 'Customer', '', '', 0, 0, 0, 0),
(46, 'Rabbi', 'rab@gmail.com', '1234', 'Dhaka', '', 'Gallery', 'gallery2.jpg', '', 2000, 0, 0, 0),
(47, 'Rakibul ', 'rs@gmail.com', '123', 'Rangpur', '01624830751', 'Customer', '54724.jpg', '', 5500, 0, 0, 0),
(48, 'asda', 'a@fasfasd', '123', 'asdasd', '', 'Artist', '607877.jpg', '', 0, 0, 0, 0),
(49, 'Rock Show Gallery', 'rsg@gmail.com', '123', '2/3 Dhanmondi 32, Dhaka,Bangladesh', '01834830751', 'Gallery', 'gallery1.jpg', 'Gallery to exhibate art', 900, 0, 0, 0),
(50, 'Fuad', 'fuad@gmail.com', '123', 'Sayed Nagar,Dhaka', '01624830871', 'Artist', 'WhatsApp Image 2023-04-14 at 12.42.09 AM.jpeg', '', 50000, 1, 0, 0),
(51, 'Labib Ahmed', 'labib@gmail.com', '123', 'Dhaka', '01624830761', 'Artist', 'WhatsApp Image 2023-04-14 at 12.42.09 AM.jpeg', 'Freelancing Artist!!', 0, 0, 0, 0),
(58, 'Dukes Gallery', 'duke@gmail.com', '123', 'Dublin Town,Ireland', '01624830751', 'Gallery', 'dukegallery.jpg', 'A house of arts where our motto is to uphold the talents of the artist and make a suitable place for art lovers to buy artworks', 500, 1, 0, 0),
(59, 'Abu Bakar', 'abu@gmail.com', '123', 'Cumilla', '01624830761', 'Customer', 'abu.jpg', '', 50000, 0, 0, 0),
(60, 'Mithila Farjana', 'mithila@gmail.com', '123', 'Dhaka', '01624830651', 'Artist', 'm.jpg', 'In this huge world of art trying to make my own world beautiful with the help of art', 1800, 1, 0, 0),
(61, 'Shahnewaz Rahman Shishir', 'shishir@gmail.com', '123', 'Khulna', '016245678123', 'Artist', 'shishir.jpg', 'A student of fine arts in Khulna University,Bangladesh.', 3000, 2, 0, 0),
(62, 'Walking Mans Gallery ', 'w@gmail.com', '123', 'Dhaka', '012318236123', 'Gallery', 'w.png', 'Walking Mans Gallery ', 0, 0, 0, 0),
(63, 'Vernons Art Gallery', 'v@gmail.com', '123', 'Dhaka', '01233127351', 'Gallery', 'v.png', 'Vernons Art Gallery', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `user_id`, `art_id`) VALUES
(3, 44, 8),
(4, 44, 9),
(5, 45, 8),
(6, 40, 8),
(7, 40, 9),
(9, 47, 8),
(10, 47, 13),
(11, 47, 14),
(12, 51, 8),
(13, 40, 13),
(14, 40, 18),
(15, 49, 16),
(16, 60, 23),
(17, 60, 18),
(18, 44, 28),
(19, 59, 25),
(20, 59, 23),
(21, 59, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyevent`
--
ALTER TABLE `applyevent`
  ADD PRIMARY KEY (`application Id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`artID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `art_id` (`art_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketbuy`
--
ALTER TABLE `ticketbuy`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyevent`
--
ALTER TABLE `applyevent`
  MODIFY `application Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `artID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ticketbuy`
--
ALTER TABLE `ticketbuy`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyevent`
--
ALTER TABLE `applyevent`
  ADD CONSTRAINT `applyevent_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `applyevent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `applyevent_ibfk_3` FOREIGN KEY (`art_id`) REFERENCES `arts` (`artID`);

--
-- Constraints for table `arts`
--
ALTER TABLE `arts`
  ADD CONSTRAINT `arts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `arts` (`artID`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `arts` (`artID`);

--
-- Constraints for table `ticketbuy`
--
ALTER TABLE `ticketbuy`
  ADD CONSTRAINT `ticketbuy_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `ticketbuy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `arts` (`artID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
