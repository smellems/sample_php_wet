/*
SQLyog Community Edition- MySQL GUI v8.01 
MySQL - 5.0.95 : Database - silent_auction
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`enchere_auction` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `enchere_auction`;

/*Table structure for table `auctions` */

DROP TABLE IF EXISTS `auctions`;

CREATE TABLE `auctions` (
  `id` int(10) NOT NULL auto_increment,
  `name_fr` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) collate utf8_unicode_ci NOT NULL,
  `desc_fr` text collate utf8_unicode_ci NOT NULL,
  `desc_en` text collate utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  `show_bids` datetime default NULL,
  `hide_bids` datetime default NULL,
  `memo_en` text collate utf8_unicode_ci,
  `memo_fr` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) NOT NULL auto_increment,
  `name_fr` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) NOT NULL auto_increment,
  `auction_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name_fr` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) collate utf8_unicode_ci NOT NULL,
  `desc_fr` text collate utf8_unicode_ci NOT NULL,
  `desc_en` text collate utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `increments` float NOT NULL,
  `picture` longblob NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `auction_id` (`auction_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `items_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `bids` */

DROP TABLE IF EXISTS `bids`;

CREATE TABLE `bids` (
  `id` int(10) NOT NULL auto_increment,
  `item_id` int(10) NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `status` tinyint(1) default NULL,
  `hash_code` varchar(15) collate utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  `price` float(6,2) default NULL,
  PRIMARY KEY  (`id`),
  KEY `hash_code` (`hash_code`),
  KEY `composite_key` (`item_id`,`status`),
  CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
