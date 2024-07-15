-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 03:40 PM
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
-- Database: `garage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_problems`
--

CREATE TABLE `car_problems` (
  `problem_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_problems`
--

INSERT INTO `car_problems` (`problem_id`, `name`, `description`, `created`) VALUES
(3, 'Fails to climb a mountain', 'Fails to climb a mountains    is the one among of the common problems facing cars                              ', '2024-06-05'),
(4, 'Engine fairule', 'This is common cars prblem that seceral cars tend to adhere to .', '2024-06-05'),
(6, 'break fairule', 'th annd vnvnv  nbnbnb nn', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `problem_id`, `description`, `created`) VALUES
(7, 3, 'A failing transmission can prevent the car from shifting into the appropriate gear for climbing. Problems like worn-out gears, low transmission fluid, or a faulty torque converter can be culprits. ', '2024-06-05'),
(12, 3, 'A clogged catalytic converter or exhaust system can restrict the engine’s ability to expel exhaust gases, leading to reduced power output. ', '2024-06-05'),
(13, 3, 'Excessive weight or improper distribution of weight in the car can affect its ability to climb steep inclines.', '2024-06-05'),
(14, 3, 'A stuck brake caliper or other braking system issues can create additional drag, making it difficult for the car to climb.', '2024-06-05'),
(16, 4, 'Insufficient oil can lead to severe engine damage due to lack of lubrication, causing parts to wear out or seize up.', '2024-06-05'),
(18, 4, 'If the timing belt or chain breaks, it can lead to serious engine damage as the synchronization between the engine’s pistons and valves is lost.', '2024-06-05'),
(19, 4, 'Issues such as clogged fuel filters, failing fuel pumps, or bad fuel injectors can lead to insufficient fuel reaching the engine.', '2024-06-05'),
(20, 4, 'Problems with the ignition system, such as faulty spark plugs, ignition coils, or the ECU (Engine Control Unit), can prevent the engine from running properly.', '2024-06-05'),
(23, 4, 'Leaks in the cooling system can cause the engine to overheat, leading to potential engine failure.', '2024-06-05'),
(27, 3, 'mmm  bd  xc', '2024-06-07'),
(28, 3, 'mvmdncd bc  vbh', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `phone`, `email`, `password`, `usertype`, `created`) VALUES
(1, 'omollo givenality', '0898787654', 'omollogivenality@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2024-06-04'),
(6, 'helman said said ', '0898787654', 'helman@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Mechanics', '2024-06-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_problems`
--
ALTER TABLE `car_problems`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_problems`
--
ALTER TABLE `car_problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `car_problems` (`problem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
