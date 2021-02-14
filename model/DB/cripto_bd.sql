-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cripto_bd
CREATE DATABASE IF NOT EXISTS `cripto_bd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cripto_bd`;

-- Volcando estructura para tabla cripto_bd.account
CREATE TABLE IF NOT EXISTS `account` (
  `ID_user` int(11) NOT NULL,
  `ID_account` int(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `type_account` varchar(50) NOT NULL,
  `check_account` int(11) NOT NULL DEFAULT 0,
  KEY `ID_user` (`ID_user`),
  KEY `num_cuenta` (`ID_account`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cripto_bd.cripto
CREATE TABLE IF NOT EXISTS `cripto` (
  `ID_cripto` int(11) NOT NULL AUTO_INCREMENT,
  `cript_name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_cripto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cripto_bd.sell
CREATE TABLE IF NOT EXISTS `sell` (
  `ID_sell` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_cripto` int(11) NOT NULL,
  `ID_account` int(11) NOT NULL,
  `sell_amount` float NOT NULL,
  `amount_cripto` float NOT NULL,
  `amount_pesos` float NOT NULL,
  `date_hour` datetime NOT NULL,
  `check_sell` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_sell`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cripto_bd.shopping
CREATE TABLE IF NOT EXISTS `shopping` (
  `ID_shop` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_cripto` int(11) NOT NULL,
  `ID_account` int(11) NOT NULL,
  `shop_amount` float NOT NULL,
  `amount_cripto` float NOT NULL,
  `amount_pesos` float NOT NULL,
  `date_hour` datetime NOT NULL,
  `check_shopping` int(11) NOT NULL,
  PRIMARY KEY (`ID_shop`) USING BTREE,
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cripto_bd.user
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` int(8) NOT NULL,
  `CUIL` varchar(11) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `second_last_name` varchar(50) DEFAULT NULL,
  `birth_day` date NOT NULL,
  `check_user` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_user`),
  KEY `DNI` (`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cripto_bd.wallet_user
CREATE TABLE IF NOT EXISTS `wallet_user` (
  `ID_user` int(11) NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
