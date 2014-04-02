DROP TABLE IF EXISTS `Contributions`;

CREATE TABLE `Contributions`(
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text default NULL,
  `abstract` varchar(512) default NULL,
  `status` INTEGER default 0,
  `redirect` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `icon` varchar(255) default NULL,
  `tags` varchar(255) default NULL,
  `viewed` int(11) default 0,  
  `created` datetime,
  `created_by` int(11),
  `modified` datetime default NULL,
  `modified_by` int(11) default NULL
);

INSERT INTO `Contributions`(title, content, status) VALUES ('Strona&nbsp;Główna', 'TO jest strona glowna', 1);
INSERT INTO `Contributions`(title, content, status) VALUES ('Informacje', 'TO sa informacje', 1);
INSERT INTO `Contributions`(title, content, status) VALUES ('Oferta', 'TO jest oferta', 1);
INSERT INTO `Contributions`(title, content, status) VALUES ('Umowy', 'TO jest umowa', 1);

DROP TABLE IF EXISTS `Types`;

CREATE TABLE IF NOT EXISTS `Types` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `category` varchar(50) default NULL,  
  `created` datetime default NULL,
  `created_by` int(11) default NULL
);

INSERT INTO `Types` VALUES (1,'TopMenu', NULL, 'Menu górne', 'Menu', NULL, NULL);
INSERT INTO `Types` VALUES (2,'SideMenu', NULL, 'Menu boczne', 'Menu', NULL, NULL);
INSERT INTO `Types` VALUES (3,'Footer', NULL, 'Stopka', 'Menu', NULL, NULL);
INSERT INTO `Types` VALUES (4,'Article', NULL, 'Artykuł', 'Article', NULL, NULL);
INSERT INTO `Types` VALUES (6,'Article', NULL, 'Snippet', 'Snippet', NULL, NULL);
INSERT INTO `Types` VALUES (7,'Article', NULL, 'HowTo', 'HowTo', NULL, NULL);

DROP TABLE IF EXISTS `Hooks`;

CREATE TABLE IF NOT EXISTS `Hooks` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`title` varchar(255) NOT NULL,
	`contribution_id` INTEGER NOT NULL,
	`type_id` INTEGER NOT NULL,
	`position` INTEGER DEFAULT '0',
	`parent_id` INTEGER default NULL,
    `created` datetime default NULL,
    `created_by` INTEGER default NULL,
    CONSTRAINT FK_hook_type FOREIGN KEY (type_id)
    	REFERENCES Types (id) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT FK_contribution FOREIGN KEY (contribution_id)
    	REFERENCES Contributions (id) ON DELETE CASCADE ON UPDATE RESTRICT
);

INSERT INTO `Hooks` (title, contribution_id, type_id, position) VALUES ('Test', 1, 1, 1);
INSERT INTO `Hooks` (title, contribution_id, type_id, position) VALUES ('Test2', 2, 1, 1);
INSERT INTO `Hooks` (title, contribution_id, type_id, position) VALUES ('Test3', 3, 1, 1);
INSERT INTO `Hooks` (title, contribution_id, type_id, position) VALUES ('Test4', 3, 2, 1);
INSERT INTO `Hooks` (title, contribution_id, type_id, position) VALUES ('Test5', 4, 3, 1);

DROP TABLE IF EXISTS `Tags`;

CREATE TABLE IF NOT EXISTS `Tags` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`value` VARCHAR(128)
);

DROP TABLE IF EXISTS `Contributionstags`;

CREATE TABLE IF NOT EXISTS `Contributionstags` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`contribution_id` INTEGER NOT NULL,
	`tag_id` INTEGER NOT NULL,
    CONSTRAINT FK_tag FOREIGN KEY (tag_id)
    	REFERENCES Tags (id) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT FK_contribution FOREIGN KEY (contribution_id)
    	REFERENCES Contributions (id) ON DELETE CASCADE ON UPDATE RESTRICT
);

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `username` varchar(20) default NULL,
  `registerEmail` varchar(200) default NULL,
  `password` varchar(45) default NULL,
  `question` varchar(100) default NULL,
  `answer` varchar(45) default NULL,
  `isActive` char(1) default 'N',
  `activationString` char(45) default NULL,
  `role` varchar(10) default NULL,
  `created` datetime default NULL
);

INSERT INTO `Users` VALUES (1,'krma','krzysztof.maziarz@gmail.com','ffa7c4a3ec4d3ca3861c1b382fbc2586cebb19ed',NULL,NULL,'N','1ba1d1729ec31021f94338285b2ec87dfd9ae8c8','admin','2009-05-16 11:47:16');