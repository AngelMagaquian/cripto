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
  PRIMARY KEY (`CBU`),
  KEY `ID_user` (`ID_user`),
  KEY `num_cuenta` (`ID_account`) USING BTREE,
  KEY `ID_bank` (`ID_bank`),
  KEY `FK_account_type_account` (`ID_type_account`),
  KEY `account_number` (`account_number`),
  CONSTRAINT `FK_account_bank` FOREIGN KEY (`ID_bank`) REFERENCES `bank` (`id_bank`),
  CONSTRAINT `FK_account_type_account` FOREIGN KEY (`ID_type_account`) REFERENCES `type_account` (`ID_type_account`),
  CONSTRAINT `FK_account_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.account: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
REPLACE INTO `account` (`ID_user`, `ID_account`, `ID_bank`, `CBU`, `alias`, `ID_type_account`, `check_account`, `account_number`) VALUES
	(31, 2, '00072', '0010010100101010101010', 'AAAA', 1, 2, '0398490398389'),
	(31, 1, '00015', '0150804601000131815415', 'MARMOL.RUEDA.TONO', 1, 1, '08040113181541'),
	(40, 13, '00011', '340938493093', 'MELI.BRU.VERA', 1, 2, '89049324'),
	(31, 15, '00016', '3453453463', 'Angel', 1, 0, '44245'),
	(31, 14, '00011', '43723949238473', 'Angel.Maga.quian', 1, 1, '5467323');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.admin_values
CREATE TABLE IF NOT EXISTS `admin_values` (
  `ID_value` int(11) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.admin_values: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `admin_values` DISABLE KEYS */;
REPLACE INTO `admin_values` (`ID_value`, `description`, `value`) VALUES
	(1, 'dolar_cripto', 148),
	(2, 'commission compra', 3),
	(3, 'commission venta', 2);
/*!40000 ALTER TABLE `admin_values` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.bank: ~45 rows (aproximadamente)
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
	('00309', 'BANCO RIOJA SOCIEDAD ANONIMA UNIPERSONAL'),
	('00310', 'BANCO DEL SOL S.A.'),
	('00311', 'NUEVO BANCO DEL CHACO S. A.'),
	('00312', 'BANCO VOII S.A.'),
	('00315', 'BANCO DE FORMOSA S.A.'),
	('00448', 'BANCO DINO S.A.');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.cancel_deposit
CREATE TABLE IF NOT EXISTS `cancel_deposit` (
  `id_issue` int(255) NOT NULL AUTO_INCREMENT,
  `id_deposit` bigint(20) NOT NULL DEFAULT 0,
  `CBU` varchar(50) DEFAULT NULL,
  `id_wallet_user` int(255) NOT NULL,
  `pesos` float NOT NULL DEFAULT 0,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_issue`),
  KEY `FK_cancel_deposit_deposit` (`id_deposit`),
  KEY `FK_cancel_deposit_wallet_user` (`id_wallet_user`),
  KEY `FK_cancel_deposit_account_2` (`CBU`),
  CONSTRAINT `FK_cancel_deposit_account_2` FOREIGN KEY (`CBU`) REFERENCES `account` (`CBU`),
  CONSTRAINT `FK_cancel_deposit_deposit` FOREIGN KEY (`id_deposit`) REFERENCES `deposit` (`id_deposit`),
  CONSTRAINT `FK_cancel_deposit_wallet_user` FOREIGN KEY (`id_wallet_user`) REFERENCES `wallet_user` (`ID_wallet_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.cancel_deposit: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cancel_deposit` DISABLE KEYS */;
REPLACE INTO `cancel_deposit` (`id_issue`, `id_deposit`, `CBU`, `id_wallet_user`, `pesos`, `description`) VALUES
	(2, 7, '0010010100101010101010', 4, 1000, 'Usted queria depositar $1000 pero deposito $980'),
	(3, 9, '0010010100101010101010', 4, 5, 'El deposito no pudo concretarse por falta de fondos'),
	(4, 13, '0010010100101010101010', 4, 400, 'El problema es que no cumple con el monto de la solicitud');
/*!40000 ALTER TABLE `cancel_deposit` ENABLE KEYS */;

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
  `id_bank` varchar(50) DEFAULT NULL,
  `CBU` varchar(50) DEFAULT NULL,
  `id_user` int(255) NOT NULL,
  `id_wallet_user` int(11) DEFAULT NULL,
  `date_hour` datetime NOT NULL,
  `pesos` float NOT NULL,
  `state` int(255) NOT NULL,
  PRIMARY KEY (`id_deposit`),
  KEY `id_user` (`id_user`),
  KEY `id_wallet_user` (`id_wallet_user`),
  KEY `id_bank` (`id_bank`),
  KEY `CBU` (`CBU`),
  CONSTRAINT `FK_deposit_account` FOREIGN KEY (`CBU`) REFERENCES `account` (`CBU`),
  CONSTRAINT `FK_deposit_bank` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  CONSTRAINT `FK_deposit_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID_user`),
  CONSTRAINT `FK_deposit_wallet_user` FOREIGN KEY (`id_wallet_user`) REFERENCES `wallet_user` (`ID_wallet_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.deposit: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
REPLACE INTO `deposit` (`id_deposit`, `id_bank`, `CBU`, `id_user`, `id_wallet_user`, `date_hour`, `pesos`, `state`) VALUES
	(1, '00015', '0150804601000131815415', 31, 4, '2021-04-12 20:03:00', 1400, 2),
	(5, '00015', '0150804601000131815415', 31, 4, '2021-04-19 20:18:32', 4500, 2),
	(6, '00072', '0010010100101010101010', 31, 4, '2021-04-24 23:42:39', 1200, 2),
	(7, '00072', '0010010100101010101010', 31, 4, '2021-04-24 23:50:12', 1000, 2),
	(8, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:47:24', 5000, 2),
	(9, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:47:36', 5, 2),
	(10, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:48:08', 90, 1),
	(11, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:50:28', 8000, 2),
	(12, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:54:41', 200, 1),
	(13, '00072', '0010010100101010101010', 31, 4, '2021-04-30 01:57:05', 400, 2),
	(14, '00015', '0150804601000131815415', 31, 4, '2021-05-04 04:38:48', 5000, 2);
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.extracciones
CREATE TABLE IF NOT EXISTS `extracciones` (
  `ID_extraccion` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `CBU` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_extraccion`),
  KEY `ID_user` (`ID_user`),
  KEY `ID_account` (`CBU`),
  CONSTRAINT `FK_extracciones_account` FOREIGN KEY (`CBU`) REFERENCES `account` (`CBU`),
  CONSTRAINT `FK_extracciones_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.extracciones: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `extracciones` DISABLE KEYS */;
REPLACE INTO `extracciones` (`ID_extraccion`, `ID_user`, `CBU`, `date`, `amount`, `status`) VALUES
	(2, 31, '0150804601000131815415', '2021-05-13', 10000, 0),
	(3, 31, '0150804601000131815415', '2021-05-13', 10000, 0),
	(4, 31, '0150804601000131815415', '2021-05-13', 10000, 0),
	(5, 31, '0150804601000131815415', '2021-05-28', 5000, 0),
	(6, 31, '43723949238473', '2021-05-28', 100, 0);
/*!40000 ALTER TABLE `extracciones` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.operation
CREATE TABLE IF NOT EXISTS `operation` (
  `ID_op` bigint(255) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.operation: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
REPLACE INTO `operation` (`ID_op`, `ID_user`, `ID_cripto`, `ID_wallet_cripto`, `type`, `cripto_amount`, `pesos_amount`, `date_hour`, `state`) VALUES
	(0, 31, 4, '34334567876', 'COMPRA', 1, 152, '2021-05-28 01:53:05', 0),
	(7, 31, 6, '942021', 'COMPRA', 1, 60000, '2021-04-09 19:39:33', 1),
	(10, 40, 2, '9420211', 'VENTA', 2, 800000, '2021-04-09 19:47:45', 2),
	(11, 31, 6, '942021', 'VENTA', 1, 211, '2021-04-29 04:41:04', 1),
	(12, 31, 6, '942021', 'COMPRA', 1, 211, '2021-04-30 01:42:04', 1),
	(13, 31, 6, '942021', 'COMPRA', 5, 1000, '2021-04-30 01:00:04', 1),
	(14, 31, 6, '942021', 'VENTA', 1, 209, '2021-04-30 01:00:04', 2),
	(15, 31, 6, '942021', 'COMPRA', 5, 1059, '2021-04-30 01:47:04', 1),
	(16, 31, 6, '942021', 'COMPRA', 1, 211, '2021-04-30 01:37:04', 2),
	(17, 31, 4, '34334567876', 'COMPRA', 1, 152, '2021-05-04 01:08:05', 1);
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.pending_wallet_cripto
CREATE TABLE IF NOT EXISTS `pending_wallet_cripto` (
  `ID_pending` bigint(255) NOT NULL DEFAULT 0,
  `ID_user` int(11) DEFAULT NULL,
  `ID_cripto` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_pending`),
  KEY `FK_pending_wallet_cripto_user` (`ID_user`),
  KEY `FK_pending_wallet_cripto_cripto` (`ID_cripto`),
  CONSTRAINT `FK_pending_wallet_cripto_cripto` FOREIGN KEY (`ID_cripto`) REFERENCES `cripto` (`ID_cripto`),
  CONSTRAINT `FK_pending_wallet_cripto_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.pending_wallet_cripto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pending_wallet_cripto` DISABLE KEYS */;
REPLACE INTO `pending_wallet_cripto` (`ID_pending`, `ID_user`, `ID_cripto`) VALUES
	(3, 31, 5);
/*!40000 ALTER TABLE `pending_wallet_cripto` ENABLE KEYS */;

-- Volcando estructura para tabla cripto_bd.photo_user
CREATE TABLE IF NOT EXISTS `photo_user` (
  `id_user` int(255) NOT NULL DEFAULT 0,
  `photo_face` varchar(255) NOT NULL DEFAULT '',
  `photo_dni` varchar(255) NOT NULL DEFAULT '',
  `photo_dorso` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`),
  CONSTRAINT `FK_photo_user_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.photo_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `photo_user` DISABLE KEYS */;
REPLACE INTO `photo_user` (`id_user`, `photo_face`, `photo_dni`, `photo_dorso`) VALUES
	(31, '29435bd0bdc57f8eb19255c4cd0a426b.jpg', 'cba147cb6dd03db941a932ff74d15bd7.jpg', '8c32d271d7b00a50a7e2e044e85a7c7a.jpg');
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
  `ID_user` int(11) NOT NULL DEFAULT 0,
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
  `ID_wallet_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `DNI` (`DNI`),
  KEY `ID_wallet_user` (`ID_wallet_user`),
  CONSTRAINT `FK_user_wallet_user` FOREIGN KEY (`ID_wallet_user`) REFERENCES `wallet_user` (`ID_wallet_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.user: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID_user`, `DNI`, `CUIL`, `pass`, `name_user`, `middle_name`, `last_name`, `second_last_name`, `birth_day`, `check_user`, `type`, `email`, `check_email`, `ID_wallet_user`) VALUES
	(0, 41000000, '2410000006', '202cb962ac59075b964b07152d234b70', 'Lizy', '', 'Taggliani', '', '1998-12-12', 0, 1, 'ltaggliani@gmail.com', 0, 8),
	(1, 0, '00000000000', '202cb962ac59075b964b07152d234b70', 'Admin', NULL, 'Admin', NULL, '1990-04-03', 1, 2, 'info@criptopremier.com', 1, NULL),
	(31, 41121345, '20411213456', '202cb962ac59075b964b07152d234b70', 'Angel', '', 'Magaquian', '', '1998-12-18', 1, 1, 'angelmagakhian@gmail.com', 1, 4),
	(37, 41123345, '20411233456', '81dc9bdb52d04dc20036dbd8313ed055', 'Francisco', 'Arturo', 'Mansilla', 'Ruarte', '1998-12-17', 0, 1, 'Fa_mr@gmail.com', 0, 2),
	(38, 40318624, '20403186246', '202cb962ac59075b964b07152d234b70', 'Pedro', 'Ignacio', 'De La Vega', '', '1999-03-23', 0, 1, 'pedrodlv@gmail.com', 0, 3),
	(40, 40573637, '27405736379', '202cb962ac59075b964b07152d234b70', 'Melina', 'Belen', 'Bruvera', '', '1997-12-02', 1, 1, 'melibruvera@hotmail.com', 1, 1),
	(43, 14890167, '20148901676', '202cb962ac59075b964b07152d234b70', 'Juan', 'Carlos', 'Magaquian', 'Criffasi', '1962-04-25', 0, 1, 'jmagaquian@gmail.com', 0, 6),
	(44, 38123456, '20381234566', '202cb962ac59075b964b07152d234b70', 'Rolando', '', 'Nader', '', '1996-05-04', 0, 1, 'rnader@gmail.com', 0, 7);
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

-- Volcando datos para la tabla cripto_bd.wallet_cripto: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `wallet_cripto` DISABLE KEYS */;
REPLACE INTO `wallet_cripto` (`id_wallet_cripto`, `id_cripto`, `id_user`, `wallet_name`) VALUES
	('3124', 1, 31, '432'),
	('34334567876', 4, 31, 'Wallet DAI Angel'),
	('45245245', 1, 31, 'Wallet BITCOIN (BTC) Angel'),
	('543634543', 2, 31, 'Wallet ETHERUM Angel'),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cripto_bd.wallet_user: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `wallet_user` DISABLE KEYS */;
REPLACE INTO `wallet_user` (`ID_wallet_user`, `ID_user`, `balance`, `OS_balance`) VALUES
	(1, 40, 800000, -800000),
	(2, 37, 8000, 100),
	(3, 38, 67, 100),
	(4, 31, 75194, -61906),
	(6, 43, 0, 0),
	(7, 44, 0, 0),
	(8, 0, 0, 0);
/*!40000 ALTER TABLE `wallet_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

