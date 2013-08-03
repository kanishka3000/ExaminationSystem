/*mysqldump.php version 1.02 */
create database UCSCEXAM;use UCSCEXAM;/* Table structure for table `activecourse` */
DROP TABLE IF EXISTS `activecourse`;

CREATE TABLE `activecourse` (
  `Ac_id` varchar(10) NOT NULL,
  `batch` varchar(5) default NULL,
  `StartDate` varchar(10) default NULL,
  `Current` varchar(2) default 'T',
  `C_id` varchar(10) default NULL,
  PRIMARY KEY  (`Ac_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `activecourse` */
insert into `activecourse` values
('2007ICT','5`','2007-4-6','T','ICT'),
('2006ICT','4','2006-7-8','F','ICT'),
('WCD20094','7','2007-9-10','T','WCD'),
('2008BLE','5','2008-2-1','T','BLE');

/* Table structure for table `attendance` */
DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `RegistrationId` varchar(10) default NULL,
  `Sub_id` varchar(10) default NULL,
  `Ac_id` varchar(10) default NULL,
  `Count` int(5) default NULL,
  `Total` int(5) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


/* Table structure for table `course` */
DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `C_id` varchar(10) NOT NULL,
  `CourseName` varchar(80) default NULL,
  `LecturerInCharge` varchar(70) default NULL,
  `Years` int(6) default NULL,
  `Degree` varchar(2) NOT NULL default 'T',
  PRIMARY KEY  (`C_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `course` */
insert into `course` values
('ICT','ICMTEC','DR.Jeewani',3,'T'),
('CS','CompScience','Dr.Damith',3,'T'),
('DA','DigitArts','Dr.Damith',1,'F'),
('WD','WebDevelopment','Dr.Damith',1,'F'),
('SD','Systemdesign','Dr.Damith',1,'F'),
('WCD','webdevelopment','kanishak',2,'T'),
('SCBCD','suncertified busines','me',3,'T'),
('BLE','Bachelor of Labour Education','Dr. Hirimburegama',3,'T');

/* Table structure for table `exam` */
DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `Exam_id` varchar(20) NOT NULL,
  `ExamName` varchar(20) default NULL,
  `Active` varchar(3) default 'T',
  `AssignmentPercentage` int(4) default NULL,
  `AttendancePercentage` int(4) default NULL,
  `Afrom` int(4) default NULL,
  `Bfrom` int(4) default NULL,
  `Cfrom` int(4) default NULL,
  `Dfrom` int(4) default NULL,
  `Sub_id` varchar(10) default NULL,
  `Exa_id` varchar(15) NOT NULL,
  PRIMARY KEY  (`Exam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `exam` */
insert into `exam` values
('Ex005-ICT1001',null,'F',20,10,70,55,40,30,'ICT1001','Ex005'),
('Ex005-ICT1002',null,'F',20,10,70,55,40,30,'ICT1002','Ex005'),
('Ex005-ICT1003',null,'F',20,10,70,55,40,30,'ICT1003','Ex005'),
('EX007-ICT1001',null,'F',30,20,70,55,40,30,'ICT1001','EX007'),
('EX007-ICT1002',null,'F',20,20,70,55,40,30,'ICT1002','EX007'),
('EX007-ICT1003',null,'F',30,20,70,55,40,30,'ICT1003','EX007'),
('Ex008-ICT2001',null,'F',30,10,70,55,40,30,'ICT2001','Ex008'),
('Ex008-ICT2002',null,'F',20,10,70,55,40,30,'ICT2002','Ex008'),
('Ex008-ICT2003',null,'F',30,10,70,55,40,30,'ICT2003','Ex008'),
('Ex008-ICT2004',null,'F',20,10,70,55,40,30,'ICT2004','Ex008'),
('Ex006-ICT1004',null,'F',25,10,70,55,40,30,'ICT1004','Ex006'),
('Ex0077-ICT3001',null,'F',20,21,70,55,40,30,'ICT3001','Ex0077'),
('Ex0077-ICT3002',null,'F',15,10,70,55,40,30,'ICT3002','Ex0077'),
('Ex0077-ICT3003',null,'F',20,10,70,55,40,30,'ICT3003','Ex0077'),
('Ex0077-ICT3004',null,'F',20,10,70,55,40,30,'ICT3004','Ex0077'),
('ex009-ICT3001',null,'F',20,10,70,55,40,30,'ICT3001','ex009'),
('ex009-ICT3002',null,'F',20,10,70,55,40,30,'ICT3002','ex009'),
('ex009-ICT3003',null,'F',20,10,70,55,40,30,'ICT3003','ex009'),
('ex009-ICT3004',null,'F',20,10,70,55,40,30,'ICT3004','ex009'),
('ex0004-ICT3001',null,'F',10,10,70,55,40,30,'ICT3001','ex0004'),
('ex0004-ICT3002',null,'F',10,10,70,55,40,30,'ICT3002','ex0004'),
('ex0004-ICT3003',null,'F',10,10,70,55,40,30,'ICT3003','ex0004'),
('ex0004-ICT3004',null,'F',10,10,70,55,40,30,'ICT3004','ex0004'),
('ex004-ICT2001',null,'F',20,10,70,55,40,30,'ICT2001','ex004'),
('ex004-ICT2002',null,'F',20,10,70,55,40,30,'ICT2002','ex004'),
('ex004-ICT2003',null,'F',10,20,70,55,40,30,'ICT2003','ex004'),
('ex004-ICT2004',null,'F',10,20,70,55,40,30,'ICT2004','ex004'),
('Ex0011-ICT2001',null,'T',20,10,70,55,40,30,'ICT2001','Ex0011'),
('Ex0011-ICT2002',null,'T',20,10,70,55,40,30,'ICT2002','Ex0011'),
('Ex0011-ICT2003',null,'T',20,10,70,55,40,30,'ICT2003','Ex0011'),
('Ex0011-ICT2004',null,'T',20,10,70,55,40,30,'ICT2004','Ex0011'),
('BLESEP2007-BLE101',null,'F',0,0,70,55,40,30,'BLE101','BLESEP2007'),
('BLESEP2007-BLE102',null,'F',0,0,70,55,40,30,'BLE102','BLESEP2007'),
('BLESEP2007-BLE103',null,'F',0,0,70,55,40,30,'BLE103','BLESEP2007'),
('BLESEP2007-BLE104',null,'F',0,0,70,55,40,30,'BLE104','BLESEP2007'),
('BLEJUN2007-BLE201',null,'F',10,20,70,55,40,30,'BLE201','BLEJUN2007'),
('BLEJUN2007-BLE202',null,'F',10,20,70,55,40,30,'BLE202','BLEJUN2007'),
('BLEJUN2007-BLE203',null,'F',10,10,70,55,40,30,'BLE203','BLEJUN2007'),
('BLEJUN2007-BLE204',null,'F',10,20,70,55,40,30,'BLE204','BLEJUN2007');

/* Table structure for table `examination` */
DROP TABLE IF EXISTS `examination`;

CREATE TABLE `examination` (
  `Exa_id` varchar(25) NOT NULL,
  `ExaminationName` varchar(80) default NULL,
  `TeacherInCharge` varchar(100) NOT NULL,
  `StartDate` varchar(15) NOT NULL,
  `EndDate` varchar(15) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `year` varchar(5) NOT NULL,
  `Semester` varchar(5) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Active` varchar(2) NOT NULL default 'T',
  `updateable` varchar(3) NOT NULL default 'T',
  PRIMARY KEY  (`Exa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `examination` */
insert into `examination` values
('Ex005','myexam','me','2006-6-7','2006-6-19','ucsc','1','1','ICT','F','T'),
('EX007','exame','me','2007-8-9','2007-9-9','ucsc','1','1','ICT','F','F'),
('Ex008','mesl','me','2007-4-8','2007-5-8','ucsc','2','1','ICT','F','F'),
('Ex006','esx','me','2008-4-6','2008-4-10','ucsc','1','2','ICT','F','F'),
('Ex0077','se','me','2008-7-9','2008-7-10','ucsc','3','1','ICT','F','T'),
('ex009','seeexam','me','','','ucsc','3','1','ICT','F','T'),
('ex0004','exi','me','','','usc','3','1','ICT','F','F'),
('ex004','BLE1SEP','me','','','ucsc','2','1','ICT','F','F'),
('Ex0011','ICTSEPT2009','me','','','ucsc','2','1','ICT','T','T'),
('BLESEP2007','BLEFirstYearExam2007','me','','','ucsc','1','1','BLE','F','F'),
('BLEJUN2007','BLESecondYearExam','me','','','UCSC','2','1','BLE','F','T');

/* Table structure for table `mark` */
DROP TABLE IF EXISTS `mark`;

CREATE TABLE `mark` (
  `Markid` int(5) NOT NULL auto_increment,
  `Shy` int(3) default NULL,
  `Assignment` int(5) default '0',
  `Attendance` varchar(5) default '0',
  `Paper` int(5) default '0',
  `PaperEdit` int(5) NOT NULL default '0',
  `Empty` varchar(3) default 'T',
  `Attended` varchar(3) default NULL,
  `RegistrationId` varchar(10) default NULL,
  `Examid` varchar(20) default NULL,
  PRIMARY KEY  (`Markid`)
) ENGINE=MyISAM AUTO_INCREMENT=538 DEFAULT CHARSET=latin1;

/* dumping data for table `mark` */
insert into `mark` values
(419,1,54,'55',78,0,'F','T','2007ict071','Ex005-ICT1001'),
(420,1,54,'44',99,65,'F','T','2007ict071','Ex005-ICT1002'),
(421,1,54,'54',65,0,'F','T','2007ict071','Ex005-ICT1003'),
(422,1,54,'43',76,0,'F','T','2007ict072','Ex005-ICT1001'),
(423,1,56,'56',45,0,'F','T','2007ict072','Ex005-ICT1002'),
(424,1,56,'67',67,0,'F','T','2007ict072','Ex005-ICT1003'),
(425,1,67,'45',56,0,'F','T','2007ict074','Ex005-ICT1001'),
(426,1,45,'56',67,0,'F','T','2007ict074','Ex005-ICT1002'),
(427,2,23,'45',100,89,'F','T','2007ict071','EX007-ICT1001'),
(428,2,45,'33',34,0,'F','T','2007ict071','EX007-ICT1002'),
(429,2,45,'67',78,0,'F','T','2007ict071','EX007-ICT1003'),
(430,2,45,'34',65,0,'F','T','2007ict072','EX007-ICT1001'),
(431,2,45,'54',67,0,'F','T','2007ict072','EX007-ICT1003'),
(432,2,67,'34',43,0,'F','T','2007ict074','EX007-ICT1001'),
(433,2,45,'45',56,0,'F','T','2007ict074','EX007-ICT1002'),
(434,1,43,'67',45,0,'F','T','2007ict074','EX007-ICT1003'),
(435,1,34,'34',67,0,'F','T','2007ict071','Ex008-ICT2001'),
(436,1,67,'78',78,0,'F','T','2007ict071','Ex008-ICT2003'),
(437,1,9,'66',45,0,'F','T','2007ict071','Ex008-ICT2004'),
(438,1,43,'12',43,0,'F','T','2007ict072','Ex008-ICT2001'),
(439,1,86,'79',34,0,'F','T','2007ict072','Ex008-ICT2002'),
(440,1,88,'56',66,0,'F','T','2007ict072','Ex008-ICT2003'),
(441,1,88,'55',67,0,'F','T','2007ict072','Ex008-ICT2004'),
(442,1,56,'67',34,0,'F','T','2007ict074','Ex008-ICT2001'),
(443,1,56,'90',78,0,'F','T','2007ict074','Ex008-ICT2002'),
(444,1,99,'56',78,0,'F','T','2007ict074','Ex008-ICT2003'),
(445,1,67,'90',56,0,'F','T','2007ict071','Ex008-ICT2002'),
(446,1,67,'65',56,0,'F','T','2007ict074','Ex006-ICT1004'),
(447,1,78,'65',100,57,'F','T','2007ict071','Ex006-ICT1004'),
(448,1,67,'78',67,0,'F','T','2007ict072','Ex006-ICT1004'),
(449,1,45,'33',54,0,'F','T','2007ict074','Ex0077-ICT3001'),
(450,1,34,'33',34,0,'F','T','2007ict074','Ex0077-ICT3002'),
(451,1,43,'55',44,0,'F','T','2007ict074','Ex0077-ICT3003'),
(452,1,56,'5',55,0,'F','T','2007ict074','Ex0077-ICT3004'),
(453,1,67,'45',89,567,'F','T','2007ict071','Ex0077-ICT3001'),
(454,1,34,'45',67,0,'F','T','2007ict071','Ex0077-ICT3002'),
(455,1,45,'55',33,0,'F','T','2007ict071','Ex0077-ICT3003'),
(456,1,65,'34',90,0,'F','T','2007ict072','Ex0077-ICT3001'),
(457,1,43,'44',45,0,'F','T','2007ict072','Ex0077-ICT3002'),
(458,2,34,'34',34,0,'F','T','2007ict074','ex009-ICT3001'),
(459,2,43,'34',43,0,'F','T','2007ict074','ex009-ICT3003'),
(460,2,45,'45',67,0,'F','T','2007ict071','ex009-ICT3001'),
(461,2,0,'34',0,0,'F','F','2007ict071','ex009-ICT3002'),
(462,2,45,'45',67,0,'F','T','2007ict071','ex009-ICT3003'),
(463,2,0,'43',0,0,'F','F','2007ict072','ex009-ICT3001'),
(464,2,44,'45',67,0,'F','T','2007ict072','ex009-ICT3002'),
(465,3,54,'43',45,0,'F','T','2007ict074','ex0004-ICT3001'),
(466,2,34,'45',45,0,'F','T','2007ict074','ex0004-ICT3002'),
(467,3,-1,'45',56,0,'F','T','2007ict074','ex0004-ICT3003'),
(468,2,45,'43',45,0,'F','T','2007ict074','ex0004-ICT3004'),
(469,3,88,'-1',100,89,'F','T','2007ict071','ex0004-ICT3001'),
(470,2,56,'34',45,0,'F','T','2007ict071','ex0004-ICT3002'),
(471,3,-1,'34',56,0,'F','T','2007ict071','ex0004-ICT3003'),
(472,2,45,'43',45,0,'F','T','2007ict072','ex0004-ICT3001'),
(473,3,43,'-1',45,0,'F','T','2007ict072','ex0004-ICT3002'),
(474,1,-1,'-1',43,0,'F','T','2007ict072','ex0004-ICT3003'),
(475,1,-1,'-1',44,0,'F','T','2007ict072','ex0004-ICT3004'),
(476,2,45,'43',43,0,'F','T','2007ict074','ex004-ICT2001'),
(477,2,34,'33',34,0,'F','T','2007ict074','ex004-ICT2002'),
(478,2,34,'32',45,0,'F','T','2007ict074','ex004-ICT2003'),
(479,1,56,'-1',56,0,'F','T','2007ict074','ex004-ICT2004'),
(480,2,30,'30',100,80,'F','T','2007ict071','ex004-ICT2001'),
(481,2,-1,'34',56,0,'F','T','2007ict071','ex004-ICT2003'),
(482,2,56,'56',45,0,'F','T','2007ict072','ex004-ICT2001'),
(483,2,56,'34',56,0,'F','T','2007ict072','ex004-ICT2003'),
(484,3,0,'0',0,0,'T','F','2007ict071','Ex0011-ICT2001'),
(485,2,0,'0',0,0,'T','F','2007ict072','Ex0011-ICT2002'),
(486,2,0,'0',0,0,'T','F','2007ict074','Ex0011-ICT2004'),
(487,1,0,'0',79,0,'F','T','870851130','BLESEP2007-BLE101'),
(488,1,0,'0',50,0,'F','F','870851130','BLESEP2007-BLE102'),
(489,1,0,'0',0,0,'F','F','870851130','BLESEP2007-BLE103'),
(490,1,0,'0',45,0,'F','T','870851130','BLESEP2007-BLE104'),
(491,1,0,'0',78,0,'F','T','870851131','BLESEP2007-BLE101'),
(492,1,0,'0',56,0,'F','T','870851131','BLESEP2007-BLE102'),
(493,1,0,'0',45,0,'F','T','870851131','BLESEP2007-BLE103'),
(494,1,0,'0',56,0,'F','T','870851131','BLESEP2007-BLE104'),
(495,1,0,'0',67,0,'F','T','870851132','BLESEP2007-BLE101'),
(496,1,0,'0',45,0,'F','T','870851132','BLESEP2007-BLE102'),
(497,1,0,'0',43,0,'F','T','870851132','BLESEP2007-BLE103'),
(498,1,0,'0',54,0,'F','T','870851132','BLESEP2007-BLE104'),
(499,1,0,'0',76,0,'F','T','870851133','BLESEP2007-BLE101'),
(500,1,0,'0',34,0,'F','T','870851133','BLESEP2007-BLE102'),
(501,1,0,'0',100,45,'F','T','870851133','BLESEP2007-BLE103'),
(502,1,0,'0',45,0,'F','T','870851133','BLESEP2007-BLE104'),
(503,1,0,'0',45,0,'F','T','870851134','BLESEP2007-BLE101'),
(504,1,0,'0',56,0,'F','T','870851134','BLESEP2007-BLE102'),
(505,1,0,'0',56,0,'F','T','870851134','BLESEP2007-BLE103'),
(506,1,0,'0',43,0,'F','T','870851135','BLESEP2007-BLE101'),
(507,1,0,'0',34,0,'F','T','870851135','BLESEP2007-BLE102'),
(508,1,0,'0',45,0,'F','T','870851136','BLESEP2007-BLE101'),
(509,1,87,'78',89,0,'F','T','870851130','BLEJUN2007-BLE201'),
(510,1,87,'76',67,0,'F','T','870851130','BLEJUN2007-BLE202'),
(511,1,89,'76',87,0,'F','T','870851130','BLEJUN2007-BLE203'),
(512,1,78,'87',65,0,'F','T','870851130','BLEJUN2007-BLE204'),
(513,1,89,'78',78,0,'F','T','870851131','BLEJUN2007-BLE201'),
(514,1,67,'89',67,0,'F','T','870851131','BLEJUN2007-BLE202'),
(515,1,78,'67',89,0,'F','T','870851131','BLEJUN2007-BLE203'),
(516,1,87,'67',78,0,'F','T','870851132','BLEJUN2007-BLE201'),
(517,1,8,'56',89,0,'F','T','870851132','BLEJUN2007-BLE203'),
(518,1,78,'65',76,0,'F','T','870851133','BLEJUN2007-BLE201'),
(519,1,67,'87',78,0,'F','T','870851133','BLEJUN2007-BLE202'),
(520,1,76,'56',89,0,'F','T','870851133','BLEJUN2007-BLE203'),
(521,1,89,'87',67,0,'F','T','870851133','BLEJUN2007-BLE204'),
(522,1,78,'76',89,0,'F','T','870851134','BLEJUN2007-BLE201'),
(523,1,65,'89',78,0,'F','T','870851134','BLEJUN2007-BLE202'),
(524,1,78,'65',87,0,'F','T','870851134','BLEJUN2007-BLE203'),
(525,1,78,'78',67,0,'F','T','870851134','BLEJUN2007-BLE204'),
(526,1,78,'56',87,0,'F','T','870851135','BLEJUN2007-BLE201'),
(527,1,78,'87',98,0,'F','T','870851135','BLEJUN2007-BLE202'),
(528,1,76,'56',76,0,'F','T','870851135','BLEJUN2007-BLE203'),
(529,1,78,'78',67,0,'F','T','870851135','BLEJUN2007-BLE204'),
(530,1,78,'56',89,0,'F','T','870851136','BLEJUN2007-BLE201'),
(531,1,78,'89',76,0,'F','T','870851136','BLEJUN2007-BLE202'),
(532,1,67,'67',78,0,'F','T','870851136','BLEJUN2007-BLE203'),
(533,1,87,'78',65,0,'F','T','870851136','BLEJUN2007-BLE204'),
(534,1,89,'76',89,0,'F','T','870851137','BLEJUN2007-BLE201'),
(535,1,78,'89',78,0,'F','T','870851137','BLEJUN2007-BLE202'),
(536,1,67,'65',78,0,'F','T','870851137','BLEJUN2007-BLE203'),
(537,1,67,'78',78,0,'F','T','870851137','BLEJUN2007-BLE204');

/* Table structure for table `news` */
DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `Nid` int(10) NOT NULL auto_increment,
  `Date` varchar(50) default NULL,
  `item` varchar(1000) default NULL,
  PRIMARY KEY  (`Nid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/* dumping data for table `news` */
insert into `news` values
(1,'2009-02-15','Examination System works fine'),
(2,'2009-02-15','No news to day sorry');

/* Table structure for table `register` */
DROP TABLE IF EXISTS `register`;

CREATE TABLE `register` (
  `RegistrationId` varchar(10) NOT NULL default '',
  `IndexNo` varchar(20) NOT NULL,
  `Ac_id` varchar(10) default NULL,
  `RegistrationDate` varchar(10) default NULL,
  `RegistrationTime` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `register` */
insert into `register` values
('2007ict074','BLE001','2007ICT','2009-04-04','06:49:05'),
('2007ict071','BLE002','2007ICT','2009-04-04','19:57:58'),
('2007ict072','BLE003','2007ICT','2009-04-04','20:06:10'),
('2007ict074','BKE0007','WCD20094','2009-04-09','22:25:11'),
('870851130','LE1130','2008BLE','2009-05-18','21:00:05'),
('870851131','LE1131','2008BLE','2009-05-18','21:00:51'),
('870851132','LE1132','2008BLE','2009-05-18','21:01:20'),
('870851133','LE1133','2008BLE','2009-05-18','21:03:48'),
('870851134','LE1134','2008BLE','2009-05-18','21:14:45'),
('870851135','LE1135','2008BLE','2009-05-18','21:15:09'),
('870851136','LE1136','2008BLE','2009-05-18','21:15:33'),
('870851137','LE1137','2008BLE','2009-05-18','21:15:59');

/* Table structure for table `search` */
DROP TABLE IF EXISTS `search`;

CREATE TABLE `search` (
  `wordId` int(11) NOT NULL auto_increment,
  `keyword` varchar(50) default NULL,
  `question` varchar(200) default NULL,
  `url` varchar(100) default NULL,
  PRIMARY KEY  (`wordId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/* dumping data for table `search` */
insert into `search` values
(1,'login','How to login to the system','help_login.php'),
(2,'password','How change password','help_pass.php'),
(3,'news','How to add a news','help_news.php'),
(4,'user','How to add a user','help_user.php'),
(5,'report','How to create reports','help_report.php'),
(6,'exam','How to add a exam','help_exam.php'),
(7,'exam','How to update student information','help_stud.php'),
(8,'notification','How to put notification','help_noti.php'),
(9,'notice','How to put notification','help_noti.php'),
(10,'registration','How to register a student','help_reg.php'),
(11,'register','How to register a student','help_reg.php'),
(12,'register','How to register for course','help_course.php'),
(13,'course','How to register for course','help_course.php'),
(14,'report','Student course report','student_report.php'),
(15,'report','Active course report','active_course_report.php'),
(16,'report','Course report','course_report.php'),
(17,'register','How to register a student for exam','help_reg.php'),
(18,'student','How to register a student for exam','help_reg.php'),
(19,'register','How to register a student for course','help_reg_course.php'),
(20,'student','How to register a student for course','help_reg_course.php'),
(21,'register','How to register a student','help_reg_std.php'),
(22,'student','How to register a student','help_reg_std.php'),
(23,'active','How add a new active course','help_active.php'),
(24,'active','How close a active course','help_close.php');

/* Table structure for table `searchdouble` */
DROP TABLE IF EXISTS `searchdouble`;

CREATE TABLE `searchdouble` (
  `wordId` int(11) NOT NULL auto_increment,
  `keyword` varchar(50) default NULL,
  `question` varchar(200) default NULL,
  `url` varchar(100) default NULL,
  PRIMARY KEY  (`wordId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/* dumping data for table `searchdouble` */
insert into `searchdouble` values
(1,'addcourse','How add a new course','help_course.php'),
(2,'addcourse','How add a new active course','help_active.php'),
(3,'activecourse','How add a new active course','help_active.php'),
(4,'activecourse','How close a active course','help_close.php'),
(5,'addactive','How add a new active course','help_active.php'),
(6,'closecourse','How close a active course','help_close.php'),
(7,'closeactive','How close a active course','help_close.php'),
(8,'closeexam','How close exam','help_close_exam.php'),
(9,'addexam','How to add a new exam','help_exam.php'),
(10,'addmarks','How to add marks','help_marks.php'),
(11,'updatemarks','How to update marks','help_update.php'),
(12,'examinationreport','Examination officer reports','exam_offi_reports.php'),
(13,'officerreport','Examination officer reports','exam_offi_reports.php'),
(14,'adminreport','Administrator reports','admin_reports.php'),
(15,'administratorreport','Administrator reports','admin_reports.php'),
(16,'studentreport','Student course report','student_report.php'),
(17,'coursereport','Student course report','student_report.php'),
(18,'activereport','Active course report','active_course_report.php'),
(19,'coursereport','Active course report','active_course_report.php'),
(20,'coursereport','Course report','course_report.php'),
(21,'registerstudent','How to register a student for exam','help_reg.php'),
(22,'registerexam','How to register a student for exam','help_reg.php'),
(23,'registerstudent','How to register a student for course','help_reg_course.php'),
(24,'registercourse','How to register a student for course','help_reg_course.php'),
(25,'registerstudent','How to register a student','help_reg_std.php');

/* Table structure for table `searchtriple` */
DROP TABLE IF EXISTS `searchtriple`;

CREATE TABLE `searchtriple` (
  `wordId` int(11) NOT NULL auto_increment,
  `keyword` varchar(50) default NULL,
  `question` varchar(200) default NULL,
  `url` varchar(100) default NULL,
  PRIMARY KEY  (`wordId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/* dumping data for table `searchtriple` */
insert into `searchtriple` values
(1,'addactivecourse','How add a new active course','help_active.php'),
(2,'closeactivecourse','How close a active course','help_close.php'),
(3,'examinationofficerreport','Examination officer reports','exam_offi_reports.php'),
(4,'studentcoursereport','Student course report','student_report.php'),
(5,'activecoursereport','Active course report','active_course_report.php'),
(6,'registerstudentexam','How to register a student for exam','help_reg.php'),
(7,'registerstudentcourse','How to register a student for course','help_reg_course.php');

/* Table structure for table `student` */
DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `RegistrationId` varchar(10) NOT NULL,
  `StudentName` varchar(100) default NULL,
  `NationalId` char(10) default NULL,
  `Address1` varchar(100) default NULL,
  `Address2` varchar(100) default NULL,
  `Telephone` char(10) default NULL,
  `Mobile` char(10) default NULL,
  `Nationality` varchar(10) default NULL,
  `School` varchar(50) default NULL,
  `University` varchar(50) default NULL,
  `Job` varchar(30) default NULL,
  `Photo` varchar(40) default NULL,
  `yearOfAttendance` varchar(10) default NULL,
  PRIMARY KEY  (`RegistrationId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `student` */
insert into `student` values
('2007ict074','Saman Kumara','87085138V','kandy','same','0112560175','0716436811','sinhala','royal college','uscsc','none','/images/student/IHRA.jpg','2009'),
('2007ict071','kanishka gayan weerasekara','870851137V','13/3E, Nugegoda','this','0112560175','0716436811','sinhala','royal college','ucsc','none','/images/student/IHRA.jpg','2009'),
('2007ict072','kanishka weerasekara','870851136V','9','thi','0112560175','0716436811','sinhala','royal college','ucsc','none','/images/student/IHRA.jpg','2009'),
('2007ict076','kanishka Weerasekara','870851138V','908/56,kaduwal','ws','09892','0988','sinhala','royal college','ucsc','none','images/student/IHRA.jpg','2009'),
('7020742','Sunil Perera','870851138V','Japan','same','99999999','071784848','sinhala','royal college','ucssc','none','images/student/870851138V.jpg','2009'),
('7020741','kanishak gayan','87078488V','89/malabe','none','0909000','071239929','sinhala','royal college','ucsc','none','images/student/87078488V.jpg','2009'),
('7020325','Nipun Kularathna','862490100','kaluthra','none','099303003','0719900303','sinhala','kaluthara vidyalaya','ucsc','none','images/student/862490100.jpg','2009'),
('07020743','kanishka weerasekara','870865767V','99003/malabe','same','09300','089393','sinhala','royal co0lleeq','uccs','none','images/student/870865767V.jpg','2009'),
('7020500','Thadiya','87085139v','colombo','same','lelel','0890030','slel','lslw','lwlw','ee','images/student/IHRA.jpg','2009'),
('870851130','Abeykoon S S W B','8594','koswatte','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851131','Abeysinghe R G U P','2662','mathara','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851132','Almeida TUS','908','Colombo','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851133','Alwis RDCP','56','Mathara','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851134','Amarasinghe DS','73478','Colombo','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851135','Ananda PG','455','Mathara','same','0112560175','0716436811','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009'),
('870851136','Ansar W','78','Panadura','','','','','','','','images/student/IHRA.jpg','2009'),
('870851137','Ariyarathna DASK','9777','Colombo','same','0112560175','0890030','sinhala','unknown','UOC','none','images/student/IHRA.jpg','2009');

/* Table structure for table `subject` */
DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `Sub_id` varchar(10) NOT NULL,
  `SubjectName` varchar(80) default NULL,
  `minimumAttendance` int(6) default NULL,
  `year` int(6) default NULL,
  `semester` int(6) default NULL,
  `C_id` varchar(10) default NULL,
  PRIMARY KEY  (`Sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `subject` */
insert into `subject` values
('ICT101','Introsodev',12,1,1,'ICT'),
('ICT102','SAD',34,1,1,'ICT'),
('ICT103','Socilogy',34,1,1,'ICT'),
('ICT104','Mangement',23,1,1,'ICT'),
('ICT105','Economics',34,1,2,'ICT'),
('ICT106','BisnessSt',45,1,2,'ICT'),
('ICT107','Maths',34,1,2,'ICT'),
('ICT201','DBMS',34,2,1,'ICT'),
('ICT202','PCALab',34,2,1,'ICT'),
('ICT203','Comtech',34,2,1,'ICT'),
('ICT204','CStudies',34,2,2,'ICT'),
('ICT205','Accounts',45,2,2,'ICT'),
('ICT206','Phycology',67,2,2,'ICT'),
('ICT301','ERP',34,3,1,'ICT'),
('ICT302','HCInteraction',34,3,1,'ICT'),
('ICT303','DFineArts',34,3,1,'ICT'),
('ICT304','ProjectMangeme',23,3,2,'ICT'),
('ICT305','Ebusiness',34,3,2,'ICT'),
('BLE101','Microeconomics',12,1,1,'BLE'),
('BLE102','Statistics',12,1,1,'BLE'),
('BLE103','Writership and Communication',12,1,1,'BLE'),
('BLE104','Fundamentals of  Mangement',12,1,1,'BLE'),
('BLE105','LegalEnvironment',12,1,2,'BLE'),
('BLE106','Political Process and Labour Organization',12,1,2,'BLE'),
('BLE107','Fundamentals of Accounting',12,1,2,'BLE'),
('BLE108','Information Communication Technology I',12,1,2,'BLE'),
('BLE109','English',12,1,2,'BLE'),
('BLE201','Macroeconomics',12,2,1,'BLE'),
('BLE202','Information Communication Technology',12,2,1,'BLE'),
('BLE203','Methods of Social Investigation ',12,2,1,'BLE'),
('BLE204','Industrial Relations',12,2,1,'BLE'),
('BLE205','Labour Law',12,2,2,'BLE'),
('BLE206','Historical Dimensions of Labour Utilization in SL',12,2,2,'BLE'),
('BLE207','Commercial Law',12,2,2,'BLE'),
('BLE208','Costing and Auditing',12,2,2,'BLE'),
('BLE209','Financial Management',12,2,2,'BLE'),
('BLE2010','English',12,2,2,'BLE'),
('BLE301','Human Resource Management',12,3,1,'BLE'),
('BLE302','Population Studies and Man Power Planning',12,3,1,'BLE'),
('BLE303','Labour Economics',12,3,1,'BLE'),
('BLE304','Trade Unionism and Trade Union movement in SL',12,3,1,'BLE'),
('BLE305','English Language',12,3,1,'BLE'),
('BLE306','Project Report',12,3,2,'BLE'),
('BLE307','Marketing Management',12,3,2,'BLE'),
('BLE308','Contemporary Labour Issues',12,3,2,'BLE'),
('BLE309','Econoic Policies and Development in SL',12,3,2,'BLE');

/* Table structure for table `ucsc2` */
DROP TABLE IF EXISTS `ucsc2`;

CREATE TABLE `ucsc2` (
  `RegistrationId` varchar(10) NOT NULL default '',
  `IndexNo` varchar(20) NOT NULL,
  `Ac_id` varchar(10) default NULL,
  `RegistrationDate` varchar(10) default NULL,
  `RegistrationTime` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `ucsc2` */
insert into `ucsc2` values
('2007ict074','BLE001','2007ICT','2009-04-04','06:49:05'),
('2007ict071','BLE002','2007ICT','2009-04-04','19:57:58'),
('2007ict072','BLE003','2007ICT','2009-04-04','20:06:10');

/* Table structure for table `user` */
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) default NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Tpno` int(10) NOT NULL,
  `Nic` int(10) NOT NULL,
  `AccessLevel` varchar(30) default NULL,
  PRIMARY KEY  (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/* dumping data for table `user` */
insert into `user` values
('A','123','','',0,0,'Administrator'),
('E','abc','','',0,0,'ExaminationOfficer'),
('E1','123','','',0,0,'ExaminationOfficer'),
('O','abc','','',0,0,'Officer'),
('R','abc','sama','malabe',930,870851138,'RegistrationOfficer'),
('R2','123','Siripala','kaduwela',112560175,870851138,'RegistrationOfficer');



