SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE EXAM_SYSTEM;
USE EXAM_SYSTEM;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `register_number` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `app_no` VARCHAR(10) NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_name` VARCHAR(100) DEFAULT NULL,
  `name_tamil` VARCHAR(100) DEFAULT NULL,
  `name_english` varchar(100) DEFAULT NULL,
  `phone_no` VARCHAR(20) DEFAULT NULL -- Removed the trailing comma here
);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_number` (`register_number`);

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;
