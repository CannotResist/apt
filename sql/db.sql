/* SQL Manager for MySQL                              5.8.0.53447 */
/* -------------------------------------------------------------- */
/* Host     : localhost                                           */
/* Port     : 3306                                                */
/* Database : apteka                                              */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8mb4' */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `apteka`;

CREATE DATABASE `apteka`
    CHARACTER SET 'utf8mb4'
    COLLATE 'utf8mb4_general_ci';

USE `apteka`;

/* Dropping database objects */

DROP TABLE IF EXISTS `leki`;
DROP TABLE IF EXISTS `dokumetyuzytkownika`;
DROP TABLE IF EXISTS `uzytkownicy`;

/* Structure for the `uzytkownicy` table : */

CREATE TABLE `uzytkownicy` (
  `id` INTEGER NOT NULL COMMENT 'identyfikator uzytkownika',
  `nazwisko` VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
  `imie` VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
  `adres` VARCHAR(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci'
;

/* Structure for the `dokumetyuzytkownika` table : */

CREATE TABLE `dokumetyuzytkownika` (
  `nazwa` VARCHAR(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `serianumer` VARCHAR(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` INTEGER NOT NULL,
  KEY `dokumetyuzytkownika_fk1` USING BTREE (`id`),
  CONSTRAINT `dokumetyuzytkownika_fk1` FOREIGN KEY (`id`) REFERENCES `uzytkownicy` (`id`)
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci'
;

/* Structure for the `leki` table : */

CREATE TABLE `leki` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `nazwa` VARCHAR(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producent` VARCHAR(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cena` INTEGER DEFAULT NULL,
  `waga` INTEGER NOT NULL,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE=InnoDB
AUTO_INCREMENT=144 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci'
;

/* Data for the `uzytkownicy` table  (LIMIT 0,500) */

INSERT INTO `uzytkownicy` (`id`, `nazwisko`, `imie`, `adres`) VALUES
  (1,'Nowak','Adam','tsz'),
  (2,'Kowalski','Jacek','wroc'),
  (145,'Wasik','Kasia','Opatow'),
  (400,'Kowalski','Jacek','krk'),
  (401,'Kowalski','Jacek','krk'),
  (403,'Kowalski','Jacek','krk'),
  (410,'Kowalski','Jacek','krk'),
  (420,'Wasik','Robert','Opatow'),
  (500,'Wasik','Robert','Opatow'),
  (600,'Wasik','Kasia','Opatow');
COMMIT;

/* Data for the `dokumetyuzytkownika` table  (LIMIT 0,500) */

INSERT INTO `dokumetyuzytkownika` (`nazwa`, `serianumer`, `id`) VALUES
  ('DO','AA000000',1),
  ('P','BB11111',1),
  ('DO','CC77777',2);
COMMIT;

/* Data for the `leki` table  (LIMIT 0,500) */

INSERT INTO `leki` (`id`, `nazwa`, `producent`, `cena`, `waga`) VALUES
  (123,'Piramidon','Bayer',80000,100),
  (124,'Piramidon','Bayer',80000,100),
  (125,'magnez','AFLOP',80000,100),
  (126,'Piramidon','Bayer',80000,100),
  (127,'Piramidon','Bayer',80000,100),
  (128,'Piramidon','Bayer',80000,100),
  (129,'Piramidon','Bayer',80000,100),
  (130,'Piramidon','Bayer',80000,100),
  (131,'Piramidon','Bayer',80000,100),
  (132,'Piramidon','Bayer',80000,100),
  (133,'Piramidon','Bayer',80000,100),
  (134,'Piramidon','Bayer',80000,100),
  (135,'Piramidon','Bayer',80000,100),
  (136,'Piramidon','Bayer',80000,100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;