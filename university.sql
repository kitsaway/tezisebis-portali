-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 10:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED DEFAULT NULL,
  `pr_name` varchar(151) NOT NULL,
  `file_src` varchar(151) DEFAULT NULL,
  `status_id` int(11) UNSIGNED NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `student_id`, `pr_name`, `file_src`, `status_id`, `points`) VALUES
(7, 44, 'სოციალისტური რეალიზმი', '2ვ.docx', 5, 98),
(8, 46, 'ახალი საბჭოთა ადამიანი', NULL, 2, NULL),
(9, NULL, 'საქართველოს დემოკრატიული რესპუბლიკა', NULL, 1, NULL),
(11, NULL, 'ადამიანი და თავისუფლება', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status_name` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'თავისუფალი'),
(2, 'დაკავებული'),
(3, 'მუშაობის პროცესში'),
(4, 'შეფასების მოლოდინში'),
(5, 'შეფასებული');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `level` tinyint(3) NOT NULL,
  `status_id` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(151) NOT NULL,
  `surname` varchar(151) NOT NULL,
  `id_number` varchar(12) NOT NULL,
  `mobile` varchar(151) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(151) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `status_id`, `name`, `surname`, `id_number`, `mobile`, `address`, `gender`, `password`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(0, 0, NULL, 'Mariam', 'Tokhian', '01024567785', '+995587485241', 'Javakheti st.1', 'მდედრობითი', '$2y$10$VdX3BXXqbui2OSBreD0j..Xhxc2eVZXHdLiIOFXFORoSpKJoTL6OO', '2022-02-04', '2022-02-04 16:59:56', '2022-02-10 19:44:53'),
(44, 1, 5, 'გიორგი', 'ფრუიძე', '01024567712', '+995587485433', 'ქ.თბილისი, ჯავახეთის ქუჩა 15', 'მამრობითი', '$2y$10$l1U4hdEScRLd99LaoVvIVulROgghY4U3X2UKs0HBX8Iap4DlZ/M4S', '2002-06-27', '2022-02-10 19:45:51', '2022-02-10 20:42:57'),
(45, 1, 1, 'მარიამი', 'ტოხიან', '01024595713', '+995587883793', 'ქ.თბილისი, საცხენისის ქუჩა 8', 'მდედრობითი', '$2y$10$hL/DHGwTweHTQnPY9JEXj.Hp3gFeE2QVyjAnwH2y4WPi.j1FrjNV.', '2001-03-30', '2022-02-10 19:47:14', '2022-02-10 19:47:14'),
(46, 1, 2, 'ელენე', 'სეხნიაშვილი', '01024567723', '+995587883774', 'ქ.თბილისი, ალავერდის ქუჩა 5', 'მდედრობითი', '$2y$10$GX9xX9GSD2d849eJLoSTOOi4imfGxUpnlDrhf19y2Bb6kmrlvTvIO', '2000-02-25', '2022-02-10 19:49:00', '2022-02-10 20:34:21'),
(47, 1, 1, 'გოგა', 'იობიძე', '01024595756', '+995587485495', 'ქ.თბილისი, მინდელის ქუჩა 36', 'მამრობითი', '$2y$10$aRrMY3mAdoKsTm8lsMCCkOA7hyOSnveb..GmqxC6PdrFNoT0zwfkS', '2000-01-08', '2022-02-10 19:50:11', '2022-02-10 19:50:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `student_status` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `student_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
