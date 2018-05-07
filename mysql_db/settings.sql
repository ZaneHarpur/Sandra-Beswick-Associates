-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: sql35.jnb1.host-h.net
-- Generation Time: Apr 04, 2018 at 02:22 PM
-- Server version: 10.0.34-MariaDB-1~wheezy
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_sba_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `item` varchar(128) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `item`, `value`, `date`) VALUES
(1, 'content', 'title', 'Financial Distress Evaluation', ''),
(4, 'content', 'description', 'A company under financial distress can incur costs related to the situation, such as more expensive financing, opportunity costs of projects and less productive employees. The firm\'s cost of borrowing additional capital will usually increase, making it more difficult and expensive to raise the much needed funds. In an effort to satisfy short-term obligations, management might pass on profitable longer-term projects. Employees of a distressed firm usually have lower morale and higher stress caused by the increased chance of bankruptcy, which would force them out of their jobs. Such workers can be less productive when under such a burden.													 													 													 													 													', '1486635129'),
(5, 'content', 'description', 'Answer the following questions to find out if your company is in financial distress.', '1486635317'),
(6, 'content', 'button', 'Start Now', '1486635332'),
(8, 'order', '2', 'Planning & Control', '1486666854'),
(9, 'order', '3', 'Income & Expenses', '1486666870'),
(10, 'order', '4', 'Debtors & Creditors', '1486666902'),
(11, 'order', '5', 'Financing/Gearing', '1486667076'),
(12, 'order', '6', 'Working Capital', '1486667086'),
(13, 'content', 'complete', 'Complete Your Evaluation', '1486808185'),
(14, 'content', 'completeDescription', 'Enter your email address below to have your financial evaluation emailed to you.', '1486808278'),
(15, 'result', '25', 'In Distress', '1486809089'),
(16, 'result', '50', 'In Imminent Distress', '1486809121'),
(17, 'result', '75', 'At Risk of Distress', '1486809130'),
(18, 'result', '100', 'Healthy', '1486809140'),
(19, 'resultColour', 'In Distress', '#c90606', '1486809182'),
(20, 'emailContent', 'title', 'Your Result', '1486809615'),
(21, 'emailContent', 'description', 'Below are the results from your financial stress test. Contact us for further information.', '1486809669'),
(22, 'resultColour', 'In Imminent Distress', '#ff730f', '1486810292'),
(23, 'resultColour', 'At Risk of Distress', '#ffb50f', '1486810313'),
(24, 'resultColour', 'Healthy', '#30c300', '1486810329');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
