/*
SQLyog Professional v12.08 (64 bit)
MySQL - 10.1.8-MariaDB : Database - flask
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`flask` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `links` */

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `links` */

insert  into `links`(`id`,`title`,`url`,`create_time`) values (1,'xampp php5.3','http://localhost:82/xampp/index.php',0);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (3,'jquery-ui-1.10.4','http://localhost/jquery-ui-1.10.4/',1491374073);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (4,'Flask中文文档','http://docs.jinkan.org/docs/flask/',1491374112);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (5,'jqueryui中文网','http://www.jqueryui.org.cn/',1491374130);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (6,'jQuery UI 1.10 API中文文档','http://www.css88.com/jquery-ui-api/',1491374146);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (7,'khn企业站','http://khnapps_website.com/',1491374159);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (8,'phpcms后台','http://phpcms_centos.com/index.php?m=admin',1491374173);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (9,'phpcms','http://phpcms_centos.com/',1491374185);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (10,'tienstest','http://tienstest.com/',1491374198);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (11,'tool.tbq','http://tool.tbq.com/',1491374216);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (12,'www.tbq','http://www.tbq.com/',1491374229);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (13,'admin.tbq','http://admin.tbq.com/',1491374244);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (14,'my.tbq','http://my.tbq.com/',1491374258);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (15,'khn3blog','http://khn3blog.com/',1491374283);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (16,'phpcms v9 开发文档','http://v9.help.phpcms.cn/',1491374296);
insert  into `links`(`id`,`title`,`url`,`create_time`) values (17,'tbq_status首页','http://localhost/',1491374329);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`create_time`) values (1,'admin','e3ceb5881a0a1fdaad01296d7554868d',1462279427);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
