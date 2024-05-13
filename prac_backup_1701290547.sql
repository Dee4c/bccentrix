

CREATE TABLE `academic_awardees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `minitial` varchar(255) NOT NULL,
  `department` varchar(250) NOT NULL,
  `year` text NOT NULL,
  `lg` text NOT NULL,
  `gwa` text NOT NULL,
  `award` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

INSERT INTO academic_awardees VALUES("42","Chemros","Terania","S","BSIS","3rd","89","95","With High");
INSERT INTO academic_awardees VALUES("43","KIMKIM","Terania","S","BSIS","3rd","89","95","With High");
INSERT INTO academic_awardees VALUES("44","KIMKIM","Terania","S","BSIS","3rd","89","95","With High");



CREATE TABLE `bsa_comment` (
  `bsa_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`bsa_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO bsa_comment VALUES("1","96","35","dsdsds","2023-10-17 18:44:23");
INSERT INTO bsa_comment VALUES("3","4","1","sdds","2023-10-18 22:20:28");



CREATE TABLE `bsa_post` (
  `bsa_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bsa_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO bsa_post VALUES("1","27","HELLO IM ARTS","2023-10-11 19:36:28","");
INSERT INTO bsa_post VALUES("2","27","bhbh","2023-10-11 19:42:59","uploads/icon-3.png");
INSERT INTO bsa_post VALUES("3","35","bgnb","2023-10-17 12:31:24","");
INSERT INTO bsa_post VALUES("4","1","heloo","2023-10-18 22:07:59","");



CREATE TABLE `bsa_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsa_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO bsa_reaction_logs VALUES("1","2","27","heart","2023-10-11 19:53:58");



CREATE TABLE `bscrim_comment` (
  `bscrim_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bscrim_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`bscrim_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO bscrim_comment VALUES("3","6","33","sasasa","2023-10-19 00:48:30");



CREATE TABLE `bscrim_post` (
  `bscrim_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bscrim_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO bscrim_post VALUES("2","33","IM CRIMINOLOGY ","2023-10-11 18:09:24","uploads/icon-4.png");
INSERT INTO bscrim_post VALUES("4","1","sdsd","2023-10-18 21:46:49","");
INSERT INTO bscrim_post VALUES("5","1","dsds","2023-10-18 21:46:54","");
INSERT INTO bscrim_post VALUES("6","33","bnbbnb","2023-10-19 00:48:17","");
INSERT INTO bscrim_post VALUES("7","41","ssdsds
","2023-10-28 18:21:36","");
INSERT INTO bscrim_post VALUES("8","43","mbmn","2023-10-28 19:46:20","uploads/WHAT THE DOG DOIN.jpg");



CREATE TABLE `bscrim_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `bscrim_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO bscrim_reaction_logs VALUES("3","6","43","heart","2023-10-28 18:12:07");



CREATE TABLE `bseduc_comment` (
  `bseduc_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bseduc_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`bseduc_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO bseduc_comment VALUES("6","39","1","xzz","2023-10-19 00:31:18");
INSERT INTO bseduc_comment VALUES("7","39","33","","2023-10-19 00:34:17");
INSERT INTO bseduc_comment VALUES("8","38","33","nmmnmnm","2023-10-19 00:43:15");



CREATE TABLE `bseduc_post` (
  `bseduc_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bseduc_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO bseduc_post VALUES("32","27","hello","2023-10-11 21:32:59","");
INSERT INTO bseduc_post VALUES("33","25","dfdf","2023-10-11 21:38:50","");
INSERT INTO bseduc_post VALUES("34","35","jhj","2023-10-17 12:27:47","");
INSERT INTO bseduc_post VALUES("36","1","vbvb","2023-10-18 21:33:12","");
INSERT INTO bseduc_post VALUES("37","1","dsdsds","2023-10-18 21:39:58","");
INSERT INTO bseduc_post VALUES("38","33","dsds","2023-10-19 00:29:22","");



CREATE TABLE `bseduc_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `bseduc_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO bseduc_reaction_logs VALUES("1","33","25","heart","2023-10-11 21:40:24");
INSERT INTO bseduc_reaction_logs VALUES("2","32","25","heart","2023-10-11 21:40:42");
INSERT INTO bseduc_reaction_logs VALUES("3","33","27","heart","2023-10-11 21:40:52");
INSERT INTO bseduc_reaction_logs VALUES("4","32","27","heart","2023-10-11 21:40:57");
INSERT INTO bseduc_reaction_logs VALUES("6","4","1","heart","2023-10-18 23:11:48");
INSERT INTO bseduc_reaction_logs VALUES("7","4","1","heart","2023-10-18 23:11:50");
INSERT INTO bseduc_reaction_logs VALUES("8","4","1","heart","2023-10-18 23:13:22");
INSERT INTO bseduc_reaction_logs VALUES("9","4","1","heart","2023-10-18 23:18:24");
INSERT INTO bseduc_reaction_logs VALUES("10","5","1","heart","2023-10-18 23:18:41");
INSERT INTO bseduc_reaction_logs VALUES("11","5","1","heart","2023-10-18 23:18:45");
INSERT INTO bseduc_reaction_logs VALUES("12","5","1","heart","2023-10-18 23:18:47");
INSERT INTO bseduc_reaction_logs VALUES("13","5","1","heart","2023-10-18 23:18:48");
INSERT INTO bseduc_reaction_logs VALUES("14","5","1","heart","2023-10-18 23:18:48");
INSERT INTO bseduc_reaction_logs VALUES("15","5","1","heart","2023-10-18 23:18:49");
INSERT INTO bseduc_reaction_logs VALUES("16","5","1","heart","2023-10-18 23:18:50");
INSERT INTO bseduc_reaction_logs VALUES("17","5","1","heart","2023-10-18 23:18:51");
INSERT INTO bseduc_reaction_logs VALUES("18","5","1","heart","2023-10-18 23:18:51");
INSERT INTO bseduc_reaction_logs VALUES("19","5","1","heart","2023-10-18 23:18:51");
INSERT INTO bseduc_reaction_logs VALUES("20","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("21","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("22","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("23","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("24","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("25","5","1","heart","2023-10-18 23:18:52");
INSERT INTO bseduc_reaction_logs VALUES("26","5","1","heart","2023-10-18 23:18:53");
INSERT INTO bseduc_reaction_logs VALUES("27","5","1","heart","2023-10-18 23:18:53");
INSERT INTO bseduc_reaction_logs VALUES("28","5","1","heart","2023-10-18 23:18:57");
INSERT INTO bseduc_reaction_logs VALUES("29","4","1","heart","2023-10-18 23:18:59");
INSERT INTO bseduc_reaction_logs VALUES("30","4","1","heart","2023-10-18 23:19:00");
INSERT INTO bseduc_reaction_logs VALUES("31","4","1","heart","2023-10-18 23:19:01");
INSERT INTO bseduc_reaction_logs VALUES("32","4","1","heart","2023-10-18 23:19:02");
INSERT INTO bseduc_reaction_logs VALUES("33","4","1","heart","2023-10-18 23:19:03");
INSERT INTO bseduc_reaction_logs VALUES("34","39","33","heart","2023-10-19 00:29:48");
INSERT INTO bseduc_reaction_logs VALUES("35","38","61","heart","2023-11-13 09:54:24");
INSERT INTO bseduc_reaction_logs VALUES("36","38","1","heart","2023-11-13 09:55:17");



CREATE TABLE `bsis_comment` (
  `bsis_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsis_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`bsis_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO bsis_comment VALUES("2","2","27","hhh","2023-10-11 16:10:47");
INSERT INTO bsis_comment VALUES("3","2","27","llolk","2023-10-11 16:12:59");
INSERT INTO bsis_comment VALUES("4","3","35","cxc","2023-10-17 12:39:32");
INSERT INTO bsis_comment VALUES("5","3","35","wasa","2023-10-17 12:48:13");
INSERT INTO bsis_comment VALUES("6","4","35","sasds","2023-10-17 12:48:33");
INSERT INTO bsis_comment VALUES("7","3","35","sdsdsd","2023-10-17 12:48:41");
INSERT INTO bsis_comment VALUES("8","3","35","cxcx","2023-10-17 12:49:06");
INSERT INTO bsis_comment VALUES("9","4","33","bcvv","2023-10-18 18:46:26");
INSERT INTO bsis_comment VALUES("11","5","1","k
","2023-10-18 20:29:59");
INSERT INTO bsis_comment VALUES("12","6","1","xzz","2023-10-18 20:34:48");
INSERT INTO bsis_comment VALUES("13","9","1","SDSDS","2023-10-18 21:01:28");
INSERT INTO bsis_comment VALUES("14","13","1","sas","2023-10-18 21:13:52");
INSERT INTO bsis_comment VALUES("16","14","33","asa","2023-10-19 00:30:39");
INSERT INTO bsis_comment VALUES("18","19","1","","2023-11-26 14:17:12");



CREATE TABLE `bsis_post` (
  `bsis_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bsis_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO bsis_post VALUES("6","1","sdbsd","2023-10-18 20:32:14","");
INSERT INTO bsis_post VALUES("7","33","nbnh","2023-10-18 20:34:20","");
INSERT INTO bsis_post VALUES("8","1","hello","2023-10-18 20:52:15","");
INSERT INTO bsis_post VALUES("9","1","hello","2023-10-18 20:52:16","");
INSERT INTO bsis_post VALUES("10","1","XZXZ","2023-10-18 21:03:31","");
INSERT INTO bsis_post VALUES("11","1","ZZXZ","2023-10-18 21:03:38","");
INSERT INTO bsis_post VALUES("12","1","SASASAS","2023-10-18 21:03:59","");
INSERT INTO bsis_post VALUES("13","1","FEWFEWWEFW","2023-10-18 21:04:08","");
INSERT INTO bsis_post VALUES("14","1","dssd","2023-10-18 21:06:39","");
INSERT INTO bsis_post VALUES("19","64","svs

","2023-11-13 15:24:14","");



CREATE TABLE `bsis_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsis_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`),
  KEY `fk_reaction_logs_bsis_post` (`bsis_post_id`),
  CONSTRAINT `fk_reaction_logs_bsis_post` FOREIGN KEY (`bsis_post_id`) REFERENCES `bsis_post` (`bsis_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO bsis_reaction_logs VALUES("5","6","1","heart","2023-10-18 20:41:45");
INSERT INTO bsis_reaction_logs VALUES("7","7","1","heart","2023-10-18 20:43:28");
INSERT INTO bsis_reaction_logs VALUES("8","14","1","heart","2023-10-18 23:22:09");
INSERT INTO bsis_reaction_logs VALUES("10","12","1","heart","2023-11-13 09:55:31");



CREATE TABLE `bsoa_comment` (
  `bsoa_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsoa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`bsoa_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO bsoa_comment VALUES("4","8","75","Hello","2023-11-30 01:59:03");



CREATE TABLE `bsoa_post` (
  `bsoa_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bsoa_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO bsoa_post VALUES("2","27","IM OK","2023-10-11 19:02:30","");
INSERT INTO bsoa_post VALUES("3","27","cxcx","2023-10-11 19:34:26","");
INSERT INTO bsoa_post VALUES("6","33"," bbvbn","2023-10-19 01:00:40","");
INSERT INTO bsoa_post VALUES("7","53","ds","2023-11-08 07:46:13","");
INSERT INTO bsoa_post VALUES("8","75","Hi2x","2023-11-30 01:58:41","uploads/Screenshot_20231129_230348.jpg");



CREATE TABLE `bsoa_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `bsoa_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO bsoa_reaction_logs VALUES("1","1","27","heart","2023-10-11 19:01:19");
INSERT INTO bsoa_reaction_logs VALUES("2","3","27","heart","2023-10-11 19:45:31");
INSERT INTO bsoa_reaction_logs VALUES("4","3","33","heart","2023-10-19 01:00:25");
INSERT INTO bsoa_reaction_logs VALUES("5","8","75","heart","2023-11-30 01:59:27");



CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

INSERT INTO comment VALUES("101","96","25","xz","2023-10-17 17:47:58");
INSERT INTO comment VALUES("102","96","25","dfdf","2023-10-17 17:50:13");
INSERT INTO comment VALUES("104","96","25","dsds","2023-10-17 18:09:37");
INSERT INTO comment VALUES("105","96","35","cxc","2023-10-17 18:10:07");
INSERT INTO comment VALUES("106","97","35","xzxzx","2023-10-17 18:45:17");
INSERT INTO comment VALUES("107","96","35","cxcx","2023-10-17 18:45:27");
INSERT INTO comment VALUES("108","98","35","hi","2023-10-17 18:47:31");
INSERT INTO comment VALUES("109","98","35","","2023-10-17 18:47:46");
INSERT INTO comment VALUES("110","98","25","v","2023-10-17 23:26:29");
INSERT INTO comment VALUES("111","99","35","","2023-10-18 11:06:43");
INSERT INTO comment VALUES("112","99","35","ddf","2023-10-18 11:09:38");
INSERT INTO comment VALUES("116","101","25","dc","2023-10-18 12:17:32");
INSERT INTO comment VALUES("117","99","35","cxc","2023-10-18 12:18:45");
INSERT INTO comment VALUES("118","102","33","xzxz","2023-10-18 12:27:21");
INSERT INTO comment VALUES("119","102","35","cjhhs","2023-10-18 12:28:29");
INSERT INTO comment VALUES("120","121","33","hi","2023-10-18 18:04:14");
INSERT INTO comment VALUES("124","124","1","sdsd","2023-10-18 22:23:10");
INSERT INTO comment VALUES("125","138","49","hi po","2023-11-01 19:03:11");
INSERT INTO comment VALUES("126","139","50","xzz
","2023-11-02 12:35:58");
INSERT INTO comment VALUES("127","149","50","nice","2023-11-03 10:03:47");
INSERT INTO comment VALUES("128","151","50","dscx","2023-11-03 11:20:01");
INSERT INTO comment VALUES("131","151","53","j","2023-11-05 17:04:56");
INSERT INTO comment VALUES("132","151","52","hi","2023-11-05 17:05:09");
INSERT INTO comment VALUES("133","151","52","lol","2023-11-05 17:05:40");
INSERT INTO comment VALUES("135","149","53","","2023-11-05 20:13:07");
INSERT INTO comment VALUES("136","152","53","hi","2023-11-06 01:34:49");
INSERT INTO comment VALUES("137","152","53","lo","2023-11-06 01:56:33");
INSERT INTO comment VALUES("138","152","53","hello
hello","2023-11-06 01:57:52");
INSERT INTO comment VALUES("139","149","53","s","2023-11-06 08:22:42");
INSERT INTO comment VALUES("140","149","53","hello
","2023-11-06 08:50:42");
INSERT INTO comment VALUES("141","152","53","rro
ruu
ruu","2023-11-06 08:59:01");
INSERT INTO comment VALUES("143","155","52","dsds","2023-11-08 09:05:10");
INSERT INTO comment VALUES("144","159","52","hello po
","2023-11-09 20:26:59");
INSERT INTO comment VALUES("145","153","52","cxcx","2023-11-10 11:46:42");
INSERT INTO comment VALUES("146","161","53","","2023-11-10 20:12:51");
INSERT INTO comment VALUES("147","150","49","s","2023-11-11 10:36:04");
INSERT INTO comment VALUES("148","162","49","","2023-11-11 10:36:31");
INSERT INTO comment VALUES("149","161","49","xcvxcx","2023-11-11 10:51:13");
INSERT INTO comment VALUES("150","165","52","fffdd","2023-11-12 20:01:49");
INSERT INTO comment VALUES("151","166","53","s","2023-11-12 20:13:15");
INSERT INTO comment VALUES("152","166","1","xvzxb","2023-11-13 15:31:20");
INSERT INTO comment VALUES("153","155","64","s","2023-11-22 12:26:49");
INSERT INTO comment VALUES("154","166","64","x","2023-11-22 12:27:32");
INSERT INTO comment VALUES("155","175","53","Hi","2023-11-26 11:46:56");
INSERT INTO comment VALUES("156","175","53","","2023-11-26 15:26:48");
INSERT INTO comment VALUES("157","175","64","Hello","2023-11-26 16:01:19");
INSERT INTO comment VALUES("158","170","53","Hi","2023-11-26 17:06:41");
INSERT INTO comment VALUES("159","176","64","Hi","2023-11-27 12:38:34");
INSERT INTO comment VALUES("160","175","64","Hello","2023-11-27 12:52:20");
INSERT INTO comment VALUES("161","150","75","Helloo very mush thank you","2023-11-29 17:26:28");
INSERT INTO comment VALUES("162","150","75","I love you till the endjalabdidmaobsosusnsidmdvdndjd","2023-11-29 17:26:59");
INSERT INTO comment VALUES("164","187","75","","2023-11-30 00:37:43");



CREATE TABLE `drygoods_comment` (
  `drygoods_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `drygoods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`drygoods_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO drygoods_comment VALUES("1","2","1","xs","2023-10-18 23:43:43");



CREATE TABLE `drygoods_post` (
  `drygoods_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`drygoods_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO drygoods_post VALUES("4","53","hi","2023-11-08 07:41:58","");
INSERT INTO drygoods_post VALUES("5","52","hi","2023-11-08 07:42:42","");



CREATE TABLE `drygoods_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `drygoods_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO drygoods_reaction_logs VALUES("1","1","25","heart","2023-10-11 21:38:29");
INSERT INTO drygoods_reaction_logs VALUES("2","2","1","heart","2023-10-18 23:43:46");



CREATE TABLE `foods_comment` (
  `foods_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `foods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`foods_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO foods_comment VALUES("1","3","1","cxx","2023-10-18 23:51:02");



CREATE TABLE `foods_post` (
  `foods_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`foods_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO foods_post VALUES("3","1","sa","2023-10-18 23:50:52","");



CREATE TABLE `foods_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `foods_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO foods_reaction_logs VALUES("0","3","1","heart","2023-10-18 23:51:20");



CREATE TABLE `founder_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `found_date` date NOT NULL,
  `found_item` varchar(255) NOT NULL,
  `approval_status` enum('Accepted','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO founder_information VALUES("10","2147483647","ana mage","ARTS","3rd A","09090909090","2023-10-28","pen","Accepted","2023-10-28 13:31:32","2023-10-28 13:32:34");



CREATE TABLE `founder_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `submission_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO founder_submissions VALUES("1","22","2023-10-20","1");
INSERT INTO founder_submissions VALUES("2","22","2023-10-23","1");
INSERT INTO founder_submissions VALUES("3","22","2023-10-25","1");
INSERT INTO founder_submissions VALUES("4","24","2023-10-25","1");
INSERT INTO founder_submissions VALUES("5","42","2023-10-28","1");



CREATE TABLE `gen_comment` (
  `gen_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`gen_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO gen_comment VALUES("1","4","33","sdsd","2023-10-18 22:22:23");
INSERT INTO gen_comment VALUES("2","2","1","xzxzxc","2023-10-18 22:22:44");
INSERT INTO gen_comment VALUES("3","5","1","ssasa","2023-10-18 22:22:58");
INSERT INTO gen_comment VALUES("4","8","75","Fftf","2023-11-30 01:33:52");



CREATE TABLE `gen_post` (
  `gen_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gen_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO gen_post VALUES("5","1","dsds","2023-10-18 22:22:53","");
INSERT INTO gen_post VALUES("6","50","l","2023-11-02 21:58:03","");
INSERT INTO gen_post VALUES("7","53","bhnb","2023-11-08 07:38:51","");
INSERT INTO gen_post VALUES("8","75","Fth","2023-11-30 01:33:28","uploads/Screenshot_20231016_142338.jpg");
INSERT INTO gen_post VALUES("9","75","Hh","2023-11-30 02:17:28","uploads/Screenshot_20230512_183303_22e4250240c136c826b8a3b1264b092d.jpg");



CREATE TABLE `gen_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO gen_reaction_logs VALUES("7","5","33","heart","2023-10-19 01:08:04");
INSERT INTO gen_reaction_logs VALUES("8","7","61","heart","2023-11-13 09:54:12");



CREATE TABLE `group_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;

INSERT INTO group_chat_messages VALUES("68","17","53","HI PO, GOOD MORNING NOB","2023-11-15 14:01:35","Ana Dodge");
INSERT INTO group_chat_messages VALUES("69","17","64","HELLO, ANA GOOD MORNING TOO","2023-11-15 14:03:25","nob kate");
INSERT INTO group_chat_messages VALUES("70","17","53","how are you?","2023-11-15 14:25:12","Ana Dodge");
INSERT INTO group_chat_messages VALUES("71","20","64","Z","2023-11-22 09:38:58","nob kate");
INSERT INTO group_chat_messages VALUES("72","20","64","X","2023-11-22 09:39:09","nob kate");
INSERT INTO group_chat_messages VALUES("73","20","64","A","2023-11-22 09:39:20","nob kate");
INSERT INTO group_chat_messages VALUES("74","17","64","X","2023-11-22 09:41:35","nob kate");
INSERT INTO group_chat_messages VALUES("75","17","64","A","2023-11-22 09:44:34","nob kate");
INSERT INTO group_chat_messages VALUES("76","17","64","D","2023-11-22 09:53:31","nob kate");
INSERT INTO group_chat_messages VALUES("77","17","64","f","2023-11-22 12:13:14","nob kate");
INSERT INTO group_chat_messages VALUES("78","17","64","sasas","2023-11-22 12:13:25","nob kate");
INSERT INTO group_chat_messages VALUES("79","17","64","ss","2023-11-22 12:19:29","nob kate");
INSERT INTO group_chat_messages VALUES("80","17","64","ss","2023-11-22 12:19:33","nob kate");
INSERT INTO group_chat_messages VALUES("81","17","64","s","2023-11-22 12:24:28","nob kate");
INSERT INTO group_chat_messages VALUES("82","17","53","aq","2023-11-22 12:47:44","Ana Dodge");
INSERT INTO group_chat_messages VALUES("83","17","53","e","2023-11-22 12:48:13","Ana Dodge");
INSERT INTO group_chat_messages VALUES("84","17","53","hello","2023-11-22 12:52:51","Ana Dodge");
INSERT INTO group_chat_messages VALUES("85","17","53","s","2023-11-22 12:58:11","Ana Dodge");
INSERT INTO group_chat_messages VALUES("86","17","64","a","2023-11-22 13:01:21","nob kate");
INSERT INTO group_chat_messages VALUES("87","20","64","v","2023-11-22 13:38:16","");
INSERT INTO group_chat_messages VALUES("88","3","34","S","2023-11-22 14:01:48","Mike Lopez");
INSERT INTO group_chat_messages VALUES("89","18","34","A","2023-11-22 14:02:24","Mike Lopez");
INSERT INTO group_chat_messages VALUES("90","18","34","S","2023-11-22 14:02:29","Mike Lopez");
INSERT INTO group_chat_messages VALUES("91","18","34","S","2023-11-22 14:06:02","Mike Lopez");
INSERT INTO group_chat_messages VALUES("92","18","34","S","2023-11-22 14:06:39","Mike Lopez");
INSERT INTO group_chat_messages VALUES("93","18","34","S","2023-11-22 14:10:58","Mike Lopez");



CREATE TABLE `group_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `join_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

INSERT INTO group_members VALUES("57","17","Ana Dodge","2023-11-15 21:01:11");
INSERT INTO group_members VALUES("58","17","nob kate","2023-11-15 21:02:51");
INSERT INTO group_members VALUES("59","20","","2023-11-22 20:38:09");
INSERT INTO group_members VALUES("60","22","sample1 sample1","2023-11-29 11:41:30");



CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_code` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(200) NOT NULL,
  `year_section` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO groups VALUES("16","BSIS","1T5PJM","2121212121","Ana Dodge","BSOA","","2nd A","53");
INSERT INTO groups VALUES("17","ARTS","KM7Q5V","2147483647","nob kate","BSIS","","2nd A","64");
INSERT INTO groups VALUES("19","NEW","L3YGGL","2121212121","Ana Dodge","BSOA","","2nd A","53");
INSERT INTO groups VALUES("20","IS","ZAD564","2147483647","nob kate","BSIS","","2nd A","64");
INSERT INTO groups VALUES("21","hello","AAHJH9","2147483647","sample1 sample1","BSIS","","O","74");
INSERT INTO groups VALUES("22","hi","Y2QYMZ","2147483647","sample1 sample1","BSIS","","O","74");
INSERT INTO groups VALUES("23","jo","2NXI7C","2147483647","sample1 sample1","BSIS","2nd","O","74");



CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO images VALUES("22","Catdolf Kitler.jpg","");
INSERT INTO images VALUES("23","dantepizza.jpg","");



CREATE TABLE `laf_comment` (
  `laf_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `laf_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL,
  PRIMARY KEY (`laf_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO laf_comment VALUES("5","5","53","hh","2023-11-08 07:30:05");
INSERT INTO laf_comment VALUES("6","9","52","xzcxc","2023-11-08 09:05:52");



CREATE TABLE `laf_post` (
  `laf_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`laf_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO laf_post VALUES("4","1","hhi","2023-10-18 23:11:42","");
INSERT INTO laf_post VALUES("5","1","sdsdsd","2023-10-18 23:18:37","");
INSERT INTO laf_post VALUES("7","53","hh","2023-11-08 07:36:29","");
INSERT INTO laf_post VALUES("8","53","nbnb","2023-11-08 07:37:02","uploads/icons8-birthday-100.png");
INSERT INTO laf_post VALUES("9","52","cxcx","2023-11-08 09:05:46","");



CREATE TABLE `laf_reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `laf_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO laf_reaction_logs VALUES("2","4","33","heart","2023-10-18 23:13:04");
INSERT INTO laf_reaction_logs VALUES("3","5","1","heart","2023-10-18 23:21:26");
INSERT INTO laf_reaction_logs VALUES("4","4","1","heart","2023-10-18 23:21:32");
INSERT INTO laf_reaction_logs VALUES("5","9","1","heart","2023-11-23 21:22:14");



CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

INSERT INTO messages VALUES("1","0","1","64","s");
INSERT INTO messages VALUES("2","0","1","64","hello");
INSERT INTO messages VALUES("3","0","53","64","hello");
INSERT INTO messages VALUES("4","0","49","53","a");
INSERT INTO messages VALUES("5","0","49","53","hello");
INSERT INTO messages VALUES("6","0","64","53","hi po");
INSERT INTO messages VALUES("7","0","53","64","hi");
INSERT INTO messages VALUES("8","0","64","53","hi po");
INSERT INTO messages VALUES("10","0","64","53","morning");
INSERT INTO messages VALUES("11","0","50","64","z");
INSERT INTO messages VALUES("12","0","50","64","hello");
INSERT INTO messages VALUES("13","0","64","53","hello");
INSERT INTO messages VALUES("14","0","63","53","hi");
INSERT INTO messages VALUES("15","0","65","53","hi");
INSERT INTO messages VALUES("16","0","65","53","?s");
INSERT INTO messages VALUES("17","0","65","53","?");
INSERT INTO messages VALUES("18","0","65","53","hi");
INSERT INTO messages VALUES("19","0","65","53","?");
INSERT INTO messages VALUES("20","0","65","53","g");
INSERT INTO messages VALUES("21","0","65","53","???");
INSERT INTO messages VALUES("22","0","62","64","hello");
INSERT INTO messages VALUES("23","0","62","53","hiii");
INSERT INTO messages VALUES("24","0","53","62","hi");
INSERT INTO messages VALUES("25","0","64","53","???");
INSERT INTO messages VALUES("26","0","53","62","d");
INSERT INTO messages VALUES("27","0","67","64","a");
INSERT INTO messages VALUES("28","0","53","62","s");
INSERT INTO messages VALUES("29","0","53","62","s");
INSERT INTO messages VALUES("30","0","64","53","s");
INSERT INTO messages VALUES("31","0","65","64","a");
INSERT INTO messages VALUES("32","0","64","64","s");
INSERT INTO messages VALUES("33","0","68","53","Hello");
INSERT INTO messages VALUES("34","0","62","61","Hauutr");
INSERT INTO messages VALUES("35","0","61","62","Tyyuuuu");
INSERT INTO messages VALUES("36","0","74","75","Hi");
INSERT INTO messages VALUES("37","0","74","75","Hi");
INSERT INTO messages VALUES("38","0","74","75","Hello");
INSERT INTO messages VALUES("39","0","74","75","Ddkd");
INSERT INTO messages VALUES("40","0","74","75","Ududhd");
INSERT INTO messages VALUES("41","0","74","75","Hshshd");
INSERT INTO messages VALUES("42","0","74","75","Hsiebe");
INSERT INTO messages VALUES("43","0","74","75","Jsiebeur");
INSERT INTO messages VALUES("44","0","74","75","Heushe");
INSERT INTO messages VALUES("45","0","74","75","Jeuebehr");
INSERT INTO messages VALUES("46","0","74","75","Uruehe");
INSERT INTO messages VALUES("47","0","75","74","Yow what's up?");



CREATE TABLE `owner_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `lost_date` date NOT NULL,
  `lost_item` varchar(255) NOT NULL,
  `approval_status` enum('Accepted','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO owner_information VALUES("9","2020115201","Martin Tom Espinosa","BSIS","4th A","09192142869","2023-10-25","blue wallet","Rejected","2023-10-25 19:49:55","2023-11-27 12:44:46");
INSERT INTO owner_information VALUES("10","2020102937","mice alter","CRIM","3 Beta","09403954839","2023-10-28","pen","Accepted","2023-10-28 13:26:57","2023-10-28 13:32:48");
INSERT INTO owner_information VALUES("11","2147483647","nob kate","BSIS","2nd A","09009999999","2023-11-27","Wallet","Accepted","2023-11-27 12:40:57","2023-11-27 12:43:03");
INSERT INTO owner_information VALUES("12","2147483647","sample1 sample1","BSIS","2nd - O","09089454485","2023-11-29","ballpen","Accepted","2023-11-29 11:53:04","2023-11-29 11:54:26");



CREATE TABLE `owner_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `submission_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO owner_submissions VALUES("2","22","2023-10-20","1");
INSERT INTO owner_submissions VALUES("3","22","2023-10-23","1");
INSERT INTO owner_submissions VALUES("4","22","2023-10-25","2");
INSERT INTO owner_submissions VALUES("5","41","2023-10-28","1");
INSERT INTO owner_submissions VALUES("6","64","2023-11-27","1");
INSERT INTO owner_submissions VALUES("7","74","2023-11-29","1");



CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

INSERT INTO post VALUES("148","50","meow","2023-11-02 22:02:08","uploads/MEME.jfif");
INSERT INTO post VALUES("149","50","example
","2023-11-03 09:28:09","uploads/sample2.jpg");
INSERT INTO post VALUES("150","49","xcxcx","2023-11-03 11:10:53","");
INSERT INTO post VALUES("151","50","sas","2023-11-03 11:12:36","");
INSERT INTO post VALUES("152","53","try","2023-11-06 01:32:05","uploads/pallete.jfif");
INSERT INTO post VALUES("153","53","sd","2023-11-08 07:35:51","");
INSERT INTO post VALUES("154","1","sdsds","2023-11-08 08:00:57","");
INSERT INTO post VALUES("155","52","cxcx","2023-11-08 09:04:57","");
INSERT INTO post VALUES("156","52","like","2023-11-09 19:12:20","uploads/akatsuki.jpg");
INSERT INTO post VALUES("158","61","hello","2023-11-09 20:15:22","uploads/Screenshot 2023-11-03 001512.jpg");
INSERT INTO post VALUES("159","61","yooww","2023-11-09 20:18:49","");
INSERT INTO post VALUES("160","52","s","2023-11-10 10:21:12","");
INSERT INTO post VALUES("161","52","x","2023-11-10 13:59:32","");
INSERT INTO post VALUES("162","53","nnn","2023-11-10 14:01:11","");
INSERT INTO post VALUES("163","62","dsdsd
","2023-11-10 18:57:50","");
INSERT INTO post VALUES("164","63","mb
","2023-11-10 21:10:59","");
INSERT INTO post VALUES("165","63","nbnb
","2023-11-10 21:11:08","");
INSERT INTO post VALUES("166","65","JBNJ
","2023-11-11 18:24:04","");
INSERT INTO post VALUES("167","1","hello
k","2023-11-13 17:48:37","");
INSERT INTO post VALUES("168","53","hello po","2023-11-13 21:44:03","");
INSERT INTO post VALUES("169","62","HSHS
","2023-11-14 16:16:23","");
INSERT INTO post VALUES("170","62","hello","2023-11-15 10:40:12","");
INSERT INTO post VALUES("171","62","hi po","2023-11-15 10:55:58","");
INSERT INTO post VALUES("172","62","hi po","2023-11-15 10:55:59","");
INSERT INTO post VALUES("173","62","hi po","2023-11-15 10:56:21","");
INSERT INTO post VALUES("174","53","hello","2023-11-15 16:06:46","");
INSERT INTO post VALUES("175","1","hello","2023-11-18 16:17:58","");
INSERT INTO post VALUES("176","53","Hi","2023-11-26 17:12:01","");
INSERT INTO post VALUES("178","53","Hellolo","2023-11-26 17:13:55","uploads/Screenshot_20230719_204159_22e4250240c136c826b8a3b1264b092d.jpg");
INSERT INTO post VALUES("179","64","Yoe","2023-11-27 09:11:09","uploads/Screenshot_20231127_074454.jpg");
INSERT INTO post VALUES("181","64","Hello","2023-11-27 12:50:16","uploads/1694996602189.jpg");
INSERT INTO post VALUES("182","53","Hi","2023-11-29 00:51:42","uploads/Screenshot_20231005_124014.jpg");
INSERT INTO post VALUES("183","53","U","2023-11-29 01:03:27","uploads/Screenshot_20230507_145703_22e4250240c136c826b8a3b1264b092d.jpg");
INSERT INTO post VALUES("184","75","Hello","2023-11-29 12:10:02","");
INSERT INTO post VALUES("185","75","Heh","2023-11-29 18:47:27","uploads/Screenshot_20231129_102933.jpg");
INSERT INTO post VALUES("186","75","Hi","2023-11-29 18:59:24","");
INSERT INTO post VALUES("187","52","Hiii","2023-11-29 19:05:27","");



CREATE TABLE `reaction_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`),
  KEY `fk_reaction_logs_post` (`post_id`),
  KEY `fk_reaction_logs_user` (`user_id`),
  CONSTRAINT `fk_reaction_logs_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  CONSTRAINT `fk_reaction_logs_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

INSERT INTO reaction_logs VALUES("144","151","52","heart","2023-11-05 17:06:43");
INSERT INTO reaction_logs VALUES("145","151","53","heart","2023-11-05 19:21:20");
INSERT INTO reaction_logs VALUES("146","150","53","heart","2023-11-05 19:50:30");
INSERT INTO reaction_logs VALUES("147","154","1","heart","2023-11-08 08:01:05");
INSERT INTO reaction_logs VALUES("148","165","53","heart","2023-11-11 10:03:53");
INSERT INTO reaction_logs VALUES("165","150","49","heart","2023-11-11 11:45:04");
INSERT INTO reaction_logs VALUES("166","164","49","heart","2023-11-11 11:45:34");
INSERT INTO reaction_logs VALUES("167","166","49","heart","2023-11-11 21:55:49");
INSERT INTO reaction_logs VALUES("168","165","63","heart","2023-11-12 13:41:44");
INSERT INTO reaction_logs VALUES("169","166","52","heart","2023-11-12 19:41:41");
INSERT INTO reaction_logs VALUES("170","167","1","heart","2023-11-13 21:43:46");
INSERT INTO reaction_logs VALUES("171","168","1","heart","2023-11-13 23:26:11");
INSERT INTO reaction_logs VALUES("174","174","53","heart","2023-11-26 11:45:39");
INSERT INTO reaction_logs VALUES("177","175","64","heart","2023-11-26 15:22:59");
INSERT INTO reaction_logs VALUES("178","170","64","heart","2023-11-26 16:24:59");
INSERT INTO reaction_logs VALUES("179","170","53","heart","2023-11-26 17:06:28");
INSERT INTO reaction_logs VALUES("180","178","53","heart","2023-11-26 20:00:46");
INSERT INTO reaction_logs VALUES("181","160","64","heart","2023-11-27 12:43:52");
INSERT INTO reaction_logs VALUES("182","159","64","heart","2023-11-27 12:43:55");
INSERT INTO reaction_logs VALUES("183","158","64","heart","2023-11-27 12:43:57");
INSERT INTO reaction_logs VALUES("184","156","64","heart","2023-11-27 12:43:59");
INSERT INTO reaction_logs VALUES("185","155","64","heart","2023-11-27 12:44:00");
INSERT INTO reaction_logs VALUES("186","154","64","heart","2023-11-27 12:44:02");
INSERT INTO reaction_logs VALUES("187","181","64","heart","2023-11-27 12:51:18");
INSERT INTO reaction_logs VALUES("188","178","64","heart","2023-11-27 12:52:03");
INSERT INTO reaction_logs VALUES("189","162","53","heart","2023-11-29 00:52:16");
INSERT INTO reaction_logs VALUES("190","168","53","heart","2023-11-29 01:47:41");
INSERT INTO reaction_logs VALUES("192","150","75","heart","2023-11-30 02:56:20");



CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Number` int(10) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` text NOT NULL,
  `yr_section` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `unique_code` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` varchar(255) DEFAULT 'Active now',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `approval_status` enum('pending','accepted','rejected','deactivated') NOT NULL DEFAULT 'pending',
  `bio` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_number` text NOT NULL,
  `gender` text NOT NULL,
  `image_path` varchar(255) NOT NULL DEFAULT 'includes/user icon for ui.png',
  `cover_photo` varchar(255) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","101010101","THE","ADMIN","","","ADMIN
","Admin","$2y$10$jI5H9jHgjy2.zOYFwjDi4OwqOHJsAkgnG0Ant.G/TPVd2jQfbiiaC","admin1","1","Active now","2023-09-18 14:47:27","accepted","","0000-00-00","","","Female","profile_pictures/images (1).jpeg","profile_pictures/selena.jpg","2023-11-29 20:43:16");
INSERT INTO user VALUES("49","1212121212","Kimkim","Terania","BSIS","","4th A","kimkim","$2y$10$sGDlTNvSHNFw/Wk9rrD1U.5EAxcMkIW.iAxRCC6TVO4xCJTppSF/W","123","0","Active now","2023-10-29 17:47:33","deactivated","Wala lang","2002-07-31","La Carlota City","0985648363","Male","profile_pictures/photo6.png","profile_pictures/course bootstrap& media query.jpg","2023-11-15 15:58:18");
INSERT INTO user VALUES("50","454554545","Chemros","Terania","CRIM","","3 Beta","michael321","$2y$10$FniuOJM0tjlfI77SvNk8n.HrnynIe7IdhFt2uN30eBjqxvlZFkN9C","321","0","Active now","2023-10-29 19:15:14","accepted","meh","2002-07-31","America","096736524434","Female","profile_pictures/icons8-birthday-100.png","profile_pictures/Screenshot 2023-11-03 001512.jpg","2000-01-01 00:00:00");
INSERT INTO user VALUES("52","909099090","Jaziel","Griffin","BSEDUC","","1st B","justjaziel","$2y$10$o03Yqw9B6WHqsw3fvudmou9LM0B.IT01wzJrr.2QRCUnGvNRKB4tC","12345","0","Active now","2023-11-03 16:14:37","accepted","","0000-00-00","New Zealand","09487134261","Female","profile_pictures/84dd10c4127610808e57a11cdd04d437.jpg","profile_pictures/tech3.jpg","2023-11-14 12:56:37");
INSERT INTO user VALUES("53","2121212121","Ana","Dodge","BSOA","","2nd A","ana","$2y$10$rJeHOEigjO6UyZwW1cPoF.Y4wwZsizBo0fgcYMPFGCKONWarIMcFC","ana","0","Offline now","2023-11-03 17:54:57","accepted","","2023-11-16","","","Female","profile_pictures/afdf3723e3638098c84a449e697194b1.jpg","profile_pictures/cover.png","2023-11-18 16:43:30");
INSERT INTO user VALUES("61","1414441445","Jm","Salas","BSEDUC","","3rd A","callmejm","$2y$10$At7f3x59XNUyTv/brcHaheTt0PU22vwJNXSNiKaRG5Vvd.6ZOH5C.","123jm","0","Active now","2023-11-09 18:03:27","accepted","","0000-00-00","","","","includes/user icon for ui.png","","2000-01-01 00:00:00");
INSERT INTO user VALUES("62","2147483647","jonas","lame","BSIS","","4th A","jonas","$2y$10$/OaxDHYjGk/1J0sQT/Lecu1RfGSegNNJ/yj2xLqKtcZx5J/iQkCBG","jonas","0","Active now","2023-11-10 18:51:34","accepted","","0000-00-00","","","","profile_pictures/profile8.jpg","profile_pictures/feed-image-3.png","2023-11-15 17:52:02");
INSERT INTO user VALUES("63","2147483647","MARCUS","DE LOSANTOS III","BSOA","","2nd A","markey","$2y$10$oXD1m.drYuANhSdDMwyC8OMH7LPv5yh41gvxpfmYaj7sjx0JXx0LC","123","0","Active now","2023-11-10 19:04:48","accepted","","0000-00-00","","","Female","profile_pictures/photo5.png","profile_pictures/b1.jpg","2023-11-15 20:42:55");
INSERT INTO user VALUES("64","2147483647","nob","kate","BSIS","","2nd A","nob","$2y$10$zypMsKOyHhFHmMlgBBnhuu14.gtgTCCs7o.hBvJhZS2Rj.BE6zW8K","nob","0","Offline now","2023-11-10 19:34:16","accepted","Wala lang","2023-11-30","san francisco","097464544654","Female","profile_pictures/thunder flash selena.jpg","profile_pictures/bumble.jpg","2023-11-18 16:22:45");
INSERT INTO user VALUES("65","2147483647","Kimkim","Montenegro","CRIM","","2 Alpha","1","$2y$10$KYnfU7r9sGx5LeeRHaT/eew5F1UTz45P0RXFhOApDwBf.r4LDwbqG","1","0","Active now","2023-11-11 18:18:11","accepted","","0000-00-00","","","Female","includes/user icon for ui.png","","2023-11-13 18:13:21");
INSERT INTO user VALUES("66","2147483647","angeline","lim","BSEDUC","","1st B","lim","$2y$10$kGChsS2BDFQexu0oxt.7oeI8pb8/AqjoVE8jCKFti9pZP1hf8yBcy","LIM","0","Active now","2023-11-13 14:38:06","accepted","","0000-00-00","","","","includes/user icon for ui.png","","2000-01-01 00:00:00");
INSERT INTO user VALUES("67","2147483647","Mikey","Lore","ARTS","","3rd A","lore","$2y$10$A5Axjan1j/EkJ6KWLlp4Nuz57iXhZiAzohPIbkZ4MZRBPeMqbBwtG","lore","0","Active now","2023-11-13 14:44:40","accepted","","0000-00-00","","","","includes/user icon for ui.png","","2023-11-13 14:46:21");
INSERT INTO user VALUES("68","2029177386","Realyn","Terania","BSIS","","1st A","Rea","$2y$10$unjWbhsq2KomY.4x7JRvuuhU6PrJiNteXD2O04zq4DWbwMcsYUdc2","1234","0","Active now","2023-11-25 20:19:11","accepted","","0000-00-00","","","","includes/user icon for ui.png","","2023-11-25 20:19:11");
INSERT INTO user VALUES("74","2147483647","sample1","sample1","BSIS","2nd","O","sample1","$2y$10$FDpt8XSLHa620BXj6698HOOPaHiCLyewik9Ytvl4FZ14w./JT5OSS","sample1","0","Active now","2023-11-29 10:11:58","accepted","","0000-00-00","","","","includes/user icon for ui.png","","2023-11-29 10:11:58");
INSERT INTO user VALUES("75","2147483647","sample2","sample2","BSOA","2nd","C","sample2","$2y$10$/cMgAzKB16k4Q3D3HoOb.Obxz5ckWuHd899YNTes3/fcF2F630OJi","sample2","0","Active now","2023-11-29 11:57:03","accepted","","0000-00-00","","","","profile_pictures/Screenshot_2023-11-09-22-22-13-39_22e4250240c136c826b8a3b1264b092d.jpg","profile_pictures/Screenshot_2023-11-09-22-32-08-25_22e4250240c136c826b8a3b1264b092d.jpg","2023-11-29 11:57:03");

