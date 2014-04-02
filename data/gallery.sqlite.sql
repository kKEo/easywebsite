DROP TABLE IF EXISTS `Gallery`;

CREATE TABLE `Gallery` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`title` VARCHAR(127),
	`category` VARCHAR(127),
	`description` VARCHAR(512),
	`isPublished` CHAR(1) default 'N',
	`filename` VARCHAR(255) NOT NULL,
	`displayed` INTEGER DEFAULT 0,
	`rating` INTEGER DEFAULT 0,
	`created` datetime default NULL
); 