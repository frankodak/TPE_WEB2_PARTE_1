-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milenio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(40) NOT NULL,
  `resena` text NOT NULL,
  `genero` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre`, `autor`, `resena`, `genero`) VALUES
(1, 'Cien Años de Soledad', 'Gabriel García Márquez', 'Cien años de soledad es una obra maestra de Gabriel García Márquez que nos transporta a través de generaciones y nos sumerge en un mundo mágico y surrealista lleno de personajes inolvidables y situaciones extraordinarias. La novela es una reflexión profunda sobre la historia, el amor, la soledad, la memoria y el destino. García Márquez entrelaza la historia personal de una familia con la historia colectiva de Latinoamérica, ofreciendo una visión mágica y a la vez dolorosamente real de la humanidad', 'Realismo Mágico'),
(2, 'El nombre de la rosa', 'Umberto Eco', 'Una novela histórica que combina misterio, filosofía y crítica literaria en un monasterio italiano del siglo XIV.', 'Ficción'),
(3, 'El origen de las especies', 'Charles Darwin', 'La obra fundamental de la biología evolutiva que propone la teoría de la evolución por selección natural.', 'Ciencia'),
(4, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'La primera entrega de la saga de Harry Potter, donde un niño descubre que es un mago y empieza su educación en Hogwarts.', 'Fantasía'),
(5, 'Cumbres borrascosas', 'Emily Brontë', 'Un clásico de la literatura inglesa que narra la tumultuosa relación entre Heathcliff y Catherine Earnshaw.', 'Romántica'),
(6, 'El arte de la guerra', 'Sun Tzu', 'Un antiguo tratado militar chino que ofrece estrategias sobre la guerra y el liderazgo, aplicable a diversas áreas de la vida.', 'Filosofía'),
(8, 'El Principito', 'Antoine de Saint-Exupéry', 'La obra de Antoine de Saint-Exupéry es la historia de un piloto que estando en el desierto se encuentra con un pequeño príncipe que proviene de otro planeta. Este príncipe (o principito) es un pequeño niño rubio muy peculiar. El curioso personaje le describe sus aventuras por diferentes planetas y por la tierra, y le permite experimentar una serie de enseñanzas muy especiales sobre la vida.\r\n\r\nSe cuentan anécdotas en siete planetas diferentes (el planeta del principito conocido como el asteroide B-612 y seis planetas donde El Principito se cuestiona mucho sobre el comportamiento de los adultos) y sus aventuras en el Planeta tierra donde el pequeño tiene encuentros con diferentes personajes entre los que se destacan una enigmática serpiente, el piloto narrador y un zorro muy singular.', 'Fantasía');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'webadmin', 'webadmin@gmil.com', 'admin', 'administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
