-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 23:38:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `milenio_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Ciencia'),
(9, 'Cuento'),
(2, 'Distopía'),
(10, 'Fábula'),
(3, 'Fantasía'),
(4, 'Ficción'),
(5, 'Filosofía'),
(13, 'Leyenda'),
(12, 'Mito'),
(8, 'Novela'),
(11, 'Poesía'),
(6, 'Realismo Mágico'),
(7, 'Romántica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `reseña` text DEFAULT NULL,
  `genero_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `reseña`, `genero_nombre`) VALUES
(1, 'Cien Años de Soledad', 'Gabriel García Márquez', 'Cien años de soledad es una obra maestra de Gabriel García Márquez que nos transporta a través de generaciones y nos sumerge en un mundo mágico y surrealista lleno de personajes inolvidables y situaciones extraordinarias. La novela es una reflexión profunda sobre la historia, el amor, la soledad, la memoria y el destino. García Márquez entrelaza la historia personal de una familia con la historia colectiva de Latinoamérica, ofreciendo una visión mágica y a la vez dolorosamente real de la humanidad.', 'Realismo Mágico'),
(2, 'El nombre de la rosa', 'Umberto Eco', 'Una novela histórica que combina misterio, filosofía y crítica literaria en un monasterio italiano del siglo XIV.', 'Ficción'),
(3, 'El origen de las especies', 'Charles Darwin', 'La obra fundamental de la biología evolutiva que propone la teoría de la evolución por selección natural.', 'Ciencia'),
(4, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'La primera entrega de la saga de Harry Potter, donde un niño descubre que es un mago y empieza su educación en Hogwarts.', 'Fantasía'),
(5, 'Cumbres borrascosas', 'Emily Brontë', 'Un clásico de la literatura inglesa que narra la tumultuosa relación entre Heathcliff y Catherine Earnshaw.', 'Romántica'),
(6, 'El arte de la guerra', 'Sun Tzu', 'Un antiguo tratado militar chino que ofrece estrategias sobre la guerra y el liderazgo, aplicable a diversas áreas de la vida.', 'Filosofía'),
(7, 'El Principito', 'Antoine de Saint-Exupéry', 'La obra de Antoine de Saint-Exupéry es la historia de un piloto que estando en el desierto se encuentra con un pequeño príncipe que proviene de otro planeta. Este príncipe (o principito) es un pequeño niño rubio muy peculiar. El curioso personaje le describe sus aventuras por diferentes planetas y por la tierra, y le permite experimentar una serie de enseñanzas muy especiales sobre la vida.\\\\r\\\\n\\\\r\\\\nSe cuentan anécdotas en siete planetas diferentes (el planeta del principito conocido como el asteroide B-612 y seis planetas donde El Principito se cuestiona mucho sobre el comportamiento de los adultos) y sus aventuras en el Planeta tierra donde el pequeño tiene encuentros con diferentes personajes entre los que se destacan una enigmática serpiente, el piloto narrador y un zorro muy singular.', 'Fantasía'),
(8, '1984', 'George Orwell', 'En un mundo totalitario gobernado por el Gran Hermano, Winston Smith, un empleado del Partido, comienza a cuestionar la opresión y la vigilancia constante del gobierno. 1984 es una crítica feroz al totalitarismo, la manipulación de la verdad y el control social. El libro explora la lucha individual contra un sistema represivo y las consecuencias de vivir en una sociedad donde la privacidad y la libertad han desaparecido.', 'Distopía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`) VALUES
(1, 'webadmin', 'webadmin@gmail.com', '$2y$10$l9BxiGf1dfR.ZqunEiT8YekGtmgxZO9MDtMK8rn4x0i6y7XVo8fjy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
