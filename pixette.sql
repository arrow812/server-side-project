# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.14-MariaDB)
# Database: pixette
# Generation Time: 2016-07-26 09:03:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL DEFAULT '',
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `type_id_2` (`type_id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  CONSTRAINT `images_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `file`, `type_id`, `user_id`, `visible`)
VALUES
	(1838,'1469443174photo-1447675702052-663a7ef9eaa6resized.jpg',7,50,1),
	(1839,'1469443273ad3ef4b9eeecresized.jpg',5,50,1),
	(1840,'1469443298photo-1460186136353-977e9d6085a1resized.jpg',5,50,1),
	(1841,'1469443810MorganMaassen_Surfing_14.jpg',6,50,1),
	(1842,'1469443959MorganMaassen_Surfing_24.jpg',6,50,1),
	(1843,'1469520886pNvfqLMresized.jpg',5,48,1),
	(1844,'1469520938photo-1467094568967-95f87ee9c873resized.jpg',3,48,1),
	(1845,'1469520956photo-1465424365847-61f79d8b6435resized.jpg',4,48,1),
	(1846,'1469520993photo-1461352195749-fdba50b79c74resized.jpg',6,48,1),
	(1847,'1469521018photo-1416671245579-fc1a6d884d04resized.jpg',4,48,1),
	(1848,'1469521038MorganMaassen_Surfing_15.jpg',6,48,1),
	(1849,'1469521060MorganMaassen_Surfing_9.jpg',6,48,1),
	(1850,'1469521129jaws2resized.jpg',6,48,1),
	(1851,'1469521140f6ee1ecaf117resized.jpg',7,48,1),
	(1852,'14695211543939d4ab1019resized.jpg',4,48,1),
	(1853,'146952118179bc7a8352e4resized.jpg',7,48,1),
	(1854,'1469523327',3,50,0);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `type_name`)
VALUES
	(3,'Landscape'),
	(4,'Architecture'),
	(5,'Space'),
	(6,'Ocean'),
	(7,'Animals');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '',
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`,`email`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`)
VALUES
	(1,'Aramis udated','Goodwin updated','aramisgoodwin@icloud.com','1',0),
	(2,'Jimmy','Jones','Jimmysemail@gmail.com','1',0),
	(4,'Jordy','Slater','jordy@gmail.com','1',0),
	(17,'Aramis','Goodwin','aramisgoodwin@icloud.com','0',1),
	(37,'Iona','Pruitt','fiki@hotmail.com','Pa$$w0rd!',0),
	(38,'Melodie','Hill','ganuqypof@hotmail.com','Pa$$w0rd!',0),
	(39,'Stephanie','Dean','lokeje@gmail.com','',0),
	(40,'Nola','Douglas','davijal@hotmail.com','$2y$10$48Exwec4cedhR79Ie.1CtuZPWL44eWTVC0cgfigdtGgkeVpKU.oDm',0),
	(41,'Maile','Henson','mima@hotmail.com','$2y$10$dPCQB2pSLwgoLejb4O4sqen43CpltfFyreVkznaHcXmoZIR6y2WyW',0),
	(42,'Drake','Hill','zihis@hotmail.com','$2y$10$Q5AHM02T.YGSg1rmRPtdqOjTyw3Xxm1O8phllM4eZ.S8VuRU.WCV.',0),
	(43,'Nadine','Stanton','cuxob@gmail.com','$2y$10$rYmFvnHiQJRYXYuRlDa3c.j.AR2SkMnNgo6VSwsX7OdfggsFFmN/O',0),
	(44,'Guinevere','Calderon','dusozuhe@gmail.com','$2y$10$Y32vmL9I6JB/IhOt9VQZOOCD/l0n5u.OjDEE9/0pkjL1yqcgYC8La',0),
	(45,'Uma','Woodward','jofoveco@yahoo.com','$2y$10$UgEf8c1nH7WyGe2cuNb8M.ebnXzacS8pz3Vx6093BLX3Un2CZaola',0),
	(46,'Kareem','Stevenson','hetusyty@yahoo.com','$2y$10$/TfbrRGhEn0ETjtr972TBujQ6ipIFjiqJCSfifNWmfzhREcf3bZuC',0),
	(47,'Neve','Whitehead','con@gmail.com','',0),
	(48,'Chaim','Mcintosh','n@hotmail.com','$2y$10$xedOk2lG4oieRpCe9n0q5eTuOavF2pZZm5gIxu2dBZBo0kOpPV3DG',0),
	(49,'Channing','Craig','p@hotmail.com','$2y$10$IQjHF0pcLMdx6k8cfJAhD.D1x2gZ8T5Kaj7rASREghgeoNjjQqssS',1),
	(50,'Ramona','Acevedo','t@yahoo.com','$2y$10$whTa.eSR6p1Vhu/euT5wL.zVw5HQyuQeJjYerYrfw8ZdxKE.Kp/ZK',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `value` (`value`,`user_id`,`image_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`),
  KEY `image_id_2` (`image_id`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;

INSERT INTO `votes` (`id`, `value`, `user_id`, `image_id`)
VALUES
	(259,-1,48,1838),
	(260,-1,48,1838),
	(261,-1,48,1838),
	(262,-1,48,1838),
	(263,-1,48,1838),
	(264,-1,48,1853),
	(250,-1,49,1841),
	(239,-1,50,1838),
	(240,-1,50,1838),
	(241,-1,50,1838),
	(242,-1,50,1838),
	(243,-1,50,1838),
	(244,-1,50,1838),
	(245,-1,50,1838),
	(273,1,48,1838),
	(270,1,48,1843),
	(271,1,48,1843),
	(272,1,48,1845),
	(267,1,48,1847),
	(269,1,48,1847),
	(266,1,48,1851),
	(268,1,48,1852),
	(251,1,48,1853),
	(252,1,48,1853),
	(253,1,48,1853),
	(254,1,48,1853),
	(255,1,48,1853),
	(256,1,48,1853),
	(257,1,48,1853),
	(258,1,48,1853),
	(265,1,48,1853),
	(274,1,48,1853),
	(278,1,49,1838),
	(249,1,49,1841),
	(277,1,49,1852),
	(279,1,49,1853),
	(220,1,50,1838),
	(221,1,50,1838),
	(222,1,50,1838),
	(223,1,50,1838),
	(224,1,50,1838),
	(225,1,50,1838),
	(226,1,50,1838),
	(227,1,50,1838),
	(228,1,50,1838),
	(229,1,50,1838),
	(230,1,50,1838),
	(231,1,50,1838),
	(232,1,50,1838),
	(233,1,50,1838),
	(234,1,50,1838),
	(235,1,50,1838),
	(236,1,50,1838),
	(237,1,50,1838),
	(238,1,50,1838),
	(246,1,50,1839),
	(247,1,50,1840),
	(248,1,50,1840),
	(275,1,50,1844),
	(276,1,50,1854);

/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
