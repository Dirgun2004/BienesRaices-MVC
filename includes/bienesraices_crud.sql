/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagenes` varchar(200) DEFAULT NULL,
  `descripcion` longtext NOT NULL,
  `habitaciones` int NOT NULL,
  `WC` int NOT NULL,
  `estacionamiento` int NOT NULL DEFAULT '0',
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagenes`, `descripcion`, `habitaciones`, `WC`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(3, 'Casa en Tacarigua de la laguna', '10000.00', 'dedf0ea40b1e5bcfde8c2b6c3b178163.jpg', 'Casa en Tacarigua de la laguna', 2, 3, 3, '2026-01-17', 2),
(4, 'Apartamento Residencia Vista al Sol', '15000.00', '7eaef0b11158381e506d473f98c5454e.jpg', 'Apartamento Residencia Vista al Sol', 1, 2, 2, '2026-01-17', 1),
(10, ' Apartamento en lomas del rosal Oferta', '50000.00', 'e6190d9571bd04d20f881f3105530404.jpg', 'Un bellisimo apartamento ubicado cerca del rosal, con excelente vista y moderno', 2, 2, 1, '2026-02-03', 2),
(12, ' Apartamento Residencia Hollywood', '35000.00', '12dd08c361a5361008643c2bb5e32495.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 2, 3, '2026-02-04', 1),
(14, '  Casa de Vacaciones', '25000.00', '32e70b43d974743fd939d70f69a31e9f.jpg', 'Hermosa casa de Vacaciones', 1, 2, 3, '2026-02-06', 2),
(15, ' Casa de prueba', '15000.00', 'f1cb0196ead37d379947b230c6f41098.jpg', 'Prueba de casa para debugear proyecto', 1, 2, 2, '2026-02-02', 1),
(16, ' Casa de prueba', '15000.00', 'c959a0529505819fe88d470f780461b3.jpg', 'Prueba de casa para debugear proyecto', 1, 2, 2, '2026-02-02', 1),
(18, ' Oficina en Sabana Grande', '50000.00', '75c73202373284c19defa547313afec9.jpg', 'Hermosa oficina ubicada entre el boulevard de sabana grande y la Av. francisco solano lopez', 2, 2, 1, '2026-02-10', 1),
(19, ' Residencia las Guacamayas', '25000.00', '1fa383ee4e0c99dc7dd3839248ddacb1.jpg', 'Hermosa residencia con transporte cerca', 3, 1, 1, '2026-02-23', 10);
INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(2, 'correo@correo.com', '$2y$12$i0D2YZetva40HlUTLeVz7unY.3idSHYHjH/C/43XSLBEy.yZTGTXe');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Diego', 'Perdomo', '424248813'),
(2, 'Yisleidy', 'Gutierrez', '414531410'),
(4, 'Keny de Jesus', 'Molina', '424568789'),
(5, ' Angel', 'Armas', '422536587'),
(10, ' Dylan', 'Gutierrez', '1234567890'),
(11, ' Daniel', 'Perdomo', '414531415');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;