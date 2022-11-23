-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.27 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for luqueignacio
CREATE DATABASE IF NOT EXISTS `luqueignacio` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `luqueignacio`;

-- Dumping structure for table luqueignacio.cambios
CREATE TABLE IF NOT EXISTS `cambios` (
  `Cambio_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Cambio_EntidadId` int unsigned NOT NULL,
  `Cambio_ObjetoId` int NOT NULL,
  `Cambio_Tipo` tinyint unsigned NOT NULL,
  `Cambio_UserId` int unsigned NOT NULL,
  `Cambio_Descripcion` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Cambio_Id`),
  UNIQUE KEY `Cambio_Id_UNIQUE` (`Cambio_Id`),
  KEY `Cambios-Usuarios_idx` (`Cambio_UserId`),
  KEY `Tipo` (`Cambio_Tipo`),
  CONSTRAINT `Cambios-Usuarios` FOREIGN KEY (`Cambio_UserId`) REFERENCES `usuarios` (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.cambios: ~72 rows (approximately)
/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
INSERT INTO `cambios` (`Cambio_Id`, `Cambio_EntidadId`, `Cambio_ObjetoId`, `Cambio_Tipo`, `Cambio_UserId`, `Cambio_Descripcion`, `created_at`) VALUES
	(25, 1, 16, 1, 1, 'Nombre anterior: Cocholatessa5 | Nombre actual: Cocholates\n', '2022-04-12 23:22:07'),
	(26, 2, 2, 1, 1, 'Nombre anterior: Felfort Nombre actual: Felfortt', '2022-04-12 23:26:49'),
	(27, 4, 1, 1, 1, 'Apellido anterior: Romero | Apellido actual: Romero Garcia', '2022-04-13 19:13:39'),
	(28, 1, 9, 1, 1, 'Nombre anterior: Carne Wagyuu | Nombre actual: Carne Wagyu\n', '2022-04-13 23:42:21'),
	(29, 1, 23, 0, 1, 'Nombre: Carne Molida Wagyu\n\r\n            Código: 333\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 500\n\r\n            Costo: 250\n\r\n            Stock: 5\n\r\n            Listado: ', '2022-04-13 23:44:58'),
	(30, 3, 5, 0, 1, 'Nombre de la categoría: Carne Molida', '2022-04-13 23:47:28'),
	(31, 2, 8, 0, 1, 'Nombre de la marca: Avicola SA', '2022-04-13 23:48:09'),
	(32, 1, 1, 1, 1, 'Listado anterior: 1 | Listado actual: 0\n', '2022-04-16 18:55:29'),
	(33, 1, 24, 0, 1, 'Nombre: Tarjeta SUBE\n\r\n            Código: 0333\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 100\n\r\n            Costo: 50\n\r\n            Stock: 10\n\r\n            Listado: 0', '2022-04-16 19:01:39'),
	(34, 1, 23, 1, 1, 'Categoria anterior: 1 | Categoria actual: 5\n', '2022-04-16 19:25:08'),
	(35, 1, 9, 1, 1, 'Marca anterior: 1 | Marca actual: 8\nCategoria anterior: 1 | Categoria actual: 2\n', '2022-04-16 19:28:39'),
	(36, 3, 6, 0, 1, 'Nombre de la categoría: Salsas', '2022-04-16 19:37:16'),
	(37, 1, 25, 0, 1, 'Nombre: Pure de tomate\n\r\n            Código: 01213\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 100\n\r\n            Costo: 70\n\r\n            Stock: 20\n\r\n            Listado: 0', '2022-04-16 19:38:14'),
	(38, 2, 9, 0, 1, 'Nombre de la marca: Savora', '2022-04-16 19:39:55'),
	(39, 1, 26, 0, 1, 'Nombre: Savora\n\r\n            Código: 54215\n\r\n            Marca: 9\n\r\n            Categoria: 6\n\r\n            Precio: 90\n\r\n            Costo: 70\n\r\n            Stock: 24\n\r\n            Listado: 0', '2022-04-16 19:40:37'),
	(40, 1, 23, 1, 1, 'Categoria anterior: 5 | Categoria actual: 2\n', '2022-04-16 23:36:52'),
	(41, 1, 13, 1, 1, 'Marca anterior: 1 | Marca actual: 8\nCategoria anterior: 1 | Categoria actual: 2\n', '2022-04-16 23:37:39'),
	(42, 1, 25, 1, 1, 'Categoria anterior: 1 | Categoria actual: 6\n', '2022-04-16 23:37:48'),
	(43, 1, 16, 1, 1, 'Categoria anterior: 1 | Categoria actual: 4\n', '2022-04-16 23:37:56'),
	(44, 1, 5, 1, 1, 'Precio anterior: 99.99 | Precio actual: 100.99\n', '2022-04-17 14:09:34'),
	(45, 1, 5, 1, 1, 'Precio anterior: 99.99 | Precio actual: 237.99\n', '2022-04-17 14:12:17'),
	(46, 1, 5, 1, 1, 'Precio anterior: 99.99 | Precio actual: 500\nCosto anterior: 82.99 | Costo actual: 50\n', '2022-04-17 14:16:28'),
	(47, 1, 5, 1, 1, 'Precio anterior: 99.99 | Precio actual: 200\n', '2022-04-17 14:17:10'),
	(48, 1, 5, 1, 1, 'Precio anterior: 99.99 | Precio actual: 50\nCosto anterior: 50.00 | Costo actual: 25\n', '2022-04-17 14:19:06'),
	(49, 1, 9, 1, 1, 'Precio anterior: 99.99 | Precio actual: 500\nCosto anterior: 99.99 | Costo actual: 200\n', '2022-04-17 14:19:31'),
	(50, 2, 10, 0, 1, 'Nombre de la marca: Marlboro', '2022-04-17 19:35:17'),
	(51, 3, 7, 0, 1, 'Nombre de la categoría: Cigarrillos', '2022-04-17 19:35:27'),
	(52, 1, 27, 0, 1, 'Nombre: Cigarrilos Marlboro 20\n\r\n            Código: 784l\n\r\n            Marca: 10\n\r\n            Categoria: 7\n\r\n            Precio: 300\n\r\n            Costo: 200\n\r\n            Stock: 60\n\r\n            Li', '2022-04-17 19:37:16'),
	(53, 4, 17, 1, 1, 'Nivel anterior: 0 | Nivel actual: 2', '2022-04-17 19:49:40'),
	(54, 1, 5, 1, 1, 'Nombre anterior: Pico Dulcee | Nombre actual: Pico Dulce\n', '2022-05-14 23:55:50'),
	(55, 4, 1, 1, 1, '', '2022-05-28 17:42:12'),
	(56, 1, 5, 1, 1, 'Stock anterior: 19 | Stock actual: 20\n', '2022-06-13 16:07:46'),
	(57, 1, 28, 0, 1, 'Nombre: asdsadasdas\n\r\n            Código: asdasdas\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 1\n\r\n            Costo: 2\n\r\n            Stock: 1\n\r\n            Listado: 0', '2022-06-13 16:08:13'),
	(58, 1, 29, 0, 1, 'Nombre: asdas\n\r\n            Código: 123\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 123\n\r\n            Costo: 123\n\r\n            Stock: 1\n\r\n            Listado: 0', '2022-06-13 22:36:15'),
	(59, 1, 0, 0, 1, 'Nombre: aadasd\n\r\n            Código: \n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 111\n\r\n            Costo: 3123\n\r\n            Stock: 1\n\r\n            Listado: 0', '2022-06-13 22:53:25'),
	(60, 1, 0, 0, 1, 'Nombre: sad\n\r\n            Código: \n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: \n\r\n            Costo: \n\r\n            Stock: \n\r\n            Listado: 0', '2022-06-13 22:53:54'),
	(61, 1, 32, 0, 1, 'Nombre: Levadura Calsa\n\r\n            Código: 11121x\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 200\n\r\n            Costo: 100\n\r\n            Stock: 5\n\r\n            Listado: 0', '2022-06-13 23:06:05'),
	(62, 2, 11, 0, 1, 'Nombre de la marca: Bagley', '2022-06-14 01:07:50'),
	(63, 3, 8, 0, 1, 'Nombre de la categoría: Galletas', '2022-06-14 01:08:00'),
	(64, 1, 33, 0, 1, 'Nombre: Surtidas Bagley\n\r\n            Código: 2512\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 230\n\r\n            Costo: 130\n\r\n            Stock: 15\n\r\n            Listado: 0', '2022-06-14 01:09:18'),
	(65, 1, 33, 1, 1, 'Marca anterior: 1 | Marca actual: 11\nCategoria anterior: 1 | Categoria actual: 8\n', '2022-06-14 01:13:19'),
	(66, 1, 34, 0, 1, 'Nombre: Surtidas Diversion\n\r\n            Código: 12a3\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 220\n\r\n            Costo: 110\n\r\n            Stock: 15\n\r\n            Listado', '2022-06-14 01:17:14'),
	(67, 1, 35, 0, 1, 'Nombre: Ariel\n\r\n            Código: arielo\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 9999\n\r\n            Costo: 9999\n\r\n            Stock: 1\n\r\n            Listado: 0', '2022-06-14 01:18:21'),
	(68, 2, 12, 0, 1, 'Nombre de la marca: Paladini', '2022-06-14 23:52:33'),
	(69, 1, 36, 0, 1, 'Nombre: Salchichas Paladini\n\r\n            Código: 525468\n\r\n            Marca: 12\n\r\n            Categoria: 2\n\r\n            Precio: 150\n\r\n            Costo: 90\n\r\n            Stock: 20\n\r\n            List', '2022-06-14 23:54:07'),
	(70, 1, 34, 1, 1, 'Categoria anterior: 1 | Categoria actual: 8\n', '2022-06-17 14:00:44'),
	(71, 1, 37, 0, 1, 'Nombre: Edulcorante Chuker\n\r\n            Código: chu123\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 390\n\r\n            Costo: 220\n\r\n            Stock: 16\n\r\n            Lista', '2022-06-17 14:01:39'),
	(72, 2, 13, 0, 1, 'Nombre de la marca: Chucker', '2022-06-17 14:01:49'),
	(73, 3, 9, 0, 1, 'Nombre de la categoría: Edulcorante', '2022-06-17 14:02:03'),
	(74, 1, 37, 1, 1, 'Marca anterior: 1 | Marca actual: 13\nCategoria anterior: 1 | Categoria actual: 9\n', '2022-06-17 14:02:13'),
	(75, 2, 14, 0, 1, 'Nombre de la marca: Sidiet', '2022-06-17 14:04:13'),
	(76, 1, 38, 0, 1, 'Nombre: Edulcorante Sidiet 500ml\n\r\n            Código: abc23\n\r\n            Marca: 14\n\r\n            Categoria: 9\n\r\n            Precio: 300\n\r\n            Costo: 190\n\r\n            Stock: 20\n\r\n           ', '2022-06-17 14:05:12'),
	(77, 3, 10, 0, 1, 'Nombre de la categoría: Shampoo', '2022-06-17 14:12:41'),
	(78, 2, 15, 0, 1, 'Nombre de la marca: Plusbelle', '2022-06-17 14:12:48'),
	(79, 1, 39, 0, 1, 'Nombre: Shampoo Plusbelle\n\r\n            Código: 1842\n\r\n            Marca: 15\n\r\n            Categoria: 10\n\r\n            Precio: 200\n\r\n            Costo: 120\n\r\n            Stock: 20\n\r\n            Listad', '2022-06-17 14:13:29'),
	(80, 3, 11, 0, 1, 'Nombre de la categoría: &lt;script&gt;alert()&lt;/script&gt;', '2022-06-17 19:51:19'),
	(81, 3, 12, 0, 1, 'Nombre de la categoría: <script>alert()</script>', '2022-06-17 19:52:07'),
	(82, 3, 13, 0, 1, 'Nombre de la categoría: <script>alert()</script>', '2022-06-17 19:58:19'),
	(83, 3, 14, 0, 1, 'Nombre de la categoría: <script>alert()</script>', '2022-06-17 19:58:49'),
	(84, 3, 15, 0, 1, 'Nombre de la categoría: <script>window.location.href="hola"</script>', '2022-06-17 20:07:57'),
	(85, 3, 16, 0, 1, 'Nombre de la categoría: <script>alert()</script>', '2022-06-17 20:08:19'),
	(86, 3, 17, 0, 1, 'Nombre de la categoría: <script>alert()</script>', '2022-06-17 20:09:03'),
	(87, 3, 18, 0, 1, 'Nombre de la categoría: <script>window.location.href="hola"</script>', '2022-06-17 20:09:20'),
	(88, 3, 19, 0, 1, 'Nombre de la categoría: window.location.replace(\'http://pornhub.com\');', '2022-06-17 20:11:37'),
	(89, 3, 20, 0, 1, 'Nombre de la categoría: <script>window.location.replace(\'http://aprenderaprogramar.com\');</script>', '2022-06-17 20:12:09'),
	(90, 3, 21, 0, 1, 'Nombre de la categoría: <script>window.location.replace(\'http://aprenderaprogramar.com\');</script>', '2022-06-17 20:14:02'),
	(91, 3, 22, 0, 1, 'Nombre de la categoría: <script>window.location.replace(\'http://aprenderaprogramar.com\');</script>', '2022-06-17 20:14:32'),
	(92, 3, 23, 0, 1, 'Nombre de la categoría: &lt;script&gt;while(true){alert()};&lt;/script&gt;', '2022-06-17 20:31:44'),
	(93, 1, 40, 0, 1, 'Nombre: &lt;script&gt;while(true){alert()};&lt;/script&gt;\n\r\n            Código: asdas\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 21\n\r\n            Costo: 2\n\r\n            S', '2022-06-17 20:34:22'),
	(94, 1, 41, 0, 1, 'Nombre: &lt;script&gt;while(true){alert()};&lt;/script&gt;\n\r\n            Código: asd\n\r\n            Marca: 1\n\r\n            Categoria: 1\n\r\n            Precio: 213\n\r\n            Costo: 23\n\r\n            S', '2022-06-17 20:36:09'),
	(95, 1, 32, 1, 1, 'Precio anterior: 200.00 | Precio actual: 50\nCosto anterior: 100.00 | Costo actual: 20\n', '2022-06-18 01:39:45'),
	(96, 1, 1, 1, 1, 'Listado anterior: 0 | Listado actual: 1\n', '2022-06-18 14:33:17');
/*!40000 ALTER TABLE `cambios` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `Categoria_Id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `Categoria_Nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Categoria_Id`),
  UNIQUE KEY `Categoria_Id_UNIQUE` (`Categoria_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.categorias: ~8 rows (approximately)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`Categoria_Id`, `Categoria_Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Caramelos', NULL, NULL),
	(2, 'Wagyu', '2022-04-11 19:40:56', '2022-04-11 19:40:56'),
	(4, 'Chocolate', '2022-04-12 22:51:35', '2022-04-12 22:51:35'),
	(6, 'Salsas', '2022-04-16 19:37:16', '2022-04-16 19:37:16'),
	(7, 'Cigarrillos', '2022-04-17 19:35:27', '2022-04-17 19:35:27'),
	(8, 'Galletas', '2022-06-14 01:08:00', '2022-06-14 01:08:00'),
	(9, 'Edulcorante', '2022-06-17 14:02:03', '2022-06-17 14:02:03'),
	(10, 'Shampoo', '2022-06-17 14:12:41', '2022-06-17 14:12:41');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.consultas
CREATE TABLE IF NOT EXISTS `consultas` (
  `Consulta_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Consulta_Mensaje` varchar(255) NOT NULL DEFAULT '',
  `Consulta_Email` varchar(60) DEFAULT NULL,
  `deleted_at` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Consulta_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.consultas: ~2 rows (approximately)
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` (`Consulta_Id`, `Consulta_Mensaje`, `Consulta_Email`, `deleted_at`, `created_at`) VALUES
	(5, 'Hola, el fracasado de Abdul ya aprobó algebra? Gracias', 'taborda@gmail.com', NULL, NULL),
	(6, 'Hola, venden chucker? También necesito zanahorias para mi novia', 'arielr111116@gmail.com', NULL, NULL);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `Marca_Id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `Marca_Nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Marca_Id`),
  UNIQUE KEY `Marca_Id_UNIQUE` (`Marca_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.marcas: ~11 rows (approximately)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`Marca_Id`, `Marca_Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Arcor', NULL, NULL),
	(2, 'Felfortt', '2022-04-12 12:17:29', '2022-04-12 23:26:49'),
	(3, 'Bonafide', '2022-04-12 22:40:34', '2022-04-12 22:40:34'),
	(8, 'Avicola SA', '2022-04-13 23:48:09', '2022-04-13 23:48:09'),
	(9, 'Savora', '2022-04-16 19:39:55', '2022-04-16 19:39:55'),
	(10, 'Marlboro', '2022-04-17 19:35:17', '2022-04-17 19:35:17'),
	(11, 'Bagley', '2022-06-14 01:07:50', '2022-06-14 01:07:50'),
	(12, 'Paladini', '2022-06-14 23:52:33', '2022-06-14 23:52:33'),
	(13, 'Chucker', '2022-06-17 14:01:49', '2022-06-17 14:01:49'),
	(14, 'Sidiet', '2022-06-17 14:04:13', '2022-06-17 14:04:13'),
	(15, 'Plusbelle', '2022-06-17 14:12:48', '2022-06-17 14:12:48');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `Producto_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Producto_Cod` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Producto_Img` varchar(50) DEFAULT NULL,
  `Producto_Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Producto_Costo` decimal(6,2) unsigned DEFAULT NULL,
  `Producto_Precio` decimal(6,2) unsigned DEFAULT NULL,
  `Producto_Stock` smallint unsigned DEFAULT NULL,
  `Producto_Categoria` smallint unsigned NOT NULL,
  `Producto_Marca` smallint unsigned NOT NULL,
  `Producto_Listado` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Producto_Id`),
  UNIQUE KEY `Producto_Id_UNIQUE` (`Producto_Id`),
  UNIQUE KEY `Producto_Cod_UNIQUE` (`Producto_Cod`),
  KEY `Producto_Categoria` (`Producto_Categoria`),
  KEY `Producto-Marca_idx` (`Producto_Marca`),
  CONSTRAINT `Producto-Categoria` FOREIGN KEY (`Producto_Categoria`) REFERENCES `categorias` (`Categoria_Id`),
  CONSTRAINT `Producto-Marca` FOREIGN KEY (`Producto_Marca`) REFERENCES `marcas` (`Marca_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.productos: ~18 rows (approximately)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`Producto_Id`, `Producto_Cod`, `Producto_Img`, `Producto_Nombre`, `Producto_Costo`, `Producto_Precio`, `Producto_Stock`, `Producto_Categoria`, `Producto_Marca`, `Producto_Listado`, `created_at`, `deleted_at`, `updated_at`) VALUES
	(1, '111', '1650153329_fa304c00d8f0f5223636.jpg', 'Caramelo Frutal', 10.00, 20.00, 50, 1, 1, 1, '2022-04-10 13:10:12', NULL, '2022-06-18 14:33:17'),
	(5, '121', '1650153321_8475a699b3a74fe63aeb.jpg', 'Pico Dulce', 25.00, 50.00, 18, 1, 1, 0, '2022-04-11 17:42:18', NULL, '2022-06-18 14:27:55'),
	(9, '221', '1650153427_7243eaec0929b99d332a.jpg', 'Carne Wagyu', 200.00, 500.00, 5, 2, 8, 0, '2022-04-11 18:42:56', NULL, '2022-04-17 14:19:31'),
	(13, 'wow', '1650153437_de89712e39d47006d363.jpg', 'Bultoterrier', 99.99, 99.99, 4, 2, 8, 0, '2022-04-11 18:46:11', 2022, '2022-06-12 16:04:01'),
	(16, '555', '1650153337_b33dc4b3ea394e202afb.jpg', 'Cocholates', 10.00, 99.00, 26, 4, 1, 0, '2022-04-12 22:28:47', NULL, '2022-04-16 23:37:56'),
	(23, '333', '1649911498_6f6495ceb1159ef32f4f.jpg', 'Carne Molida Wagyu', 99.99, 99.99, 3, 2, 1, 0, '2022-04-13 23:44:58', NULL, '2022-04-16 23:36:52'),
	(24, '0333', '1650153699_ce6dd9215605e969fe0d.png', 'Tarjeta SUBE', 50.00, 99.99, 10, 1, 1, 0, '2022-04-16 19:01:39', 2022, '2022-06-14 01:22:42'),
	(25, '01213', '1650155894_b365c96638f5f8e56a69.jpg', 'Pure de tomate', 70.00, 99.99, 20, 6, 1, 0, '2022-04-16 19:38:14', NULL, '2022-04-16 23:37:48'),
	(26, '54215', '1650156037_9c89b18318577597e189.jpg', 'Savora', 70.00, 90.00, 0, 6, 9, 0, '2022-04-16 19:40:37', NULL, '2022-04-16 19:40:37'),
	(27, '784l', '1650242236_59643b129813ad2f073d.jpeg', 'Cigarrilos Marlboro 20', 200.00, 300.00, 5, 7, 10, 0, '2022-04-17 19:37:16', NULL, '2022-04-17 19:37:16'),
	(32, '11121x', '1655179565_7f683c08a1446908b7e2.jpg', 'Levadura Calsa', 20.00, 50.00, 4, 1, 1, 0, '2022-06-13 23:06:05', NULL, '2022-06-18 01:39:45'),
	(33, '2512', '1655186958_00f20c0d8ea72012145f.jpg', 'Surtidas Bagley', 130.00, 230.00, 11, 8, 11, 0, '2022-06-14 01:09:18', NULL, '2022-06-14 01:13:19'),
	(34, '12a3', '1655187434_0e4bdae6146809d070b3.jpg', 'Surtidas Diversion', 110.00, 220.00, 15, 8, 1, 0, '2022-06-14 01:17:14', NULL, '2022-06-17 14:00:44'),
	(35, 'arielo', '1655187501_c332d32dfcdf4462d05b.jpg', 'Ariel', 9999.00, 9999.00, 1, 1, 1, 0, '2022-06-14 01:18:21', 2022, '2022-06-14 01:18:30'),
	(36, '525468', '1655268847_cfb07955ea997db89a47.jpg', 'Salchichas Paladini', 90.00, 150.00, 19, 2, 12, 0, '2022-06-14 23:54:07', NULL, '2022-06-14 23:54:07'),
	(37, 'chu123', '1655492498_1cb0f3d653fe329f592b.jpg', 'Edulcorante Chuker', 220.00, 390.00, 16, 9, 13, 0, '2022-06-17 14:01:38', NULL, '2022-06-17 14:02:13'),
	(38, 'abc23', '1655492712_556fa755df986278560c.jpg', 'Edulcorante Sidiet 500ml', 190.00, 300.00, 19, 9, 14, 0, '2022-06-17 14:05:12', NULL, '2022-06-17 14:05:12'),
	(39, '1842', '1655493209_4f1b901808407a52f36c.png', 'Shampoo Plusbelle', 120.00, 200.00, 17, 10, 15, 0, '2022-06-17 14:13:29', NULL, '2022-06-17 14:13:29');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `User_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `User_Nombre` varchar(45) NOT NULL,
  `User_Apellido` varchar(45) NOT NULL,
  `User_DNI` char(9) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Password` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `User_Telefono` varchar(15) DEFAULT NULL,
  `User_Direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `User_Token` char(15) DEFAULT NULL,
  `User_Nivel` tinyint unsigned NOT NULL,
  `User_Confirmado` tinyint DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE KEY `User_Id_UNIQUE` (`User_Id`),
  UNIQUE KEY `User_DNI` (`User_DNI`) /*!80000 INVISIBLE */,
  UNIQUE KEY `User_Email_UNIQUE` (`User_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.usuarios: ~5 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`User_Id`, `User_Nombre`, `User_Apellido`, `User_DNI`, `User_Email`, `User_Password`, `User_Telefono`, `User_Direccion`, `User_Token`, `User_Nivel`, `User_Confirmado`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ariel', 'Romero Garcia', '43788470', 'arielr111116@gmail.com', 'a', '3794512537', 'hola123', '222', 0, 1, '2022-04-12 15:18:20', '2022-06-18 14:13:30', NULL),
	(16, 'Ignacio', 'Luque', '44000744', 'ignacioluque.micha@gmail.com', '$2y$10$9yAQrMGRICGhJdecGNpYHOBaNp9/TbKE53a1LzeAOvOIfcMJ5PSk2', '3794657277', 'Facundo Quiroga 1172', NULL, 3, 1, '2022-04-14 19:09:37', '2022-06-18 13:03:02', NULL),
	(17, 'Fabricio', 'Cerullo', '43533409', 'fabriciocerullo73@gmail.com', '$2y$10$mJFBgxArdKVwgB4lJ/R/9uPnkoBpkcbf6HobBWpm00p1ysibwmdsW', '3794966016', NULL, NULL, 2, 1, '2022-04-17 19:48:32', '2022-04-17 19:49:40', NULL),
	(18, 'Lourdes', 'Romera', '44089730', 'louromeera@gmail.com', '$2y$10$hrKW9W.3fij9k1W.6PZuO.xjieUqWA9uQPKsXsRPlKiIMo5zqWiEu', '3795314199', NULL, NULL, 0, 1, '2022-04-20 10:36:03', '2022-04-20 10:36:03', NULL),
	(19, 'Ian Carlo', 'Taboada', '42555856', 'taboada@tabo.com', '$2y$10$sq2GhE4KUChjOKDTbqjijeUBleKC5PsHFD3FK/dr4UYMwhjncS5UK', '379485254', 'Mbaipu 745', NULL, 0, 1, '2022-06-01 23:11:11', '2022-06-18 13:12:34', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `Venta_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Venta_Monto` decimal(8,2) unsigned NOT NULL,
  `Venta_UserId` int unsigned DEFAULT NULL,
  `Venta_Apellido` varchar(45) DEFAULT NULL,
  `Venta_Nombre` varchar(45) DEFAULT NULL,
  `Venta_DNI` varchar(9) DEFAULT NULL,
  `Venta_Telefono` varchar(15) DEFAULT NULL,
  `Venta_Email` varchar(50) DEFAULT NULL,
  `Venta_Direccion` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Venta_Id`),
  UNIQUE KEY `Venta_Id_UNIQUE` (`Venta_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.ventas: ~14 rows (approximately)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`Venta_Id`, `Venta_Monto`, `Venta_UserId`, `Venta_Apellido`, `Venta_Nombre`, `Venta_DNI`, `Venta_Telefono`, `Venta_Email`, `Venta_Direccion`, `created_at`) VALUES
	(12, 3138.97, 16, 'Rinas', 'Juan', '43266266', '3794585624', 'pivacho@gmail.com', 'Babiene 1122', '2022-04-18 11:41:18'),
	(13, 3138.97, 16, 'Rinas', 'Juana', '43266266', '3794585624', 'pivacho@gmail.com', 'Babiene 1122', '2022-04-18 11:44:29'),
	(16, 99.99, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', NULL, '2022-05-28 17:02:31'),
	(53, 199.98, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-05-30 22:41:02'),
	(54, 900.00, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-05-30 23:03:41'),
	(55, 900.00, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-05-30 23:04:44'),
	(56, 4998.99, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-06-14 01:02:03'),
	(57, 99.99, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-06-17 02:36:35'),
	(58, 50.00, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-06-17 02:37:06'),
	(59, 50.00, 19, 'Taboada', 'Ian Carlo', '42555856', '379485254', 'taboada@tabo.com', 'Mbaipu 745', '2022-06-17 02:39:02'),
	(60, 690.00, 19, 'Taboada', 'Ian Carlo', '42555856', '379485254', 'taboada@tabo.com', 'Mbaipu 745', '2022-06-17 02:46:18'),
	(61, 700.00, 19, 'Taboada', 'Ian Carlo', '42555856', '379485254', 'taboada@tabo.com', 'Mbaipu 745', '2022-06-17 17:42:22'),
	(62, 150.00, 17, 'Cerullo', 'Fabricio', '43533409', '3794966016', 'fabriciocerullo73@gmail.com', NULL, '2022-06-17 17:43:25'),
	(63, 430.00, 16, 'Luque', 'Ignacio', '44000744', '3794657277', 'ignacioluque.micha@gmail.com', 'Facundo Quiroga 1172', '2022-06-18 01:40:08');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Dumping structure for table luqueignacio.ventas_detalle
CREATE TABLE IF NOT EXISTS `ventas_detalle` (
  `VD_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `VD_FacturaId` int unsigned NOT NULL,
  `VD_ProdId` int unsigned NOT NULL,
  `VD_Costo` decimal(6,2) unsigned NOT NULL,
  `VD_Precio` decimal(6,2) unsigned NOT NULL,
  `VD_Cantidad` smallint unsigned NOT NULL,
  PRIMARY KEY (`VD_Id`),
  UNIQUE KEY `VD_Id_UNIQUE` (`VD_Id`),
  KEY `VD-Ventas_idx` (`VD_FacturaId`),
  KEY `Venta-Producto_idx` (`VD_ProdId`),
  CONSTRAINT `VD-Ventas` FOREIGN KEY (`VD_FacturaId`) REFERENCES `ventas` (`Venta_Id`),
  CONSTRAINT `Venta-Producto` FOREIGN KEY (`VD_ProdId`) REFERENCES `productos` (`Producto_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table luqueignacio.ventas_detalle: ~25 rows (approximately)
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
INSERT INTO `ventas_detalle` (`VD_Id`, `VD_FacturaId`, `VD_ProdId`, `VD_Costo`, `VD_Precio`, `VD_Cantidad`) VALUES
	(7, 12, 9, 0.00, 99.99, 4),
	(8, 12, 27, 0.00, 99.99, 2),
	(9, 12, 25, 0.00, 99.99, 3),
	(10, 12, 16, 0.00, 99.00, 1),
	(11, 12, 5, 0.00, 50.00, 1),
	(12, 12, 26, 0.00, 90.00, 1),
	(13, 13, 9, 0.00, 99.99, 4),
	(14, 13, 27, 0.00, 99.99, 2),
	(15, 13, 25, 0.00, 99.99, 3),
	(16, 13, 16, 0.00, 99.00, 1),
	(24, 53, 13, 99.99, 99.99, 2),
	(25, 54, 27, 200.00, 300.00, 3),
	(26, 55, 27, 200.00, 300.00, 3),
	(27, 56, 16, 10.00, 99.00, 24),
	(28, 56, 23, 99.99, 99.99, 1),
	(29, 56, 32, 100.00, 200.00, 1),
	(30, 57, 23, 99.99, 99.99, 1),
	(31, 58, 5, 25.00, 50.00, 1),
	(32, 59, 5, 25.00, 50.00, 1),
	(33, 60, 33, 130.00, 230.00, 3),
	(34, 61, 38, 190.00, 300.00, 1),
	(35, 61, 39, 120.00, 200.00, 2),
	(36, 62, 36, 90.00, 150.00, 1),
	(37, 63, 33, 130.00, 230.00, 1),
	(38, 63, 39, 120.00, 200.00, 1);
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
