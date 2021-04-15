-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
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
  `ID_account` int(50) NOT NULL AUTO_INCREMENT,
  `ID_bank` varchar(50) NOT NULL DEFAULT '0',
  `CBU` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `ID_type_account` int(11) NOT NULL DEFAULT 0,
  `check_account` int(11) NOT NULL DEFAULT 0,
  `account_number` varchar(50) NOT NULL,
  KEY `ID_user` (`ID_user`),
  KEY `num_cuenta` (`ID_account`) USING BTREE,
  KEY `ID_bank` (`ID_bank`),
  KEY `CBU` (`CBU`),
  KEY `FK_account_type_account` (`ID_type_account`),
  KEY `account_number` (`account_number`),
  CONSTRAINT `FK_account_bank` FOREIGN KEY (`ID_bank`) REFERENCES `bank` (`id_bank`),
  CONSTRAINT `FK_account_type_account` FOREIGN KEY (`ID_type_account`) REFERENCES `type_account` (`ID_type_account`),
  CONSTRAINT `FK_account_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.account: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
REPLACE INTO `account` (`ID_user`, `ID_account`, `ID_bank`, `CBU`, `alias`, `ID_type_account`, `check_account`, `account_number`) VALUES
	(31, 1, '00015', '0150804601000131815415', 'MARMOL.RUEDA.TONO', 1, 0, '08040113181541'),
	(31, 2, '00072', '0010010100101010101010', 'AAAA', 1, 0, '0398490398389');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.bank: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
REPLACE INTO `bank` (`id_bank`, `name`) VALUES
	('00007', 'BANCO DE GALICIA Y BUENOS AIRES S.A.U.'),
	('00011', 'BANCO DE LA NACION ARGENTINA'),
	('00014', 'BANCO DE LA PROVINCIA DE BUENOS AIRES'),
	('00015', '	INDUSTRIAL AND COMMERCIAL BANK OF CHINA'),
	('00016', 'CITIBANK N.A.'),
	('00017', 'BANCO BBVA ARGENTINA S.A.'),
	('00020', 'BANCO DE LA PROVINCIA DE CORDOBA S.A.'),
	('00027', 'BANCO SUPERVIELLE S.A.'),
	('00029', 'BANCO DE LA CIUDAD DE BUENOS AIRES'),
	('00034', 'BANCO PATAGONIA S.A.'),
	('00044', 'BANCO HIPOTECARIO S.A.'),
	('00045', 'BANCO DE SAN JUAN S.A.'),
	('00065', 'BANCO MUNICIPAL DE ROSARIO'),
	('00072', 'BANCO SANTANDER RIO S.A.'),
	('00083', 'BANCO DEL CHUBUT S.A.'),
	('00086', 'BANCO DE SANTA CRUZ S.A.'),
	('00093', 'BANCO DE LA PAMPA SOCIEDAD DE ECONOMÍA M'),
	('00094', 'BANCO DE CORRIENTES S.A.'),
	('00097', 'BANCO PROVINCIA DEL NEUQUÉN SOCIEDAD ANÓ'),
	('00143', 'BRUBANK S.A.U.'),
	('00147', 'BANCO INTERFINANZAS S.A.'),
	('00150', 'HSBC BANK ARGENTINA S.A.'),
	('00165', 'JPMORGAN CHASE BANK, NATIONAL ASSOCIATIO'),
	('00191', 'BANCO CREDICOOP COOPERATIVO LIMITADO'),
	('00198', 'BANCO DE VALORES S.A.'),
	('00247', 'BANCO ROELA S.A.'),
	('00254', 'BANCO MARIVA S.A.'),
	('00259', 'BANCO ITAU ARGENTINA S.A.'),
	('00262', 'BANK OF AMERICA, NATIONAL ASSOCIATION'),
	('00266', 'BNP PARIBAS'),
	('00268', 'BANCO PROVINCIA DE TIERRA DEL FUEGO'),
	('00269', '	BANCO DE LA REPUBLICA ORIENTAL DEL URUGUAY'),
	('00277', 'BANCO SAENZ S.A.'),
	('00281', 'BANCO MERIDIAN S.A.'),
	('00285', 'BANCO MACRO S.A.'),
	('00299', 'BANCO COMAFI SOCIEDAD anonima'),
	('00300', 'BANCO DE INVERSION Y COMERCIO EXTERIOR S'),
	('00301', 'BANCO PIANO S.A.'),
	('00305', 'BANCO JULIO SOCIEDAD ANONIMA'),
	('00448', 'BANCO DINO S.A.');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.cripto
CREATE TABLE IF NOT EXISTS `cripto` (
  `ID_cripto` int(11) NOT NULL AUTO_INCREMENT,
  `cripto_name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_cripto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.cripto: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cripto` DISABLE KEYS */;
REPLACE INTO `cripto` (`ID_cripto`, `cripto_name`, `description`) VALUES
	(1, 'BITCOIN', 'BTC'),
	(2, 'ETHEREUM', 'ETH'),
	(3, 'TETHER', 'USDT'),
	(4, 'DAI', 'DAI'),
	(5, 'CHAINLINK', 'LINK'),
	(6, 'RIPPLE', 'XRP');
/*!40000 ALTER TABLE `cripto` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.deposit
CREATE TABLE IF NOT EXISTS `deposit` (
  `id_deposit` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `date_hour` datetime NOT NULL,
  `pesos` float NOT NULL,
  `state` int(255) NOT NULL,
  PRIMARY KEY (`id_deposit`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.deposit: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.operation
CREATE TABLE IF NOT EXISTS `operation` (
  `ID_op` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `ID_cripto` int(11) NOT NULL,
  `ID_wallet_cripto` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT '',
  `cripto_amount` float NOT NULL DEFAULT 0,
  `pesos_amount` float NOT NULL DEFAULT 0,
  `date_hour` datetime NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`ID_op`),
  KEY `FK__user` (`ID_user`),
  KEY `FK__cripto` (`ID_cripto`),
  KEY `FK_operation_wallet_cripto` (`ID_wallet_cripto`),
  CONSTRAINT `FK__cripto` FOREIGN KEY (`ID_cripto`) REFERENCES `cripto` (`ID_cripto`),
  CONSTRAINT `FK__user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`),
  CONSTRAINT `FK_operation_wallet_cripto` FOREIGN KEY (`ID_wallet_cripto`) REFERENCES `wallet_cripto` (`id_wallet_cripto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.operation: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
REPLACE INTO `operation` (`ID_op`, `ID_user`, `ID_cripto`, `ID_wallet_cripto`, `type`, `cripto_amount`, `pesos_amount`, `date_hour`, `state`) VALUES
	(7, 31, 6, '942021', '1', 1, 60000, '2021-04-09 19:39:33', 1),
	(10, 40, 2, '9420211', '2', 2, 800000, '2021-04-09 19:47:45', 1);
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.photo_user
CREATE TABLE IF NOT EXISTS `photo_user` (
  `id_user` int(255) NOT NULL DEFAULT 0,
  `photo_face` longblob NOT NULL,
  `photo_paper` longblob NOT NULL,
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_photo_user_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.photo_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `photo_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_user` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.type_account
CREATE TABLE IF NOT EXISTS `type_account` (
  `ID_type_account` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `currency` varchar(50) NOT NULL,
  KEY `ID_type_account` (`ID_type_account`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.type_account: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `type_account` DISABLE KEYS */;
REPLACE INTO `type_account` (`ID_type_account`, `name`, `currency`) VALUES
	(1, 'CAJA DE AHORRO', 'PESOS'),
	(2, 'CAJA DE AHORRO', 'DOLARES'),
	(3, 'CUENTA CORRIENTE', 'PESOS');
/*!40000 ALTER TABLE `type_account` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.user
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` int(8) NOT NULL,
  `CUIL` varchar(11) NOT NULL,
  `pass` longtext NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `second_last_name` varchar(50) DEFAULT NULL,
  `birth_day` date NOT NULL,
  `check_user` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `check_email` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `DNI` (`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.user: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID_user`, `DNI`, `CUIL`, `pass`, `name_user`, `middle_name`, `last_name`, `second_last_name`, `birth_day`, `check_user`, `type`, `email`, `check_email`) VALUES
	(1, 0, '00000000000', '202cb962ac59075b964b07152d234b70', 'Admin', NULL, 'Admin', NULL, '1990-04-03', 1, 2, 'criptopremier@gmail.com', 1),
	(31, 41121345, '20411213456', '202cb962ac59075b964b07152d234b70', 'Angel', '', 'Magaquian', '', '1998-12-18', 1, 1, 'angelmagakhian@gmail.com', 0),
	(37, 41123345, '20411233456', '81dc9bdb52d04dc20036dbd8313ed055', 'Francisco', 'Arturo', 'Mansilla', 'Ruarte', '1998-12-17', 0, 1, 'Fa_mr@gmail.com', 0),
	(38, 40318624, '20403186246', '202cb962ac59075b964b07152d234b70', 'Pedro', 'Ignacio', 'De La Vega', '', '1999-03-23', 0, 1, 'pedrodlv@gmail.com', 0),
	(40, 40573637, '27405736379', '202cb962ac59075b964b07152d234b70', 'Melina', 'Belen', 'Bruvera', '', '1997-12-02', 0, 1, 'melibruvera@hotmail.com', 0),
	(43, 14890167, '20148901676', '202cb962ac59075b964b07152d234b70', 'Juan', 'Carlos', 'Magaquian', 'Criffasi', '1962-04-25', 0, 1, 'jmagaquian@gmail.com', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.wallet_cripto
CREATE TABLE IF NOT EXISTS `wallet_cripto` (
  `id_wallet_cripto` varchar(255) NOT NULL,
  `id_cripto` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `wallet_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_wallet_cripto`) USING BTREE,
  KEY `id_cripto` (`id_cripto`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_wallet_cripto_cripto` FOREIGN KEY (`id_cripto`) REFERENCES `cripto` (`ID_cripto`),
  CONSTRAINT `FK_wallet_cripto_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.wallet_cripto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `wallet_cripto` DISABLE KEYS */;
REPLACE INTO `wallet_cripto` (`id_wallet_cripto`, `id_cripto`, `id_user`, `wallet_name`) VALUES
	('942021', 6, 31, 'Wallet RIPPLE (XRP) Angel'),
	('9420211', 1, 40, 'Wallet BITCOIN (BTC) Melina');
/*!40000 ALTER TABLE `wallet_cripto` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.wallet_user
CREATE TABLE IF NOT EXISTS `wallet_user` (
  `ID_wallet_user` int(255) NOT NULL AUTO_INCREMENT,
  `ID_user` int(255) NOT NULL,
  `balance` float DEFAULT NULL,
  `OS_balance` float DEFAULT NULL,
  PRIMARY KEY (`ID_wallet_user`),
  KEY `ID_user` (`ID_user`),
  CONSTRAINT `FK_wallet_user_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.wallet_user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `wallet_user` DISABLE KEYS */;
REPLACE INTO `wallet_user` (`ID_wallet_user`, `ID_user`, `balance`, `OS_balance`) VALUES
	(1, 40, 0, 0),
	(2, 37, 8000, 100),
	(3, 38, 67, 100),
	(4, 31, 5677, 100),
	(6, 43, 0, 0);
/*!40000 ALTER TABLE `wallet_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
