-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2019 at 11:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certme`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(6) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `question_id` int(6) NOT NULL,
  `answer_true` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer`, `question_id`, `answer_true`) VALUES
(25, 'main method', 9, 0),
(26, 'finalize method', 9, 0),
(27, 'static method', 9, 1),
(28, 'private method', 9, 0),
(29, 'void', 10, 0),
(30, 'int ', 10, 0),
(31, 'float', 10, 0),
(32, 'int and float both', 10, 1),
(33, 'Process', 11, 0),
(34, 'Builder', 11, 0),
(35, 'ProcessBuilder', 11, 1),
(36, 'CreateBuilder', 11, 0),
(37, 'Java system properties are accessible by any process', 12, 0),
(38, 'Java system properties are accessible by processes they are added to', 12, 1),
(39, 'Java system properties are retrieved by System.getenv()', 12, 0),
(40, 'Java system properties are set by System.setenv()', 12, 0),
(41, 'Integer', 13, 0),
(42, 'Boolean', 13, 1),
(43, 'Float', 13, 0),
(44, 'String', 13, 0),
(45, '!', 14, 0),
(46, '|', 14, 0),
(47, '&', 14, 0),
(48, '&&', 14, 1),
(49, 'String', 15, 0),
(50, 'StringBuffer', 15, 1),
(51, 'String & StringBuffer', 15, 0),
(52, 'None Of The Mentioned', 15, 0),
(53, 'concat()', 16, 0),
(54, 'append()', 16, 1),
(55, 'join()', 16, 0),
(56, 'concatenate()', 16, 0),
(57, 'length()', 17, 1),
(58, 'Length()', 17, 0),
(59, 'capacity()', 17, 0),
(60, 'Capacity()', 17, 0),
(61, 'method overloading', 18, 1),
(62, 'method overriding', 18, 0),
(63, 'method hiding', 18, 0),
(64, 'All of above', 18, 0),
(65, 'Phagwara Point', 19, 0),
(66, 'PHP Hypertext Preprocessor', 19, 1),
(67, 'Pin Hoody Pin', 19, 0),
(68, 'None Of Above', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(6) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Kishore', 'Narang', 'test.newgacc@gmail.com', 'kisme'),
(2, 'Kishore', 'Narang', 'narangkishore98@gmail.com', 'admin'),
(3, 'Nikhil', 'Nikhil', 'nikhilthakur04@gmail.com', 'Kishore'),
(4, 'Tarlochan ', 'Singh', 'tarlochan@gmail.com', 'admin'),
(5, 'Kishore', 'Narang', 'email@email.gom', 'ad'),
(7, 'Nikhil', 'Thankur', 'ghnta@gmail.com', 'password'),
(10, 'Kishore', 'Narang', 'hello@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(6) NOT NULL,
  `question` varchar(200) NOT NULL,
  `test_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `test_id`) VALUES
(9, 'Which of these is the method which is executed first before execution of any other thing takes place in a program?', 7),
(10, 'Which of these data type can be used for a method having a return statement in it?', 7),
(11, 'Which object Java application uses to create a new process?', 7),
(12, 'Which of the following is true about Java system properties?', 7),
(13, 'What is the output of relational operators?', 7),
(14, 'Which of these operators can skip evaluating right hand operand?', 7),
(15, 'Which of these class is used to create an object whose character sequence is mutable?', 7),
(16, 'Which of this method of class StringBuffer is used to concatenate the string representation to the end of invoking string?', 7),
(17, 'Which of these method of class StringBuffer is used to find the length of current character sequence?', 7),
(18, 'What is the process of defining two or more methods within same class that have same name but different parameters declaration?', 7),
(19, 'What is Full Form Of PHP', 8);

-- --------------------------------------------------------

--
-- Table structure for table `register_test`
--

CREATE TABLE `register_test` (
  `registration_id` int(6) NOT NULL,
  `test_id` int(6) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `registration_date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `completion_date` datetime NOT NULL,
  `score` double(5,2) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_test`
--

INSERT INTO `register_test` (`registration_id`, `test_id`, `customer_id`, `registration_date`, `status`, `completion_date`, `score`, `reg_date`) VALUES
(26, 7, 5, '2019-10-03 00:00:00', 1, '2019-10-09 15:26:31', 0.00, '2019-10-03'),
(29, 7, 5, '2019-10-09 00:00:00', 1, '2019-10-09 15:28:54', 0.00, '2019-10-09'),
(31, 8, 2, '2019-10-09 00:00:00', 0, '2019-10-09 16:32:21', 1.00, '2019-10-09'),
(34, 7, 2, '2019-10-09 00:00:00', 0, '2019-10-09 16:42:45', 3.00, '2019-10-09'),
(35, 7, 10, '2019-10-09 00:00:00', 0, '2019-10-09 16:50:24', 1.00, '2019-10-08'),
(37, 7, 10, '2019-10-09 00:00:00', 0, '2019-10-09 16:50:24', 1.00, '2019-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(2) NOT NULL,
  `test_name` varchar(20) NOT NULL,
  `test_description` varchar(500) NOT NULL,
  `test_category` int(6) NOT NULL,
  `test_max_mins` int(3) NOT NULL,
  `test_max_questions` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_description`, `test_category`, `test_max_mins`, `test_max_questions`) VALUES
(7, 'OCA Practice Test', 'Oracle Certified Associate - Practice Test. This Test is specially designed for those who are going to appear for Oracle OCA Examination in future. This test helps you to know the idea which type of questions you may see in your actual test.', 16, 1, 10),
(8, 'PHP Test', 'Temprorary Description', 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `category_id` int(6) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`category_id`, `category_name`) VALUES
(16, 'Programming');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `answers_ibfk_1` (`question_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_ibfk_1` (`test_id`);

--
-- Indexes for table `register_test`
--
ALTER TABLE `register_test`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `test_id_2` (`test_id`,`customer_id`,`reg_date`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `tests_ibfk_1` (`test_category`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `register_test`
--
ALTER TABLE `register_test`
  MODIFY `registration_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `category_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register_test`
--
ALTER TABLE `register_test`
  ADD CONSTRAINT `register_test_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_test_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`test_category`) REFERENCES `test_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
