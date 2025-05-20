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
  `phone_no` VARCHAR(20) DEFAULT NULL
);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_number` (`register_number`);

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;


INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243150', '2004-05-10', '7050', '202310', 'PYTHON PROGRAMMING', 'அருண் குமார்', 'ARUN KUMAR', '9087654321');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243151', '2003-08-12', '7051', '202311', 'DATA SCIENCE', 'முருகேசன் எம்', 'MURUGESAN M', '9087654322');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243152', '2004-01-20', '7052', '202312', 'JAVA PROGRAMMING', 'ரமேஷ் சி', 'RAMESH C', '9087654323');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243153', '2003-11-11', '7053', '202314', 'DATA STRUCTURES', 'சண்முகம் ஏ', 'SHANMUGAM A', '9087654324');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243154', '2002-07-25', '7054', '202316', 'DATABASE SYSTEMS', 'ஜெயபால் டி', 'JAYABAL T', '9087654325');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243155', '2004-06-14', '7055', '202310', 'PYTHON PROGRAMMING', 'மதன் குமார்', 'MADHAN KUMAR', '9087654326');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243156', '2003-09-30', '7056', '202311', 'DATA SCIENCE', 'கணேஷ் என்', 'GANESH N', '9087654327');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243157', '2004-03-22', '7057', '202312', 'JAVA PROGRAMMING', 'சுதாகர் ஆர்', 'SUDHAKAR R', '9087654328');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243158', '2002-12-02', '7058', '202314', 'DATA STRUCTURES', 'விஜய் பி', 'VIJAY P', '9087654329');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243159', '2004-10-18', '7059', '202316', 'DATABASE SYSTEMS', 'சந்திரன் எஸ்', 'CHANDRAN S', '9087654330');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243160', '2003-04-07', '7060', '202310', 'PYTHON PROGRAMMING', 'கோபி என்', 'GOPI N', '9087654331');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243161', '2004-08-16', '7061', '202311', 'DATA SCIENCE', 'ராஜா வி', 'RAJA V', '9087654332');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243162', '2003-10-03', '7062', '202312', 'JAVA PROGRAMMING', 'அனந்த் சி', 'ANANTH C', '9087654333');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243163', '2004-01-11', '7063', '202314', 'DATA STRUCTURES', 'தயா எம்', 'DAYA M', '9087654334');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243164', '2003-06-21', '7064', '202316', 'DATABASE SYSTEMS', 'திலீப் ஆர்', 'DILEEP R', '9087654335');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243165', '2004-02-15', '7065', '202310', 'PYTHON PROGRAMMING', 'மோகன் எம்', 'MOHAN M', '9087654336');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243166', '2002-09-12', '7066', '202311', 'DATA SCIENCE', 'மணிகண்டன் ஜி', 'MANIKANDAN G', '9087654337');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243167', '2004-07-19', '7067', '202312', 'JAVA PROGRAMMING', 'அரவிந்த் யு', 'ARAVIND Y', '9087654338');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243168', '2003-03-17', '7068', '202314', 'DATA STRUCTURES', 'கார்த்திக் என்', 'KARTHIK N', '9087654339');
INSERT INTO students (id, register_number, dob, app_no, course_code, course_name, name_tamil, name_english, phone_no) VALUES (NULL, '620822243169', '2002-11-28', '7069', '202316', 'DATABASE SYSTEMS', 'சுரேஷ் டி', 'SURESH T', '9087654340');
