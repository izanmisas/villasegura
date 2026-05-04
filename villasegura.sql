-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.13.0.7147
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para villasegura_db
CREATE DATABASE IF NOT EXISTS `villasegura_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `villasegura_db`;

-- Volcando estructura para tabla villasegura_db.articulos_faq
CREATE TABLE IF NOT EXISTS `articulos_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `noticia_id` (`noticia_id`),
  CONSTRAINT `articulos_faq_ibfk_1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.articulos_faq: ~0 rows (aproximadamente)

-- Volcando estructura para tabla villasegura_db.citas_previas
CREATE TABLE IF NOT EXISTS `citas_previas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(150) NOT NULL,
  `dni_nie` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `fecha_preferida` date NOT NULL,
  `notas` text DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(20) DEFAULT 'Pendiente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.citas_previas: ~0 rows (aproximadamente)
INSERT INTO `citas_previas` (`id`, `nombre_completo`, `dni_nie`, `email`, `telefono`, `servicio`, `fecha_preferida`, `notas`, `fecha_solicitud`, `estado`) VALUES
	(1, 'Izan', '32423', 'izan@gmail.com', '7324', 'padron_tramites', '2026-04-25', 'sad', '2026-04-23 14:49:35', 'Pendiente');

-- Volcando estructura para tabla villasegura_db.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(2) NOT NULL,
  `mes` varchar(3) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.eventos: ~4 rows (aproximadamente)
INSERT INTO `eventos` (`id`, `dia`, `mes`, `categoria`, `titulo`, `ubicacion`, `descripcion`) VALUES
	(1, '20', 'DIC', 'CULTURAL', 'Mercado Medieval de Navidad', 'Plaza Mayor', 'Dos días de mercado artesanal, cetrería y música en vivo en la plaz...'),
	(2, '22', 'DIC', 'MÚSICA', 'Concierto de Navidad del Coro Municipal', 'Iglesia de San Miguel', 'El coro municipal ofrece su tradicional concierto navideño en la...'),
	(3, '5', 'ENE', 'TRADICIÓN', 'Cabalgata de Reyes Magos', 'Calles del centro', 'Recorrido tradicional por las calles del municipio con reparto de...'),
	(4, '10', 'ENE', 'INFANTIL', 'Taller infantil de cerámica ibérica', 'Museo Arqueológico', 'Actividad gratuita para niños de 6 a 12 años en el Museo Arqueológico.');

-- Volcando estructura para tabla villasegura_db.mensajes_contacto
CREATE TABLE IF NOT EXISTS `mensajes_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.mensajes_contacto: ~0 rows (aproximadamente)
INSERT INTO `mensajes_contacto` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `fecha_envio`, `leido`) VALUES
	(1, 'Izan', 'izanmisas@gmail.com', 'asda', 'adas', '2026-04-23 15:05:58', 0);

-- Volcando estructura para tabla villasegura_db.municipio_caracteristicas
CREATE TABLE IF NOT EXISTS `municipio_caracteristicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icono` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.municipio_caracteristicas: ~4 rows (aproximadamente)
INSERT INTO `municipio_caracteristicas` (`id`, `icono`, `titulo`, `descripcion`) VALUES
	(1, 'fas fa-university', 'Patrimonio', 'Castillo del S.XII, iglesia románica y murallas.'),
	(2, 'fas fa-tree', 'Naturaleza', 'Rutas senderistas y el parque natural del valle.'),
	(3, 'fas fa-mountain', 'Paisaje', 'Entornos de sierra con vistas privilegiadas.'),
	(4, 'fas fa-utensils', 'Gastronomía', 'Queso artesano, miel y asados tradicionales.');

-- Volcando estructura para tabla villasegura_db.municipio_stats
CREATE TABLE IF NOT EXISTS `municipio_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(50) NOT NULL,
  `etiqueta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.municipio_stats: ~4 rows (aproximadamente)
INSERT INTO `municipio_stats` (`id`, `valor`, `etiqueta`) VALUES
	(1, '1.240', 'Habitantes'),
	(2, '42 km²', 'Extensión'),
	(3, '890 m', 'Altitud'),
	(4, '1187', 'Fundación documental');

-- Volcando estructura para tabla villasegura_db.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `extracto` text NOT NULL,
  `imagen_ruta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.noticias: ~3 rows (aproximadamente)
INSERT INTO `noticias` (`id`, `categoria`, `fecha_publicacion`, `titulo`, `extracto`, `imagen_ruta`) VALUES
	(1, 'Cultura', '2025-11-28', 'El castillo de Villasegura reabre al público tras su restauración', 'Después de 18 meses de obras, la fortaleza medieval del siglo XII vuelve a abrir sus puertas c...', 'ruta-castillo.jpg'),
	(2, 'Institucional', '2025-11-25', 'Aprobados los presupuestos municipales para 2026', 'El pleno ha aprobado unos presupuestos centrados en servicios sociales, educación y eficiencia...', 'ruta-balanza.jpg'),
	(3, 'Transporte', '2025-11-20', 'Nueva línea de autobús rural conecta Villasegura con la capital', 'A partir del 15 de diciembre, una nueva línea de transporte mejorará la movilidad de vecinos y...', 'ruta-autobus.jpg');

-- Volcando estructura para tabla villasegura_db.presupuesto_distribucion
CREATE TABLE IF NOT EXISTS `presupuesto_distribucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.presupuesto_distribucion: ~7 rows (aproximadamente)
INSERT INTO `presupuesto_distribucion` (`id`, `area`, `porcentaje`, `cantidad`) VALUES
	(1, 'Servicios Sociales', 22, '924.000 €'),
	(2, 'Educación y Deporte', 18, '756.000 €'),
	(3, 'Transición energética', 15, '630.000 €'),
	(4, 'Obras y urbanismo', 14, '588.000 €'),
	(5, 'Cultura y patrimonio', 12, '504.000 €'),
	(6, 'Administración', 10, '420.000 €'),
	(7, 'Otros', 9, '378.000 €');

-- Volcando estructura para tabla villasegura_db.tramites
CREATE TABLE IF NOT EXISTS `tramites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `extracto` text NOT NULL,
  `contenido` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.tramites: ~3 rows (aproximadamente)
INSERT INTO `tramites` (`id`, `titulo`, `extracto`, `contenido`) VALUES
	(1, 'Padrón Municipal', 'Alta, baja y modificación de datos en el padrón de habitantes.', NULL),
	(2, 'Pago del IBI', 'Gestión y pago del Impuesto de Bienes Inmuebles.', NULL),
	(3, 'Licencia de Obras', 'Solicitud de licencias para obras mayores y menores.', NULL);

-- Volcando estructura para tabla villasegura_db.transparencia_categorias
CREATE TABLE IF NOT EXISTS `transparencia_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icono` varchar(50) NOT NULL,
  `etiqueta` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.transparencia_categorias: ~4 rows (aproximadamente)
INSERT INTO `transparencia_categorias` (`id`, `icono`, `etiqueta`, `titulo`, `descripcion`) VALUES
	(1, 'fas fa-chart-bar', 'ECONÓMICO', 'Presupuestos municipales', 'Consulta los presupuestos del ejercicio 2026 (4,2M €) y ejercicios anteriores.'),
	(2, 'fas fa-file-contract', 'CONTRATOS', 'Contratación pública', 'Licitaciones, contratos menores y adjudicaciones.'),
	(3, 'fas fa-users', 'RRHH', 'Empleo público', 'Ofertas, bases y resultados de procesos selectivos.'),
	(4, 'fas fa-gavel', 'NORMATIVA', 'Ordenanzas y normativa', 'Ordenanzas municipales vigentes y propuestas en exposición pública.');

-- Volcando estructura para tabla villasegura_db.usuarios_admin
CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT 'administrador',
  `ultimo_acceso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla villasegura_db.usuarios_admin: ~1 rows (aproximadamente)
INSERT INTO `usuarios_admin` (`id`, `usuario`, `password_hash`, `rol`, `ultimo_acceso`) VALUES
	(1, 'admin', '$2y$10$gmt6lY7uHEmrmnKp2Q4.2u/BeO5GPLUwElta9FBEYgMnXCqhBC7b2', 'administrador', '2026-04-23 16:44:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
