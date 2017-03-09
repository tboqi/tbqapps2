/*
SQLyog Professional v12.08 (64 bit)
MySQL - 10.1.8-MariaDB : Database - khnapps_website
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`khnapps_website` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `article_categories` */

DROP TABLE IF EXISTS `article_categories`;

CREATE TABLE `article_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  `show_order` int(11) NOT NULL DEFAULT '0',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '本分类下的文章数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章分类';

/*Data for the table `article_categories` */

insert  into `article_categories`(`id`,`name`,`description`,`show_order`,`num`) values (1,'a','a',1,0);
insert  into `article_categories`(`id`,`name`,`description`,`show_order`,`num`) values (2,'dd','bb',2,0);

/*Table structure for table `article_comments` */

DROP TABLE IF EXISTS `article_comments`;

CREATE TABLE `article_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `create_time` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `user_name` varchar(255) DEFAULT NULL COMMENT '评论者用户名',
  `user_email` varchar(255) DEFAULT NULL COMMENT '评论者email',
  PRIMARY KEY (`id`),
  KEY `FK_yuqi_comments_1` (`article_id`),
  CONSTRAINT `FK_yuqi_comments_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `article_comments` */

/*Table structure for table `article_tab_link` */

DROP TABLE IF EXISTS `article_tab_link`;

CREATE TABLE `article_tab_link` (
  `article_id` int(10) unsigned NOT NULL,
  `tab_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `aid_tid` (`article_id`,`tab_id`),
  KEY `FK_yuqi_article_tab_2` (`tab_id`),
  CONSTRAINT `FK_yuqi_article_tab` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_yuqi_article_tab_2` FOREIGN KEY (`tab_id`) REFERENCES `article_tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章与标签关联表';

/*Data for the table `article_tab_link` */

insert  into `article_tab_link`(`article_id`,`tab_id`) values (1,1);
insert  into `article_tab_link`(`article_id`,`tab_id`) values (1,2);
insert  into `article_tab_link`(`article_id`,`tab_id`) values (1,3);
insert  into `article_tab_link`(`article_id`,`tab_id`) values (2,4);

/*Table structure for table `article_tabs` */

DROP TABLE IF EXISTS `article_tabs`;

CREATE TABLE `article_tabs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tab` varchar(255) NOT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '本标签下的文章数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章标签';

/*Data for the table `article_tabs` */

insert  into `article_tabs`(`id`,`tab`,`num`) values (1,'a',0);
insert  into `article_tabs`(`id`,`tab`,`num`) values (2,'b',0);
insert  into `article_tabs`(`id`,`tab`,`num`) values (3,'c',0);
insert  into `article_tabs`(`id`,`tab`,`num`) values (4,'d',0);

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `create_time` bigint(20) unsigned NOT NULL,
  `read_times` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读次数',
  `update_time` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ref` tinyint(3) unsigned NOT NULL COMMENT '0 原创 1转贴 2翻译',
  `refurl` varchar(511) NOT NULL DEFAULT '' COMMENT 'ref=0时为null',
  `category_id` int(10) unsigned NOT NULL,
  `category_name` varchar(45) NOT NULL DEFAULT '',
  `tabs_detail` text COMMENT '存储标签的详细信息，\njson格式，\n包含id，name',
  PRIMARY KEY (`id`),
  KEY `fk_articles_article_categories1` (`category_id`),
  CONSTRAINT `fk_articles_article_categories1` FOREIGN KEY (`category_id`) REFERENCES `article_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `articles` */

insert  into `articles`(`id`,`title`,`summary`,`content`,`create_time`,`read_times`,`update_time`,`ref`,`refurl`,`category_id`,`category_name`,`tabs_detail`) values (1,'aa','aaa','aaa',1472630236,0,1472630236,0,'',1,'a','[{\"id\":\"1\",\"tab\":\"a\"},{\"id\":\"2\",\"tab\":\"b\"},{\"id\":\"3\",\"tab\":\"c\"}]');
insert  into `articles`(`id`,`title`,`summary`,`content`,`create_time`,`read_times`,`update_time`,`ref`,`refurl`,`category_id`,`category_name`,`tabs_detail`) values (2,'ddd','dd','ddd',1476244245,0,1476244245,0,'',1,'a','[{\"id\":\"4\",\"tab\":\"d\"}]');

/*Table structure for table `link_categories` */

DROP TABLE IF EXISTS `link_categories`;

CREATE TABLE `link_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接的分类';

/*Data for the table `link_categories` */

insert  into `link_categories`(`id`,`name`) values (1,'rrr');

/*Table structure for table `links` */

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `category_id` int(10) unsigned NOT NULL COMMENT '友情链接',
  PRIMARY KEY (`id`),
  KEY `fk_links_link_category1` (`category_id`),
  CONSTRAINT `fk_links_link_category1` FOREIGN KEY (`category_id`) REFERENCES `link_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接';

/*Data for the table `links` */

insert  into `links`(`id`,`url`,`name`,`category_id`) values (1,'dfff','ddd',1);

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  `show_order` int(11) NOT NULL DEFAULT '0',
  `num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '本分类下的产品数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='产品分类';

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`name`,`description`,`show_order`,`num`) values (1,'dd','bb',2,0);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_time` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`content`,`create_time`,`update_time`,`category_id`,`img`,`title`) values (1,'sdfsdf',1476321838,1476321838,1,'3e5d9dde86d0bf4c1a41cd92f48c5672.jpg','sdfsf');
insert  into `products`(`id`,`content`,`create_time`,`update_time`,`category_id`,`img`,`title`) values (2,'ffdfdfdf',1476322181,1476322181,1,'ba8f870449e330f49c263fbe8d04b0cb.jpg','sdfsf222');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '展示用',
  `account` varchar(255) NOT NULL COMMENT '登录用',
  `password` varchar(255) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`account`,`password`,`create_time`,`update_time`) values (1,'超级管理员','admin','e3d38af46f7fe58f71a62d16e8afdf6178caa6047f9e300426f998a60243fd25',1431780329,1431780329);
insert  into `users`(`id`,`username`,`account`,`password`,`create_time`,`update_time`) values (2,'admin1','admin1','e3d38af46f7fe58f71a62d16e8afdf6178caa6047f9e300426f998a60243fd25',1470988209,1470988209);

/*Table structure for table `website` */

DROP TABLE IF EXISTS `website`;

CREATE TABLE `website` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `website` */

insert  into `website`(`id`,`title`,`description`,`keywords`) values (3,'title','description','keywords');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
