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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(512) NOT NULL,
  `answer1` varchar(128) NOT NULL,
  `answer2` varchar(128) NOT NULL,
  `answer3` varchar(128) NOT NULL,
  `answer4` varchar(128) NOT NULL,
  `answer5` varchar(128) NOT NULL,
  `answer1Weight` varchar(128) NOT NULL,
  `answer2Weight` varchar(128) NOT NULL,
  `answer3Weight` varchar(128) NOT NULL,
  `answer4Weight` varchar(128) NOT NULL,
  `answer5Weight` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `active` varchar(128) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer1Weight`, `answer2Weight`, `answer3Weight`, `answer4Weight`, `answer5Weight`, `category`, `active`, `date`) VALUES
(1, 'test question', 'yes', 'no', '', '', '', '10', '10', '', '', '', 'Integrity & Experience', 'no', '1486584531'),
(2, 'test question', 'yes', 'no', '', '', '', '10', '10', '', '', '', 'Planning & Control', 'no', '1486585072'),
(3, 'test question', 'yes', 'no', '', '', '', '10', '10', '', '', '', 'Planning & Control', 'no', '1486585191'),
(4, 'Is the organisation or management thereof being investigated for any fraudulent activity?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '10', '0', '3.333', '', '', 'Integrity & Experience', 'yes', '1486720492'),
(5, 'Has the business expanded it\'s products or market share resulting in a strain on resources?			 			 			', 'Yes', 'Not', 'Not Sure', '', '', '5', '0', '1.667', '', '', 'Integrity & Experience', 'yes', '1486720555'),
(6, 'Have any executives resigned or are planning to?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '5', '0', '1.6667', '', '', 'Integrity & Experience', 'yes', '1486720584'),
(7, 'Do you understand, and accurately prepare, financial statements			 			 			', 'Yes', 'No', 'Not Sure', '', '', '5', '0', '1.667', '', '', 'Planning & Control', 'yes', '1486750779'),
(8, 'Does your organisagtion have a clear organisational chart with clearly defined responsibilities and roles?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '5', '0', '1.667', '', '', 'Planning & Control', 'yes', '1486750810'),
(9, 'Do you prepare and monitor cash budget on a regular basis?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '10', '0', '3.333', '', '', 'Planning & Control', 'yes', '1486750839'),
(10, 'Do you prepare a schedule of all your costs and ensure that they are recovered in your selling price?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Income & Expenses', 'yes', '1486750938'),
(11, 'Is your interest cover ratio greater than 1?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Income & Expenses', 'yes', '1486751017'),
(12, 'Do you have measures in place to monitor daily cash usage and control expenditure?', 'Yes', 'No', 'Not Sure', '', '', '7.5', '0', '2.5', '', '', 'Income & Expenses', 'yes', '1486751062'),
(13, 'Are your Debtors collection days higher than the industry average?			 			 			', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Debtors & Creditors', 'yes', '1486751098'),
(14, 'Have you/Are you struggling to meet your creditor or SARS repayment obligations?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Debtors & Creditors', 'yes', '1486751129'),
(15, 'Do you know which of your customers cost you the most, and which cost you the least?', 'Yes', 'No', 'Not Sure', '', '', '7.5', '0', '2.5', '', '', 'Debtors & Creditors', 'yes', '1486751158'),
(16, 'Is your Debt Equity Ratio greater than 1?', 'Yes', 'No', 'Not Sure', '', '', '7.5', '0', '2.5', '', '', 'Financing/Gearing', 'yes', '1486751273'),
(17, 'Are the company\'s total liabilities greater than its assets?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Financing/Gearing', 'yes', '1486751401'),
(18, 'Have funders refused the company funding or revised up the interest rate?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Financing/Gearing', 'yes', '1486751439'),
(19, 'Do your cash payments exceed cash income or is the company\'s cash flow negative?', 'Yes', 'No', 'Not Sure', '', '', '7.5', '0', '2.5', '', '', 'Working Capital', 'yes', '1486751473'),
(20, 'Has the company\'s cash decliened rapidly in the past 12 months?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Working Capital', 'yes', '1486751500'),
(21, 'Have Inventory levels increased substantially at year end compared to prior years?', 'Yes', 'No', 'Not Sure', '', '', '3.75', '0', '1.25', '', '', 'Working Capital', 'yes', '1486751519');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
