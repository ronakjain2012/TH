DROP DATABASE IF EXISTS `TH`;
CREATE DATABASE IF NOT EXISTS `TH`;
USE `TH`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
	`user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_mail` varchar(128) NOT NULL,
	`user_password` varchar(128) NOT NULL,
	`user_name` varchar(64),
	`user_doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_state` tinyint(1) NOT NULL DEFAULT '1',
	PRIMARY KEY (`user_id`)
) AUTO_INCREMENT = 1;

INSERT INTO `users` (`user_id`, `user_mail`, `user_password`, `user_name`, `user_doj`, `user_state`) VALUES
(1, 'demo@demo.demo', 'demo', NULL, '2015-12-20 13:35:45', 1);


DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `route_id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(64) NOT NULL,
  `destination` varchar(64) NOT NULL,
  `time` int(11) NOT NULL COMMENT 'in minutes',
  PRIMARY KEY (`route_id`)
) AUTO_INCREMENT = 1 ;

INSERT INTO `routes` (`route_id`, `source`, `destination`, `time`) VALUES
(1, 'ludhiana', 'amritsar', 140),
(2, 'ludhiana', 'chandigarh', 110),
(3, 'ludhiana', 'jalandhar', 60),
(4, 'ludhiana', 'muktsar', 220);