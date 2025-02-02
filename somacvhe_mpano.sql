-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 08:31 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somacvhe_mpano`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `moving_to` varchar(255) DEFAULT NULL,
  `moving_from` varchar(255) DEFAULT NULL,
  `moving_date` date DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `company`, `moving_to`, `moving_from`, `moving_date`, `message`, `created_at`) VALUES
(4, 'Uwabera Telesphore', 't.uwabera@gmail.com', '0785043355', 'TeleTech Solutions.Ltd', 'Kicukiro', 'Gahanga', '2024-12-04', 'I will move from Kicukiro to Gahanga.', '2024-11-30 17:24:30'),
(7, 'Juli Du Faur', 'juli@domainsupport.online', '653526416', 'Juli Du Faur', 'Ruucyxhtzq', 'Tgluzlvmbatsgd', NULL, 'Hello!\r\n\r\nI just discovered your recently launched website and thought I&#039;d get in touch - would you like any help with your  website?\r\nI would be happy to assist.\r\n\r\nKind regards,\r\nJuli', '2024-12-25 08:17:46'),
(8, 'Doreen Abdullah', 'doreen@domainsupport.online', '155078698', 'Doreen Abdullah', 'J Ermsz', 'Lcchq Iwxr', NULL, 'Hello,\r\n\r\nCongratulations on your new website, mpanocourierandrelocation.rw! I just analyzed its search engine visibility and noticed several opportunities to boost your rankings. Your site has potential to attract significantly more organic traffic and achieve better visibility on Google.\r\n\r\nInterestingly, that 68% of online experiences begin with a search engine? I focus on SEO optimization and could assist you:\r\n- Improve your Google rankings for key search terms\r\n- Increase your organic traffic\r\n- Enhance your content for better search visibility\r\n- Fix technical SEO issues holding you back\r\n\r\nWould you be interested in a free SEO audit of your website?\r\n\r\nRegards,\r\nDoreen', '2024-12-26 11:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2a$12$EgZ8/M4uueBlFRek.ePAaeiO16R2vxiYRikfv1P41kjZBebo0Rp9u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
