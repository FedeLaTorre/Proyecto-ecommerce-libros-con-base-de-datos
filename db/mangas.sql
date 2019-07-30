-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2019 a las 07:00:57
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mangas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `idgeneros` int(10) UNSIGNED NOT NULL,
  `generos` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idgeneros`, `generos`) VALUES
(1, 'Aventura'),
(2, 'Acción'),
(3, 'Adultos'),
(4, 'Jovenes'),
(5, 'Misterio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos_has_productos`
--

CREATE TABLE `generos_has_productos` (
  `generos_idgeneros` int(10) UNSIGNED NOT NULL,
  `productos_idproductos` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos_has_productos`
--

INSERT INTO `generos_has_productos` (`generos_idgeneros`, `productos_idproductos`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 4),
(3, 7),
(4, 1),
(4, 2),
(5, 1),
(5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(10) UNSIGNED NOT NULL,
  `idusuarios` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sinopsis` varchar(600) NOT NULL,
  `paginas` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `idusuarios`, `titulo`, `sinopsis`, `paginas`, `precio`, `imagen`) VALUES
(1, 1, 'My Hero academia: Volumen 14', 'Las vacaciones de verano han terminado, y es hora de regresar a la escuela para los estudiantes de la U.A. ¡Alto! Pero antes de que las clases puedan comenzar, Izuku y Katsuki necesitan resolver un problema entre ellos que ha estado infectándose durante mucho tiempo. Incluso si pueden superar este bache en el camino para convertirse en superhéroes, los obstáculos seguirán subiendo y subiendo.', 208, 240, 'MyHeroAcademiaVolumen14.jpg'),
(2, 1, 'My Hero academia: Volumen 16', 'La banda criminal Hassaikai, liderada por el joven jefe Kai Chisaki, ha estado trabajando en un plan para distribuir una droga que destruye el Quirk. La clave de este malvado plan es la joven Eri, detenida en el escondite de Kai. Nighteye le pide a otros héroes que formen un equipo para lanzar un intento de rescate, ¡y los estudiantes de Clase 1-A van con ellos a la guarida del león!.', 192, 240, 'MyHeroAcademiaVolumen16.jpg'),
(4, 1, 'Attack on titan: Volumen 18', 'El Cuerpo de Inspección ha derrocado al Gobierno Real y ha barrido la tiranía del rey. El siguiente paso: avanzar para recuperar muro Maria, con la ayuda de un mineral metálico recién descubierto y los milagrosos poderes de endurecimiento del titán de Eren. Pero a medida que la humanidad se une, sus enemigos también se unen más allá de los Muros ... ahora que la Bestia Titán se ha unido a Reiner y Bertolt, ¿qué estragos causarán?', 210, 250, 'AttackOnTitanVolumen18.jpg'),
(5, 1, 'Spider-verse: Volumen 2', 'Su batalla con Morlun y Los Herederos puede haber acabado, pero la guerra acaba de empezar. Abandonados en el Mundo de Batalla, un pequeño grupo de héroes que saltan entre universos, Spider-Gwen, Spider-Man Noir, Spider-Man: India, Spider-Girl, Spider-UK y Spider-Ham se encontrarán cara a cara con los horrores del Mundo de Batalla. ¿Cómo llegaron aquí? ¿Qué les pasó a sus hogares? ¿Qué tragedia le ha sucedido a esta región del Mundo de Batalla y como se enfrentarán a ella estos hombres y mujeres araña?', 155, 200, 'SpiderVerseVolumen2.jpg'),
(6, 1, 'Spider-verse: Volumen 2.1', 'Spider-Gwen llega al cementerio Mount Olivet donde detiene al Jackal y a sus secuaces quienes intentaban desenterrar el cadáver de una joven. Luego de marcharse del sitio tras el arribo de la policía, Gwen siente una extraña sensación, como si hubiera vivido dos vidas diferentes: una en la que esta con vida y es una superheroína y otra en la que está muerta. Tras marcharse del cementerio se ven las tumbas de Gwen y su padre George Stacy.', 170, 220, 'SpiderVerseVolumen2-1.jpg'),
(7, 1, 'Batman: la broma asesina', 'Batman: La broma aseisna es una historia centrada en el Joker, la antítesis de Batman por definición, y en la relación que éste y Batman han llegado a desarrollar a lo largo de los años. El relato comienza cuando se fuga por enésima vez del manicomio de Arkham. A partir de ahí, asistiremos a dos historia paralelas. Por un lado, a modo de flashbacks, se nos muestra el origen del Joker, la historia de cómic llegó a convertirse en el asesino desquiciado que es actualmente. Por otra parte, seguiremos el plan del Joker para secuestrar al comisario Gordon e intenta volverlo loco, atacando en el proc', 325, 400, 'BatmanBromaAsesina.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `email`, `password`, `nombre`, `apellido`) VALUES
(1, 'fedelatorre.6@gmail.com', 'admin', NULL, NULL),
(2, 'admin@admin.com', '$2y$10$s5eBstVKOhd7jLBJR7UHnOhM4O4s9VSxQ8eAzD8IElb8c5pBL2dCK', 'admin', 'admin'),
(3, 'cuenta@ejemplo.com', '$2y$10$AMLpvUAyjLXtFH7o0BGveOXGCN.3ewbC2di.9KHGk2nZI0iEVg/S2', 'cuenta', 'ejemplo'),
(4, 'cuenta@ejemplo2.com', '$2y$10$P4W.WPEbYSlmKjHJMyFsAe6ecj9QKY2ZtVqttjQMyjJkiUeGUcXD2', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idgeneros`);

--
-- Indices de la tabla `generos_has_productos`
--
ALTER TABLE `generos_has_productos`
  ADD PRIMARY KEY (`generos_idgeneros`,`productos_idproductos`),
  ADD KEY `fk_generos_has_productos_productos1_idx` (`productos_idproductos`),
  ADD KEY `fk_generos_has_productos_generos_idx` (`generos_idgeneros`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`),
  ADD KEY `fk_productos_usuarios1_idx` (`idusuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `idgeneros` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `generos_has_productos`
--
ALTER TABLE `generos_has_productos`
  ADD CONSTRAINT `fk_generos_has_productos_generos` FOREIGN KEY (`generos_idgeneros`) REFERENCES `generos` (`idgeneros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_generos_has_productos_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_usuarios1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
