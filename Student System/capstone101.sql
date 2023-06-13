-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 02:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone101`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Firstname`, `Lastname`, `Username`, `Password`) VALUES
('admin', 'admin', 'admin', '$2y$10$9IpC3nR.USHKFW1GZwduU.8HHzHATUxCc9AjEQU6HGVGor2DfUCE6'),
('Jan', 'Jan', 'Jan', '$2y$10$NdDZs2NnqIVtnJ4VVXzQu.jJ.9BP2YjPC0XI00WXqRH2g.quOgPza');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(40) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_desc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `course_desc`) VALUES
('ABM', 'Accountancy, Business, and Management', 'Academic Track'),
('CA', 'Culinary Arts', 'Technical-Vocational Track'),
('CE', 'Computer Engineering', 'Technical-Vocational Track'),
('GAS', 'General Academic Strand', 'Academic Track'),
('HRM', 'Hotel and Restaurant Management', 'Technical-Vocational Track'),
('HUMSS', 'Humanities and Social Science', 'Academic Track'),
('IT', 'Information Technology', 'Technical-Vocational Track'),
('OM', 'Office Management', 'Technical-Vocational Track'),
('PN', 'Practical Nursing', 'Technical-Vocational Track'),
('STEM', 'Science, Technology, Engineering, and Mathematics', 'Academic Track');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `Student_School_id` int(40) NOT NULL,
  `Student_status` varchar(40) DEFAULT NULL,
  `Student_finance` varchar(40) DEFAULT NULL,
  `Finance` varchar(40) DEFAULT NULL,
  `Advertisement` varchar(40) DEFAULT NULL,
  `Student_lodge` varchar(40) DEFAULT NULL,
  `Student_choice` varchar(40) DEFAULT NULL,
  `Choice_why` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`Student_School_id`, `Student_status`, `Student_finance`, `Finance`, `Advertisement`, `Student_lodge`, `Student_choice`, `Choice_why`, `student_lrn`) VALUES
(1, 'New', 'Parents', 'Full-time Student', 'Radio', 'Staying with parents', 'Yes', 'Best Quality Education', '128138070151'),
(2, 'New', 'Parents', 'Full-time Student', 'Facebook', 'Staying with parents', 'Yes', 'Best Quality Education', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_course_id` int(40) NOT NULL,
  `course_code` varchar(40) NOT NULL,
  `date_enrolled` datetime DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_course_id`, `course_code`, `date_enrolled`, `student_lrn`) VALUES
(1, 'ABM', '2020-02-20 15:59:05', '128138070151'),
(2, 'IT', '2020-02-22 21:18:53', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_education_background`
--

CREATE TABLE `student_education_background` (
  `student_education_background_id` int(40) NOT NULL,
  `Elementary` varchar(40) DEFAULT NULL,
  `Junior_high` varchar(40) DEFAULT NULL,
  `Elementary_year` varchar(40) DEFAULT NULL,
  `Junior_high_year` varchar(40) DEFAULT NULL,
  `Elementary_awards` varchar(40) DEFAULT NULL,
  `Junior_high_awards` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_education_background`
--

INSERT INTO `student_education_background` (`student_education_background_id`, `Elementary`, `Junior_high`, `Elementary_year`, `Junior_high_year`, `Elementary_awards`, `Junior_high_awards`, `student_lrn`) VALUES
(1, 'ICCS', 'ICNHS', '2006-2007', '2017-2018', 'None', 'None', '128138070151'),
(2, 'ICCS', 'ICNHS', '2006', '2017', 'None', 'None', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_family_father`
--

CREATE TABLE `student_family_father` (
  `student_father_id` int(40) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Age` varchar(40) DEFAULT NULL,
  `Birthplace` varchar(40) DEFAULT NULL,
  `Current_add` varchar(40) DEFAULT NULL,
  `Permanent_add` varchar(40) DEFAULT NULL,
  `Contact_number` varchar(40) DEFAULT NULL,
  `Highest_edu` varchar(40) DEFAULT NULL,
  `Occupation` varchar(40) DEFAULT NULL,
  `Company_add` varchar(40) DEFAULT NULL,
  `Religion` varchar(40) DEFAULT NULL,
  `Sibling_num` varchar(40) DEFAULT NULL,
  `Health_condition` varchar(40) DEFAULT NULL,
  `Health_problem` varchar(40) DEFAULT NULL,
  `Monthly_income` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_family_father`
--

INSERT INTO `student_family_father` (`student_father_id`, `Name`, `Age`, `Birthplace`, `Current_add`, `Permanent_add`, `Contact_number`, `Highest_edu`, `Occupation`, `Company_add`, `Religion`, `Sibling_num`, `Health_condition`, `Health_problem`, `Monthly_income`, `student_lrn`) VALUES
(1, 'Jerick', '35', 'Iligan City', 'Iligan City', 'Iligan City', '09057956877', 'College', 'Teacher', 'Iligan City', 'Roman Catholic', '2', 'Excellent', 'None', '10000 Above', '128138070151'),
(2, 'Erle', '40', 'Iligan City', 'Iligan City', 'Iligan City', '090579568777', 'College', 'Teacher', 'None', 'Roman Catholic', '2', 'Excellent', 'None', '10000 Above', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_family_mother`
--

CREATE TABLE `student_family_mother` (
  `student_mother_id` int(40) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Age` varchar(40) DEFAULT NULL,
  `Birthplace` varchar(40) DEFAULT NULL,
  `Current_add` varchar(40) DEFAULT NULL,
  `Permanent_add` varchar(40) DEFAULT NULL,
  `Contact_number` varchar(40) DEFAULT NULL,
  `Highest_edu` varchar(40) DEFAULT NULL,
  `Occupation` varchar(40) DEFAULT NULL,
  `Company_add` varchar(40) DEFAULT NULL,
  `Religion` varchar(40) DEFAULT NULL,
  `Sibling_num` varchar(40) DEFAULT NULL,
  `Health_condition` varchar(40) DEFAULT NULL,
  `Health_problem` varchar(40) DEFAULT NULL,
  `Monthly_income` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_family_mother`
--

INSERT INTO `student_family_mother` (`student_mother_id`, `Name`, `Age`, `Birthplace`, `Current_add`, `Permanent_add`, `Contact_number`, `Highest_edu`, `Occupation`, `Company_add`, `Religion`, `Sibling_num`, `Health_condition`, `Health_problem`, `Monthly_income`, `student_lrn`) VALUES
(1, 'Jerickae', '35', 'Iligan City', 'Iligan City', 'Iligan City', '09057956877', 'College', 'Teacher', 'Iligan City', 'Roman Catholic', '2', 'Excellent', 'None', '10000 Above', '128138070151'),
(2, 'Erla', '40', 'Iligan City', 'Iligan City', 'Iligan City', '09057956877', 'College', 'Teacher', 'Iligan City', 'Roman Catholic', '2', 'Excellent', 'None', '10000 Above', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_lrn` varchar(40) NOT NULL,
  `student_firstname` varchar(40) DEFAULT NULL,
  `student_lastname` varchar(40) NOT NULL,
  `student_contact` varchar(40) NOT NULL,
  `student_picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_lrn`, `student_firstname`, `student_lastname`, `student_contact`, `student_picture`) VALUES
('128138070151', 'Jan', 'Rovic', '09057956877', 'student_image/1582185011-Rovic-Jan-unnamed.jpg'),
('128138070152', 'Jerick', 'Carlo', '09057956877', 'student_image/1582528108-Carlo-Jerick-unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_organization`
--

CREATE TABLE `student_organization` (
  `student_organization_id` int(40) NOT NULL,
  `Org_inside_name` varchar(40) DEFAULT NULL,
  `Org_inside_position` varchar(40) DEFAULT NULL,
  `Org_outside_name` varchar(40) DEFAULT NULL,
  `Org_outside_position` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_organization`
--

INSERT INTO `student_organization` (`student_organization_id`, `Org_inside_name`, `Org_inside_position`, `Org_outside_name`, `Org_outside_position`, `student_lrn`) VALUES
(1, 'None', 'None', 'None', 'None', '128138070151'),
(2, 'None', 'None', 'None', 'None', '128138070152');

-- --------------------------------------------------------

--
-- Table structure for table `student_personal`
--

CREATE TABLE `student_personal` (
  `Student_personal_id` int(40) NOT NULL,
  `Surname` varchar(40) DEFAULT NULL,
  `Gender` varchar(40) DEFAULT NULL,
  `Nickname` varchar(40) DEFAULT NULL,
  `Civil_status` varchar(40) DEFAULT NULL,
  `Age` varchar(40) DEFAULT NULL,
  `Birthday` varchar(40) DEFAULT NULL,
  `Birthplace` varchar(40) DEFAULT NULL,
  `Parents_marital_status` varchar(40) DEFAULT NULL,
  `Emergency_contact` varchar(40) DEFAULT NULL,
  `Current_add` varchar(60) NOT NULL,
  `Permanent_add` varchar(60) NOT NULL,
  `Company_name` varchar(60) NOT NULL,
  `Company_add` varchar(60) NOT NULL,
  `Company_position` varchar(60) NOT NULL,
  `student_lrn` varchar(40) DEFAULT NULL,
  `Birth_rank` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_personal`
--

INSERT INTO `student_personal` (`Student_personal_id`, `Surname`, `Gender`, `Nickname`, `Civil_status`, `Age`, `Birthday`, `Birthplace`, `Parents_marital_status`, `Emergency_contact`, `Current_add`, `Permanent_add`, `Company_name`, `Company_add`, `Company_position`, `student_lrn`, `Birth_rank`) VALUES
(1, 'Galinada', 'Male', 'Jan', 'Single', '18', '2001-06-24', 'Iligan City', 'Living Together', '09654534421', 'Iligan City', 'Iligan City', '', '', '', '128138070151', 'Eldest'),
(2, 'Almeda', 'Male', 'Jerjer', 'Single', '20', '1986-06-06', 'Iligan City', 'Living Together', '09057956877', '', '', '', '', '', '128138070152', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_ranking`
--

CREATE TABLE `student_ranking` (
  `student_rank_id` int(40) NOT NULL,
  `Sibling_name` varchar(40) DEFAULT NULL,
  `Sibling_name_2` varchar(40) DEFAULT NULL,
  `Sibling_name_3` varchar(40) DEFAULT NULL,
  `Sibling_name_4` varchar(40) DEFAULT NULL,
  `Sibling_name_5` varchar(40) DEFAULT NULL,
  `Sibling_name_6` varchar(40) DEFAULT NULL,
  `Sibling_name_7` varchar(40) DEFAULT NULL,
  `Sibling_name_8` varchar(40) DEFAULT NULL,
  `Sibling_name_9` varchar(40) DEFAULT NULL,
  `School_work` varchar(40) DEFAULT NULL,
  `School_work_2` varchar(40) DEFAULT NULL,
  `School_work_3` varchar(40) DEFAULT NULL,
  `School_work_4` varchar(40) DEFAULT NULL,
  `School_work_5` varchar(40) DEFAULT NULL,
  `School_work_6` varchar(40) DEFAULT NULL,
  `School_work_7` varchar(40) DEFAULT NULL,
  `School_work_8` varchar(40) DEFAULT NULL,
  `School_work_9` varchar(40) DEFAULT NULL,
  `Age` varchar(40) DEFAULT NULL,
  `Age_1` varchar(40) DEFAULT NULL,
  `Age_2` varchar(40) DEFAULT NULL,
  `Age_3` varchar(40) DEFAULT NULL,
  `Age_4` varchar(40) DEFAULT NULL,
  `Age_5` varchar(40) DEFAULT NULL,
  `Age_6` varchar(40) DEFAULT NULL,
  `Age_7` varchar(40) DEFAULT NULL,
  `Age_8` varchar(40) DEFAULT NULL,
  `Age_9` varchar(40) DEFAULT NULL,
  `student_lrn` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ranking`
--

INSERT INTO `student_ranking` (`student_rank_id`, `Sibling_name`, `Sibling_name_2`, `Sibling_name_3`, `Sibling_name_4`, `Sibling_name_5`, `Sibling_name_6`, `Sibling_name_7`, `Sibling_name_8`, `Sibling_name_9`, `School_work`, `School_work_2`, `School_work_3`, `School_work_4`, `School_work_5`, `School_work_6`, `School_work_7`, `School_work_8`, `School_work_9`, `Age`, `Age_1`, `Age_2`, `Age_3`, `Age_4`, `Age_5`, `Age_6`, `Age_7`, `Age_8`, `Age_9`, `student_lrn`) VALUES
(1, 'Jan', '', '', '', '', NULL, NULL, NULL, NULL, 'None', '', '', '', '', NULL, NULL, NULL, NULL, 'None', NULL, '', '', '', '', NULL, NULL, NULL, NULL, '128138070151'),
(2, 'None', '', '', '', '', NULL, NULL, NULL, NULL, 'None', '', '', '', '', NULL, NULL, NULL, NULL, 'None', NULL, '', '', '', '', NULL, NULL, NULL, NULL, '128138070152');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`Student_School_id`),
  ADD KEY `student_info_school` (`student_lrn`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `courses_student_course` (`course_code`),
  ADD KEY `student_info_student_course` (`student_lrn`);

--
-- Indexes for table `student_education_background`
--
ALTER TABLE `student_education_background`
  ADD PRIMARY KEY (`student_education_background_id`),
  ADD KEY `student_info_student_education_background` (`student_lrn`);

--
-- Indexes for table `student_family_father`
--
ALTER TABLE `student_family_father`
  ADD PRIMARY KEY (`student_father_id`),
  ADD KEY `student_info_student_family_father` (`student_lrn`);

--
-- Indexes for table `student_family_mother`
--
ALTER TABLE `student_family_mother`
  ADD PRIMARY KEY (`student_mother_id`),
  ADD KEY `student_info_student_family_mother` (`student_lrn`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_lrn`);

--
-- Indexes for table `student_organization`
--
ALTER TABLE `student_organization`
  ADD PRIMARY KEY (`student_organization_id`),
  ADD KEY `student_info_student_organization` (`student_lrn`);

--
-- Indexes for table `student_personal`
--
ALTER TABLE `student_personal`
  ADD PRIMARY KEY (`Student_personal_id`),
  ADD KEY `student_info_student_personal` (`student_lrn`);

--
-- Indexes for table `student_ranking`
--
ALTER TABLE `student_ranking`
  ADD PRIMARY KEY (`student_rank_id`),
  ADD KEY `student_info_student_ranking` (`student_lrn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `Student_School_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `student_course_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_education_background`
--
ALTER TABLE `student_education_background`
  MODIFY `student_education_background_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_family_father`
--
ALTER TABLE `student_family_father`
  MODIFY `student_father_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_family_mother`
--
ALTER TABLE `student_family_mother`
  MODIFY `student_mother_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_organization`
--
ALTER TABLE `student_organization`
  MODIFY `student_organization_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_personal`
--
ALTER TABLE `student_personal`
  MODIFY `Student_personal_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_ranking`
--
ALTER TABLE `student_ranking`
  MODIFY `student_rank_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `student_info_school` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `courses_student_course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_info_student_course` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_education_background`
--
ALTER TABLE `student_education_background`
  ADD CONSTRAINT `student_info_student_education_background` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_family_father`
--
ALTER TABLE `student_family_father`
  ADD CONSTRAINT `student_info_student_family_father` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_family_mother`
--
ALTER TABLE `student_family_mother`
  ADD CONSTRAINT `student_info_student_family_mother` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_organization`
--
ALTER TABLE `student_organization`
  ADD CONSTRAINT `student_info_student_organization` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_personal`
--
ALTER TABLE `student_personal`
  ADD CONSTRAINT `student_info_student_personal` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);

--
-- Constraints for table `student_ranking`
--
ALTER TABLE `student_ranking`
  ADD CONSTRAINT `student_info_student_ranking` FOREIGN KEY (`student_lrn`) REFERENCES `student_info` (`student_lrn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
